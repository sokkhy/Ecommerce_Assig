<?php
class PerPage {
	public $perpage;
	
	function __construct() {
		$this->perpage = 12;
	}
	
	function getAllPageLinks($count,$href) {
		$output = '';
		if(!isset($_GET["page"])) $_GET["page"] = 1;
		if($this->perpage != 0)
			$pages  = ceil($count/$this->perpage);
		if($pages>1) {
			if($_GET["page"] == 1) 
				$output = $output . '<span class="link first disabled">First</span><span class="link disabled">Previous</span>';
			else	
				$output = $output . '<a class="link first" onclick="getresult(\'' . $href . (1) . '\')" >First</a><a class="link" onclick="getresult(\'' . $href . ($_GET["page"]-1) . '\')" >Previous</a>';
			
			
			if(($_GET["page"]-3)>0) {
				if($_GET["page"] == 1)
					$output = $output . '<span id=1 class="link current">1</span>';
				else				
					$output = $output . '<a class="link" onclick="getresult(\'' . $href . '1\')" >1</a>';
			}
			if(($_GET["page"]-3)>1) {
					$output = $output . '<span class="dot">...</span>';
			}
			
			for($i=($_GET["page"]-2); $i<=($_GET["page"]+2); $i++)	{
				if($i<1) continue;
				if($i>$pages) break;
				if($_GET["page"] == $i)
					$output = $output . '<span id='.$i.' class="link current">'.$i.'</span>';
				else				
					$output = $output . '<a class="link" onclick="getresult(\'' . $href . $i . '\')" >'.$i.'</a>';
			}
			
			if(($pages-($_GET["page"]+2))>1) {
				$output = $output . '<span class="dot">...</span>';
			}
			if(($pages-($_GET["page"]+2))>0) {
				if($_GET["page"] == $pages)
					$output = $output . '<span id=' . ($pages) .' class="link current">' . ($pages) .'</span>';
				else				
					$output = $output . '<a class="link" onclick="getresult(\'' . $href .  ($pages) .'\')" >' . ($pages) .'</a>';
			}
			
			if($_GET["page"] < $pages)
				$output = $output . '<a  class="link" onclick="getresult(\'' . $href . ($_GET["page"]+1) . '\')" >Next</a><a  class="link" onclick="getresult(\'' . $href . ($pages) . '\')" >Last</a>';
			else				
				$output = $output . '<span class="link disabled">Next</span><span class="link disabled">Last</span>';
			
			
		}
		return $output;
	}
	function getPrevNext($count,$href) {
		$output = '';
		if(!isset($_GET["page"])) $_GET["page"] = 1;
		if($this->perpage != 0)
			$pages  = ceil($count/$this->perpage);
		if($pages>1) {
			if($_GET["page"] == 1) 
				$output = $output . '<span class="link disabled first prev">Prev</span>';
			else	
				$output = $output . '<a class="link first prev" onclick="getresult(\'' . $href . ($_GET["page"]-1) . '\')" >Prev</a>';			
			
			if($_GET["page"] < $pages)
				$output = $output . '<a  class="link next" onclick="getresult(\'' . $href . ($_GET["page"]+1) . '\')" >Next</a>';
			else				
				$output = $output . '<span class="link disabled next">Next</span>';
			
			
		}
		return $output;
	}
}
?>