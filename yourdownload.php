<!DOCTYPE html>
<html>
<head>
    <title>HTML5 Audio Player</title>

    <style type="text/css">
    table
    {
      border : 0.2vh solid black;
      border-collapse:collapse;
    }
    th, td
    {  text-align: center;
       width :20%;
       border : 0.2vh solid black;  
    }     

      ul li{
        cursor: pointer;
      }
      input
      {
          cursor: pointer;  
      }
      div #recommendtores
      {
        width: 50%;
        margin-right: auto;
        margin-left: auto;
      }
    </style>
    <?php
    include_once('createplay.php');

    
    if(!isset($_SESSION['user'])) header('location:login.php');
    ?>
    <script src="js/jquery.js"></script>

    <script language = "javascript" type = "text/javascript">
        
       // window.onload= location.reload();
        function popupUploadForm()
       {
        var newWindow1 = window.open('/mylearning/mp3player/createplaylists.php', 'name1', 'height=500,width=600');
        }    

        function popupUploadForm2(elem)
       {  
        var value1 = elem.attr('valueofit');
        var newWindow2 = window.open('/mylearning/mp3player/addtoplaylist.php?songid='+ value1 , 'name2', 'height=500,width=600');
        }    
        
         function popupUploadForm3(elem)
       {  
        var newWindow3 = window.open('/mylearning/mp3player/yourplaylist.php', 'name3', 'height=500,width=600');
        }   

        function popupUploadFormx()
       {
        var newWindowx = window.open('/mylearning/mp3player/myrecommend.php', 'namex', 'height=500,width=600');
        } 
    

        function ajaxFunction(ele1, ele2)
        {
           var ajaxRequest;
           var recommendtoit = ele2;
           var songname= ele1;
           var queryString = "?recommendto=" + recommendtoit  + "&songname=" + songname;
          
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
           
           ajaxRequest.open("GET", "recommendto.php" + queryString, true);
           
           ajaxRequest.send(null);

           ajaxRequest.onreadystatechange = function()
           {
              if(ajaxRequest.readyState == 4)
              {
                  var ajaxDisplay = document.getElementById('recommendtores');
                  ajaxDisplay.innerHTML = ajaxRequest.responseText;//what is this?
                  
              }
           }
        }



         function ajaxFunctionDelete(ele)
        {
           var ajaxRequest;  
           var deleteit = ele.attr('valueofdel');
           
           var queryString = "?deletethisdownload=" + deleteit;
                  
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
         



           ajaxRequest.open("GET", "deletethisdownload.php" + queryString, true);
           ajaxRequest.send(null);

           ajaxRequest.onreadystatechange = function(){
              if(ajaxRequest.readyState == 4){
                location.reload();
                
                // alert(ajaxRequest.responseText);
               }
           }
           
       }
  
    var audio, prog;
     function loadit(){             
                                  // $('div#fade').hide();
                                   //$('#pause').hide();
                                   $('#playlist').show();
                                   $('#audio-info').show();
                                   $('#tracker').show();
                                   $('#buttons').show();
                                   ///not working without document.ready
                                    $(document).ready(function()
                                  { 
                                    $('#pause').hide();
                                    $('div#fade').slideUp();     
                                    $('div#fadedetails').slideUp();  
                                    $('div#faderecommend').slideUp();                                   
                                  });


                            }
      window.onload= loadit();   
                                /////shuru mein hidden hona chahiye naa
    
      function initAudio(element)
       {    
            var songname= element.attr('song');////is trah ke attrbute ke liye phle se koi syntax nai hai so element.attr krna pdhta hai
          var artist=element.attr('artist');
          var title=element.attr('song');
                
          audio= new Audio('media/'+ songname);
          $(element).attr("class","active");///////////////gave id dynamically
          setplay(element);
          if(!audio.currentTime)//////anysong is being played
          {   audio.play();
            $('.title').html(title);
            $('.artist').html(artist);
            timecheck();

              $('#play').hide();
                $('#pause').show();
         }
       }


       function setplay(element)
        {
          $(element).css({"font-size":"200%"});  
        }
     //////////////////////// sets appearance of song being played
        function unsetplay(element)
        {
          $(element).css({"font-size":"100%"});  
        }

      ///progress////////////////////////////////////////
        function timecheck(){   

                              $('#prog').change(function()
                                               {
                                                audio.currentTime=(this.value*audio.duration)/100;
                                                timeupdater();
                                                });


                            $(audio).bind('timeupdate', function()
                                               {  

                                                           
                                                             movetimebar();
                                                             timeupdater();

                                                             if(audio.currentTime==audio.duration) 
                                                              repeat();
                                               
                                               
                                                 }
                                               );

                    
                 
                                              

                  }
           function repeat()
                {   
                  initAudio($('#playlist li.active'));
                }


    function timeupdater()
    {   
      if(audio.currentTime>0){
                            
                            $('#timeduration').html(audio.duration);
                        $('#currenttime').html(audio.currentTime);
                         
                      
                              }
        }
        
        function movetimebar()
                             {
                              var value=(audio.currentTime/audio.duration)*100;
                              $('#prog').val(value); 
                             }


