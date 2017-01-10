<?php
/**
 * Created by PhpStorm.
 * User: ran
 * Date: 4/9/2016
 * Time: 12:58 PM
 */

namespace Project\FAQ\Controller;


use Project\FAQ\libs\Email;
use Project\FAQ\libs\Validation;
use Project\FAQ\Models\FAQModel;
use Project\FAQ\Models\TermModel;

class FAQ
{
    public function __construct(){

    }

    /**
     * init Faq page
     *
     */
    static function index($error=""){
        //echo "this is FAQ index";
        $getFAQ = new FAQModel();
        $results = $getFAQ->getAllQuestions();
        //var_dump($results);
        $query = "SELECT DISTINCT(`category`) FROM `faq`";
        $categorys = $getFAQ->getAll($query);

        $termsobj =new TermModel();
       $terms =$termsobj->getAllTerms();
        //var_dump($terms);
        require_once './Views/FAQ.php';
    }

    public function selectQuestionByCategory($category){
        $getFAQ = new FAQModel();
        if($category==="allQuestion"){
            $results = $getFAQ->getAllQuestions();
        }else {
            $query = "SELECT *FROM faq WHERE  category=:category";
            $param = ['category' => $category];
            $results = $getFAQ->getAll($query, $param);

        }
        echo json_encode($results);
        //var_dump($results);

    }

    /**
     *
     * sort question
     * @param $sort
     * @param $category
     *
     */
    public function sortingQuetions($sort,$category){
        $getFAQ = new FAQModel();
        if($sort==="" && $category!=="allQuestion"){
            $query = "SELECT *FROM faq WHERE category=:category";
            $param = ['category' => $category];
            $results = $getFAQ->getAll($query,$param);
        }else if($sort==="id" && $category!=="allQuestion"){
            $query = "SELECT *FROM faq WHERE category=:category ORDER BY question_id";
            $param = ['category' => $category];
            $results = $getFAQ->getAll($query,$param);
        }else if($sort==="frequency" && $category!=="allQuestion"){
            $query = "SELECT *FROM faq WHERE category=:category ORDER BY question_id";
            $param = ['category' => $category];
            $results = $getFAQ->getAll($query,$param);
            $results =self::SortByFrequency($results);
        }else{
            if($sort===""){
                $results=$getFAQ->getAllQuestions();
            }else if($sort==="id"){
                $query = "SELECT *FROM faq ORDER BY question_id";

                $results = $getFAQ->getAll($query);
            }else if($sort==="frequency"){
                $query = "SELECT *FROM faq ORDER BY question_id";
                $results = $getFAQ->getAll($query);
                $results =self::SortByFrequency($results);

            }
        }
        echo json_encode($results);
        //var_dump($results);
    }
    /**
     *
     * increase click rate
     *
     *
     */
    public function increaseClickNumber($id){
        $getFAQ = new FAQModel();
        $getFAQ->increaseClickNumber($id);
    }


    /**
     *
     * search question
     * @param $str
     * @param $orderBy
     * @param $category
     *
     */
    public function searchQuestion($str, $orderBy, $category){
        $search =new FAQModel();

       $result=$search->searchQuestion($category,$str);
        //var_dump($result);

        if($orderBy === "frequency" && $result!=false){
            $result = self::SortByFrequency($result);
        }
        echo json_encode($result);
    }

    static function SortByFrequency($results){

        usort($results, function($a, $b){
            if($a->frequency == $b->frequency){
                return 0;
            }
            return ($a->frequency >$b->frequency)?-1:1;
        });
        //var_dump($filmsInfo);
        return $results;
    }

    /**
     * Send Email
     *
     */
    public function SendEmail(){
          //echo "This is SendEmail";
        $email =filter_input(INPUT_POST,"email");
        $comments =filter_input(INPUT_POST,"comments");
        $Title =filter_input(INPUT_POST,"Title");
        $validation = new Validation();

        if($validation->isEmpty($Title) || $validation->isEmpty($comments) || $validation->isEmpty($email)){
            $error ="all the fields should not be empty";
            //require_once "./Views/FAQ.php";
            self::index($error);
        }else if($validation->EmailValidator($email)!=""){
            $error =$validation->EmailValidator($email);
            //require_once "./Views/FAQ.php";
            self::index($error);
        }else{

            $sendemail = new Email();
            $sendemail->sendEmail($email,$Title,$comments);
            $error = "email is sent to our team";
            self::index($error);
        }
    }


}