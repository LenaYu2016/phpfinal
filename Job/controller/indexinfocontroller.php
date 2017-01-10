<?php
error_reporting(0);

 $upLimit   =   ($page-1)*$PageSize;   
  $lowLimit   =  $PageSize; 
 $act= isset($_GET["action"])?$_GET["action"]:'';
if($act=="search")
{
   $type=$_POST["type"];
   $keywords=$_POST["keywords"];
  $sql="select * from  hiring where ".$type." ='".$keywords."' order by id desc  limit ".$upLimit ."  ,".$lowLimit."";
}
else
{
   $sql="select * from  hiring  order by id desc  limit ".$upLimit ."  ,".$lowLimit." ";
}
$result=$db->query($sql)  or die("$sql");


?>