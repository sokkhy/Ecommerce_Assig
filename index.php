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


?> 
<HTML>
<HEAD>
<TITLE>4Shops</TITLE>
<link rel="icon" href="logo.png" type="image/gif" sizes="16x16">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<!-- <link rel="stylesheet" href="style/style.css"> -->

	<style><?php include 'style/style.css';?></style>
	<style>
		body{
			    width: 100%;
		}
		hr.style-four {
padding: 0;
border: none;
border-top: medium double #333;
color: #333;
text-align: center;
margin-top: 57px;
width: 93%;
}
hr.style-four:after {
    content: attr(data-content);
    display: inline-block;
    position: relative;
    top: -35px;
    font-size: 2.5em;
    padding: 0 0.25em;
    background: #919400;
    height: 54px;
    border-radius: 17px;
}
.button {
     background-color: #4CAF50;
    border: none;
    color: white;
    padding: 13px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    width: 131px;
    border-radius: 12px;  
}
.button:hover{
	background: darkgreen;
	padding: 13px 20px;
	color: white;
	width: 131px;
	text-decoration: none;
}
.show{
	    margin-left: 40px;
	     }
#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  border: none;
  outline: none;
  background-color: red;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 10px;
}

#myBtn:hover {
  background-color: #555;
}
	</style>



<!-- <script>
function getresult(url) {
	$.ajax({
		url: url,
		type: "GET",
		data:  {rowcount:$("#rowcount").val(),"pagination_setting":$("#pagination-setting").val()},
		beforeSend: function(){$("#overlay").show();},
		success: function(data){
		$("#pagination-result").html(data);
		setInterval(function() {$("#overlay").hide(); },500);
		},
		error: function() 
		{} 	        
   });
}
function changePagination(option) {
	if(option!= "") {
		getresult("all_getresult.php");
	}
}
</script> -->
</HEAD>
<BODY onscroll="myFunction()">
  
<div id="main">
<?php include 'header.php';?>
	<div class="show show_adidas">
		<hr class="style-four" data-content="ADIDAS">
		
			<?php
			$output ="";
			$sql = "SELECT * FROM adidas LIMIT 6";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
			$output.="<div class='row'>";
			while($row = $result->fetch_assoc()) {

			$output.= "<div class='col-md-4'>".
							"<span class='shirt'> Shirt_code: ". $row["id"]. "</span></br>".
							"<span class='shirt'>Brand: ". $row["shirtName"]."</span></br>".
							"<span class='shirt'>Size: ". $row["shirtSize"]."</span></br>".
							"<span class='shirt'>Price: <span>". $row["Price"]."</span>"."</span></br>".
							"<span><img class='imgshirt' style='width:60%;' src='uploads/".$row['image']."'/></span>".			
							"</div>";
			 }
			} else {
			echo "No Data";
			}
			$output.="</div>";
			print($output);
?>
	<div style="margin-left: 633px;margin-top: 34px;">
		<a href="http://localhost:8082/4Shops/adidas.php" class="button">More Adidas</a>
	</div>
</div>
	<div class="show show_nike">
		<hr class="style-four" data-content="NIKE">
		<?php
			$output ="";
			$sql = "SELECT * FROM nike LIMIT 6";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				$output.="<div class='row'>";
			 while($row = $result->fetch_assoc()) {

			$output.= "<div class='col-lg-4'>".
							"<span class='shirt'> Shirt_code: ". $row["id"]. "</span></br>".
							"<span class='shirt'>Brand: ". $row["shirtName"]."</span></br>".
							"<span class='shirt'>Size: ". $row["shirtSize"]."</span></br>".
							"<span class='shirt'>Price: <span>". $row["Price"]."</span>"."</span></br>".
							"<span><img class='imgshirt' style='width:60%;' src='uploads/".$row['image']."'/></span>".			
					  "</div>";
			    }
			} else {
			    echo "No Data";
			}
			$output.="</div>";
			 print($output);
?>
	<div style="margin-left: 633px;margin-top: 34px;">
		<a href="http://localhost:8082/4Shops/nike.php" class="button">More Nike</a>
	</div>
	</div>
	<div class="show show_gucci">
		<hr class="style-four" data-content="GUCCI">
		<?php
			$output ="";
			$sql = "SELECT * FROM gucci LIMIT 6";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				$output.="<div class='row'>";
			 while($row = $result->fetch_assoc()) {

			$output.= "<div class='col-lg-4'>".
							"<span class='shirt'> Shirt_code: ". $row["id"]. "</span></br>".
							"<span class='shirt'>Brand: ". $row["shirtName"]."</span></br>".
							"<span class='shirt'>Size: ". $row["shirtSize"]."</span></br>".
							"<span class='shirt'>Price: <span>". $row["Price"]."</span>"."</span></br>".
							"<span><img class='imgshirt' style='width:60%;' src='uploads/".$row['image']."'/></span>".			
					  "</div>";

			    }
			} else {
			    echo "No Data";
			}
			$output.="</div>";
			 print($output);
