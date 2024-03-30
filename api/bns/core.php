<?php

require_once('config.php');
class Core {
	public $dbh;
	private static $instance;

	private function __construct() {
		$dsn = 'mysql:host='. Config::read('host').
			   ';dbname='. Config::read('dbname').
			   ';charset='. Config::read('charset');
		$user = Config::read('user');
		$pass = Config::read('pass');

		$this->dbh = new PDO($dsn, $user, $pass);
	}

	public static function getInstance() {
		if (!isset(self::$instance)) {
			$object = __CLASS__;
			self::$instance = new $object;
		}
		return self::$instance;
	}
}