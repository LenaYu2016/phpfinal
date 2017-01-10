<?php
require_once "Database.php";
class ShoppingcartDB
{
   private static $db;
    public static  function getCartByUserId($id){
        self::$db=Database::getDB();

        $query="select a.Food_id,b.Food_Image,b.Food_description,b.Food_Catagory,b.Food_Price,b.Discount_price,
a.Quantity,a.Size,b.Food_Instock,b.Food_Name,a.Cinema_Name,a.Id,a.price from food_shoppingcart a
join food b on a.Food_id=b.Food_id where a.User_id='$id'";
        $result=self::$db->query($query);
        $results=$result->fetchAll(PDO::FETCH_OBJ);

       return $results;
    }
    public static function getItemById($id){
        self::$db=Database::getDB();
        $query="select * from food_shoppingcart where Id='$id'";
        $r=self::$db->query($query);
        $result=$r->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    public static function plus($userid,$foodid){
        self::$db=Database::getDB();
        $items=self::getCartByUserId($userid);
        $price=FoodDB::getFoodById($foodid)->getDiscountPrice();
        $flag=true;
        foreach($items as $item){
            if($item->Food_id==$foodid){
            $flag=false;

            }
        }
        if($flag==true) {
            $query = "insert into food_shoppingcart (User_id,Food_id,Quantity,Size,Cinema_Name,price)
        VALUES ('$userid','$foodid',1,1,'Cinema1','$price')";
            $count = self::$db->exec($query);
        }
        return $flag;
    }
    public static function insertItemById($foodid,$userid,$quantity,$size,$cinema){
        self::$db=Database::getDB();
        $items=self::getCartByUserId($userid);
       $price=FoodDB::getFoodById($foodid)->getDiscountPrice();
        foreach($items as $item){
            if($item->Food_id==$foodid && $item->Size==$size && $item->Cinema_Name==$cinema){
                $count=self::updateItemById($foodid,$userid,$quantity,$size,$cinema,$price);
                return $count;
            }
        }
        $query="insert into food_shoppingcart (User_id,Food_id,Quantity,Size,Cinema_Name,price)
        VALUES ('$userid','$foodid','$quantity','$size','$cinema','$price')";
        $count=self::$db->exec($query);

        return $count;
    }
    public static function updateItemById($foodid,$userid,$quantity,$size,$cinema,$price){
        self::$db=Database::getDB();
        $query="update food_shoppingcart set Quantity='$quantity',Size='$size',Cinema_Name='$cinema',price='$price'
        where User_id='$userid'and Food_id='$foodid'";
       $count=self::$db->exec($query);
        return $count;
    }
    public static function updateSizeById($id,$size){
        self::$db=Database::getDB();
        $query="update food_shoppingcart set Size='$size' where Id='$id'";
        $count=self::$db->exec($query);
        return $count;
    }
    public static function updateCinemaById($id,$cinema){
        self::$db=Database::getDB();
        $query="update food_shoppingcart set Cinema_Name='$cinema' where Id='$id'";
        $count=self::$db->exec($query);
        return $count;
    }
    public static function updateQuantityById($id,$quantity){
        self::$db=Database::getDB();
        $query="update food_shoppingcart set Quantity='$quantity' where Id='$id'";
        $count=self::$db->exec($query);
        return $count;
    }
    public static function deleteById($cartId){
        self::$db=Database::getDB();
        $query="delete from food_shoppingcart where Id='$cartId'";
        $count=self::$db->exec($query);
        return $count;

    }
    public static function getCount($userid){
        self::$db=Database::getDB();
        $query="select count(*) from food_shoppingcart where User_id='$userid'";
        $result=self::$db->query($query);
        $r=$result->fetch();

        return $r[0];
    }
    public static  function  getLowstock($count,$userid){
        self::$db=Database::getDB();
        $query="select a.Food_id,b.Food_Image,b.Food_description,b.Food_Catagory,b.Food_Price,
b.Discount_price, a.Quantity,a.Size,b.Food_Instock,b.Food_Name,a.Cinema_Name,a.Id, a.price from food_shoppingcart
 a join food b on a.Food_id=b.Food_id where b.Food_Instock<='$count' and a.User_id='$userid'";
        $result=self::$db->query($query);
        $results = $result->fetchAll(PDO::FETCH_OBJ);
        return $results;
    }
    public static function  getReduction($userid){
        self::$db=Database::getDB();
        $foods=self::getCartByUserId($userid);
        $reduction=array();
        foreach($foods as $food) {

            if($food->Discount_price<$food->price){
                $reduction[]=$food;
            }

        }
        return $reduction;
    }
    public static function getGuess($userid,$count){
        self::$db=Database::getDB();
        $foods=self::getCartByUserId($userid);
        $guess=array();
        $catagories=array();
        $all=json_decode(FoodDB::getAll());
        foreach($foods as $food) {
            $i=true;
           foreach($catagories as $catagory){
               if ($food->Food_Catagory==$catagory) {
                 $i=false;
                   break;
               }
           }
            if($i==true){
                $catagories[]=$food->Food_Catagory;
            }
                $pieces = explode(" ",  $food->Food_Name);
            foreach($pieces as $piece){

                $pattern="/".$piece."/i";
               foreach($all as $a) {

                   if (preg_match($pattern,$a->Food_Name)){
                       $guess[]=$a->Food_id;
                   }
               }
            }
        }
        foreach($catagories as $catagory) {
            $fs=json_decode(FoodDB::getFoodsByCatagory($catagory));
            foreach($fs as $item){

                $guess[]=$item->Food_id;
            }
            }
        $results=array_unique($guess);
        $r=array();
        foreach($results as $key=>$n){
            $r[]=$n;
        }
        $number=0;
        $final=[];
        foreach($foods as $food){

                if (($key = array_search($food->Food_id, $r)) !== false) {
                    unset($r[$key]);
                }

        }
        $r2=array();
        foreach($r as $key=>$n){
            $r2[]=$n;
        }
        $r=$r2;
        if(count($r)<=$count){
            $final=$r;
        }else{
        while($number<$count){
           $random= rand(0,(count($r)-1));
            $final[] = $r[$random];
            unset($r[$random]);
            $r1=array();
            foreach($r as $key=>$n){
                $r1[]=$n;
            }
            $r=$r1;
            $number++;
        }}
        $finalfoods=[];

        foreach($final as $item){
           $food= FoodDB::getFoodById($item);
            $finalfoods[]=$food;
        }
        return $finalfoods;
    }
    public  static function getHistory($count){
      $foods=json_decode(FoodDB::getAll());
        $time=array();
        $t=time();

        foreach($foods as $food){
             if(isset($_COOKIE[$food->Food_id]) && $_COOKIE[$food->Food_id]>=strtotime('-7 day', $t)){
                 $time[$food->Food_id]=$_COOKIE[$food->Food_id];
             }
        }

        arsort($time);

        $results=array();
        foreach($time as $key=>$item){
            $food=FoodDB::getFoodById($key);
            $results[]=$food;
            if(count($results)>=$count){
                break;
            }
        }
        return $results;
    }
}