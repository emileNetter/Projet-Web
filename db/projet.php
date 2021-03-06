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
        $post['sujet']=  addslashes($post['sujet']);
        $post['description'] = addslashes($post['description']);       
        $sql = "INSERT INTO groupes (id,sujet,description, id_responsable,id_eleve_participant,id_projet) VALUES ('','$post[sujet]','$post[description]','$_SESSION[id]','$_SESSION[id]','$post[id_projet]')"; 
        mysqli_query($tmp,$sql);
        $message = mysqli_error($tmp);
//        if($message='') {
        $lastId=mysqli_insert_id($tmp);
        $sql1 = "INSERT INTO groupes_utilisateurs (id_groupe,id_utilisateur,role,statut,message) VALUES ('$lastId','$_SESSION[id]','administrateur','terminé','') ";
        mysqli_query($tmp,$sql1);
        $message = mysqli_error($tmp);
//        }
        if($message!='')
        {
           $_SESSION['message']=$message; 
        }
        

    return $message;
}
function groupe_supprime($id,$id_utilisateur)
{
    $tmp= connect_db();
    $sql = "SELECT * FROM groupes WHERE id = $id";
    $result = mysqli_query($tmp,$sql);
    $row = $result->fetch_assoc();
//    $_SESSION['message'] ="id= $id / user_id= $id_utilisateur / Resultat = ".$sql;
     if ($row['id_responsable']==$id_utilisateur)
     {
        $sql1="DELETE FROM groupes_utilisateurs WHERE id_groupe=$id";
        mysqli_query($tmp,$sql1);
        $sql = "DELETE FROM groupes WHERE id=$id";
        $result = mysqli_query($tmp,$sql);
        
     }
    
    if (!$result) {
        die('Impossible d\'exécuter la requête :' . mysql_error());
    }
    else
    {
        return $result;
    }
}
function my_group_search($id_projet)
{
    $tmp= connect_db();
    $req = mysqli_query($tmp,"SELECT * from groupes INNER JOIN groupes_utilisateurs ON groupes.id = groupes_utilisateurs.id_groupe WHERE groupes_utilisateurs.id_utilisateur=$_SESSION[id] AND statut='terminé' AND id_projet=$id_projet GROUP BY groupes_utilisateurs.id_groupe, groupes_utilisateurs.id_utilisateur");
    return $req;   
}
function search_all_group_per_projet($id_projet)
{
    $tmp= connect_db();
    $sql="SELECT * from groupes INNER JOIN groupes_utilisateurs ON groupes.id = groupes_utilisateurs.id_groupe WHERE  statut='terminé' AND id_projet=$id_projet AND role='administrateur' GROUP BY groupes_utilisateurs.id_groupe, groupes_utilisateurs.id_utilisateur";
    $req=  mysqli_query($tmp, $sql);
    return $req;
    
}
function cherche_mes_groupes()
{
    $tmp= connect_db();
    $sql="SELECT * from groupes INNER JOIN groupes_utilisateurs ON groupes.id = groupes_utilisateurs.id_groupe WHERE groupes_utilisateurs.id_utilisateur=$_SESSION[id] AND statut='terminé' GROUP BY groupes_utilisateurs.id_groupe, groupes_utilisateurs.id_utilisateur";
    $result=  mysqli_query($tmp, $sql);
    return $result;
}
function group_search_all_but_me()
{
    $tmp= connect_db();
    $req = mysqli_query($tmp,"SELECT groupes.*, utilisateurs.nom, utilisateurs.prenom FROM groupes,utilisateurs WHERE groupes.id_responsable = utilisateurs.id AND groupes.id_eleve_participant !=".$_SESSION['id']);
    return $req;
}
function groupe_affiche_infos($id_groupe)
{
    $tmp= connect_db();
    $sql="SELECT groupes_utilisateurs.*,utilisateurs.nom as nom_utilisateur, utilisateurs.prenom, groupes.sujet,groupes.description FROM groupes_utilisateurs, utilisateurs,groupes WHERE groupes_utilisateurs.id_groupe = $_GET[id] AND groupes_utilisateurs.id_utilisateur=utilisateurs.id AND groupes_utilisateurs.id_groupe = groupes.id";
    $result = mysqli_query($tmp, $sql);
    return $result;
}
function recherche_groupe_rejoindre($id)
{
    $tmp= connect_db();
    $req = mysqli_query($tmp,"SELECT * FROM groupes where id=".$id);
    $row = $req->fetch_assoc();
    return $row;
}

