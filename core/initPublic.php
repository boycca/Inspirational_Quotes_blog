<?php
	session_start();
	$GLOBALS['config'] = array(
		'mysql'		=> array(
			'host'		=> 'localhost',
			'username'	=> 'asajau_ei',
			'password'	=> 'bossfahook',
			'db'		=> 'asajau_ei',
		),
		'remember'	=> array(
			'cookieName'	=> 'hash',
			'cookieExpiry'	=> 604800,	//1 Week
		),
		'session'	=> array(
			'sessionName'	=> 'user',
			'tokenName'		=> 'token'
		)
	);
	
	function jauro($class) {
		require_once 'classes/'.$class.'.php';
	}
	spl_autoload_register("jauro");

	require_once 'functions/sanitize.func.php';

	if (Cookie::exists(Config::get('remember/cookieName')) && !Session::exists(Config::get('session/sessionName'))) {
		$hash = Cookie::get(Config::get('remember/cookieName'));
		$hashCheck = Database::getInstance()->get('usersSessions', array('hash', '=', $hash));
		if ($hashCheck->count()) {
			$user = new User($hashCheck->first()->userID);
			$user->login();
		}
	}
?>