<?php 	
		if(isset($_GET['usersearch']))
		{
	    echo'<div id="ajaxDiv">';
	    $usersearch=$_GET['usersearch'];
		$dbc= mysqli_connect('localhost','root','','musicplayer');
        $qry= "SELECT * FROM songs WHERE title= '$usersearch'";
        $res= mysqli_query($dbc,$qry);
		echo '<ul id="playlist">';	 
		while($row= mysqli_fetch_array($res))
		{
	      
		 echo'<li class="" song='.$row["title"].' artist='.$row["artist"].'>
		                                                                     <div id="detail">
			                                                                 <div id="name">'.$row["title"].'</div>
			                                                                 <div id="fade">
			                                                                 <button id="play">Play</button>
			                                                                 <button id="download"><a style="text-decoration:none; color:black;" href="download.php?file='.$row["title"].'">Download</a></button>
			                                                                 </div>                     
			                                                                 </div>
		      </li>';
		}
		echo '</ul>';
        }
        echo '</div>';
        ?>