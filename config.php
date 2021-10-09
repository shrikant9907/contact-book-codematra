<?php
/*
* Global Variable - Connection | Site  https://codematra.com/
*/
global $connection;  

/*
* Required Variable | Site  https://codematra.com/
*/
$hostname = 'localhost';
$dbusername = 'root'; 
$dbpassword = ''; 
$databasename = 'contactbook'; 

/*
* Connect With Server | Site  https://codematra.com/
*/
$connection = mysqli_connect($hostname,$dbusername,$dbpassword);
if(!$connection) {
  die('Error in connect with server');   
}  

/*
* Create Database | Site  https://codematra.com/
*/
$sql = "CREATE DATABASE IF NOT EXISTS $databasename"; 
$output = mysqli_query($connection, $sql); 
if(!$output) {
  die('Error in database creation. ');
}
 
/*
*  Connect with database | Site  https://codematra.com/
*/
$database = mysqli_select_db($connection, $databasename);  
if(!$database) {
  die('Error in connect with database');
}

/*
* Drop Database | Site  https://codematra.com/
*/
//$sql = "DROP DATABASE $databasename";
//$output = mysqli_query($connection, $sql); 
//if($output) {
//    die("Database Deleted.<br />");  
//} 