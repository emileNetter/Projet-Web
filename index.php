<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="Css/Accueil.css">
        <title>Page d'accueil du site</title>
    </head>
    <body>
        
        <?php
        
        include 'ConnectionFunction.php' ;
        ConnectionFunction();
        include'header.php';
        include'utils/utils.php';
        message_affiche();
        include 'db/db_connect.php';
        
        if (isset ($_SESSION['nom']))
        {
            ?>
            <table class = indexTable>
                <th> Modules</th>
                <tr> 
                    <td width="400px"><?php include 'afficheModules.php';?></td>
                    <td width="1100px"><?php include 'afficheProjets.php';?></td>
            </tr>
            
            </table>
            <?php
        }
        else
        {
            ?>
            <h3><p>Bienvenue sur le site de gestion des projets et modules de l'ENSC !</p></h3></br>
        
            <p>Si vous n'avez pas encore de compte, inscrivez-vous, sinon connectez-vous !</p>
            <?php
        }
            
       ?>
        
    </body>
</html>