?>		
	<div style="margin-left: 633px;margin-top: 34px;">
		<a href="http://localhost:8082/4Shops/gucci.php" class="button">More Gucci</a>
	</div>
	</div>
	<div class="show show_prada">
		<hr class="style-four" data-content="PRADA">
		<?php
			$output ="";
			$sql = "SELECT * FROM prada LIMIT 6";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				$output.="<div class='row'>";
			 while($row = $result->fetch_assoc()) {

			$output.= "<div class='col-lg-4'>".
							"<span class='shirt'> Shirt_code: ". $row["id"]. "</span></br>".
							"<span class='shirt'>Brand: ". $row["shirtName"]."</span></br>".
							"<span class='shirt'>Size: ". $row["shirtSize"]."</span></br>".
							"<span class='shirt'>Price: <span>". $row["Price"]."</span>"."</span></br>".
							"<span><img class='imgshirt' style='width:60%;' src='uploads/".$row['image']."'/></span>".			
					  "</div>";

			    }
			} else {
			    echo "No Data";
			}
			$output.="</div>";
			 print($output);
?>
	<div style="margin-left: 633px;margin-top: 34px;">
		<a href="http://localhost:8082/4Shops/prada.php" class="button">More Prada</a>
	</div>
	</div>
	<div class="show show_supreme">
		<hr class="style-four" data-content="SUPREME">
		<?php
			$output ="";
			$sql = "SELECT * FROM supreme LIMIT 6";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				$output.="<div class='row'>";
			 while($row = $result->fetch_assoc()) {

			$output.= "<div class='col-lg-4'>".
							"<span class='shirt'> Shirt_code: ". $row["id"]. "</span></br>".
							"<span class='shirt'>Brand: ". $row["shirtName"]."</span></br>".
							"<span class='shirt'>Size: ". $row["shirtSize"]."</span></br>".
							"<span class='shirt'>Price: <span>". $row["Price"]."</span>"."</span></br>".
							"<span><img class='imgshirt' style='width:60%;' src='uploads/".$row['image']."'/></span>".			
					  "</div>";

			    }
			} else {
			    echo "No Data";
			}
			$output.="</div>";
			 print($output);
?>
	<div style="margin-left: 633px;margin-top: 34px;">
		<a href="http://localhost:8082/4Shops/supreme.php" class="button" style="width: 145px;">More Supreme</a>
	</div>
	</div>
	<div class="show show_tommy_hilfiger">
		<hr class="style-four" data-content="TOMMY HILFIGER">
		<?php
			$output ="";
			$sql = "SELECT * FROM tommy_hilfiger LIMIT 6";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				$output.="<div class='row'>";
			 while($row = $result->fetch_assoc()) {

			$output.= "<div class='col-lg-4'>".
							"<span class='shirt'> Shirt_code: ". $row["id"]. "</span></br>".
							"<span class='shirt'>Brand: ". $row["shirtName"]."</span></br>".
							"<span class='shirt'>Size: ". $row["shirtSize"]."</span></br>".
							"<span class='shirt'>Price: <span>". $row["Price"]."</span>"."</span></br>".
							"<span><img class='imgshirt' style='width:60%;' class='img class='imgshirt' style='width:60%;'shirt' src='uploads/".$row['image']."'/></span>".			
					  "</div>";

			    }
			} else {
			    echo "No Data";
			}
			$output.="</div>";
			 print($output);
?><div style="margin-left: 633px;margin-top: 34px;">
		<a href="http://localhost:8082/4Shops/tommy_hilfiger.php" class="button" style="width: 193px;">More Tommy Hilfiger</a>
	</div>
	</div>
	<div class="show show_versace">
		<hr class="style-four" data-content="VERSACE">
		<?php
			$output ="";
			$sql = "SELECT * FROM versace LIMIT 6";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				$output.="<div class='row'>";
			 while($row = $result->fetch_assoc()) {

			$output.= "<div class='col-lg-4'>".
							"<span class='shirt'> Shirt_code: ". $row["id"]. "</span></br>".
							"<span class='shirt'>Brand: ". $row["shirtName"]."</span></br>".
							"<span class='shirt'>Size: ". $row["shirtSize"]."</span></br>".
							"<span class='shirt'>Price: <span>". $row["Price"]."</span>"."</span></br>".
							"<span><img class='imgshirt' style='width:60%;' src='uploads/".$row['image']."'/></span>".			
					  "</div>";

			    }
			} else {
			    echo "No Data";
			}
			$output.="</div>";
			 print($output);
