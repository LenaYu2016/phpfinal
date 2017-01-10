<?php
/**
 * Created by PhpStorm.
 * User: ran
 * Date: 4/9/2016
 * Time: 2:10 PM
 */

namespace Project\FAQ\Models;


use Project\FAQ\libs\FAQFileOperation;
use Project\MovieCalender\libs\PDOOperation;

class FAQModel
{
    private $db;
    public function __construct(){
        $this->db = new PDOOperation(DATA_SOURCE_NAME,DB_USERNAME,DB_PASSWORD);
    }

    /**
     *
     * get all question from database faq table
     * @return array
     * @throws \Project\MovieCalender\libs\Exception
     *
     */
    public function getAllQuestions(){
        $query = "Select * From faq";
        $result = $this->db->query($query);

        $faqArray = [];
        foreach($result->rows as $row){
            $result = $this->buildResult($row);
            $faqArray[] = $result;
        }

        return $faqArray;

    }

    /**
     *
     * Customize query and return sql results
     * @param $query
     * @param null $param
     * @return array
     * @throws \Project\MovieCalender\libs\Exception
     */
    public function getAll($query, $param=NULL){
        //$query = "Select * From faq";
        $result = $this->db->query($query,$param);

        $faqArray = [];
        foreach($result->rows as $row){
            $result = $this->buildResult($row);
            $faqArray[] = $result;
        }

        return $faqArray;

    }

    /**
     *
     * read faq answer from files
     * @param $fileName
     * @return array|bool|string
     *
     */
    private function getFAQFileInfo($fileName){
        $file = "./files/faq/$fileName";

        $faqAnswer = new FAQFileOperation();
        $answer = $faqAnswer->parseInfo($file);
        return $answer;
    }


    /**
     * format sql result put all the result in an object array
     * @param $row
     * @return \stdClass
     *
     */
    private function buildResult($row){
        // var_dump($row);
        $faq = new \stdClass();
        if(isset($row['answers'])) {
            $fileName = $row['answers'];
            $result = $this->getFAQFileInfo($fileName);
            $faq->answer = $result[0];
            $faq->frequency = $result[1];
        }
        foreach($row as $key=>$value) {
            $faq->$key = $value;

        }
        return $faq;
    }

    /**
     * count click time save click number into files
     * @param $id
     */
    public function increaseClickNumber($id){
        $writeFile = new FAQFileOperation();
        $query = "Select answers From faq WHERE question_id=:question_id";
        $param=['question_id'=>$id];
        $result = $this->getAll($query,$param);
        //var_dump($result);
        $content=$result[0]->answer;
//        foreach ($result[0]->answer as $value){
//            $i++;
//            //var_dump($i);
//            if($i==1) {
//                $content .= $value;
//            }else{
//                $content .= "*".$value;
//            }
//           // var_dump($content);
//        }
        $num = $result[0]->frequency+1;
        $content .="[FAQ-hit]:".$num;
        $filepath = "./files/faq/".$result[0]->answers;
        $writeFile->writeFile($filepath, $content);
    }


    /**
     *
     * Search question by category
     * @param $category
     * @param $str
     * @return array
     *
     */
    public function searchQuestion($category,$str){
        if($category==="allQuestion"){
            $query = "Select *From faq Order By question_id";
            $question = $this->getAll($query);
            //var_dump($question);
        }else {
            $query = "Select *From faq WHERE category=:category Order By question_id";
            $param = ['category' => $category];
            $question = $this->getAll($query, $param);
            //var_dump($question);
        }
        $hint=[];
        if($str!=""){
            $search = strtolower($str);
            //var_dump($question);
            $len=strlen($search);
            foreach ($question as $value){
                     $flag =0;   //var_dump($value->questions);
                if (stristr($search, substr($value->questions,0,$len))) {
                    $hintobj=new \stdClass();
                    $hintobj->question_id = $value->question_id;
                    $hintobj->questions = $value->questions;
                    $hintobj->answer = $value->answer;
                    $hintobj->frequency = $value->frequency;

                    $hint[] =$hintobj;
                    $flag=1;
                }
                //////
                if(stripos($value->questions,$search) && $flag==0){
                    $hintobj=new \stdClass();
                    $hintobj->question_id = $value->question_id;
                    $hintobj->questions = $value->questions;
                    $hintobj->answer = $value->answer;
                    $hintobj->frequency = $value->frequency;
                    $hint[] =$hintobj;
                }
                /////
            }
            return $hint;
        }else{
            return $question;
        }

    }

}