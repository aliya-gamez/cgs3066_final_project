# CGS3066 Final Project: Recipes Website

**Members:** Aliya Gamez, Joseph Galego, Matthew Gonzales
HTML, CSS, JavaScript, PHP and MySQL.

**Description:**

## To-do:

**MySQL Database Structure/Table:**

- id: INT, AUTO_INCREMENT
- title: VARCHAR(255), NOT NULL
- description: TEXT, NOT NULL
- image: VARCHAR(255), NOT NULL
- ingredients: JSON, NOT NULL
- instructions: JSON, NOT NULL
- author, VARCHAR(75)
- created_at: TIME

NOTE:
- Need to figure out how to turn ingredients and instructions into lists, aka JSON -> HTML
- How to take an image as input and store it into /img/recipe
- Treating recipes like blog posts?
  
**Set up HTML/CSS:**

HTML
- index.html: recipes will be featured, with featured Recipe that chooses random MySQL ID and below that a grid of recipe cards
- upload.html: form to input recipes
    - title
    - description
    - image
    - ingredients
    - instructions
    - author
- about.html



**Set up PHP code:**

