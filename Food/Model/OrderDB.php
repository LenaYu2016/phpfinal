<?php
require_once "Database.php";
class OrderDB
{  private $db;
    public function getItemByOrder($id){
      $this->db= Database::getDB();
      $query="select * from food_order_item a join food b on a.Food_id=b.Food_id where Order_id='$id'";
      $result= $this->db->query($query);
    $results=$result->fetchAll(PDO::FETCH_OBJ);
    return $results;
    }
    public function getAllOrders($userid){
        $this->db= Database::getDB();
        $query="select * from food_order where User_id='$userid'";
        $result= $this->db->query($query);
        $results=$result->fetchAll(PDO::FETCH_OBJ);
        return $results;
    }
    public function insertOrder($userid){
        $this->db= Database::getDB();
        $date=date("Y-m-d");

        $query="insert into food_order (User_id,Order_time,Total_price,Phone_number,State) values('$userid','$date',0.00,'',0)";
      $count=$this->db->exec($query);
        echo $count;
        $orderid=$this->db->lastInsertId();
        return $orderid;
    }
    public function insertOrderItem($orderid,$date,$time,$amount,$price,$food){
        $this->db= Database::getDB();
        echo $price;
        $query="insert into food_order_item (Food_id,Order_id,Quantity,Size,Date,Time,Cinema,Amount,Price)
values($food->Food_id,$orderid,$food->Quantity,$food->Size,'$date','$time',
'$food->Cinema_Name',$amount,$price)";
        $count=$this->db->exec($query);
        return $count;
}
    public function updateOrder($total,$state,$phone,$orderid){
        $this->db= Database::getDB();
        $query="update food_order set Total_price=$total,Phone_number='$phone',State='$state' where Order_id='$orderid'";
        $count=$this->db->exec($query);
        return $count;
    }
    public function getUnpaidOrder($userid){
        $this->db= Database::getDB();
        $query="select * from food_order where User_id='$userid'and State=0";
        $result= $this->db->query($query);
        $results=$result->fetchAll(PDO::FETCH_OBJ);
        return $results;
    }
   public function deleteById($id){
       $this->db= Database::getDB();
       $query="delete from food_order where Order_id=$id";
       $this->db->exec($query);
       $query1="delete from food_order_item where Order_id=$id";
     $this->db->exec($query1);

   }
    public function getUncomment($userid){
        $this->db= Database::getDB();
        $query="select * from food_order where User_id='$userid'and State=1";
        $result= $this->db->query($query);
        $results=$result->fetchAll(PDO::FETCH_OBJ);
        return $results;
    }
}