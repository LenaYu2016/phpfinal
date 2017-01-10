
<?php
session_start();
require('conn.php');
if($_GET["act"]=="del"){
  $sql="delete from test where id=".$_GET["id"];
  $result=$db->query($sql);
  if($result->execute() or die(error())){
    echo  "<script language='javascript'>";
    echo  "alert('Deleted');";
    echo  "location.href='ceshizhanshi.php';";
    echo "</script>";
  }
}



$PageSize=10;
$act=$_GET["action"];
if($act=="search")
{
   $type=$_POST["type"];
   $keywords=$_POST["keywords"];
   if($_SESSION['id']!=="" ){
  $sql="select * from  test order by id desc";
}
$result=$db->query($sql)  or die("cannorworkSQL：$sql");
$amount=$result->rowCount($result);
}
if(isset($_GET["page"]))
{
$page=(int)$_GET["page"];
}
else
{

$page=1;

}
if($amount){

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




//翻页连接

$Page_String="";
if ($page==1){
$Page_String.='First page|Previous|';
}
else{

$Page_String.='<a href=?page=1>First page</a>|<a href=?page='.($page-1).'>Previous</a>|';

}

if(($page==$PageCount)||($PageCount==0)){


$Page_String.='Next page|End page|';

}
else{

$Page_String.='<a href=?page='.($page+1).'>Next page</a>|<a href=?page='.$PageCount.'>End page</a>';

}mount-($page-1)*$PageSize;
$num=$a


?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Marger System</title>
<link href="Css_Main.css" rel="stylesheet" type="text/css">

</head>
<script language="JavaScript">
<!--
function CheckAll(formall)
  {
  for (var i=0;i<formall.elements.length;i++)
    {
    var e = formall.elements[i];
    if (e.name == 'delid')
       e.checked = formall.chkall.checked;
    }
  }
  
  -->
</script>
<body>
<table width="101%"  border="0" align="center" cellpadding="0" cellspacing="1" class="border">
  <tr>
    <td class="title_dh"><div align="center">
      <div align="center">Information</div>
    </div></td>
  </tr>
</table>

<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="1" class="border">
  <tr class="title_top">
    <td width="5%"><div align="center">Title</div></td>
    <td width="6%" align="center">option1</td>
    <td width="8%"><div align="center">option2</div></td>
	 <td width="8%"><div align="center">option3</div></td>
	 <td width="8%"><div align="center">option4</div></td>
      <td width="8%"><div align="center">Anwser</div></td>
    <td width="8%"><div align="center">Mark</div></td>
	 <td width="8%"><div align="center">Name</div></td>
	 <td width="8%"><div align="center">Operate</div></td>

  </tr>

		  
<?php 


 $upLimit   =   ($page-1)*$PageSize;   
  $lowLimit   =  $PageSize; 
  $act=$_GET["action"];
if($act=="search")
{
   $type=$_POST["type"];
   $keywords=$_POST["keywords"];
  $sql="select * from  test where ".$type." ='".$keywords."' order by id desc  limit ".$upLimit ."  ,".$lowLimit."";
}
else
{
   $sql="select * from  test  order by id desc  limit ".$upLimit ."  ,".$lowLimit." ";
}
$result=$db->query($sql)  or die("NOworkSQL：$sql");


while($rs=$result->fetchObject())
{
if($rs->adminID==$_SESSION["id"] || $_SESSION["admin"]!=='')
{
?> 
  <tr class="tdbg">
    <td>
      <div align="center"><?php echo $rs->question;?></div></td>
         <td><div align="center"><?php echo $rs->answer1;?></div></td>
	 <td><div align="center"><?php echo $rs->answer2;?></div></td>
	  <td><div align="center"><?php echo $rs->answer3;?></div></td>
	     <td>
      <div align="center"><?php echo $rs->answer4;?></div></td>
         <td><div align="center"><?php echo $rs->rights;?></div></td>
	 <td><div align="center"><?php echo $rs->mark;?></div></td>
      <td><div align="center"><?php echo $rs->name;?></div></td>
	        <td><div align="center"><a href="?act=del&id=<?php echo $rs->id;?>">Deleted</a></div></td>
 
	  

	
	</tr>
<?php
 
 }}


 ?>
</table>
<table width="98%"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="40">
      <div align="center">		<label><?php echo $Page_String;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This<?php echo $page;?>Page&nbsp;&nbsp;All<?php echo $PageCount;?>Page All<?php echo $amount;?>Message</label></div></td>
  </tr>
</table>



</body>
</html>
