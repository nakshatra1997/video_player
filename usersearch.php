<?php

if(isset($_GET['usersearch']))
$usersearch=$_GET['usersearch'];
$dbc= mysqli_connect('localhost','root','','musicplayer');

$qry= "SELECT * FROM songs";
$res= mysqli_query($dbc,$qry);
while($row=mysqli_fetch_array($res))
{
	$dbsearch=$row['title'];
   
	$chopdbsearch = str_replace('.mp3',"",$dbsearch);
	$explodedbsearch= explode('_', $chopdbsearch);
	//echo $dbsearch;
	//echo $chopdbsearch;

	$usersearch=$row['title'];
  
	//$chopusersearch = str_replace('.mp3',"",$usersearch);
	$explodeusersearch= explode(' ', $usersearch);
	//echo $usersearch;
	//echo $chopusersearch;
	
	foreach($explodedbsearch as $dbchop)
	{
		//echo $dbchop;
		foreach ($explodeusersearch as $userchop) 
		{ echo $userchop;
 			/*if(strcmp($dbchop , $userchop)==1)
			{
                echo $row['title'].'hiu';
			}*/
	    }
	}
}

 ?>