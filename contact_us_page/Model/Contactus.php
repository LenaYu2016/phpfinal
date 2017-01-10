<?php

use Project\Classes\DB\DB;

class Contactus
{
    public function editForm($sel_record)
    {
        //connect to database :
       // use Project\Classes\DB\DB;
        include '../../autoloader.php';
        $db = DB::getDB();

        //SQL  statment to select information based on user click on edit button

        $sqlStat = "SELECT * FROM contactus WHERE contact_id = $sel_record ";

        //var_dump($sqlStat);
        // Execute the sql query and get the result
        $stmt= $db->prepare($sqlStat);
        $stmt->execute();
        $editedResult = $stmt->fetch();
        $stmt->closeCursor();
        return $editedResult;
    }
    public function updateFrom($contact_id)
    {
                //connect to database :
                include '../../autoloader.php';
                $db = DB::getDB();
            // getting the value from the edit fields or text boxes from editfrom.php
            // $_POST['name attribute of input type']

                $first_name = htmlspecialchars($_POST["firstname"]);
                $last_name =  htmlspecialchars($_POST["lastname"]);
                $Email =htmlspecialchars($_POST["email"]);
                $Message = htmlspecialchars($_POST["message"]);

                if(empty($first_name) || empty($first_name) || empty($Email) || empty($Message))
                {
                    echo "<h3 style='color:red'>" . "Invalid Contact details . Check all fields and try again." . "</h3>";
                }
                else
                {

                // updating database table with this edited fields values

                $sql = "UPDATE contactus SET
                first_name = '$first_name',
                last_name ='$last_name',
                Email ='$Email',
                Message ='$Message'
                WHERE contact_id = '$contact_id' ";

                //$result = mysqli_query($db_connection,$sql) or die(mysqli_error($db_connection));
                //Execute the Query

                 $updateStatment = $db->prepare($sql);
                 $updatedValues=  $updateStatment->execute();
                 $updateStatment->closeCursor();
                 return $updatedValues;

                }
            }

    public function deleteMovie($sel_record)
    {
        include '../../autoloader.php';
        $db = DB::getDB();
        //SQL  statment to select information based on delete button click

                $sql = "SELECT *  FROM contactus WHERE contact_id = $sel_record";

        // Execute the sql query and get the result

        $delQuery = $db->prepare($sql);
        $delQuery->execute();
        $resultSet = $delQuery->fetch();
        $delQuery->closeCursor();
        return $resultSet;
    }

    public function confirmDelete($contact_id)
    {
        //get the 'confirmid'(hidden input name value ) from delete.php page which sent confirmid on confirm delete click
        //find matching id 'confirmid' database and deletes

        include '../../autoloader.php';
        $db = DB::getDB();

        $sql = "SELECT * FROM contactus WHERE contact_id ='$contact_id'";

    // Execute the sql query and get the result

        $delQuery = $db->prepare($sql);
        $delQuery->execute();
        $deletedResult = $delQuery->fetch();
        $delQuery->closeCursor();
        return $deletedResult;
    }
    public function deletedContactDB($contact_id)
    {
        include '../../autoloader.php';
        $db = DB::getDB();

        $sql = "DELETE FROM contactus WHERE contact_id = '$contact_id'";
        $deletedQuery= $db->prepare($sql);
        $deletedQuery->execute();
        $deletedQuery->closeCursor();
    }
    public function displayContacts()
    {
        //connect to database :
        include '../../autoloader.php';
        $db = DB::getDB();
        //once connected execute below query.

        $sql = "SELECT * FROM contactus ORDER BY first_name ASC";
        $statement1 = $db->prepare($sql);
        $statement1->execute();
        $selectResults= $statement1->fetchAll();
        $statement1->closeCursor();
        return $selectResults;
    }

    // USer Interface -USer submit the form and handle it by Email

    public function contactProcess()
    {
        //connect to database :
        include '../../../autoloader.php';
        $db = DB::getDB();
        $first_name = htmlspecialchars($_POST['first_name']);
        $last_name = htmlspecialchars($_POST['last_name']);
        $Email = htmlspecialchars($_POST['Email']);
        $Message = htmlspecialchars($_POST['Message']);

    // Now inserting form values to the database table

        $query ="INSERT INTO contactus(first_name,last_name,Email,Message) VALUES ('$first_name','$last_name','$Email','$Message')";
        $contactQuery= $db->prepare($query);
        $contactQuery->execute();
        $contactQuery->closeCursor();

    }

    /**
     * =============== Validate Form ============
     */
    /**
     * Validate Firstname
     */
   public function validFname($Fname)
    {
        $error ="";
        if(empty($Fname))
        {
            $error.="<p style ='color:red;'>Please enter firstname !</p>";
        }
        else{
            // check if name only contains letters and whitespace
            if(!preg_match("/^[a-zA-Z]*$/",$Fname))
            {
                $error.="<p style = 'color:red'>Only letters and white spaces allowed for firstname</p>";
            }
        }
        return $error;
    }


    /**
     * Validate Lastname
     */

   public function validLastname($Lname)
    {
        $error ="";
        if(empty($Lname))
        {
            $error.="<p style ='color:red;'>Please enter lastname !</p>";
        }
        else
        {
            // check if name only contains letters and whitespace

            if(!preg_match("/^[a-zA-Z]*$/",$Lname))
            {
                $error.="<p style = 'color:red'>Only letters and white spaces allowed for lastname</p>";
            }
        }
        return $error;
    }

    /**
     * Validate Email
     */
    public function validEmail($email)
    {
        $error ="";
        if(empty($email))
        {
            $error .= "<p style='color:red;'>Please enter email !</p>";
        }
        else
        {
            if(!filter_var($email,FILTER_VALIDATE_EMAIL))
            {
                $error .= "Invalid email ! <br />";
            }

        }
        return $error;
    }

    /**
     * Validate Message Box
     */
    public function validMessagebox($message)
    {
        $error = "";
        if (empty($message)) {
            $error .= "<p style ='color:red;'>Please enter Comment.!!</p>";
        }
        return $error;
    }
}