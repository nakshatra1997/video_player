<?php
   
   $dbc= mysqli_connect('localhost','root','','musicplayer');


   $recommendto = $_GET['recommendto'];
   
   echo $recommendto;
 
   $query = "SELECT * FROM user WHERE email = '$recommendto'";
      
   $data= mysqli_query($dbc,$query);
   $display_string="<table>";
   if(mysqli_num_rows($data))
{   
     
     $display_string .= "<tr>";
     $display_string .= "<th>Username</th>";
     $display_string .= "<th>Email</th>";
     $display_string .= "<th>Recommend</th>";
     $display_string .= "</tr>";
   while($row = mysqli_fetch_array($data)) {
      $display_string .= "<tr>";
      $display_string .= "<td>$row[name]</td>";
      $display_string .= "<td>$row[email]</td>";
      $display_string .= "<td><a href='#'>Recommend</a></td>";
      $display_string .= "</tr>";
   }
}

   
   $display_string .= "</table>";
   echo $display_string;
?>