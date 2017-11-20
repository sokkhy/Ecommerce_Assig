<HTML>
<HEAD>
<TITLE>AJAX Pagination with PHP</TITLE>
<style>
body{width:600px;font-family:"Helvetica Neue", HelveticaNeue, Helvetica, Arial, sans-serif;font-size:14px;}
.link {padding: 10px 15px;background: transparent;border:#bccfd8 1px solid;border-left:0px;cursor:pointer;color:#607d8b}
.disabled {cursor:not-allowed;color: #bccfd8;}
.current {background: #bccfd8;}
.first{border-left:#bccfd8 1px solid;}
.question {font-weight:bold;}
.answer{padding-top: 10px;}
#pagination{margin-top: 20px;padding-top: 30px;border-top: #F0F0F0 1px solid;}
.dot {padding: 10px 15px;background: transparent;border-right: #bccfd8 1px solid;}
#overlay {background-color: rgba(0, 0, 0, 0.6);z-index: 999;position: absolute;left: 0;top: 0;width: 100%;height: 100%;display: none;}
#overlay div {position:absolute;left:50%;top:50%;margin-top:-32px;margin-left:-32px;}
.page-content {padding: 20px;margin: 0 auto;}
.pagination-setting {padding:10px; margin:5px 0px 10px;border:#bccfd8  1px solid;color:#607d8b;}
</style>
<script src="http://code.jquery.com/jquery-2.1.1.js"></script>
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
		<style>
    <?php include 'style.css'; ?>
	</style>
	<div class="main">
	<div id="sideNav" style="background-color: white; z-index: 1;">
     <span style="font-size:30px;cursor:pointer" onclick="openNav()" id="showhide">&#9776; open</span>
  

    <div id="navbar">
		  <a class="active" href="javascript:void(0)">Home</a>
		  <a href="javascript:void(0)">News</a>
		  <a href="javascript:void(0)">Contact</a>

      <a href="about.php">About</a>
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
	<div style="border-bottom: #F0F0F0 1px solid;margin-bottom: 15px;">
	Pagination Setting:<br> <select name="pagination-setting" onChange="changePagination(this.value);" class="pagination-setting" id="pagination-setting">
	<option value="all-links">Display All Page Link</option>
	<option value="prev-next">Display Prev Next Only</option>
	</select>
	</div>
	
	<div id="pagination-result">
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
