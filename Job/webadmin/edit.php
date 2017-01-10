<?php
require('conn.php');
class ProductDB{
    public function __construct() {

    }
    public function updatejob($id, $qixian, $renshu, $yaoqiu, $zhiwei){

        $db = Dbclass::getDB();
        $query = "UPDATE zhaoadd
                    SET qixian = :cat,
                    renshu = :code,
                    yaoqiu = :name,
                    zhiwei = :job
                      WHERE ID = :id ";
        $stm = $db->prepare($query);
        $stm->bindParam(':id', $id);
        $stm->bindParam(':cat', $category, PDO::PARAM_STR, 50);
        $stm->bindParam(':code', $code, PDO::PARAM_STR, 50);
        $stm->bindParam(':name', $name, PDO::PARAM_STR, 200);
        $stm->bindParam(':job', $price, PDO::PARAM_INT);
        $count = $stm->execute();


        return "Updated rows: " . $count;

    }

}



?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <link href="Css_Main.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        <!--

        .style1 {color: #CCCCCC}
        -->
    </style>

</head>
<script language="JavaScript">
    function  Check_stu()
    {
        if (document.form1.name.value == "")
        {   alert("Enter your name");
            document.form1.name.focus();
            return false;
        }
        if (document.form1.tel.value == "")
        {   alert("Enter your Phone");
            document.form1.tel.focus();
            return false;
        }
    }
</script>
<body>
<table width="98%"  border="0" align="center" cellpadding="0" cellspacing="1" class="border">
    <tr>
        <td class="title_dh"><div align="center"></div></td>
    </tr>
</table>
        <form name="form1" action="?act=edit&id=<?php echo $rss["id"];?>" method="post" >
         <table width="98%"  border="0" align="center" cellpadding="0" cellspacing="1" class="border">
        <tr class="title_top">
            <td colspan="2"><div align="center">Modify information </div></td>
        </tr>


        <tr class="tdbg">
            <td width="20%"><div align="right"><strong>id*：</strong></div></td>
            <td><input name="id" type="text"  size="40" value="<?php echo $rss["id"];?>"></td>
        </tr>
        <tr class="tdbg">
            <td width="20%"><div align="right"><strong>Limit time：</strong></div></td>
            <td><input name="qixian" type="text"  size="40" value="<?php echo $rss["qixian"];?>"></td>
        </tr>
        <tr class="tdbg">
            <td width="20%"><div align="right"><strong>Number：</strong></div></td>
            <td><input name="renshu" type="text"  size="40" value="<?php echo $rss["renshu"];?>"></td>
        </tr>
        <tr class="tdbg">
            <td width="20%"><div align="right"><strong>Number*：</strong></div></td>
            <td><input name="yaoqiu" type="text"  size="25" value="<?php echo $rss["yaoqiu"];?>"></td>
        </tr>
        <tr class="tdbg">
            <td width="20%"><div align="right"><strong>Title*：</strong></div></td>
            <td><input name="zhiwei" type="text"  size="25" value="<?php echo $rss["zhiwei"];?>"></td>
        </tr>



    </table>
    <table width="98%"  border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td height="40">
                <div align="center">
                    <span class="style1">
        <input name="Submit" type="submit" id="Submit" value="modify" onClick="return Check_stu()"/>
        <a href="addzhanshi.php" style="background-color: #0000fa">Go Back to Reult</a>
                     </span>
                </div>
            </td>
        </tr>
    </table></form>
</body>
</html>