<?php
include 'header.php';
        include 'db/db_connect.php';
        include 'db/projet.php';
        $message = groupe_sauve($_POST);
        if ($message != '')
        {
            header('Location: creerGroupe.php');
        }
        else
        {
            header('Location: mesGroupes.php');
        }
