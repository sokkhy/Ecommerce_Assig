<?php
session_start();
	$host = "localhost";
	 $user = "root";
	 $password = "";
	 $database = "dbkeybest";

  $conn = new mysqli($host, $user, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


?> 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="refresh" content="0;URL='http://localhost:8082/4Shops/admin.php'" />
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	   <?php
    	$img_id = $_GET['src'];
    	$shirt_brand= $_GET['brand'];
		$sql = "DELETE FROM $shirt_brand WHERE id= $img_id";
		if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: ";
}
 ?>
</body>
</html>