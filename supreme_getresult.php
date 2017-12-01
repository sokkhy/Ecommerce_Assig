<?php
session_start();
require_once("dbcontroller.php");
require_once("pagination.class.php");
$db_handle = new DBController();
$perPage = new PerPage();

$sql = "SELECT * from supreme";
$paginationlink = "supreme_getresult.php?page=";	
$pagination_setting = $_GET["pagination_setting"];
				
$page = 1;
if(!empty($_GET["page"])) {
$page = $_GET["page"];
}

$start = ($page-1)*$perPage->perpage;
if($start < 0) $start = 0;

$query =  $sql . " limit " . $start . "," . $perPage->perpage; 
$faq = $db_handle->runQuery($query);

if(empty($_GET["rowcount"])) {
$_GET["rowcount"] = $db_handle->numRows($sql);
}

 if($pagination_setting == "prev-next") {
	$perpageresult = $perPage->getPrevNext($_GET["rowcount"], $paginationlink,$pagination_setting);	
} else {
 	$perpageresult = $perPage->getAllPageLinks($_GET["rowcount"], $paginationlink,$pagination_setting);	
 }


$output = '';
$i = 0;
if($faq >0){
foreach($faq as $k=>$v) {
 $i++;
 $output.="<div class='col-lg-4'>";
 $output .= '<span class="shirt shirt_code">Shirt_Code: <input type="hidden" id="rowcount" name="rowcount" value="' . $_GET["rowcount"] . '" />' . $faq[$k]["id"] . '</span> <br>';
 $output .= "<span class='shirt shirt_brand "."shirt_name".$i."'>Brand: " . $faq[$k]['shirtName'] . "</span><br>";
 $output .= "<span class='shirt shirt_size "."shirt_size".$i."'>Size: " . $faq[$k]['shirtSize'] ."</span><br>";
 $output .= "<span class='shirt shirt_price "."shirt_price".$i."'>Price: <span>" . $faq[$k]['Price'] ."</span>". "</span>";
 $output.= "<div class='cover_imgShirt'>".
                "<div class='container'>".
                 "<img class ='imgshirt "."pic".$i."' src='uploads/".$faq[$k]['image']."'/>".
                    "<div class='middle'>".

                            "<div class='text buy_now".$i."'>Buy Now</div>".
                            

                   "</div>".
                   "</div>".
                "</div>";
 $output.="</div>";
  $output.="<script>".
                        "$(document).ready(function(){
                            $('.buy_now".$i."').click(function(){
                                
                               var img_scr = $('.pic".$i."').attr('src');
                               var _price =$('.shirt_price".$i."').text();
                                var _name =$('.shirt_name".$i."').text();
                                               
                               var p = window.location.href = 'http://localhost:8082/4Shops/shirtdetail.php?src='+img_scr+'&name='+_name+'&price='+_price;
                                 $('#pic').attr('src',img_scr);
                                $('.maindiv').css('display','none');
                                
                             
  
                        }); 
                    })".
             "</script>";

}
}else{
  echo "<h1>Shirt is Cooming soon!</h1>";
}

if(!empty($perpageresult)) {

$output .= '<div id ="p" class="pagination" style="margin-left: -36px; height: 72px;">' . $perpageresult . '</div>';
}
print $output;
?>
