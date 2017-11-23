<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
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
		<img src="mainlogo.png" alt="" style="width: 20%;margin-bottom:auto;">
	</div>
	<div id="navbar" style="z-index: 1;width: 93%;">
	  <a class="active" href="javascript:void(0)">Home</a>
	  <a href="javascript:void(0)">Product</a>
	  <a href="javascript:void(0)"></a>
	</div>
<script>
var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky");
    navbar.style.top ='-110px';
    navbar.style.width ='72.4%';
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

