<?php
/**
 * Created by PhpStorm.
 * User: ran
 * Date: 3/8/2016
 * Time: 11:06 AM
 */
//require_once"../libs/PDOOperation.php";
//require_once"../libs/FileOperation.php";
//require_once"../config.php";
class TopRateModel {
    public function __construct(){

    }

    /*
     *
     * get all the film information and save it in object array;
     *
     *
     */

    public function getFilmInfo(){
       $db = new PDOOperation(DATA_SOURCE_NAME,DB_USERNAME,DB_PASSWORD);
        $result = $db->query("SELECT DISTINCT(running_films.Film_Id),`Film_Time`,`Film_Name`,`Film_Director`,`Film_Actor`,`Film_pic`,`Film_length`,`Price_Full`,running_films.Avaliable, `film_description`FROM `films`JOIN running_films ON films.Film_Id = running_films.Film_Id");
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
     *
     * sort FilmsInfo Array by filmClickNum.
     *
     */
    public function topRate(){
        $filmsInfo = $this->getFilmInfo();
        usort($filmsInfo, function($a, $b){
            if($a->filmClickNum == $b->filmClickNum){
                return 0;
            }
            return ($a->filmClickNum >$b->filmClickNum)?-1:1;
        });
        //var_dump($filmsInfo);
        return $filmsInfo;
    }
    /*
     * change the click number in the files
     */

    public function clickNumber($filename){

        $fo = new FileOperation();
        $file = "./files/" .$filename .".txt";
        $fileArray = $fo->parseInfo($file);
       // trim($fileArray[1]);
       // var_dump($fileArray[1]);
        $fileArray[1]++;
        $fileInfo=$fileArray[0] . "[movie-hit]:" .$fileArray[1];
        $fo->writeFile($file, $fileInfo);
        //var_dump($fileArray[1]);
    }

    /*
     *get flm list in order to get more informations from files
     *
     */

    public function getFilmsName($result){
        $filmDescription = [];
        if(is_array($result->rows)){

            foreach($result->rows as $row){
                if(is_array($row)){
                    foreach($row as $key=>$value){

                        if($key=="film_description"){

                            $value = "./files/" . $value .".txt";
                            $filmDescription[] =$value;

                        }
                    }
                }
            }
          return $filmDescription;
        }else{
            echo "input should be a array <br />";
            return false;
        }
    }

}

//$test = new TopRateModel();
//$test->getFilmInfo();
