<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="Css/Accueil.css">
        <title></title>
    </head>
    <body>
        <?php
            include 'header.php';
            session_destroy();
           // echo 'Vous êtes à présent déconnecté, redirection vers la page d\'accueil...';
            unset($_SESSION['prenom']);
            unset($_SESSION['nom']);
            unset($_SESSION['type']);
            $_SESSION['message']= 'Vous êtes à présent déconnecté, redirection vers la page d\'accueil...';
            header('Location: index.php');
        ?>
    </body>
</html>