?>
	<div style="margin-left: 633px;margin-top: 34px;">
		<a href="http://localhost:8082/4Shops/versace.php" class="button" style="width: 139px;">More Versace</a>
	</div>
	</div>
	<div class="show show_diesel">
		<hr class="style-four" data-content="DIESEL">
		<?php
			$output ="";
			$sql = "SELECT * FROM diesel LIMIT 6";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				$output.="<div class='row'>";
			 while($row = $result->fetch_assoc()) {

			$output.= "<div class='col-lg-4'>".
							"<span class='shirt'> Shirt_code: ". $row["id"]. "</span></br>".
							"<span class='shirt'>Brand: ". $row["shirtName"]."</span></br>".
							"<span class='shirt'>Size: ". $row["shirtSize"]."</span></br>".
							"<span class='shirt'>Price: <span>". $row["Price"]."</span>"."</span></br>".
							"<span><img class='imgshirt' style='width:60%;' src='uploads/".$row['image']."'/></span>".			
					  "</div>";

			    }
			} else {
			    echo "No Data";
			}
			$output.="</div>";
			 print($output);
?>
	<div style="margin-left: 633px;margin-top: 34px;">
		<a href="http://localhost:8082/4Shops/diesel.php" class="button">More Diesel</a>
	</div>
	</div>
	<div class="show show_hugo_boss">
		<hr class="style-four" data-content="HUGO BOSS">
		<?php
			$output ="";
			$sql = "SELECT * FROM hugo_boss LIMIT 6";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				$output.="<div class='row'>";
			 while($row = $result->fetch_assoc()) {

			$output.= "<div class='col-lg-4'>".
							"<span class='shirt'> Shirt_code: ". $row["id"]. "</span></br>".
							"<span class='shirt'>Brand: ". $row["shirtName"]."</span></br>".
							"<span class='shirt'>Size: ". $row["shirtSize"]."</span></br>".
							"<span class='shirt'>Price: <span>". $row["Price"]."</span>"."</span></br>".
							"<span><img class='imgshirt' style='width:60%;' src='uploads/".$row['image']."'/></span>".			
					  "</div>";

			    }
			} else {
			    echo "No Data";
			}
			$output.="</div>";
			 print($output);
?>
	<div style="margin-left: 633px;margin-top: 34px;">
		<a href="http://localhost:8082/4Shops/hugo_boss.php" class="button" style="width: 159px;">More Hugo Boss</a>
	</div>
	</div>
	<div class="show show_under_armour">
		<hr class="style-four" data-content="UNDER ARMOUR">
		<?php
			$output ="";
			$sql = "SELECT * FROM under_armour LIMIT 6";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				$output.="<div class='row'>";
			 while($row = $result->fetch_assoc()) {

			$output.= "<div class='col-lg-4'>".
							"<span class='shirt'> Shirt_code: ". $row["id"]. "</span></br>".
							"<span class='shirt'>Brand: ". $row["shirtName"]."</span></br>".
							"<span class='shirt'>Size: ". $row["shirtSize"]."</span></br>".
							"<span class='shirt'>Price: <span>". $row["Price"]."</span>"."</span></br>".
							"<span><img class='imgshirt' style='width:60%;' src='uploads/".$row['image']."'/></span>".			
					  "</div>";
			    }
			} else {
			    echo "No Data";
			}
			$output.="</div>";
			 print($output);
?>
<div style="margin-left: 633px;margin-top: 34px;">
		<a href="http://localhost:8082/4Shops/under_armour.php" class="button" style="width: 190px;">More Under Armour</a>
	</div>
	</div>
	<div class="show show_puma">
		<hr class="style-four" data-content="PUMA SE">
		<?php
			$output ="";
			$sql = "SELECT * FROM puma LIMIT 6";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				$output.="<div class='row'>";
			 while($row = $result->fetch_assoc()) {

			$output.= "<div class='col-lg-4'>".
							"<span class='shirt'> Shirt_code: ". $row["id"]. "</span></br>".
							"<span class='shirt'>Brand: ". $row["shirtName"]."</span></br>".
							"<span class='shirt'>Size: ". $row["shirtSize"]."</span></br>".
							"<span class='shirt'>Price: <span>". $row["Price"]."</span>"."</span></br>".
							"<span><img class='imgshirt' style='width:60%;' src='uploads/".$row['image']."'/></span>".			
					  "</div>";

			    }
			} else {
			    echo "No Data";
			}
			$output.="</div>";
			 print($output);
?>
	<div style="margin-left: 633px;margin-top: 34px;">
		<a href="http://localhost:8082/4Shops/puma.php" class="button" style="width: 146px;">More Puma SE</a>
	</div>
	</div>
<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
</div>
 <script>
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>
<?php include 'footer.php';?>
<!-- <script>
getresult("all_getresult.php");
</script> -->


</BODY>
</HTML>
