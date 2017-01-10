<?php
/**
 * Created by PhpStorm.
 * User: ran
 * Date: 3/17/2016
 * Time: 12:56 AM
 */

class DetailController{
    public function __construct(){
        //echo "This is DetailController";

    }

    /**
     *
     * init Detail page
     */
    public function index(){
        $editItemSession = new Session('editItem');
        $editItemSession->emptySession();
       if( !\Project\Auth\models\AuthModel::getUser()){
          // echo "you should log in first";
           if(isset($_POST["filmId"])){
               $filmId = $_POST["filmId"];

               header("Location: ./index.php?route=HomePageController/postToBooking/$filmId&click=click");
           }else{
               header("Location: ./index.php");
           }

       }else{
           //var_dump(\Project\Auth\models\AuthModel::getUser());
           $filmBooking = new FilmBookingModel();
           $cart = new ShoppingCart();

           if(!empty($_POST["OrderInfo"]) && !empty($_POST["filmId"])){
              // if(isset($_POST["OrderInfo"])&& isset($_POST["seatsNums"]) &&isset($_POST["filmId"])){

               $bookingInfo = explode("| ",$_POST["OrderInfo"]);
               $seats =explode(" ",$_POST["seatsNums"]);

                $price = $_POST["totalPrice"];
                $tax = 0.13;
                $totalPrice = (1+$tax)*$price;
               $bookInfo = new stdClass();
               $bookInfo->Run_Time= $bookingInfo[0];
               $bookInfo->Film_Name =$bookingInfo[1];
               $bookInfo->Cinema =$bookingInfo[2];
               $bookInfo->Room = $bookingInfo[3];
               $bookInfo->Cinema_Address = $bookingInfo[4];
               $bookInfo->Room_ID = $bookingInfo[5];
               $bookInfo->Seats = $_POST["seatsNums"];
               $bookInfo->TotalPrice = $totalPrice;
               $bookInfo->Price = $price;
               $bookInfo->Tax =$tax;
               $bookInfo->FilmId = $_POST["filmId"];
               $bookInfo->Cinema_ID = $_POST["Cinema"];
               $bookInfo->showDate = $bookingInfo[6];
               $bookInfo->showTime = $bookingInfo[7];
               $itemId = trim($_POST["itemId"]);


               //$cart->showCart();


               if(!empty($_POST["seatsNums"])) {
                   //check database first
                   foreach ($seats as $seat) {
                       $sql = "SELECT Seat_Name, available
                           From seats WHERE Room_ID=:Room_ID AND Run_Time=:Run_Time AND Seat_Name=:Seat_Name";
                       $param = ["Room_ID" => $bookInfo->Room_ID, "Run_Time" => $bookInfo->Run_Time, "Seat_Name" => $seat];
                       $seatInfo = $filmBooking->getBookingDetail($param, $sql);

                       // var_dump($seatInfo);
                       if (is_array($seatInfo)) {
                           if ($seatInfo[0]->available == 'N') {
                               // require_once"./View/Error404.php";
                               self::seatsOccupied($bookInfo,$itemId);
                               exit();
                           };
                       }
                   }
               }else{
                    self::seatsEmpty($bookInfo,$itemId);
                    exit();
               }


               if($itemId!=""){
                   //echo"Item id not null";
                   $cart-> updateCartByItemId($itemId,$bookInfo);
               }else {
                   $cart->addToCart($bookInfo);
               }

               /*
                * Calculate Total Price
                *
                */

                $grandPrice=0;
               foreach ($cart->shoppingCart->data as $item){
                   $grandPrice+=$item->TotalPrice;
               }
               $totalPrice =new Session('grandPrice');
               $totalPrice->emptySession();
               $totalPrice->data[] =$grandPrice;

                //var_dump($bookInfo);
               //$cart->showCart();
               foreach($seats as $seat) {

                   $sql = "UPDATE seats
                       SET available='N'
                       WHERE Room_ID=:Room_ID AND Run_Time=:Run_Time AND Seat_Name=:Seat_Name";
                   $param = ["Room_ID" => $bookInfo->Room_ID, "Run_Time" => $bookInfo->Run_Time, "Seat_Name"=>$seat];
                   $filmBooking->updateSeats($param, $sql);
                   require_once"./View/Comfirm.php";
               }



           }



       }
    }

