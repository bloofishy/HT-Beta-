<html>
<head>
	<title>Hero Toolshed</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
</head>

<body>
<ul>
<li><a href="item-index.php"><img src="home.png" align="top" height=15px> Hero's Toolshed</a></li>
<li><a href="#news">News</a></li>
<li><a href="#offers">Offers</a></li>
<li style="float:right"><a class="active" href="#login" onclick="document.getElementById('id01').style.display='block'">Login</a></li>
</ul><br><br><br>

<table border=1><tr>
<th>Name</th>
<th>Price</th>
<th>Description</th>
</tr>

<?php
# connect to db
$db_server = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "projectswap";
$con = mysqli_connect($db_server, $db_username, $db_password, $db_name);
# exit application if connection fail
if (mysqli_connect_errno()){ die('Could not connect: '. mysqli_connect_errno()); }
?>

<?php
# prepare query statement
$query = $con->prepare("SELECT * FROM item");
# run the query
$query->execute();
# bind the results
$query->bind_result($item_id, $item_name, $item_price, $item_description, $item_amt);
?>

<?php
# loop traverse the results
while($query->fetch())
{
echo "<tr>";
echo "<td>$item_name</td>";
echo "<td>$".number_format($item_price,2)."</td>";
echo "<td>$item_description</td>";
echo "</tr>";
}
echo "</table>";
$con->close();
?>

</body>
</html>

<html>

<body>
	<!-- The Login Modal -->
	<div id="id01" class="modal">
	<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
	<!-- The Login Modal Content -->
	<form class="modal-content animate" action="login.php" method="post">
	<h1>Login</h1>
    <div class="container">
	<label for="item_name">Username</label><br>
    <input type="text" placeholder="Enter Username" name="uname" required>
	<br>
	<label for="item_description">Password</label><br>
    <input type="password" placeholder="Enter Password" name="pword" required>
	<br>
    <input type="submit">
    </div>
	</form>
	</div>
</body>
</html>

<style>
th {background-color: #FF7D49;}
.active {background-color: #FF7D49;}
tr:nth-child(odd){background-color: rgba(255, 255, 255, 0.7);}
tr:nth-child(even){background-color: rgba(255, 255, 255, 0.7);}
tr:hover {background-color: rgba(255, 125, 73, 0.7);}
</style>

<style>
/* The Modal (Background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 50px;
	padding: 50px 0px;
}

/* The Modal (Content/Box) */
.modal-content {
    background-color: #fefefe;
    margin: 15px auto;
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
	height: 300px;
	padding-top: 40px;
}

/* The Close Button */
.close {
    /* Position it in the top right corner outside of the modal */
    position: absolute;
    right: 25px;
    top: 0; 
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

/* The Close Button (Hover) */
.close:hover, .close:focus {color: #4CAF50; cursor: pointer;}

/* Add Zoom Animation */
.animate {-webkit-animation: animatezoom 0.6s; animation: animatezoom 0.6s}
@-webkit-keyframes animatezoom {from {-webkit-transform: scale(0)} to {-webkit-transform: scale(1)}}
@keyframes animatezoom {from {transform: scale(0)} to {transform: scale(1)}}

/* Basic Design */
h1 {text-align:center; font-family: "Trebuchet MS", Arial, Helvetica, sans-serif; color: black;}
body {text-align: center;}
label {font-family: "Trebuchet MS", Arial, Helvetica, sans-serif; color: black;}
input[type=text], input[type=password] {
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    width: 50%; /* Full width */
    padding: 9px; /* Some padding */  
    border: 1px solid #ccc; /* Gray border */
    border-radius: 4px; /* Rounded borders */
    box-sizing: border-box; /* Make sure that padding and width stays in place */
    margin-top: 6px; /* Add a top margin */
    margin-bottom: 16px; /* Bottom margin */
    resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}
input[type=submit] {background-color: #4CAF50; color: white; padding: 12px 20px; border: none; border-radius: 4px; cursor: pointer;}
input[type=submit]:hover {background-color: #45a049;}
</style>