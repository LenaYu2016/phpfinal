<?php

class Database
{
    private static $db;
    private static $dsn="mysql:host=localhost;dbname=php_project";
    private static $username="root";
    private static $password="";
    public static function getDB(){
       if(!isset(self::$db)) {
           try {
               self::$db = new PDO(self::$dsn, self::$username, self::$password);
           } catch (PDOException $e) {
               $error_message = $e->getMessage();
               include "../Errors/DatabaseError.php";
               exit();
           }
       }
        return self::$db;
    }
    public function __construct()
    {

    }

}