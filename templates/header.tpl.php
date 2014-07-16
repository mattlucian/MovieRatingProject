<?php
/**
 * Created by PhpStorm.
 * User: Mattz
 * Date: 7/16/14
 * Time: 6:02 PM
 */
set_include_path('/home/n00748663/homepage/group2/inc');
include_once 'class_Validation.php';


?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel='shortcut icon' href='http://cop4813.ccec.unf.edu/~n00617897/favicon.ico' />
        <link rel="stylesheet" type="text/css" href="../inc/style.css" />
        <link rel="stylesheet" type="text/css" href="../inc/grid.css">
        <link rel="stylesheet" type="text/css" href="../inc/bootstrap.css">
        <script src=""
        <!--[if lte IE 9]>

        <![endif]-->

    </head>

        <body onload="returnNav(document.getElementById('returnNav'));">
        <header class="header-wrapper">
            <div class="container-fluid header-container">
                <div class="row-fluid">
                    <h1 class="span8 offset2"><a href="http://cop4813.ccec.unf.edu/~n00617897/cop4813/">AccuRate: Movie Rating Website</a></h1>
                    <div class="contact-wrapper span2">
                        <a href="mailto:randy.blankenship@unf.edu"><div class="mailme"></div></a>
                    </div>
                </div>
                <div class="row-fluid">
                    <h3>Group 2</h3>
                    <hr>
                </div>
            </div>
        </header>
        <nav class="main-nav">
            <div class="row-fluid">
                <div class="span12">
                    <ul id="nav-list">
                        <li><a class="nav-ass" href='http://cop4813.ccec.unf.edu/~n00748663/group2/views/account.php'>Account</a></li>
                        <li><a class="nav-ass" href='http://cop4813.ccec.unf.edu/~n00748663/group2/views/movies.php'>Movies</a></li>
                        <li><a class="nav-ass" href='http://cop4813.ccec.unf.edu/~n00748663/group2/views/about.php'>About Us</a></li>
                        <li><a class="nav-ass" id="logoutDelimiter"></a></li>
                        <li><a class="nav-ass" id="logoutText" href='http://cop4813.ccec.unf.edu/~n00748663/group2/views/logout.php'></a></li>
                    </ul>
                </div>
            </div>
        </nav>