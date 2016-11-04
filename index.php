<!DOCTYPE html>
<html>
<head>
	<title>Entry</title>
</head>

<body>
<?php 
$name=$artist=$genre=$thumbnail=$album="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	if(isset($_POST['submit']))
	{
	$name=$_POST["Name"];
	$artist=$_POST["Artist"];
	$genre=$_POST["Genre"];
	$thumbnail=$_POST["Thumbnail"];
	$album=$_POST["Album"];
    $conn=new mysqli("localhost","root","","Player");
    $sql="INSERT INTO Songs(Name,Artist,Genre,Thumbnail,Albumname)VALUES('$name','$artist','$genre','$thumbnail','$album')";
   	$conn->query($sql);
   }
}
?>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		Name :
		<input type="name" name="Name"><br>
		Artist :
		<input type="name" name="Artist"><br>
		Genre :
		<input type="name" name="Genre"><br>
		Thumbnail :
		<input type="name" name="Thumbnail"><br>
		Album Name :
		<input type="name" name="Album"><br>
		Submit
		<input type="submit" name="submit">
	</form>
	<?php 

	?>
</body>
</html>