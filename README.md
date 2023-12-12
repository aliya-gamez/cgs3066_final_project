# CGS3066 Final Project: Recipe Sharing Website

**Members:** Aliya Gamez, Matthew Gonzales

**URL:** [Github Pages Link](https://aliya-gamez.github.io/cgs3066_final_project/) (Only for HTML, CSS and JS functionality)

**Description:** Project utilizing HTML, CSS, JavaScript, PHP and MySQL.


## Project Info

**MySQL Database Structure/Table:**

- recipe_id INT AUTO_INCREMENT PRIMARY KEY,
- recipe_title VARCHAR(255) NOT NULL,
- recipe_description VARCHAR(255) NOT NULL,
- recipe_ingredients JSON NOT NULL,
- recipe_instructions JSON NOT NULL,
- recipe_author VARCHAR(75),
- recipe_img VARCHAR(255)

**Errors:**

1. Using a ' or " in any input in the add recipe form breaks the add_recipe.php

**Sources:**
- https://stackoverflow.com/questions/32751411/json-foreach-get-key-and-value
- https://stackoverflow.com/questions/19412/how-to-request-a-random-row-in-sql
- https://developer.mozilla.org/en-US/docs/Web/API/Document/createDocumentFragment
- https://www.geeksforgeeks.org/deleting-all-files-from-a-folder-using-php/
- https://stackoverflow.com/questions/32410590/form-submission-after-javascript-validation


