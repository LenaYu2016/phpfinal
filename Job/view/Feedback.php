<?php
include("../controller/feedbackcontroller.php");

$feed=new feedback();
$feed->index();
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Feed back</title>
</head>

<script language="JavaScript">
    function  Check_stu()
    {

        if (document.form1.UserName1.value == "")
        {   alert("Enter username");
            document.form1.UserName1.focus();
            return false;
        }
        if (document.form1.phone.value == "")
        {   alert("Enter phone");
            document.form1.phone.focus();
            return false;
        }
        if (document.form1.email.value == "")
        {   alert("Enter email");
            document.form1.email.focus();
            return false;
        }
        if (document.form1.address.value == "")
        {   alert("Enter address");
            document.form1.address.focus();
            return false;
        }
        if (document.form1.message.value == "")
        {   alert("Enter message");
            document.form1.message.focus();
            return false;
        }
    }
</script>
<body>

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



                        <div class="contact-textarea">

                            <div style="margin: 0 auto; width: 40%;" >

                                <form name="form1" action="" method="post" >
                                    <div id="reg">
                                        <h3>Feedback page</h3>
                                        <div id="slider">
                                            <div class="form-step" >



                                                <div class="row" >
                                                    <div class="form-left" style="font-size: 20px;">username *</div>
                                                    <div class="form-right"><input type="text"  name="UserName1" class="form-input" /></div>

                                                </div>
                                                <div class="row">
                                                    <div class="form-left" style="font-size: 20px;">Phone *</div>
                                                    <div class="form-right" ><input type="text"  name="Phone" class="form-input" /></div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-left" style="font-size: 20px;">Email *</div>
                                                    <div class="form-right" ><input type="text"  name="email" class="form-input" /></div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-left" style="font-size: 20px;">address *</div>
                                                    <div class="form-right" ><input type="text"  name="address" class="form-input" value="" /></div>
                                                </div>

                                                <div class="row">
                            <textarea name="message"  style="width:66%;padding:2%;height:20%; border-left-width:50%;font:36px/44px sans-serif;color:white;text-shadow:1px 1px 5px black; background:url('');">
How was your feeling?
</textarea>

                                                </div>
                                                <div id="form-submit">

                                                    <input  type="submit" id="Submit" value="ADD" name="send">
                                                    <button class="button1" type="reset" value="CLEAR" id="clean1" >CLEAR</button>

                                                </div>


                                                <div id="output" style="margin: 0 auto; width: 40%; color: red;"></div>
                                            </div>
                                        </div>


                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
</body>

</html>

<style type='text/css'>
    @media only screen and (min-width:1024px) {
        .wrappMax .wrapp_box{
            width: 100%;
        }
        body {
            background-color:#fff;
            max-width: 100%;
            max-height: inherit;
        }
        #reg{
            width:750px;
            height:500px;
            background:#f4f4f4;
        }
        #reg h3{
            height:60px;
            text-shadow: 1px 1px 2px #000;
            color:#fff;
        }
        #slider {
            padding:0;
            margin:0;
            width:700px;
            height:400px;
        }
        .form-step{
            padding:16% 3% !important;
        }
        .form-left{
            color: #717171;
            float: left;
            font-size: 13px;
            padding: 5px;
            width: 200px;
        }
        .form-right{
            float: left;
            width: 214px;
        }
        .row{
            float: left;
            margin: 5px 0;
            width: 100%;

        }
        .form-step input[type='text']{
            border: 1px solid #CFCFCF;
            border-radius: 4px 4px 4px 4px;
            height: 25px;
            padding: 3px;
            width: 200px;
        }

        #password {
            height: 26px;
            width: 206px;
        }
        #username{
            height: 26px;
            width: 203px;
        }
</style>

</html>