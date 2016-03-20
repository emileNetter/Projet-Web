<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table class="projetTable">
            <tr>
                <th>Projets</th>
                <th>Modules</th>
            </tr>
            
        <?php
            
        include 'db/projet.php';
        
        if (isset($_GET['module']))
        {
            $req = projet_search_by_module($_GET['module']);    
        }
        
        else
        {           
            $req = projet_search_all();
        }
        while ($row = $req->fetch_assoc()) {
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
