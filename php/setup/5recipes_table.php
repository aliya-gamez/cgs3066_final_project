<?php 
 $dsn = "mysql:host=localhost;dbname=MyDatabase";
 $username = "root";
 $password = "bad";
 
 try
 {

   //Connect to the database.

   $conn = new PDO($dsn, $username, $password);
 
   //Set an attribute on the database handle.
   //The attribute ATTR_ERRMODE (for Error reporting mode of PDO) is set to a value of ERRMODE_EXCEPTION (for Throws PDOExceptions).
 
   $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   //recipe_... ID(INT), TITLE(VARCHAR255), DESCRIPTION(VARCHAR255), INGREDIENTS(JSON), INSTRUCTIONS(JSON), AUTHOR(VARCHAR75), IMG(VARCHAR255)
   // "('', '', '', '', '', '', '')",
   $recipes = array(
    "('1', 'Creamy Key Lime Pie', '', '', '', '', '')",
  );

   for($i = 0; $i < 35; $i++)
   {
      $record = $recipes[$i];

      //Implement SQL statement to insert a student record into the recipes table.

      $sql = "INSERT INTO Recipes (recipe_id, recipe_title, recipe_description, recipe_ingredients, recipe_instructions, recipe_author, recipe_img)
                VALUES $record";    
    
      //Execute SQL statement to insert a student record into the recipes table; use exec() because no results are returned.
    
      $conn -> exec($sql);
   }
 
   echo "<h1>New records inserted successfully!</h1>";
 }
 catch(PDOException $e)
 {
     echo "<h1>" . $e -> getMessage() . "</h1>";
 }
 
 $conn = null;
 ?>