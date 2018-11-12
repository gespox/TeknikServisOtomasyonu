<?php
/**
 * Created by PhpStorm.
 * User: Sait
 * Date: 9.11.2018
 * Time: 14:35
 */
?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css-js/css-index.css" rel="stylesheet" type="text/css">
    <!--<script src="css-js/js-index.js" type="text/javascript"></script>!-->
    <title>Document</title>
</head>
<body>
    <div class="container-div">
        <div id="left-div">
            <img class="img-left" src="img/technical-support.jpg" alt="Cinque Terre" width="100%" height="100%">
            <button class="button button-tekniker" onclick="document.getElementById('login1').style.display='block'" style="width:auto;">Tekniker Girişi</button>
        </div>
        <div id="right-div">
            <img class="img-right" src="img/musteriimg.jpg" alt="Cinque Terre" width="100%" height="100%">
            <button class="button button-musteri" >Müşteri Girişi</button>
        </div>

        <div id="login1" class="login-tekniker">


            <form class="form-tekniker" action="">


                <div class="container-form">
                    <span onclick="document.getElementById('login1').style.display='none'" class="close" title="Pencereyi Kapat">&times;</span>
                    <label for="uname"><b>Kullanıcı Adı</b></label>
                    <input type="text" placeholder="Kullanıcı Adınızı Girin" name="uname" required>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Şifrenizi Giriniz" name="psw" required>

                    <button class="btn login" type="submit">Giris Yap</button>
                    <div class="container-form" style="background-color:#f1f1f1">
                        <button type="button" onclick="document.getElementById('login1').style.display='none'" class="btn cancel">Cancel</button>
                        <span class="psw">Forgot <a href="#">password?</a></span>
                    </div>
                </div>


            </form>


        </div>

    </div>
    <script src="css-js/jquery/jquery-3.3.1.slim.min.js" type="text/javascript"></script>

    <script src="css-js/js-index.js" type="text/javascript"></script>
</body>
</html>
