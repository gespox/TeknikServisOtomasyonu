<table id="musteri">
    <tr >
        <th>Ad</th>
        <th>Soyad</th>
        <th>Telefon</th>
        <th>E-Mail</th>
        <th>Adres</th>
    </tr>
    <?php
    require_once "../baglan.php";
    $liste = $conn->query(" SELECT * FROM musteri", PDO::FETCH_ASSOC);
    foreach ($liste as $row) {
        echo "<tr>";
        echo "<td>" . $row["ad"] . "</td>";
        echo "<td>" . $row["soyad"] . "</td>";
        echo "<td>" . $row["telefon"] . "</td>";
        echo "<td>" . $row["mail"] . "</td>";
        echo "<td>" . $row["adres"] . "</td>";
        echo "<tr>";
    }
    ?>
</table>
<style><?php include('panelcss/musteri.css'); ?></style>
<div id="formmusteri"  >
    <h3>Eklemek İsteğiniz Musteri</h3>
    <form method="post">
        <label for="musteriadi">Musteri Adı</label>
        <input type="text" name="musteriadi" placeholder="Musteri Adini Girin" required>
        <label for="soyad">Soyad</label>
        <input type="text" name="soyad" placeholder="Soyadini Girin" required>
        <label for="telefon">Telefon</label>
        <input type="text" name="telefon" placeholder="Telefon Numarasini Girin" required>
        <label for="mail">E-Mail</label>
        <input type="text" name="mail" placeholder="E-Mail Girin" required>
        <label for="adres">Adres</label>
        <textarea name="adres" placeholder="Adresi Giriniz"></textarea>
        <input type="submit" value="Ekle" name="musteriekle">
    </form>
    <?php
    if(isset($_POST["musteriekle"])){
        require_once "../baglan.php";
        $musteriad=$_POST["musteriadi"];
        $soyad=$_POST["soyad"];
        $telefon=$_POST["telefon"];
        $mail=$_POST["mail"];
        $adres=$_POST["adres"];

        $sql = "INSERT INTO musteri (ad,soyad,telefon,mail,adres) VALUES (:ad, :soyad,:telefon,:mail,:adres)";
        $stmt=$conn->prepare($sql);
        $stmt->bindParam(':ad',$musteriad);
        $stmt->bindParam(':soyad',$soyad);
        $stmt->bindParam(':telefon',$telefon);
        $stmt->bindParam(':mail',$mail);
        $stmt->bindParam(':adres',$adres);
        $stmt->execute();
        if($stmt){
            echo "Musteri Eklendi";
            include "../yonlendirme.php";
            yonlendir("musteriekle.php");
        }
        else{
            $alert = "Hata Olustu";
            echo "<script type='text/javascript'>alert('$alert');</script>";
        }
    }
    ?>
</div>


