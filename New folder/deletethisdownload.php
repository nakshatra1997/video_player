<?php

session_start();
if(!isset($_SESSION["user"]))
{
	header("Location:login.php");
}

	$server = "localhost"; 
	$user = "root";
 	$password = "";
 	$database = "musicplayer"; 
 	$con=mysqli_connect($server,$user,$password,$database) or die ("Connection Fails"); 
 	$usersession= $_SESSION['user'];
 	$songid=$_GET['deletethisdownload'];	
 	$result=mysqli_query($con,"DELETE FROM usersong WHERE songid='$songid' AND userid='$usersession'");
 	
?>