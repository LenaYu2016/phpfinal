<?php

error_reporting(0);
$dsn = 'mysql:host=localhost;dbname=php_project';
$username = 'root';
$password = '';
require('../model/PDOOperation.php');
// try {
$db = new PDO($dsn, $username, $password);


?>
