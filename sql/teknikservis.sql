-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 16 Ara 2018, 20:47:34
-- Sunucu sürümü: 10.1.36-MariaDB
-- PHP Sürümü: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `teknikservis`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cihaz`
--

CREATE TABLE `cihaz` (
  `idcihaz` int(11) NOT NULL,
  `cihazadi` varchar(50) NOT NULL,
  `markaid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `cihaz`
--

INSERT INTO `cihaz` (`idcihaz`, `cihazadi`, `markaid`) VALUES
(1, 'kzoom', 0),
(2, 'kzoom', 3),
(3, 'g300s', 5),
(4, 'HP2311gt', 1),
(5, 'galaxy9', 3),
(11, 'Vaperosso', 10),
(12, 'Hpl2', 11);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `marka`
--

CREATE TABLE `marka` (
  `idmarka` int(11) NOT NULL,
  `markaadi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `marka`
--

INSERT INTO `marka` (`idmarka`, `markaadi`) VALUES
(1, 'hp'),
(2, 'exper'),
(3, 'samsung'),
(4, 'iphone'),
(5, 'logitech'),
(10, 'Polar'),
(11, 'hiper');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `musteri`
--

CREATE TABLE `musteri` (
  `idmusteri` int(11) NOT NULL,
  `ad` varchar(50) NOT NULL,
  `soyad` varchar(50) NOT NULL,
  `telefon` int(20) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `adres` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `musteri`
--

INSERT INTO `musteri` (`idmusteri`, `ad`, `soyad`, `telefon`, `mail`, `adres`) VALUES
(1, 'Ahmet', 'Atlagelen', 123456, 'ahmet@ahmet.com', 'sivas'),
(2, 'Sait', 'Okan', 53776695, 'sait@yandex.com', 'Carsibasimah'),
(3, 'Can', 'Atari', 555555555, 'cancan@gmail.com', 'Kardesler Mah.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `servis`
--

CREATE TABLE `servis` (
  `id` int(11) NOT NULL,
  `musteriid` int(11) NOT NULL,
  `markaid` int(11) NOT NULL,
  `cihazid` int(11) NOT NULL,
  `yetkiliid` int(11) NOT NULL,
  `serino` varchar(50) NOT NULL,
  `modelno` varchar(50) NOT NULL,
  `teslimtarihi` date NOT NULL,
  `aciklama` varchar(50) NOT NULL,
  `garanti` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `servis`
--

INSERT INTO `servis` (`id`, `musteriid`, `markaid`, `cihazid`, `yetkiliid`, `serino`, `modelno`, `teslimtarihi`, `aciklama`, `garanti`) VALUES
(1, 1, 5, 3, 1, 'a1w3', '6547', '2018-12-01', 'Kayit Yapildi', 1),
(7, 2, 11, 12, 1, 's3r1n0', 'M0d31N0', '2018-12-01', 'Teslim Edildi', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yetkili`
--

CREATE TABLE `yetkili` (
  `id` int(11) NOT NULL,
  `kadi` varchar(50) NOT NULL,
  `sifre` varchar(50) NOT NULL,
  `ad` varchar(50) NOT NULL,
  `soyad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `yetkili`
--

INSERT INTO `yetkili` (`id`, `kadi`, `sifre`, `ad`, `soyad`) VALUES
(1, 'admin', 'admin', 'Admin', 'admin'),
(2, 'cafer', 'cafer', 'Cafer', 'Usta');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `cihaz`
--
ALTER TABLE `cihaz`
  ADD PRIMARY KEY (`idcihaz`),
  ADD KEY `markaid` (`markaid`);

--
-- Tablo için indeksler `marka`
--
ALTER TABLE `marka`
  ADD PRIMARY KEY (`idmarka`);

--
-- Tablo için indeksler `musteri`
--
ALTER TABLE `musteri`
  ADD PRIMARY KEY (`idmusteri`);

--
-- Tablo için indeksler `servis`
--
ALTER TABLE `servis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `musteriid` (`musteriid`),
  ADD KEY `markaid` (`markaid`),
  ADD KEY `cihazid` (`cihazid`),
  ADD KEY `yetkiliid` (`yetkiliid`);

--
-- Tablo için indeksler `yetkili`
--
ALTER TABLE `yetkili`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `cihaz`
--
ALTER TABLE `cihaz`
  MODIFY `idcihaz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `marka`
--
ALTER TABLE `marka`
  MODIFY `idmarka` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `musteri`
--
ALTER TABLE `musteri`
  MODIFY `idmusteri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `servis`
--
ALTER TABLE `servis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `yetkili`
--
ALTER TABLE `yetkili`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `servis`
--
ALTER TABLE `servis`
  ADD CONSTRAINT `servis_ibfk_1` FOREIGN KEY (`yetkiliid`) REFERENCES `yetkili` (`id`),
  ADD CONSTRAINT `servis_ibfk_2` FOREIGN KEY (`musteriid`) REFERENCES `musteri` (`idmusteri`),
  ADD CONSTRAINT `servis_ibfk_3` FOREIGN KEY (`cihazid`) REFERENCES `cihaz` (`idcihaz`),
  ADD CONSTRAINT `servis_ibfk_4` FOREIGN KEY (`markaid`) REFERENCES `marka` (`idmarka`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
