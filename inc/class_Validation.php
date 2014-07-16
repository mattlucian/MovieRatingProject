<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Mattz
 * Date: 7/1/14
 * Time: 3:35 PM
 * To change this template use File | Settings | File Templates.
 */
set_include_path('/home/n00748663/homepage/group2/inc');
include_once("class_Database.php");

class Validation {

    public static function checkUserLoggedIn(){
        session_start();
        //Verify if a user exists in SESSION context
        if (isset($_SESSION['user'])){
            return true;
        }else{
            return false;
        }
    }

    public static function validateAndStartSession(){
        if(self::checkUserLoggedIn()){
            if (self::browserMatchesPreviousBrowser()){
                //Everything validated
                return true;
            }else{
                //Browsers don't match
                return false;
            }
        }else{
            //No one logged in
            return false;
        }
    }

    public static function browserMatchesPreviousBrowser(){
        if (isset($_SESSION['browserFingerprint'])){
            if ($_SESSION['browserFingerprint'] === md5($_SERVER['HTTP_USER_AGENT']."IgLoOfIgHtEr")){
                //Browser fingerprint is set and is the same as the current browser type
                //Do not alter the fingerprint
                return true;
            }
            else{
               //Browser fingerprint is set, but does not match current browser
                session_unset();
                session_destroy();
                return false;
            }
        }else{
            //No session fingerprint set yet, so we're going to create one for future pages
            $_SESSION['browserFingerprint'] = md5($_SERVER['HTTP_USER_AGENT']."IgLoOfIgHtEr");
            return true;
        }
        //Check to see if HTTP_USER_AGENT is same as past one via $SERVER
        //Perhaps store the browser in a SESSION variable at the end of every page
        // and then verify at the beginning of every page
    }

    public static function regenerateClientSessionID(){
        //regenerate session id, try to validate first
    }
}
