
<?php
session_start();
require('conn.php');



$PageSize=10;
$act=$_GET["action"];
if($act=="search")
{
   $type=$_POST["type"];
   $keywords=$_POST["keywords"];
   if($_SESSION['id']!=="" ){
  $sql="select * from  information order by id desc";
}
$result=$db->query($sql)  or die("NoworkSQL：$sql");
$amount=$result->rowCount();
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
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script>
    $(document.ready(function () {
        $.getJOSN('getemail.php',function(data)){
            var result ="<ul>";
            $.each(data, function(key, product){
                result += "<li>" + product.category +" : " +product.productName +"<li>";
            });
            result += "</ul>";
            console.log(data);
        });

    });
</script>
<table width="101%"  border="0" align="center" cellpadding="0" cellspacing="1" class="border">
  <tr>
    <td class="title_dh"><div align="center">
      <div align="center">Hire infomation</div>
    </div></td>
  </tr>
  <form action="?action=search" method="post" name="form">
  <tr>
    <td class="tdbg"><div align="left"><strong>Seach：</strong>      
&nbsp;

&nbsp;&nbsp;Keyword：
<input name="keywords" type="text" id="Keyword" size="20" >
&nbsp;&nbsp;
<select name="type">
<option value="tel">Phone</option>
<option value="name">Name</option>
</select>&nbsp;&nbsp;
<input name="Submit" type="submit" id="Submit" value="Seach">
    </div></td>
  </tr></form>
</table>

<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="1" class="border">
  <tr class="title_top">
    <td width="5%"><div align="center">Name</div></td>
    <td width="5%" align="center">Phone</td>
    <td width="5%"><div align="center">Sex</div></td>
	 <td width="5%"><div align="center">Marry</div></td>
	 <td width="5%"><div align="center">Birthday</div></td>
     <td width="5%"><div align="center">Date of gradute</div></td>
    <td width="7%"><div align="center">Gradute school</div></td>
    <td width="7%"><div align="center">Background</div></td>
	 <td width="7%"><div align="center">Mark</div></td>
	 <td width="14%"><div align="center">Detailed</div></td>

  </tr>

		  
<?php 


 $upLimit   =   ($page-1)*$PageSize;   
  $lowLimit   =  $PageSize; 
  $act=$_GET["action"];
if($act=="search")
{
   $type=$_POST["type"];
   $keywords=$_POST["keywords"];
  $sql="select * from  information where ".$type." ='".$keywords."' order by id desc  limit ".$upLimit ."  ,".$lowLimit."";
}
else
{
   $sql="select * from  information  order by id desc  limit ".$upLimit ."  ,".$lowLimit." ";
}
$result=$db->query($sql)  or die("NoworkSQL：$sql");


while($rs=$result->fetchObject())
{
if($rs->adminID==$_SESSION["id"] || $_SESSION["admin"]!=='')
{
?> 
  <tr class="tdbg">
    <td>
      <div align="center"><?php echo $rs->name;?></div></td>
         <td><div align="center"><?php echo $rs->tel;?></div></td>
	 <td><div align="center"><?php echo $rs->sex;?></div></td>
	  <td><div align="center"><?php echo $rs->hunfou;?></div></td>
	     <td>
      <div align="center"><?php echo $rs->birthday;?></div></td>
         <td><div align="center"><?php echo $rs->graduation;?></div></td>
	 <td><div align="center"><?php echo $rs->biyeschool;?></div></td>
      <td><div align="center"><?php echo $rs->education;?></div></td>
	        <td><div align="center"><?php echo $rs->mark;?></div></td>
      <td><div align="center"><?php echo $rs->xiandxi;?></div></td>
	  

	
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
