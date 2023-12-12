<?php
$dsn = "mysql:host=localhost;dbname=foodfindsDB";
$username = "root";
$password = "";

try {
    // Connect to the database.
    $conn = new PDO($dsn, $username, $password);
    // Error handler
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Retrieve recipe ID from POST data
    $recipeId = $_POST['recipe_id'];

    // Check if Recipes table exists
    $tableExists = "SHOW TABLES LIKE 'Recipes'";
    $stmt = $conn->query($tableExists);
    if ($stmt->rowCount() > 0) {
        // Delete the recipe from the database
        $deleteRecipe = "DELETE FROM Recipes WHERE recipe_id = :recipe_id";
        $stmt = $conn->prepare($deleteRecipe);
        $stmt->bindParam(':recipe_id', $recipeId, PDO::PARAM_INT);
        $stmt->execute();

        // Deleting the corresponding HTML file
        $recipeFile = "../recipes/{$recipeId}.html";
        if (file_exists($recipeFile)) {
            unlink($recipeFile);
        }
    }

    header("Location: ../index.html");
    exit();
} catch (PDOException $e) {
    echo $e;
}

$conn = null;
?>
