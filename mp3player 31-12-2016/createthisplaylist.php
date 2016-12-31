<script src="js/jquery.js"></script>
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
    echo '<th>Songs</th>';
   
    echo '</tr>' ;
 	while($row=mysqli_fetch_array($data))
   { 
      echo '<tr>'; 
      echo '<td>'.$row['playlistname'].'</td>';
      echo '<td>'.countsong($row['playlistid']).'</td>';//////////////////////no of songs
      echo '</tr>' ;
 }  	echo '</table>';
 
}
else
{
	echo 'YOU HAVE NOT YET CREATED ANY Playlist';
}
    
}

 if(!isset($_SESSION['user'])) header('location:login.php');
 $dbc= mysqli_connect('localhost','root','','musicplayer');
 $usersession=$_SESSION['user'];
 $playlistname = $_GET['playlistname'];
 $sql2 = "SELECT * FROM userplaylist WHERE playlistname = '$playlistname' AND userid=$usersession";      
 $data2= mysqli_query($dbc,$sql2);
 if(!mysqli_num_rows($data2))
 {
 	$sql= "INSERT INTO userplaylist (playlistid,playlistname,userid) VALUES(NULL,'$playlistname','$usersession')";
    mysqli_query($dbc, $sql) or die('egrthrgt');
     /////////////////////////////created
     myplaylists(); 
      echo '<hr><br>';

     }
 else
 {  
 	myplaylists();
 	echo'<hr><br>';
 	$err="*Name already exist";
 	echo $err;
 	
 	
  }
?>
