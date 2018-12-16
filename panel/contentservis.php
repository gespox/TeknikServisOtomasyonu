<table id="servis">
    <tr >
        <th>Must.Ad Soyad</th>
        <th>Telefon</th>
        <th>Mail</th>
        <th>Marka</th>
        <th>Cihaz</th>
        <th>Seri No</th>
        <th>Model No</th>
        <th>Teslim Trh</th>
        <th>Açıklama</th>
        <th>Grnti</th>
        <th>Dznle</th>
        <th>Sil</th>
    </tr>
    <?php
    require_once "../baglan.php";
    $liste = $conn->query(" SELECT * FROM servis INNER JOIN musteri ON musteri.idmusteri=servis.musteriid 
                                    INNER JOIN cihaz ON servis.cihazid=cihaz.idcihaz
                                    INNER JOIN marka ON servis.markaid=marka.idmarka ",PDO::FETCH_ASSOC);

    foreach ($liste as $row) {
        echo "<tr>";
        echo "<td>" . $row["ad"]." ". $row["soyad"] . "</td>";
        echo "<td>" . $row["telefon"] . "</td>";
        echo "<td>" . $row["mail"] . "</td>";
        echo "<td>" . $row["markaadi"] . "</td>";
        echo "<td>" . $row["cihazadi"] . "</td>";
        echo "<td>" . $row["serino"] . "</td>";
        echo "<td>" . $row["modelno"] . "</td>";
        echo "<td>" . $row["teslimtarihi"] . "</td>";
        echo "<td>" . $row["aciklama"] . "</td>";
        if ($row["garanti"] == 1) {
            echo "<td>" . "Var" . "</td>";
        } else {
            echo "<td>" . "Yok" . "</td>";
        }

        echo "<td><a href="."duzenleservis.php?id=".$row["id"]." <button class=\"buttonduzenle\" >Duzenle</button></a></td>";
        echo "<td><a href="."silservis.php?id=".$row["id"]." <button class=\"buttonsil\" >Sil</button></a></td>";

        echo "<tr>";
    }
    ?>
</table>
<style><?php include('panelcss/servis.css'); ?></style>
<div id="formservis"  >
    <h3>Eklemek İsteğiniz Servis</h3>
    <form method="post">
        <label for="musteriad">Musteri Secin</label>
        <select name="musteriad" required>
            <?php
            require_once "../baglan.php";
            $liste1 = $conn->query(" SELECT * FROM musteri");
            $result=$liste1->fetchAll();
            foreach ($result as $row){
                echo "<option  value='".$row['idmusteri']."'>".$row['ad']." ".$row['soyad']."</option>";
            }
            ?>
        </select>
        <label for="marka">Cihaz Ve Marka Secin</label>
        <select name="marka" required>
            <?php
            require_once "../baglan.php";
            $liste1 = $conn->query(" SELECT * FROM cihaz INNER JOIN marka on cihaz.markaid=marka.idmarka");
            $result=$liste1->fetchAll();
            foreach ($result as $row){
                echo "<option  value='".$row['idcihaz']."|".$row['markaid']."'>". $row["cihazadi"]."--" .$row['markaadi']."</option>";} ?>
        </select>
        <label for="serino">Seri Numarasi</label>
        <input type="text" name="serino" placeholder="Seri Numarasini Girin" required>
        <label for="modelno">Model Numarasi</label>
        <input type="text" name="modelno" placeholder="Model Numarasini Girin" required>
        <label for="teslimtarihi">Teslim Tarihi</label>
        <input type="date" name="teslimtarihi" required>
        <label for="aciklama">Aciklama</label>
        <select name="aciklama" required>
            <option value="Kayit Yapildi">Kayit Yapildi</option>
            <option value="Inceleniyor">Inceleniyor</option>
            <option value="Beklemede">Beklemede</option>
            <option value="Teslime Hazir">Teslime Hazir</option>
            <option value="Teslim Edildi">Teslim Edildi</option>
        </select>
        <input type="radio" id="1" name="garanti" value="1">
        <label for="1"><b>Garanti Var mi?</b></label>
        <input type="submit" value="Ekle" name="servisekle">
    </form>
    <?php
    if(isset($_POST["servisekle"])){
        require_once "../baglan.php";
        $musteriid=$_POST["musteriad"];
        $markacihaz=$_POST["marka"];
        $cihaz=explode('|',$markacihaz);
        $markaid=$cihaz[1];
        $cihazid=$cihaz[0];
        $yetkiliid=$_SESSION['id'];
        $serino=$_POST["serino"];
        $modelno=$_POST["modelno"];
        $teslimtarihi=$_POST["teslimtarihi"];
        $aciklama=$_POST["aciklama"];
        if(isset($_POST["garanti"])){
        $garanti=$_POST["garanti"];
        }else{
            $garanti=0;
        }
        $sql = "INSERT INTO servis (musteriid,markaid,cihazid,yetkiliid,serino,modelno,teslimtarihi,aciklama,garanti) 
                  VALUES (:musteriid, :markaid,:cihazid,:yetkiliid,:serino ,:modelno ,:teslimtarihi,:aciklama ,:garanti)";
        $stmt=$conn->prepare($sql);
        $stmt->bindParam(':musteriid',$musteriid);
        $stmt->bindParam(':markaid',$markaid);
        $stmt->bindParam(':cihazid',$cihazid);
        $stmt->bindParam(':yetkiliid',$yetkiliid);
        $stmt->bindParam(':serino',$serino);
        $stmt->bindParam(':modelno',$modelno);
        $stmt->bindParam(':teslimtarihi',$teslimtarihi);
        $stmt->bindParam(':aciklama',$aciklama);
        $stmt->bindParam(':garanti',$garanti);
        $stmt->execute();
        if($stmt){
            echo "Servis Eklendi";
            include "../yonlendirme.php";
            yonlendir("servisekle.php");
        }
        else{
            $alert = "Hata Olustu";
            echo "<script type='text/javascript'>alert('$alert');</script>";
        }
    }
    ?>
</div>