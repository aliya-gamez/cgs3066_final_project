<?php
$dsn = "mysql:host=localhost;dbname=foodfindsDB";
$username = "root";
$password = "";

try {
    //connect to the database
    $conn = new PDO($dsn, $username, $password);

    //Set an attribute on the database handle.
    //The attribute ATTR_ERRMODE (for Error reporting mode of PDO) is set to a value of ERRMODE_EXCEPTION (for Throws PDOExceptions).
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Check if the HTML form was sent with the POST method
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //simple text VARCHAR to variables
        $title = $_POST["recipe_title"];
        $description = $_POST["recipe_description"];
        $author = $_POST["recipe_author"];
        $img = $_POST["recipe_img"];
        //Convert ingredient/insturciton textarea to array, and trima way whitespace
        $ingredientsArray = array_map('trim', explode("\n", $_POST["recipe_ingredients"]));
        $instructionsArray = array_map('trim', explode("\n", $_POST["recipe_instructions"]));
        //Makes
        $ingredients = json_encode($ingredientsArray);
        $instructions = json_encode($instructionsArray);

        //insert these variables into a variable to be executed immediately after
        $sql = "INSERT INTO Recipes (recipe_title, recipe_description, recipe_ingredients, recipe_instructions, recipe_author, recipe_img) 
                VALUES ('$title', '$description', '$ingredients', '$instructions', '$author', '$img')";

        // Execute the SQL query.
        $conn->exec($sql);

        // Display success message.
        echo "<h1>Recipe added successfully!</h1>";
    }
} catch (PDOException $e) {
    echo "<h1>" . $e->getMessage() . "</h1>";
}

$conn = null;
?>