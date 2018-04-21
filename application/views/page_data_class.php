<?php 
class Page_Data {	
	public $css = "";
	public $script = "";
	public $images = ""; 
	public $scut = "";

	public function addScript($src) {
		$this->script .= "<script src='$src'></script> \n";
	}

	public function addCSS($href) {
		$this->css .= "<link rel='stylesheet' type='text/css' href='$href'>\n";
	}

	public function addImage($src){
		$this->images .= "";		
	}

	public function addSCut($src){
		$this->scut .= "<link rel='shortcut icon' type='image/png' href='$src'/> \n";
	}

	public function show_css(){
		echo $this->css;
	}

	public function show_js(){
		echo $this->script;
	}
} 
?>
