<?php

function userDelete()
{
    include 'database.php';
    $tmp = mysqli_connect($db_host,$db_user,$db_password);
    mysqli_select_db($tmp,$db_name);
    //$tmp = mysqli_connect("localhost","root","");
    //mysqli_select_db($tmp,"test");
    $id=$_GET["id"];
    $sql = "DELETE FROM utilisateurs WHERE id = $id";
    $result = mysqli_query($tmp,$sql);
    return $result;
}


