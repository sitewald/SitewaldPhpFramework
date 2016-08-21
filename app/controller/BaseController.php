<?php 

class BaseController{
	protected $sitewald_version;
	
	protected $layout;
	protected $view_dir;
	protected $view;
	protected $viewData;
	protected $config;
	protected $title;
	protected $baseUrl;

	public function __construct($config){
		$this->config = $config;

		$this->sitewald_version = $this->config['version'];

		$this->layout = $this->config['layout'];
		$this->view_dir = $this->config['view_dir'];
		$this->baseUrl = $this->config['base_url'];
	}

	public function render($controller, $action, $params = null){
		$this->view = $this->view_dir . $controller . '/' . $action . '.php';
		$this->viewData = $params;
		
		require_once($this->layout);
	}

	public function printRoute($controller, $action, $params = null){
		$route = $this->baseUrl;
		$route .= 'index.php?controller=%s&action=%s';

		if($params === null) {
			printf($route, $controller, $action);
			return;
		}

		foreach($params as $key => $value){
			$route .= "&$key=$value";
		}

		printf($route, $controller, $action);
	}

	public function serviceFactory($name){
		switch($name){
			case 'Hello':{
				return new Hello();
			}
		}
	}

	public function initUser($id, $name){
		$user = new User($id, $name);

		$user->startSession();
	}

	public function control_access(){
		if(!User::sessionExists()){
			// -- $this->render( ... controller, login action
		}
	}

	public function logout(){
		User::logout();
	}
}
?>