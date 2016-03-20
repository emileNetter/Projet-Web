<?php
include'db/db_connect.php';
include'db/projet.php';

  if(!isset($_SESSION['id']))
            {
                session_start();
            }
projet_supprime($_GET['id'],$_SESSION['id']);
header('Location: index.php');
