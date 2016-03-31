<link rel="stylesheet" type="text/css" href="Css/Accueil.css">

<?php
include'db/db_connect.php';
include'db/projet.php';
include'header.php';
$row = projet_affiche_infos($_GET['id']);
?>
<table class='table-affiche-infos'>
    <tr>
        <td> Nom du projet :  </td>
        <td><?php echo $row['nom'] ?></td>
    </tr>
    
    <tr>
        <td> Module :  </td>
        <td><?php echo $row['nom_module'] ?></td>
    </tr>
    
    <tr>
        <td> Administrateur :  </td>
        <td><?php echo $row['prenom'].' '.$row['nom_utilisateur'] ?></td>
    </tr>
    
    <tr>
        <td> Description :  </td>
        <td><?php echo $row['description'] ?></td>
    </tr>
</table>




