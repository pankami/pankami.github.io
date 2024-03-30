<?php
require_once 'api.class.php';
require_once 'data.php';
class BNS extends API
{
     protected function testPost() {
        if ($this->method == 'POST') {
        	print_r($_POST);
        	$data = Data::test();
        	if (empty($data)) {
        		return 'No data';
        	}
        	return $data;
        	
        	
            
        } else {
            return "Only accepts POST requests";
        }
     }

     protected function getInfo(){
        if ($this->method == 'GET') {
            $data = Data::getInfo();
            if (empty($data)) {
                return 'No data';
            }
            return $data;
        } else {
            return "Only accepts GET requests";
        }
     }
     protected function getCounterAll(){
        if ($this->method == 'GET') {
            $data = Data::getCounterAll();
            if (empty($data)) {
                return 'No data';
            }
            return $data;
        } else {
            return "Only accepts GET requests";
        }
     }

     protected function setCounter_bit32_default(){
        if ($this->method == 'GET') {
            Data::setCounter_bit32_default();
            return 1;
        } else {
            return "Only accepts GET requests";
        }
     }
     protected function setCounter_bit64_default(){
        if ($this->method == 'GET') {
            Data::setCounter_bit64_default();
            return 1;
        } else {
            return "Only accepts GET requests";
        }
     }
     protected function setCounter_bit32_sf3(){
        if ($this->method == 'GET') {
            Data::setCounter_bit32_sf3();
            return 1;
        } else {
            return "Only accepts GET requests";
        }
     }
     protected function setCounter_bit64_sf3(){
        if ($this->method == 'GET') {
            Data::setCounter_bit64_sf3();
            return 1;
        } else {
            return "Only accepts GET requests";
        }
     }

     protected function getListClass(){
        if ($this->method == 'GET') {
            $data = Data::getListClass();
            if (empty($data)) {
                return 'No data';
            }
            return $data;
        } else {
            return "Only accepts GET requests";
        }
     }
     protected function getChildClass(){
        if ($this->method == 'GET') {
            $data = Data::getChildClass($_GET['child_id']);
            if (empty($data)) {
                return (object)(array('error'=>'1','message'=>'No data'));
            }
            return $data;
        } else {
            return "Only accepts GET requests";
        }
     }
     protected function getsf3(){
        if ($this->method == 'GET') {
            $data = Data::getSf3($_GET['class_id']);
            if (empty($data)) {
                return (object)(array('error'=>'1','message'=>'No data'));
            }
            return $data;
        } else {
            return "Only accepts GET requests";
        }
     }
     protected function getmetatitle(){
        if ($this->method == 'GET') {
            $data = Data::getMetaTitle($_GET['parent_id']);
            if (empty($data)) {
                return (object)(array('error'=>'1','message'=>'No data'));
            }
            return $data;
        } else {
            return "Only accepts GET requests";
        }
     }
     protected function getListSkill(){
        if ($this->method == 'GET') {
            $data = Data::getListSkill($_GET['group_id']);
            if (empty($data)) {
                return 'No data';
            }
            return $data;
        } else {
            return "Only accepts GET requests";
        }
     }
     protected function updateCounter(){
        if ($this->method == 'POST') {
            $data = Data::updateCounter($_POST['counter_id']);
            if (empty($data)) {
                return 'No data';
            }
            return $data;
        } else {
            return "Only accepts POST requests";
        }
     }
     protected function getLogFile(){
        if ($this->method == 'GET') {
            $data = Data::getLogFile();
            if (empty($data)) {
                return 'No data';
            }
            return $data;
        } else {
            return "Only accepts GET requests";
        }
     }
 }