
<?php
  session_start();

  $host = "localhost";
   $user = "root";
   $password = "";
   $database = "dbkeybest";

  $conn = new mysqli($host, $user, $password, $database);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

	$_id = $_GET["idU"];
    $_size=$_GET["SU"];
    $_name = $_GET["NU"];
    $_price=$_GET["PU"];
    $_img= $_GET["IU"];   
    $_brand=$_GET["brand"];
$sql = "UPDATE  $_brand SET shirtName ='$_name', 
shirtSize='$_size',
Price ='$_price',
image='$_img'
where id = '$_id' ";
  if(!empty($_POST['sname']) && !empty($_POST['size']) && !empty($_POST['price']) && !empty($_FILES["fileToUpload"]["name"])){
    $sName = $_POST["shirtname"];
    $sSize=$_POST["shirtsize"];
    $sPrice = $_POST["shirtprice"];
    $simage= $_FILES["fileToUpload"]["name"];
     $sql->execute();
    
    } 
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    header('Location:http://localhost:8082/4Shops/admin.php');
} else {
    echo "Error updating record: " . $conn->error;
}
$conn->close();


?>