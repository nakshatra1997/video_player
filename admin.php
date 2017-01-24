<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "musicplayer";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$password=md5("123456"); 
$sql = "INSERT INTO admin (email,password)
VALUES ('akshatsrivastava2@gmail.com','$password')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>