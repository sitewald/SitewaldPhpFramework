<?php 

class User{
	const SESSION_NAME = 'sitewald user';

    private $id;
	private $name;

	public function __construct($id, $name){
		$this->id = $id;
		$this->name = $name;
	}

	// --------------- getters -------------

	public function getId(){
		return $this->id;
	}

	public function getName(){
		return $this->name;
	}

	// --------------------------------------

	public function startSession(){
		self::session_start_wrapper();

		$_SESSION[self::SESSION_NAME] = $this;
	}

	public static function getUserFromSession(){
		self::session_start_wrapper();

		$user = $_SESSION[self::SESSION_NAME];

		return $user;
	}

	public static function sessionExists(){
		self::session_start_wrapper();

		return isset($_SESSION[self::SESSION_NAME]);
	}

	public static function logout(){
		self::session_start_wrapper();

		session_destroy();
	}

	public static function getUserId(){
		$user = self::getUserFromSession();

		return $user->getId();
	}

	private static function session_start_wrapper(){
		if(session_id() == ''){
			session_start();
		}
	}
}

?>