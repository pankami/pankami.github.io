<?php
require_once('core.php');
class Data
{
	public static function getAllPost() {
		$sql = "SELECT `bdo_post`.`post_id`, `bdo_post`.`post_title1`, `bdo_post`.`cate_id`,`bdo_post`.`post_slug`,`bdo_post`.`date_modified`, `bdo_category`.`cate_title`,`bdo_category`.`cate_slug`, `bdo_category`.`cate_description`, `bdo_category`.`cate_thumbnail` FROM `bdo_post`,`bdo_category` where `bdo_post`.`cate_id` = `bdo_category`.`cate_id` ORDER BY `bdo_category`.`cate_id` ASC";
		$core = Core::getInstance();
		$q = $core->dbh->prepare($sql);	
		$q->execute();
		return $q->fetchAll(PDO::FETCH_ASSOC);
	}

    public static function getLastUpdate() {
		$sql = "SELECT `post_title1`,`post_slug`,`date_modified` FROM `bdo_post` WHERE 1 ORDER BY `date_modified` DESC LIMIT 10";
		$core = Core::getInstance();
		$q = $core->dbh->prepare($sql);
		$q->execute();
		return $q->fetchAll(PDO::FETCH_ASSOC);
	}

    public static function getPostData($slug) {
		$sql = "SELECT `post_id`,`post_title1`,`post_title2`,`post_thumbnail`,`post_description`,`post_content`,`date_created`,`date_modified` FROM `bdo_post` where `post_slug` = :slug";
		$core = Core::getInstance();
		$q = $core->dbh->prepare($sql);
		$q->bindValue(":slug", $slug);	
		$q->execute();
		return $q->fetch(PDO::FETCH_ASSOC);
	}

	public static function updateView($slug) {
		$sql = "UPDATE `bdo_post` 
				SET `post_view` = `post_view` + 1
		WHERE `post_slug` = :slug;";
		$core = Core::getInstance();
		$q = $core->dbh->prepare($sql);
		$q->bindValue(":slug", $slug);	
		$q->execute();
	}
	
}