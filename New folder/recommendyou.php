<!DOCTYPE html>
<html>
<head>
    <title>HTML5 Audio Player</title>

    <style type="text/css">
    	ul li{
    		cursor: pointer;
    	}
      input
      {
          cursor: pointer;  
      }
    </style>
    <?php
    
    include_once('createplay.php');
    ?>
    <script src="js/jquery.js"></script>

    <script language = "javascript" type = "text/javascript">
        
        function popupUploadForm()
        {
           var newWindow = window.open('/mylearning/mp3player/createplaylists.php', 'name', 'height=500,width=600');
        }

        function ajaxFunction(ele){
           var ajaxRequest;  
           var recommendto = document.getElementById('recommendto').value;
           var songname= ele.attr('song');
           var queryString = "?recommendto=" + recommendto  + "&songname=" + songname;
          

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
           
           ajaxRequest.open("GET", "recommendto.php" + queryString, true);
           ajaxRequest.send(null);

           ajaxRequest.onreadystatechange = function(){
              if(ajaxRequest.readyState == 4){
                 var ajaxDisplay = document.getElementById('recommendtores');
                 ajaxDisplay.innerHTML = ajaxRequest.responseText;//what is this?
              }
           }
           
		}
  
    var audio, prog;
     $(document).ready(function()
                               {    $('#emptyplay').hide();
                               	    $('#playlist').hide();
                               	    $('#audio-info').hide();
                               	    $('#tracker').hide();
                               	    $('#buttons').hide();
                               	    $('div#fade').slideUp();
                               	    $('div#fadedetails').slideUp();
                               	    $('div#faderecommend').slideUp();
                            });
   $(document).ready(function()
                               { 
                               	$('#on').click(function(){ $('#emptyplay').show();
                                                           $('#pause').hide();
                                                           $('#on').hide();
    	                                                   $('#playlist').show();
    	                                                   $('#audio-info').show();
                                                     	   $('#tracker').show();
                                                     	   $('#buttons').show();
                                                           
    	                                                })
                            });


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
						            	/*

					                                     	if(audio.currentTime>0)
					                                        {
					                                        	
	                                                            var timedurationsec= Math.floor(audio.duration%60);
															    var timedurationmin= Math.floor((audio.duration-(sec*60))/60);
															    var currenttimesec= Math.floor(audio.currentTime%60);
															    var currenttimemin= Math.floor((audio.currentTime-(sec*60))/60);
															    if(timedurationsec<10){timedurationsec='0'+timedurationsec;}
															    if(timedurationmin<10){timedurationmin='0'+timedurationmin;}
															    if(currenttimesec)<10{currenttimesec='0'+currenttimesec;}
															    if(currenttimemin)<10{currenttimemin='0'+currenttimemin;}
								                                $('#timeduration').html(timedurationmin+':'+timedurationsec);/////ye to fix hai for each song
								                                $('#currenttime').html(currenttimemin+':'+currenttimesec);

                                                           }
                                                            
                                            */
											
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
	                                 {   alert('ffb');
                                         ajaxFunction($(this).closest('li'));
	                                 });
                                    
                                  });
            



    </script>
</head>
<body>


<?php
$dbc= mysqli_connect('localhost','root','','musicplayer');
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
    <div><a href="myrecommend.php">Go To Your Recommendations</a></div>
    <div><a href="index.php">Go To Home</a></div>
    <div><a href="yourdownload.php">Go To Your Downloads</a></div>
    <div><input type="submit" value="Create Playlist" onclick="popupUploadForm()"/></div>
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
		<div id="switchbutton">
		<button id="on">Switch ON</button>
		</div>
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
			echo 'Your PLaylist Is Empty!';
			echo'<a href="index.php">Add Songs</a>';
		 echo '</div>';
		}	
		else
		{
			echo '<ul id="playlist">';	 
			while($row= mysqli_fetch_array($res))
				{
			      
				 echo'<li class="" song='.$row["title"].' artist='.$row["artist"].'>
				                                                                     <div id="detail">
					                                                                 <div id="name">'.$row["title"].'</div>
					                                                                 <div id="fade">
					                                                                 <button id="play">Play</button>';
					                                                                 
					                                                                 //echo $_SESSION['user'];
		                                                                             if(isset($_SESSION['user']))
		                                                                             {
		                                                                              echo '<button id="songdetail">';
					                                                                  echo 'Details';
					                                                                       echo '<div id="fadedetails"><ul>
					                                                                                              <li>'.$row["title"].'</li>
					                                                                                              <li>'.$row["artist"].'</li>
					                                                                                              <li>'.$row["genre"].'</li>
					                                                                                              <li>'.$row["album"].'</li>
					                                                                                             </ul>
					                                                                                             </div>';
					                                                                  echo '</button>';
					                                                             
		                                                                             }

		                                                                              echo '<button id="recommend">';
					                                                                  echo 'Recommend This user';
					                                                                       echo '<div id="faderecommend">';///////////////email here needs validation
                                                                                                 ?>
                                                                                                 <label>User Email:</label>
                                                                                                  <input type="email" name="recommendto" id="recommendto">
                                                                                                  <input id='submitthis' type='submit' placeholder='email of user' >
                                                                                                  <div id='recommendtores'></div>
                                                                                                 <?php

					                                                                             echo '</div>';
					                                                                  echo '</button>';
		                                                                           /* 
		                                                                             else
		                                                                             {
		                                                                               echo '<button id= "details">';
		                                                                               
		                                                                               echo'</button>';

		                                                                             }
					                                                                 */   echo'   
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




