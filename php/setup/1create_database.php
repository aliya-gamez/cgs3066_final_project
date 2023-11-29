<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  //Connect to the server/host on which the database is deployed.
  $conn = new PDO("mysql:host = $servername", $username, $password);
 
  //Set an attribute on the database handle
  //The attribute ATTR_ERRMODE (for Error reporting mode of PDO) is set to a value of ERRMODE_EXCEPTION (for Throws PDOExceptions).
  $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  //Deletes Database if needed
  /*
  $exists = "IF DB_ID('foodfindsDB') IS NOT NULL";
  if ($exists) {
    echo "<h1>Database foodfindsDB found, deleting.</h1>";
    $sql1 = "DROP DATABASE foodfindsDB"; //deletes database if found
    $conn -> exec($sql1);
  }
  else {
    echo "<h1>Database foodfindsDB not found.</h1>";
  }
  */

  //Implement SQL statement to create database.
  $sql = "CREATE DATABASE foodfindsDB";

  //Execute SQL statement to create database; use exec() because no results are returned.
  $conn -> exec($sql);

  echo "<h1>Database foodfindsDB created successfully!</h1>";
} 
catch(PDOException $e) {
  echo "<h1>" . $e -> getMessage() . "</h1>";
}

$conn = null;
?> 