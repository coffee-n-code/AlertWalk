<?php

class Backend {

    private $response = array();

    public function setResponse() {
        
    }

    public function getResponse($json=true) {
        $response = $this->response;
        if($json === true) {
            $response = json_encode($response);
        }
        return $response;
    }

}
