<?php
/**
 * Created by PhpStorm.
 * User: ran
 * Date: 4/9/2016
 * Time: 2:31 PM
 */

namespace Project\FAQ\libs;


class FAQFileOperation extends FileOperation
{
    public function __construct(){
        parent::__construct();
    }

    public function parseInfo($file){
        $info = $this->readFile($file);
        if($info!=false){
            $info = explode("[FAQ-hit]:",$info);
            //$info[0] = explode("*",$info[0]);
            //var_dump($info);
            return $info;
        }else{
            return false;
        }
    }
}