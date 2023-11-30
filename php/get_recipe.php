<?php
$dsn = "mysql:host=localhost;dbname=foodfindsDB";
$username = "root";
$password = "2";

try {
    //connect to the database
    $conn = new PDO($dsn, $username, $password);
    //Set an attribute on the database handle for error exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $sql = "SELECT * FROM Recipes"; //sql Query to select entire Recipes Table
    $stmt = $conn->prepare($sql); //implement sql query to select entire Reciptes Table
    $stmt = execute() //execute sql query to select entire Recipes table
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "<h1>" . $e->getMessage() . "</h1>";
}

$conn = null;
?>