<?php
session_start();
if(!isset($_SESSION['user'])) 
  {
    header('location:login.php');
  }
  ?>

<title>Your Playlist</title>
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
                          



           ajaxRequest.open("GET", "addtothisplaylist.php" + queryString, true);
           ajaxRequest.send(null);
           
           ajaxRequest.onreadystatechange = function(){
              if(ajaxRequest.readyState == 4){
                 location.reload();
                  window.opener.location.reload(true);
              }
           }
           
       }


      function ajaxFunctionDelete(element)
        {
           var ajaxRequest;  
           var deleteplay = element;

           
           var queryString = "?deletethisplay=" + deleteplay;
                  
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
         



           ajaxRequest.open("GET", "deleteplaylist.php" + queryString, true);
           ajaxRequest.send(null);

           ajaxRequest.onreadystatechange = function(){
              if(ajaxRequest.readyState == 4){
                location.reload();
                
                // alert(ajaxRequest.responseText);
               }
           }
           
       }
    

     function popupUploadForm(elem)
       {  
        var value1 = elem;
        
        var newWindow4 = window.open('/mylearning/mp3player/openthisplaylist.php?playlistid='+ value1 , 'name4', 'height=500,width=600');
        }



                        $(document).ready(function()
                                  { 
                                     $('a#openthis').click(function ()
                                   {   
                                         var value =$(this).attr('value');
                                                                               
                                         popupUploadForm(value);
                                   });
                                    
                                  });
                         $(document).ready(function()
                                  { 
                                     $('a#deletethis').click(function ()
                                   {   
                                          var deleteplaylist =$(this).attr('value');
                                         
                                          var r= confirm('Are U sure U want to Delete this song from playlist');
                                            if(r==true)
                                            {
                                                     ajaxFunctionDelete(deleteplaylist);
                                            }
                                            else
                                            {
                                              location.reload();
                                            }
                                        });
                                    
                                  });
    </script>

<?php 


include_once('countsong.php');
$dbc= mysqli_connect('localhost','root','','musicplayer');
   
  
  $usersession=$_SESSION['user'];
  $query = "SELECT * FROM `userplaylist` WHERE userid='$usersession'";
  $data= mysqli_query($dbc,$query) or die('uhjbjkb');

    $qry2= "SELECT * FROM user WHERE userid='$usersession'";
    $res2= mysqli_query($dbc,$qry2);
    $row2=mysqli_fetch_array($res2);
?>
<div id='userinfo'>
  <div><?php echo' Hi..!! '.$row2['username'].' '?></div>
</div>
<?php
  if(mysqli_num_rows($data))
 { 
 	  echo '<table>';
    echo '<caption><em>Your Playlists</em></caption>';
    echo '<tr>'; 
    echo '<th>Name</th>';
    echo '<th>Songs</th>';
    echo '<th>Open</th>';//////////////////////no of songs
    echo '<th>Delete</th>';
    echo '</tr>' ;
 	while($row=mysqli_fetch_array($data))
   { ?>
                 <tr> 
   	             <td><?php echo $row['playlistname'];?></td>
     <?php echo '<td>'.countsong($row['playlistid']).'</td>';?>
                 <td><a id="openthis" value=" <?php echo $row['playlistid']?>" style="background:none; color:#0000FF; padding-right:11%; cursor: pointer;">OPEN</a></td>
                 <td><a id="deletethis" value=" <?php echo $row['playlistid']?>" style="background:none; color:#0000FF; padding-right:11%; cursor: pointer;">DELETE</a></td>
                 </tr>
 <?php
  }  
  	echo '</table><br><hr><br>';
 
}
else
{
	echo 'YOU HAVE NOT YET CREATED ANY PLAYLIST';
  echo '<br><br>';
}
   


?>

