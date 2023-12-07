<?php
$dsn = "mysql:host=localhost;dbname=foodfindsDB";
$username = "root";
$password = "";

try {
    //CONNECTION
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Associative Array with Recipes table column and data
    $recipes = [
        [
            "recipe_title" => "Crispy Carnitas",
            "recipe_description" => "Every tortilla dreams of being stuffed with Carnitas. Picture seasoned pork slow-cooked into tender submission, gently shredded and pan-fried to golden, crispy perfection.",
            "recipe_ingredients" => [
                "2 kg / 4 lb pork shoulder",
                "2 1/2 tsp salt",
                "1 tsp black pepper",
                "1 onion, chopped",
                "1 jalapeno, deseeded, chopped",
                "4 cloves garlic, minced",
                "3/4 cup juice from orange (2 oranges)",
                "1 tbsp dried oregano",
                "2 tsp ground cumin",
                "1 tbsp olive oil",
            ],
            "recipe_instructions" => [
                "Rinse and dry the pork shoulder, rub all over with salt and pepper.",
                "Combine the Rub ingredients then rub all over the pork.",
                "Place the pork in a slow cooker (fat cap up), top with the onion, jalapeño, minced garlic (don’t worry about spreading it) and squeeze over the juice of the oranges.",
                "Slow Cook on low for 10 hours or on high for 7 hours. (Note 2 for other cook methods)",
                "Pork should be tender enough to shred. Remove from slow cooker and let cool slightly. Then shred using two forks.",
                "Optional: Skim off the fat from the juices remaining in the slow cooker and discard.",
                "If you have a lot more than 2 cups of juice, then reduce it down to about 2 cups. The liquid will be salty, it is the seasoning for the pork. Set liquid aside – don’t bother straining onion etc, it’s super soft.",
                "Heat 1 tbsp of oil in a large non stick pan or well-seasoned skillet over high heat. Spread pork in the pan, drizzle over some juices. Wait until the juices evaporate and the bottom side is golden brown and crusty. Turn and just briefly sear the other side – you don’t want to make it brown all over because then it’s too crispy, need tender juicy bits.",
                "Remove pork from skillet. Repeat in batches (takes me 4 batches) – don’t crowd the pan.",
                "Just before serving, drizzle over more juices and serve hot, stuffed in tacos (see notes for sides, other serving suggestion and storage/make ahead).",
            ],
            "recipe_author" => "Aliya",
            "recipe_img" => "https://www.recipetineats.com/wp-content/uploads/2018/05/Pork-Carnitas_v2_8.jpg",
        ],
        [
            "recipe_title" => "The BEST Margarita!",
            "recipe_description" => "All you need are 3 ingredients to make my favorite margarita recipe! Instructions included for how to make a single serving margarita or pitcher margaritas for a crowd.",
            "recipe_ingredients" => [
                "1 1/2 ounces silver tequila",
                "1 ounce orange liqueur",
                "3/4 ounce freshly-squeezed lime juice",
                "optional sweetener: agave nectar or simple syrup, to taste",
                "ice",
                "lime wedge and coarse salt for rimming the glass",
            ],
            "recipe_instructions" => [
                "Salt the rim (optional). Run a lime wedge (the juicy part) around the top rim of your serving glass. Fill a shallow bowl or plate with salt, then dip the rim until it is covered with your desired amount of salt. Set aside.",
                "Make the margarita mix. Add tequila, orange liqueur, lime juice and a few ice cubes to a cocktail shaker. Cover and shake vigorously for about 10 seconds. Give the mix a taste and stir in a teaspoon or two of sweetener if desired.",
                "Serve. Fill the prepared serving glass with ice. Strain in the margarita mix, garnish with a lime slice, serve and enjoy. Cheers!",
            ],
            "recipe_author" => "Aliya",
            "recipe_img" => "https://www.gimmesomeoven.com/wp-content/uploads/2015/05/Classic-Margarita-Recipe-with-Text-1.jpg",
        ],
    ];

    foreach ($recipes as $recipe) {
        $title = $recipe["recipe_title"];
        $description = $recipe["recipe_description"];
        $author = $recipe["recipe_author"];
        $img = $recipe["recipe_img"];
        //Turn Ingredients and Instructions into JSON to be inserted into SQL
        $ingredientsArray = $recipe["recipe_ingredients"];
        $instructionsArray = $recipe["recipe_instructions"];
        $ingredients = json_encode($ingredientsArray);
        $instructions = json_encode($instructionsArray);

        //Prepare SQL to insert into table
        $sql = "INSERT INTO Recipes (recipe_title, recipe_description, recipe_ingredients, recipe_instructions, recipe_author, recipe_img) 
                VALUES ('$title', '$description', '$ingredients', '$instructions', '$author', '$img')";

        //Execute SQL
        $conn->exec($sql);

        //NOW CREATE THE WEBPAGE
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
            <link rel='stylesheet' type='text/css' href='../css/styles.css'>
            <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200'/>
        </head>
        <body>
            <header>
                <!-- Your header content -->
                <nav>
                    <ul style='float: left;'>
                        <li><a id='logo' href='../index.html'><img src='../img/logo_food.png'>foodfinds</a></li>
                        <li><a href='../index.html'>Home</a></li>
                        <li><a href='../about.html'>About Us</a></li>
                    </ul>
                    <ul class='right'>
                        <li><a href='../add_recipe.html'><span class='material-symbols-outlined'>menu_book</span>Add Recipe</a></li>
                    </ul>
                </nav>
            </header>
            <main>
                <section class='view-recipe'>
                <div class='recipe-details'>
                    <h1>$title</h1>
                    <p>$description</p>
                    <!--<img src='$img' alt='$title Image'> Add this line for the image -->
                    <div class='recipe-img' style='background-image: url($img);'></div>
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
                </div>
                </section>
            </main>
            <footer>
                <p>&copy; 2023 - $author </p>
            </footer>
            <script type='text/javascript' src='../js/scripts.js' defer></script>
        </body>
        </html>
        ";

        // Define the file path where you want to save the HTML file
        $filePath = "../recipes/{$recipeId}.html";

        // Save the HTML content to the file
        file_put_contents($filePath, $htmlContent);
    }

    header("Location: ../index.html");
    exit();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
