<?php
require_once('core.php');
class Data
{
	public static function getListCategory() {
		$sql = "SELECT `cate_id`,`cate_title`,`cate_slug` FROM `category` where 1 order by `cate_title` asc";
		$core = Core::getInstance();
		$q = $core->dbh->prepare($sql);	
		$q->execute();
		return $q->fetchAll(PDO::FETCH_ASSOC);
	}

	public static function getLoadmore($start,$limit) {
		$sql = "SELECT `chapter`.`chapter_id`,`chapter`.`chapter_num`,`chapter`.`chapter_slug`,`story`.`story_title`,`story`.`story_image`,`chapter`.`story_slug`,`chapter`.`date_modified` 
		FROM `chapter`,`story`, (SELECT `chapter`.`story_slug` as s_slug, MAX(`chapter`.`chapter_num`) as maxn FROM `chapter` GROUP BY `chapter`.`story_slug`) as t
		
		where `chapter`.`story_slug` = `story`.`story_slug`
			and `chapter`.`chapter_num` = t.maxn
			and `chapter`.`story_slug` = t.s_slug
			ORDER BY `chapter`.`date_modified` DESC
			LIMIT :start, :limit";
		$core = Core::getInstance();
		$q = $core->dbh->prepare($sql);
		$q->bindParam(':start', $start, PDO::PARAM_INT);
		$q->bindParam(':limit', $limit, PDO::PARAM_INT);
		$q->execute();
		return $q->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public static function getChapterUpdate() {
		$sql = "SELECT `chapter`.`chapter_id`,`chapter`.`chapter_num`,`chapter`.`chapter_slug`,`story`.`story_title`,`story`.`story_image`,`chapter`.`story_slug`,`chapter`.`date_modified` 
		FROM `chapter`,`story`, (SELECT `chapter`.`story_slug` as s_slug, MAX(`chapter`.`chapter_num`) as maxn FROM `chapter` GROUP BY `chapter`.`story_slug`) as t
		
		where `chapter`.`story_slug` = `story`.`story_slug`
			and `chapter`.`chapter_num` = t.maxn
			and `chapter`.`story_slug` = t.s_slug
			ORDER BY `chapter`.`date_modified` DESC
			LIMIT 5";
		$core = Core::getInstance();
		$q = $core->dbh->prepare($sql);
		$q->execute();
		return $q->fetchAll(PDO::FETCH_ASSOC);
	}

	public static function getItemInfo($slug) {
		$sql = "SELECT `story_id`,`story_title`,`story_title_other`,`cate_id`,`story_description`,`story_image`,`story_view`,`story_first_chapter`,`story_last_chapter`,`story_status`,`date_created`,`date_modified`,`story_slug`,`author`.`author_name` FROM `story`,`author` where `story`.`author_id` = `author`.`author_id` and `story_slug` = :slug";
		$core = Core::getInstance();
		$q = $core->dbh->prepare($sql);
		$q->bindValue(":slug", $slug);	
		$q->execute();
		return $q->fetch(PDO::FETCH_ASSOC);
	}


	public static function getListChapter($slug) {
		$sql = "SELECT `chapter_id`,`chapter_title`,`chapter_num`,`chapter_slug`,`chapter`.`story_slug`,`chapter_view`,`date_modified` FROM `chapter` where `story_slug` = :slug order by `chapter_num` asc";
		$core = Core::getInstance();
		$q = $core->dbh->prepare($sql);
		$q->bindValue(":slug", $slug);	
		$q->execute();
		return $q->fetchAll(PDO::FETCH_ASSOC);
	}

	public static function getChapterContent($storySlug, $chapterSlug) {
		$sql = "SELECT `chapter`.`chapter_id`, `chapter`.`chapter_num`, `chapter`.`chapter_title`, `chapter`.`chapter_content`,`chapter`.`story_slug`, `chapter`.`chapter_slug`, `chapter`.`date_modified`, `story`.`story_title`,`story`.`story_image` FROM `chapter`,`story` WHERE `story`.`story_slug` = `chapter`.`story_slug` and `chapter`.`story_slug` = :storySlug and `chapter`.`chapter_slug` = :chapterSlug LIMIT 1";
		$core = Core::getInstance();
		$q = $core->dbh->prepare($sql);
		$q->bindValue(":storySlug", $storySlug);	
		$q->bindValue(":chapterSlug", $chapterSlug);
		$q->execute();
		return $q->fetch(PDO::FETCH_ASSOC);
	}

	public static function getChapterUpdate_byCategory($slug) {
		$sql = "SELECT `chapter`.`chapter_id`,`chapter`.`chapter_num`,`chapter`.`chapter_slug`,`story`.`story_title`,`story`.`story_image`,`chapter`.`story_slug`,`chapter`.`date_modified`
		FROM `chapter`,`story`,  (SELECT `chapter`.`story_slug` as s_slug, MAX(`chapter`.`chapter_num`) as maxn FROM `chapter` GROUP BY `chapter`.`story_slug`) as t
		
		where `chapter`.`story_slug` = `story`.`story_slug`
			and `chapter`.`chapter_num` = t.maxn
			and `chapter`.`story_slug` = t.s_slug
			and `story`.`cate_id` LIKE CONCAT('%',:slug, '%')
			ORDER BY `chapter`.`date_modified` DESC
			LIMIT 12";
		$core = Core::getInstance();
		$q = $core->dbh->prepare($sql);
		$q->bindValue(":slug", $slug);
		$q->execute();
		return $q->fetchAll(PDO::FETCH_ASSOC);
	}

	public static function getCategoryInfo($slug) {
		$sql = "SELECT `cate_title`,`cate_description` FROM `category` where `cate_slug` = :slug";
		$core = Core::getInstance();
		$q = $core->dbh->prepare($sql);
		$q->bindValue(":slug", $slug);	
		$q->execute();
		return $q->fetch(PDO::FETCH_ASSOC);
	}

	public static function updateStatus($chapter_slug,$story_slug) {
		$sql = "CALL updateView(:chapter_slug, :story_slug)";
		$core = Core::getInstance();
		$q = $core->dbh->prepare($sql);
		$q->bindParam(":chapter_slug", $chapter_slug);	
		$q->bindParam(":story_slug", $story_slug);	
		$q->execute();
	}

	public static function getStory_byViewDay() {
		$sql = "SELECT `story`.`story_title`,`story`.`story_image`,`story`.`story_slug`,`story`.`story_last_chapter`,`story_views`.`view_num` FROM `story`,`story_views` WHERE `story`.`story_slug` = `story_views`.`story_slug` ORDER BY `story_views`.`view_num` DESC LIMIT 10";
		$core = Core::getInstance();
		$q = $core->dbh->prepare($sql);
		$q->execute();
		return $q->fetchAll(PDO::FETCH_ASSOC);
	}

	public static function searchData($keyword) {
		$sql = "SELECT `story_title`,`story_image`,`story_slug`,`story_last_chapter`,`cate_id` FROM `story` WHERE `story_title` LIKE :keyword  LIMIT 9";
		$core = Core::getInstance();
		$q = $core->dbh->prepare($sql);
		$q->bindValue(":keyword", '%'.$keyword.'%');	
		$q->execute();
		return $q->fetchAll(PDO::FETCH_ASSOC);
	}
	
}