<?php
set_include_path('/home/n00748663/homepage/group2/inc');
include_once 'class_Templater.php';
include_once 'class_Validation.php';

$header = new Templater("../templates/header.tpl.php");
$header->publish();


$errors = array(
    0 => "no errors!",

);

if (Validation::validateAndStartSession()){
    $page = new Templater("../templates/account.tpl.php");
    $page->title = "LinkFeed Account";
    $page->head = "My Account";
    $page->name = htmlentities($_SESSION['user']['username']);

    $error_id = isset($_GET['err']) ? (int)$_GET['err'] : 0;
    if (($error_id != 0) && $error_id < count($errors)){
        $page->error = $errors[$error_id];
    }

    $page->publish();
}else{
    header("Location: login.php");
    die("Not logged in, redirecting to login page");
}
