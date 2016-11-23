<?php
session_start();
?>
<!doctype html>
<html>
<head>
<title>user login</title>
	 <!-- Compiled and minified CSS -->
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	  <!-- Compiled and minified JavaScript -->
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
			 
</head>
<body>
<div class="container">
<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<table style="width: 300; border:0; align:center;">
    		<tr>
				<td>EmailId :</td>
				<td><input type="email" name="email"></td>
			</tr>

			<tr>
				<td>Password :</td>
				<td><input type="password" name="password"></td>
			</tr>
           
    			<td><input type="submit" name="submit" value="Login"></td>
				<td><input type="submit" name="forgotPassword" value="Forgot Password"></td>
    		</tr>
        </table>
        </form>
		</div>
<?php
if(isset($_POST["forgotPassword"]))
	header("Location:forgotPassword.php");
if(isset($_POST["submit"]))
		{
		if(!empty($_POST['email']) && !empty($_POST['password'])) 
		{
			$email=$_POST['email'];
			$pass=md5($_POST['password']);

			$con=mysqli_connect('localhost','root','','registration') or die(mysqli_error());
			

			$query=mysqli_query($con,"SELECT * FROM register WHERE email='".$email."' AND password='".$pass."'");
			$numrows=mysqli_num_rows($query);
			if($numrows!=0)
				{
			while($row=mysqli_fetch_assoc($query))
				   {
					   $dbuser=$row['name'];
					   $dbemail=$row['email'];
					   $dbpassword=$row['password'];
				   }

			if($email == $dbemail && $pass == $dbpassword)
				{
					session_start();
					$_SESSION['sess_user']=$dbuser;
				   /* Redirect browser */
				  header("Location: xyz.php");
				}
			   } 
			   else 
			   {
				  echo "Invalid username or password!";
			   }

        } else 
			{
				echo "All fields are required!";
			}
}
?>
</body>
</html>