<?php

if(isset($_GET['usersearch']))
$usersearch=$_GET['usersearch'];
$explodeusersearch= explode(' ', $usersearch);
 

$dbc= mysqli_connect('localhost','root','','musicplayer');
$i=0;
$qry= "SELECT * FROM songs";
$res= mysqli_query($dbc,$qry);
while($row=mysqli_fetch_array($res))
{   $i=0;

	$dbsearch=$row['title'];
   
	$chopdbsearch = str_replace('.mp3',"",$dbsearch);
	$explodedbsearch= explode('_', $chopdbsearch);
   

	foreach($explodedbsearch as $dbchop)
	{
		$lowerdbchop=strtolower($dbchop);
        
        foreach ($explodeusersearch as $userchop) 
		{ 
			$loweruserchop=strtolower($userchop);

			
 			if(strcmp($lowerdbchop , $loweruserchop)==0)
			{
                $i++;
			}
	    }
	}
     
	if($i!=0) {
		       echo 'mil gaya';
	           echo $row['title'];
	          }
	
}   
 ?>