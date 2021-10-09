<?php
require_once 'config.php';

/*
 * Table Creation | Site  https://codematra.com/
 */
create_contact_table();   

/*
 * Create Registration Table | Site  https://codematra.com/
 */
function create_contact_table() { 
  global $connection; 
  
  $sql = "SELECT * FROM contacts";  
  $result = mysqli_query($connection, $sql);
  if(!$result) {
    $sql = "CREATE TABLE contacts (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    registration_id VARCHAR(30) NOT NULL, 
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    phone VARCHAR(50),
    address VARCHAR(1000),
    password VARCHAR(50),
    status VARCHAR(50),
    activation_key VARCHAR(50), 
    reg_date TIMESTAMP 
    )";

    mysqli_query($connection, $sql);   
  }
}

/*
 * Function For Retrive All Contacts Information | Site  https://codematra.com/
 */
function get_contacts() {
  global $connection; 
  $rows = array();
  
  $sql = 'SELECT * FROM contacts';
  $result = mysqli_query($connection, $sql); 
  
  if($result) {
    $num_rows = mysqli_num_rows($result);
    if($num_rows>0) {
      for($r=1;$r<=$num_rows;$r++) {
        $row = mysqli_fetch_assoc($result);
        $rows[] = $row;
      }
    }
  }
  
  return $rows; 
}

/*
 * Get Contact By ID | Site  https://codematra.com/
 */
function get_contact_by_id($contact_id){
  global $connection; 
 
  $sql = "SELECT name, email, phone, address FROM contacts WHERE id='$contact_id'";  
  $result = mysqli_query($connection, $sql); 
  
  if($result) {
    $row = mysqli_fetch_assoc($result);
  }
  
  return $row; 
}

/*
 * Delete Contact | Site  https://codematra.com/
 */
function delete_contact($contact_id) {
  global $connection; 
  $output = 0; 
  if($contact_id) {
    $sql = "DELETE FROM contacts WHERE id='$contact_id'";       
    $result = mysqli_query($connection, $sql);
    
    if($result) {
        $output = $result;  
    } 
  } 
  return $output;
}

/*
 * Delete All Contact | Site  https://codematra.com/
 */
function delete_contacts() {
  global $connection; 
 
  $sql = "DELETE FROM contacts";       
  $result = mysqli_query($connection, $sql);
  
  if($result) {
      $output = $result;  
  } 
  return $output;
}

/*
 * Drop Table | Site  https://codematra.com/
 */
function drop_table($table_name) { 
     
  global $connection;
  $output = 0;  
    
  if($table_name!='') {
    $sql = "DROP TABLE $table_name";
    $result = mysqli_query($connection, $sql); 

    if($result) {
      // Return 1 if dropped table. 
      $output = $result;
    } 
  }
     
  return $output; 
}