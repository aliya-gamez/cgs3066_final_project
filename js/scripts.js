//Makes Featured Recipe Button A Link to Recipe
let featuredRecipeBtn = document.getElementById("featured-recipe-btn");
featuredRecipeBtn.addEventListener("click", function() {
    window.location.href = "recipe_id/1/creamy_key_lime_pie.html";
});

//Creates database and populates it with some recipes
document.addEventListener("DOMContentLoaded", function () {

});

//Get recipes table data and input on front-end
async function getRecipes() {
    //error handling in case fetch doesnt go thru
    try {

    }
    catch(error) {
        console.log("Couldn't get recipes");
    }
}

document.addEventListener("DOMContentLoaded",getRecipes);