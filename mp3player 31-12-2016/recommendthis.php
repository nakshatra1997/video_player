<?php
 session_start();
 if(!isset($_SESSION['user'])) header('location:login.php');
 $dbc= mysqli_connect('localhost','root','','musicplayer');
 $fromuser=$_SESSION['user'];
 $touser=$_GET['touser'];
 $songid=$_GET['songid'];
 //echo $fromuser;
 //echo $touser;
 //echo $songid;
 
  $sql= "INSERT INTO recommendation (recommendid,fromuser,touser,songid) VALUES(NULL,'$fromuser','$touser','$songid')";
  mysqli_query($dbc, $sql) or die('egrthrgt'); 
 header('location:yourdownload.php')
?>