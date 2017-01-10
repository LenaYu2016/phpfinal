<?php

class Database
{
    private static $db;
    private static $dsn="mysql:host=localhost;dbname=php_project";
    private static $username="php_project";
    private static $password="dSRLJurwvR4A3AMc";
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