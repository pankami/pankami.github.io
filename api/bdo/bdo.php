<?php

require_once 'api.class.php';

require_once 'data.php';

require_once 'helper.php';

class BDO extends API

{

    protected function getAllPost(){

        if ($this->method == 'GET') {

            $data = Data::getAllPost();

            if (empty($data)) {

                return (object)(array('error'=>'1','message'=>'No data'));

            } else {

                $count = count($data);

                $source = array();

                for ($i=0; $i < $count; $i++) { 

                    $source[$data[$i]['cate_slug']]['thumbnail'] = $data[$i]['cate_thumbnail'];

                    $source[$data[$i]['cate_slug']]['title'] = $data[$i]['cate_title'];

                    $source[$data[$i]['cate_slug']]['list'][$i] = $data[$i];

                }

                return $source;

            }

        } else {

            return "Only accepts GET requests";

        }

     }



     protected function getLastUpdate(){

        if ($this->method == 'GET') {

            $data = Data::getLastUpdate();

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



     protected function getPostData(){

        if ($this->method == 'GET') {

            $data = Data::getPostData($_GET['slug']);

            if (empty($data)) {

                return (object)(array('error'=>'1','message'=>'No data'));

            } else {

                $data['date_created2'] = Helper::dateFormatFull($data['date_created']);

                $data['date_modified2'] = Helper::dateFormatFull($data['date_modified']);

                $data['date_modified'] = Helper::dateDiff($data['date_modified']);

                return $data;

            }

        } else {

            return "Only accepts GET requests";

        }

     }



     protected function updateStatus(){

        if ($this->method == 'POST') {

            $data = Data::updateView($_POST['slug']);

            return (object)(array('error'=>'0','message'=>'No data'));

        } else {

            return (object)(array('error'=>'1','message'=>'Only accepts POST requests'));

        }

     }

     protected function getMarketPriceItem(){

        if ($this->method == 'POST') {

            $listServer = array(

                'NA' => 'https://na-trade.naeu.playblackdesert.com/Trademarket/GetWorldMarketSubList',

                'EU' => 'https://eu-trade.naeu.playblackdesert.com/Trademarket/GetWorldMarketSubList',

                'SEA' => 'https://trade.sea.playblackdesert.com/Trademarket/GetWorldMarketSubList',

                'MENA'=>'https://trade.tr.playblackdesert.com/Trademarket/GetWorldMarketSubList',

                'KR' => 'https://trade.kr.playblackdesert.com/Trademarket/GetWorldMarketSubList',

                'RU' => 'https://trade.ru.playblackdesert.com/Trademarket/GetWorldMarketSubList',

                'JP' => 'https://trade.jp.playblackdesert.com/Trademarket/GetWorldMarketSubList',

                'TH' =>'https://trade.th.playblackdesert.com/Trademarket/GetWorldMarketSubList',

                'TW' => 'https://trade.tw.playblackdesert.com/Trademarket/GetWorldMarketSubList',

                'SA' => 'https://blackdesert-tradeweb.playredfox.com/Trademarket/GetWorldMarketSubList',

                'CON_EU' => 'https://eu-trade.console.playblackdesert.com/Trademarket/GetWorldMarketSubList',

                'CON_NA' => 'https://na-trade.console.playblackdesert.com/Trademarket/GetWorldMarketSubList',

                'CON_ASIA' => 'https://asia-trade.console.playblackdesert.com/Trademarket/GetWorldMarketSubList'



            );

            $listItem = array(

                'MR' => '705511',

                'MB' => '705512',

                'ME' => '705510',

                'MN' => '705509',

                'CS' => '721003',

                'MF' => '44195',

            );

            $postRequest = array(

                'server' => $_POST['server']

            );

            $arrPrice = array();

            $curl = curl_init();

            foreach ($listItem as $key => $value) {

                $price = 0;

                $header = array(

                'Content-Type: application/json',

                    'User-Agent: BlackDesert'

                );

                curl_setopt_array($curl, array(

                CURLOPT_URL => $listServer[$postRequest['server']],

                CURLOPT_RETURNTRANSFER => true,

                CURLOPT_ENCODING => "",

                CURLOPT_MAXREDIRS => 10,

                CURLOPT_TIMEOUT => 30,

                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

                CURLOPT_CUSTOMREQUEST => "POST",

                CURLOPT_POSTFIELDS => '{

                    "keyType": 0,

                    "mainKey": '.$value.',

                    "subKey": 0

                    }',

                CURLOPT_HTTPHEADER => $header

                ));



                $response = curl_exec($curl);

                $err = curl_error($curl);

                $data = json_decode($response,true);

                if (isset($data['resultMsg'])) {

                    $str = explode("|",$data['resultMsg']);

                    if (isset($str[0])) {

                        $str2 = explode("-",$str[0]);

                        if (isset($str2[3])) {

                            $price = $str2[3];

                        }

                    }

                }

                $arrPrice[$key] = $price;



            }

            curl_close($curl);

            if (empty($arrPrice)) {

                return (object)(array('error'=>'1','message'=>'No data'));

            } else {

                return (object)$arrPrice;

            }

                       

        } else {

            return "Only accepts POST requests";

        }

     }
     protected function getMarketPriceItem3(){
        if ($this->method == 'POST') {
            $listServer = array(
                'NA' => 'https://na-trade.naeu.playblackdesert.com/Trademarket/GetWorldMarketSearchList',
                'EU' => 'https://eu-trade.naeu.playblackdesert.com/Trademarket/GetWorldMarketSearchList',
                'SEA' => 'https://trade.sea.playblackdesert.com/Trademarket/GetWorldMarketSearchList',
                'MENA'=>'https://trade.tr.playblackdesert.com/Trademarket/GetWorldMarketSearchList',
                'KR' => 'https://trade.kr.playblackdesert.com/Trademarket/GetWorldMarketSearchList',
                'RU' => 'https://trade.ru.playblackdesert.com/Trademarket/GetWorldMarketSearchList',
                'JP' => 'https://trade.jp.playblackdesert.com/Trademarket/GetWorldMarketSearchList',
                'TH' =>'https://trade.th.playblackdesert.com/Trademarket/GetWorldMarketSearchList',
                'TW' => 'https://trade.tw.playblackdesert.com/Trademarket/GetWorldMarketSearchList',
                'SA' => 'https://blackdesert-tradeweb.playredfox.com/Trademarket/GetWorldMarketSearchList',
                'CON_EU' => 'https://eu-trade.console.playblackdesert.com/Trademarket/GetWorldMarketSearchList',
                'CON_NA' => 'https://na-trade.console.playblackdesert.com/Trademarket/GetWorldMarketSearchList',
                'CON_ASIA' => 'https://asia-trade.console.playblackdesert.com/Trademarket/GetWorldMarketSearchList'

            );
            $postRequest = array(
                //'server' => $_POST['server']
                'server' => "SEA"
            );
            $arrPrice = array();
            $curl = curl_init();
                $price = 0;
                $header = array(
                'Content-Type: application/json',
                    'User-Agent: BlackDesert'
                );
                curl_setopt_array($curl, array(
                CURLOPT_URL => $listServer[$postRequest['server']],
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => '{
                    "searchResult": "9494,9402,9419,9255,9409,9446,9279,9271,9257,9275,9436,9205,9294,9213,9439,9299,9210,9256,9429,9262,9407,9283,9211,9495,9417,9445,9301,9278,9216,9214,9219,9206,9295,9493,9280,9217,9302,9421,9208,9418,9428,9270,9492,9292,9297,9440,9258,9285,9412,9411,9413,9433,9304,9454,9405,9450,9201,9269,9291,9441,9241,9284,9293,9293,9259,9414,9260,9489,9447,9305,9274,9264,9474,9471,9204,9473,9288,9437,9265,9442,9220,9488,9202,9472,9420,9449,9453,9287,9300,9423,9410,9403,9281,9286,9308,9483,9218,9303,9475,9312,9316,9424,9307,9310,9309,9317,9434,9461,9462,9408,9452,9427,9484,9431,9268,9273,9416,9444,9406,9311,9476,9401,9261,9430,9276,9451,9404,9298,9289,9460,9318,9490,9426,9296,9263,9438,9487,9459,9422,9632,9496,9486,9266,9282,9203,9448,9207,9277,9425,9491,9432,9435,9319,9463,9464,9415,9443,9267,9290,9337,9338,9610,9631,9634,9605,9606,9477,9609,9469,9608,9607,9470,9479,9480,9604,9478,9603,9635,9636,9637,9632,9601,9602,9638,9639"
                    }',
                CURLOPT_HTTPHEADER => $header
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);
                $data = json_decode($response,true);
                $arr = array();
                if (isset($data['resultMsg'])) {
                    $str = explode("|",$data['resultMsg']);
                    $count = count($str);
                    for ($i=0; $i < $count; $i++) { 
                        $str2 = explode("-",$str[$i]);
                        $count2 = count($str2);
                        for ($j=0; $j < $count2; $j++) { 
                            $arr[$str2[0]]['id'] = $str2[0];
                            $arr[$str2[0]]['stock'] = $str2[1];
                            $arr[$str2[0]]['price'] = $str2[2];
                        }
                    }
                }

            curl_close($curl);
            if (empty($arr)) {
                return (object)(array('error'=>'1','message'=>'No data'));
            } else {
                return $arr;
            }
                       
        } else {
            return "Only accepts POST requests";
        }
     }

     protected function getMarketPriceItem4(){
        if ($this->method == 'POST') {
            $listServer = array(
                'NA' => 'https://na-trade.naeu.playblackdesert.com/Trademarket/GetWorldMarketSearchList',
                'EU' => 'https://eu-trade.naeu.playblackdesert.com/Trademarket/GetWorldMarketSearchList',
                'SEA' => 'https://trade.sea.playblackdesert.com/Trademarket/GetWorldMarketSearchList',
                'MENA'=>'https://trade.tr.playblackdesert.com/Trademarket/GetWorldMarketSearchList',
                'KR' => 'https://trade.kr.playblackdesert.com/Trademarket/GetWorldMarketSearchList',
                'RU' => 'https://trade.ru.playblackdesert.com/Trademarket/GetWorldMarketSearchList',
                'JP' => 'https://trade.jp.playblackdesert.com/Trademarket/GetWorldMarketSearchList',
                'TH' =>'https://trade.th.playblackdesert.com/Trademarket/GetWorldMarketSearchList',
                'TW' => 'https://trade.tw.playblackdesert.com/Trademarket/GetWorldMarketSearchList',
                'SA' => 'https://blackdesert-tradeweb.playredfox.com/Trademarket/GetWorldMarketSearchList',
                'CON_EU' => 'https://eu-trade.console.playblackdesert.com/Trademarket/GetWorldMarketSearchList',
                'CON_NA' => 'https://na-trade.console.playblackdesert.com/Trademarket/GetWorldMarketSearchList',
                'CON_ASIA' => 'https://asia-trade.console.playblackdesert.com/Trademarket/GetWorldMarketSearchList'

            );
            $postRequest = array(
                //'server' => $_POST['server']
                'server' => "SEA"
            );
            $arrPrice = array();
            $curl = curl_init();
                $price = 0;
                $header = array(
                'Content-Type: application/json',
                    'User-Agent: BlackDesert'
                );
                curl_setopt_array($curl, array(
                CURLOPT_URL => $listServer[$postRequest['server']],
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => '{
                    "searchResult": "668,669,708,709,710,694,682,695,703,702,711,683,724,714,671,678,706,707,725,763,670,715,762,679,754,749,773,704,688,716,727,689,705,774,753,717,750,726,778,665,690,777,723,691,701,677,676,700,693,664,692,722,685,697,675,761,696,681,718,719,684,783,782,674,680,686,687,712,720,740,741,721,672,698,713,699,673"
                    }',
                CURLOPT_HTTPHEADER => $header
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);
                $data = json_decode($response,true);
                $arr = array();
                if (isset($data['resultMsg'])) {
                    $str = explode("|",$data['resultMsg']);
                    $count = count($str);
                    for ($i=0; $i < $count; $i++) { 
                        $str2 = explode("-",$str[$i]);
                        $count2 = count($str2);
                        for ($j=0; $j < $count2; $j++) { 
                            $arr[$str2[0]]['id'] = $str2[0];
                            $arr[$str2[0]]['stock'] = $str2[1];
                            $arr[$str2[0]]['price'] = $str2[2];
                        }
                    }
                }

            curl_close($curl);
            if (empty($arr)) {
                return (object)(array('error'=>'1','message'=>'No data'));
            } else {
                return $arr;
            }
                       
        } else {
            return "Only accepts POST requests";
        }
     }

     protected function getMarketPriceItem5(){
        if ($this->method == 'GET') {
            $listServer = array(
                'NA' => 'https://na-trade.naeu.playblackdesert.com/Trademarket/GetWorldMarketSearchList',
                'EU' => 'https://eu-trade.naeu.playblackdesert.com/Trademarket/GetWorldMarketSearchList',
                'SEA' => 'https://trade-live.wow-vn.com/Trademarket/GetWorldMarketWaitList',
                'MENA'=>'https://trade-live.wow-vn.com/Trademarket/GetWorldMarketWaitList',
                'KR' => 'https://trade.kr.playblackdesert.com/Trademarket/GetWorldMarketSearchList',
                'RU' => 'https://trade.ru.playblackdesert.com/Trademarket/GetWorldMarketSearchList',
                'JP' => 'https://trade.jp.playblackdesert.com/Trademarket/GetWorldMarketSearchList',
                'TH' =>'https://trade.th.playblackdesert.com/Trademarket/GetWorldMarketSearchList',
                'TW' => 'https://trade.tw.playblackdesert.com/Trademarket/GetWorldMarketSearchList',
                'SA' => 'https://blackdesert-tradeweb.playredfox.com/Trademarket/GetWorldMarketSearchList',
                'CON_EU' => 'https://eu-trade.console.playblackdesert.com/Trademarket/GetWorldMarketSearchList',
                'CON_NA' => 'https://na-trade.console.playblackdesert.com/Trademarket/GetWorldMarketSearchList',
                'CON_ASIA' => 'https://asia-trade.console.playblackdesert.com/Trademarket/GetWorldMarketSearchList'

            );
            $postRequest = array(
                //'server' => $_POST['server']
                'server' => "SEA"
            );
            $arrPrice = array();
            $curl = curl_init();
                $price = 0;
                $header = array(
                'Content-Type: application/json',
                    'User-Agent: BlackDesert'
                );
                curl_setopt_array($curl, array(
                CURLOPT_URL => $listServer[$postRequest['server']],
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => null,
                CURLOPT_HTTPHEADER => $header
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);
                $data = json_decode($response,true);
                $arr = array();
                if (isset($data['resultMsg']) && $data['resultMsg'] != '0') {
                    $str = explode("|",rtrim($data['resultMsg'], '|'));

                    $count = count($str);
                   //print_r($str);
                    for ($i=0; $i < $count; $i++) { 

                        $str2 = explode("-",$str[$i]);
                       // print_r($str2);
                        $count2 = count($str2);
                        for ($j=0; $j < $count2; $j++) { 
                            $arr[$i]['item_id'] = $str2[0];
                            $arr[$i]['level'] = $str2[1];
                            $arr[$i]['price'] = $str2[2];
                            $arr[$i]['start_time'] = $str2[3];
                        }
                    }
                    
                }


            curl_close($curl);
            if (empty($arr)) {
                return (object)(array('error'=>'1','message'=>'No data'));
            } else {
                return $arr;
            }
                       
        } else {
            return "Only accepts GET requests";
        }
     }
 

 }