<?php
/**
 * 
 */

abstract class API 
{
    protected $method = '';
    protected $endpoint = '';
    protected $verb = '';
    protected $args = Array();
    protected $file = Null;
    protected $token = '';

    public function __construct($request) {
        header("Access-Control-Allow-Methods: *");
        header("Content-Type: application/json");

        $this->args = explode('/', rtrim($request, '/'));
        $this->endpoint = array_shift($this->args);
        
        if (array_key_exists(0, $this->args) && !is_numeric($this->args[0])) {
            $this->verb = array_shift($this->args);

        }

        $this->method = $_SERVER['REQUEST_METHOD'];
        if ($this->method == 'POST' && array_key_exists('HTTP_X_HTTP_METHOD', $_SERVER)) {
            if ($_SERVER['HTTP_X_HTTP_METHOD'] == 'DELETE') {
                $this->method = 'DELETE';
            } else if ($_SERVER['HTTP_X_HTTP_METHOD'] == 'PUT') {
                $this->method = 'PUT';
            } else {
                throw new Exception("Unexpected Header");
            }
        }

        switch($this->method) {
        case 'DELETE':
        case 'POST':
            $this->request = $this->_cleanInputs($_POST);
            
            break;
        case 'GET':
            $this->request = $this->_cleanInputs($_GET);
            break;
        case 'PUT':
            $this->request = $this->_cleanInputs($_GET);
            $this->file = file_get_contents("php://input");
            break;
        default:
            $this->_response('Invalid Method', 405);
            break;
        }
    }

    

    public function processAPI() {

        if (method_exists($this, $this->endpoint)) {
           // print_r($this->request);
            if (isset($this->request['token'])) {
                $token =  $this->accessToken($this->request['token']);
                //print_r($this->request['token']);
                if (!$token) {
                   // echo '----'.$token;
                    return $this->_response('Access denied', 404);
                } else {
                    //echo($this->_response($this->{$this->endpoint}($this->args)));
                    return $this->_response($this->{$this->endpoint}($this->args));
                } 
            } else {
                //print_r($this->request);
                return $this->_response("No API Key provided", 405);
            }
            
        }
        return $this->_response("No Endpoint: $this->endpoint", 500);
    }

    private function _response($data, $status = 200) {
        header("HTTP/1.1 " . $status . " " . $this->_requestStatus($status));
        return json_encode($data);
    }

    private function _cleanInputs($data) {
        $clean_input = Array();
        if (is_array($data)) {
            foreach ($data as $k => $v) {
                $clean_input[$k] = $this->_cleanInputs($v);
            }
        } else {
            $clean_input = trim(strip_tags($data));
        }
        return $clean_input;
    }

    private function _requestStatus($code) {
        $status = array(  
            200 => 'OK',
            404 => 'Not Found',   
            405 => 'Method Not Allowed',
            500 => 'Internal Server Error',
        ); 
        return ($status[$code])?$status[$code]:$status[500]; 
    }

    private function accessToken($token) {
        
       // $key = "NguyenMinhThu!@#$%^&*().";
    //$code = $this->encode('pankami.com',$key);
    //echo $code.'------'.$_SERVER['SERVER_NAME'];
    // localhost: VDhW4ELdoJDEXPoJLtAXYx7DGl_pVu8-Yq3LdbffCG4
    //pankami.com: z5KxPMPQqHcdyuC5e-imoJnPL4eE2sXBrLNt7_0R5P0
    
    //echo $token;

        //local: T2c1S1NPZjAwcm9tUWdQeGlvc2t4dz09
        //pankami: bmNKcVo3S0kwS3lWSWZsRm5xUlZFZz09

        if ($token != '') {
            //$key = "NguyenMinhThu!@#$%^&*().";
            //$code = $this->decode($token,$key);
            $code = $this->my_crypt($token,'d');
            //echo($this->my_crypt('pan.com','e'));
            //$str = explode(":", $code);
            if ( $code != '') {
                if ($code != $_SERVER['SERVER_NAME']) {
                    return false;
                } else {
                    return true;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
        
    }
/*
    private  function safe_b64encode($string) {
        $data = base64_encode($string);
        $data = str_replace(array('+','/','='),array('-','_',''),$data);
        return $data;
    }

    private function safe_b64decode($string) {
        $data = str_replace(array('-','_'),array('+','/'),$string);
        $mod4 = strlen($data) % 4;
        if ($mod4) {
            $data .= substr('====', $mod4);
        }
        return base64_decode($data);
    }

    private  function encode($value, $key){ 
        if(!$value){return false;}
        $text = $value;
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $text, MCRYPT_MODE_ECB, $iv);
        return trim($this->safe_b64encode($crypttext)); 
    }

    private function decode($value, $key){
        if(!$value){return false;}
        $crypttext = $this->safe_b64decode($value); 
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $crypttext, MCRYPT_MODE_ECB, $iv);
        return trim($decrypttext);
    }
    */

    private function my_crypt( $string, $action = 'e' ) {
        $secret_key = 'NguyenMinhThu!@#$%^&*().';
        $secret_iv = 'secret_pankami_iv';
     
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $key = hash( 'sha256', $secret_key );
        $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
     
        if( $action == 'e' ) {
            $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
        }
        else if( $action == 'd' ){
            $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
        }
     
        return $output;
    }
}