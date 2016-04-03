
<link rel="stylesheet" type="text/css" href="Css/Accueil.css">
<link rel="stylesheet" type="text/css" href="Css/Form.css">
<?php
include'db/db_connect.php';
include'db/projet.php';
include'header.php';
$row = recherche_groupe_rejoindre($_GET['id']);
?>
<form method ="post" action ="rejoindreGroupe.php" class="basic-grey">   
            <input type="hidden" name ="projet_id" value="<?php echo $_GET['projet_id'] ?>" />
            <label for="titre" style="text-align: center ; font-size: 20px;">
                Rejoindre le groupe : <?php echo $row['sujet'] ?>
            </label> 
            <input type="hidden" name="id_groupe" id="id_groupe" value="<?php echo $row['id'] ?>">
            <label for="message" style="padding-top: 20px;">
                <span><strong> Message :</strong> </span>
                <textarea name="message" id ="message" rows="10" cols="50" placeholder="Saisir un message ici"></textarea>
            </label>
    
            <center> <input type="submit" name = 'submit' value="Envoyer une demande" ></center>
              
        </form>
