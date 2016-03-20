<link rel="stylesheet" type="text/css" href="Css/Accueil.css">

<?php
include'db/db_connect.php';
include'db/projet.php';
include'header.php';
projet_affiche_gerer($_SESSION['id']);
