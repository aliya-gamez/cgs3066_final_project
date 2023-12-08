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
            "recipe_title" => "Savory Mushroom Risotto",
            "recipe_description" => "Indulge in the creamy goodness of this classic Mushroom Risotto. Arborio rice cooked to perfection, enveloped in a rich mushroom broth, and finished with Parmesan for a truly comforting dish.",
            "recipe_ingredients" => [
                "1 1/2 cups Arborio rice",
                "4 cups chicken or vegetable broth, warmed",
                "1 cup mushrooms, sliced",
                "1/2 cup dry white wine",
                "1/2 cup grated Parmesan cheese",
                "1/4 cup unsalted butter",
                "1 onion, finely chopped",
                "2 cloves garlic, minced",
                "Salt and black pepper to taste",
                "2 tbsp olive oil",
            ],
            "recipe_instructions" => [
                "In a large pan, heat olive oil over medium heat. Add onions and garlic, sauté until translucent.",
                "Add Arborio rice and cook, stirring, until lightly toasted.",
                "Pour in the white wine and cook until mostly evaporated.",
                "Begin adding warm broth, one ladle at a time, stirring frequently. Allow the liquid to absorb before adding more. Continue until rice is creamy and cooked to al dente.",
                "In a separate pan, sauté mushrooms in butter until golden brown. Season with salt and pepper.",
                "Fold the sautéed mushrooms, Parmesan cheese, and additional butter into the risotto. Adjust seasoning to taste.",
                "Serve hot, garnished with extra Parmesan and a sprinkle of black pepper.",
            ],
            "recipe_author" => "Aliya",
            "recipe_img" => "https://bakingamoment.com/wp-content/uploads/2020/09/IMG_9193-mushroom-risotto.jpg",
        ],
        [
            "recipe_title" => "Zesty Lemon Garlic Shrimp",
            "recipe_description" => "Brighten up your dinner with this quick and easy Lemon Garlic Shrimp. Succulent shrimp, infused with zesty lemon and garlic, pan-seared to perfection for a burst of flavor in every bite.",
            "recipe_ingredients" => [
                "1 lb large shrimp, peeled and deveined",
                "3 tbsp olive oil",
                "4 cloves garlic, minced",
                "1/4 cup fresh lemon juice",
                "1 tsp lemon zest",
                "1/2 tsp red pepper flakes (optional)",
                "Salt and black pepper to taste",
                "2 tbsp fresh parsley, chopped",
            ],
            "recipe_instructions" => [
                "In a bowl, combine shrimp, olive oil, minced garlic, lemon juice, lemon zest, red pepper flakes, salt, and black pepper. Toss until shrimp are well-coated.",
                "Heat a skillet over medium-high heat. Add the marinated shrimp and cook for 2-3 minutes per side or until opaque and cooked through.",
                "Garnish with fresh parsley and serve hot over rice, pasta, or your favorite side.",
            ],
            "recipe_author" => "Aliya",
            "recipe_img" => "https://cafedelites.com/wp-content/uploads/2016/12/Lemon-Garlic-Butter-Shrimp-199.jpg",
        ],
        
        [
            "recipe_title" => "Classic Beef Lasagna",
            "recipe_description" => "Layers of cheesy goodness await in this Classic Beef Lasagna. A hearty blend of ground beef, rich tomato sauce, creamy béchamel, and lasagna noodles, baked to golden perfection.",
            "recipe_ingredients" => [
                "1 lb ground beef",
                "1 onion, finely chopped",
                "3 cloves garlic, minced",
                "2 cups tomato sauce",
                "1 cup ricotta cheese",
                "1 cup mozzarella cheese, shredded",
                "1/2 cup Parmesan cheese, grated",
                "1/4 cup fresh basil, chopped",
                "9 lasagna noodles, cooked al dente",
                "Salt and black pepper to taste",
            ],
            "recipe_instructions" => [
                "Preheat the oven to 375°F (190°C).",
                "In a skillet, brown the ground beef over medium heat. Add onions and garlic, cooking until softened.",
                "Stir in the tomato sauce and simmer for 10 minutes. Season with salt and black pepper.",
                "In a separate bowl, combine ricotta, mozzarella, Parmesan, and fresh basil.",
                "Spread a thin layer of the meat sauce in a baking dish. Place three lasagna noodles on top, followed by a layer of the cheese mixture. Repeat until all ingredients are used, finishing with a layer of meat sauce on top.",
                "Bake in the preheated oven for 25-30 minutes or until bubbly and golden brown.",
                "Let it rest for 10 minutes before slicing. Serve hot and enjoy!",
            ],
            "recipe_author" => "Aliya",
            "recipe_img" => "https://www.jocooks.com/wp-content/uploads/2019/05/beef-lasagna-1-3.jpg",
        ],
        
        [
            "recipe_title" => "Homemade Chicken Alfredo",
            "recipe_description" => "Experience the velvety delight of Homemade Chicken Alfredo. Juicy chicken breast strips, tossed with fettuccine pasta and smothered in a creamy Alfredo sauce made from scratch.",
            "recipe_ingredients" => [
                "1 lb fettuccine pasta",
                "2 boneless, skinless chicken breasts, thinly sliced",
                "1 cup heavy cream",
                "1 cup Parmesan cheese, grated",
                "1/2 cup unsalted butter",
                "3 cloves garlic, minced",
                "Salt and black pepper to taste",
                "Fresh parsley, chopped, for garnish",
            ],
            "recipe_instructions" => [
                "Cook the fettuccine pasta according to package instructions. Drain and set aside.",
                "Season the chicken breast slices with salt and black pepper.",
                "In a large skillet, melt butter over medium heat. Add minced garlic and sauté until fragrant.",
                "Add the sliced chicken and cook until browned and cooked through.",
                "Pour in the heavy cream and bring to a simmer. Stir in the grated Parmesan until the sauce is smooth and creamy.",
                "Toss in the cooked fettuccine, ensuring it is well coated in the Alfredo sauce.",
                "Garnish with chopped fresh parsley and serve hot.",
            ],
            "recipe_author" => "Aliya",
            "recipe_img" => "https://www.modernhoney.com/wp-content/uploads/2018/08/Fettuccine-Alfredo-Recipe-1.jpg",
        ],
        [
            "recipe_title" => "Vegetarian Quinoa Buddha Bowl",
            "recipe_description" => "Fuel your body with the goodness of a Vegetarian Quinoa Buddha Bowl. Nutrient-packed quinoa, vibrant vegetables, and a zesty tahini dressing come together for a wholesome and delicious meal.",
            "recipe_ingredients" => [
                "1 cup quinoa, cooked",
                "1 cup cherry tomatoes, halved",
                "1 cup cucumber, diced",
                "1 cup bell peppers, sliced",
                "1 cup chickpeas, cooked",
                "1/2 cup red onion, thinly sliced",
                "1/4 cup feta cheese, crumbled",
                "1/4 cup Kalamata olives, sliced",
                "2 tbsp olive oil",
                "2 tbsp balsamic vinegar",
                "1 tsp dried oregano",
                "Salt and black pepper to taste",
            ],
            "recipe_instructions" => [
                "In a large bowl, assemble the cooked quinoa as the base of the Buddha Bowl.",
                "Arrange cherry tomatoes, cucumber, bell peppers, chickpeas, red onion, feta cheese, and Kalamata olives on top of the quinoa.",
                "In a small bowl, whisk together olive oil, balsamic vinegar, dried oregano, salt, and black pepper to create the dressing.",
                "Drizzle the dressing over the Buddha Bowl, ensuring even coverage.",
                "Toss the ingredients gently to combine and coat them in the dressing.",
                "Serve immediately and enjoy a colorful and nutritious Vegetarian Quinoa Buddha Bowl!",
            ],
            "recipe_author" => "Aliya",
            "recipe_img" => "https://feelgoodfoodie.net/wp-content/uploads/2017/12/Quinoa-Buddha-Bowl-4.jpg",
        ],
        [
            "recipe_title" => "Refreshing Watermelon Mint Salad",
            "recipe_description" => "Beat the heat with this Refreshing Watermelon Mint Salad. Juicy watermelon cubes paired with crisp cucumber, feta cheese, and a hint of mint, creating a burst of summer flavors in every bite.",
            "recipe_ingredients" => [
                "4 cups watermelon, cubed",
                "1 cucumber, peeled and diced",
                "1/2 cup feta cheese, crumbled",
                "2 tbsp fresh mint, chopped",
                "1 tbsp extra virgin olive oil",
                "1 tbsp balsamic glaze",
                "Salt and black pepper to taste",
            ],
            "recipe_instructions" => [
                "In a large bowl, combine watermelon cubes, diced cucumber, and crumbled feta cheese.",
                "Sprinkle chopped fresh mint over the ingredients.",
                "Drizzle extra virgin olive oil and balsamic glaze over the salad.",
                "Gently toss the ingredients to ensure an even coating of the dressing.",
                "Season with salt and black pepper to taste.",
                "Chill in the refrigerator for at least 30 minutes before serving to enhance flavors.",
                "Serve the Watermelon Mint Salad in a festive bowl and enjoy the perfect blend of sweetness and freshness!",
            ],
            "recipe_author" => "Aliya",
            "recipe_img" => "https://cdn.loveandlemons.com/wp-content/uploads/2013/08/watermelon-salad.jpg",
        ],
        [
            "recipe_title" => "Spicy Thai Basil Chicken",
            "recipe_description" => "Experience the bold and aromatic flavors of Spicy Thai Basil Chicken. Tender chicken stir-fried with Thai basil, chili, and garlic, creating a mouthwatering dish thats quick and easy to prepare.",
            "recipe_ingredients" => [
                "1 lb boneless, skinless chicken thighs, thinly sliced",
                "2 cups fresh Thai basil leaves",
                "3 cloves garlic, minced",
                "2 red chili peppers, sliced",
                "1 tbsp vegetable oil",
                "2 tbsp soy sauce",
                "1 tbsp oyster sauce",
                "1 tsp fish sauce",
                "1 tsp sugar",
                "Steamed jasmine rice, for serving",
            ],
            "recipe_instructions" => [
                "In a wok or large skillet, heat vegetable oil over medium-high heat.",
                "Add minced garlic and sliced red chili peppers, stir-frying for 30 seconds until fragrant.",
                "Add thinly sliced chicken thighs and cook until browned and cooked through.",
                "In a small bowl, mix soy sauce, oyster sauce, fish sauce, and sugar. Pour the sauce over the chicken, stirring to coat evenly.",
                "Add fresh Thai basil leaves to the wok, tossing until wilted and combined with the chicken.",
                "Serve the Spicy Thai Basil Chicken over steamed jasmine rice and savor the enticing flavors of Thai cuisine!",
            ],
            "recipe_author" => "Aliya",
            "recipe_img" => "https://www.recipetineats.com/wp-content/uploads/2017/03/Thai-Chilli-Basil-Chicken-Stir-Fry.jpg",
        ],
        
        [
            "recipe_title" => "Decadent Chocolate Avocado Mousse",
            "recipe_description" => "Indulge in guilt-free luxury with this Decadent Chocolate Avocado Mousse. Creamy avocados blended with rich cocoa and sweetened with maple syrup, creating a velvety, chocolatey dessert thats as nourishing as it is delicious.",
            "recipe_ingredients" => [
                "2 ripe avocados, peeled and pitted",
                "1/2 cup cocoa powder",
                "1/2 cup almond milk",
                "1/4 cup maple syrup",
                "1 tsp vanilla extract",
                "A pinch of salt",
                "Fresh berries and mint leaves, for garnish",
            ],
            "recipe_instructions" => [
                "In a blender or food processor, combine ripe avocados, cocoa powder, almond milk, maple syrup, vanilla extract, and a pinch of salt.",
                "Blend until smooth and creamy, scraping down the sides as needed for an even consistency.",
                "Divide the chocolate avocado mousse into serving glasses or bowls.",
                "Chill in the refrigerator for at least 2 hours to enhance the mousses texture and flavor.",
                "Garnish with fresh berries and mint leaves before serving.",
                "Savor the velvety richness of this Decadent Chocolate Avocado Mousse without compromising on health!",
            ],
            "recipe_author" => "Aliya",
            "recipe_img" => "https://chocolatecoveredkatie.com/wp-content/uploads/2015/10/Chocolate-Avocado-Mousse-Recipe.jpg",
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
