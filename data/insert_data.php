<?php
$json_file = "json/crimes.json";

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

$number = 1;
foreach($data as $d) {
  print "Inserting Query #".$number;
  $db->query('INSERT INTO crimes(id, name, type, year, amount) VALUES('.$d[0].', '.$d[1].', '.$d[2].', '.$d[3].', '.$d[4].')');
  $number++;
}
