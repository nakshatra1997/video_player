<?php 
session_start();
?>
<?php
if($_GET['key'])
{
  $email=$_GET['key'];
  
  $con=mysqli_connect("localhost","root","","registration");
  $select=mysqli_query($con,"UPDATE register SET status='1' WHERE md5(email)='$email'");
   header("refresh:1;url=xyz.php"); 
  }
  else
  {
	  ?>
	  
	  <h1 style="text-align: center; color: #369";>link expired</h1>
<?php
	     header("refresh:1;url=xyz.php");  }

?>