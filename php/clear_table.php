<?php
$dsn = "mysql:host=localhost;dbname=foodfindsDB";
$username = "root";
$password = "";

try
{
    //Connect to the database.
    $conn = new PDO($dsn, $username, $password);

    //Set an attribute on the database handle.
    //The attribute ATTR_ERRMODE (for Error reporting mode of PDO) is set to a value of ERRMODE_EXCEPTION (for Throws PDOExceptions).
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $createTable = "CREATE TABLE Recipes (
        recipe_id INT AUTO_INCREMENT PRIMARY KEY,
        recipe_title VARCHAR(255) NOT NULL,
        recipe_description VARCHAR(255) NOT NULL,
        recipe_ingredients JSON NOT NULL,
        recipe_instructions JSON NOT NULL,
        recipe_author VARCHAR(75),
        recipe_img VARCHAR(255)
    )";

    //DELETES RECIPE TABLE
    $deleteTable = "DROP TABLE IF EXISTS Recipes";
    $conn -> exec($deleteTable);
    echo "<h1>Table Recipes deleted successfully!</h1>";//*/

    //CREATES RECIPE TABLE
    $conn -> exec($createTable);
    header("Location: ../index.html");
    exit();
}
catch(PDOException $e)
{
    echo "<h1>" . $e -> getMessage() . "</h1>";
}

$conn = null;
?>