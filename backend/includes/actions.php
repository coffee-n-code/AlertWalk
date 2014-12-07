<?php

include('logic.php');

class Actions extends Logic {
    
    public $config;
    
    public function __construct() {
        $this->config = $this->getConfig("/config/config.php");
    }
    
    // Returns array of (int) area id mapped to the (string) area name for a given lat & long
    public function getArea() {
        $id = $_POST['id'];
        $query = "SELECT * FROM areas WHERE id = ?";
        $data = array($id);
        $area = $this->queryDatabase($query, $data);
        return array(
            "id" => $id,
            "name" => $area['name'],
            "cityid" => $area['cityid'],
        );
    }
    
    public function getCity() {
        $id = $_POST['id'];
        $query = "SELECT * from cities WHERE id = ?";
        $data = array($id);
        $city = $this->queryDatabase($query, $data);
        return array(
            "id" => $id,
            "name" => $city['name'],
        );
    }
    
    // Returns (int) for a given (int) areaID
    public function getCrimeRating() {
        $areaID = $_POST['area_id'];
        $filter = $_POST['filter'];
        $crimes = null;
        if($filter !== null) {
            $crimes = $this->getCrimes($areaID, $filter);
        }
        else {
            $crimes = $this->getCrimes($areaID);
        }
        $config = $this->config;
        // importance values. (What are the worst crimes??)
        $importance = $config['importance'];
        // calculate the amount of unique years.
        $years = array();
        $risk = 0; // by default. start at 0
        foreach($crimes as $c) {
            $type = $c['type'];
            $amount = $c['amount'];
            if(!(in_array($c['year'], $years))) {
                $years[] = $year;
            }
            $risk += ($importance[$type] * $amount);
        }
        $risk = (( $risk / count($crimes) / count($years)));
        return array(
            "risk" => $risk,
        );
    }
}
