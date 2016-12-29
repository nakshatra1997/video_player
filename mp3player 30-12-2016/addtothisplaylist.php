<script src="js/jquery.js"></script>

<script type="text/javascript">
 
</script>
<?php 
session_start();
 if(!isset($_SESSION['user'])) header('location:login.php');
 $dbc= mysqli_connect('localhost','root','','musicplayer');
 $songid=$_GET['songid'];
 $usersession=$_SESSION['user'];
 $playlistid = $_GET['addtothis'];
 
 $sql2 = "SELECT * FROM playlistsong WHERE playlistid = '$playlistid' AND songid=$songid";      
 $data2= mysqli_query($dbc,$sql2);
 if(!mysqli_num_rows($data2))
 {
 	$sql= "INSERT INTO playlistsong (playlistid,songid) VALUES('$playlistid','$songid')";
    mysqli_query($dbc, $sql) or die('egrthrgt');
     /////////////////////////////created
     }
 ?>