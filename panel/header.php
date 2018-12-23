<div class="logo">
    <a href="#">Teknik <span>Servis Otomasyonu</span></a>
</div>
<div class="bilgiler">
    <span>  <?php echo "Tekniker: ". $_SESSION["ad"]." ".$_SESSION["soyad"]." " ; ?></span>
    <form id="cikisbtn" action="cikis.php">
        <button id="cikisbtn" name="cikisbtn"><img src="../img/cik.svg" width="24" height="24" > Çıkış Yap</button>
    </form>
</div>