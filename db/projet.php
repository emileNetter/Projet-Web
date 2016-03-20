<?php

function projet_search_by_module($module)
{
    $tmp = connect_db();
    $req = mysqli_query($tmp,"SELECT modules.nom as nom_module, projets.* FROM projets INNER JOIN modules ON projets.id_module = modules.id WHERE id_module =" .$module);
    return $req;  
}

function projet_search_all()
{
    $tmp= connect_db();
    $req = mysqli_query($tmp,"SELECT modules.nom as nom_module, projets.* FROM projets INNER JOIN modules ON projets.id_module = modules.id");
    return $req;    
}

function projet_sauve($post)
{
    $tmp= connect_db();
     if (projet_verifie_nom($post[nom]))
     {
        $sql = "INSERT INTO projets (id, nom, id_responsable, id_module, description) VALUES ('','$post[nom]','$_SESSION[id]','$post[id_module]','$post[description]')";
        $result = mysqli_query($tmp,$sql);
        $message = mysqli_error($tmp);
     }
     else
     {
         $message = 'Le nom est déja utilisé';
     }
    $_SESSION['message'] = $message;
    return $message;
}

function projet_verifie_nom($nom)
{
    $tmp= connect_db();
    $check = mysqli_query($tmp,"SELECT COUNT(nom) FROM projets WHERE nom = $nom");
    return $check==0;
}

function projet_supprime($id,$id_utilisateur)
{
    $tmp= connect_db();
    $sql = "SELECT * FROM projets WHERE id = $id";
    $result = mysqli_query($tmp,$sql);
    $row = $result->fetch_assoc();
    
     if ($row['id_responsable']==$id_utilisateur)
     {
        $sql = "DELETE FROM projets WHERE id= $row[id]";
        $result = mysqli_query($tmp,$sql);
     }
     else
     {
         $message = 'Vous n\'avez pas les droits pour supprimer le projet';
     }
    $_SESSION['message'] = $message;
    return $result;
    
}

function projet_affiche_infos($id)
{
    $tmp= connect_db();
    $sql = "SELECT modules.nom as nom_module, utilisateurs.nom as nom_utilisateur, utilisateurs.prenom, projets.* FROM projets JOIN modules ON projets.id_module JOIN utilisateurs ON projets.id_responsable WHERE projets.id=$id";
    $result = mysqli_query($tmp,$sql);
    $row = $result->fetch_assoc();
    return $row;
}


