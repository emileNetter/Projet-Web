<?php
include 'header.php';
include 'db/db_connect.php';
include 'db/projet.php';

rejoindre_groupe($_POST);

header('Location: projetAfficheInfos.php?id='.$_POST['projet_id']);