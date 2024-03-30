<?php
require_once('core.php');
class Data
{
	public static function getAllPost() {
		$sql = "SELECT `bdo_post`.`post_id`,`bdo_post`.`post_view`, `bdo_post`.`post_title1`,`bdo_post`.`post_title2`,`bdo_post`.`post_thumbnail`, `bdo_post`.`cate_id`,`bdo_post`.`post_slug`,`bdo_post`.`date_modified`, `bdo_category`.`cate_title`,`bdo_category`.`cate_slug`, `bdo_category`.`cate_description`, `bdo_category`.`cate_thumbnail` FROM `bdo_post`,`bdo_category` where `bdo_post`.`cate_id` = `bdo_category`.`cate_id` ORDER BY `bdo_post`.`date_modified` DESC";
		$core = Core::getInstance();
		$q = $core->dbh->prepare($sql);	
		$q->execute();
		return $q->fetchAll(PDO::FETCH_ASSOC);
	}
    public static function getAllCategory() {
		$sql = "SELECT * FROM `bdo_category` where 1 ORDER BY `cate_id` DESC";
		$core = Core::getInstance();
		$q = $core->dbh->prepare($sql);	
		$q->execute();
		return $q->fetchAll(PDO::FETCH_ASSOC);
	}


    public static function getPost($id) {
		$sql = "SELECT * FROM `bdo_post` where `post_id` = :id";
		$core = Core::getInstance();
		$q = $core->dbh->prepare($sql);
		$q->bindValue(":id", $id);	
		$q->execute();
		return $q->fetch(PDO::FETCH_ASSOC);
	}
    public static function getCategory($id) {
		$sql = "SELECT * FROM `bdo_category` where `cate_id` = :id";
		$core = Core::getInstance();
		$q = $core->dbh->prepare($sql);
		$q->bindValue(":id", $id);	
		$q->execute();
		return $q->fetch(PDO::FETCH_ASSOC);
	}

    public static function checkPostExist($slug) {
        $sql = "SELECT `post_id` FROM `bdo_post` where `post_slug` = :slug";
		$core = Core::getInstance();
		$q = $core->dbh->prepare($sql);
		$q->bindValue(":slug", $slug);	
		$q->execute();
        $c = $q->fetch(PDO::FETCH_ASSOC);
		return empty($c) ? false : true;
    }
    public static function checkCategoryExist($slug) {
        $sql = "SELECT `cate_id` FROM `bdo_category` where `cate_slug` = :slug";
		$core = Core::getInstance();
		$q = $core->dbh->prepare($sql);
		$q->bindValue(":slug", $slug);	
		$q->execute();
        $c = $q->fetch(PDO::FETCH_ASSOC);
		return empty($c) ? false : true;
    }

    public static function setPost($data) {
        if (!Data::checkPostExist($data['post_slug'])) {
            $sql = "INSERT INTO `bdo_post` (`post_title1`,`post_title2`,`post_thumbnail`,`cate_id`,`post_description`,`post_content`,`post_slug`,`date_modified`,`date_created`) 
                    VALUES (:post_title1, :post_title2, :post_thumbnail, :cate_id, :post_description, :post_content, :post_slug, :date_modified, :date_created) ";
            $core = Core::getInstance();
            $q = $core->dbh->prepare($sql);
            $q->bindValue(":post_title1", $data['post_title1']);
            $q->bindValue(":post_title2", $data['post_title2']);
            $q->bindValue(":post_thumbnail", $data['post_thumbnail']);
            $q->bindValue(":cate_id", $data['cate_id']);
            $q->bindValue(":post_description", $data['post_description']);
            $q->bindValue(":post_content", $data['post_content']);
            $q->bindValue(":post_slug", $data['post_slug']);
            $q->bindValue(":date_modified", $data['date_modified']);
            $q->bindValue(":date_created", $data['date_created']);	
            $q->execute();
            return (object)(array('error'=>'0','message'=>'Add Post Successfull!'));
        } else {
            return (object)(array('error'=>'1','message'=>'Post Exist!'));
        }
    }

