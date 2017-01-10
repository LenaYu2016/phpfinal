<?php
/**
 * Created by PhpStorm.
 * User: ran
 * Date: 3/8/2016
 * Time: 1:57 PM
 */

namespace Project\FAQ\libs;

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

//    public function click($filename){
//        var_dump($filename);
//        $file = "./files/" .$filename .".txt";
//
//        $fileArray = $this->parseInfo($file);
//        $fileArray[1]++;
//        $fileInfo=$fileArray[0] . "\n[movie-hit]:" .$fileArray[1];
//        var_dump($fileInfo);
//        $this->writeFile($file, $fileInfo);
//
//    }

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