//play

       $(document).ready(function()
                                  {
                                     $('#play').click(function()
                                  {   $('#stop').show();
                                      audio.play();
                                      $('button#songdetail div#fadedetails').hide();
                                      $('#play').hide();
                                      $('#pause').show();
                                      $('#stop').html('stop');

                                  });
                                    });
      

///pause


            $(document).ready(function()
                                  { 
                                     $('#pause').click(function()
                                 {
                                      audio.pause();
                                      $('#pause').hide()
                                      $('#play').show();

                                 });
                                     
                                    });

///stop

         $(document).ready(function()
                                  { 
                                  $('#stop').click(function()
                                               {
                                                  audio.pause();

                                                  $('#pause').hide();
                                                  $('#play').show();
                                                  //$('#stop').html('stopped');
                                                   $('#stop').hide();
                                                  audio.currentTime=0;
                                                   $('#currenttime').html(audio.currentTime);
                                                   var valuee=(audio.currentTime/audio.duration)*100;
                                                               $('#prog').val(valuee); 
                                               });
                                     
                                  });
       

///next

          $(document).ready(function()
                                  { 
                                    $('#next').click(function()
                                 {
                                    $('#stop').show();
                                    audio.pause();
                                    $('#pause').hide()
                              $('#play').show();

                                     unsetplay('#playlist li.active');
                                  var next=$('#playlist li.active').next();////////////////////////////playlist id ke us li ko uthaao jiski
                                  $('#playlist li.active').attr("class","");///////////////gave id dynamically 
                                  if(next.length==0)/////////////////////////////class active ho aur wo class active ka next sibling ho
                                    next=$('#playlist li:first-child');
                                    initAudio(next);
                                 });
                                  
                                     
                                  });
         

///prev

        $(document).ready(function()
                                  { 
                                     $('#prev').click(function()
                                 {$('#stop').show();
                                    audio.pause(); 
                                    $('#pause').hide()
                              $('#play').show();
                                     unsetplay('#playlist li.active');
                                    var prev=$('#playlist li.active').prev();//////////////////////prev and next work for only once
                                    $('#playlist li.active').attr("class","");///////////////gave id dynamically 

                                    if(prev.length==0)
                                    prev=$('#playlist li:last-child');
                                  initAudio(prev);

                                 });
                                  });

        
