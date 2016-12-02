<!DOCTYPE html>
<html>
<head>
<title>Submit Form Using AJAX and jQuery</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<link href="css/refreshform.css" rel="stylesheet">
<script src="script.js"></script>
</head>
<body>
<div id="mainform">
<h2>Submit Form Using AJAX and jQuery</h2> <!-- Required div Starts Here -->
<div id="form">
<h3>Fill Your Information !</h3>
<div>
<label>Name :</label>
<input id="name" type="text">
<label>Email :</label>
<input id="email" type="text">
<label>Password :</label>
<input id="password" type="password">
<label>Contact No :</label>
<input id="contact" type="text">
<input id="submit" type="button" value="Submit">
</div>
</div>
</div>
</body>
</html>
 


<?php
$connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server..
$db = mysql_select_db("mydba", $connection); // Selecting Database
//Fetching Values from URL
$name2=$_POST['name1'];
$email2=$_POST['email1'];
$password2=$_POST['password1'];
$contact2=$_POST['contact1'];
//Insert query
$query = mysql_query("insert into form_element(name, email, password, contact) values ('$name2', '$email2', '$password2','$contact2')");
echo "Form Submitted Succesfully";
mysql_close($connection); // Connection Closed
?>


<script type="text/javascript">
$(document).ready(function(){
$("#submit").click(function(){
var name = $("#name").val();
var email = $("#email").val();
var password = $("#password").val();
var contact = $("#contact").val();
// Returns successful data submission message when the entered information is stored in database.
var dataString = 'name1='+ name + '&email1='+ email + '&password1='+ password + '&contact1='+ contact;
if(name==''||email==''||password==''||contact=='')
{
alert("Please Fill All Fields");
}
else
{
// AJAX Code To Submit Form.
$.ajax({
type: "POST",
url: "ajaxsubmit.php",
data: dataString,
cache: false,
success: function(result){
alert(result);
}
});
}
return false;
});
});
 
</script>
<!--MY-SQL Code Segment:

Here is the My-SQL code for creating database and table.


CREATE DATABASE mydba;
CREATE TABLE form_element(
id int(10) NOT NULL AUTO_INCREMENT,
name varchar(255) NOT NULL,
email varchar(255) NOT NULL,
password varchar(255) NOT NULL,
contact varchar(255) NOT NULL,
PRIMARY KEY (id)
)
 CSS File: style.css


@import "http://fonts.googleapis.com/css?family=Fauna+One|Muli";-->
<style type="text/css">#form {
background-color:#fff;
color:#123456;
box-shadow:0 1px 1px 1px #123456;
font-weight:400;
width:350px;
margin:50px 250px 0 35px;
float:left;
height:500px
}
#form div {
padding:10px 0 0 30px
}
h3 {
margin-top:0;
color:#fff;
background-color:#3C599B;
text-align:center;
width:100%;
height:50px;
padding-top:30px
}
#mainform {
width:960px;
margin:50px auto;
padding-top:20px;
font-family:'Fauna One',serif
}
input {
width:90%;
height:30px;
margin-top:10px;
border-radius:3px;
padding:2px;
box-shadow:0 1px 1px 0 #123456
}
input[type=button] {
background-color:#3C599B;
border:1px solid #fff;
font-family:'Fauna One',serif;
font-weight:700;
font-size:18px;
color:#fff
}
</style>