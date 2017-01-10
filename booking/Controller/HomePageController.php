<?php
/**
 * Created by PhpStorm.
 * User: ran
 * Date: 3/8/2016
 * Time: 9:45 AM
 */


class HomePageController {
    public function __construct(){
      //  echo "This is Home Controller <br/>";
    }
    //HTTP GET
    public function index(){
//        echo "This is Home Controller Index";
//        echo":value ";


        $editItem =new Session('editItem');

        //var_dump($_SESSION);
        if(!empty($editItem->data)){
         $itemId = $editItem->data[0];
         $shoppingCart = new ShoppingCart();
            $shoppingCart->deleteItem($itemId);
            $editItem->emptySession();
           // echo "edit item has been delete";
        }

        $getfilmInfo = new TopRateModel();
        $filmInfo = $getfilmInfo->getFilmInfo();
        $filmRate = $getfilmInfo->topRate();

        //var_dump($filmInfo);
        require_once "./View/HomePage1.php";
    }

    /**
     * choose Cinema by film id
     * @param $filmId
     */
    public function chooseCinema($filmId){
            //echo "This is Homepage chooseCinema";
        $getFilmInfo = new FilmBookingModel();
        $sql="SELECT DISTINCT(cinemas.Cinema_ID),cinemas.Cinema_Name
                              FROM films JOIN running_films
                                          ON films.Film_Id = running_films.Film_Id
                                         JOIN rooms
                                         ON running_films.Room_ID = rooms.Room_ID
                                         JOIN cinemas
                                         ON cinemas.Cinema_ID = rooms.Cinema_ID
                                         WHERE running_films.Film_Id=:Film_Id;";

        $CinemaInfos = $getFilmInfo->getBookingInfo($filmId,$sql);
        echo json_encode($CinemaInfos);
    }

    /**
     * choose Room by film id and cinema id
     * @param $filmId
     * @param $cinemaId
     */
    public function chooseRoom($filmId,$cinemaId){
        $getFilmInfo = new FilmBookingModel();

        $sql = "SELECT DISTINCT(rooms.Room_Name), rooms.Room_ID
                              FROM films JOIN running_films
                                          ON films.Film_Id = running_films.Film_Id
                                         JOIN rooms
                                         ON running_films.Room_ID = rooms.Room_ID
                                         JOIN cinemas
                                         ON cinemas.Cinema_ID = rooms.Cinema_ID
                                         WHERE running_films.Film_Id=:Film_Id AND cinemas.Cinema_ID=:Cinema_ID
                                         ORDER BY rooms.Room_Name";
        $RoomInfos = $getFilmInfo->getBookingDetail($para=["Film_Id"=>$filmId, "Cinema_ID"=>$cinemaId],$sql);
        echo json_encode($RoomInfos);

    }

    /** choose Show Date by film id $cinema id and room id
     * @param $filmId
     * @param $cinemaId
     * @param $roomId
     */
    public function chooseDate($filmId, $cinemaId, $roomId){
        $getFilmInfo = new FilmBookingModel();

        $sql = "SELECT DISTINCT(rooms.Room_Name), rooms.Room_ID,DATE_FORMAT(Run_Time, '%Y-%m-%d') AS 'RunDate'
                              FROM films JOIN running_films
                                          ON films.Film_Id = running_films.Film_Id
                                         JOIN rooms
                                         ON running_films.Room_ID = rooms.Room_ID
                                         JOIN cinemas
                                         ON cinemas.Cinema_ID = rooms.Cinema_ID
                                         WHERE running_films.Film_Id=:Film_Id AND cinemas.Cinema_ID=:Cinema_ID
                                          AND rooms.Room_ID=:Room_Id
                                         ORDER BY DATE_FORMAT(Run_Time, '%Y-%m-%d')";
        $RoomInfos = $getFilmInfo->getBookingDetail($para=["Film_Id"=>$filmId, "Cinema_ID"=>$cinemaId,"Room_Id"=>$roomId],$sql);
        // var_dump($RoomInfos);
        echo json_encode($RoomInfos);
    }

    /** choose Show Time by film id $cinema id and room id
     * @param $filmId
     * @param $cinemaId
     * @param $roomId
     */
    public function chooseTime($filmId, $cinemaId, $roomId){

        $getFilmInfo = new FilmBookingModel();

        $sql = "SELECT DISTINCT(rooms.Room_Name), rooms.Room_ID,DATE_FORMAT(Run_Time, '%H:%i') AS 'RunTime'
                              FROM films JOIN running_films
                                          ON films.Film_Id = running_films.Film_Id
                                         JOIN rooms
                                         ON running_films.Room_ID = rooms.Room_ID
                                         JOIN cinemas
                                         ON cinemas.Cinema_ID = rooms.Cinema_ID
                                         WHERE running_films.Film_Id=:Film_Id AND cinemas.Cinema_ID=:Cinema_ID
                                          AND rooms.Room_ID=:Room_Id
                                         ORDER BY DATE_FORMAT(Run_Time, '%H:%i')";
        $RoomInfos = $getFilmInfo->getBookingDetail($para=["Film_Id"=>$filmId, "Cinema_ID"=>$cinemaId,"Room_Id"=>$roomId],$sql);
        echo json_encode($RoomInfos);
    }

