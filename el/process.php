<?php
require_once 'data.php';
class BDO 
{
     public static function getAllPost(){
            $data = Data::getAllPost();
            if (empty($data)) {
                return (object)(array('error'=>'1','message'=>'No data'));
            } else {
                return $data;
            }
     }
     public static function getPost($id){
        $data = Data::getPost($id);
        if (empty($data)) {
            return (object)(array('error'=>'1','message'=>'No data'));
        } else {
            return $data;
        }
    }
    
    public static function getAllCategory(){
        $data = Data::getAllCategory();
        if (empty($data)) {
            return (object)(array('error'=>'1','message'=>'No data'));
        } else {
            return $data;
        }
    }

    public static function setPost($form){
        $data = Data::setPost($form);
        if (empty($data)) {
            return (object)(array('error'=>'1','message'=>'No data'));
        } else {
            return $data;
        }
    }
    public static function updatePost($form){
        $data = Data::updatePost($form);
        if (empty($data)) {
            return (object)(array('error'=>'1','message'=>'No data'));
        } else {
            return $data;
        }
    }
    public static function deletePost($id){
        $data = Data::deletePost($id);
        if (empty($data)) {
            return (object)(array('error'=>'1','message'=>'No data'));
        } else {
            return $data;
        }
    }
    public static function deleteCategory($id){
        $data = Data::deleteCategory($id);
        if (empty($data)) {
            return (object)(array('error'=>'1','message'=>'No data'));
        } else {
            return $data;
        }
    }

    public static function setCategory($form){
        $data = Data::setCategory($form);
        if (empty($data)) {
            return (object)(array('error'=>'1','message'=>'No data'));
        } else {
            return $data;
        }
    }
    public static function getCategory($id){
        $data = Data::getCategory($id);
        if (empty($data)) {
            return (object)(array('error'=>'1','message'=>'No data'));
        } else {
            return $data;
        }
    }

    public static function updateCategory($form){
        $data = Data::updateCategory($form);
        if (empty($data)) {
            return (object)(array('error'=>'1','message'=>'No data'));
        } else {
            return $data;
        }
    }

     
 }