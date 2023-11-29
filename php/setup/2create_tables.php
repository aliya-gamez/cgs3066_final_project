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

    //Implement SQL statements to create various tables in database.
    /*
    Example Input:
    StudentID VARCHAR(8) PRIMARY KEY,
    FirstName VARCHAR(20),
    LastName VARCHAR(20),
    HoursEnrolled INT(2),
    GPA DOUBLE(4, 2),
    Major VARCHAR(20),
    DOG Date
    */
    
    $createTable = "CREATE TABLE Recipes (
        recipe_id INT AUTO_INCREMENT PRIMARY KEY,
        recipe_title VARCHAR(255) NOT NULL,
        recipe_desc VARCHAR(255) NOT NULL,
        recipe_ingredients JSON NOT NULL,
        recipe_instructions JSON NOT NULL,
        recipe_author VARCHAR(75),
        recipe_img VARCHAR(255),
        recipe_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    //DELETES RECIPE TABLE
    $deleteTable = "DROP TABLE Recipes";
    $conn -> exec($deleteTable);
    echo "<h1>Table Recipes deleted successfully!</h1>"; 

    $showTables = "SHOW TABLES FROM foodfindsDB";

    //CREATES RECIPE TABLE
    $conn -> exec($recipeTable);
    echo "<h1>Table Recipes created successfully!</h1>";
    echo exec($showTables);
}
catch(PDOException $e)
{
    echo "<h1>" . $e -> getMessage() . "</h1>";
}

$conn = null;
?>