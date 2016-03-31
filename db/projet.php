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
function projet_search_all_but_me()
{
    $tmp= connect_db();
    $req = mysqli_query($tmp,"SELECT utilisateurs.nom as nom_utilisateur, utilisateurs.prenom, modules.nom as nom_module, projets.* FROM projets,modules,utilisateurs WHERE projets.id_module = modules.id AND projets.id_responsable = utilisateurs.id AND projets.id_responsable !=".$_SESSION['id']);
    return $req;    
}
function my_projet_search()
{
    $tmp= connect_db();
    $req = mysqli_query($tmp,"SELECT modules.nom as nom_module, projets.* FROM projets,modules WHERE projets.id_module = modules.id AND projets.id_responsable = ".$_SESSION['id']);
    return $req;   
}
function projet_sauve($post)
{
    $tmp= connect_db();
     if (projet_verifie_nom($post[nom]))
     {
        $post[nom]=  addslashes($post[nom]);
        $post[description] = addslashes($post[description]);
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
    $sql = "SELECT modules.nom as nom_module,utilisateurs.nom as nom_utilisateur, utilisateurs.prenom, projets.* FROM projets,utilisateurs,modules WHERE utilisateurs.id= projets.id_responsable AND projets.id_module = modules.id AND projets.id = ".$id;
    $result = mysqli_query($tmp,$sql);
    $row = $result->fetch_assoc();
    return $row;
}

function groupe_sauve($post)
{
    $tmp= connect_db();
        $post[sujet]=  addslashes($post[sujet]);
        $post[description] = addslashes($post[description]);       
        $sql = "INSERT INTO groupes (id,sujet,description, id_responsable,id_eleve_participant) VALUES ('','$post[sujet]','$post[description]','$_SESSION[id]','$_SESSION[id]')";
        $result = mysqli_query($tmp,$sql);
        $message = mysqli_error($tmp);
        $_SESSION['message']=$message;

    return $message;
}
function groupe_supprime($id,$id_utilisateur)
{
    $tmp= connect_db();
    $sql = "SELECT * FROM groupes WHERE id = $id";
    $result = mysqli_query($tmp,$sql);
    $row = $result->fetch_assoc();
    
     if ($row['id_responsable']==$id_utilisateur)
     {
        $sql = "DELETE FROM groupes WHERE id= $row[id]";
        $result = mysqli_query($tmp,$sql);
     }
    return $result;
}
function my_group_search()
{
    $tmp= connect_db();
    $req = mysqli_query($tmp,"SELECT groupes.* FROM groupes WHERE id_eleve_participant = ".$_SESSION['id']);
    return $req;   
}