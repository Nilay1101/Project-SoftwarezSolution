<?php
ob_start();
session_start();

//set timezone
date_default_timezone_set('Europe/London');

//database credentials
define('DBHOST','softwarezsolution.com.mysql');
define('DBUSER','softwarezsoluti');
define('DBPASS','urnYpYyf');
define('DBNAME','softwarezsoluti');

//application address
define('DIR','http://app.naipathya.in/login/');
define('SITEEMAIL','app@naipathya.in');

try {

	//create PDO connection 
	$db = new PDO("mysql:host=".DBHOST.";port=3306;dbname=".DBNAME, DBUSER, DBPASS);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
	//show error
    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
    exit;
}

//include the user class, pass in the database connection
include('classes/user.php');
$user = new User($db); 
?>