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
        <table class="candidatureEnAttente">
            <tr>
                <th> Candidatures en attente de validation </th>    
            </tr> 
           
        <?php
        include'db/db_connect.php';
        include'db/projet.php';
        include'header.php';
        $req = chercher_candidature_en_attente();
        while ($row= $req->fetch_assoc()) {
            ?>
            
            <?php
            echo '<tr>';
                echo '<td>'.$row['prenom'].' '.$row['nom_utilisateur'].' veut rejoindre le groupe '.$row['sujet'].'</td>'; 
                echo '<td>'.'<a href="accepterCandidatureGroupe.php?id='.$row['id_groupe'].'"><input type="button" value="Accepter"></a>'.'</td>';
                echo '<td>'.'<a href="refuserCandidatureGroupe.php?id='.$row['id_groupe'].'"><input type="button" value="Refuser"></a>'.'</td>';
            echo '</tr>';
            
            }
        ?>
        </table>     
        <?php
        
        ?>
        
    </body>
</html>
