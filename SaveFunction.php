<?php
function userSave() {
        include 'database.php';
        $tmp = mysqli_connect($db_host,$db_user,$db_password);
        mysqli_select_db($tmp,$db_name);
        //$tmp = mysqli_connect("localhost","root","");
        // mysqli_select_db($tmp,"test");
    
    // Vérifie que tous les champs soient rentrés
        if (isset($_POST['submit']))
        {
            
            // Vérifie que le nom d'utilisateur n'existe pas déja
            $usercheck = $_POST['identifiant'];
            $check = mysqli_query($tmp,"SELECT identifiant FROM utilisateurs WHERE identifiant = '$usercheck'") or die (mysql_error());
            
            $check2 = mysqli_num_rows($check);
            
            // si le nom existe déja on retourne un message d'erreur
            
            if($check2!=0)
            {
                die('Désolé, le nom d\'utilisateur '.$_POST['identifiant'].' est déja pris, essayez-en un autre '.'<a href="PageInscription.php">'.'ici</a>');
            }
           
            $sql = "INSERT INTO utilisateurs (id, nom, prenom, type, identifiant, mdp) VALUES ('','$_POST[nom]','$_POST[prenom]','$_POST[type]','$_POST[identifiant]','$_POST[mdp]')";
            $result = mysqli_query($tmp,$sql);
            return $result;            
        }  
    
}

    
    
    







