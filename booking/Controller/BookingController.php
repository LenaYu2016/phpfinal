<?php
/**
 * Created by PhpStorm.
 * User: ran
 * Date: 3/11/2016
 * Time: 10:51 PM
 */

class BookingController{
    public function __construct(){
        //echo "This is Booking Controller <br/>";
    }

    /**
     *  init booking page
     */
    public function index(){
        //echo "this is index method in booking controller";
        $getFilmInfo = new FilmBookingModel();
        if(isset($_POST['filmId'])) {
            //
            $filmId = $_POST['filmId'];
            $sql = "SELECT DISTINCT(rooms.Room_Name)
                              FROM films JOIN running_films
                                          ON films.Film_Id = running_films.Film_Id
                                         JOIN rooms
                                         ON running_films.Room_ID = rooms.Room_ID
                                         JOIN cinemas
                                         ON cinemas.Cinema_ID = rooms.Cinema_ID
                                         WHERE running_films.Film_Id=:Film_Id;";
            $RoomInfos = $getFilmInfo->getBookingInfo($filmId, $sql);
            require_once "./View/Booking.php";
        }
        else{
            require_once "./View/Error404.php";
        }
    }

    /**
     * choice room by film id and cinema id
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

    /**
     * choose show Date by film cinema and room ids
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


    /**
     * choose show Time by film cinema and room ids
     * @param $filmId
     * @param $cinemaId
     * @param $roomId
     */
    public function chooseTime($filmId, $cinemaId, $roomId, $runtime){

        $getFilmInfo = new FilmBookingModel();

        $sql = "SELECT DISTINCT(rooms.Room_Name), rooms.Room_ID,DATE_FORMAT(Run_Time, '%H:%i') AS 'RunTime',Run_Time
                              FROM films JOIN running_films
                                          ON films.Film_Id = running_films.Film_Id
                                         JOIN rooms
                                         ON running_films.Room_ID = rooms.Room_ID
                                         JOIN cinemas
                                         ON cinemas.Cinema_ID = rooms.Cinema_ID
                                         WHERE running_films.Film_Id=:Film_Id AND cinemas.Cinema_ID=:Cinema_ID
                                          AND rooms.Room_ID=:Room_Id AND DATE_FORMAT(Run_Time, '%Y-%m-%d') =:Run_Time
                                         ORDER BY DATE_FORMAT(Run_Time, '%H:%i')";
        $RoomInfos = $getFilmInfo->getBookingDetail($para=["Film_Id"=>$filmId, "Cinema_ID"=>$cinemaId,"Room_Id"=>$roomId,"Run_Time"=>$runtime],$sql);

        //add loading rate
        $BookInfo=[];
        foreach ($RoomInfos as $runTime){

            $value = self::seatsLoadingRate($runTime->Room_ID,$runTime->Run_Time);
            $runTime->seatsRate =$value;
            $BookInfo[] = $runTime;
        }
        echo json_encode($BookInfo);
        //echo json_encode($RoomInfos);
    }

    /**
     *
     * choice Seats
     * @param $roomId
     * @param $showTime
     * @param $cinemaId
     */
    public function chooseSeats($roomId, $showTime, $cinemaId){
        //echo "Room ID:$roomId AND Show Time:$showTime";

        $getFilmInfo = new FilmBookingModel();

        $sql = "SELECT Seat_Name, available
                From seats WHERE Room_ID=:Room_ID AND Run_Time=:Run_Time";

        $SeatsInfos = $getFilmInfo->getBookingDetail($para=["Room_ID"=>$roomId, "Run_Time"=>$showTime],$sql);

        $sql = "SELECT Cinema_Address
                From cinemas WHERE Cinema_ID=:Cinema_ID";
        $cinemaAddress = $getFilmInfo->getBookingDetail($para=["Cinema_ID"=>$cinemaId],$sql);
        $SeatsInfos[]=$cinemaAddress;
        echo json_encode($SeatsInfos);
    }

    /**
     *
     * check how many seats left
     * @param $roomId
     * @param $showTime
     * @return string
     *
     */
    static function seatsLoadingRate($roomId, $showTime){
        //var_dump($roomId);
       //var_dump($showTime);
        $seatsOccupied=0;
        $getFilmInfo = new FilmBookingModel();

        $sql = "SELECT Seat_Name, available
                From seats WHERE Room_ID=:Room_ID AND Run_Time=:Run_Time";

        $RoomInfos = $getFilmInfo->getBookingDetail($para=["Room_ID"=>$roomId, "Run_Time"=>$showTime],$sql);
        //var_dump($RoomInfos);
        foreach($RoomInfos as $seat){

            if($seat->available=="N"){
                $seatsOccupied++;

            }
        }
       // echo $seatsOccupied;
        if($seatsOccupied >6 && $seatsOccupied!=10){
            return "filling";
        }
        if($seatsOccupied==10){
            return "sold-out";
        } else{
            return "available";
        }

    }


}