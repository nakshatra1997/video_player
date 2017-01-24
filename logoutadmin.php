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
header("Location:loginadmin.php");

                

?>