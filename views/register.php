<?php
set_include_path('/home/n00748663/homepage/group2/inc');
include_once 'class_Templater.php';
include_once 'class_Validation.php';
include_once 'class_AccountManagement.php';

/*Here we setup the most simple usage of the template*/

$errors = array(
    0 => "You have successfully created your account!",
    1 => "That username already exists, please try again.",
    2 => "That email address already exists, please try again",
    3 => "Error creating account, please try again or contact us."
);

if(Validation::validateAndStartSession()){
    header("Location: account.php?err=3");
    die("Redirecting to Account Page");
}else{
    $page = new Templater("../templates/register.tpl.php");    // Loading the template file
    $page->error = "";
    if(!empty($_POST)){
        $checks = 0;
        if(empty($_POST['username'])){
            $page->error .= "Please enter a username <br/>";
        }else{
            $checks++;
        }
        if(empty($_POST['password'])){
            $page->error .= "Please enter a password <br/>";
        }else{
            $checks++;
        }
        if(empty($_POST['email'])){
            $page->error .= "Please enter an e-mail address";
        }else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $page->error .= "Invalid e-mail address";
        }else{
            $checks++;
        }

        if ($checks===3){
            AccountManagement::registerNewUser($_POST);
        }
    }

    $error_id = 99;
    if(isset($_GET['err'])){
        $error_id = $_GET['err'];
        if (($error_id != 0) && $error_id < count($errors)){
            $page->error = $errors[$error_id];
        }
        if ($error_id === 0){
            $page->success = $errors[$error_id];
        }
    }


    /*Setting variables using the 2 methods*/
    $page->title = "Register at LinkFeed!";
    $page->initialHeader = "Register";
    /*Outputting the data to the end user*/
    $page->publish();
}
