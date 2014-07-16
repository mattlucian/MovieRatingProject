<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Mattz
 * Date: 7/1/14
 * Time: 7:49 PM
 * To change this template use File | Settings | File Templates.
 */
set_include_path('/home/n00748663/homepage/group2/inc');
include_once("class_Database.php");

class AccountManagement {

    function __construct(){
        echo "test constructor";
    }

    public static function logOut(){
        if (Validation::validateAndStartSession()){
            unset($_SESSION['user']);
            session_unset();
            session_destroy();
        }
    }

    public static function submitLoginInfo($user,$pass){
        if((!empty($user))&&(!empty($pass))){

            $db = new Database();
                        // begins sql statement
            $query = "
                SELECT
                    user_id,
                    email,
                    password,
                    salt,
                    username
                FROM users
                WHERE username = :username";

            $query_params = array(  // adds user to array of params
                ':username' => $user
            );

            $row = $db->query($query,$query_params); // calls to query method and passes statement and params

            $login_success = false;

            if($row){ // if the row exists
                $check_password = hash('sha256', $pass . $row['salt']); // hash the password with the salt
                for($round = 0; $round < 65536; $round++)
                {
                    $check_password = hash('sha256', $check_password . $row['salt']); // repeat hashes to mitigate brute force attacks
                }

                if ($check_password === $row['password']){ // if hashes match
                    $login_success = true;
                    unset($row['salt']); // removing credentials from memory
                    unset($row['password']);

                    session_start();
                    $_SESSION['user'] = $row;

                }else{
                    unset($row['salt']);
                    unset($row['password']);
                    return $login_success ; // returns false
                }

                $dbcon = null; // kills connection
                return $login_success;
            }else{
                unset($row['salt']);
                unset($row['password']);
                $dbcon = null; // kills connection
                return $login_success;
            }
        }
    }

    public static function editAccountInformation($postHolder){
        if(!empty($postHolder))
        {
            //Strong user to UPDATE privilege
            $db = new Database();

            // Make sure the user entered a valid E-Mail address
            if(!filter_var($postHolder['email'], FILTER_VALIDATE_EMAIL)){
                $db = null;
                $postHolder = null;
                header("Location: edit_account.php?err=1");
                die("Redirecting back to account page");
            }

            //Change in e-mail
            if($postHolder['email'] != $_SESSION['user']['email']){
                $query = "
                SELECT
                    1
                FROM users
                WHERE
                    email = :email";

                $query_params = array(
                    ':email' => $postHolder['email']
                );

                $row = $db->query($query,$query_params);

                // Retrieve duplicate e-mail if exists
                if($row){
                    $db = null;
                    $postHolder = null;
                    header("Location: edit_account.php?err=2");
                    die("Redirecting back to account page");
                }
            }

            // New password, re-hashing and generating new salt for database
            if(!empty($postHolder['password'])){
                $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
                $password = hash('sha256', $postHolder['password'] . $salt);
                for($round = 0; $round < 65536; $round++){
                    $password = hash('sha256', $password . $salt);
                }
            }else{
                //No new password, not storing these.
                $password = null;
                $salt = null;
            }

            $query_params = array(
                ':email' => $postHolder['email'],
                ':user_id' => $_SESSION['user']['user_id'],
            );

            // Beginning query
            $query = "
            UPDATE users
            SET
                email = :email";

            // dynamic portion of query
            if($password !== null)
            {
                $query_params[':password'] = $password;
                $query_params[':salt'] = $salt;
                $query .= "
                , password = :password
                , salt = :salt";
            }

            // end of query
            $query .= "
            WHERE
                user_id = :user_id";

            $db->voidQuery($query,$query_params);

            $_SESSION['user']['email'] = $postHolder['email'];

            $db = null;
            return true;
            }
    }

    public static function registerNewUser(){

        if(isset($_POST['username'],$_POST['password'],$_POST['email'])){

        }else{
            return false;
        }

        $checks=0;

        $query = "
            SELECT
                1
            FROM users
            WHERE
                username = :username";
        $query_params = array(
            ':username' => $_POST['username']
        );

        $db = new Database();

        if ($db->query($query,$query_params)){
            header("Location: ../views/register.php?err=1");
            die("Redirecting to register page with error");
        }else{
            $checks++;
        }


        $query = "
            SELECT
                1
            FROM users
            WHERE
                email = :email";

        $query_params = array(
            ':email' => $_POST['email']
        );

        if($db->query($query, $query_params)){
             header("Location: ../views/register.php?err=2");
             die("Redirecting to register page with error");
        }else{
            $checks++;
        }

        if($checks===2){
            $query = "
            INSERT INTO users (
                email,
                password,
                salt,
                username
            ) VALUES (
                :email,
                :password,
                :salt,
                :username )";

            $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));

            $password = hash('sha256', $_POST['password'] . $salt);

            for($round = 0; $round < 65536; $round++)
            {
                $password = hash('sha256', $password . $salt);
            }
            $query_params = array(
                ':username' => $_POST['username'],
                ':password' => $password,
                ':salt' => $salt,
                ':email' => $_POST['email'],
            );
            try{
                $db->voidQuery($query,$query_params);
                header("Location: ../views/register.php?err=0");
                die("Redirecting to register page. Sucess");
            }catch(PDOException $ex){
                header("../views/register.php?err=3");
                die("Redirecting to register page");


            }
        }
    }

}
