//Initialize Database
async function initDatabase() {
    console.log("initDatabase() running...");
    try {
        let response = await fetch('php/database_init.php');
    }
    catch (e) {
        console.log("Cant initialize database: ", e);
    }
}

//Get recipes table data and input on front-end
async function getRecipes() {
    console.log("getRecipes() running...");
    //error handling in case fetch doesnt go thru
    try {
        //fetch request and handling?
        let response = await fetch('php/get_recipes.php'); //response variabe for a fetch request, which is fetched from get_recipes.php
        let json = await response.json(); //parse response as a json file, which it is
        let recipeListID = document.getElementById("recipe-list"); //recipe list class container
        let recipeListStorage = document.createDocumentFragment();
        recipeListID.innerHTML = `<!--Database Entry Start-->`;

        json.forEach(recipe => {
            let recipeCard = document.createElement("div"); //create recipeCard div
            recipeCard.className = "recipe"; //assign class recipe (has styling that makes it a card)
            recipeCard.innerHTML = `
                <a href="recipes/${recipe.recipe_id}.html">
                    <div class="recipe-img" style="background-image: url(${recipe.recipe_img});"></div>
                    <div class="recipe-text">
                        <h2 class="title">${recipe.recipe_title}</h2>
                        <p class="description">${recipe.recipe_description}</p>
                        <p class="author">Author: ${recipe.recipe_author}</p>
                    </div>
                </a>
                <p>
                    <form method="POST" action="php/delete_recipe.php">
                        <input type="hidden" name="recipe_id" value="${recipe.recipe_id}">
                        <input type="submit" value="Delete Recipe" id="delete-btn" name="delete-btn">
                    </form>
                </p>
                `;
            recipeListStorage.appendChild(recipeCard);
        });
        recipeListID.appendChild(recipeListStorage);
    }
    catch(error) {
        console.log("Couldn't get recipes: ", error);
    }
}



//Get random recipe from table data and input on front-end hero banner
async function getRandomRecipe() {
    console.log("getRandomRecipe() running...");
    //error handling in case fetch doesnt go thru
    try {
        //fetch request and handling?
        let response = await fetch('php/get_random_recipe.php'); //response variabe for a fetch request, which is fetched from get_recipes.php
        let json = await response.json(); //parse response as a json file, which it is
        let featuredRecipeID = document.getElementById("featured-recipe"); //recipe list class container
        featuredRecipeID.innerHTML = `<!--Database Entry Start-->`;

        if(json.length > 0) {
            let recipe = json[0];
            featuredRecipeID.innerHTML += `
            <div class="recipe-img" style="background-image: url(${recipe.recipe_img});"></div>
            <div class="recipe-text-box">
                <div class="recipe-text">
                    <h2 class="title">${recipe.recipe_title}</h2>
                    <p class="description">${recipe.recipe_description}</p>
                    <button id="featured-recipe-btn">Go to Recipe</button>
                </div>
            </div>
            `;  
            //Makes Featured Recipe Button A Link to Recipe
            let featuredRecipeBtn = document.getElementById("featured-recipe-btn");
            featuredRecipeBtn.addEventListener("click", function() {
                window.location.href = `recipes/${recipe.recipe_id}.html`;
            }); 
            console.log(`${recipe.recipe_title}`); 
        }
    }
    catch(error) {
        console.log("Couldn't get random recipes: ", error);
    }
}

