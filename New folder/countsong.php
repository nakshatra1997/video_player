<?php
//session_start();

function countsong($element)
{
if(!isset($_SESSION['user'])) header('login.php');
$dbc= mysqli_connect('localhost','root','','musicplayer');
$usersession= $_SESSION['user'];
$query= "SELECT * FROM userplaylist, playlistsong WHERE userplaylist.userid= '$usersession' AND userplaylist.playlistid='$element' AND userplaylist.playlistid=playlistsong.playlistid";
$data= mysqli_query($dbc, $query);
$count= mysqli_num_rows($data);
//echo $count;
return $count;
}

?>

