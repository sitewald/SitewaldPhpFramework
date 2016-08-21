
<?php 

class HomeController extends BaseController{
	public function __construct($config){
		parent::__construct($config);
	}

	public function indexAction(){
		$this->control_access();

		$this->title = Lib::SITEWALD_TITLE;

		$hello = $this->serviceFactory('Hello');

		$this->render('home', 'index', array(
				'hello' => $hello->sayHello()
			));
	}
}

?>