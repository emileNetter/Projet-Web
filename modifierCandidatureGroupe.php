<link rel="stylesheet" type="text/css" href="Css/Accueil.css">
<?php
include 'header.php';
include'db/db_connect.php'  ; 
include 'db/projet.php';
modifier_statut_candidature($_GET['id'], $_GET['statut'],$_SESSION['id']);
header('location:gererCandidature.php');
