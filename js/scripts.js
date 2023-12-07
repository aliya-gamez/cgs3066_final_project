//Creates database and populates it with some recipes

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

//Event Listeners
document.addEventListener("DOMContentLoaded",getRecipes);
document.addEventListener("DOMContentLoaded",getRandomRecipe);