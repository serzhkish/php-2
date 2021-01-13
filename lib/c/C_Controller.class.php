<?php
abstract class C_Controller
{
	// protected abstract function render();
	
	protected abstract function before();

	public function rend($templateName, $data = array()) {
		$loader = new Twig_Loader_Filesystem('lib/v');
		$twig = new Twig_Environment($loader);
		$template = $twig->loadTemplate($templateName);
		echo $template->render($data);
	}
	
	public function Request($action)
	{
		// $this->before();
		$this->$action();   //$this->action_index
		// $this->render();
	}
	
	public function __call($name, $params){
        die('Ошибка!!!');
	}
}
