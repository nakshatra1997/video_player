<?php 
session_start();
?>
<html>
<head>
	<title>FORGOT PASSWORD</title>
	
</head>
<body>
<form action="" method="POST" >
<input type="email" name="email" class="textInput" placeholder="Enter your email id">
<input type="submit" name="submit" value="submit" >
</form>
<?php
if(isset($_POST['submit']))
{
	$email=$_POST['email'];
	
	$con=mysqli_connect("localhost","root","","registration");
  $select=mysqli_query($con,"SELECT email,password from register where email='".$email."'");
  if(mysqli_num_rows($select)==1)
  {
    while($row=mysqli_fetch_array($select))
    {
      $email1=md5($row['email']);
	  $email=$row['email'];
      $pass=$row['password'];
    }
    $link="<a href='localhost/music player/reset.php?key=".$email1."&reset=".$pass."'>Click To Reset password</a>";
    
    
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
		$mail->Body    = 'Click On This Link to Reset Password '.$link.'';
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if(!$mail->send())
			{
			 echo "Mail Error - >".$mail->ErrorInfo;
    }
			else 
			{
			echo 'Message has been sent';
			header("Refresh: 2; url=xyz.php");
			}
			}

}
?>
</body>
</html>
