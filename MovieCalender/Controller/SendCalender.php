<?php
/**
 * Created by PhpStorm.
 * User: ran
 * Date: 4/12/2016
 * Time: 12:32 PM
 */

namespace Project\MovieCalender\Controller;


use Project\MovieCalender\libs\Email;
use Project\MovieCalender\libs\Session;

class SendCalender
{
    public function __construct(){

    }

    /**
     * Save Movie Calendar in a array
     *
     */

    public function index(){

        $movieCalender = $_POST;
        array_shift($movieCalender);
        $movieArray=[];
        foreach($movieCalender as $key=>$value){

            $movie = explode('/',$key);
            $movieObj = new \stdClass();
            $movieObj->FILM_NAME =$movie[0];
            $movieObj->FILM_DATE =$movie[1];
            $movieObj->FILM_RUNTIME =$movie[2];
            $movieObj->FILM_ID =$movie[3];
            $movieArray[]=$movieObj;

        }

        //var_dump($movieArray);
        $movieCalenderSession = new Session('Calender');
        $movieCalenderSession->data = $movieArray;
        //var_dump($movieCalenderSession->data);

        require_once "./View/SendCalender.php";
    }

    /**
     * Create Movie Calendar and send email
     *
     */
    public function BuildMessageAndSend(){
        $movieCalenderSession = new Session('Calender');
        $email =new Session('calenderEmail');
        //var_dump($_SESSION);
        $message = "<table border=\"1\" style=\"width:100%\"><tr>
                                    <td>Film Name</td>
                                    <td>Film Date</td>
                                    <td>Film Time</td>
                                </tr>";
        foreach ($movieCalenderSession->data as $movie){
            $message .=" <tr>
                         <td>".$movie->FILM_NAME."</td>
                        <td>".$movie->FILM_DATE."</td>
                        <td>".$movie->FILM_RUNTIME."</td>
                        </tr>";

        }
        $message .="</table>";
        $emailToSend = $email->data;
        $sendEmail = new Email();
        $sendEmail->sendEmail($emailToSend,"movieCalender",$message );
        header("Location:../index.php");
    }

}