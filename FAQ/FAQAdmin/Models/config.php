<?php
/**
 * Created by PhpStorm.
 * User: ran
 * Date: 3/6/2016
 * Time: 10:15 AM
 */


//DB
//define('DATA_SOURCE_NAME','mysql:host=localhost;dbname=aircmiao_yi_phpproject');
//define('DB_USERNAME','aircmiao_yi_php');
//define('DB_PASSWORD','a12345');

define('DATA_SOURCE_NAME','mysql:host=localhost;dbname=php_project');
define('DB_USERNAME','root');
define('DB_PASSWORD','');

//Router
define('DEFAULT_ROUTE','FAQAdminController/index');
define('DEFAULT_NAMESPACE',"Project\\FAQ\\FAQAdmin\\Controllers\\");

//UpLoadFile path
define('DEFAULT_FILE_PATH',$_SERVER['DOCUMENT_ROOT'] ."/FAQ/files/faq/");
define('ADMIN_FILE_PATH', $_SERVER['DOCUMENT_ROOT'] ."/FAQ/FAQAdmin/index.php");
?>