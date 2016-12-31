<?php
session_start();
if(isset($_SESSION['user']))
{
	header("location:index.php");
}	
else{
?>
<html>
<head>
	<title>Login Page</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
.error {color: #FF0000;}
</style>
</head>
<body class="container">
	
	<?php 
	
	//echo $_SESSION['user'];
	$userid=$password=$useridErr=$passwordErr="";
	$fieldErr="";
	if(isset($_POST["submit"]))
	{
		if(empty($_POST['userid']))
		{
			$useridErr="Cannot Be Empty";
		}
		else
		{
			$userid=$_POST['userid'];
		}
		if(empty($_POST['password']))
		{
			$useridErr="Cannot Be Empty";
		}
		else
		{
			$password=$_POST['password'];
		}
		if($useridErr==""&&$passwordErr=="")
		{
			$conn=new mysqli("localhost","root","","musicplayer");
			$password=md5($password);
			$sql="SELECT password FROM user WHERE userid='$userid'";
			$result=$conn->query($sql);
			if($result->num_rows==1){
				$row=$result->fetch_assoc();
			if(strcasecmp($password,$row["password"] )==0)
			{
				$_SESSION['user']=$userid;
				header("location:index.php");
			}
			else
			{
				$passwordErr="Invalid Password";
				header("location:login.php");
			}
			}
			else
			{
				header("location:login.php");
				$fieldErr="No Such User Exist ";
			}
		}
		else
		{
			$fieldErr="Invalid User ID or Password";
		}
	}
	?>
	<h2>Login Page</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  UserID : <input type="text" name="userid" value="<?php echo $userid;?>">
  <span class="error">* <?php echo $useridErr;?></span>
  <br><br>
  Password : <input type="password" name="password" value="<?php echo $password;?>">
  <span class="error">*<?php echo $passwordErr;?></span>
  <br><br>
  <span class="error"><?php echo $fieldErr?></span>
  <input type="submit" name="submit" value="Submit">	<a href="register.php">New User ? Register Here ! </a>  
  <hr>
  <br><a style="text-decoration: none;" href="index.php">Go To The HomePage...!!</a>
</form>
</body>
</html>
<?php } ?>