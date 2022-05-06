<?php
class Request {
    private $address;
    public function __construct($address=null) {
        if (!isset($address)) {
            throw new Exception('Url IS not Giveen.');
        }
        $this->address = $address;
    }
    public $type;
    public $timeout =10;
    public $connectionTimeOut =15;
    public $token;
    private $responseBody;
    private $responseHeader;
    private $httpCode;
    private $error;
    private $postFields;

    public function getType() {
        return $this->type;
    }
    public function settype($type) {
        $this->type = $type;
    }
    public function getToken() {
        return $this->token;
    }
    public function setToken($token) {
        $this->token = $token;
    }
    public function setPostFields($fields =array()) {
        $this->PostField = $fields ;
    }
    public function getHeader() {
        return $this->responseHeader;
    }
    public function getresponse () {
        return $this->responseBody;
    }
    public function getError() {
        return $this->error;
    }
    public function execute() {
        $ch = curl_init();
        if (isset($this->token)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Authorization: Bearer ' . $this->token
                ));
        }
        if (isset($this->type)) {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $this->type);
        }
        if (isset($this->PostField )) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $this->PostField);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_URL, $this->address);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $this->connectTimeout);
        curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);
        $response = curl_exec($ch);
        $error = curl_error($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $time = curl_getinfo($ch, CURLINFO_TOTAL_TIME);
        curl_close($ch);

        $this->responseHeader = substr($response, 0, $header_size);
        $this->responseBody = substr($response, $header_size);
        $this->error = $error;
        $this->httpCode = $http_code;
    }
}