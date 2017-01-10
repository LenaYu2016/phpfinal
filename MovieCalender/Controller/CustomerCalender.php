<?php
/**
 * Created by PhpStorm.
 * User: ran
 * Date: 3/22/2016
 * Time: 1:14 AM
 */

namespace Project\MovieCalender\Controller;





use Project\MovieCalender\libs\Session;
use Project\MovieCalender\libs\Validation;
use Project\MovieCalender\Model\CalenderModel;

class CustomerCalender
{
    public function __construct()
    {
        echo "This is CustomerCalender constructor";
    }


    /**
     * Validation name phone and email
     *
     */
    public function index(){
        //echo "This is index";
        $error="";
        $name =filter_input(INPUT_POST,"name");
        $phone =filter_input(INPUT_POST,"phone");
        $email =filter_input(INPUT_POST,"email");



//        var_dump($name);
//        var_dump($phone);
//        var_dump($email);

        $validation = new Validation();
        if($validation->isEmpty($name) || $validation->isEmpty($phone) || $validation->isEmpty($email)){
            $error ="all the fields should not be empty";
            require_once "./View/MovieCalender.php";
        }else if($validation->phoneNumber($phone)!=""){
                $error= $validation->phoneNumber($phone);
                require_once "./View/MovieCalender.php";
        }else if($validation->EmailValidator($email)!=""){
            $error =$validation->EmailValidator($email);
            require_once "./View/MovieCalender.php";
        }else{
            $calenderInfo = new CalenderModel();
            $sql ="SELECT running_films.Film_Id, Film_Name, `LANGUAGE`, DATE_FORMAT(Run_Time, '%d-%M-%Y') AS Run_Date,Date_FORMAT(Run_Time,'%h:%i %p') AS Run_Time  FROM `films` JOIN running_films ON films.Film_Id = running_films.Film_Id";
            $calender = $calenderInfo->getCalenderDetail($sql);
            //var_dump($calender);
            $calenderEmail = new Session('calenderEmail');
            $calenderEmail->data = $email;
            require_once "./View/CustomerCalender.php";
        }

    }

    /**
     * show only english movie
     *
     */
    public function showEnglishMovies(){
        $calenderInfo = new CalenderModel();
        $sql ="SELECT running_films.Film_Id, Film_Name, `LANGUAGE`, DATE_FORMAT(Run_Time, '%d-%M-%Y') AS Run_Date,Date_FORMAT(Run_Time,'%h:%i %p')  AS Run_Time FROM `films`
                                                                                                      JOIN running_films
                                                                                                      ON films.Film_Id = running_films.Film_Id
                                                                                                      WHERE `LANGUAGE` = 'ENGLISH'";
        $calender = $calenderInfo->getCalenderDetail($sql);
        echo json_encode($calender);
    }

    /**
     * show only chinese movie
     *
     */
    public function showChineseMovies()
    {
        $calenderInfo = new CalenderModel();
        $sql = "SELECT running_films.Film_Id, Film_Name, `LANGUAGE`, DATE_FORMAT(Run_Time, '%d-%M-%Y') AS Run_Date,Date_FORMAT(Run_Time,'%h:%i %p')  AS Run_Time FROM `films`
                                                                                                      JOIN running_films
                                                                                                      ON films.Film_Id = running_films.Film_Id
                                                                                                      WHERE `LANGUAGE` = 'CHINESE'";
        $calender = $calenderInfo->getCalenderDetail($sql);
        echo json_encode($calender);
    }

    /**
     * show all the movies
     *
     */

    public function showAllMovies(){
        $calenderInfo = new CalenderModel();
        $sql = "SELECT running_films.Film_Id, Film_Name, `LANGUAGE`, DATE_FORMAT(Run_Time, '%d-%M-%Y') AS Run_Date,Date_FORMAT(Run_Time,'%h:%i %p')  AS Run_Time FROM `films`
                                                                                                      JOIN running_films
                                                                                                      ON films.Film_Id = running_films.Film_Id";
        $calender = $calenderInfo->getCalenderDetail($sql);
        echo json_encode($calender);
    }

    /**
     *
     * redirect to SendCalender page
     */

    public function gotoSendCalender(){
        echo "This is gotoSendCalender in CustomerCalender";
    }
}