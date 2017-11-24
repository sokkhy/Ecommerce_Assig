<?php
class DBController {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "dbkeybest";
	private $conn;
	

	function __construct() {
		$this->conn = $this->connectDB();
	}
	
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}
	
	function runQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}

}
	$host = "localhost";
	 $user = "root";
	 $password = "";
	 $database = "dbkeybest";
if(isset($_POST['submit'])){
	if(!empty($_POST['brand'])){
	echo "<span>Please the Brand </span>";
	foreach ($_POST['brand'] as $brand){
 echo "<span> .$brand.</span>";
  $conn = new mysqli($host, $user, $password, $database);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } 
  // use prepared statment to insert data
  $stmt = $conn->prepare("INSERT INTO .$brand. (shirtName, shirtSize, Price, image) VALUES (?, ?, ?,?)");
  $stmt->bind_param("ssss", $shirtName, $shirtSize, $Price, $image);
  //validate form 
  if(!empty($_POST['shirtname']) && !empty($_POST['shirtsize']) && !empty($_POST['price']) && !empty($_FILES["fileToUpload"]["name"])){
   
    $shirtName = $_POST["shirtname"];
    $shirtSize=$_POST["shirtsize"];
    $Price = $_POST["price"];
    $image= $_FILES["fileToUpload"]["name"];
    $stmt->execute();
    header('Location:http://localhost:8082/4Shops/index.php');
    }
   }
  }
 }
?>