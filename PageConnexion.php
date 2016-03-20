<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="Css/Form.css">
        <meta charset="UTF-8">
        <title>Page de connexion</title>
    </head>
    <body>
        
        <h1><p> <center class="titres"> Connexion</center></p></h1> 
        
    <form method ="post" action ="index.php" class="basic-grey">
            
            <label for="identifiant">
                <span> Identifiant : </span>
                <input type="text" name="identifiant" id="identifiant" autofocus required /><br>
            </label> 
            
            <label for="mdp">
                <span> Mot de passe : </span>
                <input type="password" name ="mdp" id="mdp" required/><br>
            </label> 
            
                <br> <br>
                
                <center> <input type="submit" name='submit' value="Se connecter" > </center>
          
        </form>
    
        <?php
         include 'SaveFunction.php';
        userSave();
        
        
        ?>
    
    </body>
</html>