    //HTTP POST
    /**
     * click submit button
     * after choosing film redirect to Booking page
     * @param $filmId
     */
    public function postToBooking($filmId){

        //get film
        if(empty($filmId)){
            header("Location: ./index.php");
        }

        $getFilmInfo = new FilmBookingModel();
        $sql = "SELECT *
                      FROM films JOIN running_films
                                          ON films.Film_Id=running_films.Film_Id
                                          WHERE films.Film_Id=:Film_Id";
        $param = ['Film_Id'=>$filmId];
        $film=$getFilmInfo->getBookingDetail($param,$sql);
        if(empty($film)){
            header("Location: ./index.php");
        }
        $changeRate = new TopRateModel();

        $filmInfo = $getFilmInfo->getFilmById($filmId);

        $changeRate->clickNumber($filmInfo[0]->film_description);
        $sql="SELECT DISTINCT(cinemas.Cinema_ID),cinemas.Cinema_Name
                              FROM films JOIN running_films
                                          ON films.Film_Id = running_films.Film_Id
                                         JOIN rooms
                                         ON running_films.Room_ID = rooms.Room_ID
                                         JOIN cinemas
                                         ON cinemas.Cinema_ID = rooms.Cinema_ID
                                         WHERE running_films.Film_Id=:Film_Id;";

        $CinemaInfos = $getFilmInfo->getBookingInfo($filmId,$sql);

       // var_dump($filmInfo);

        require_once "./View/Booking.php";

    }

    /**
     *
     * after fill out the booking form redirect to booking page
     */
    public function toBookingPage(){
        //echo "this is toBookingPage";
        $validation =new Validation();
        //var_dump($_POST);
        $error=$validation->emptyValidation($_POST);
        if($error===true) {
            $filmInfo = explode('| ', $_POST['filmInfo']);
            //var_dump($filmInfo);

            $item = new stdClass();
            $item->Film_Name = $filmInfo[0];
            $item->FilmId = $_POST['movie'];
            $item->Cinema_ID = $_POST['Cinema'];
            $item->Cinema = $filmInfo[1];
            $item->Room_ID = $_POST['Room'];
            $item->Room = $filmInfo[2];
            $item->showDate = $filmInfo[3];
            $item->showTime = $filmInfo[4];
            $item->Run_Time = $filmInfo[5];
            //$item->Room_ID = $_POST['']
            // var_dump($item);
            $filmBooking = new FilmBookingModel();
            $sql = "SELECT DISTINCT(rooms.Room_Name), rooms.Room_ID,DATE_FORMAT(Run_Time, '%H:%i') AS 'RunTime', Run_Time
                              FROM films JOIN running_films
                                          ON films.Film_Id = running_films.Film_Id
                                         JOIN rooms
                                         ON running_films.Room_ID = rooms.Room_ID
                                         JOIN cinemas
                                         ON cinemas.Cinema_ID = rooms.Cinema_ID
                                         WHERE running_films.Film_Id=:Film_Id AND cinemas.Cinema_ID=:Cinema_ID
                                          AND rooms.Room_ID=:Room_Id
                                         ORDER BY DATE_FORMAT(Run_Time, '%H:%i')";
            $TimeInfos = $filmBooking->getBookingDetail($para = ["Film_Id" => $item->FilmId, "Cinema_ID" => $item->Cinema_ID, "Room_Id" => $item->Room_ID], $sql);

            $seatsLoadArray = self::checkSeats($TimeInfos);

            $sql = "SELECT Seat_Name, available
                From seats WHERE Room_ID=:Room_ID AND Run_Time=:Run_Time";

            $SeatsInfos = $filmBooking->getBookingDetail($para = ["Room_ID" => $item->Room_ID, "Run_Time" => $item->Run_Time], $sql);

            $filmInfo = $filmBooking->getFilmById($item->FilmId);
            $SeatsInfos = json_encode($SeatsInfos);
            //var_dump($TimeInfos);
            require_once "./View/Booking.php";
        }else{
            //echo "In else";
            header("Location: ./index.php?route=HomePageController/index&error=$error");
        }
    }

    /**
     * check Seats is avaliable or not
     * @param $TimeInfos
     * @return array
     */
   static function checkSeats($TimeInfos){
       $filmBooking = new FilmBookingModel();
       $seatsLoadArray = [];
       foreach($TimeInfos as $timeInfo) {
           $sql = "SELECT Seat_Name, available
                From seats WHERE Room_ID=:Room_ID AND Run_Time=:Run_Time";
            $i=0;
           $SeatsInfos = $filmBooking->getBookingDetail($para = ["Room_ID" => $timeInfo->Room_ID, "Run_Time" => $timeInfo->Run_Time], $sql);
           foreach($SeatsInfos as $seat){
               if($seat->available=='Y'){
                   $i++;
               }
           }
           if($i==0){
               $seatsLoadArray[$timeInfo->RunTime]="sold-out";
           }
           if($i>0 && $i<3){
               $seatsLoadArray[$timeInfo->RunTime]="filling";
           }
           if($i>=3){
               $seatsLoadArray[$timeInfo->RunTime]="available";
           }

       }

       return $seatsLoadArray;
   }



}