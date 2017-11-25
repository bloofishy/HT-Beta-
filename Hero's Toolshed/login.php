<html>
<body>
<?php
# create a session_cache_expire
session_start();
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
$query_getuid = $con->prepare("SELECT id, role FROM user WHERE username LIKE ? AND password = ?");
$uname = $_POST['uname'];
$pword = $_POST['pword'];
$query_getuid->bind_param('ss', $uname, $pword);
$query_getuid->execute();
$query_getuid->bind_result($id, $role);
$query_getuid->store_result();
$row = $query_getuid->num_rows;

if ( $row == 0 )
{
	$con->close();
	session_destroy();
	echo '<script type="text/javascript">'; 
	echo 'alert("Invalid Login Credentials.");'; 
	echo 'window.location.href = "item-select-safe.php";';
	echo '</script>';
}
else
{
	while($query_getuid->fetch())
	{
		header("location: item-select.php");
	}
}

?>


</body>
</html>
