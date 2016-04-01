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
        <table class="candidaterTable">
            <tr>
                <th>Groupes </th>  
                <th>Responsable</th>
                <th></th>
            </tr> 
           
        <?php
        
        $res = group_search_all_but_me();
        
        while ($row = $res->fetch_assoc()) {
            ?>
            
            <?php
            echo '<tr>';
                echo '<td>'.'<a href="groupeAfficheInfos.php?id='.$row['id'].'">'.$row['sujet'].'</td>';  
                echo '<td>'.$row['prenom'].' '.$row['nom'];
                echo '<td>'.'<a href="candidaterGroupe.php?id='.$row['id'].'"><input type="button" value="Rejoindre ce groupe"></a>'.'</td>';
            echo '</tr>';
            
            }
        ?>
        </table> 
    </body>
</html>
