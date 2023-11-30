<?php
$dsn = "mysql:host=localhost;dbname=foodfindsDB";
$username = "root";
$password = "a";

try {
    $conn = new PDO($dsn, $username, $password); //connect to the database
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Set an attribute on the database handle for error exception


    $sql0 = "SELECT * FROM Recipes"; //sql Query to select entire Recipes Table
    $sql = "SELECT * FROM Recipes order by RAND() LIMIT 1"; //sql query to select a random row (recipe) from Recipes table
    
    $stmt = $conn->prepare($sql); //implement sql query to select entire Reciptes Table
    $stmt -> execute(); //execute sql query to select entire Recipes table

    $stmt -> setFetchMode(PDO::FETCH_ASSOC); //fetch method shall return each row as an array
    $resultSet = $stmt -> fetchAll(); //fetch rows from result set

    header('Content-Type: application/json'); //tells fetch response that this is a json output
    echo json_encode($resultSet); //outputs Recipes as json
}
catch (PDOException $e) {
    echo "<h1>" . $e->getMessage() . "</h1>";
}
$conn = null;
?>