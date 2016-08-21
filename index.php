<?php 
// -- uncomment for production
//error_reporting(0);

define('SITEWALD_ROOT', __DIR__);

require_once(SITEWALD_ROOT . '/app/config.php'); // --------- configuration

// --- autoload section

function __autoload($className){
	global $config;
	
	$servicePath = $config['service_dir'] . $className . '.php';
	$controllerPath = $config['controller_dir'] . $className . '.php';
	$modelPath = $config['model_dir'] . $className . '.php';

	$resultPath = '';

	if(file_exists($servicePath)){ // ----------- is it service?
		$resultPath = $servicePath;

	}elseif(file_exists($controllerPath)){ // --- is it controller?
		$resultPath = $controllerPath;
	
	}elseif(file_exists($modelPath)){ // -------- is it model?
		$resultPath = $modelPath;
	}else{
		if(strpos($className, 'Controller') !== false){ // --- undefined controller
			echo Lib::ROUTE_NOT_FOUND;
		}else{
			echo 'class ' . $className . ' not found'; // ---- undefined class
		}

		die();
	}

	require_once($resultPath);
}

// --- language
switch($config['lang']){
	case 'en' : {
		require_once($config['service_dir'] . '/lang/en/Lib.php');
	}
}

// get parameters of route
//
if(isset($_GET['controller']) && isset($_GET['action'])){
	$controllerName = $_GET['controller'];
	$actionName = $_GET['action'];
}
else{ // ------------------------ default action 
	$controllerName = $config['default_controller'];
	$actionName = $config['default_action'];
}

// get controller class name and full action name
//
$controller = ucwords($controllerName) . 'Controller'; // --- ExampleController
$action = $actionName . 'Action'; // ------------------------ exampleAction

// get path to controller
// 
$path = $config['controller_dir'] . $controller . '.php';

// init controller
//

$controllerObj = new $controller($config);

if(method_exists($controllerObj, $action)){
	$controllerObj->$action();
}else{ // --------------------------- or route error
	echo Lib::ROUTE_NOT_FOUND;
}
?>