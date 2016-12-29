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
include_once('createplay.php');
?>

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