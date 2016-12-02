<!DOCTYPE html>
<html>
<head>
    <title>HTML5 Audio Player</title>

    <style type="text/css">
    	ul li{
    		cursor: pointer;
    	}
    </style>
    <script src="js/jquery.js"></script>
    <script type="text/javascript">
    var audio, prog;
     $(document).ready(function()
                               { 
                               	    $('#playlist').hide();
                               	    $('#audio-info').hide();
                               	    $('#tracker').hide();
                               	    $('#buttons').hide();
                               	    $('div#fade').slideUp();
                            });
   $(document).ready(function()
                               { 
                               	$('#on').click(function(){ 
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
          


    </script>
</head>
<body>
<?php
$dbc= mysqli_connect('localhost','root','','musicplayer');
$qry= "SELECT * FROM songs";
$res= mysqli_query($dbc,$qry);
?>


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
		echo '<ul id="playlist">';	 
		while($row= mysqli_fetch_array($res))
		{
	      
		 echo'<li class="" song='.$row["title"].' artist='.$row["artist"].'>
		                                                                     <div id="detail">
			                                                                 <div id="name">'.$row["title"].'</div>
			                                                                 <div id="fade">
			                                                                 <button id="play">Play</button>
			                                                                 <button id="download"><a style="text-decoration:none; color:black;" href="addsong.php?file='.$row["title"].'">Download</a></button>
			                                                                 </div>                     
			                                                                 </div>
		      </li>';
		}
		echo '</ul>';

		?>
	 </div>
	</div>

</div>
</body>
</html>




