
<?php 
session_start();
if(isset($_POST['submit_password'])&&$_POST['key']&& $_POST['reset'])
{
  $email=$_POST['email'];
  $pass=md5($_POST['password']);

  $conn=mysqli_connect("localhost","root","","registration");
  
  $select=mysqli_query($conn,"UPDATE register SET password='$pass' WHERE md5(email)='$email'");
  header("Location:xyz.php");
}

?>
