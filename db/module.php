<?php

function module_search_all()
{
    $tmp= connect_db();
    $req = mysqli_query($tmp,"SELECT * FROM modules");
    return $req;    
}

