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
 	$playlistid=$_GET['deletethisplay'];
 	$result1=mysqli_query($con,"DELETE FROM  playlistsong WHERE playlistid='$playlistid'");
 	$result2=mysqli_query($con,"DELETE FROM  userplaylist WHERE playlistid='$playlistid'");
 	

?>