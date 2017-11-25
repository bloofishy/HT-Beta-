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
$query_delete = $con->prepare("DELETE FROM item WHERE item_id=?");
# define binding parameter
$item_id = $_POST["item_id"];
$query_delete->bind_param('i', $item_id);
# run the query
$query_delete->execute();
header("location: item-select.php"); /* Redirect browser */
exit();
$con = null;
?>

</body>
</html>