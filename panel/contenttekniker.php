<div id="ekipekle">
<table id="ekip">
    <tr >
        <th>Kullanici Adi</th>
        <th>Ad</th>
        <th>Soyad</th>
    </tr>
    <?php
    require_once "../baglan.php";
    $liste = $conn->query(" SELECT * FROM yetkili", PDO::FETCH_ASSOC);
    foreach ($liste as $row) {
        echo "<tr>";
        echo "<td>" . $row["kadi"] . "</td>";
        echo "<td>" . $row["ad"] . "</td>";
        echo "<td>" . $row["soyad"] . "</td>";
        echo "<tr>";
    }
    ?>
</table>
<style><?php include('panelcss/ekip.css'); ?></style>
<div id="formekip"  >
    <h3>Eklemek İsteğiniz Tekniker</h3>
    <form method="post">
        <label for="kadi">Kullanici Adı</label>
        <input type="text" name="kadi" placeholder="Kullanici Adini Girin" required>
        <label for="sifre">Sifre</label>
        <input type="password" name="sifre" placeholder="Sifre Girin" required>
        <label for="ad">Ad</label>
        <input type="text" name="ad" placeholder="Isim Girin" required>
        <label for="soyad">Soyad</label>
        <input type="text" name="soyad" placeholder="Soyisim Girin" required>

        <input type="submit" value="Ekle" name="teknikerekle">
    </form>
    <?php
    if(isset($_POST["teknikerekle"])){
        require_once "../baglan.php";
        $kadi=$_POST["kadi"];
        $sifre=$_POST["sifre"];
        $ad=$_POST["ad"];
        $soyad=$_POST["soyad"];

        $sql = "INSERT INTO yetkili (kadi,sifre,ad,soyad) VALUES (:kadi,:sifre, :ad,:soyad)";
        $stmt=$conn->prepare($sql);
        $stmt->bindParam(':kadi',$kadi);
        $stmt->bindParam(':sifre',$sifre);
        $stmt->bindParam(':ad',$ad);
        $stmt->bindParam(':soyad',$soyad);
        $stmt->execute();
        if($stmt){
            include "../yonlendirme.php";
            yonlendir("teknikerekle.php");
        }
        else{
            $alert = "Hata Olustu";
            echo "<script type='text/javascript'>alert('$alert');</script>";
        }
    }
    ?>
</div>
</div>

