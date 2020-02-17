<?php
define("DB_URL", "mysql:host=localhost;dbname=my;charset=utf8mb4");
define("DB_USERNAME","root");
define("DB_PASSWORD","");

spl_autoload_register(function ($class_name) {
    require_once  "classes/".strtolower($class_name).".php";
});

$db = new DB();
$db->__constructor();
