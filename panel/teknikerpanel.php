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
    <div class="logo">
        <a href="#">Teknik <span>Servis Otomasyonu</span></a>
    </div>
    <div class="bilgiler">
      <span>  <?php echo "Tekniker: ". $_SESSION["ad"]." ".$_SESSION["soyad"]." " ; ?></span>
        <form action="cikis.php">
        <button id="cikisbtn" name="cikisbtn"> Çıkış Yap</button>
        </form>
    </div>
</div>
<div id="container">
    <div class="sidebar">
        <ul id="nav">
            <li  >
                <a href="#">   <img src="../img/menu.ico" width="24" height="24" > Genel Durum</a>
            </li>
            <li>
                <a href="#"> <img src="../img/menu.ico" width="24" height="24" > Yeni Servis Ekle</a>
            </li>
            <li>
           <a href="#"> <img src="../img/menu.ico" width="24" height="24" > Musteri Ekle</a>
            </li>
            <li onclick="markaEkle()">
            <a href="#"><img src="../img/menu.ico" width="24" height="24" >Marka Ekle</a>
            </li>
            <li>
               <a href="#"> <img src="../img/menu.ico" width="24" height="24" > Cihaz Ekle</a>
            </li>
        </ul>
    </div>
    <div class="content">
        <h1>Admin Paneli</h1>
        <span>Genel Gorunum...</span>
        <div id="box">
            <div class="box-top">Servisteki Urunler</div>
            <div class="box-panel">
                <style><?php include('panelcss/servis.css'); ?></style>
                <?php include "servis.php"; ?>
            </div>
        </div>
        <div id="box">
            <div class="box-top">Markalar </div>
            <div class="box-panel">
                <?php include "marka.php"; ?>
                <style><?php include('panelcss/marka.css'); ?></style>
            </div>
        </div>
        <div id="box">
            <div class="box-top">Cihazlar</div>
            <div class="box-panel">
                <?php include "cihaz.php"; ?>
                <style><?php include('panelcss/cihaz.css'); ?></style>
            </div>
        </div>
        <div id="box">
            <div class="box-top">Teknik Ekip</div>
            <div class="box-panel">
                <?php include "ekip.php"; ?>
                <style><?php include('panelcss/ekip.css'); ?></style>
            </div>
        </div>
    </div>
</div>
<!-- #container -->
<script src="paneljs/ajax.js" type="text/javascript"></script>
</body>
</html>
<?php
}
else{
    include "../yonlendirme.php";
    yonlendir('index.php');
}
?>