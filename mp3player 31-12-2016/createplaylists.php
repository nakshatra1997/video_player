<!DOCTYPE html>
<html>
<head>
	<title>Create Playlist</title>

	<style type="text/css">
		table
		{
			border : 0.2vh solid black;
			border-collapse:collapse;
		}
		td
		{  text-align: center;
		   width :20%;
		   border : 0.2vh solid black;	
		}
    #userinfo
    {
      float: right;
    }
	</style>
	 <script src="js/jquery.js"></script>
	<script type="text/javascript">
   

   window.onunload = refreshParent();
    function refreshParent() {

        window.opener.location.reload(true);

    }





		function ajaxFunction(){
           var ajaxRequest;  
           var playlistname = document.getElementById('playlistname').value;
           
           var queryString = "?playlistname=" + playlistname;
          

           try {
            
              ajaxRequest = new XMLHttpRequest();
           }catch (e) {
              
              try {
                 ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
              }catch (e) {
                 try{
                    ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                 }catch (e){
                   
                    
                    return false;
                 }
              }
           }
              
           
           ajaxRequest.open("GET", "createthisplaylist.php" + queryString, true);
           ajaxRequest.send(null);

           ajaxRequest.onreadystatechange = function(){
              if(ajaxRequest.readyState == 4)
              {
              	 var ajaxDisplay = document.getElementById('youmade');
                 ajaxDisplay.innerHTML = ajaxRequest.responseText;
            
              }
           }
           
    }
	</script>
</head>
<body>

<?php
//session_start();
$dbc= mysqli_connect('localhost','root','','musicplayer');
include_once('createplay.php');
    $usersession=$_SESSION['user'];
    $qry2= "SELECT * FROM user WHERE userid='$usersession'";
    $res2= mysqli_query($dbc,$qry2);
    $row2=mysqli_fetch_array($res2);
?>
<div id='userinfo'>
  <div><?php echo' Hi..!! '.$row2['username'].' '?></div>
</div>


<div id='youmade'>

 
	<?php 
    myplaylists();
	?>
</div>




<div id="createanyplaylist">
<input type="text" id="playlistname" value="playlist">
<div id="playlistsubmit">
<button id="createanyplaylistbtn" onclick="ajaxFunction();">Create Playlist</button><div id="error"></div><span></span>
</div>
</div>


</body>
</html>