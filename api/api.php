<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$domain = 'pankami.com';
$url = '';
if (isset($_SERVER['HTTPS'])){
 $url = 'https://'.$domain;
}
else{
 $url = 'http://'.$domain;
}



header('Access-Control-Allow-Origin: '.$url.'');

header("Access-Control-Allow-Methods: *");



$app = '';

if (isset($_REQUEST['app'])) {

	try {

		$path = $_REQUEST['app'].'/'.$_REQUEST['app'].'.php';

		file_exists($path) ? require_once($path) : die('Application not found!');

		

		$app = ucfirst($_REQUEST['app']);

	} catch (Exception $e) {

		throw new Exception($e->getMessage()." Error Processing Request",1);

	}

}

if (!array_key_exists('HTTP_ORIGIN', $_SERVER)) {

    $_SERVER['HTTP_ORIGIN'] = $_SERVER['SERVER_NAME'];

}



try {

    $API = new $app($_REQUEST['request'], $_SERVER['HTTP_ORIGIN']);

    echo $API->processAPI();

} catch (Exception $e) {

    echo json_encode(Array('error' => $e->getMessage()));

}

