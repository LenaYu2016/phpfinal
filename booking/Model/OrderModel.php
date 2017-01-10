<?php
/**
 * Created by PhpStorm.
 * User: ran
 * Date: 3/10/2016
 * Time: 1:44 AM
 * Database operation for order
 */
class OrderModel
{
    private $db;
    public function __construct()
    {
        $this->db = new PDOOperation(DATA_SOURCE_NAME, DB_USERNAME, DB_PASSWORD);
    }

    /**
     *
     * get order detail by id
     * @param $id
     * @return array
     */

    public function getOrderDetailId($id)
    {

        $result = $this->db->query("SELECT * FROM Orders JOIN users
                                                    ON users.id = orders.Customer_Id
                                                    JOIN reservations
                                                    ON reservations.Order_Id = orders.Order_Id
                              WHERE Orders.Order_Id= :Order_Id;", $para = ["Order_Id" => $id]);

        $OrderInfo = [];
        foreach ($result->rows as $row) {
            if (is_array($row)) {
                $film = new stdClass();
                foreach ($row as $key => $value) {
                    $film->$key = $value;
                }


                $OrderInfo[] = $film;
            }


            return $OrderInfo;

        }
    }

        /*
         * get specific booking informations
         *
         *
         */

        function getOrderDetail($para, $query)
        {
           // $db = new PDOOperation(DATA_SOURCE_NAME, DB_USERNAME, DB_PASSWORD);

            $result = $this->db->query($query, $para);
            //var_dump($result);


            $Order = [];
            foreach ($result->rows as $row) {
                if (is_array($row)) {
                    $film = new stdClass();
                    foreach ($row as $key => $value) {
                        $film->$key = $value;
                    }


                    $Order[] = $film;
                }

            }


            return $Order;
        }


    /**
     *
     * change order
     * @param $para
     * @param $query
     */
        function modifyOrder($para, $query)
        {
           // $db = new PDOOperation(DATA_SOURCE_NAME, DB_USERNAME, DB_PASSWORD);

            $result = $this->db->execute($query, $para);
        }

}