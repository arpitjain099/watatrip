<?php

// Include the ORM library
require_once('app/views/airlines/idiorm.php');

$host = 'localhost';
$user = 'root1';
$pass = '';
$database = 'laravel';

ORM::configure("mysql:host=$host;dbname=$database");
ORM::configure('username', $user);
ORM::configure('password', $pass);


ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

?>

