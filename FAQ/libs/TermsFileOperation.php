<?php
/**
 * Created by PhpStorm.
 * User: ran
 * Date: 4/10/2016
 * Time: 1:53 AM
 */

namespace Project\FAQ\libs;


class TermsFileOperation extends FileOperation
{
    public function __construct(){
        parent::__construct();
    }

    public function parseInfo($file){
        $info = $this->readFile($file);
        if($info!=false){
            $info = explode("*",$info);
            //var_dump($info);
            return $info;
        }else{
            return false;
        }
    }
}