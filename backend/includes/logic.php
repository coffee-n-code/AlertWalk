<?php

class Logic {

    protected $config;
    
    public function __construct() {
        $config = $this->getConfig('../config/config.php');
        $this->config = $config;
    }
    
    public function getConfig($config_file = 'config.php') {
        $config = include($config_file);
        return $config;
    }

    public function calculateCrimeRating() {
    
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
