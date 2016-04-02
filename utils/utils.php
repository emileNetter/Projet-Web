<?php

function message_affiche()
{
    if(isset($_SESSION['message']))
    {
        echo '<DIV class="message">'.$_SESSION['message'].'</DIV>';
        unset($_SESSION['message']);
    }
}
