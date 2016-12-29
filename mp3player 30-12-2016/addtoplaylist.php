  

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
   
        function ajaxFunction(ele1, ele2)
        { 
           var ajaxRequest;  
           var addtothis = ele1; 
           var songid = ele2; 
           
           var queryString = "?addtothis=" + addtothis  + "&songid=" + songid;
          
          

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
                      ///////////////////////////////////////////////////yha POST lga kr dekho zara
         



           ajaxRequest.open("GET", "addtothisplaylist.php" + queryString, true);
           ajaxRequest.send(null);
           
           ajaxRequest.onreadystatechange = function(){
              if(ajaxRequest.readyState == 4){
                 location.reload();
              }
           }
           
       }



                        $(document).ready(function()
                                  { 
                                     $('a#addtothis').click(function ()
                                   {   
                                         var value =$(this).attr('value');
                                         var valueofit =$(this).attr('valueofit');
                                         
                                         ajaxFunction(value, valueofit);
                                   });
                                    
                                  });
    </script>
<?php 
session_start();
include_once('countsong.php');

$dbc= mysqli_connect('localhost','root','','musicplayer');

if(!isset($_SESSION['user'])) header('location:login.php');
  
  $songid=$_GET['songid'];
  
  $usersession=$_SESSION['user'];
  $query = "SELECT * FROM `userplaylist` WHERE userid='$usersession'";
  $data= mysqli_query($dbc,$query) or die('uhjbjkb');
  if(mysqli_num_rows($data))
 { 
 	    echo '<table>';
      echo '<caption><em>Your Playlists</em></caption>';
      echo '<tr>'; 
      echo '<th>Name</th>';
      echo '<th>Songs</th>';
      echo '<th>Add</th>';//////////////////////no of songs
      echo '</tr>' ;
 	while($row=mysqli_fetch_array($data))
   { ?>
      <tr> 
   	  <td><?php echo $row['playlistname']?></td>
     <?php echo '<td>'.countsong($row['playlistid']).'</td>';?>
      <td><a id="addtothis" value=" <?php echo $row['playlistid']?>" valueofit=" <?php echo $songid; ?>" style="background:none; color:#0000FF; padding-right:11%; cursor: pointer;">Add To This</a></td>
      </tr>
 <?php
  }  	echo '</table><br><hr><br>';
 
}
else
{
	echo 'YOU HAVE NOT YET CREATED ANY PLAYLIST';
  echo '<br><br>';
}
   


?>
