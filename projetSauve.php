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
        include 'header.php';
        include 'db/db_connect.php';
        include 'db/projet.php';
        $message = projet_sauve($_POST);
        if ($message != '')
        {
            header('Location: creerProjet.php');
        }
        else
        {
            header('Location: index.php');
        }
        ?>
    </body>
</html>
