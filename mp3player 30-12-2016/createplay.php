<?php 
session_start();
include_once('countsong.php');
function myplaylists()
{
$dbc= mysqli_connect('localhost','root','','musicplayer');

if(!isset($_SESSION['user'])) header('location:login.php');


  $usersession=$_SESSION['user'];
  $query = "SELECT * FROM `userplaylist` WHERE userid='$usersession'";
  $data= mysqli_query($dbc,$query) or die('uhjbjkb');
  if(mysqli_num_rows($data))
 { 
 	echo '<table>';
    echo '<caption><em>Your Playlists</em></caption>';
    echo '<tr>'; 
    echo '<th>Name</th>';
    echo '<th>Songs</th>';//////////////////////no of songs
    echo '</tr>' ;
 	while($row=mysqli_fetch_array($data))
   { 
      echo '<tr>'; 
   	  echo '<td>'.$row['playlistname'].'</td>';
  	  echo '<td>'.countsong($row['playlistid']).'</td>';//////////////////////no of songs
      echo '</tr>' ;
 }  	  echo '</table><br><hr><br>';
 
}
else
{
	echo 'YOU HAVE NOT YET CREATED ANY PLAYLIST';
  echo '<br><br>';
}
   
}
?>
