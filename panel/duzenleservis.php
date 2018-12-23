<!doctype html>
<html lang="tr">
<head>
    <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="panelcss/servis.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Duzenle</title>
</head>
<body>
<?php
session_start();
    require_once "../baglan.php";
$id = $_GET['id'];
$liste = $conn->query(" SELECT * FROM servis WHERE id='$id'",
    PDO::FETCH_ASSOC);
?>
<div id="ortala">
<div id="formservisduzenle"  >
    <h3>Guncellemek İsteğiniz Servis</h3>
    <form method="post">
        <label for="musteriad">Musteri Secin,(Secili Musteri =
            <?php
           foreach ($liste as $row1){
            $liste2 = $conn->query("SELECT ad,soyad FROM musteri where idmusteri=" .$row1['musteriid'], PDO::FETCH_ASSOC);
            foreach ($liste2 as $musteri){ echo $musteri['ad']." ".$musteri['soyad'];   }?>) </label>
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
        <label for="marka">Cihaz Ve Marka Secin, (Secili Cihaz =
            <?php $liste2 = $conn->query("SELECT * FROM cihaz INNER JOIN marka on cihaz.markaid=marka.idmarka where cihaz.idcihaz=" .$row1['cihazid'], PDO::FETCH_ASSOC);
            foreach ($liste2 as $cihaz){ echo $cihaz['cihazadi']." / ".$cihaz['markaadi'];   }?>)</label>
        <select name="marka" required>
            <?php
            require_once "../baglan.php";
            $liste1 = $conn->query(" SELECT * FROM cihaz INNER JOIN marka on cihaz.markaid=marka.idmarka");
            $result=$liste1->fetchAll();
            foreach ($result as $row){
                echo "<option  value='".$row['idcihaz']."|".$row['markaid']."'>". $row["cihazadi"]." / " .$row['markaadi']."</option>";} ?>
        </select>
        <label for="serino">Seri Numarasi</label>
        <input type="text" name="serino" value="<?php echo $row1['serino']; ?>" required>
        <label for="modelno">Model Numarasi</label>
        <input type="text" name="modelno" placeholder="Model Numarasini Girin" value="<?php echo $row1['modelno']; ?>" required>
        <label for="teslimtarihi">Teslim Tarihi</label>
        <input type="date" name="teslimtarihi" value="<?php echo $row1['teslimtarihi']; ?>" required>

        <label for="aciklama">Aciklama, (Onceki Acikama =
            <?php echo $row1['aciklama'];  ?> )</label>
        <select name="aciklama" required>
            <option value="Kayit Yapildi">Kayit Yapildi</option>
            <option value="Inceleniyor">Inceleniyor</option>
            <option value="Beklemede">Beklemede</option>
            <option value="Teslime Hazir">Teslime Hazir</option>
            <option value="Teslim Edildi">Teslim Edildi</option>
        </select>
        <input type="radio" id="1" name="garanti" value="1">
        <label for="1"><b>Garanti Var mi? </b>(<?php if( $row1['aciklama']){
                echo "Onceki Garanti : Var";
                }else{echo "Onceki Garanti : Yok"; }
           }?>)</label>
        <input type="submit" value="Guncelle" name="servisekle">
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
        $sql = "UPDATE servis SET musteriid=:musteriid,markaid=:markaid,cihazid=:cihazid,yetkiliid=:yetkiliid,serino=:serino,modelno=:modelno,
teslimtarihi=:teslimtarihi,aciklama=:aciklama,garanti=:garanti WHERE id='$id'";
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
</div>
</body>
</html>