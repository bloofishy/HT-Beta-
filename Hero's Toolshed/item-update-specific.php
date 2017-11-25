<!--PHP Script File-->
<html>
<body>

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
$query_update= $con->prepare("UPDATE item SET item_name=?, item_price=?, item_description=? WHERE item_id=?");
# define binding parameter
$item_name = $_POST["item_name"];
$item_price = $_POST["item_price"];
$item_description = $_POST["item_description"];
$item_id = $_POST["item_id"];
$query_update->bind_param('sdsi', $item_name, $item_price, $item_description, $item_id);
# run the query
$query_update->execute();
header("location: item-select.php"); /* Redirect browser */
exit();
$con = null;
?>

</body>
</html>