    public static function setCategory($data) {
        if (!Data::checkCategoryExist($data['cate_slug'])) {
            $sql = "INSERT INTO `bdo_category` (`cate_title`,`cate_slug`,`cate_thumbnail`,`cate_description`) 
                    VALUES (:cate_title, :cate_slug, :cate_thumbnail, :cate_description) ";
            $core = Core::getInstance();
            $q = $core->dbh->prepare($sql);
            $q->bindValue(":cate_title", $data['cate_title']);
            $q->bindValue(":cate_slug", $data['cate_slug']);
            $q->bindValue(":cate_thumbnail", $data['cate_thumbnail']);
            $q->bindValue(":cate_description", $data['cate_description']);
            $q->execute();
            return (object)(array('error'=>'0','message'=>'Add Category Successfull!'));
        } else {
            return (object)(array('error'=>'1','message'=>'Category Exist!'));
        }
    }

    public static function updatePost($data) {
            $sql = "UPDATE `bdo_post` 
                    SET `post_title1` = :post_title1, 
                        `post_title2` = :post_title2, 
                        `post_thumbnail` = :post_thumbnail, 
                        `cate_id` = :cate_id, 
                        `post_description` = :post_description, 
                        `post_content` = :post_content, 
                        `post_slug` = :post_slug, 
                        `date_modified` = :date_modified 
                    WHERE `post_id` = :id";
            $core = Core::getInstance();
            $q = $core->dbh->prepare($sql);
            $q->bindValue(":post_title1", $data['post_title1']);
            $q->bindValue(":post_title2", $data['post_title2']);
            $q->bindValue(":post_thumbnail", $data['post_thumbnail']);
            $q->bindValue(":cate_id", $data['cate_id']);
            $q->bindValue(":post_description", $data['post_description']);
            $q->bindValue(":post_content", $data['post_content']);
            $q->bindValue(":post_slug", $data['post_slug']);
            $q->bindValue(":date_modified", $data['date_modified']);
            $q->bindValue(":id", $data['id']);	
            $q->execute();
            return (object)(array('error'=>'0','message'=>'Post Update Successfull!'));
    }

    public static function deletePost($id) {
		$sql = "DELETE FROM `bdo_post` 
                WHERE `post_id` = :id";
		$core = Core::getInstance();
		$q = $core->dbh->prepare($sql);
		$q->bindValue(":id", $id);	
		$q->execute();
		return (object)(array('error'=>'0','message'=>'Post Delete Successfull!'));
	}

    public static function deleteCategory($id) {
		$sql = "DELETE FROM `bdo_category` 
                WHERE `cate_id` = :id";
		$core = Core::getInstance();
		$q = $core->dbh->prepare($sql);
		$q->bindValue(":id", $id);	
		$q->execute();
		return (object)(array('error'=>'0','message'=>'Category Delete Successfull!'));
	}

    public static function updateCategory($data) {
        $sql = "UPDATE `bdo_category` 
                SET `cate_title` = :cate_title, 
                    `cate_slug` = :cate_slug, 
                    `cate_thumbnail` = :cate_thumbnail, 
                    `cate_description` = :cate_description
                WHERE `cate_id` = :id";
        $core = Core::getInstance();
        $q = $core->dbh->prepare($sql);
        $q->bindValue(":cate_title", $data['cate_title']);
        $q->bindValue(":cate_slug", $data['cate_slug']);
        $q->bindValue(":cate_thumbnail", $data['cate_thumbnail']);
        $q->bindValue(":cate_description", $data['cate_description']);
        $q->bindValue(":id", $data['cate_id']);	
        $q->execute();
        return (object)(array('error'=>'0','message'=>'Category Update Successfull!'));
}

	
	
}