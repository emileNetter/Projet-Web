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
        <title>Page d'inscription</title>
    </head>
    <body>
        
        <h1> <center class="titres"> Formulaire d'inscription </center></h1>
      
        <form method ="post" action ="PageConnexion.php" class="basic-grey">
            <label for="nom">
                <span> Votre Nom : </span>
                <input type="text" name="nom" id="nom" autofocus required /><br>
            </label> 
            
            <label for="prenom">
                <span> Votre Prénom : </span>
                <input type="text" name ="prenom" id="prenom" required/><br>
            </label> 
            
            <label for="identifiant">
                <span><strong> Identifiant :</strong> </span>
                <input type="text" name="identifiant" id="identifiant"  required /><br>
            </label> 
            
            <label for="mdp">
                <span><strong> Mot de passe : </strong></span>
                <input type="password" name ="mdp" id="mdp" required/><br>
            </label> 
            
            <label for="role">
                    <span> Quel type d'utilisateur êtes-vous ? </span><br>
                    <select name="type" id="type">
                        <option value="eleve">Elève</option>
                        <option value="enseignant">Enseignant</option>
                        <option value="client">Client</option>
                    </select>
            </label> <br> <br>
                
                
                <center> <input type="submit" name = 'submit'value="S'incrire" > </center>
                <a href="listUser.php"> <input type="button" value="Voir tous les utilisateurs"></a>
            
            
        </form>
    
    
        
        <?php
        
        ?>
    </body>
</html>
