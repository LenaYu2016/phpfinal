<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php include "../../Assets/html/header.php";?>

<?php
$act=isset($_GET['act'])?$_GET['act']:'';
//$a=0;
include("../controller/jobinformationcontrller.php");

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Creer Information</title>
<style type="text/css">
<!--
.STYLE1 {
	color: #FF0000;
	font-weight: bold;
}
-->
.center{

height:100%;
text-align: center;
width:1400px;

}
</style>
</head>

<body>

<div>



<table width="800" border="0" align="center">
  <tr>
    <td>
      <table id="output" width="1032" height="1029" border="0" align="center" bordercolor="#CCCCCC" bgcolor="#CCCCCC">
        <tr>
          <td width="135" valign="middle" bgcolor="#CCCCCC">&nbsp;</td>
      <td height="85" bgcolor="#CCCCCC">&nbsp;</td>
    </tr>
        <tr bordercolor="#CCCCCC">
          <td width="135" valign="top" bgcolor="#CCCCCC">
              <table width="157" border="0">
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
          </td>
          <td width="887" height="928" bgcolor="#CCCCCC"><table width="694" border="0">
            <tr>
              <td colspan="2" bgcolor="#CCCCCC"><strong>Web developer</strong></td>
          </tr>
            <tr>
              <td colspan="2" bgcolor="#CCCCCC">Start Time：[02-24-2015]</td>
          </tr>
            <tr>
              <td width="133" height="77" bgcolor="#CCCCCC"><p><strong>Order number</strong>：</p>
            <p><strong>Time</strong>：</p>
            <p><strong>Requirement</strong>：</p></td>
          <td width="551" bgcolor="#CCCCCC"><p>0</p>
            <p>1970-01-01</p>
            <p>&nbsp;</p></td>
        </tr>
            <tr>
              <td height="249" colspan="2" bgcolor="#CCCCCC"><p>1.Ensure technical feasibility of UI/UX designs</p>
            <p>2.Strong understanding of communications, marketing, and customer service principles</p>
            <p>3.Digital Advertising experience a major asset</p>
            <p>4.Excellent understanding ofXML or PHP or JS or CSS or asp.net</p>

            <p>salary：</p>
            <p>$3000+</p></td>
          </tr>
            </table>

              <form action="?act=add" method="post" enctype="multipart/form-data">
	    <table width="692" border="0">
	      <tr>
	        <td height="40" colspan="2" bgcolor="#CCCCCC"><span class="STYLE1">Job（*）</span></td>
          </tr>
	      <tr>
	        <td bgcolor="#CCCCCC"><p>Name：</p>          </td>
            <td bgcolor="#CCCCCC"><input type="text" name="name" value=""/>
              *</td>
          </tr>
	      <tr>
	        <td width="91" bgcolor="#CCCCCC"><p>Sex：
  </p></td>
            <td width="591" bgcolor="#CCCCCC"><select name="sex">
              <option value="Male" selected="selected">Male</option>
              <option value="Female">Female</option>
              </select>
              *</td>
          </tr>
	      <tr>
	        <td bgcolor="#CCCCCC"><p>Marry：
  </p></td>
            <td align="left" bgcolor="#CCCCCC"><select name="hunfou">
              <option value="Married" selected="selected">Married</option>
              <option value="Single">Single</option>
              </select>
              * </td>
          </tr>
	      <tr>
	        <td bgcolor="#CCCCCC"><p>Date of birthday： </p></td>
            <td bgcolor="#CCCCCC"><input type="text" name="birthday" value=""/></td>
          </tr>
	      <tr>
	        <td bgcolor="#CCCCCC"><p>Educational background： </p></td>
            <td bgcolor="#CCCCCC"><input type="text" name="education" value=""/></td>
          </tr>
	      <tr>
	        <td bgcolor="#CCCCCC"><p>Date of graduation：</p></td>
            <td bgcolor="#CCCCCC"><input type="text" name="graduation" value=""/></td>
          </tr>
	      <tr>
	        <td bgcolor="#CCCCCC"><p>School：</p></td>
            <td bgcolor="#CCCCCC"><input type="text" name="biyeschool" value=""/></td>
          </tr>
	      <tr>
	        <td bgcolor="#CCCCCC"><p>Phone number： </p></td>
            <td bgcolor="#CCCCCC"><input type="text" name="tel" value=""/></td>
          </tr>
	      <tr>
	        <td bgcolor="#CCCCCC"><p>Introduction：</p>
		      <p>
		        <p>&nbsp;</p></td>
            <td bgcolor="#CCCCCC"><textarea name="xiandxi"></textarea>
              *</td>
          </tr>
	      </table>
        <table width="690" border="0">
          <tr>
            <td width="82" bgcolor="#CCCCCC">Online Test</td>
            <td width="598" bgcolor="#CCCCCC">&nbsp;</td>
          </tr>

  <?php
      require('../conn.php');
      include("../controller/info.php");

      $i = 1;
      $ids=array();
      while($i<=5){
            $id = round(rand($min,$max));
            if(!in_array($id,$ids)){
              $sql = "select * from test where id=".$id;
              $res = $db->query($sql);
              if($rs = $res->fetchObject()){
                array_push($ids,$id);

        ?>

          <tr>
                    <td colspan="2" bgcolor="#CCCCCC"><p><?php echo $i.".".$rs->question; ?></p>
		              <p><input type="radio" name="<?php echo $i; ?>answer<?php echo $rs->id; ?>" value="a"/><?php echo "A.".$rs->answer1; ?></p>
		              <p><input type="radio" name="<?php echo $i; ?>answer<?php echo $rs->id; ?>" value="b"/><?php echo "B.".$rs->answer2; ?></p>
		              <p><input type="radio" name="<?php echo $i; ?>answer<?php echo $rs->id; ?>" value="c"/><?php echo "C.".$rs->answer3; ?></p>
	                  <p><input type="radio" name="<?php echo $i; ?>answer<?php echo $rs->id; ?>" value="d"/><?php echo "D.".$rs->answer4; ?></p>		      </td>
          </tr>
          <?php

        $i++;
          }
        }
		  }
      ?>

<?php
     $numberrand=rand();

   ?>

            <tr>
            <td height="23" colspan="2" bgcolor="#CCCCCC" name="vcode">Codes：<?php echo $numberrand;?>  <input type="hidden" name="rand3" value="<?php echo $numberrand;?>">
                <?php echo $error;?>
                <input type="text" name="username32" value=""> <input name="Submit" type="submit"/></td>
          </tr>
              <td>
               
          </table>
	    </form>

      </td>
    </tr>
      </table>
    </td>
    </tr>
</table>





<p>&nbsp;</p>
</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js">

</script>
<script>
    
</script>
<?php include "../../Assets/html/footer.php";?>
</body>
</html>