///volume/////////////////////////////////////////
          $(document).ready(function()
                                  { 
                                    
                                     $('#volume').change(function()
                                   {
                                       
                                     audio.volume= (this.value)/10;

                                 });
                                  });
          $(document).ready(function()
                                  { 
                                      $('#playlist li').click(function () 
                                      { 
                                         $('div#fade').slideUp();
                                         $(this).find('#fade').slideDown();
                                        

                               });
                                  });
          $(document).ready(function()
                                  { 
                                      $('#playlist li div#fade button#songdetail').click(function () 
                                      { 
                                         $('div#fadedetails').slideUp();
                                         //$('div#fadedetails').slideDown();
                                         $(this).find('#fadedetails').slideDown();
                                        

                               });
                                  });
           $(document).ready(function()
                                  { 
                                      $('#playlist li div#fade button#recommend').click(function () 
                                      { 
                                         $('div#faderecommend').slideUp();
                                         //$('div#fadedetails').slideDown();
                                         $(this).find('#faderecommend').slideDown();
                                        

                               });
                                  });
          






//////////play song on click
          $(document).ready(function()
                                  { 
                                      $('#playlist li button#play').click(function () 
                                      {if(audio)/////////////////if phle se kuch play ho rha hai to
                                        {
                                          if(audio.currentTime)
                                          {   unsetplay('#playlist li.active');
                                          audio.pause();
                                          $('#playlist li.active').attr("class","");
                                      }
                                   }
                                 
                                 $('#stop').show();
                                 //initAudio($(this).parent().eq(2));////////////////////////i want  (this-button#play) to be parameter of initAudio
                                 initAudio($(this).closest('li'));
                              });
                                  });
          
                   $(document).ready(function()
                                  { 
                                     $('#playlist li button#recommend #submitthis').click(function ()
                                   {      
                                        
                                          $('html, body').animate({
                                                                    scrollTop: $("#recommendtores").offset().top
                                                                  }, 2000);
                                         var use= $(this).closest('div');
                                         var use2= $(use).find('input').first().val();
                                         ajaxFunction($(this).closest('li').attr('song'),use2);
                                   });
                                    
                                  });


                    $(document).ready(function()
                                  { 
                                     $('#playlist li button#addthistoplay ').click(function ()
                                   {   
                                         popupUploadForm2($(this));
                                   });
                                    
                                  });

                     $(document).ready(function()
                                  { 
                                     $('#playlist li button#deletethissong').click(function ()
                                   {   
                                         
                                            var r= confirm('Are U sure U want to Delete this song from Downloads');
                                            if(r==true)
                                            {
                                                     ajaxFunctionDelete($(this));
                                            }
                                            else
                                            {
                                              location.reload();
                                            }
                                                                                    
                                   });
                                    
                                  });
            function countdownloads()
{
if(!isset($_SESSION['user'])) header('login.php');
$dbc= mysqli_connect('localhost','root','','musicplayer');
$usersession= $_SESSION['user'];
$query= "SELECT * FROM usersong WHERE userid= '$usersession'";
$data= mysqli_query($dbc, $query);
$count= mysqli_num_rows($data);
//echo $count;
return $count;
}



    </script>
</head>
<body>


<?php
$dbc= mysqli_connect('localhost','root','','musicplayer');
include_once('countdownloads.php');
include_once('countplaylists.php');
if(isset($_SESSION['user']))
  {
    $useridd= $_SESSION['user'];
    $qry2= "SELECT * FROM user WHERE userid='$useridd'";
    $res2= mysqli_query($dbc,$qry2);
    $row2=mysqli_fetch_array($res2);
    $qry= "SELECT * FROM songs,usersong WHERE usersong.userid='$useridd' AND usersong.songid=songs.songid";
        $res= mysqli_query($dbc,$qry);

  }


