<html>
<head>
<script>
function showUser(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }

}
</script>
</head>
<body>

<form>
<select name="users" onchange="showUser(this.value)">
<option value="">Select a person:</option>
<option value="versace">versace</option>
<option value="hugo_boss">hugo_boss</option>
<option value="prada">prada</option>
<option value="puma">puma</option>
</select>
</form>
<br>
<div id="txtHint"><b>Person info will be listed here.</b></div>

	   <div class="container">


		<form class="form-inline form" action="upload.php" method="post" enctype="multipart/form-data" style="display: inline-grid;">
			
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
	<!-- <?php //include 'footer.php';?> -->
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
$q=$_GET["q"];
echo "$q";
 $stmt = $conn->prepare("INSERT INTO ".$q." (shirtName, shirtSize, Price, image) VALUES (?, ?, ?,?)");
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
$conn->close();
?>
</body>
</html> 