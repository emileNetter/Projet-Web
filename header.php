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
            <?php
            if(!isset($_SESSION['prenom']))
            {
                session_start();
            }
            
        if (isset($_SESSION['prenom']) && $_SESSION['type']== 'eleve')
        {
           echo "<ul class='ul-nav'>
                    <li><a href='index.php' class='logo-link'><img class='logo' src='Images/Logo.png' alt='Logo de l\'ENSC' height='50' ></a></li>
                    <ul style='float:right; list-style-type: none;'>
                        <li><a href='index.php'> Accueil</a></li>
                        <li class='dropdown'>
                            <a href='mesGroupes.php'> Mes Groupes</a>
                                <div class='dropdown-content'>
                                <a href='creerGroupe.php'> Créer un groupe</a>
                                <a href='candidaterGroupe.php'> Candidater à un groupe</a>
                                </div>
                        </li>
                        <li class='dropdown'>
                            <a href='mesProjets.php'> Mes Projets</a>
                                <div class='dropdown-content'>
                                <a href='creerProjet.php'> Créer un projet</a>
                                <a href='candidaterProjet.php'> Candidater à un projet</a>
                                </div>
                        </li>
                        <li><a href='gererCandidature.php'>Gérer les candidatures</a></li>  
                        <li><a href='logout.php'>Bonjour $_SESSION[prenom], Déconnexion</a></li>  
                    </ul>
                </ul> " ;

        }
        else if (isset($_SESSION['prenom']) && $_SESSION['type']== 'enseignant')
        {
            echo "<ul class='ul-nav'>
                    <li><img class='logo' src='Images/Logo.png' alt='Logo de l\'ENSC' height='50' ></li>
                    <ul style='float:right; list-style-type: none;'>
                         <li><a href='gestionProjets.php'> Gérer mes modules</a></li>
                        <li><a href='logout.php'>Bonjour $_SESSION[prenom], Déconnexion</a></li>  
                    </ul>
                </ul> " ;
        }
        else if (isset($_SESSION['prenom']) && $_SESSION['type']== 'client')
        {
            echo "<ul class='ul-nav'>
                    <li><img class='logo' src='Images/Logo.png' alt='Logo de l\'ENSC' height='50' ></li>
                    <ul style='float:right; list-style-type: none;'>
                         <li><a href='gestionProjets.php'> Gérer mes modules</a></li>
                        <li><a href='logout.php'>Bonjour $_SESSION[prenom], Déconnexion</a></li>  
                    </ul>
                </ul> " ;
        }
        else
        {
            echo"<ul class='ul-nav'>
                    <li><img class='logo' src='Images/Logo.png' alt='Logo de l\'ENSC' height='75' ></li>
                    <ul style='float:right; list-style-type: none;'>
                        <li><a href='PageInscription.php'> S'inscrire</a></li>
                        <li><a href='PageConnexion.php'> Se connecter</a></li>

                    </ul>
                </ul>";
        }
        include'utils/utils.php';
        message_affiche();
           
