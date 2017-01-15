<?php
session_start();
if(isset($_SESSION['user']))
{
?>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
//	$userid=$_SESSION['user'];
	$userid=$_SESSION['user'];
	$songid=$_GET['file'];
	//$songid=0;
	$conn=new mysqli("localhost","root","","musicplayer");
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	} 
	$sql1="SELECT * FROM songs WHERE songid='$songid'";
	$result = mysqli_query($conn,$sql1);

	if (mysqli_num_rows($result))
	{
		$row =mysqli_fetch_array($result);
		$songname =$row["title"];
	}
	$sql2="SELECT * FROM usersong WHERE userid='$userid' AND songid='$songid'";
	$result2=mysqli_query($conn,$sql2);
    
	if(!mysqli_num_rows($result2))
	{
	$sql= "INSERT INTO usersong(userid,songid) VALUES('$userid','$songid')";
	echo $conn->query($sql);
	$sql3= "UPDATE recommendation SET accept_reject='1' WHERE touser='$userid' AND songid='$songid'";
	echo $conn->query($sql3);
	
    }else 
    {
      	$sql4= "UPDATE recommendation SET accept_reject='1' WHERE touser='$userid' AND songid='$songid'";
     	echo $conn->query($sql4);
		
    }
    header("Location: download.php?file=".$songname);

	?>
	</body>
</html>
<?php 
  }else header('location:login.php');
      

 ?>