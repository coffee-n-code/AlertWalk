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
        "sexual assault" => 0.175,
        "break and enter" => 0.225,
        "robbery" => 0.175,
        "drug charges" => 0.15,
        "stolen vehicle" => 0.2,
        "theft" => 0.2125,
        "murder" => 1, // 1 is base.
    ),
);
