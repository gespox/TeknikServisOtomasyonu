<?php
/*
$servername = "localhost";
$username = "root";
$password = "";
$dbase= "teknikservis";
$conn=new mysqli($servername,$username,$password);
if ($conn->connect_error) {
    die("Baglanti Hatasi: " . $conn->connect_error);
}
mysqli_select_db($conn,$dbase) or die("Veritabanina Baglanilamadi");
mysqli_set_charset($conn,'utf8');

*/
/*
@$baglanti = new mysqli('localhost', 'gespox', '123456', 'teknikservis12'); // Veritabanı bağlantımızı yapıyoruz.
    if(mysqli_connect_error()) //Eğer hata varsa yazdırıyoruz
    {
        echo mysqli_connect_error();
        exit; //eğer bağlantıda hata varsa PHP çalışmasını sonlandırıyoruz.
    }

$baglanti->set_charset("utf8"); // Türkçe karakter sorunu olmaması için utf8'e çeviriyoruz.
*/

$servername = "localhost";
$username = "root";
$password = "";
$dbase= "teknikservis";
/*
$servername = "localhost";
$username = "gespox";
$password = "123456";
$dbase="teknikservis12";*/
try{
    $conn=new PDO("mysql:host=$servername;dbname=$dbase;charset=utf8","$username","$password");
}catch (PDOException $error){
    echo "VERI TABANI BAGLANTISI SAGLANAMADI !";
    die($error->getMessage());
}
?>
