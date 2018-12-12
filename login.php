<?php
/*
    if(isset($_POST['girisbtn'])){
        require_once "baglan.php";
        ob_start();
        session_start();


        $kadi = $_POST["uname"];
        $parola = $_POST["psw"];
        $bul = mysqli_query($conn,"SELECT * FROM yetkili WHERE kadi = '$kadi' && sifre = '$parola'");
        $say = mysqli_fetch_array($bul);

        if ($say > 0){
            $_SESSION["session_adi"] = true;
            $_SESSION["kadi"] = $kadi;
            $_SESSION["sifre"] = $parola;

            echo "Giriş Başarılı";
            include "yonlendirme.php";
            yonlendir("teknikerpanel.php");
        }
        else {
            echo "Hatali Giris Yaptiniz";
        }
    }
*/
if(isset($_POST['girisbtn']))
{
    require_once "baglan.php";
    $uname=$_POST["uname"];
    $psw=$_POST["psw"];
    $sorgu=$conn->prepare("SELECT * FROM yetkili WHERE kadi=? and sifre=?");// sql yazarak verilerin doğruluğunu kontrol ediyoruz.
    $sorgu->execute(array($uname,$psw));//Kontrol edilecek olan değişkenleri yazdık
    $islem=$sorgu->fetch();// Burada sorguyu parcalayarak girilen bilgilerin karşılığı varmı dedik

    if($islem)// Karşığılı varsa buraya gir dedik
     {
         session_start();
         $_SESSION['uname'] = $islem['kadi'];// Giriş yaptığımız kullanici adımızı SEssion atadık
         $_SESSION['ad'] = $islem['ad'];
         $_SESSION['soyad'] = $islem['soyad'];
         $_SESSION['id'] = $islem['id'];
         include "yonlendirme.php";
         yonlendir("panel/teknikerpanel.php");//Yönlendirmemizi yapıyoruz.
     }
    else//Eğer girilen bilgiler eşleşmiyorsa
    {
        echo "Kullanıcı Adınız veya Şifreniz Yanlış";//Hatamızı Cevabını Yazdırdık.
        $message = "Kullanıcı Adınız veya Şifreniz Yanlış";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}

?>