<?php
$servername = "localhost";
$username = "root";
$password = "";

try
{
    //Connect to the server/host on which the database is deployed.
    $conn = new PDO("mysql:host = $servername", $username, $password);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Implement SQL statement to create database if it doesnt exist.
    $sql = "CREATE DATABASE IF NOT EXISTS foodfindsDB";
    $conn -> exec($sql);

    //sets foodfindsDB as active database
    $sql = "USE foodfindSDB";
    $conn->exec($sql);

    //Checks if Recipes exists then if not, creates it
    $tableExists = "SHOW TABLES LIKE 'Recipes'";
    $stmt = $conn->query($tableExists);
    if($stmt -> rowCount() === 0) {
        $createTable = "CREATE TABLE Recipes (
            recipe_id INT AUTO_INCREMENT PRIMARY KEY,
            recipe_title VARCHAR(255) NOT NULL,
            recipe_description VARCHAR(255) NOT NULL,
            recipe_ingredients JSON NOT NULL,
            recipe_instructions JSON NOT NULL,
            recipe_author VARCHAR(75),
            recipe_img VARCHAR(255)
        )";
        $conn -> exec($createTable);
    }
    else {
        echo "Table exists!";
    }
}
catch(PDOException $e)
{
  echo "<h1>" . $e -> getMessage() . "</h1>";
}

$conn = null;
?> 