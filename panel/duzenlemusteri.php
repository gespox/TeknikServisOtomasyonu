<!doctype html>
<html lang="tr">
<head>
    <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="panelcss/musteri.css">
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
$liste = $conn->query(" SELECT * FROM musteri WHERE idmusteri='$id'",
    PDO::FETCH_ASSOC);
?>
<div id="ortala">
    <div id="formmusteriduzenle"  >
        <h3>Duzenlemek İsteğiniz Musteri</h3>
        <form method="post">
            <?php
           foreach ($liste as $row1){ ?>
            <label for="musteriadi">Musteri Adı</label>
            <input type="text" name="musteriadi" value="<?php echo $row1['ad']; ?>" required>
            <label for="soyad">Soyad</label>
            <input type="text" name="soyad" value="<?php echo $row1['soyad']; ?>" required>
            <label for="telefon">Telefon</label>
            <input type="text" name="telefon" value="<?php echo $row1['telefon']; ?>" required>
            <label for="mail">E-Mail</label>
            <input type="text" name="mail" value="<?php echo $row1['mail']; ?>" required>
            <label for="adres">Adres</label>
            <textarea name="adres"><?php echo $row1['adres']; } ?></textarea>
            <input type="submit" value="Kaydet" name="musteriekle">
        </form>
        <?php
        if(isset($_POST["musteriekle"])){
            require_once "../baglan.php";
            $musteriad=$_POST["musteriadi"];
            $soyad=$_POST["soyad"];
            $telefon=$_POST["telefon"];
            $mail=$_POST["mail"];
            $adres=$_POST["adres"];

            $sql = "UPDATE musteri SET ad=:ad,soyad=:soyad,telefon=:telefon,mail=:mail,adres=:adres WHERE idmusteri=$id";
            $stmt=$conn->prepare($sql);
            $stmt->bindParam(':ad',$musteriad);
            $stmt->bindParam(':soyad',$soyad);
            $stmt->bindParam(':telefon',$telefon);
            $stmt->bindParam(':mail',$mail);
            $stmt->bindParam(':adres',$adres);
            $stmt->execute();
            if($stmt){
                echo "Musteri Duzenlendi";
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
</div>
</body>
</html>