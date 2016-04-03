<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="Css/Form.css">
        <link rel="stylesheet" type="text/css" href="Css/Accueil.css">
        <title></title>
    </head>
    <body>
        <?php
        include 'header.php';
        ?>
        
        <form method ="post" action ="projetSauve.php" class="basic-grey">
            <label for="id_module">
                <span> Module </span>
             <select id = "id_module" name="id_module">
                 <?php
                 
                 include'db/db_connect.php';
                 include 'db/module.php';
                 $req = module_search_all();
                 
                 while ($row = $req->fetch_assoc()) {
                     echo'<option value ='.$row['id'].'>'.$row['nom'].'</option>';
                     
                 }
                ?>
               
             </select>
            </label> 
            
            <label for="nom">
                <span> Nom du projet </span>
                <input type="text" name ="nom" id="nom" required/><br>
            </label> 
            
            <label for="description">
                <span><strong> Description :</strong> </span>
                <textarea name="description" id ="description" rows="10" cols="50" placeholder="Saisir une description ici"></textarea>
            </label>
    
            <center> <input type="submit" name = 'submit' value="Créer un projet" ></center>
              
        </form>
    </body>
</html>