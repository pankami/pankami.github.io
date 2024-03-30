<?php
require_once 'api.class.php';
require_once 'data.php';
require_once 'helper.php';
class Story extends API
{
    protected function getListCategory(){
        if ($this->method == 'GET') {
            $data = Data::getListCategory();
            if (empty($data)) {
                return (object)(array('error'=>'1','message'=>'No data'));
            } else {
                return $data;
            }
        } else {
            return "Only accepts GET requests";
        }
     }

     protected function getChapterUpdate(){
        if ($this->method == 'GET') {
            $data = Data::getChapterUpdate();
            if (empty($data)) {
                return (object)(array('error'=>'1','message'=>'No data'));
            } else {
                $count = count($data);
                for ($i=0; $i < $count; $i++) { 
                    $data[$i]['date_modified'] = Helper::dateDiff($data[$i]['date_modified']);
                }
                return $data;
            }
        } else {
            return "Only accepts GET requests";
        }
     }

     protected function getLoadmore(){
        if ($this->method == 'GET') {
            $data = Data::getLoadmore($_GET['start'], $_GET['limit']);
            if (empty($data)) {
                return (object)(array('error'=>'1','message'=>'No data'));
            } else {
                $count = count($data);
                for ($i=0; $i < $count; $i++) { 
                    $data[$i]['date_modified'] = Helper::dateDiff($data[$i]['date_modified']);
                }
                return $data;
            }
        } else {
            return "Only accepts GET requests";
        }
     }

     protected function getChapterUpdate_byCategory(){
        if ($this->method == 'GET') {
            $data = Data::getChapterUpdate_byCategory($_GET['slug']);
            if (empty($data)) {
                return (object)(array('error'=>'1','message'=>'No data'));
            } else {
                $count = count($data);
                for ($i=0; $i < $count; $i++) { 
                    $data[$i]['date_modified'] = Helper::dateDiff($data[$i]['date_modified']);
                }
                return $data;
            }
        } else {
            return "Only accepts GET requests";
        }
     }

     protected function getItemInfo(){
        if ($this->method == 'GET') {
            $data = Data::getItemInfo($_GET['slug']);
            if (empty($data)) {
                return (object)(array('error'=>'1','message'=>'No data'));
            } else {
                $data['story_status'] = Helper::storyStatus($data['story_status']);
                $data['date_modified'] = Helper::dateDiff($data['date_modified']);
                $data['story_view'] = Helper::storyViewFormat($data['story_view'] );
                return $data;
            }
            
        } else {
            return "Only accepts GET requests";
        }
     }


     protected function getListChapter(){
        if ($this->method == 'GET') {
            $data = Data::getListChapter($_GET['slug']);
            if (empty($data)) {
                return (object)(array('error'=>'1','message'=>'No data'));
            } else {
                $count = count($data);
                for ($i=0; $i < $count; $i++) { 
                    $data[$i]['date_modified'] = Helper::dateDiff($data[$i]['date_modified']);
                    $data[$i]['chapter_view'] = Helper::storyViewFormat($data[$i]['chapter_view'] );
                }
                return $data;
            }
        } else {
            return "Only accepts GET requests";
        }
     }

     protected function getChapterContent(){
        if ($this->method == 'GET') {
            $data = Data::getChapterContent($_GET['storySlug'],$_GET['chapterSlug']);
            if (empty($data)) {
                return (object)(array('error'=>'1','message'=>'No data'));
            } else {
                $data['date_modified'] = Helper::dateTimestamp($data['date_modified']);
                return $data;
            }
        } else {
            return "Only accepts GET requests";
        }
     }

     protected function getCategoryInfo(){
        if ($this->method == 'GET') {
            $data = Data::getCategoryInfo($_GET['slug']);
            if (empty($data)) {
                return (object)(array('error'=>'1','message'=>'No data'));
            } else {
                return $data;
            }
            
        } else {
            return "Only accepts GET requests";
        }
     }
     protected function callStatus(){
        if ($this->method == 'POST') {
            $data = Data::updateStatus($_POST['chapter_slug'],$_POST['story_slug']);
            return (object)(array('error'=>'0','message'=>'No data'));
            //return $data;

        } else {
            return "Only accepts POST requests";
        }
     }

     protected function getStoryViewDay(){
        if ($this->method == 'GET') {
            $data = Data::getStory_byViewDay();
            if (empty($data)) {
                return (object)(array('error'=>'1','message'=>'No data'));
            } else {
                $count = count($data);
                for ($i=0; $i < $count; $i++) { 
                    $data[$i]['view_num'] = Helper::storyViewFormat($data[$i]['view_num'] );
                    $last = json_decode($data[$i]['story_last_chapter']);
                    $data[$i]['last_chapter_title'] = $last->title;
                    $data[$i]['last_chapter_slug'] = $last->slug;
                }
                return $data;
            }
        } else {
            return "Only accepts GET requests";
        }
     }

     protected function searchData(){
        if ($this->method == 'POST') {
            $data = Data::searchData($_POST['keyword']);
            if (empty($data)) {
                return (object)(array('error'=>'1','message'=>'No data'));
            } else {
                $count = count($data);
                for ($i=0; $i < $count; $i++) { 
                    $last = json_decode($data[$i]['story_last_chapter']);
                    $data[$i]['last_chapter_title'] = $last->title;
                }
                return $data;
            }
        } else {
            return "Only accepts POST requests";
        }
     }

     
 }