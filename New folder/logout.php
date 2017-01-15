<?php 
session_start();
/*unset($_SESSION['user']);
session_destroy();
header("location:temp.php");
*/

$_SESSION[]=array();
session_destroy();
session_unset();

echo'<p>You have logged out successfully</p>';
$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
header('Location: ' . $home_url);

                

?>