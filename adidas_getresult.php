<?php
require_once("dbcontroller.php");
require_once("pagination.class.php");
$db_handle = new DBController();
$perPage = new PerPage();

$sql = "SELECT * from adidas";
$paginationlink = "adidas_getresult.php?page=";	
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
foreach($faq as $k=>$v) {

 $output.="<div class='col-lg-4'>";
 $output .= '<span class="shirt shirt_code">Shirt_Code: <input type="hidden" id="rowcount" name="rowcount" value="' . $_GET["rowcount"] . '" />' . $faq[$k]["id"] . '</span> <br>';
 $output .= ' <span class="shirt shirt_brand">Brand:' . $faq[$k]["shirtName"] . '</span><br>';
 $output .= '<span class="shirt shirt_price">Price: <span>' . $faq[$k]["Price"] .'</span>'. '</span>';
 $output.= "<div class='cover_imgShirt'>".
 				"<div class='container'>".
                    "<img id ='imgshirt' src='uploads/".$faq[$k]['image']."'/>".
                    "<div class='middle'>".
                    		"<div class='text'>Buy Now</div>"
                   ."</div>".
                   "</div>".
                "</div>";
 $output.="</div>";
  
}


if(!empty($perpageresult)) {

$output .= '<div id ="p" class="pagination" style="margin-left: -36px; height: 72px;">' . $perpageresult . '</div>';
}
// if($perpageresult > 14){
// 	$output .= '<div id="pagelessrecord">' . $perpageresult . '</div>';
// }
print $output;
?>
