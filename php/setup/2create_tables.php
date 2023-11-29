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
    
    $recipeTable = "CREATE TABLE Recipes (
        recipe_id INT AUTO_INCREMENT PRIMARY KEY
        title VARCHAR(255) NOT NULL,
        ingredients JSON NOT NULL,
        instructions JSON NOT NULL,
        author VARCHAR(75),
        img_url VARCHAR(255),
        uploaded_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    //DELETES TABLE
    $deleteTable = "DROP TABLE Recipes";
    $conn -> exec($deleteTable);
    echo "<h1>Table Recipes deleted successfully!</h1>";

    $showTables = "SHOW TABLES FROM foodfindsDB";

    //Execute SQL statements to create various tables in database; use exec() because no results are returned.

    
    $conn -> exec($recipeTable);
    echo "<h1>Table Recipes created successfully!</h1>";
    echo $showTables;
}
catch(PDOException $e)
{
    echo "<h1>" . $e -> getMessage() . "</h1>";
}

$conn = null;
?>