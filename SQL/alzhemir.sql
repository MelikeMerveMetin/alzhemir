-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 11 Oca 2024, 13:24:46
-- Sunucu sürümü: 10.4.27-MariaDB
-- PHP Sürümü: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `alzhemir`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `aile_uyeleri`
--

CREATE TABLE `aile_uyeleri` (
  `id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `uye_adi` text NOT NULL,
  `uye_resim` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `aile_uyeleri`
--

INSERT INTO `aile_uyeleri` (`id`, `kullanici_id`, `uye_adi`, `uye_resim`) VALUES
(1, 13, 'Ahmet ', 'resimler/amca.jpg'),
(2, 16, 'hasan', 'resimler/cocuk.jpg'),
(3, 13, 'Havva', 'resimler/teyze.jpg'),
(5, 13, 'Hafize', 'resimler/cocuk.jpg'),
(18, 13, 'Mehmet', 'resimler/amca2.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `genel_test_sorulari`
--

CREATE TABLE `genel_test_sorulari` (
  `id` int(11) NOT NULL,
  `genel_resim` text NOT NULL,
  `dogru` text NOT NULL,
  `test_adi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `genel_test_sorulari`
--

INSERT INTO `genel_test_sorulari` (`id`, `genel_resim`, `dogru`, `test_adi`) VALUES
(1, 'resimler/genel_resim/buzdolabı.png', 'Buzdolabı', '1'),
(2, 'resimler/genel_resim/elbise_dolabı.png', 'Elbise Dolabı', '1'),
(3, 'resimler/genel_resim/avize.png', 'Avize', '1'),
(4, 'resimler/genel_resim/televizyon.png', 'Televizyon', '1'),
(5, 'resimler/genel_resim/koltuk.png', 'Koltuk', '2'),
(6, 'resimler/genel_resim/yemek_masası.png', 'Yemek Masası', '2'),
(7, 'resimler/genel_resim/kapi.png', 'Kapı', '3'),
(8, 'resimler/genel_resim/yatak.png', 'Yatak', '2');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `id` int(15) NOT NULL,
  `kullanici_adi` text NOT NULL,
  `kullanici_soyadi` text NOT NULL,
  `email` text NOT NULL,
  `parola` text NOT NULL,
  `yonetim` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`id`, `kullanici_adi`, `kullanici_soyadi`, `email`, `parola`, `yonetim`) VALUES
(17, 'zeynep', 'metin', 'zeynep@gmail.com', '202cb962ac59075b964b07152d234b70', 0),
(22, 'fatma', 'metin', 'fatma@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(29, 'Melike', 'Metin', 'melike.metin.99@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ozel_test`
--

CREATE TABLE `ozel_test` (
  `id` int(11) NOT NULL,
  `soru` text NOT NULL,
  `a` text NOT NULL,
  `b` text NOT NULL,
  `c` text NOT NULL,
  `d` text NOT NULL,
  `dogru` text NOT NULL,
  `kullanici_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ozel_test`
--

INSERT INTO `ozel_test` (`id`, `soru`, `a`, `b`, `c`, `d`, `dogru`, `kullanici_id`) VALUES
(5, 'Doğum tarihin kaçtır?', '23 Ocak 1956', '25 Şubat 1987', '12 Aralık 1975', '12 Nisan 1960', '12 Nisan 1960', 13),
(6, 'Kaç çocuğun var?', '1', '3', '5', '4', '3', 13),
(7, 'Hangisi çocuğunun ismi değil?', 'Ayşe ', 'Fatma', 'Mehmet', 'Osman', 'Fatma', 13),
(8, 'Eşinin ismi nedir?', 'Ahmet', 'Mehmet', 'Hasan', 'Hüseyin', 'Hasan', 13);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sonuclar`
--

CREATE TABLE `sonuclar` (
  `id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `test_turu` text NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dogru_sayisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sonuclar`
--

INSERT INTO `sonuclar` (`id`, `kullanici_id`, `test_turu`, `tarih`, `dogru_sayisi`) VALUES
(31, 17, 'Aile Testi', '2022-05-29 14:18:54', 10),
(32, 13, 'Genel Test 1', '2022-05-15 14:19:35', 3),
(33, 13, 'Genel Test 1', '2022-06-12 20:35:07', 0),
(34, 13, 'Genel Test 2', '2022-06-26 11:35:18', 1),
(35, 13, 'Genel Test 2', '2022-06-11 21:35:13', 0),
(36, 13, 'Genel Test 1', '2022-06-26 11:35:48', 1),
(37, 13, 'Genel Test 3', '2022-06-29 11:35:52', 0),
(38, 13, 'Genel Test 2', '2022-06-29 11:35:56', 0),
(39, 13, 'Genel Test 3', '2022-06-26 11:35:25', 4),
(40, 13, 'Genel Test 1', '2022-06-29 11:36:01', 1),
(41, 13, 'Aile Testi', '2022-06-02 21:11:26', 3),
(42, 13, 'Aile Testi', '2022-06-05 14:17:01', 0),
(43, 13, 'Aile Testi', '2022-06-06 17:20:32', 1),
(44, 13, 'Aile Testi', '2022-06-10 10:45:09', 1),
(45, 13, 'Genel Test 1', '2022-06-29 11:36:07', 3),
(46, 13, 'Aile Testi', '2022-06-12 14:21:21', 3),
(48, 13, 'Genel Test 2', '2022-06-12 15:06:17', 3),
(49, 13, 'Genel Test 3', '2022-06-12 14:27:21', 1),
(50, 13, 'Aile Testi', '2022-06-30 16:43:13', 0),
(51, 13, 'Özel Test', '2022-06-30 21:00:00', 2),
(52, 13, 'Özel Test', '2022-06-30 21:00:00', 2);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `aile_uyeleri`
--
ALTER TABLE `aile_uyeleri`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `genel_test_sorulari`
--
ALTER TABLE `genel_test_sorulari`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ozel_test`
--
ALTER TABLE `ozel_test`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sonuclar`
--
ALTER TABLE `sonuclar`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `aile_uyeleri`
--
ALTER TABLE `aile_uyeleri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Tablo için AUTO_INCREMENT değeri `genel_test_sorulari`
--
ALTER TABLE `genel_test_sorulari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Tablo için AUTO_INCREMENT değeri `ozel_test`
--
ALTER TABLE `ozel_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `sonuclar`
--
ALTER TABLE `sonuclar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
