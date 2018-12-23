<?php
session_start();
if(isset($_SESSION['uname'])){
    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico"/>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Tekniker Paneli</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css-js/tekniker.css">
    </head>
    <body>
    <div id="header">
        <?php include "header.php"; ?>
    </div>
    <div id="container">
        <?php include "sidebar.php"; ?>
        <div class="content">
            <?php include "contentcihaz.php"; ?>
        </div>
    </div>
    <!-- #container -->

    </body>
    </html>
    <?php
}
else{
    include "../yonlendirme.php";
    yonlendir('../index.php');
}
?>