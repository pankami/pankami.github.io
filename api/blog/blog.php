<?php
require_once 'api.class.php';
require_once 'data.php';
class Blog extends API
{
     protected function getPost() {
        if ($this->method == 'GET') {
        	$data = Data::test();
        	if (empty($data)) {
        		return 'No data';
        	}
        	return $data;
        	
        	
            
        } else {
            return "Only accepts GET requests";
        }
     }
 }