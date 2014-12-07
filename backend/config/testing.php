<?php
return array(
    "testing_data" => array(
        "crimes" => array(
            array(
                "cityid" => 1,
                "areaid" => 1,
                "type" => "assault",
                "amount" => 20,
            ),
        ),
        "areas" => array(
            array(
                "name" => "Example Area",
                "coords" => json_encode(array( // lat => lon
                    10 => 20,
                    30 => 20,
                )),
            ),
        ),
        "cities" => array(
            array(
                "name" => "Example City"
            ),
        ),
    ),
);
