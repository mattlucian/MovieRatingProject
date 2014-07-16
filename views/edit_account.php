<?php
set_include_path('/home/n00748663/homepage/group2/inc');
include_once("class_Templater.php");
include_once("class_Validation.php");
include_once("class_AccountManagement.php");

$header = new Templater("../templates/header.tpl.php");
$header->publish();


if (Validation::validateAndStartSession()){
    //User is logged in
    $page = new Templater("../templates/edit_account.tpl.php");
    $page->title = "Edit your Account!";
    $page->username = htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8');

    if(isset($_GET['publish'])){
        if(((int)$_GET['publish'] === 1)&&(!empty($_POST))){
            if(AccountManagement::editAccountInformation($_POST)){
                $page->success = "Congratulations, your information has been updated!";
            }
        }
    }

    if(isset($_GET['err'])){
        switch((int)$_GET['err']){
            case 1:
                $page->error = "Invalid e-mail address, please try again";
                break;

            case 2:
                $page->error = "Sorry, the e-mail address you entered is already taken";
                break;
        }
    }
    $page->email = htmlentities($_SESSION['user']['email'], ENT_QUOTES, 'UTF-8');
    $page->publish();

}else{
    //User is not logged in

}

