<?php
//session_start();
///if(!isset($_SESSION['user']))
//{
	//header("location:login.php");
//}
//else
//{
?>

<html>
<head>
	<title></title>
</head>
<body>
	<?php 
//	$userid=$_SESSION['user'];
	$userid='1';
	$songname=$_GET['file'];
	$songid=0;
	$conn=new mysqli("localhost","root","","musicplayer");
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	} 
	$sql1="SELECT songid FROM songs WHERE title='$songname'";
	$result = $conn->query($sql1);

	if ($result->num_rows ==1)
	{
		$row=$result->fetch_assoc();
		$songid=$row["songid"];
	}
	$sql= "INSERT INTO usersong(userid,songid) VALUES('$userid','$songid')";
	echo $conn->query($sql);
	header("Location: download.php?file=".$songname);

	?>
	</body>
</html>
<?php// } ?>