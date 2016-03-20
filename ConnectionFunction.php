<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

        <?php
        
        function ConnectionFunction ()
        {
        session_start();
        
        include 'database.php';
        $tmp = mysqli_connect($db_host,$db_user,$db_password);
        mysqli_select_db($tmp,$db_name);
       
        // si le form est envoyé
        if (isset($_POST['submit']))
        {
            $checkusername = mysqli_query($tmp,"SELECT identifiant FROM utilisateurs WHERE identifiant = '".$_POST['identifiant']."'") or die (mysql_error());
            $check2 = mysqli_num_rows($checkusername); 
            // si on ne trouve pas l'utilisateur
            if ($check2 == 0) 
                {  
                    die('Cet utilisateur n\'existe pas dans la base de données. <a href=PageInscription.php> Cliquez ici pour vous enregistrer</a> ou <a href=PageConnexion.php>ici</a> si vous avez fait une erreur de frappe');  
                }
            $checkpassword = mysqli_query($tmp,"SELECT mdp FROM utilisateurs WHERE mdp = '".$_POST['mdp']."'") or die (mysql_error());
            $check3 = mysqli_num_rows($checkpassword);
            
            if ($check3 == 0)
            {
                die('Mauvais mot de passe, réessayez <a href="PageConnexion.php">ici</a>');
            }
            
            $sqlNomSession= "SELECT * FROM utilisateurs WHERE identifiant = '".$_POST['identifiant']."'" ;
            $result= mysqli_query($tmp,$sqlNomSession);
            $user = $result->fetch_assoc();
            $_SESSION['nom']=$user['nom'];
            
            $_SESSION['prenom']=$user['prenom'];
            
            $_SESSION['type']=$user['type'];
            $_SESSION['id']=$user['id'];
            
        }
        }
        
        
        
        
       
        
