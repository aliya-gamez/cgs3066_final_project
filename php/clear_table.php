<?php
$dsn = "mysql:host=localhost;dbname=foodfindsDB";
$username = "root";
$password = "";

try
{
    //Connect to the database.
    $conn = new PDO($dsn, $username, $password);
    //Error handler ya
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Checks if Recipes exists then deletes it
    $tableExists = "SHOW TABLES LIKE 'Recipes'";
    $stmt = $conn->query($tableExists);
    if ($stmt->rowCount() > 0) {
        $deleteTable = "DROP TABLE Recipes";
        $conn->exec($deleteTable);
    }
    
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
        $conn->exec($createTable);
    }
    
    header("Location: ../index.html");
    exit();
}
catch(PDOException $e)
{
    echo $e;
}

$conn = null;
?>