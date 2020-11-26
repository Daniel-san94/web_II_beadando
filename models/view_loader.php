<?php

class View_Loader
{
    private $data = array();
    private $render = FALSE;
    private $selectedItems = FALSE;
    private $style = FALSE;
	private $messages = array();

    public function __construct($viewName)
    {
        $file = SERVER_ROOT . 'views/' . strtolower($viewName) . '.php';
        if (file_exists($file))
        {
            $this->render = $file;
            $this->selectedItems = explode("_", $viewName);
        }        
        $file = SERVER_ROOT . 'css/' . strtolower($viewName) . '.css';
        if (file_exists($file))
        {
            $this->style = SITE_ROOT . 'css/' . strtolower($viewName) . '.css';;
        }        
    }

    public function assign($variable , $value)
    {
        $this->messages[$variable] = $value;
    }
	public function addData($info)
	{
		$this->data = $info;
		
	}

    public function __destruct()
    {
        $this->messages['render'] = $this->render;
        $this->messages['selectedItems'] = $this->selectedItems;
        $this->messages['style'] = $this->style;
        $viewData = $this->messages;
	    $viewInfo = $this->data;
        include(SERVER_ROOT . 'views/page_main.php');
    }
}

?>