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
        ?>
        <table class="projetTable">
            <tr>
                <th>Projets</th>
                <th>Modules</th>
                <th>Responsable</th>
                <th></th>
            </tr>
            
        <?php
            
        $req = projet_search_all_but_me();

        while ($row = $req->fetch_assoc()) {
            ?>
            
            <?php
            echo '<tr>';
                echo '<td>'.'<a href="projetAfficheInfos.php?id='.$row['id'].'">'.$row['nom'].'</td>'; 
                echo '<td>'.$row['nom_module'].'</td>';
                echo '<td>'.$row['prenom'].' '.$row['nom_utilisateur'];
                echo '<td>'.'<a href="candidaterProjet.php?id='.$row['id'].'"><input type="button" value="Faire une demande de candidature"></a>'.'</td>';
            echo '</tr>';
            
            }
        ?>
        </table>
    </body>
</html>
