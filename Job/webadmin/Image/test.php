<?php
require('conn.php');
session_start();
$act=$_GET['act']?$_GET['act']:'';
if($act=='add')
{

    $sql="insert into ceshi(wenti,answer1,answer2,answer3,answer4,rights,fenshu,name)values('".$_POST['wenti']."','".$_POST['answer1']."','".$_POST['answer2']."','".$_POST['answer3']."','".$_POST['answer4']."','".$_POST['rights']."','".$_POST['fenshu']."','".$_POST['name']."')";
    $result=$db->exec($sql);
    if($result)
    {

        echo  "<script language='javascript'>";
        echo  "alert('sumbit ok');";
        echo  "location.href='Admin_Index_main.php'";
        echo "</script>";
    }
}

?>