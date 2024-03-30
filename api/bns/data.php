<?php
require_once('core.php');
class Data
{
	
	public static function test() {
		$sql = "SELECT *  FROM `bns` where 1 order by `id` desc";
		$core = Core::getInstance();
		$q = $core->dbh->prepare($sql);
		$q->execute();
		return $q->fetchAll(PDO::FETCH_ASSOC);
	}

	public static function getInfo() {
		$sql = "SELECT `id`,`title`,`date_modified`,`yb_video`,`bit32_default`,`bit64_default`,`bit32_sf3`,`bit64_sf3`  FROM `bns` where 1";
		$core = Core::getInstance();
		$q = $core->dbh->prepare($sql);
		$q->execute();
		return $q->fetch(PDO::FETCH_ASSOC);
	}
	public static function getCounterAll() {
		$sql = "SELECT `id`,`bit32_default`,`bit64_default`,`bit32_sf3`,`bit64_sf3` FROM `counter` where 1";
		$core = Core::getInstance();
		$q = $core->dbh->prepare($sql);
		$q->execute();
		return $q->fetch(PDO::FETCH_ASSOC);
	}
	public static function setCounter_bit32_default() {
		try {
			$sql = "UPDATE `counter` set  `bit32_default` = `bit32_default` + 1 where 1";
			$core = Core::getInstance();
			$q = $core->dbh->prepare($sql);
			$q->execute();
		} catch (Exception $e) {
			
		}
	}
	public static function setCounter_bit64_default() {
		try {
			$sql = "UPDATE `counter` set  `bit64_default` = `bit64_default` + 1 where 1";
			$core = Core::getInstance();
			$q = $core->dbh->prepare($sql);
			$q->execute();
		} catch (Exception $e) {
			
		}
	}
	public static function setCounter_bit32_sf3() {
		try {
			$sql = "UPDATE `counter` set  `bit32_sf3` = `bit32_sf3` + 1 where 1";
			$core = Core::getInstance();
			$q = $core->dbh->prepare($sql);
			$q->execute();
		} catch (Exception $e) {
			
		}
	}
	public static function setCounter_bit64_sf3() {
		try {
			$sql = "UPDATE `counter` set  `bit64_sf3` = `bit64_sf3` + 1 where 1";
			$core = Core::getInstance();
			$q = $core->dbh->prepare($sql);
			$q->execute();
		} catch (Exception $e) {
			
		}
	}
	public static function updateCounter($counter_id) {
		try {
			$sql = "UPDATE `counter` set  $counter_id = $counter_id + 1 where 1";
			$core = Core::getInstance();
			$q = $core->dbh->prepare($sql);
			$q->execute();
		} catch (Exception $e) {
			
		}
	}

	public static function getListClass() {
		$sql = "SELECT `id`,`title`,`thumbnail`,`parent_id` FROM `bns_class` where `child_id` IS null";
		$core = Core::getInstance();
		$q = $core->dbh->prepare($sql);
		$q->execute();
		return $q->fetchAll(PDO::FETCH_ASSOC);
	}
	public static function getChildClass($child_id) {
		$sql = "SELECT `id`,`title`,`thumbnail`,`slug` FROM `bns_class` where `child_id` = :child_id";
		$core = Core::getInstance();
		$q = $core->dbh->prepare($sql);
		$q->bindValue(":child_id", $child_id);
		$q->execute();
		return $q->fetchAll(PDO::FETCH_ASSOC);
	}
	public static function getSf3($class_id) {
		$sql = "SELECT `id`,`class_id`,`content` FROM `sf3` where `class_id` = :class_id";
		$core = Core::getInstance();
		$q = $core->dbh->prepare($sql);
		$q->bindValue(":class_id", $class_id);
		$q->execute();
		return $q->fetchAll(PDO::FETCH_ASSOC);
	}
	public static function getMetaTitle($parent_id) {
		$sql = "SELECT `id`,`title_en` FROM `bns_class` where `parent_id` = :parent_id";
		$core = Core::getInstance();
		$q = $core->dbh->prepare($sql);
		$q->bindValue(":parent_id", $parent_id);
		$q->execute();
		return $q->fetch(PDO::FETCH_ASSOC);
	}
	public static function getListSkill($group_id) {
		$sql = "SELECT `id`,`skill_id`,`title`,`skill_thumb`,`key_thumb` FROM `skill` where `group_id` = :group_id";
		$core = Core::getInstance();
		$q = $core->dbh->prepare($sql);
		$q->bindValue(":group_id", $group_id);
		$q->execute();
		return $q->fetchAll(PDO::FETCH_ASSOC);
	}
	public static function getLogFile() {
		$sql = "SELECT `id`,`title`,`content` FROM `logfile` where 1 order by id desc limit 5";
		$core = Core::getInstance();
		$q = $core->dbh->prepare($sql);
		$q->execute();
		return $q->fetchAll(PDO::FETCH_ASSOC);
	}

}