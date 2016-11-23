<?php
session_start();
include_once("src/Google_Client.php");
include_once("src/contrib/Google_Oauth2Service.php");
######### edit details ##########
$clientId = '893611618637-8hbpngana5primhs9nuhibjv1on4kt48.apps.googleusercontent.com'; //Google CLIENT ID
$clientSecret = 'QqK--MwrSCkHMSs8_BVmx1aj'; //Google CLIENT SECRET
$redirectUrl = 'http://localhost/login-with-google-using-php/index.php';  //return url (url to script)
$homeUrl = 'http://localhost/login-with-google-using-php';  //return to home

##################################

$gClient = new Google_Client();
$gClient->setApplicationName('Login to musicPlayer');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectUrl);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>