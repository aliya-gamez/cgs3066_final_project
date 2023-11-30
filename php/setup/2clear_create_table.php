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
        recipe_description VARCHAR(255) NOT NULL,
        recipe_ingredients JSON NOT NULL,
        recipe_instructions JSON NOT NULL,
        recipe_author VARCHAR(75),
        recipe_img VARCHAR(255)
    )";

    /*DELETES RECIPE TABLE
    $deleteTable = "DROP TABLE IF EXISTS Recipes";
    $conn -> exec($deleteTable);
    echo "<h1>Table Recipes deleted successfully!</h1>";*/

    //CREATES RECIPE TABLE
    $conn -> exec($createTable);
    echo "<h1>Table Recipes created successfully!</h1>";

    //SHOW RECIPE TABLE
    $showTables = "SHOW TABLES FROM foodfindsDB";
    $tables = $conn -> query($showTables);
    echo "<h2>Tables in the Database:</h2>";
    echo "<ul>";
    foreach ($tables as $table) {
        echo "<li>" . $table[0] . "</li>";
    }
    echo "</ul>";

    // SHOW RECIPE TABLE FIELDS
    $showFields = "SHOW COLUMNS FROM Recipes";
    $fields = $conn->query($showFields);

    echo "<h2>Fields in the Recipes Table:</h2>";
    echo "<ul>";
    foreach ($fields as $field) {
        echo "<li>" . $field['Field'] . " (" . $field['Type'] . ")</li>";
    }
    echo "</ul>";
}
catch(PDOException $e)
{
    echo "<h1>" . $e -> getMessage() . "</h1>";
}

$conn = null;
?>