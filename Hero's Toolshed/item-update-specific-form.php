<html>
<head>
	<title>Hero Toolshed</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
</head>

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
$query_finditeminfo = $con->prepare("SELECT item_id, item_name, item_price, item_description FROM item WHERE item_id=?");
$item_id = $_POST["item_id"];
$query_finditeminfo->bind_param('i', $item_id);
$query_finditeminfo->execute();
$query_finditeminfo->bind_result($item_id, $item_name, $item_price, $item_description);
$query_finditeminfo->fetch();
?>

<body>
	<div class="container">
	<form action="item-update-specific.php" method="post">
	<h1>Update Item</h1>
	<p>Existing Info:</p>
	<p><?php echo "$item_name"; ?> ($<?php echo "$item_price"; ?>): <?php echo "$item_description"; ?></p>
	<label for="item_name">New Name</label>
	<input type="text" name="item_name" placeholder="What's the name?" value="<?php echo "$item_name"; ?>" required>
	<label for="item_price">New Price</label>
	<input type="number" step="0.01" min="0" name="item_price" placeholder="What's the unit price?" value="<?php echo "$item_price"; ?>" required>
	<label for="item_description">New Description</label>
	<input type="text" name="item_description" placeholder="What's it about?" value="<?php echo "$item_description"; ?>" required>
	<input type="hidden" name="item_id" value="<?php echo "$item_id"; ?>">
	<input type="submit" value="Submit">
	</form>
	</div>
</body>
</html>
<style>
/* CSS */
h1 {text-align:center; color: white;}
p {text-align:center; color: white;}
body {text-align: left;}
label {font-family: "Trebuchet MS", Arial, Helvetica, sans-serif; color: white;}
input[type=text], input[type=number] {
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    width: 100%; /* Full width */
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
.container {border-radius: 5px; background-color: rgba(0, 0, 0, 0.3); text-shadow:3px 3px 3px #000000; padding: 20px;}
</style>