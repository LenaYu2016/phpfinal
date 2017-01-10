<?php
/**
 * Created by PhpStorm.
 * User: ran
 * Date: 3/10/2016
 * Time: 1:44 AM
 *
 * film booking model finish all the datebase operation of getting films
 */
class FilmBookingModel extends TopRateModel{
    private $db;
    public function __construct(){
        $this->db = new PDOOperation(DATA_SOURCE_NAME,DB_USERNAME,DB_PASSWORD);
    }

    /**
     *
     * get film by id
     * @param $id
     * @return array
     */

    public function getFilmById($id){

        $result = $this->db->query("SELECT * FROM films WHERE Film_Id= :Film_Id;",$para = ["Film_Id"=>$id]);
        $fileName = $this->getFilmsName($result);
        $fo =new FileOperation();
        foreach($fileName as $value) {
            $fileArray = $fo->parseInfo($value);
            $filmDescription[] = $fileArray[0];
            $filmClickRate[] = $fileArray[1];
            $result->filmDiscription = $filmDescription;
            $result->filmClickRate = $filmClickRate;
        }

        $filmsInfo=[];
        foreach ($result->rows as $row){
            if(is_array($row)){
                $film =  new stdClass();
                foreach($row as $key=>$value){
                    $film ->$key = $value;
                }


                $filmsInfo[]=$film;
            }

        }
        for($i=0;$i<count($result->filmDiscription); $i++){
            $filmsInfo[$i]->filmDisc = $result->filmDiscription[$i];
        }

        for($i=0;$i<count($result->filmClickRate); $i++){
            $filmsInfo[$i]->filmClickNum = (int)$result->filmClickRate[$i];
        }

        return $filmsInfo;

    }

/*
 * get specific booking informations
 *
 *
 */
    function getBookingInfo($id,$query){
        //var_dump($id);
        //$db = new PDOOperation(DATA_SOURCE_NAME,DB_USERNAME,DB_PASSWORD);
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
     * get booking information detail
     * @param $para
     * @param $query
     * @return array
     *
     */
    function getBookingDetail($para, $query){
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


    /**
     *
     * update seats informations
     * @param $para
     * @param $query
     */
    function updateSeats($para, $query){
       // $db = new PDOOperation(DATA_SOURCE_NAME,DB_USERNAME,DB_PASSWORD);

        $result = $this->db->execute($query,$para);
    }

}

?>