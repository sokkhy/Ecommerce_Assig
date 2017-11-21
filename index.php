<HTML>
<HEAD>
<TITLE>test</TITLE>
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="style.css">
<script>
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
		getresult("getresult.php");
	}
}
</script>
</HEAD>
<BODY>
  <style><?php include 'style.css';?></style>
  <div id="main">
	<div id="sideNav" style="background-color: white; z-index: 1;">
     <span style="font-size:30px;cursor:pointer" onclick="openNav()" id="showhide">&#9776; open</span>
  

    <div id="navbar">
		  <a class="active" href="javascript:void(0)">Open</a>
		  <a href="javascript:void(0)">Nike</a>
		  <a href="javascript:void(0)">C</a>
		</div>
	</div>
	
	<div id="mySidenav" class="sidenav"> 
  	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="subManu">
  	  <a href="#">Term of Use</a>
  	  <a href="#">Privacy Policy</a>
  	  <a href="#">Terms of Use</a>
  	  <a href="#">DMCA</a>
      <a href="#">RSS Feeds</a>
    </div>
	</div>
<div id="overlay"><div><img src="loading.gif" width="64px" height="64px"/></div></div>
<div class="page-content">
	<div style="border-bottom: #F0F0F0 1px solid;margin-bottom: 15px; display: none;">
	Pagination Setting:<br> <select name="pagination-setting" onChange="changePagination(this.value);" class="pagination-setting" id="pagination-setting">
	<option value="all-links">Display All Page Link</option> 
	<!-- <option value="prev-next">Display Prev Next Only</option> -->
	</select>
	</div>
	
	<div class="row" id="pagination-result">
		<input type="hidden" name="rowcount" id="rowcount" />
	</div>
	
</div>
</div>
<script>
var navbar = document.getElementById("sideNav");
var sticky = navbar.offsetTop;


function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky");
navbar.style.marginTop = "0px";
    
  } else {
    navbar.classList.remove("sticky");
 
  }
}
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    document.getElementById("showhide").style.display = "none";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.body.style.backgroundColor = "white";
    document.getElementById("showhide").style.display = "block";
}
</script>
<script>
getresult("getresult.php");
</script>
</BODY>
</HTML>
