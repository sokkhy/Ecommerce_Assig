<?php
 
if(isset($_POST['Submit'])) {
  $host = "localhost";
   $user = "root";
   $password = "";
   $database = "dbkeybest";

  $conn = new mysqli($host, $user, $password, $database);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

   

$sql = "UPDATE $brand  SET shirtName ='$sName', 
shirtSize='$sSize',
Price ='$simage',
image='$simage'
where id = $shid ";
  if(!empty($_POST['sname']) && !empty($_POST['size']) && !empty($_POST['price']) && !empty($_FILES["fileToUpload"]["name"])){
    $sName = $_POST["sname"];
    $sSize=$_POST["size"];
    $sPrice = $_POST["price"];
    $simage= $_FILES["fileToUpload"]["name"];
     $stmt->execute();
  
    header('Location:http://localhost:8082/4Shops/index.php');
    } 
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
$conn->close();
}

?>
