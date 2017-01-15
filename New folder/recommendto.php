<?php
   session_start();
   if(!isset($_SESSION['user'])) header('location:login.php');
   $dbc= mysqli_connect('localhost','root','','musicplayer');
   $usersession=$_SESSION['user'];
   
   $recommendto = $_GET['recommendto'];
   $songname = $_GET['songname'];
   $sql2="SELECT songid FROM songs WHERE title='$songname'";
   $result2 = $dbc->query($sql2);

   if ($result2->num_rows ==1)
   {
      $row2=$result2->fetch_assoc();
      $songid=$row2["songid"];

   }
   $query = "SELECT * FROM user WHERE email = '$recommendto' AND userid!='$usersession'";
      
   $data= mysqli_query($dbc,$query);
   $display_string = "<table>";
   
   if(mysqli_num_rows($data))
{
   while($row = mysqli_fetch_array($data)) {
      echo $row['username'];
      $display_string .= "<tr>";
      $display_string .= "<td>$row[username]</td>";
      $display_string .= "<td>$row[email]</td>";
      $display_string .= "<td><a href='recommendthis.php?touser=$row[userid]&songid=$songid'>Recommend This User</a></td>";
      $display_string .= "</tr>";
   }
}
else
{
echo 'No Such User Exist';
}

   
   $display_string .= "</table>";
   echo $display_string;
?>