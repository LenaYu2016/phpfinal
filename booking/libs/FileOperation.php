<?php
/**
 * Created by PhpStorm.
 * User: ran
 * Date: 3/8/2016
 * Time: 1:57 PM
 */
class FileOperation {
    public function __construct()
    {

    }

    /*
     * get all the information from files
     */
    public function readFile($file){
        if(file_exists($file)) {
                $f = fopen($file,"r");
                  $info = fread($f, filesize($file));
                fclose($f);
                return $info;
        }else{
            echo"file is not exist";
            return false;
        }
    }

    /*
     * get file information and change it to array.
     */

    public function parseInfo($file){
        $info = $this->readFile($file);
        if($info!=false){
            $info = explode("[movie-hit]:",$info);
            //var_dump($info);
            return $info;
        }else{
            return false;
        }
    }

    /**
     *
     * write to file
     * @param $file
     * @param $fileInfo
     * @return bool|int
     *
     *
     */

    public function writeFile($file, $fileInfo){
        if(file_exists($file)) {
            $f = fopen($file,"w");
            $info = fwrite($f, $fileInfo);
            fclose($f);
            return $info;
        }else{
            echo"file is not exist<br />";
            return false;
        }

    }


}


//$fo ->parseInfo("../files/film1.txt");
//$fo ->click("film1");
