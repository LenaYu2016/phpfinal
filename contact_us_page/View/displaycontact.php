<?php
use Project\Classes\DB\DB;
include '../../autoloader.php';
require_once '../../contact_us_page/Model/Contactus.php';
//require_once '../Model/Contactus.php'; // UNCOMMENT THIS LINE IF YOU ARE RUNNING THIS PAGE FROM DIRECTLY AND COMMENT ABOVE LINE
$contactList = new Contactus();
$selectResult = $contactList->displayContacts();
?>
<!Doctype HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/Assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/Assets/css/style.css"/>

    <title>List of contacts</title>
</head>

<!--<?php //include '../../Assets/html/header.php'?>-->
<!--<div class="container">-->
<body>
<h2>List of contacts</h2>

<table class="table table-bordered">
    <thead style="color:rosybrown;font-size: 24px;">
        <tr>
            <th scope="row">Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Message</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
    </thead>

    <?php foreach ($selectResult as $selectContact) : ?>
        <tbody>
            <tr>
                <td><?php echo $selectContact['first_name'] ?> </td>
                <td><?php echo $selectContact['last_name'] ?> </td>
                <td><?php echo $selectContact['Email'] ?> </td>
                <td><?php echo $selectContact['Message'] ?> </td>

                <td>
                    <form method ="post" action ="/contact_us_page/View/delete.php">
                        <input type ="hidden" name = "sel_record" value="<?php echo $selectContact['contact_id'] ?>">
                        <input type ="submit" name = "delete" value ="Delete" class="btn btn-primary">
                    </form>
                </td>
                <td>
                    <form method ="post" action ="/admin/editContact">
                        <input type ="hidden" name = "sel_record" value="<?php echo $selectContact['contact_id'] ?>"/>
                        <input type ="submit" name = "update" value ="Edit" class="btn btn-primary">
                    </form>
                </td>

            </tr>
        </tbody>

    <?php endforeach; ?>
</table>

</body>
<!--</div>-->

</html>
