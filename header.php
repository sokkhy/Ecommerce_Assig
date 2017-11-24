<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<!-- <link rel="stylesheet" href="style/style.css"> -->
	<style>
		.sticky{
			position: fixed;
  			top: 0;
			width: 100%;
		}
	</style>
</head>
<body>
	<div class="mainlogo" style="width: 93%;
    background: rgb(208, 15, 15);">
		<img src="image/mainlogo.png" alt="" style="width: 20%;margin-bottom:auto;">
	</div>
	<div id="navbar" style="z-index: 1;width: 93%;">
	  <a href="index.php">Home</a>
	  <a href="adidas.php" id="adidas">Adidas</a>
	  <a href="javascript:void(0)" id="nike">Nike</a>
	  <a href="javascript:void(0)" id="gucci">Gucci</a>
	  <a href="javascript:void(0)" id="prada">Prada</a>
	  <a href="javascript:void(0)" id="supreme">Supreme</a>
	  <a href="javascript:void(0)" id="tommy_hilfiger">Tommy Hilfiger</a>
	  <a href="javascript:void(0)" id="versace">Versace</a>
	  <a href="javascript:void(0)" id="diesel">Diesel</a>
	  <a href="javascript:void(0)" id="hugo_boss">Hugo Boss</a>
	  <a href="javascript:void(0)" id="udner_armour">Under Armour</a>
	  <a href="javascript:void(0)" id="puma_se">Puma SE</a>



	</div>
<script>
var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky");
    navbar.style.top ='-110px';
    navbar.style.width ='93%';
    navbar.style.marginTop="110px";
  } else {
    navbar.classList.remove("sticky");
    navbar.style.width ='93%';
    navbar.style.marginTop="0";
  }
}

</script>
	
</body>
</html>

