<?php
/**
 * Created by PhpStorm.
 * User: ran
 * Date: 4/24/2016
 * Time: 8:21 PM
 */

namespace Project\FAQ\FAQAdmin\Models;


use Project\FAQ\FAQAdmin\libs\FileOperation;

class FileOperationAdmin extends FileOperation
{
    public function __construct()
    {

    }

    /**
     *
     * update question file
     * @param $file
     * @return bool|int|string
     */

   public function updateFile($file){
       $file = DEFAULT_FILE_PATH."$file";
       //var_dump($file);
       if(file_exists($file)) {
           $result = $this->readFile($file);
           $result .= "[FAQ-hit]:0";
           $result = $this->writeFile($file, $result);
           return $result;
       }else{
           echo "Hi can not find filse";
           return false;
       }
   }

    /**
     *
     * save question file;
     * @param $file
     * @param $result
     * @return bool|int
     *
     */
    public function saveFile($file,$result){
        $file = DEFAULT_FILE_PATH."$file";
         //var_dump($file);
        //var_dump($result);
        if(file_exists($file)) {

            $result = $this->writeFile($file, $result);
            return $result;
        }else{
            return false;
        }
    }


    /**
     *
     * read question file
     * @param $file
     * @return array|bool|string
     *
     */
   public function readFAQFile($file){

        $file = DEFAULT_FILE_PATH."$file";
       //var_dump($file);
       if(file_exists($file)) {
           $result = $this->readFile($file);
            $result =explode("[FAQ-hit]:",$result);

           return $result;
       }else{
           //var_dump();
           echo "Hi can not find filse";
           return false;
       }
   }

    /**
     *
     * delete Question file
     * @param $file
     * @return bool
     *
     *
     */
   public function deleteFile($file){

       $file = DEFAULT_FILE_PATH."$file";
       if(file_exists($file)) {
           $result = unlink($file);
           return $result;
       }else{
           echo "Hi can not find filse";
           return false;
       }
   }
}