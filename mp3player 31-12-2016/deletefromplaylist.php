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
    $playlistid=$_GET['deletefromplay'];
    $songid=$_GET['deletethissong'];
 	$result=mysqli_query($con,"DELETE FROM  playlistsong WHERE songid='$songid' AND playlistid='$playlistid'");
 	
?>