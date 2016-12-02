<!DOCTYPE html>
<html>
<head>
<title>Submit Form Using AJAX PHP and javascript</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<link href="css/style.css" rel="stylesheet">
<script src="script.js"></script>
</head>
<body>
<div id="mainform">
<div class="innerdiv">
<h2>Submit Form Using AJAX,PHP and javascript</h2>
<!-- Required Div Starts Here -->
<form id="form" name="form">
<h3>Fill Your Information!</h3>
<div>
<label>Name :</label>
<input id="name" type="text">
<label>Email :</label>
<input id="email" type="text">
<label>Password :</label>
<input id="password" type="password">
<label>Contact No :</label>
<input id="contact" type="text">
<input id="submit" onclick="myFunction()" type="button" value="Submit">
</div>
</form>
<div id="clear"></div>
</div>
<div id="clear"></div>
</div>
</body>
</html>



<?php
// Fetching Values From URL
$name2 = $_POST['name1'];
$email2 = $_POST['email1'];
$password2 = $_POST['password1'];
$contact2 = $_POST['contact1'];
$connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server..
$db = mysql_select_db("mydba", $connection); // Selecting Database
if (isset($_POST['name1'])) {
$query = mysql_query("insert into form_element(name, email, password, contact) values ('$name2', '$email2', '$password2','$contact2')"); //Insert Query
echo "Form Submitted succesfully";
}
mysql_close($connection); // Connection Closed
?>

<script type="text/javascript">

function myFunction() {
var name = document.getElementById("name").value;
var email = document.getElementById("email").value;
var password = document.getElementById("password").value;
var contact = document.getElementById("contact").value;
// Returns successful data submission message when the entered information is stored in database.
var dataString = 'name1=' + name + '&email1=' + email + '&password1=' + password + '&contact1=' + contact;
if (name == '' || email == '' || password == '' || contact == '') {
alert("Please Fill All Fields");
} else {
// AJAX code to submit form.
$.ajax({
type: "POST",
url: "ajaxjs.php",
data: dataString,
cache: false,
success: function(html) {
alert(html);
}
});
}
return false;
}
</script>
<!--MY-SQL Code Segment:

Here is the My-SQL code for creating database and table.


CREATE DATABASE mydba;
CREATE TABLE form_element(
student_id int(10) NOT NULL AUTO_INCREMENT,
student_name varchar(255) NOT NULL,
student_email varchar(255) NOT NULL,
student_contact varchar(255) NOT NULL,
student_address varchar(255) NOT NULL,
PRIMARY KEY (student_id)
);
CSS File: style.css


@import url(https://fonts.googleapis.com/css?family=Fauna+One|Muli);
/*//to load google fonts in our page.*/-->
<style type="text/css">#form{
background-color:white;
color:#123456;
box-shadow:0px 1px 1px 1px gray;
font-Weight:400;
width:350px;
margin:50px 250px 0 50px;
float:left;
height:500px;
}
#form div{
padding:10px 0 0 30px;
}
h3{
margin-top:0px;
color:white;
background-color:forestgreen;
text-align:center;
width:100%;
height:50px;
padding-top:30px;
}
#mainform{
width:960px;
margin:20px auto;
padding-top:20px;
font-family: 'Fauna One', serif;
}
#mainform h2{
width:100%; float:left;
}
input{
width:90%;
height:30px;
margin-top:10px;
border-radius:3px;
padding:2px;
box-shadow:0px 1px 1px 0px darkgray;
}
.innerdiv{
width:65%; float:left;
}
input[type=button]{
background-color:forestgreen;
border:1px solid white;
font-family: 'Fauna One', serif;
font-Weight:bold;
font-size:18px;
color:white;
}
#clear{clear:both;
}
/*CSS for right side advertizement*/
#formget{
float:right;
width:30%;
margin-top:30px;
}
</style>