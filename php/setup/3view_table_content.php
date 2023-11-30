<?php
$dsn = "mysql:host=localhost;dbname=foodfindsDB";
$username = "root";
$password = "";

try {
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM Recipes";
    
    $stmt = $conn->query($sql);
    
    $recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // PRINT
    echo "<h1>Recipes</h1>";
    echo "<ul>";
    foreach ($recipes as $recipe) {
        echo "<li>";
        echo "<strong>Title:</strong>" . $recipe['recipe_title'] . "<br>"; //Title
        echo "<strong>Description:</strong> " . $recipe['recipe_description'] . "<br>"; //Desc
        $ingredientsList = json_decode($recipe['recipe_ingredients']); //Ingredients
        echo "<strong>Ingredients:</strong><ul>";
        foreach ($ingredientsList as $ingredient) {
            echo "<li>$ingredient</li>";
        }
        echo "</ul>";
        $instructionsList = json_decode($recipe['recipe_instructions']); //Instructions
        echo "<strong>Instructions:</strong><ol>";
        foreach ($instructionsList as $instruction) {
            echo "<li>$instruction</li>";
        }
        echo "</ol>";
        echo "<strong>Author:</strong> " . $recipe['recipe_author'] . "<br>"; //Author
        echo "<strong>Image:</strong><img src='" . $recipe['recipe_img'] . "'width='200'><br>"; //Image
        echo "</li><br>";
    }
    echo "</ul>";

} catch (PDOException $e) {
    // Handle any exceptions (errors) that may occur during the process.
    echo "<h1>" . $e->getMessage() . "</h1>";
}

// Close the database connection.
$conn = null;
?>
