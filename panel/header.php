<div class="logo">
    <a href="#">Teknik <span>Servis Otomasyonu</span></a>
</div>
<div class="bilgiler">
    <span>  <?php echo "Tekniker: ". $_SESSION["ad"]." ".$_SESSION["soyad"]." " ; ?></span>
    <form action="cikis.php">
        <button id="cikisbtn" name="cikisbtn"> Çıkış Yap</button>
    </form>
</div>