    /**
     * when customer click delete button delete order and update database
     *
     * @param $item_id
     */
    public function deleteItems($item_id){
        //echo $item_id;
        $grandPrice=0;
        $cart = new ShoppingCart();
        $filmBooking = new FilmBookingModel();
        $item=$cart->getItemById($item_id);
        $seats =  explode(" ",$item->Seats);
        foreach($seats as $seat) {
            $sql = "UPDATE seats
                       SET available='Y'
                       WHERE Room_ID=:Room_ID AND Run_Time=:Run_Time AND Seat_Name=:Seat_Name";
            $param = ["Room_ID" => $item->Room_ID, "Run_Time" => $item->Run_Time, "Seat_Name"=>$seat];
            $filmBooking->updateSeats($param, $sql);
        }
        $cart->deleteItem($item_id);
        ///////////////////////////////////

        foreach ($cart->shoppingCart->data as $item){
            $grandPrice+=$item->TotalPrice;
        }
        $totalPrice =new Session('grandPrice');
        $totalPrice->emptySession();
        $totalPrice->data[] =$grandPrice;
       echo json_encode($cart->shoppingCart->data);
    }

    public function editItems($item_id=null){
        $editItemSession = new Session('editItem');
        $editItemSession->data[] = $item_id;
        //var_dump($_SESSION);
        $cart = new ShoppingCart();
        $filmBooking = new FilmBookingModel();
        //$cart->showCart();
        if($cart->getItemById($item_id)!=false) {
            $item = $cart->getItemById($item_id);
        }else{

            header("Location: ./index.php");
        }

        $seats =  explode(" ",$item->Seats);
        foreach($seats as $seat) {
            $sql = "UPDATE seats
                       SET available='Y'
                       WHERE Room_ID=:Room_ID AND Run_Time=:Run_Time AND Seat_Name=:Seat_Name";
            $param = ["Room_ID" => $item->Room_ID, "Run_Time" => $item->Run_Time, "Seat_Name"=>$seat];
            $filmBooking->updateSeats($param, $sql);
        }



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
        $TimeInfos = $filmBooking->getBookingDetail($para=["Film_Id"=>$item->FilmId, "Cinema_ID"=>$item->Cinema_ID,"Room_Id"=>$item->Room_ID,"Run_Time"=>$item->showDate],$sql);
        $seatsLoadArray = self::checkSeats($TimeInfos);
        $sql = "SELECT Seat_Name, available
                From seats WHERE Room_ID=:Room_ID AND Run_Time=:Run_Time";

        $SeatsInfos = $filmBooking->getBookingDetail($para=["Room_ID"=>$item->Room_ID, "Run_Time"=>$item->Run_Time],$sql);

        $filmInfo = $filmBooking->getFilmById($item->FilmId);
        $SeatsInfos= json_encode($SeatsInfos);

        require_once "./View/Booking.php";
    }

    /**
     *
     * check if the seats customer choice is already been occupied
     * @param $item
     * @param $item_Id
     */
    static function seatsOccupied($item,$item_Id){
        $ErrorMessage = "<b style='color:red'>Some Seats have already been ordered !!!</b>";
        $filmBooking = new FilmBookingModel();
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
        $TimeInfos = $filmBooking->getBookingDetail($para=["Film_Id"=>$item->FilmId, "Cinema_ID"=>$item->Cinema_ID,"Room_Id"=>$item->Room_ID],$sql);

        $sql = "SELECT Seat_Name, available
                From seats WHERE Room_ID=:Room_ID AND Run_Time=:Run_Time";

        $SeatsInfos = $filmBooking->getBookingDetail($para=["Room_ID"=>$item->Room_ID, "Run_Time"=>$item->Run_Time],$sql);
        $filmInfo = $filmBooking->getFilmById($item->FilmId);
        $SeatsInfos= json_encode($SeatsInfos);
        require_once "./View/Booking.php";
    }

    /**
     * check if customer choose seats or not before they click check out button
     * @param $item
     * @param $item_id
     */

