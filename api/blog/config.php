<?php 
date_default_timezone_set('Asia/Ho_Chi_Minh');
class Config {

	static $confArray;
	public static function read($name) {
		return self::$confArray[$name];
	}

	public static function write($name, $value) {
		self::$confArray[$name] = $value;
	}
}

Config::write('host', 'localhost');
Config::write('user', 'root');
Config::write('pass', '');
Config::write('charset', 'utf8');
Config::write('dbname', 'pankami_api');

