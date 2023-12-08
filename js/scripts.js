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
                    </div>
                </a>
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

function validateForm() {
    let title = document.getElementById("recipe_title").value;
    let description = document.getElementById("recipe_description").value;
    let ingredients = document.getElementById("recipe_ingredients").value;
    let instructions = document.getElementById("recipe_instructions").value;
    let author = document.getElementById("recipe_author").value;
    let image = document.getElementById("recipe_img").value;
    let validationIsSuccessful = true;

    let outputResult = "";
    let outputContainer = document.getElementById("validation-output-container");

    //Check if all fields are filled out
    if (!title || !description || !ingredients || !instructions || !author || !image) {
        outputResult += "<p>All fields must be filled out.</p><br>";
        validationIsSuccessful = false;
    }

    //Title Validation
    if(title.length > 45) {
        outputResult += "<p>Title cannot be more than 75 characters.</p><br>";
        validationIsSuccessful = false;
    }

    //Description Validation
    if(description.length > 255) {
        outputResult += "<p>Description cannot be more than 255 characters.</p><br>";
        validationIsSuccessful = false;
    }

    //Ingreidents & Instructions Validation
    if (ingredients.includes("'") || ingredients.includes('"') || instructions.includes("'") || instructions.includes('"')) {
        outputResult += "<p>Ingredients and/or instructions cannot contain single or double quotes.</p><br>";
        validationIsSuccessful = false;
    }

    //Author Validation
    if(author.length > 45) {
        outputResult += "<p>Author cannot be more than 45 characters.</p><br>";
        validationIsSuccessful = false;
    }

    //Image URL Validation
    if(!image.includes(".jpg") && !image.includes(".png") && !image.includes(".jpeg")) {
        outputResult += "<p>Image URL must be a .jpg, .png, or .jpeg.</p><br>";
        validationIsSuccessful = false;
    }

    if(validationIsSuccessful) {

    }
    else if(!validationIsSuccessful) {
        outputContainer.innerHTML = outputResult;
        document.body.scrollTop = document.documentElement.scrollTop = 0;
    }
}

//Event Listeners
document.addEventListener("DOMContentLoaded",initDatabase); //runs initDatabase() when DOM is loaded
document.addEventListener("DOMContentLoaded",getRecipes); //runs getRecipes() when DOM is loaded
document.addEventListener("DOMContentLoaded",getRandomRecipe); //runs getRandomRecipe() when DOM is loaded

let addRecipeForm = document.getElementById("add-recipe-form");
addRecipeForm.addEventListener("submit", function(event) { //runs validateForm() when form is submitted
    event.preventDefault(); //prevents form from submitting
    if(validateForm()) {
        event.target.submit(); //submits form if validation is successful
    }
});
