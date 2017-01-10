<?php
/**
 * Created by PhpStorm.
 * User: ran
 * Date: 3/6/2016
 * Time: 10:09 AM
 */

namespace Project\MovieCalender\libs;
use \PDO;
use \stdClass;

class PDOOperation{
    private $pdo;
    private $statement;
    public function __construct($dsn, $username, $password){
        try {
            $this->pdo = new PDO($dsn, $username, $password);
        } catch(PDOException $e){
            $error_message = $e->getMessage();
            throw new Exception( "<p> Error message: $error_message </p>");
            exit();
        }

    }

    private function bindParam($paras){

        foreach ($paras as $key=>$value){

            $this->statement->bindValue(":$key", $value);
        }
    }

    public function query($query, $para=NULL){
        //$result =false;

        if(is_array($para)){
//            var_dump($para);
//            var_dump($query);
            try {
                $this->statement = $this->pdo->prepare($query);
                $this->bindParam($para);
                $this->statement->execute();
                $data = array();
                while ($row = $this->statement->fetch(PDO::FETCH_ASSOC)) {
                    $data[] = $row;

                }
                $result = new stdClass();
                $result->rows = $data;
                $result->num_rows = $this->statement->rowCount();

            } catch (PDOException $e){
                $error_message = $e->getMessage();
                throw new Exception("<p> Error message: $error_message </p>");
                exit();
            }
        }else{
            try {
                $this->statement = $this->pdo->prepare($query);
                $this->statement->execute();
                    $data = array();
                    while ($row = $this->statement->fetch(PDO::FETCH_ASSOC)) {
                        $data[] = $row;
                    }
                    $result = new stdClass();
                    $result->rows = $data;
                    $result->num_rows = $this->statement->rowCount();

            } catch (PDOException $e){
                $error_message = $e->getMessage();
                throw new Exception("<p> Error message: $error_message </p>");
                exit();
            }
        }

        if($result){
            return $result;
        }else{
            $result = new stdClass();
            $result->rows = array();
            $result->num_rows = 0;
            return $result;
        }
    }

    public function execute($query, $para = NULL){
        if(is_array($para)){
                try {
                    $this->statement = $this->pdo->prepare($query);
                        $this->bindParam($para);
                        $this->statement->execute();
                        return true;

                } catch (PDOException $e) {
                    $error_message = $e->getMessage();
                    throw new Exception("<p> Error message: $error_message </p>");
                    exit();
                }
            }else{
            return false;
        }
    }



    public function __destruct() {
        $this->pdo = null;
    }


}