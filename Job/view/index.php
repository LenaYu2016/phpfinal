<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Career</title>

<script type="text/javascript" src="../public/11-2-routing.js"></script>
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
                <td height="64" align="center" valign="middle"><a href="aboutus.php?home"><img src="../public/pic1.jpg"></a></td>
            </tr>
            <tr>
                <td height="68" align="center" valign="middle"><a href="Feedback.php?products"><img src="../public/pic2.jpg"></a></td>
            </tr>
            <tr>
                <td height="57" align="center" valign="middle"><a href="information.php?about"><img src="../public/pic3.jpg"></a></td>
            </tr>
    </table>
    <td height="92" bordercolor="#CCCCCC" bgcolor="#CCCCCC"><p class="STYLE1">Web develope</p>
      <p><strong>Seach Job：
            <input type="text" name="neirong"/>
            <input name="submit" type="submit" value="submit seach" />
    </strong></p>
      </td>
  </tr>
  <tr>
    <td width="871" height="676" valign="top" bgcolor="#CCCCCC">
	
	<div id="output"/>
	<?php

require('conn.php');
include("../controller/indexcontroller.php");
include("../controller/indexinfocontroller.php");

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
    <td height="139"  bgcolor="#CCCCCC"><div  id="output"><a href="information.php" class="STYLE2">Apply right now>></a></div></td>

  </tr>
    <tr>
        <td height="90"  bgcolor="#CCCCCC" align="center"><div  id="outpyhut"><a href="../webadmin/web_add.php">Add Job</a></div></td>
    </tr>

   
</table>
<p>&nbsp;</p>
		  		</div>
	</div>

</body>
</html>
