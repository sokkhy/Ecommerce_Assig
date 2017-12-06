
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
$brand = $_GET['brand'];
  $shid = $_GET['idU'];
 $sql = "SELECT * FROM $brand where id = $shid";
 $result = $conn->query($sql);
$row = $result->fetch_assoc();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style><?php include 'style/style.css';?></style>
</head>
<body>
<?php
$output ="";
$i=0;
$result = $conn->query($sql);
if ($result->num_rows > 0) {

   $output.= "<form class='form-inline form' action='' method='post' enctype='multipart/form-data' style='display: inline-grid;''>";
      
 while($row = $result->fetch_assoc()) {

    $i++;
       $output.= "Shirt Name: <input type='text' class='form-control' id='shirt_id".$i."''  name='shirtid' value='".$row["id"]."' readonly>".
        "Shirt Size: <input type='text' class='form-control' id='shirt_size".$i."''  name='shirtsize' value='".$row["shirtSize"]."'>".
          "Shirt Name: <input type='text' class='form-control' id='shirt_name".$i."''  name='shirtname' value='".$row["shirtName"]."'>".
          "Shirt Price: <input type='text' class='form-control' id='shirt_price".$i."''  name='shirtprice' value='".$row["Price"]."'>".
        "<td><img class='shi_img shirtimage".$i."'' src='uploads/".$row['image']."'/></td>".
        "<td>". $row["RegisterDate"]."</td>".
        "<input type='button' id='submit".$i."' style='width: 90px;'>".
        " <input type='file' name='fileToUpload' id='fileUpload'>".
        "<div id='image-holder'>Display image</div>";
      
    $output.="<script>
              $(document).ready(function(){
    $('#submit".$i."').click(function(){

              var idUpdate = $('#shirt_id".$i."').val();  
                               var priceUpdate = $('#shirt_price".$i."').val();  
                               var sizeUpdate =  $('#shirt_size".$i."').val();   
                               var nameUpdate =  $('#shirt_name".$i."').val(); 
                               var imgUpate = $('.shirtimage".$i."').attr('src');    
                               window.location.href = 'http://localhost:8082/4Shops/test.php?idU='+idUpdate+'&SU='+sizeUpdate+'&NU='+nameUpdate+'&IU='+imgUpate+'&PU='+priceUpdate+'&brand='+'nike';      

    });

  })
  </script>




    ";
      }
  } else {
    echo "No Data";
}
$output.="</form>";
 print($output);


?>

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

</body>
</html>
<?php
if(isset($_POST["submit"])) {

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_file)) {
    //echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 3000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "PNG" && $imageFileType != "JPG"  ) {
    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    //echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
       header('Location: http://localhost:8082/4Shops/addnew.php');
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
 }
}
?>
