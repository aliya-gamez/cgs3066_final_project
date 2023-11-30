# CGS3066 Final Project: Recipes Website

**Members:** Aliya Gamez, Joseph Galego, Matthew Gonzales
HTML, CSS, JavaScript, PHP and MySQL.

**URL:** [Github Pages Link](https://aliya-gamez.github.io/cgs3066_final_project/) (Only for HTML, CSS and JS functionality)

**Description:**

## To-do:

**Set up HTML/CSS:**

HTML
- index.html: recipes will be featured, with featured Recipe that chooses random MySQL ID and below that a grid of recipe cards
    - featured recipe will either use random mysql ID from database, or last added.
- upload.html: form to input recipes
    - title
    - description
    - recipe-img
    - ingredients
    - instructions
    - author
- about.html

**MySQL Database Structure/Table:**

- recipe_id: INT, AUTO_INCREMENT, PRIMARY KEY
- title: VARCHAR(255), NOT NULL
- description: TEXT, NOT NULL
- recipe-img: VARCHAR(255), NOT NULL
- ingredients: JSON, NOT NULL
- instructions: JSON, NOT NULL
- author, VARCHAR(75)
- uploaded_date: TIME

*changed final names in 2create_tables.php


NOTE:
- (FINISHED) Need to figure out how to turn ingredients and instructions into lists, aka JSON -> HTML
- How to take an image as input and store it into /img/recipe (using URLs in the meantime)

**Set up PHP code:**

- add_recipe.php
- get_recipe.php
- get_random_recipe.php (This gets a random recipe from Recipe table, this will be fetched and inputed into the hero banner on index.html)

**Set up JavaScript:**
- Make function that creates HTML page with the recipe that was clicked on in index.html

**Errors:**

1. Using a ' or " in any input in the add recipe form breaks the add_recipe.php

**Sources:**
https://stackoverflow.com/questions/32751411/json-foreach-get-key-and-value


