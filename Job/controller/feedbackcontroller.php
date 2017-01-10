<?php

/**
<?php

/**
 *
 */
class feedback{

    public function index(){

        if(isset($_POST['send'])){
            $username1 = $_POST['UserName1'];
            $phone = $_POST['Phone'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $message = $_POST['message'];
// Validate inputs\
            //var_dump($_POST);

            if (empty($username1) || empty($phone) || empty($email)|| empty($address)|| empty($message) ) {
                $error = "Invalid data. Check all fields and try again.";
            } else {
                require_once('conn.php');
                $query = "INSERT INTO feedback (username, phone, email,address,message) VALUES ('$username1', '$phone', '$email', '$address','$message')";
                $db->exec($query);
                echo 'Seccesful';

            }
        }




    }

    public function __construct() {

    }
    public function updatejob($id, $username, $phone, $email, $address,$message){

        $db = Dbclass::getDB();
        $query = "UPDATE feedback
                    SET username = :cat,
                    phone = :code,
                    email = :name,
                    address = :job,
                    message=:msg
                      WHERE ID = :id ";
        $stm = $db->prepare($query);
        $stm->bindParam(':id', $id);
        $stm->bindParam(':cat', $username, PDO::PARAM_STR, 50);
        $stm->bindParam(':code', $phone, PDO::PARAM_STR, 50);
        $stm->bindParam(':name', $email, PDO::PARAM_STR, 50);
        $stm->bindParam(':job', $address, PDO::PARAM_INT);
        $stm->bindParam(':msg', $message, PDO::PARAM_STR, 200);
        $count = $stm->execute();


        return "Updated rows: " . $count;

    }



}

?>