<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add New</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style><?php include 'style/style.css';?></style>
</head>
<body>
	<?php include 'header.php';?>
	
	   <div class="container">


		  <form class="form-inline form" action="upload.php" method="post" enctype="multipart/form-data" style="display: inline-grid;">
		<!--   <select name="brand">
	   		<option value="adidas">Adidas</option>
	   		<option value="nike">Nike</option>
	   		<option value="gucci">Gucci</option>
	   		<option value="prada">Prada</option>
	   		<option value="supreme">Supreme</option>
	   		<option value="tommy_hilfiger">Tommy Hilfiger</option>
	   		<option value="versace">Versace</option>
	   		<option value="diesel">Diesel</option>
	   		<option value="hugo_boss">Hugo Boss</option>
	   		<option value="under_armour">Under Armour</option>
	   		<option value="puma">Puma</option>
	   	</select> -->
	   	
<?php require_once("dbcontroller.php");?>
		    <div class="form-group">
		    
		      Shirt Brand: <input type="text" class="form-control" id="shirt_name"  name="shirtname">
		    </div>
		    <div class="form-group">
		      
		      Shirt Size: <input type="text" class="form-control" name="shirtsize" id="shirt_size">
		    </div>
		    <div class="form-group">
		      
		      Price: <input type="text" class="form-control" id="shirt_price" name="price">
		    </div>
		    <div class="form-group">
		      <input type="file" name="fileToUpload" id="fileUpload">
			</div>
			  <input type="submit" value="Submit" style="width: 90px;
    margin-left: 10px;">
			<div id="image-holder">Display image</div>
		     
		   </form> 

		</div>
	<?php include 'footer.php';?>
  <script>
  $("#fileUpload").on('change', function () {

    var imgPath = $(this)[0].value;
    var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();

    if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg" || extn =="PNG" || extn =="JPG") {
        if (typeof (FileReader) != "undefined") {

            var image_holder = $("#image-holder");
            image_holder.empty();

            var reader = new FileReader();
            reader.onload = function (e) {
                $("<img />", {
                    "src": e.target.result,
                        "class": "thumb-image"
                }).appendTo(image_holder);

            }
            image_holder.show();
            reader.readAsDataURL($(this)[0].files[0]);
        } else {
            alert("This browser does not support FileReader.");
        }
    } else {
        alert("Pls select only images");
    }
});
</script>
<?php

	$host = "localhost";
	 $user = "root";
	 $password = "";
	 $database = "dbkeybest";

  $conn = new mysqli($host, $user, $password, $database);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } 
  // use prepared statment to insert data
  $stmt = $conn->prepare("INSERT INTO hugo_boss (shirtName, shirtSize, Price, image) VALUES (?, ?, ?,?)");
  $stmt->bind_param("ssss", $shirtName, $shirtSize, $Price, $image);

  //validate form 
  if(!empty($_POST['shirtname']) && !empty($_POST['shirtsize']) && !empty($_POST['price']) && !empty($_FILES["fileToUpload"]["name"])){
   
    $shirtName = $_POST["shirtname"];
    $shirtSize=$_POST["shirtsize"];
    $Price = $_POST["price"];
    $image= $_FILES["fileToUpload"]["name"];
    $stmt->execute();
    // header('Location:http://localhost:8082/4Shops/index.php');
    } 


?>
</body>
</html>