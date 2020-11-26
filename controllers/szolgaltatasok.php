<?php

class Szolgaltatasok_Controller
{
	public $baseName = 'szolgaltatasok';  //meghatározni, hogy melyik oldalon vagyunk
	public function main(array $vars) // a router által továbbított paramétereket kapja
	{
		$szolgaltatasokModel = new Szolgaltatasok_Model;
		$retData = $szolgaltatasokModel->osszesSzolgaltatas();
		$view = new View_Loader($this->baseName."_main");
		if(isset($retData['eredmeny'])){
			foreach($retData as $name => $value)
				$view->assign($name,$value);
		}
		else{
			$view->addData($retData);
			
		}
		//betöltjük a nézetet
		
		
	}
	
}

?>