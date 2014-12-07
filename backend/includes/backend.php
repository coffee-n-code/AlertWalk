<?php

include 'actions.php';

class Backend extends Actions {

    private $response = array();
    
    protected $config;
    
    public function __construct() {
        $config = $this->getConfig('../config/config.php');
        $this->config = $config;
    }
    
    public function getConfig($config_file = 'config.php') {
        $config = include($config_file);
        return $config;
    }

    public function setResponse() {
        
    }

    public function getResponse($json=true) {
        $response = $this->response;
        if($json === true) {
            $response = json_encode($response);
        }
        return $response;
    }
    
    public function getData() {
        if($this->config['testing'] === true) {
            // in testing mode.
        }
        else {
            // product mode.
        }
    }

}
