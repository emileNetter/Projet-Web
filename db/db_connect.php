<?php
        
        
function connect_db()
{
    $db_name = "test";
    $db_user = "root";
    $db_password = "";
    $db_host = "localhost";
    $tmp = mysqli_connect($db_host,$db_user,$db_password);
    mysqli_select_db($tmp,$db_name);
    return $tmp;
}