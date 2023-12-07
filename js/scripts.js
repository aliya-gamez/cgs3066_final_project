//Creates database and populates it with some recipes
document.addEventListener("DOMContentLoaded", function () {

});

//Get recipes table data and input on front-end
async function getRecipes() {
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
    //error handling in case fetch doesnt go thru
    try {
        //fetch request and handling?
        let response = await fetch('php/get_random_recipe.php'); //response variabe for a fetch request, which is fetched from get_recipes.php
        let json = await response.json(); //parse response as a json file, which it is
        let featuredRecipeID = document.getElementById("featured-recipe"); //recipe list class container

        json.forEach(recipe => {
            featuredRecipeID.innerHTML = `
                <div class="recipe-img" style="background-image: url(${recipe.recipe_img});"></div>
                <div class="recipe-text">
                    <h2 class="title">${recipe.recipe_title}</h2>
                    <p class="description">${recipe.recipe_desc}</p>
                    <button id="featured-recipe-btn">Go to Recipe</button>
                </div>
                `;  
            //Makes Featured Recipe Button A Link to Recipe
            let featuredRecipeBtn = document.getElementById("featured-recipe-btn");
            featuredRecipeBtn.addEventListener("click", function() {
                window.location.href = `recipes/${recipe.recipe_id}.html`;
            });          
        });

        featuredRecipeID.appendChild(recipeListStorage);
    }
    catch(error) {
        console.log("Couldn't get random recipes: ", error);
    }
}

//Event Listeners
document.addEventListener("DOMContentLoaded",getRecipes);
document.addEventListener("DOMContentLoaded",getRandomRecipe);