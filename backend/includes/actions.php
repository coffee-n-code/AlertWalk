<?php

include('logic.php');

class Actions extends Logic {
    
    // Returns array of (int) area id mapped to the (string) area name for a given lat & long
    public function getArea(lat, long) {
        return array(1 => 'The Annex');
    }
    
    // Returns (int) for a given (int) areaID
    public function getCrimeRating(areaID) {
        return 1;
    }
}
