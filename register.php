<?php
session_start();
if(isset($_SESSION['user']))
{
  header("location:index.php");
} 
else
{
?>
<!DOCTYPE HTML>  
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
.error {color: #FF0000;}
</style>
</head>
<body class="container">  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $passwordErr = "";
$name = $email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if(isset($_POST['submit']))
  {
  if (empty($_POST["name"]))
  {
    $nameErr = "Name is required";
  } 
  else
  {
  $name = trim(stripslashes(htmlspecialchars(($_POST['name']))));
    // check if name only contains letters and whitespace
  if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email =trim(stripslashes(htmlspecialchars(($_POST['email']))));
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
   
  if (empty($_POST["password"])) {
    $passwordErr = "Cannot Be Empty";
  } else {
    $password = $_POST['password'];
  }
  if($nameErr==""&& $passwordErr==""&& $emailErr=="")
  {
    $password=md5($password);
    $conn=new mysqli("localhost","root","","musicplayer");
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
    $sql= "INSERT INTO user(username,password,email) VALUES('$name','$password','$email')";
      if($conn->query($sql)==TRUE)
    {    
      $last_id = $conn->insert_id;
      session_start();
      $_SESSION['user']=$last_id;
      header("location:index.php");
    }
    else
    {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
}
}
?>

<h2>Registration Form</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name : <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail : <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Password : <input type="password" name="password" value="<?php echo $password;?>">
  <span class="error">*<?php echo $passwordErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>
</body>
</html>
<?php } ?>