<?php 
namespace Henshall\Timezones;
require("../src/Timezones.php");
$timezones = new Timezones("localhost", "root", "root", "database");
$zones = $timezones->get_local_timezone();
var_dump($zones);
 ?>