<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "foodfindsDB";

try
{ 
    //Connect to the database.
    $conn = new PDO("mysql:host = $servername; dbname = $dbname", $username, $password);
 
    //Set an attribute on the database handle
    //The attribute ATTR_ERRMODE (for Error reporting mode of PDO) is set to a value of ERRMODE_EXCEPTION (for Throws PDOExceptions)

    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "<h1>Connected successfully!</h1>";
}
catch(PDOException $e)
{
  echo "<h1>Connection failed: " . $e -> getMessage() . "</h1>";
}
?>