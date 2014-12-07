<?php

class Logic {

    public $db;

    protected $config;
    
    public function __construct() {
        $config = $this->getConfig('../config/config.php');
        $this->config = $config;
        if($config['testing'] !== true) {
            // run the database connection if not testing.
            $this->connectToDatabase();
        }
    }
    
    public function getConfig($config_file = 'config.php') {
        $config = include($config_file);
        return $config;
    }

    public function calculateCrimeRating() {
    
    }

    public function connectToDatabase() {
        // Connect to the database using config values using PDO.
        $database = $this->config['database'];
        $db = new PDO('mysql:host=localhost;dbname=testdb;charset=utf8', $database['user'], $database[''];
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        // Save the database instance to the global db variable.
        $this->db = $db;
    }

    public function getData() {
        $data = array();
        
        if ($config['testing'] === true) {
            $data = include('testing.php');
        }
        
        return $data;
    }

}
