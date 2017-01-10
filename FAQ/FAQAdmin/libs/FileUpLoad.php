<?php
/**
 * Created by PhpStorm.
 * User: ran
 * Date: 4/19/2016
 * Time: 9:41 PM
 */

namespace Project\FAQ\FAQAdmin\libs;


class FileUpLoad
{
    private $fileTemp;
    private $fileName;
    private $fileType;
    private $fileError;
    public function __construct($fileTemp,$fileName,$fileType,$fileError){
        $this->fileTemp = $fileTemp;
        $this->fileName = $fileName;
        $this->fileType = $fileType;
        $this->fileError = $fileError;
    }

    public function uploadFile(){
       $this->errorReports($this->fileError);
        $this->moveFile();
    }

    private function moveFile(){
        $fileName = $this->fileName;
        //$this->isImage($this->fileType);
       // var_dump($this->fileTemp);

//        if($result ==true){
//            $target_path = DEFAULT_IMAGE_PATH . $fileName;
//            move_uploaded_file($this->fileTemp, $target_path);
//        }else{
            $target_path = DEFAULT_FILE_PATH . $fileName;
        //var_dump($target_path);
            move_uploaded_file($this->fileTemp, $target_path);
        //}

    }

    private function isImage($img){

        return (boolean)preg_match("/image/i", $img);
    }

    private function errorReports($file_error){
        if ($file_error > 0)
        {
            echo "Problem";
            switch ($file_error)
            {
                case 1:
                    echo "File exceeded upload_max_filesize.";
                    break;
                case 2:
                    echo "File exceeded max_file_size";
                    break;
                case 3:
                    echo "File only partially uploaded.";
                    break;
                case 4:
                    echo "No file uploaded.";
                    break;
            }
            exit;
        }else{

            // no error
            return true;
        }
    }
}