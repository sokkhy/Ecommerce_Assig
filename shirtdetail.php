<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>4Shops</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
	<?php include 'style/style.css';?>
	</style>
</head>
<body>
	<script>
		<script>
function getresult(url) {
	$.ajax({
		url: url,
		type: "GET",
		data:  {
			rowcount:$("#rowcount").val(),"pagination_setting":$("#pagination-setting").val()
		},
		beforeSend: function(){$("#overlay").show();},
		success: function(data){
			// buy_now(data);
		
			
		},

		error: function() 
		{},
		

   });
}
function changePagination(option) {
	if(option!= "") {
		getresult("adidas_getresult.php");
	}
}

// function buy_now(){
// 	var img= <?php //echo json_encode($query); ?>
// 	$.each(img, function(b,c){
// 		var a = $(".buy_now").attr('src');
// 	alert(a);
// 	})
		
// }
</script>
	</script>
<div>
	<img src="" id="pic">

</div>
	








<script>
	<?php
include("adidas_getresult.php");
?>
</script>
</body>
</html>