<?php
if (isset($_SESSION['admin'])) {
 	# code...
 	header("location:loginadmin.php");
 } 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Entry</title>
	 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<a href="logoutadmin.php" style="float: right;">Sign Out</a>
<?php 
$name=$artist=$genre=$thumbnail=$album="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	if(isset($_POST['submit']))
	{
	$name=$_POST["Name"];
	$nameTrimmed=trim($name);
	$nameReplaced=str_replace(" ", "_", $nameTrimmed).".mp3";
	$artist=$_POST["Artist"];
	$artistTrimmed=trim($artist);
	$artistReplaced=str_replace(" ", "_", $artistTrimmed);
	$genre=$_POST["Genre"];
	$genreTrimmed=trim($genre);
	$genreReplaced=str_replace(" ", "_", $genreTrimmed);
	$thumbnail=$_POST["Thumbnail"];
	$thumbnailTrimmed=trim($thumbnail);
	$thumbnailReplaced=str_replace(" ","_", $genreTrimmed).".jpg";
	$album=$_POST["Album"];
	$albumTrimmed=trim($album);
	$albumReplaced=str_replace(" ","_", $albumTrimmed);
    $conn=new mysqli("localhost","root","","musicplayer");
    $sql="INSERT INTO songs(title,artist,genre,thumbnail,album)VALUES('$nameReplaced','$artistReplaced','$genreReplaced','$thumbnailReplaced','$albumReplaced')";
   	$conn->query($sql);
   }
}
?>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<div>Name :
		<input type="name" name="Name" data-validation="required custom" data-validation-regexp="^([a-zA-Z ]*)$">.mp3<br>
		</div><div>Artist :
		<input type="name" name="Artist" data-validation="required custom" data-validation-regexp="^([a-zA-Z ]*)$"><br>
		</div><div>Genre :
		<input type="name" name="Genre" data-validation="required custom" data-validation-regexp="^([a-zA-Z ]*)$"><br>
		</div><div>Thumbnail :
		<input type="name" name="Thumbnail" data-validation="required custom" data-validation-regexp="^([a-zA-Z ]*)$">.jpg<br>
		</div><div>Album Name :
		<input type="name" name="Album" data-validation="required custom" data-validation-regexp="^([a-zA-Z ]*)$"><br>
		</div><div>Submit
		<input type="submit" name="submit" value="Submit"></div>
	</form>
	 <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
        <script>
            $.validate({
            	
                lang: 'en'
            });

            $("form").validate({
                errorClass: "error-class",
            });

        </script>
        <table class="table table-hover">
    	<thead>
      	<tr>
        <th>Title</th>
        <th>Artist</th>
        <th>Album</th>
        <th>Genre</th>
      	</tr>
    	</thead>
    	<tbody>
    	<?php 
    	$conn=new mysqli("localhost","root","","musicplayer");
    	$sql="SELECT * FROM songs";
    	$result = $conn->query($sql);
    	if ($result->num_rows > 0) {
    		while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["title"]."</td><td>".$row["artist"]."</td><td>".$row["album"]."</td><td>".$row["genre"]."</td></tr>";
    	}
    	}
    	?>
    </tbody>
  </table>

</body>
</html>