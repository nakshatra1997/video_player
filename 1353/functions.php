<?php
require 'dbconfig.php';
function checkuser($ffname,$femail){
    	$check = mysql_query("select * from register where email='$femail'");
	$check = mysql_num_rows($check);
	if (empty($check)) { // if new user . Insert a new record		
	$query = "INSERT INTO register (name,email) VALUES ('$ffname','$femail')";
	mysql_query($query);	
	} //else {   // If Returned user . update the user record		
	//$query = "UPDATE register SET name='$ffname', Femail='$femail' where Fuid='$fuid'";
	//mysql_query($query);
	//}
}?>
