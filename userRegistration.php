<?php
session_start();
?>
<!doctype html>
<html>
<head>
<title>Login Form</title>
</head>
<body>
	<?php
		$nameEr =$phoneEr=$passwordEr =$emailEr="";
		$name=$password=$phone=$email="";
		function input($data)
		{
			$data=trim($data);
			$data=stripslashes($data);
			$data=htmlspecialchars($data);
			return $data;
		}
		if($_SERVER["REQUEST_METHOD"]=="POST")
		{
			if(empty($_POST["name"]))
			{
				$nameEr="Name Required";
			}
			else
			{
				$name=input($_POST['name']);
				if (!preg_match("/^[a-zA-Z ]*$/",$name))
				{
				    $nameEr = "Only letters and white space allowed"; 
				}
			}
		if(empty($_POST["email"]))
			{
				$emailEr="Cannot Left Blank";
			}
			else
			{
				$email=$_POST['email'];
				if (!filter_var($email, FILTER_VALIDATE_EMAIL))
				{
     			$emailEr = "Invalid email format"; 
    			}
			}
			if(empty($_POST["password"]))
			{
				$passwordEr="Password Required";
			}
			elseif((strlen($_POST["password"]))<6) 
			{
                $passwordEr="password should be of min 6 characters";
			}
			elseif ((strlen($_POST["password"])>12))
			{
                $passwordEr="password should be of max 12 characters";
			}
			else
			{
				$password=md5($_POST['password']);
			}
			
			if(empty($_POST["phone"]))
			{
				$phoneEr="Required Field";
			}
			else
			{   
				$phone=$_POST['phone'];
				if(strlen($phone)>10)
				$phoneEr="contact number should be valid";
			    elseif(strlen($phone)<10)
			    $phoneEr="contact number should be valid";
			
			}
		}
		if($nameEr==""&&$passwordEr==""&&$emailEr=="")
			{	
			$con=mysqli_connect('localhost','root','','registration') or die(mysql_error());
			
			$query=mysqli_query($con,"SELECT * FROM register WHERE email='".$email."'");
			
			$numrows=mysqli_num_rows($query);
			
			if($numrows==0)
			{  			   
		        $sql = "INSERT INTO register(name,password,email,phone) VALUES('$name','$password','$email','$phone')";
				$result=mysqli_query($con,$sql);
				if($result)
				{	
				   echo "Account Successfully Created check your email to activate account";
				   
      $email1=md5($email);
	
     //-----sending of mail------
    $link="<a href='localhost/music player/activate.php?key=".$email1."'>Click To activate account</a>";
    
    
        require 'PHPmail/PHPMailerAutoload.php';
		require 'PHPmail/class.phpmailer.php'; // path to the PHPMailer class
		require 'PHPmail/class.smtp.php';

		$mail = new PHPMailer;

		//$mail->SMTPDebug = 3;    

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'Smtp.gmail.com;Smtp.live.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'nakshatrapradhan2013@gmail.com';                 // SMTP username
		$mail->Password = 'mypassword';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to

		$mail->setFrom('nakshatrapradhan2013@gmail.com', 'nakshatra');    // Add a recipient
		$mail->addAddress($email);  
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = 'Subject';
		$mail->Body    = 'Click On This Link to activate account '.$link.'';
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if(!$mail->send())
			{
			 echo "Mail Error - >".$mail->ErrorInfo;
    }
			else 
			{
			
			header("Refresh: 2; url=xyz.php");
			}
			}

}
			}
?>

<form action="" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
    <table style="width: 300; border:0; align:center;">
		<tr>
			<td>NAME:</td>
			<td><input type="name" name="name" placeholder="enter your name"></td>
			<td><span class="error"> <?php echo $nameEr;?></span> </td>
		</tr>
		<tr>
			<td>EMAIL ID:</td>
			<td><input type="email" name="email" placeholder="enter your email id"></td>
			<td><span class="error"> <?php echo $emailEr;?></span> </td>
		</tr>
		<tr>
			<td>CONTACT:</td>
			<td><input type="number" name="phone"></td>
		    <td><span class="error"> <?php echo $phoneEr;?></span> </td>
		</tr>
		<tr>
			<td>PASSWORD:</td>
			<td><input type="password" name="password" ></td>
		    <td><span class="error"> <?php echo $passwordEr;?></span> </td>
		</tr>
		<tr>	
		    <td><input type="submit" name="submit" value="submit"><a href=""></td>
			<td><input type="reset"  name="reset" value="Reset"><a href=""></td>
		</tr>
	</table>
</form>
</body>
</html>