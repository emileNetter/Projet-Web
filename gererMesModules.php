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
       <table class="moduleTable">
            <tr>
                <th> Mes Modules  </th>    
            </tr>   
        <?php
        include 'header.php';
        include 'db/db_connect.php'  ; 
        include 'db/projet.php';
           
        $res = my_module_search($_SESSION['id']);
        
        while ($row = $res->fetch_assoc()) {
            ?>
            
            <?php
            echo '<tr>';
                echo '<td>'.'<a href="moduleAfficheInfos.php?id='.$row['id'].'">'.$row['nom'].'</td>';  
                echo '<td>'.'<a href="moduleSupprime.php?id='.$row['id'].'"><input type="button" value="Supprimer le module"></a>'.'</td>';
            echo '</tr>';
            
            }
        ?>
        </table>
    </body>
</html>
