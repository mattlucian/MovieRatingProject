<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 7/8/14
 * Time: 4:45 PM
 */

set_include_path('/home/n00748663/homepage/group2/inc');
include_once 'class_Templater.php';
include_once 'class_Validation.php';

$header = new Templater("../templates/header.tpl.php");
$header->publish();


if (Validation::validateAndStartSession()){
    $page = new Templater("../templates/movies.tpl.php");
    $page->title = "Movie Listing";
    $page->head = "Movies";
    $page->name = htmlentities($_SESSION['user']['username']);

    $page->publish();

}else{
    header('Location: login.php');
    die("going back to login");
}