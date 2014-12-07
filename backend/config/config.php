<?php
return array(
    "config" => false,
    "database" => array(
        "name" => "",
        "user" => "",
        "pass" => "",
        "host" => "localhost",
        "port" => 3306, // 3306 by default.
    ),
    "importance" => array(
        "assault" => 0.15,
        "sexual_assault" => 0.175,
        "break_and_enter" => 0.225,
        "robbery" => 0.175,
        "drug_charges" => 0.15,
        "stolen_vehicle" => 0.2,
        "theft" => 0.2125,
        "murder" => 1, // 1 is base.
    ),
);
