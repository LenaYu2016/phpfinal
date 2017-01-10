<?php
require('conn.php');
session_start();
$act=$_GET['act']?$_GET['act']:'';
if($act=='add')
{

  $sql="insert into test(question,answer1,answer2,answer3,answer4,rights,mark,name)values('".$_POST['question']."','".$_POST['answer1']."','".$_POST['answer2']."','".$_POST['answer3']."','".$_POST['answer4']."','".$_POST['rights']."','".$_POST['mark']."','".$_POST['name']."')";
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
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Hire information</title>
<link href="Css_Main.css" rel="stylesheet" type="text/css">
<style type="text/css">

</style>
</head>

<script language="JavaScript">
function  Check_stu()
{

	if (document.form1.question.value == "")
	 {   alert("Enter question");
		document.form1.question.focus();
		return false;
	 }
	if (document.form1.answer1.value == "")
	 {   alert("Enter answer1");
		document.form1.answer1.focus();
		return false;
	 }
	 if (document.form1.answer2.value == "")
	 {   alert("Enter answer2");
		document.form1.answer2.focus();
		return false;
	 }
	
	 if (document.form1.answer3.value == "")
	 {   alert("Enter Hire answer3");
		document.form1.answer3.focus();
		return false;
	 }
    if (document.form1.answer4.value == "")
    {   alert("Enter Hire answer4");
        document.form1.answer4.focus();
        return false;
    }
    if (document.form1.mark.value == "")
    {   alert("Enter Hire mark");
        document.form1.mark.focus();
        return false;
    }
    if (document.form1.rights.value == "")
    {   alert("Enter Hire Requirement");
        document.form1.rights.focus();
        return false;
    }
    if (document.form1.name.value == "")
    {   alert("Enter Hire Requirement");
        document.form1.name.focus();
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
<form name="form1" action="test_add.php?act=add" method="post" enctype="multipart/form-data">
<table width="98%"  border="0" align="center" cellpadding="0" cellspacing="1" class="border">
  <tr class="title_top">
    <td colspan="2"><div align="center">Add Hire Requirement</div></td>
  </tr>
  <tr class="tdbg">
    <td width="20%"><div align="right"><strong>Question Title：</strong></div></td>
    <td><input name="question" type="text"  size="40"></td>
  </tr>
  <tr class="tdbg">
    <td width="20%"><div align="right"><strong>A：</strong></div></td>
    <td><input name="answer1" type="text"  size="40"></td>
  </tr>
    <tr class="tdbg">
    <td width="20%"><div align="right"><strong>B：</strong></div></td>
    <td><input name="answer2" type="text"  size="40"></td>
  </tr>
  <tr class="tdbg">
    <td width="40%"><div align="right"><strong>C：</strong></div></td>
    <td><input name="answer3" type="text"  size="40"></td>
  </tr>
    <tr class="tdbg">
    <td width="40%"><div align="right"><strong>D：</strong></div></td>
    <td><input name="answer4" type="text"  size="40"></td>
  </tr>
      <tr class="tdbg">
    <td width="40%"><div align="right"><strong>answer:(a、b、c、d)：</strong></div></td>
    <td><input name="rights" type="text"  size="40"></td>
  </tr>
       <tr class="tdbg">
    <td width="40%"><div align="right"><strong>Mark</strong></div></td>
    <td><input name="mark" type="text"  size="40"></td>
  </tr>
        <tr class="tdbg">
    <td width="40%"><div align="right"><strong>Name</strong></div></td>
    <td><input name="name" type="text"  size="40"></td>
  </tr>
</table>
<table width="98%"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="40">
      <div align="center"><span class="style1">
        <input name="Submit" type="submit" id="Submit" value="ADD" onClick="return Check_stu()">
&nbsp;
        <input name="reset" type="reset" id="reset" value="Cancel">
    </span> </div></td>
  </tr>
</table></form>
</body>
</html>