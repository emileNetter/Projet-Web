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
           
            $res = my_group_search();
        
        while ($row = $res->fetch_assoc()) {
            ?>
            
            <?php
            echo '<tr>';
                echo '<td>'.'Sujet :'.'</td>';
                echo '<td>'.'<a href="groupeAfficheInfos.php?id='.$row['id'].'">'.$row['sujet'].'</td>';  
                if($row['id_responsable']==$_SESSION['id'])
                {
                    echo '<td>'.'<a href="groupeSupprime.php?id='.$row['id'].'"><input type="button" value="Supprimer le groupe"></a>'.'</td>';
                }
                
            echo '</tr>';
            
            }
        ?>
        </table>     
    </body>
</html>
