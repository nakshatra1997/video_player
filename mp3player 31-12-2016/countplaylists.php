<?php
//session_start();

function countplaylists()
{
if(!isset($_SESSION['user'])) header('login.php');
$dbc= mysqli_connect('localhost','root','','musicplayer');
$usersession= $_SESSION['user'];
$query= "SELECT * FROM userplaylist WHERE userid= '$usersession'";
$data= mysqli_query($dbc, $query);
$count= mysqli_num_rows($data);
//echo $count;
return $count;
}

?>

