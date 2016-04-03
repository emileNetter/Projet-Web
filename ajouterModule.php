<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="Css/Form.css">
        <link rel="stylesheet" type="text/css" href="Css/Accueil.css">
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
         <?php
        include'header.php';
        ?>
         <form method ="post" action ="ajouterModule.php" class="basic-grey">
            
            <label for="nom_module">
                <span> Nom du module </span>
                <input type="text" name ="nom_module" id="nom_module" required /><br>
            </label> 
            
            <label for="description_module">
                <span><strong> Description :</strong> </span>
                <textarea name="description_module" id ="description_module" rows="10" cols="50" placeholder="Saisir une description ici"></textarea>
            </label>
    
            <center> <input type="submit" name = 'submit' value="Créer un noveau module" ></center>
              
        </form>
       <?php 
       if (isset($_POST['submit']))
       {
           include'db/db_connect.php';
           include'db/projet.php';
           module_sauve($_POST);
           header('Location : index.php');
       }
       ?>
    </body>
</html>
