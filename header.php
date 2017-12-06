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
	  <a href="nike.php" id="nike">Nike</a>
	  <a href="gucci.php" id="gucci">Gucci</a>
	  <a href="prada.php" id="prada">Prada</a>
	  <a href="supreme.php" id="supreme">Supreme</a>
	  <a href="tommy_hilfiger.php" id="tommy_hilfiger">Tommy Hilfiger</a>
	  <a href="versace.php" id="versace">Versace</a>
	  <a href="diesel.php" id="diesel">Diesel</a>
	  <a href="hugo_boss.php" id="hugo_boss">Hugo Boss</a>
	  <a href="under_armour.php" id="udner_armour">Under Armour</a>
	  <a href="puma.php" id="puma_se">Puma SE</a>



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

