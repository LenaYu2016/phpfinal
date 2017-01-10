<?php

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Career</title>

<script type="text/javascript" src="public/11-2-routing.js"></script>
<style type="text/css">
.STYLE1 {
	color: #FF0000;
	font-weight: bold;
}
.STYLE2 {
	color: #000000;
	font-weight: bold;
}


-->
</style>
</head>


<body>

<table width="981" height="939" border="0" align="center" bgcolor="#CCCCCC" matgin: 0 auto;>
  <tr>
    <td width="94" rowspan="3" valign="top" bordercolor="#CCCCCC" bgcolor="#CCCCCC"><table width="200" border="0">
            <tr id="nav">
                <td height="64" align="center" valign="middle"><a href="view/aboutus.php?home"><img src="public/pic1.jpg"></a></td>
            </tr>
            <tr>
                <td height="68" align="center" valign="middle"><a href="view/Feedback.php?products"><img src="public/pic2.jpg"></a></td>
            </tr>
            <tr>
                <td height="57" align="center" valign="middle"><a href="view/information.php?about"><img src="public/pic3.jpg"></a></td>
            </tr>
    </table>
    <td height="92" bordercolor="#CCCCCC" bgcolor="#CCCCCC"><p class="STYLE1">Web develope</p>

      </td>
  </tr>
  <tr>
    <td width="871" height="676" valign="top" bgcolor="#CCCCCC">

	<div id="output"/>

	<?php

require('conn.php');

$PageSize=10;
$act=isset($_GET["action"])?$_GET["action"]:'';
$sql="select count(*) from  hiring order by id desc";
if($act=="search")
{
   $type=$_POST["type"];
   $keywords=$_POST["keywords"];
   if($_SESSION['id']!=="" ){
  $sql="select count(*) from  hiring order by id desc";
}
$result=$db->query($sql)  or die(mysql_error());
$amount=$result->rowCount ;
}
if(isset($_GET["page"]))
{
$page=(int)$_GET["page"];
}
else
{

$page=1;

}
if(isset($amount)){

if ($amount<$PageSize){

$PageCount=1;
}
if($amount%$PageSize){

$PageCount= $amount/$PageSize+1;

$PageCount=intval($PageCount);
}
else
{
$PageCount=$amount/$PageSize;
}
}

else{

$PageCount=0;
}

$Page_String="";
if ($page==1){
$Page_String.='First|Previous |';
}
else{

$Page_String.='<a href=?page=1>First Page</a>|<a href=?page='.($page-1).'>Last page</a>|';

}

if(($page==$PageCount)||($PageCount==0)){


$Page_String.='Next page|End page|';

}
else{

$Page_String.='<a href=?page='.($page+1).'>Next page</a>|<a href=?page='.$PageCount.'>End page</a>';

}
//$mount-($page-1)*$PageSize;
//$num=$a;

?>

<?php

 $upLimit   =   ($page-1)*$PageSize;
  $lowLimit   =  $PageSize;
  $act=isset($_GET["action"])?$_GET["action"]:'';
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
$result=$db->query($sql)  or die(mysql_error());


while($rs=$result->fetchObject())
{


?>

	<table  width="863" border="0">
        <tr>
          <td colspan="2"><span class="STYLE1"><?php echo $rs->jobtitle;?></span> (<?php echo $rs->hiretime;?>)</td>
        </tr>
        <tr>
          <td width="109">Number</td>
          <td width="738" align="left"><?php echo $rs->hirenumber;?>&nbsp;</td>
        </tr>
        <tr>
          <td><p>Requirement:</p></td>
          <td width="738" align="left"><?php echo $rs->hirerequirement;?>&nbsp;</td>

        </tr>
      </table>
    <?php
}
 ?>
	 </div>
      </td>
  </tr>
  <tr>
    <td height="139"  bgcolor="#CCCCCC"><div  id="output"><a href="./view/information.php" class="STYLE2">Apply right now>></a></div></td>

  </tr>


</table>
<p>&nbsp;</p>
		  		</div>
	</div>

</body>
</html>