function rejoindre_groupe($post)
{
    $tmp = connect_db();
    $sql = "INSERT INTO groupes_utilisateurs (id_groupe,id_utilisateur,role,statut,message) VALUES ('$post[id_groupe]','$_SESSION[id]','membre','en attente','$post[message]')";
    $req=mysqli_query($tmp,$sql);
    return $req;
}

function chercher_candidature_en_attente()
{
    $tmp = connect_db();
    $sql="SELECT groupes_utilisateurs.*,utilisateurs.nom as nom_utilisateur, utilisateurs.prenom, groupes.sujet FROM groupes_utilisateurs,groupes,utilisateurs WHERE groupes_utilisateurs.id_groupe IN ( SELECT id_groupe from groupes_utilisateurs WHERE role ='administrateur' AND statut='terminé' AND id_utilisateur =".$_SESSION['id'].") AND role ='membre' AND statut='en attente' AND groupes_utilisateurs.id_utilisateur = utilisateurs.id AND groupes.id = groupes_utilisateurs.id_groupe";
    $req=  mysqli_query($tmp,$sql);
    return $req;
}

function modifier_statut_candidature($id,$statut,$id_utilisateur)
{
    if (est_administrateur(cherche_id_groupe_demande($id), $id_utilisateur))
    {
        $tmp = connect_db();
        $sql="UPDATE groupes_utilisateurs SET statut= '$statut' WHERE id='$id'";
        $result=mysqli_query($tmp, $sql);
        if (!$result) {
        die('Impossible d\'exécuter la requête :' . mysql_error());
        }
    }
    else
    {
        $_SESSION['message']="Vous n'êtes pas administrateur, impossible de modifier la demande de candidature.";
    }
    
}

function est_administrateur($id_groupe,$id_utilisateur)
{
   $tmp = connect_db();
   $sql = "SELECT * FROM groupes WHERE id = $id_groupe";
   $result = mysqli_query($tmp,$sql);
   $row = $result->fetch_assoc();
   if ($row['id_responsable']==$id_utilisateur)
     {
        return true;
     }
   else
   {
       return false;
   }
}

function cherche_id_groupe_demande ($id_candidature)
{
    $tmp = connect_db();
    $sql="SELECT id_groupe FROM groupes_utilisateurs WHERE id=$id_candidature";
    $result = mysqli_query($tmp,$sql);
    $row = $result->fetch_assoc();
    return $row['id_groupe'];
}

function projet_responsable($id_projet)
{
    $tmp = connect_db();
    $sql="SELECT id_responsable FROM projets WHERE id=$id_projet";
    $result = mysqli_query($tmp,$sql);
    $row = $result->fetch_assoc();
    return $row['id_responsable'];
    
}

function module_sauve($post)
{
    $tmp = connect_db();
    $sql="INSERT INTO modules (id,nom,id_responsable,description_module) VALUES ('','$post[nom_module]','$_SESSION[id]','$post[description_module]')";
    mysqli_query($tmp, $sql);
}

function my_module_search($id_utilisateur)
{
    $tmp =connect_db();
    $sql="SELECT * FROM modules WHERE id_responsable=$id_utilisateur";
    $req = mysqli_query($tmp, $sql);
    return $req;
}

function module_supprime($id_module,$id_utilisateur)
{
    $tmp= connect_db();
    $sql = "SELECT * FROM modules WHERE id = $id_module";
    $result = mysqli_query($tmp,$sql);
    $row = $result->fetch_assoc();
    
     if ($row['id_responsable']==$id_utilisateur)
     {
        $sql="DELETE FROM modules WHERE id=$id_module";
        $result= mysqli_query($tmp,$sql);
     }
     
      if (!$result) {
        die('Impossible d\'exécuter la requête :' . mysql_error());
    }
    else
    {
        return $result;
    }
   
}