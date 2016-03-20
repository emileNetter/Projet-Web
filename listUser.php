<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste des utilisateurs</title>
    </head>
    <body>
        <table>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Type d'utilisateur</th>
            </tr>
        <?php
        include 'database.php';
        $tmp = mysqli_connect($db_host,$db_user,$db_password);
        mysqli_select_db($tmp,$db_name);
        //$tmp = mysqli_connect("localhost","root","");
       // mysqli_select_db($tmp,"test");
        $sql = "SELECT id,nom, prenom, type FROM utilisateurs";
        $result = mysqli_query($tmp,$sql) or die (mysql_error());
        
        
        
        while ($data = mysqli_fetch_array($result))
        {
            ?>
            
            
            <?php
            echo '<tr>';
                echo '<td>'.'<a href="ficheRenseignements.php?id='.$data['id'].'">' .$data['nom'].'</a>'.'</td>';
                echo '<td>' .$data['prenom'].'</td>';
                echo '<td>' .$data['type'].'</td>';
                echo '<td>'.'<a href="DeleteUser.php?id='.$data['id'].'">'.'<input type="button" value="Supprimer" >'.'</a>';
            echo '</tr>';
        
            
            
        }
        
        mysqli_close($tmp);
        ?>
        </table>
    </body>
</html>
