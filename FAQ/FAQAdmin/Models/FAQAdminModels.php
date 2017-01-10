<?php
/**
 * Created by PhpStorm.
 * User: ran
 * Date: 4/24/2016
 * Time: 2:03 PM
 */

namespace Project\FAQ\FAQAdmin\Models;


use Project\FAQ\FAQAdmin\libs\FileOperation;
use Project\FAQ\FAQAdmin\libs\FileUpLoad;
use Project\FAQ\FAQAdmin\libs\PDOOperation;

class FAQAdminModels
{
    private $db="";

    public function __construct(){
        $this->db = new PDOOperation(DATA_SOURCE_NAME,DB_USERNAME,DB_PASSWORD);
    }

    /**
     *
     * show all the items in the table
     * @param $tablename
     * @return \stdClass
     * @throws \Exception
     */
    public function show($tablename){
        $sql="SELECT * FROM " . $tablename;
        $result =$this->db->query($sql);
        return $result;
    }

    /**
     *
     * show table item by id;
     * @param $tablename
     * @param $id
     * @return \stdClass
     * @throws \Exception
     *
     */
    public function showById($tablename,$id){
        $sql="SELECT * FROM " .$tablename . " WHERE question_id=:question_id";
        // var_dump($sql);
        $params=["question_id"=>$id];
        $result =$this->db->query($sql,$params);
        return $result;
    }

    /**
     *
     * insert row into table;
     * @param $tablename
     * @param $params
     * @return bool
     * @throws \Exception
     */
    public function insert($tablename, $params){
        $sql ="INSERT INTO ".$tablename." VALUES (NULL";
        $sql = $this->sqlBuilder($sql,$params);
        // var_dump($params);
        // var_dump($sql);
        $msg = $this->db->execute($sql,$params);
        return $msg;
    }


    /**
     *
     * delete item by id
     * @param $tablename
     * @param $id
     * @return bool
     * @throws \Exception
     */
    public function deleteById($tablename, $id){
        $sql = "DELETE FROM ". $tablename . " WHERE question_id=:question_id";
        $params=["question_id"=>$id];
         //var_dump($sql);
        $msg = $this->db->execute($sql, $params);
        return $msg;
    }

    protected function sqlBuilder($sql, $params){
        foreach($params as $key=>$value){
            $sql .= ", :$key";
        }
        $sql .=")";

        return $sql;
    }

    /**
     * create FAQ Question
     * @param $file
     * @param FAQ $FAQ
     * @return bool|int|string
     */
    public function createFAQ($file,  FAQ $FAQ){
        $fileTemp = $file['tmp_name'];
        $fileName = $file['name'];
        //var_dump($fileName);
        $fileType = $file['type'];
        $fileError = $file['error'];
        $FAQ->answers = $fileName;
        $params = ['questions'=>$FAQ->question,'answers'=>$FAQ->answers,'category'=>$FAQ->category];
        $this->insert('faq',$params);
        $uploadFile = new FileUpLoad($fileTemp,$fileName,$fileType,$fileError);
        $uploadFile->uploadFile();
        return $this->updateFile($fileName);
    }


    /**
     * delete FAQ Qustion
     * @param $file
     * @param $id
     * @return bool
     */
    public function deleteFAQ($file, $id){
        $this->deleteById('faq',$id);
        $faq = new FileOperationAdmin();
        $result =$faq->deleteFile($file);
        return $result;

    }

    /**
     *
     * Add click rate to faq answer
     * @param $file
     * @return bool|int|string
     *
     */
    private function updateFile($file){
       $faq = new FileOperationAdmin();
        $result = $faq->updateFile($file);
        return $result;
    }


    /**
     *
     * update FAQ QUESTION
     * @param $content
     * @param FAQ $FAQ
     * @param $id
     * @return bool|int
     * @throws \Exception
     *
     */
    public function updateFAQ($content,FAQ $FAQ,$id){
        $sql = "UPDATE faq SET questions=:questions,category=:category WHERE question_id=:question_id";
        $params =["questions"=>$FAQ->questions,"category"=>$FAQ->category,"question_id"=>$id];
        $this->db->execute($sql,$params);
        $file = new FileOperationAdmin();
        $result =$file->saveFile($FAQ->answers, $content);
        return $result;
    }

}