<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="Css/Accueil.css">
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        

        <?php
        include'db/db_connect.php';
        include'db/projet.php';
        include'header.php';
        $res = groupe_affiche_infos($_GET['id']);
        ?>
        <table class='table-affiche-infos'>
            <tr>
                <td>Participants : </td>
                <td>
                    <?php 
                    while ($row=$res ->fetch_assoc() ) {
                        echo $row['prenom'].' '.$row['nom_utilisateur'];
                       echo '<br/>';
                    }                   
                    ?>
                </td>
            </tr>
            <tr>
                <?php
                    $result = groupe_affiche_infos($_GET['id']);
                    $row=$result->fetch_assoc();
                ?>
                <td> Nom du groupe :  </td>
                <td><?php echo $row['sujet'] ?></td>
            </tr>
            <tr>
                <td> Description :  </td>
                <td><?php echo $row['description'] ?></td>
            </tr>
            
            
        </table>
        
    </body>
</html>
