<?php

class Rolunk_Controller
{
	public $baseName = 'rolunk'; 
	public function main(array $vars) 
	{
		
		$view = new View_Loader($this->baseName."_main");
	}
}

?>