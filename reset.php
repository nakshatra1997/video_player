<?php 
session_start();
?>
<html>
<head>
	<title>FORGOT PASSWORD</title>
</head>
<body>
<?php
if($_GET['key'] && $_GET['reset'])
{
  $email=$_GET['key'];
  $pass=$_GET['reset'];
  $con=mysqli_connect("localhost","root","","registration");
  $select=mysqli_query($con,"SELECT email,password FROM register WHERE md5(email)='".$email."' and password='".$pass."'");
  if(mysqli_num_rows($select)==1)
  {
    ?>
    <form method="POST" action="newPass.php">
    <input type="hidden" name="email" value="<?php echo $email;?>">
	<input type="hidden" name="key" value="<?php echo $_GET['key'];?>">
	<input type="hidden" name="reset" value="<?php echo $_GET['reset'] ;?>">
    <p>Enter New password</p>
    <input type="password" name='password'>
    <input type="submit" name="submit_password">
    </form>
    <?php
  }
  else
  {
	  ?>
	  
	  <h1 style="text-align: center; color: #369";>link expired</h1>
<?php
	     header("refresh:1;url=xyz.php");  }
}

?>
</body>
</html>
