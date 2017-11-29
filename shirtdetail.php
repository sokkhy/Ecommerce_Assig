<?php
session_start();

$outputs= isset($_SESSION['output'])?$_SESSION['output']:''; //checks and sets value
echo $outputs; //outputs value

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>4Shops</title>
<link rel="icon" href="logo.png" type="image/gif" sizes="16x16">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>

	<style><?php include 'style/style.css';?></style>
	<style>
		body{
			    width: 100%;
		}
	</style>
</head>
<body>
	<div id="main">
	<?php include 'header.php';?>
		<div>
			 <?php
			 $link = str_replace(" ", '%20',$_GET['src']);
			 $name = $_GET['name'];
			 $price =$_GET['price'];
			 $output="";
			 $output.="<div class='shirtdetail'>";
			 $output.= "<div>".$name."</div>" 
			 ."<div>".$price."</div>"
			 ."<div><img src=".$link." id='pic'></div>";
			 $output.="</div>";
			 print($output);
			?>
		</div>
 </div>
<?php include 'footer.php';?>
</body>
</html>