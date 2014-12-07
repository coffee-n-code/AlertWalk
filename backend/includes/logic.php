<?php

class Logic {

    public $db;
    
    public function __construct() {
        if($config['testing'] !== true) {
            // run the database connection if not testing.
            $this->connectToDatabase();
        }
    }
    
    public function getConfig($config_file) {
        $config = include($config_file);
        return $config;
    }

    public function calculateCrimeRating() {
        
    }
    
    public function queryDatabase($query, $data) {
        $db = $this->db;
        $stmt = $db->prepare($query);
        $stmt->execute($data);
        return $stmt->fetchAll();
    }

    public function connectToDatabase() {
        // Connect to the database using config values using PDO.
        $database = $this->config['database'];
        $db = new PDO('mysql:host='.$database['host'].';port='.$database['port'].';dbname='.$database['name'].';charset=utf8', $database['user'], $database['pass']);
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
