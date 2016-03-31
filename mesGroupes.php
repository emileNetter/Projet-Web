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
        <table class="groupeTable">
            <tr>
                <th> Mes Groupes </th>    
            </tr> 
           
        <?php
        include 'header.php';
        include'db/db_connect.php'  ; 
        include 'db/projet.php';
           
            $res = my_projet_search();
        
        while ($row = $res->fetch_assoc()) {
            ?>
            
            <?php
            echo '<tr>';
                echo '<td>'.'<a href="projetAfficheInfos.php?id='.$row['id'].'">'.$row['nom'].'</td>';  
                echo '<td>'.$row['nom_module'].'</td>';
                echo '<td>'.'<a href="projetSupprime.php?id='.$row['id'].'"><input type="button" value="Supprimer le projet"></a>'.'</td>';
            echo '</tr>';
            
            }
        ?>
        </table>     
    </body>
</html>
