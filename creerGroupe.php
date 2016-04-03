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
        include 'header.php';
        ?>
        <form method ="post" action ="groupeSauve.php" class="basic-grey">
            <input type="hidden" name ="id_projet" value="<?php echo $_GET['id'] ?>" />
            <label for="sujet">
                <span> Sujet </span>
                <input type="text" name ="sujet" id="sujet" /><br>
            </label> 
            
            <label for="description">
                <span><strong> Description :</strong> </span>
                <textarea name="description" id ="description" rows="10" cols="50" placeholder="Saisir une description ici"></textarea>
            </label>
    
            <center> <input type="submit" name = 'submit' value="Créer un groupe" ></center>
              
        </form>
        
    </body>
</html>