?>
<div id= 'loginsignup'  style="float:right;">
<?php
if(!isset($_SESSION['user']))
{

  ?>
  <div id='login'><button id='loginbtn'><a href="login.php">Login</a></button></div>
  <div id='signup'><button id='signupbtn'><a href="register.php">Signup</a></button></div>
<?php
}
else
{
  ?>
    <div><?php echo' Hi..!! '.$row2['username'].' '?></div>
    <div><a href="index.php">Home</a></div>
     <?php echo '<div><a href="">Downloads('.countdownloads().')</a></div>';?>
   <div><input type="submit" value="Create Playlist" onclick="popupUploadForm()"/></div>
   <div><button id="yourrecommendations" onclick="popupUploadFormx()">Recommendations</button></div>
   <?php echo '<div><button id="yourplaylist" onclick="popupUploadForm3()">Playlist('.countplaylists().')</button></div>';?>
   <div id='logout'><button id='logoutbtn'><a href="logout.php">Logout</a></button></div>
<?php
}

?>
</div>

<div id="container">
      
  <div id="audio-player">
    
    
        <div id="audio-info">
      <span class="artist">Artist</span> - <span class="title">Title</span>
    </div><br>
      <div id="tracker">
      <div id="progressBar">
        <span id="progress"><input id="prog" type="range" min='0' max='100' step='1' value="0"></span>
      </div>
      <span id="currenttime">00.00</span>/<span id="timeduration">00.00</span>
    </div>
    <br>

        <div id="innercontainer">
        <div id="buttons">
     <span>
          
        <button id="prev">prev</button>
          <button id="play">play</button>
          <button id="pause">pause</button>
          <button id="stop">stop</button>
          <button id="next">next</button>
                <br>
          Volume:<br><input id="volume" type="range" min="0" max="10" value="10" step='1' />

      </span>
     </div><br>
    
     <br>

    <?php 
    if(!mysqli_num_rows($res))
    {echo '<div id="emptyplay">';
      echo 'Downloads Empty!';
      echo'<a href="index.php">Add Songs</a>';
     echo '</div>';
    } 
    else
    {
      echo '<ul id="playlist">';   
      echo '<div id="recommendtores"></div>';
      while($row= mysqli_fetch_array($res))
        {
            
         echo'<li class="" song='.$row["title"].' artist='.$row["artist"].'>
                                                                             <div id="detail">
                                                                           <div id="name">'.$row["title"].'</div>
                                                                           <div id="fade">
                                                                           <button id="play">Play</button>
                                                                           <button id="addthistoplay"  valueofit='.$row["songid"].'>Add to Playlist</button>
                                                                           <button id="deletethissong" valueofdel=" '.$row['songid'].'">Delete</button>';
                                                                           //echo $_SESSION['user'];
                                                                                 if(isset($_SESSION['user']))
                                                                                 {
                                                                                  echo '<button id="songdetail">';
                                                                                  echo 'Details';
                                                                                  echo '<div id="fadedetails"><ul>
                                                                                                        <li>Title:'.$row["title"].'</li>
                                                                                                        <li>Artist:'.$row["artist"].'</li>
                                                                                                        <li>Genre:'.$row["genre"].'</li>
                                                                                                        <li>Album:'.$row["album"].'</li>
                                                                                                       </ul>
                                                                                                       </div>';
                                                                            echo '</button>';
                                                                       
                                                                                 }

                                                                                  echo '<button id="recommend">';
                                                                            echo 'Recommend This user';
                                                                                 echo '<div id="faderecommend">';///////////////email here needs validation
                                                                                                 ?>
                                                                                                 <label>User Email:</label>
                                                                                                  <div id="recommendingthis">
                                                                                                  <input type="email" name="recommendto" id="recommendtoit">
                                                                                                  <input id='submitthis' type='submit' placeholder='email of user' >
                                                                                                  </div>
                                                                                                 
                                                                                                 <?php

                                                                                       echo '</div>';
                                                                            echo '</button>';
                                                                            echo'   
                                                                                 </div>                     
                                                                                 </div>
              </li>';
        }
        echo '</ul>';


                
                echo '<div id="emptyplay">';
        echo'<a href="index.php">Add More Songs</a>';
        echo '</div>';
        }
    ?>
   </div>
  </div>

</div>
</body>
</html>




