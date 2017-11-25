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
# query to reset auto++ note: to reset auto++ -> ALTER TABLE table_name AUTO_INCREMENT = 1
$query_reset_autoincrement = $con->prepare("ALTER TABLE item AUTO_INCREMENT = 1");
$query_reset_autoincrement->execute();
# prepare query statement
$query_insert = $con->prepare("INSERT INTO item (item_name, item_price, item_description, item_amt) VALUES (?, ?, ?, ?)");
# define binding parameter
$item_name = $_POST["item_name"];
$item_price = $_POST["item_price"];
$item_description = $_POST["item_description"];
$item_amt = $_POST["item_amt"];
$query_insert->bind_param('sdsi', $item_name, $item_price, $item_description, $item_amt);
# run the query
$query_insert->execute();
header("location: item-select.php"); /* Redirect browser */
exit();
$con = null;
?>

</body>
</html>