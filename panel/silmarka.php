<?php

if ($_GET)
{

    require_once "../baglan.php";
    if ($conn->query("DELETE FROM marka WHERE idmarka =".(int)$_GET['id']))
    {
        include "../yonlendirme.php";
        yonlendir("markaekle.php");
    }
    else{
        echo "Hata Olustu";
    }
}
?>