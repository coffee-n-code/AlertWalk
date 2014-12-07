<?php

include 'actions.php';

class Backend extends Actions {

    private $response = array();

    public function setAction($action) {
        $this->response = $this->$action();
    }

    public function getResponse($json=true) {
        $response = $this->response;
        if($json === true) {
            $response = json_encode($response);
        }
        return $response;
    }

}
