<?php
/**
 * Created by PhpStorm.
 * User: Mattz
 * Date: 7/16/14
 * Time: 5:00 PM
 */

set_include_path('/home/n00748663/homepage/group2/inc');
include_once 'class_Templater.php';

$header = new Templater("../templates/header.tpl.php");
$header->publish();

$page = new Templater("../templates/about.tpl.php");
$page->publish();