<!doctype html>
<html lang="tr">
<head>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&amp;subset=latin-ext" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="css-js/sorgu.css" type="text/css" rel="stylesheet">
    <title>Ürün Sorgu</title>
</head>
<body>

<div id="cnttablo">
<table id="tablo">
        <tr >
            <th>Musteri adi</th>
            <th>Soyad</th>
            <th>Telefon</th>
            <th>Mail</th>
            <th>Adres</th>
            <th>Seri No</th>
            <th>Model No</th>
            <th>Teslim tarihi</th>
            <th>Aciklama</th>
            <th>Garanti</th>
        </tr>
    <?php
     require_once "baglan.php";
        if(isset($_GET['tel'])) {
            $tel = $_GET['tel'];
            $liste = $conn->query("Select * from servis INNER JOIN musteri ON musteri.idmusteri=servis.musteriid", PDO::FETCH_ASSOC);
            $sorgu=0;
                foreach ($liste as $row) {
                    if ($row["telefon"] == $tel) {
                        echo "<tr>";
                        echo "<td>" . $row["ad"] . "</td>";
                        echo "<td>" . $row["soyad"] . "</td>";
                        echo "<td>" . $row["telefon"] . "</td>";
                        echo "<td>" . $row["mail"] . "</td>";
                        echo "<td>" . $row["adres"] . "</td>";
                        echo "<td>" . $row["serino"] . "</td>";
                        echo "<td>" . $row["modelno"] . "</td>";
                        echo "<td>" . $row["teslimtarihi"] . "</td>";
                        echo "<td>" . $row["aciklama"] . "</td>";
                        if ($row["garanti"] == 1) {
                            echo "<td>" . "Var" . "</td>";
                        } else {
                            echo "<td>" . "Yok" . "</td>";
                        }
                        echo "<tr>";
                        $sorgu+=1;
                    }
                }
                if ($sorgu==0){
                    hata2();
                }
        }
        else{
            hata();
        }
     ?>
</table>

</div>
<?php
function hata(){
    echo "<hr>"."LUTFEN " ."<a href='index.php'>ANASAYFADAN</a>". " TELEFON NUMARASINI DOGRU GIRDIGINIZE EMIN OLUN! "."<hr><br>";
}
function hata2(){
    echo "<hr>"."Girdiginiz Numaraya Ait Urun Bulunamadi." ."<a href='index.php'>ANASAYFADAN</a>". " TELEFON NUMARASINI DOGRU GIRDIGINIZE EMIN OLUN! "."<hr><br>";}

?>


</body>
</html>
