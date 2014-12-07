<?php

include('logic.php');

class Actions extends Logic {
    
    // Returns array of (int) area id mapped to the (string) area name for a given lat & long
    public function getArea($id) {
        $query = "SELECT * FROM areas WHERE id = ?";
        $data = array($id);
        $area = $this->queryDatabase($query, $data);
        return array(
            "id": $id,
            "name": $area['name'],
            "cityid": $area['cityid'],
        );
    }
    
    public function getCity($id) {
        $query = "SELECT * from cities WHERE id = ?";
        $data = array($id);
        $city = $this->queryDatabase($query, $data);
        return array(
            "id": $id,
            "name": $city['name'],
        );
    }
    
    // Returns (int) for a given (int) areaID
    public function getCrimeRating($areaID, $filter=null) {
        $crimes = null;
        if($filter !== null) {
            $crimes = $this->getCrimes($areaID, $filter);
        }
        else {
            $crimes = $this->getCrimes($areaID);
        }
        // calculate the amount of unique years.
        $years = array();
        foreach($crimes as $c) {
            
        }
    }
}
