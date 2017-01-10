<?php
session_start() ;

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"">
<title>houtai</title>
<link href="Css_Left.css" rel="stylesheet" type="text/css">

<SCRIPT language=javascript1.2>
function showsubmenu(sid)
{
whichEl = eval("submenu" + sid);
if (whichEl.style.display == "none")
{
eval("submenu" + sid + ".style.display='';");
}
else
{
eval("submenu" + sid + ".style.display='none';");
}
}
</SCRIPT>
</head>

<body>
<table width="158" height="49"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#0650D2">
  <tr>
    <td valign="middle"><div align="center"><img src="" width="158" height="40"></div></td>
  </tr>
</table>
<table width="158" height="25"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td background="" class="Td_Menu"><div align="left"><a href="#">Marger</a> | &nbsp; <a href="#" target="_top">Login out</a></div></td>
  </tr>
</table>

<table width="158" border="0" align="center" cellpadding="0" cellspacing="0">
 
  <tr>
    <td background="image/system/menu_bg_Product.jpg" class="Td_left_menu" onClick="showsubmenu(28)" style="cursor:hand;"><a href="#" class="Td_Menu">Applyer</a></td>
  </tr>
  <tr>
    <td bgcolor="#D4ECF5" id='submenu28' style="display:none"><div align="left">
      <table width="100%"  border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td class="Td_Word">
				<a href="user_admin.php" target="main">Applyer information</a><br>
         </td>
        </tr>
        <tr>
          <td height="15" bgcolor="#0650D2"></td>
        </tr>
      </table>
    </div></td>
  </tr>
</table>


    
  





<table width="158" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
   <td background="image/system/menu_bg_Product.jpg" class="Td_left_menu" onClick="showsubmenu(47)" style="cursor:hand; "><a href="#" class="Td_Menu">Hire person</a></td>
  </tr>
  <tr>
    <td bgcolor="#D4ECF5" id='submenu47' style="display:none"><div align="left">
        <table width="100%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td class="Td_Word">	
			<a href="web_add.php" target="main">Hire information</a><br>			
			</td>
          </tr>
		   <tr>
            <td class="Td_Word">	
			<a href="addzhanshi.php" target="main">Show Hire information</a><br>			
			</td>
          </tr>
          <tr>
            <td height="15" bgcolor="#0650D2"></td>
          </tr>
        </table>
    </div></td>
  </tr>
</table>
<table width="158" border="0" align="center" cellpadding="0" cellspacing="0">
 
  <tr>
    <td background="image/system/menu_bg_Product.jpg" class="Td_left_menu" onClick="showsubmenu(27)" style="cursor:hand;"><a href="#" class="Td_Menu"> Show question</a></td>
  </tr>
  <tr>
    <td bgcolor="#D4ECF5" id='submenu27' style="display:none"><div align="left">
      <table width="100%"  border="0" cellspacing="0" cellpadding="0">
		 <tr>
          <td class="Td_Word">
				<a href="test_add.php" target="main">Add quistion</a><br>
         </td>
        </tr>
		<tr>
          <td class="Td_Word">
				<a href="ceshizhanshi.php" target="main">Show </a><br>
         </td>
        </tr>
        <tr>
          <td height="15" bgcolor="#0650D2"></td>
        </tr>
      </table>
    </div></td>
  </tr>
</table>

<table width="158" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>
    <td background="image/system/menu_bg_Product.jpg" class="Td_left_menu" onClick="showsubmenu(30)" style="cursor:hand;"><a href="#" class="Td_Menu"> Show Feedback</a></td>
  </tr>
  <tr>
    <td bgcolor="#D4ECF5" id='submenu30' style="display:none"><div align="left">
        <table width="100%"  border="0" cellspacing="0" cellpadding="0">
        <table width="100%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td class="Td_Word">
              <a href="feedbackzhanshi.php" target="main">Show </a><br>
            </td>
          </tr>
          <tr>
            <td height="15" bgcolor="#0650D2"></td>
          </tr>
        </table>
      </div></td>
  </tr>
</table>
                                           

</body>
</html>
                                          
