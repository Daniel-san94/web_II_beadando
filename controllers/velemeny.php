<?php

class Velemeny_Controller
{
    public $baseName = 'szolgaltatasok';  
    
    public function main(array $vars)
    {

        print_r($_PUT);
        if(isset($_POST['action'])){

            $szolgaltatasokModel = new Szolgaltatasok_Model;
        
            $data = [
                'szolgaltatasok_id' => $vars['szolgaltatas_id'],
                'hozzaszolo' => $_SESSION['username'],
                'velemeny' => $vars['hozzaszolas']
            ];
    
    
            if(empty($vars['hozzaszolas'])){
                header('location:' . SITE_ROOT . 'szolgaltatasok/id=' . $vars['szolgaltatas_id']);
                return;
    
            }
    
            $retData = $szolgaltatasokModel->velemenyHozzaadas($data);
                if($retData['eredmeny'] == "ERROR")
                {
                    $this->baseName = "beleptet";
                    $view = new View_Loader($this->baseName.'_main');
    
                    foreach($retData as $name => $value)
                    $view->assign($name, $value);
    
                }
                else
                {
                    header('location:' . SITE_ROOT . 'szolgaltatasok/id=' . $vars['szolgaltatas_id']);
                }

        }
		
			

    }



}

?>