<?php

class Szolgaltatasok_Controller
{
	public $baseName = 'szolgaltatasok';  //meghatározni, hogy melyik oldalon vagyunk
	public function main(array $vars) // a router által továbbított paramétereket kapja
	{

		$szolgaltatasokModel = new Szolgaltatasok_Model;
		$view = new View_Loader($this->baseName."_main");

		if (isset($_GET['szolgaltatasok/id']) && $_GET['szolgaltatasok/id'] !== "") {
			$szolgaltatasId = $_GET['szolgaltatasok/id'];
			$retData = $szolgaltatasokModel->szolgaltatasIDAlapjan($szolgaltatasId);
			if (isset($retData['eredmény'])) {
				foreach($retData as $name => $value)
					$view->assign($name,$value);
			} else {
				$view->addData($retData);
			}

		} else {
			
			$retData = $szolgaltatasokModel->osszesSzolgaltatas();
			
			if(isset($retData['eredmény'])){
				foreach($retData as $name => $value)
					$view->assign($name,$value);
			}
			else{
				$view->addData($retData);
				
			}
		}


		
		
	}

	public function add() {
		echo "add function called";
	}
	
}

?>