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
        
        include 'db/module.php';
        $req = module_search_all();
        
        echo '<ul class="ul-module" >';
        while ($row = $req->fetch_assoc()) {
            ?>
            <?php
            echo '<li>'.'<a href="index.php?module='.$row['id'].'"'.'><input type="button" /></a>' .$row['nom'].'</li>';   
        }
        
        echo '</ul>';        
        ?>
        
    </body>
</html>
