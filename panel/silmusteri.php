<?php

if ($_GET)
{

    require_once "../baglan.php";
    if ($conn->query("DELETE FROM musteri WHERE idmusteri =".(int)$_GET['id']))
    {
        include "../yonlendirme.php";
        yonlendir("musteriekle.php");
    }
    else{
        echo "Hata Olustu";
    }
}
?>