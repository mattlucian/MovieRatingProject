<?php
set_include_path('/home/n00748663/homepage/group2/inc');
include_once 'class_Templater.php';
include_once 'class_AccountManagement.php';
include_once 'class_Validation.php';

$header = new Templater("../templates/header.tpl.php");
$header->publish();


$errors = array(
    0 => "no errors!",
    1 => "You must be logged in to perform that action!",
    2 => "Incorrect username or password, please try again"
);

$page = new Templater("../templates/login.tpl.php");    // Loading the template file
$page->title = "Welcome!";
$page->head = "Login Page";

if(isset($_GET['exit'])){
    if ((int)$_GET['exit'] === 1){
        AccountManagement::logOut();
        header("Location: login.php");
        die("Redirecting to: login.php");
    }else{ }
}else{
    if (Validation::validateAndStartSession()){
        header("Location: account.php");
        die("Redirecting to account page");
    }else{
        if ((isset($_POST['username']))&&(isset($_POST['password']))){
            if (\AccountManagement::submitLoginInfo($_REQUEST['username'],$_REQUEST['password'])){
                //login success
                header("Location: account.php");
                die("Redirecting to account page");
            }else{
                header("Location: login.php?err=2");
                die("Redirecting to Login Page with Error");
            }
        }else{
            //initial login attempt on page load
        }

        $error_id = isset($_GET['err']) ? (int)$_GET['err'] : 0;
        if (($error_id != 0) && $error_id < count($errors)){
            $page->error = $errors[$error_id];
        }
    }
}

    /*Outputting the data to the end user*/
$page->publish();
