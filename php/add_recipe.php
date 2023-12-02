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
        //Convert ingredient/instruction textarea to array, and trim away whitespace
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

        // Get the ID of the last inserted recipe
        $recipeId = $conn->lastInsertId();

        // Generate HTML content for the recipe
        $htmlContent = "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Recipe - $title</title>
            <!-- Additional head elements as needed -->
        </head>
        <body>
            <header>
                <!-- Your header content -->
            </header>
            <main>
                <section class='recipe-details'>
                    <h1>$title</h1>
                    <p>$description</p>
                    <img src='$img' alt='$title Image'> <!-- Add this line for the image -->
                    <h2>Ingredients</h2>
                    <ul>";

        // Loop through ingredients and add them to the HTML content.
        foreach ($ingredientsArray as $ingredient) {
            $htmlContent .= "<li>$ingredient</li>";
        }
        $htmlContent .= "
                    </ul>
                    <h2>Instructions</h2>
                    <ol>";
        //Loop through instructions and add them to the HTML content.
        foreach ($instructionsArray as $instruction) {
            $htmlContent .= "<li>$instruction</li>";
        }
        $htmlContent .= "
                    </ol>
                    <!-- Add more details as needed -->
                </section>
            </main>
            <footer>
                <p>&copy; 2023 - $author </p>
            </footer>
        </body>
        </html>
        ";

        // Define the file path where you want to save the HTML file
        $filePath = "../recipes/{$recipeId}.html";

        // Save the HTML content to the file
        file_put_contents($filePath, $htmlContent);

        // Display success message.
        //echo "<h1>Recipe added successfully!</h1>";
        header("Location: ../index.html");
        exit();
    }
} catch (PDOException $e) {
    echo "<h1>" . $e->getMessage() . "</h1>";
}

$conn = null;
?>
