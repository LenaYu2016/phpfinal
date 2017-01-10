
<?php
class Database{

    private static $dsn = 'mysql:host=localhost;dbname=php_project';
    private static $username = 'php_project';
    private static $password = 'dSRLJurwvR4A3AMc';
    //reference to db connection
    private static $db;

    private function __construct() {}
    //return reference to pdo object
    public static function getDB () {

        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                    self::$username,
                    self::$password);
                // disable emulated prepared statment
                self::$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                echo $error_message;
                exit();
            }
        }
        return self::$db;
    }
    public function getTableName()
    {
        $rating_tableName  = 'ratings';

        return $rating_tableName;
    }
    public function  getUnitWidth()
    {
        return $rating_unitwidth  = 15;
    }
    public function DbName()
    {
        return $rating_dbname  = 'php_project';
    }
    public function unit()
    {
        return $units=5;
    }
}








