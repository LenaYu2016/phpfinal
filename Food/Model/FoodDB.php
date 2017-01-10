<?php

require_once "Database.php";


class FoodDB
{
    private static $db;
public static function getAll(){

  self::$db=Database::getDB();
  $query="select * from food";
    $results=self::$db->query($query);
  $result = $results->fetchAll(PDO::FETCH_ASSOC);

  /*  $all=array();
    foreach($results as $item){
        $food=new Food($item["Food_Catagory"],$item["Food_Price"],$item["Food_Instock"],
            $item["Food_description"],$item["Food_mark"],$item["Food_Name"],$item["Food_Image"],
            $item["Discount_price"],$item["Viewed_times"],$item["Sales_volume"]);
        $food->setId($item["Food_id"]);
        $all[]=$food;
    }*/


    return json_encode($result);

}
    public static function getFoodsByCatagory($catagory){
        self::$db=Database::getDB();
        $query="select * from food where Food_Catagory ='$catagory'";
        $results=self::$db->query($query);
        $result = $results->fetchAll(PDO::FETCH_ASSOC);

     /*   $all=array();
        foreach($results as $item){
            $food=new Food($item["Food_Catagory"],$item["Food_Price"],$item["Food_Instock"],
                $item["Food_description"],$item["Food_mark"],$item["Food_Name"],$item["Food_Image"],
                $item["Discount_price"],$item["Viewed_times"],$item["Sales_volume"]);
            $food->setId($item["Food_id"]);
            $all[]=$food;
        }*/

        return json_encode($result);
    }
    public static function getTopFoods($count){
        self::$db=Database::getDB();
        $query="select * from food order by Sales_volume DESC limit $count";
        $results=self::$db->query($query);
        $all=array();

        foreach($results as $item){
            $food=new Food($item["Food_Catagory"],$item["Food_Price"],$item["Food_Instock"],
                $item["Food_description"],$item["Food_mark"],$item["Food_Name"],$item["Food_Image"],
                $item["Discount_price"],$item["Viewed_times"],$item["Sales_volume"]);
            $food->setId($item["Food_id"]);
            $all[]=$food;
        }

        return $all;
    }
    public static function pages($foods){
      if(count($foods)%12==0){
          $page=count($foods)/12;
      }else{
          $page=(count($foods)-count($foods)%12)/12+1;
      }
        return $page;
    }
    public static function search($search){
       $foods= json_decode(self::getAll());
        $pattern="/".$search."/i";
        $selected=array();

            foreach ($foods as $food) {
                if (preg_match($pattern, $food->Food_Name)) {
                    $selected[] = $food;
                }

            }


        return json_encode($selected);
    }
    public static function getFoodById($id){
        self::$db=Database::getDB();
        $query="select * from food where Food_id='$id'";
        $result=self::$db->query($query);

        $item=$result->fetch();

        $food=new Food($item["Food_Catagory"],$item["Food_Price"],$item["Food_Instock"],
            $item["Food_description"],$item["Food_mark"],$item["Food_Name"],$item["Food_Image"],
            $item["Discount_price"],$item["Viewed_times"],$item["Sales_volume"]);
        $food->setId($item["Food_id"]);
        return $food;
    }
    public static function getFoodCinema(){
        self::$db=Database::getDB();
        $query="select * from cinemas";
        $result=self::$db->query($query);
        $results = $result->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    public static function  getFoodCommentById($id){
        self::$db=Database::getDB();
        $query="select b.Comment,b.Date,c.username,b.Mark,b.Evaluation,d.Size,b.Mark from food a join food_comment b on a.Food_id=
         b.Food_id join users c on b.User_id=c.id join food_order_item d on d.Order_item_id=b.Order_item_id where a.Food_id='$id'";
        $result=self::$db->query($query);
        $results = $result->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($results);
    }
    public static function updateFoodById($foodid,$stock,$sales){
       self::$db= Database::getDB();
        $query="update food set Sales_volume=$sales,Food_Instock=$stock where Food_id='$foodid'";
        $count=self::$db->exec($query);
        return $count;
    }
    public static function setHistory($foodid){
        $t=time();

        if(isset($_COOKIE[$foodid])){


            setcookie($foodid, $t,$t + (86400 * 30),"/");

        }else {
            setcookie($foodid, $t,$t + (86400 * 30),"/");
        }

    }

    public static function insertCommentById($orderitemid,$foodid,$comment,$mark,$evaluation,$file,$userid){
        self::$db=Database::getDB();
        $date=date("Y-m-d");

        $query="insert into food_comment (User_id,Order_item_id,Food_id,Comment,Mark,Evaluation,Date,File) values( :userid, :orderitemid,
         :foodid, :comment, :mark, :evaluation, :date, :file)";
        $stm=self::$db->prepare($query);
        $stm->bindParam(":userid",$userid);
        $stm->bindParam(":orderitemid",$orderitemid);
        $stm->bindParam(":foodid",$foodid);
        $stm->bindParam(":comment",$comment);
        $stm->bindParam(":mark",$mark);
        $stm->bindParam(":evaluation",$evaluation);
        $stm->bindParam(":date",$date);
        $stm->bindParam(":file",$file);
        $count=$stm->execute();
        return $count;
    }
    public static function calculateMark($foodid){
        self::$db=Database::getDB();
        $results=json_decode(self::getFoodCommentById($foodid));
        $count=count($results);
        if($count>0) {
            $sum = 0;
            foreach ($results as $result) {
                $sum += $result->Mark;
            }
            $average = $sum / $count;
        }else {
            $average =5;
        }
            $query = "update food set Food_mark= :foodmark where Food_id= :foodid";
            $stm = self::$db->prepare($query);
            $stm->bindParam(":foodmark", $average);
            $stm->bindParam(":foodid", $foodid);
            $count = $stm->execute();

        return $average;
    }
}