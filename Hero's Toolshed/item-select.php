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
<li style="float:right"><a class="active" href="item-select-safe.php">Admin</a></li>
</ul><br><br><br>

<table border=1> <tr>
<th>ID</th>
<th>Name</th>
<th>Price</th>
<th>Description</th>
<th>AMT</th>
<th>DEL</th>
<th>Edit</th>
<th>UP</th>
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
echo "<td>$item_id</td>";
echo "<td>$item_name</td>";
echo "<td>$".number_format($item_price,2)."</td>";
echo "<td>$item_description</td>";
echo "<td>$item_amt</td>";

echo "<td align=\"center\"><form action=\"item-delete.php\" method=\"post\" class=x>";
echo "<button type=\"submit\" name=\"item_id\" id=\"item_id\" value=$item_id class=\"toDeleteItem\" onclick=\"return confirm('Confirm Delete Item? Note: if performed, this will remove the entire item.')\">";
echo "✘";
echo "</button></form></td>";

echo "<td align=\"center\"><form action=\"item-update.php\" method=\"post\" class=x>";
echo "<input type=\"hidden\" name=\"item_id\" id=\"item_id\" value=$item_id>";
echo "<input type=\"number\" name=\"item_amt\" id=\"item_amt\" class=\"inputNo\" min=\"-$item_amt\">";
echo "<input type=\"submit\" value=\"+\" class=\"toUpdateItem\"></form></td>";

echo "<td align=\"center\"><form action=\"item-update-specific-form.php\" method=\"post\" class=x>";
echo "<button type=\"submit\" name=\"item_id\" id=\"item_id\" value=$item_id class=\"toDeleteItem\">";
echo "UP";
echo "</button></form></td>";

echo "</tr>";
}
echo "</table>";
$con->close();
?>

<br>
<form action="item-insert-form.php" align="center">
    <input type="submit" value="Add a new item" class=toAddItem>
</form>

</body>
</html>
<style>
form.x { margin:0; padding:0; }
</style>