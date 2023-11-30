//Makes Featured Recipe Button A Link to Recipe
let featuredRecipeBtn = document.getElementById("featured-recipe-btn");
featuredRecipeBtn.addEventListener("click", function() {
    window.location.href = "recipes/0.html";
});

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
        let recipeListClass = document.getElementById("recipe-list"); //recipe list class container
        let recipeListStorage = document.createDocumentFragment();
        recipeListClass.innerHTML = `<!--Database Entry Start-->`;

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
        recipeListClass.appendChild(recipeListStorage);
    }
    catch(error) {
        console.log("Couldn't get recipes: ", error);
    }
}

document.addEventListener("DOMContentLoaded",getRecipes);

/*Get random recipe from table data and input on front-end hero banner
async function getRandomRecipes() {
    //error handling in case fetch doesnt go thru
    try {
        //fetch request and handling?
        let response = await fetch('php/random_recipe.php'); //response variabe for a fetch request, which is fetched from get_recipes.php
        let json = await response.json(); //parse response as a json file, which it is
        let recipeListClass = document.getElementById("recipe-list"); //recipe list class container
        let recipeListStorage = document.createDocumentFragment();
        recipeListClass.innerHTML = `<!--Database Entry Start-->`;

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
        recipeListClass.appendChild(recipeListStorage);
    }
    catch(error) {
        console.log("Couldn't get recipes: ", error);
    }
}

//document.addEventListener("DOMContentLoaded",getRecipes); */