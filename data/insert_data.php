<?php
$json_file = "";

$json = file_get_contents($json_file);
$data = json_decode($json, true);

// database info
$database = array(
  'name' => '',
  'user' => '',
  'pass' => '',
  'host' => 'localhost',
  'port' => 3306,
);

$db = new PDO('mysql:host='.$database['host'].';port='.$database['port'].';dbname='.$database['name'].';charset=utf8', $database['user'], $database['pass']);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
