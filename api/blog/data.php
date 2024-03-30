<?php
require_once('core.php');
class Data
{
	
	public static function test() {
		$sql = "SELECT *  FROM `users` where 1 order by `id` desc";
		$core = Core::getInstance();
		$q = $core->dbh->prepare($sql);
		$q->execute();
		return $q->fetchAll(PDO::FETCH_ASSOC);
	}

}