//Form Validation for add_recipe.php form
function validateForm() {
    //Get values from form
    let title = document.getElementById("recipe_title").value;
    let description = document.getElementById("recipe_description").value;
    let ingredients = document.getElementById("recipe_ingredients").value;
    let instructions = document.getElementById("recipe_instructions").value;
    let author = document.getElementById("recipe_author").value;
    let image = document.getElementById("recipe_img").value;
    //Get input boxes from form
    let titleBox = document.getElementById("recipe_title");
    let descriptionBox = document.getElementById("recipe_description");
    let ingredientsBox = document.getElementById("recipe_ingredients");
    let instructionsBox = document.getElementById("recipe_instructions");
    let authorBox = document.getElementById("recipe_author");
    let imageBox = document.getElementById("recipe_img");
    let validationIsSuccessful = true;

    let outputResult = "";
    let outputContainer = document.getElementById("validation-output-container");

    //Title Validation
    if(title === "") {
        outputResult += "<p>Title cannot be empty.</p>";
        validationIsSuccessful = false;
        titleBox.style.border = "1px solid red";
        titleBox.style.backgroundColor = "#FFF2F2";
    }
    else if(title.length > 45) {
        outputResult += "<p>Title cannot be more than 75 characters.</p>";
        validationIsSuccessful = false;
        titleBox.style.border = "1px solid red";
        titleBox.style.backgroundColor = "#FFF2F2";
    }
    else {
        titleBox.style.border = "1px solid #ccc";
        titleBox.style.backgroundColor = "#fff";
    }

    //Description Validation
    if(description === "") {
        outputResult += "<p>Description cannot be empty.</p>";
        validationIsSuccessful = false;
        descriptionBox.style.border = "1px solid red";
        descriptionBox.style.backgroundColor = "#FFF2F2";
    }
    else if(description.length > 255) {
        outputResult += "<p>Description cannot be more than 255 characters.</p>";
        validationIsSuccessful = false;
        descriptionBox.style.border = "1px solid red";
        descriptionBox.style.backgroundColor = "#FFF2F2";
    }
    else {
        descriptionBox.style.border = "1px solid #ccc";
        descriptionBox.style.backgroundColor = "#fff";
    }

    //Ingreidents & Instructions Validation
    if(ingredients === "") {
        outputResult += "<p>Ingredients cannot be empty.</p>";
        validationIsSuccessful = false;
        ingredientsBox.style.border = "1px solid red";
        ingredientsBox.style.backgroundColor = "#FFF2F2";
    }
    else if (ingredients.includes("'") || ingredients.includes('"')) {
        outputResult += "<p>Ingredients cannot contain single or double quotes.</p>";
        validationIsSuccessful = false;
        ingredientsBox.style.border = "1px solid red";
        ingredientsBox.style.backgroundColor = "#FFF2F2";
    }
    else {
        ingredientsBox.style.border = "1px solid #ccc";
        ingredientsBox.style.backgroundColor = "#fff";
    }

    //Instructions Validation
    if(instructions === "") {
        outputResult += "<p>Instructions cannot be empty.</p>";
        validationIsSuccessful = false;
        instructionsBox.style.border = "1px solid red";
        instructionsBox.style.backgroundColor = "#FFF2F2";
    }
    else if(instructions.includes("'") || instructions.includes('"')) {
        outputResult += "<p>Instructions cannot contain single or double quotes.</p>";
        validationIsSuccessful = false;
        instructionsBox.style.border = "1px solid red";
        instructionsBox.style.backgroundColor = "#FFF2F2";
    } else {
        instructionsBox.style.border = "1px solid #ccc";
        instructionsBox.style.backgroundColor = "#fff";
    }

    //Author Validation
    if(author === "") {
        outputResult += "<p>Author cannot be empty.</p>";
        validationIsSuccessful = false;
        authorBox.style.border = "1px solid red";
        authorBox.style.backgroundColor = "#FFF2F2";
    }
    else if(author.length > 45) {
        outputResult += "<p>Author cannot be more than 45 characters.</p>";
        validationIsSuccessful = false;
        authorBox.style.border = "1px solid red";
        authorBox.style.backgroundColor = "#FFF2F2";
    }
    else {
        authorBox.style.border = "1px solid #ccc";
        authorBox.style.backgroundColor = "#fff";
    }

    //Image URL Validation
    if(image === "") {
        outputResult += "<p>Image URL cannot be empty.</p>";
        validationIsSuccessful = false;
        imageBox.style.border = "1px solid red";
        imageBox.style.backgroundColor = "#FFF2F2";
    }
    else if(!image.includes(".jpg") && !image.includes(".png") && !image.includes(".jpeg")) {
        outputResult += "<p>Image URL must be a .jpg, .png, or .jpeg.a</p>";
        validationIsSuccessful = false;
        imageBox.style.border = "1px solid red";
        imageBox.style.backgroundColor = "#FFF2F2";
    }
    else if(!image.includes("https://") && !image.includes("http://")) {
        outputResult += "<p>Image URL must contain https:// or http://.</p>";
        validationIsSuccessful = false;
        imageBox.style.border = "1px solid red";
        imageBox.style.backgroundColor = "#FFF2F2";
    }
    else if(image.length > 1000) {
        outputResult += "<p>Image URL cannot be more than 1000 characters.</p>";
        validationIsSuccessful = false;
        imageBox.style.border = "1px solid red";
        imageBox.style.backgroundColor = "#FFF2F2";
    }
    else {
        imageBox.style.border = "1px solid #ccc";
        imageBox.style.backgroundColor = "#fff";
    }

    if(!validationIsSuccessful) {
        outputContainer.innerHTML = outputResult;
        return false;
    }
    else if(validationIsSuccessful) {
        return true;
    }
}

async function deleteRecipe(recipeId) {

    console.log("Deleting recipe with ID: ", recipeId);

    try {
        let response = await fetch('../php/clear_table.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ recipeId: recipeId }),
        });

        
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }

       
        let data = await response.text();
        console.log(data);

        //Refreshes the webpage.
        getRecipes();
    } catch (error) {
        console.error('Fetch error:', error);
    }
}



//Event Listeners
document.addEventListener("DOMContentLoaded",initDatabase); //runs initDatabase() when DOM is loaded
document.addEventListener("DOMContentLoaded",getRecipes); //runs getRecipes() when DOM is loaded
document.addEventListener("DOMContentLoaded",getRandomRecipe); //runs getRandomRecipe() when DOM is loaded
