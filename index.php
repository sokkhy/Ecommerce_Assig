<HTML>
<HEAD>
<TITLE>4Shops</TITLE>
<link rel="icon" href="logo.png" type="image/gif" sizes="16x16">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 	
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
<BODY onscroll="myFunction()">
  <style><?php include 'style.css';?></style>
  <div id="main">
  	<?php include 'header.php';?>
	<div id="overlay"><div><img src="loading.gif" width="64px" height="64px"/></div></div>
	  <div class="page-content">
		<div id="paging-setting" style="">
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
<?php include 'footer.php';?>
<script>
getresult("getresult.php");
</script>
</BODY>
</HTML>