    static function seatsEmpty($item,$item_id){
        $ErrorMessage = "<b style='color:red'>At least one sit should be selected</b>";
        $filmBooking = new FilmBookingModel();
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
        $TimeInfos = $filmBooking->getBookingDetail($para=["Film_Id"=>$item->FilmId, "Cinema_ID"=>$item->Cinema_ID,"Room_Id"=>$item->Room_ID],$sql);

        $sql = "SELECT Seat_Name, available
                From seats WHERE Room_ID=:Room_ID AND Run_Time=:Run_Time";

        $SeatsInfos = $filmBooking->getBookingDetail($para=["Room_ID"=>$item->Room_ID, "Run_Time"=>$item->Run_Time],$sql);
        $filmInfo = $filmBooking->getFilmById($item->FilmId);
        $SeatsInfos= json_encode($SeatsInfos);
        require_once "./View/Booking.php";
    }

    /***
     *
     * if customer does not pay the fee after 6 mins the shopping cart session will be clean.
     *
     */
    public function sessionExpired(){
        //echo"Hello World";
        $filmBooking = new FilmBookingModel();
        $cart = new ShoppingCart();
        $totalPrice =new Session('grandPrice');
        foreach ($cart->shoppingCart->data as $item) {
            $seats = explode(" ", $item->Seats);
            foreach ($seats as $seat) {
                $sql = "UPDATE seats
                       SET available='Y'
                       WHERE Room_ID=:Room_ID AND Run_Time=:Run_Time AND Seat_Name=:Seat_Name";
                $param = ["Room_ID" => $item->Room_ID, "Run_Time" => $item->Run_Time, "Seat_Name" => $seat];
                $filmBooking->updateSeats($param, $sql);
            }
        }
        $cart->emptyCart();
        $totalPrice->emptySession();
        header("Location: ./index.php");
    }

    /**
     * pay the fee and save records in to database
     *
     */
    public function gotoPayment(){
       // echo "goto payment";
        $totalPrice=0;
        $orderTime=date("Y-m-d H:i:s");
        $userid =$_SESSION['user']['id'];
        //var_dump($_SESSION);
        $cart=new ShoppingCart();
        $items=$cart->shoppingCart->data;
        foreach($items as $item){
            $totalPrice = $item->TotalPrice+$totalPrice;
        }

        $order = new OrderModel();
        $sql ="INSERT INTO `orders` VALUES (NULL, :OrderDate, :UserId, :TotalPrice)";
        $param=["OrderDate"=>$orderTime,
                "UserId"=>$userid,
                "TotalPrice"=>$totalPrice
                ];
        $order->modifyOrder($param,$sql);

        $sql="SELECT order_id FROM orders
              WHERE Order_DATE=:Order_DATE AND Customer_Id=:Customer_Id
                                           AND Total_Price=:Total_Price";
        $param=["Order_DATE"=>$orderTime,
            "Customer_Id"=>$userid,
            "Total_Price"=>$totalPrice
        ];
        $orderId = $order->getOrderDetail($param,$sql);
        //var_dump($orderId);
        foreach($items as $item){
            $item->Film_Name=trim($item->Film_Name);
            self::createReservations($orderId[0]->order_id,$item);
        }

        $cart->emptyCart();

    }

    /**
     *
     * Create reservation records
     * @param $orderId
     * @param $item
     *
     */
   static function createReservations($orderId,$item){
       $order = new OrderModel();

       $sql ="INSERT INTO `reservations` VALUES (NULL, :Running_films, :Cinema_Name, :Cinema_Address
                                          ,:Run_Time,:Room_Name,:Room_id,:Seats_Numbers,:Order_Id,:Price)";
       $param=["Running_films"=>$item->Film_Name,
                "Cinema_Name"=>$item->Cinema,
                "Cinema_Address"=>$item->Cinema_Address,
                "Run_Time"=>$item->Run_Time,
                "Room_Name"=>$item->Room,
                "Room_id"=>$item->Room_ID,
                "Seats_Numbers"=>$item->Seats,
                "Order_Id"=>$orderId,
                "Price"=>$item->TotalPrice];
       $order->modifyOrder($param,$sql);
   }

    /**
     *
     * check how many seats left;
     * @param $TimeInfos
     * @return array
     *
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

