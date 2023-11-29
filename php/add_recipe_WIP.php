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
        $title = $_POST["recipe_title"];
        $description = $_POST["recipe_description"];
        $ingredients = json_encode(explode("\n", $_POST["recipe_ingredients"]));
        $instructions = json_encode(explode("\n", $_POST["recipe_instructions"]));
        $author = $_POST["recipe_author"];
        $img = "path_to_uploaded_image";  //cannot upload images, need to figure out alternative

        $sql = "INSERT INTO Recipes (recipe_title, recipe_description, recipe_ingredients, recipe_instructions, recipe_author, recipe_img) 
                VALUES (:title, :description, :ingredients, :instructions, :author, :img)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':ingredients', $ingredients);
        $stmt->bindParam(':instructions', $instructions);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':img', $img);

        $stmt->execute();

        echo "<h1>Recipe added successfully!</h1>";
    }
} catch (PDOException $e) {
    echo "<h1>" . $e->getMessage() . "</h1>";
}

$conn = null;
?>