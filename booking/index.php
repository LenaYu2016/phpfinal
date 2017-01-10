<?php
/**
 * Created by PhpStorm.
 * User: ran
 * Date: 3/6/2016
 * Time: 11:14 PM
 */


//Model
require_once"./Model/TopRateModel.php";
require_once"./Model/FilmBookingModel.php";
require_once"./Model/ShoppingCart.php";
require_once"./Model/OrderModel.php";
//Libs
require_once"./libs/Router.php";
require_once"./libs/PDOOperation.php";
require_once"./libs/FileOperation.php";
require_once"./libs/Session.php";
require_once"./libs/Validation.php";

//config file
require_once"./config.php";

require_once '../autoloader.php';
//Use Router
session_start();



$app = new Router();
//\Project\Auth\AuthModel::getUser()

//DB INIT

//$db = new PDOOperation(DATA_SOURCE_NAME,DB_USERNAME,DB_PASSWORD);
//$result = $db->query("SELECT * FROM films WHERE Film_Id= :Film_Id;",$para = ["Film_Id"=>1]);
//
//var_dump($result->rows);
////var_dump($result->num_rows);
////insert
//
//$db->execute("INSERT INTO `customer`(username,password) VALUES (:username, :password);",
//    $para = ["username"=>'wangran1', "password"=>'wangran3']);

// get all the runningfilms
//SELECT DISTINCT(running_films.Film_Id),`Film_Time`,`Film_Name`,`Film_Director`,`Film_Actor`,`Film_Intro`,`Film_pic`,`Film_length`,`Price_Full`,running_films.Avaliable, `film_description`FROM `films`JOIN running_films ON films.Film_Id = running_films.Film_Id

//get running films by id
//SELECT DISTINCT(running_films.Film_Id),`Film_Time`,`Film_Name`,`Film_Director`,`Film_Actor`,`Film_Intro`,`Film_pic`,`Film_length`,`Price_Full`,running_films.Avaliable, `film_description`FROM `films`JOIN running_films ON films.Film_Id = running_films.Film_Id WHERE running_films.Film_Id=1;

//SELECT running_films.Film_Id, Price_Full, Room_ID, DATE_FORMAT(Run_Time, '%H:%i') FROM films JOIN running_films ON films.Film_Id = running_films.Film_Id JOIN rooms ON running_films.Room_ID = rooms.Room_ID WHERE running_films.Film_Id=2;

//SELECT running_films.Film_Id, Price_Full, running_films.Room_ID, DATE_FORMAT(Run_Time, '%H:%i') as Run_Time,DATE_FORMAT(Run_Time, '%W %M %Y') as Run_Date, cinemas.Cinema_Name, cinemas.Cinema_Address FROM films JOIN running_films ON films.Film_Id = running_films.Film_Id JOIN rooms ON running_films.Room_ID = rooms.Room_ID JOIN cinemas ON cinemas.Cinema_ID = rooms.Cinema_ID WHERE running_films.Film_Id=2