<?php
/**
 * Created by PhpStorm.
 * User: ran
 * Date: 3/10/2016
 * Time: 1:44 AM
 */
namespace Project\MovieCalender\Model;

use Project\MovieCalender\libs\PDOOperation;
use \stdClass;
class CalenderModel{
    private $db;
    public function __construct(){
        $this->db = new PDOOperation(DATA_SOURCE_NAME,DB_USERNAME,DB_PASSWORD);
    }
/*
 * get specific Calendar informations
 *by id
 *
 */
    function getCalenderInfoById($id,$query){
        //var_dump($id);

        $result = $this->db->query($query,$para = ["Film_Id"=>$id]);



        $Booking=[];
        foreach ($result->rows as $row){
            if(is_array($row)){
                $film =  new stdClass();
                foreach($row as $key=>$value){
                    $film ->$key = $value;
                }


                $Booking[]=$film;
            }

        }


    return $Booking;
    }

    /**
     *
     * get calendar details
     * @param $query
     * @param null $para
     * @return array
     * @throws \Project\MovieCalender\libs\Exception
     *
     */
    function getCalenderDetail($query,$para=null){
        //$db = new PDOOperation(DATA_SOURCE_NAME,DB_USERNAME,DB_PASSWORD);

        $result = $this->db->query($query,$para);
        //var_dump($result);


        $Booking=[];
        foreach ($result->rows as $row){
            if(is_array($row)){
                $film =  new stdClass();
                foreach($row as $key=>$value){
                    $film ->$key = $value;
                }


                $Booking[]=$film;
            }

        }

        return $Booking;
    }


}

?>