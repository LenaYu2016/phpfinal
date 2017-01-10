<?php
/**
 * Created by PhpStorm.
 * User: ran
 * Date: 4/24/2016
 * Time: 3:10 PM
 */

namespace Project\FAQ\FAQAdmin\Models;


class FAQ
{

    //private $question_id;
    public $questions;
    public  $answers;
    public $category;


//    public function setQuestion($value){
//        $this->question =$value;
//    }
//    public function setAnswers($value){
//        $this->answers =$value;
//    }
//
//    public function setCategory($value){
//        $this->category = $value;
//    }
//
//    public function getQuestion(){
//        return $this->question;
//    }
//
//    public function getAnswers(){
//        return $this->answers;
//    }
//
//    public function getCategory(){
//        return $this->category;
//    }

    public function __construct($question=null,$answers=null,$category=null)
    {
        $this->questions =$question;
        $this->answers = $answers;
        $this->category = $category;
    }
}