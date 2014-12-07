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

    public function connectToDatabase() {
        $database = $this->config['database'];
        $db = new PDO('mysql:host=localhost;dbname=testdb;charset=utf8', $database['user'], $database[''];
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $this->db = $db;
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
