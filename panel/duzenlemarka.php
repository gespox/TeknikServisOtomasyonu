<!doctype html>
<html lang="tr">
<head>
    <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="panelcss/markaekle.css">
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
$liste = $conn->query(" SELECT * FROM marka WHERE idmarka='$id'",
    PDO::FETCH_ASSOC);
?><?php
foreach ($liste as $row1){ ?>
<div id="ortala">
    <div id="formduzenlemarka"  >
        <h3>Eklemek İsteğiniz Marka</h3>

        <form method="post">
            <label for="markaadi">Marka Adı</label>
            <input type="text" id="markaadi" name="markaadi" value="<?php echo $row1['markaadi']; }?>" required>
            <input type="submit" value="Ekle" name="markaekle">
        </form>

        <?php

        if(isset($_POST["markaekle"])){
            require_once "../baglan.php";
            $markaadi=$_POST["markaadi"];
            $sql = "UPDATE marka set markaadi=:markaadi WHERE idmarka=$id";
            $stmt=$conn->prepare($sql);
            $stmt->bindParam(':markaadi',$markaadi);
            $stmt->execute();
            if($stmt){
                $alert = "Marka Eklendi";
                echo "<script type='text/javascript'>alert('$alert');</script>";
                include "../yonlendirme.php";
                yonlendir("markaekle.php");
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