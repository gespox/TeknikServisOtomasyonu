<?php

if ($_GET)
{

    require_once "../baglan.php";
    if ($conn->query("DELETE FROM servis WHERE id =".(int)$_GET['id']))
    {
        include "../yonlendirme.php";
        yonlendir("servisekle.php");
    }
    else{
        echo "Hata Olustu";
    }
}
?>