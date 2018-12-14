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