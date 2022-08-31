-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 29 Haz 2022, 15:10:52
-- Sunucu sürümü: 10.4.13-MariaDB
-- PHP Sürümü: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `stajtakipotomasyonu`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `baskanlar`
--

CREATE TABLE `baskanlar` (
  `baskan_id` int(11) NOT NULL,
  `baskan_adi` varchar(50) DEFAULT NULL,
  `baskan_soyadi` varchar(50) DEFAULT NULL,
  `baskan_mail` varchar(50) DEFAULT NULL,
  `baskan_sifre` varchar(16) DEFAULT NULL,
  `baskan_telno` int(11) DEFAULT NULL,
  `baskan_bolum_id` int(11) NOT NULL,
  `baskan_resim` varchar(50) DEFAULT NULL,
  `Durumu` tinyint(1) DEFAULT NULL,
  `Silinme_Durumu` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Tablo döküm verisi `baskanlar`
--

INSERT INTO `baskanlar` (`baskan_id`, `baskan_adi`, `baskan_soyadi`, `baskan_mail`, `baskan_sifre`, `baskan_telno`, `baskan_bolum_id`, `baskan_resim`, `Durumu`, `Silinme_Durumu`) VALUES
(1, 'Levent ', 'Civcik', 'levent@gmail.com', '123456', 2147483647, 1, 'leventcivcik.jpg', 3, 0),
(2, 'Mustafa', 'Tekir', 'mustafatekir@gmail.com', '123456', 551137350, 3, 'abdulllah.jpg', 3, 0),
(3, 'Zühre', 'Çalık', 'zühre.calik@gmail.com', '123456', 2147483647, 2, 'zühre.jpg', 3, 0),
(4, 'Zeliha', 'Tabur', 'zlhatbr@gmail.com', '123456', 51137355, 4, 'zeliha.jpg', 3, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bilgi_islem`
--

CREATE TABLE `bilgi_islem` (
  `Bilgi_islem_id` int(11) NOT NULL,
  `Bilgi_islem_mail` varchar(50) DEFAULT NULL,
  `Bilgi_islem_sifre` varchar(16) DEFAULT NULL,
  `Durumu` int(11) DEFAULT NULL,
  `Silinme_Durumu` tinyint(1) DEFAULT NULL,
  `StajBaslangicTarihi` date DEFAULT NULL,
  `StajBitisTarihi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Tablo döküm verisi `bilgi_islem`
--

INSERT INTO `bilgi_islem` (`Bilgi_islem_id`, `Bilgi_islem_mail`, `Bilgi_islem_sifre`, `Durumu`, `Silinme_Durumu`, `StajBaslangicTarihi`, `StajBitisTarihi`) VALUES
(1, 'bilgiislem@gmail.com', '123456', 4, 0, '2022-07-04', '2022-08-12');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bolumler`
--

CREATE TABLE `bolumler` (
  `bolum_id` int(11) NOT NULL,
  `bolum_adi` varchar(255) NOT NULL,
  `BaslangicTarihi` date DEFAULT NULL,
  `BitisTarihi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Tablo döküm verisi `bolumler`
--

INSERT INTO `bolumler` (`bolum_id`, `bolum_adi`, `BaslangicTarihi`, `BitisTarihi`) VALUES
(1, 'Bilgisayar Programcılığı', NULL, NULL),
(2, 'Gıda', NULL, NULL),
(3, 'Elektronik', NULL, NULL),
(4, 'İnşaat', NULL, NULL),
(6, 'Mühendislik', NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `danismanlar`
--

CREATE TABLE `danismanlar` (
  `danisman_id` int(11) NOT NULL,
  `danisman_adi` varchar(50) DEFAULT NULL,
  `danisman_soyadi` varchar(50) DEFAULT NULL,
  `danisman_email` varchar(20) DEFAULT NULL,
  `danisman_sifre` varchar(20) NOT NULL,
  `danisman_resim` varchar(40) DEFAULT NULL,
  `danisman_bolum_id` int(11) DEFAULT NULL,
  `Durumu` int(11) DEFAULT NULL,
  `Silinme_Durumu` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Tablo döküm verisi `danismanlar`
--

INSERT INTO `danismanlar` (`danisman_id`, `danisman_adi`, `danisman_soyadi`, `danisman_email`, `danisman_sifre`, `danisman_resim`, `danisman_bolum_id`, `Durumu`, `Silinme_Durumu`) VALUES
(1, 'Mehmet', 'Balci', 'danisman@gmail.com', '123456', 'balci.jpg', 1, 2, 0),
(2, 'Furkan', 'Ergin', 'frkn@gmail.com', '123456', 'furkan.jpg', 3, 2, 0),
(3, 'Mustafa', 'Tarı', 'mustafa@gmail.com', '123456', 'tari.jpg', 1, 2, 0),
(4, 'Ahmet', 'Ceylan', 'ahmetcyl@gmail.com', '123456', 'ahmet.jpg', 2, 2, 0),
(5, 'Asım', 'Avcı', 'asmavc@gmail.com', '123456', 'asım.jpg', 2, 2, 0),
(6, 'Halil İbrahim', 'Danabaş', 'halilibo@gmail.com', '123456', 'halilibo.jpg', 3, 2, 0),
(7, 'Ali', 'Büyükkeleş', 'alibykls@gmail.com', '123456', 'ali.jpg', 4, 2, 0),
(8, 'Alperen', 'Kuşçalı', 'alperen@gmail.com', '123456', 'alperen.jpg', 4, 2, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `il`
--

CREATE TABLE `il` (
  `il_no` int(11) NOT NULL,
  `il_isim` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Tablo döküm verisi `il`
--

INSERT INTO `il` (`il_no`, `il_isim`) VALUES
(1, 'Adana'),
(2, 'Adıyaman'),
(3, 'Afyonkarahisar'),
(4, 'Ağrı'),
(5, 'Amasya'),
(6, 'Ankara'),
(7, 'Antalya'),
(8, 'Artvin'),
(9, 'Aydın'),
(10, 'Balıkesir'),
(11, 'Bilecik'),
(12, 'Bingöl'),
(13, 'Bitlis'),
(14, 'Bolu'),
(15, 'Burdur'),
(16, 'Bursa'),
(17, 'Çanakkale'),
(18, 'Çankırı'),
(19, 'Çorum'),
(20, 'Denizli'),
(21, 'Diyarbakır'),
(22, 'Edirne'),
(23, 'Elâzığ'),
(24, 'Erzincan'),
(25, 'Erzurum'),
(26, 'Eskişehir'),
(27, 'Gaziantep'),
(28, 'Giresun'),
(29, 'Gümüşhane'),
(30, 'Hakkâri'),
(31, 'Hatay'),
(32, 'Isparta'),
(33, 'Mersin'),
(34, 'İstanbul'),
(35, 'İzmir'),
(36, 'Kars'),
(37, 'Kastamonu'),
(38, 'Kayseri'),
(39, 'Kırklareli'),
(40, 'Kırşehir'),
(41, 'Kocaeli'),
(42, 'Konya'),
(43, 'Kütahya'),
(44, 'Malatya'),
(45, 'Manisa'),
(46, 'Kahramanmaraş'),
(47, 'Mardin'),
(48, 'Muğla'),
(49, 'Muş'),
(50, 'Nevşehir'),
(51, 'Niğde'),
(52, 'Ordu'),
(53, 'Rize'),
(54, 'Sakarya'),
(55, 'Samsun'),
(56, 'Siirt'),
(57, 'Sinop'),
(58, 'Sivas'),
(59, 'Tekirdağ'),
(60, 'Tokat'),
(61, 'Trabzon'),
(62, 'Tunceli'),
(63, 'Şanlıurfa'),
(64, 'Uşak'),
(65, 'Van'),
(66, 'Yozgat'),
(67, 'Zonguldak'),
(68, 'Aksaray'),
(69, 'Bayburt'),
(70, 'Karaman'),
(71, 'Kırıkkale'),
(72, 'Batman'),
(73, 'Şırnak'),
(74, 'Bartın'),
(75, 'Ardahan'),
(76, 'Iğdır'),
(77, 'Yalova'),
(78, 'Karabük'),
(79, 'Kilis'),
(80, 'Osmaniye'),
(81, 'Düzce');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ilce`
--

CREATE TABLE `ilce` (
  `ilce_no` int(11) NOT NULL,
  `ilce_isim` varchar(55) DEFAULT NULL,
  `il_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Tablo döküm verisi `ilce`
--

INSERT INTO `ilce` (`ilce_no`, `ilce_isim`, `il_no`) VALUES
(1, 'Abana', 37),
(2, 'Acıgöl', 50),
(3, 'Acıpayam', 20),
(4, 'Adaklı', 12),
(5, 'Adalar', 34),
(6, 'Adapazarı', 54),
(7, 'Adıyaman', 2),
(8, 'Adilcevaz', 13),
(9, 'Afşin', 46),
(10, 'Afyonkarahisar', 3),
(11, 'Ağaçören', 68),
(12, 'Ağın', 23),
(13, 'Ağlasun', 15),
(14, 'Ağlı', 37),
(15, 'Ağrı', 4),
(16, 'Ahırlı', 42),
(17, 'Ahlat', 13),
(18, 'Ahmetli', 45),
(19, 'Akçaabat', 61),
(20, 'Akçadağ', 44),
(21, 'Akçakale', 63),
(22, 'Akçakent', 40),
(23, 'Akçakoca', 81),
(24, 'Akdağmadeni', 66),
(25, 'Akdeniz', 33),
(26, 'Akhisar', 45),
(27, 'Akıncılar', 58),
(28, 'Akkışla', 38),
(29, 'Akkuş', 52),
(30, 'Akören', 42),
(31, 'Akpınar', 40),
(32, 'Aksaray', 68),
(33, 'Akseki', 7),
(34, 'Aksu', 7),
(35, 'Aksu', 32),
(36, 'Akşehir', 42),
(37, 'Akyaka', 36),
(38, 'Akyazı', 54),
(39, 'Akyurt', 6),
(40, 'Alaca', 19),
(41, 'Alacakaya', 23),
(42, 'Alaçam', 55),
(43, 'Aladağ', 1),
(44, 'Alanya', 7),
(45, 'Alaplı', 67),
(46, 'Alaşehir', 45),
(47, 'Aliağa', 35),
(48, 'Almus', 60),
(49, 'Alpu', 26),
(50, 'Altıeylül', 10),
(51, 'Altındağ', 6),
(52, 'Altınekin', 42),
(53, 'Altınordu', 52),
(54, 'Altınova', 77),
(55, 'Altınözü', 31),
(56, 'Altıntaş', 43),
(57, 'Altınyayla', 15),
(58, 'Altınyayla', 58),
(59, 'Altunhisar', 51),
(60, 'Alucra', 28),
(61, 'Amasra', 74),
(62, 'Amasya', 5),
(63, 'Anamur', 33),
(64, 'Andırın', 46),
(65, 'Antakya', 31),
(66, 'Araban', 27),
(67, 'Araç', 37),
(68, 'Araklı', 61),
(69, 'Aralık', 76),
(70, 'Arapgir', 44),
(71, 'Ardahan', 75),
(72, 'Ardanuç', 8),
(73, 'Ardeşen', 53),
(74, 'Arguvan', 44),
(75, 'Arhavi', 8),
(76, 'Arıcak', 23),
(77, 'Arifiye', 54),
(78, 'Armutlu', 77),
(79, 'Arnavutköy', 34),
(80, 'Arpaçay', 36),
(81, 'Arsin', 61),
(82, 'Arsuz', 31),
(83, 'Artova', 60),
(84, 'Artuklu', 47),
(85, 'Artvin', 8),
(86, 'Asarcık', 55),
(87, 'Aslanapa', 43),
(88, 'Aşkale', 25),
(89, 'Atabey', 32),
(90, 'Atakum', 55),
(91, 'Ataşehir', 34),
(92, 'Atkaracalar', 18),
(93, 'Avanos', 50),
(94, 'Avcılar', 34),
(95, 'Ayancık', 57),
(96, 'Ayaş', 6),
(97, 'Aybastı', 52),
(98, 'Aydıncık', 33),
(99, 'Aydıncık', 66),
(100, 'Aydıntepe', 69),
(101, 'Ayrancı', 70),
(102, 'Ayvacık', 17),
(103, 'Ayvacık', 55),
(104, 'Ayvalık', 10),
(105, 'Azdavay', 37),
(106, 'Aziziye', 25),
(107, 'Babadağ', 20),
(108, 'Babaeski', 39),
(109, 'Bafra', 55),
(110, 'Bağcılar', 34),
(111, 'Bağlar', 21),
(112, 'Bahçe', 80),
(113, 'Bahçelievler', 34),
(114, 'Bahçesaray', 65),
(115, 'Bahşili', 71),
(116, 'Bakırköy', 34),
(117, 'Baklan', 20),
(118, 'Bala', 6),
(119, 'Balçova', 35),
(120, 'Balışeyh', 71),
(121, 'Balya', 10),
(122, 'Banaz', 64),
(123, 'Bandırma', 10),
(124, 'Bartın', 74),
(125, 'Baskil', 23),
(126, 'Başakşehir', 34),
(127, 'Başçiftlik', 60),
(128, 'Başiskele', 41),
(129, 'Başkale', 65),
(130, 'Başmakçı', 3),
(131, 'Başyayla', 70),
(132, 'Batman', 72),
(133, 'Battalgazi', 44),
(134, 'Bayat', 3),
(135, 'Bayat', 19),
(136, 'Bayburt', 69),
(137, 'Bayındır', 35),
(138, 'Baykan', 56),
(139, 'Bayraklı', 35),
(140, 'Bayramiç', 17),
(141, 'Bayramören', 18),
(142, 'Bayrampaşa', 34),
(143, 'Bekilli', 20),
(144, 'Belen', 31),
(145, 'Bergama', 35),
(146, 'Besni', 2),
(147, 'Beşikdüzü', 61),
(148, 'Beşiktaş', 34),
(149, 'Beşiri', 72),
(150, 'Beyağaç', 20),
(151, 'Beydağ', 35),
(152, 'Beykoz', 34),
(153, 'Beylikdüzü', 34),
(154, 'Beylikova', 26),
(155, 'Beyoğlu', 34),
(156, 'Beypazarı', 6),
(157, 'Beyşehir', 42),
(158, 'Beytüşşebap', 73),
(159, 'Biga', 17),
(160, 'Bigadiç', 10),
(161, 'Bilecik', 11),
(162, 'Bingöl', 12),
(163, 'Birecik', 63),
(164, 'Bismil', 21),
(165, 'Bitlis', 13),
(166, 'Bodrum', 48),
(167, 'Boğazkale', 19),
(168, 'Boğazlıyan', 66),
(169, 'Bolu', 14),
(170, 'Bolvadin', 3),
(171, 'Bor', 51),
(172, 'Borçka', 8),
(173, 'Bornova', 35),
(174, 'Boyabat', 57),
(175, 'Bozcaada', 17),
(176, 'Bozdoğan', 9),
(177, 'Bozkır', 42),
(178, 'Bozkurt', 20),
(179, 'Bozkurt', 37),
(180, 'Bozova', 63),
(181, 'Boztepe', 40),
(182, 'Bozüyük', 11),
(183, 'Bozyazı', 33),
(184, 'Buca', 35),
(185, 'Bucak', 15),
(186, 'Buharkent', 9),
(187, 'Bulancak', 28),
(188, 'Bulanık', 49),
(189, 'Buldan', 20),
(190, 'Burdur', 15),
(191, 'Burhaniye', 10),
(192, 'Bünyan', 38),
(193, 'Büyükçekmece', 34),
(194, 'Büyükorhan', 16),
(195, 'Canik', 55),
(196, 'Ceyhan', 1),
(197, 'Ceylanpınar', 63),
(198, 'Cide', 37),
(199, 'Cihanbeyli', 42),
(200, 'Cizre', 73),
(201, 'Cumayeri', 81),
(202, 'Çağlayancerit', 46),
(203, 'Çal', 20),
(204, 'Çaldıran', 65),
(205, 'Çamardı', 51),
(206, 'Çamaş', 52),
(207, 'Çameli', 20),
(208, 'Çamlıdere', 6),
(209, 'Çamlıhemşin', 53),
(210, 'Çamlıyayla', 33),
(211, 'Çamoluk', 28),
(212, 'Çan', 17),
(213, 'Çanakçı', 28),
(214, 'Çanakkale', 17),
(215, 'Çandır', 66),
(216, 'Çankaya', 6),
(217, 'Çankırı', 18),
(218, 'Çardak', 20),
(219, 'Çarşamba', 55),
(220, 'Çarşıbaşı', 61),
(221, 'Çat', 25),
(222, 'Çatak', 65),
(223, 'Çatalca', 34),
(224, 'Çatalpınar', 52),
(225, 'Çatalzeytin', 37),
(226, 'Çavdarhisar', 43),
(227, 'Çavdır', 15),
(228, 'Çay', 3),
(229, 'Çaybaşı', 52),
(230, 'Çaycuma', 67),
(231, 'Çayeli', 53),
(232, 'Çayıralan', 66),
(233, 'Çayırlı', 24),
(234, 'Çayırova', 41),
(235, 'Çaykara', 61),
(236, 'Çekerek', 66),
(237, 'Çekmeköy', 34),
(238, 'Çelebi', 71),
(239, 'Çelikhan', 2),
(240, 'Çeltik', 42),
(241, 'Çeltikçi', 15),
(242, 'Çemişgezek', 62),
(243, 'Çerkeş', 18),
(244, 'Çerkezköy', 59),
(245, 'Çermik', 21),
(246, 'Çeşme', 35),
(247, 'Çıldır', 75),
(248, 'Çınar', 21),
(249, 'Çınarcık', 77),
(250, 'Çiçekdağı', 40),
(251, 'Çifteler', 26),
(252, 'Çiftlik', 51),
(253, 'Çiftlikköy', 77),
(254, 'Çiğli', 35),
(255, 'Çilimli', 81),
(256, 'Çine', 9),
(257, 'Çivril', 20),
(258, 'Çobanlar', 3),
(259, 'Çorlu', 59),
(260, 'Çorum', 19),
(261, 'Çubuk', 6),
(262, 'Çukurca', 30),
(263, 'Çukurova', 1),
(264, 'Çumra', 42),
(265, 'Çüngüş', 21),
(266, 'Daday', 37),
(267, 'Dalaman', 48),
(268, 'Damal', 75),
(269, 'Darende', 44),
(270, 'Dargeçit', 47),
(271, 'Darıca', 41),
(272, 'Datça', 48),
(273, 'Dazkırı', 3),
(274, 'Defne', 31),
(275, 'Delice', 71),
(276, 'Demirci', 45),
(277, 'Demirköy', 39),
(278, 'Demirözü', 69),
(279, 'Demre', 7),
(280, 'Derbent', 42),
(281, 'Derebucak', 42),
(282, 'Dereli', 28),
(283, 'Derepazarı', 53),
(284, 'Derik', 47),
(285, 'Derince', 41),
(286, 'Derinkuyu', 50),
(287, 'Dernekpazarı', 61),
(288, 'Develi', 38),
(289, 'Devrek', 67),
(290, 'Devrekani', 37),
(291, 'Dicle', 21),
(292, 'Didim', 9),
(293, 'Digor', 36),
(294, 'Dikili', 35),
(295, 'Dikmen', 57),
(296, 'Dilovası', 41),
(297, 'Dinar', 3),
(298, 'Divriği', 58),
(299, 'Diyadin', 4),
(300, 'Dodurga', 19),
(301, 'Doğanhisar', 42),
(302, 'Doğankent', 28),
(303, 'Doğanşar', 58),
(304, 'Doğanşehir', 44),
(305, 'Doğanyol', 44),
(306, 'Doğanyurt', 37),
(307, 'Doğubayazıt', 4),
(308, 'Domaniç', 43),
(309, 'Dörtdivan', 14),
(310, 'Dörtyol', 31),
(311, 'Döşemealtı', 7),
(312, 'Dulkadiroğlu', 46),
(313, 'Dumlupınar', 43),
(314, 'Durağan', 57),
(315, 'Dursunbey', 10),
(316, 'Düzce', 81),
(317, 'Düziçi', 80),
(318, 'Düzköy', 61),
(319, 'Eceabat', 17),
(320, 'Edirne', 22),
(321, 'Edremit', 10),
(322, 'Edremit', 65),
(323, 'Efeler', 9),
(324, 'Eflani', 78),
(325, 'Eğil', 21),
(326, 'Eğirdir', 32),
(327, 'Ekinözü', 46),
(328, 'Elazığ', 23),
(329, 'Elbeyli', 79),
(330, 'Elbistan', 46),
(331, 'Eldivan', 18),
(332, 'Eleşkirt', 4),
(333, 'Elmadağ', 6),
(334, 'Elmalı', 7),
(335, 'Emet', 43),
(336, 'Emirdağ', 3),
(337, 'Emirgazi', 42),
(338, 'Enez', 22),
(339, 'Erbaa', 60),
(340, 'Erciş', 65),
(341, 'Erdek', 10),
(342, 'Erdemli', 33),
(343, 'Ereğli', 42),
(344, 'Ereğli', 67),
(345, 'Erenler', 54),
(346, 'Erfelek', 57),
(347, 'Ergani', 21),
(348, 'Ergene', 59),
(349, 'Ermenek', 70),
(350, 'Eruh', 56),
(351, 'Erzin', 31),
(352, 'Erzincan', 24),
(353, 'Esenler', 34),
(354, 'Esenyurt', 34),
(355, 'Eskil', 68),
(356, 'Eskipazar', 78),
(357, 'Espiye', 28),
(358, 'Eşme', 64),
(359, 'Etimesgut', 6),
(360, 'Evciler', 3),
(361, 'Evren', 6),
(362, 'Eynesil', 28),
(363, 'Eyüp', 34),
(364, 'Eyyübiye', 63),
(365, 'Ezine', 17),
(366, 'Fatih', 34),
(367, 'Fatsa', 52),
(368, 'Feke', 1),
(369, 'Felahiye', 38),
(370, 'Ferizli', 54),
(371, 'Fethiye', 48),
(372, 'Fındıklı', 53),
(373, 'Finike', 7),
(374, 'Foça', 35),
(375, 'Gaziemir', 35),
(376, 'Gaziosmanpaşa', 34),
(377, 'Gazipaşa', 7),
(378, 'Gebze', 41),
(379, 'Gediz', 43),
(380, 'Gelendost', 32),
(381, 'Gelibolu', 17),
(382, 'Gemerek', 58),
(383, 'Gemlik', 16),
(384, 'Genç', 12),
(385, 'Gercüş', 72),
(386, 'Gerede', 14),
(387, 'Gerger', 2),
(388, 'Germencik', 9),
(389, 'Gerze', 57),
(390, 'Gevaş', 65),
(391, 'Geyve', 54),
(392, 'Giresun', 28),
(393, 'Gökçeada', 17),
(394, 'Gökçebey', 67),
(395, 'Göksun', 46),
(396, 'Gölbaşı', 2),
(397, 'Gölbaşı', 6),
(398, 'Gölcük', 41),
(399, 'Göle', 75),
(400, 'Gölhisar', 15),
(401, 'Gölköy', 52),
(402, 'Gölmarmara', 45),
(403, 'Gölova', 58),
(404, 'Gölpazarı', 11),
(405, 'Gölyaka', 81),
(406, 'Gömeç', 10),
(407, 'Gönen', 10),
(408, 'Gönen', 32),
(409, 'Gördes', 45),
(410, 'Görele', 28),
(411, 'Göynücek', 5),
(412, 'Göynük', 14),
(413, 'Güce', 28),
(414, 'Güçlükonak', 73),
(415, 'Güdül', 6),
(416, 'Gülağaç', 68),
(417, 'Gülnar', 33),
(418, 'Gülşehir', 50),
(419, 'Gülyalı', 52),
(420, 'Gümüşhacıköy', 5),
(421, 'Gümüşhane', 29),
(422, 'Gümüşova', 81),
(423, 'Gündoğmuş', 7),
(424, 'Güney', 20),
(425, 'Güneysınır', 42),
(426, 'Güneysu', 53),
(427, 'Güngören', 34),
(428, 'Günyüzü', 26),
(429, 'Gürgentepe', 52),
(430, 'Güroymak', 13),
(431, 'Gürpınar', 65),
(432, 'Gürsu', 16),
(433, 'Gürün', 58),
(434, 'Güzelbahçe', 35),
(435, 'Güzelyurt', 68),
(436, 'Hacıbektaş', 50),
(437, 'Hacılar', 38),
(438, 'Hadim', 42),
(439, 'Hafik', 58),
(440, 'Hakkâri', 30),
(441, 'Halfeti', 63),
(442, 'Haliliye', 63),
(443, 'Halkapınar', 42),
(444, 'Hamamözü', 5),
(445, 'Hamur', 4),
(446, 'Han', 26),
(447, 'Hanak', 75),
(448, 'Hani', 21),
(449, 'Hanönü', 37),
(450, 'Harmancık', 16),
(451, 'Harran', 63),
(452, 'Hasanbeyli', 80),
(453, 'Hasankeyf', 72),
(454, 'Hasköy', 49),
(455, 'Hassa', 31),
(456, 'Havran', 10),
(457, 'Havsa', 22),
(458, 'Havza', 55),
(459, 'Haymana', 6),
(460, 'Hayrabolu', 59),
(461, 'Hayrat', 61),
(462, 'Hazro', 21),
(463, 'Hekimhan', 44),
(464, 'Hemşin', 53),
(465, 'Hendek', 54),
(466, 'Hınıs', 25),
(467, 'Hilvan', 63),
(468, 'Hisarcık', 43),
(469, 'Hizan', 13),
(470, 'Hocalar', 3),
(471, 'Honaz', 20),
(472, 'Hopa', 8),
(473, 'Horasan', 25),
(474, 'Hozat', 62),
(475, 'Hüyük', 42),
(476, 'Iğdır', 76),
(477, 'Ilgaz', 18),
(478, 'Ilgın', 42),
(479, 'Isparta', 32),
(480, 'İbradı', 7),
(481, 'İdil', 73),
(482, 'İhsangazi', 37),
(483, 'İhsaniye', 3),
(484, 'İkizce', 52),
(485, 'İkizdere', 53),
(486, 'İliç', 24),
(487, 'İlkadım', 55),
(488, 'İmamoğlu', 1),
(489, 'İmranlı', 58),
(490, 'İncesu', 38),
(491, 'İncirliova', 9),
(492, 'İnebolu', 37),
(493, 'İnegöl', 16),
(494, 'İnhisar', 11),
(495, 'İnönü', 26),
(496, 'İpekyolu', 65),
(497, 'İpsala', 22),
(498, 'İscehisar', 3),
(499, 'İskenderun', 31),
(500, 'İskilip', 19),
(501, 'İslahiye', 27),
(502, 'İspir', 25),
(503, 'İvrindi', 10),
(504, 'İyidere', 53),
(505, 'İzmit', 41),
(506, 'İznik', 16),
(507, 'Kabadüz', 52),
(508, 'Kabataş', 52),
(509, 'Kadıköy', 34),
(510, 'Kadınhanı', 42),
(511, 'Kadışehri', 66),
(512, 'Kadirli', 80),
(513, 'Kağıthane', 34),
(514, 'Kağızman', 36),
(515, 'Kahta', 2),
(516, 'Kale', 20),
(517, 'Kale', 44),
(518, 'Kalecik', 6),
(519, 'Kalkandere', 53),
(520, 'Kaman', 40),
(521, 'Kandıra', 41),
(522, 'Kangal', 58),
(523, 'Kapaklı', 59),
(524, 'Karabağlar', 35),
(525, 'Karaburun', 35),
(526, 'Karabük', 78),
(527, 'Karacabey', 16),
(528, 'Karacasu', 9),
(529, 'Karaçoban', 25),
(530, 'Karahallı', 64),
(531, 'Karaisalı', 1),
(532, 'Karakeçili', 71),
(533, 'Karakoçan', 23),
(534, 'Karakoyunlu', 76),
(535, 'Karaköprü', 63),
(536, 'Karaman', 70),
(537, 'Karamanlı', 15),
(538, 'Karamürsel', 41),
(539, 'Karapınar', 42),
(540, 'Karapürçek', 54),
(541, 'Karasu', 54),
(542, 'Karataş', 1),
(543, 'Karatay', 42),
(544, 'Karayazı', 25),
(545, 'Karesi', 10),
(546, 'Kargı', 19),
(547, 'Karkamış', 27),
(548, 'Karlıova', 12),
(549, 'Karpuzlu', 9),
(550, 'Kars', 36),
(551, 'Karşıyaka', 35),
(552, 'Kartal', 34),
(553, 'Kartepe', 41),
(554, 'Kastamonu', 37),
(555, 'Kaş', 7),
(556, 'Kavak', 55),
(557, 'Kavaklıdere', 48),
(558, 'Kayapınar', 21),
(559, 'Kaynarca', 54),
(560, 'Kaynaşlı', 81),
(561, 'Kazan', 6),
(562, 'Kazımkarabekir', 70),
(563, 'Keban', 23),
(564, 'Keçiborlu', 32),
(565, 'Keçiören', 6),
(566, 'Keles', 16),
(567, 'Kelkit', 29),
(568, 'Kemah', 24),
(569, 'Kemaliye', 24),
(570, 'Kemalpaşa', 35),
(571, 'Kemer', 7),
(572, 'Kemer', 15),
(573, 'Kepez', 7),
(574, 'Kepsut', 10),
(575, 'Keskin', 71),
(576, 'Kestel', 16),
(577, 'Keşan', 22),
(578, 'Keşap', 28),
(579, 'Kıbrıscık', 14),
(580, 'Kınık', 35),
(581, 'Kırıkhan', 31),
(582, 'Kırıkkale', 71),
(583, 'Kırkağaç', 45),
(584, 'Kırklareli', 39),
(585, 'Kırşehir', 40),
(586, 'Kızılcahamam', 6),
(587, 'Kızılırmak', 18),
(588, 'Kızılören', 3),
(589, 'Kızıltepe', 47),
(590, 'Kiğı', 12),
(591, 'Kilimli', 67),
(592, 'Kilis', 79),
(593, 'Kiraz', 35),
(594, 'Kocaali', 54),
(595, 'Kocaköy', 21),
(596, 'Kocasinan', 38),
(597, 'Koçarlı', 9),
(598, 'Kofçaz', 39),
(599, 'Konak', 35),
(600, 'Konyaaltı', 7),
(601, 'Korgan', 52),
(602, 'Korgun', 18),
(603, 'Korkut', 49),
(604, 'Korkuteli', 7),
(605, 'Kovancılar', 23),
(606, 'Koyulhisar', 58),
(607, 'Kozaklı', 50),
(608, 'Kozan', 1),
(609, 'Kozlu', 67),
(610, 'Kozluk', 72),
(611, 'Köprübaşı', 45),
(612, 'Köprübaşı', 61),
(613, 'Köprüköy', 25),
(614, 'Körfez', 41),
(615, 'Köse', 29),
(616, 'Köşk', 9),
(617, 'Köyceğiz', 48),
(618, 'Kula', 45),
(619, 'Kulp', 21),
(620, 'Kulu', 42),
(621, 'Kuluncak', 44),
(622, 'Kumlu', 31),
(623, 'Kumluca', 7),
(624, 'Kumru', 52),
(625, 'Kurşunlu', 18),
(626, 'Kurtalan', 56),
(627, 'Kurucaşile', 74),
(628, 'Kuşadası', 9),
(629, 'Kuyucak', 9),
(630, 'Küçükçekmece', 34),
(631, 'Küre', 37),
(632, 'Kürtün', 29),
(633, 'Kütahya', 43),
(634, 'Laçin', 19),
(635, 'Ladik', 55),
(636, 'Lalapaşa', 22),
(637, 'Lapseki', 17),
(638, 'Lice', 21),
(639, 'Lüleburgaz', 39),
(640, 'Maçka', 61),
(641, 'Maden', 23),
(642, 'Mahmudiye', 26),
(643, 'Malazgirt', 49),
(644, 'Malkara', 59),
(645, 'Maltepe', 34),
(646, 'Mamak', 6),
(647, 'Manavgat', 7),
(648, 'Manyas', 10),
(649, 'Marmara', 10),
(650, 'Marmaraereğlisi', 59),
(651, 'Marmaris', 48),
(652, 'Mazgirt', 62),
(653, 'Mazıdağı', 47),
(654, 'Mecitözü', 19),
(655, 'Melikgazi', 38),
(656, 'Menderes', 35),
(657, 'Menemen', 35),
(658, 'Mengen', 14),
(659, 'Menteşe', 48),
(660, 'Meram', 42),
(661, 'Meriç', 22),
(662, 'Merkezefendi', 20),
(663, 'Merzifon', 5),
(664, 'Mesudiye', 52),
(665, 'Mezitli', 33),
(666, 'Midyat', 47),
(667, 'Mihalgazi', 26),
(668, 'Mihalıççık', 26),
(669, 'Milas', 48),
(670, 'Mucur', 40),
(671, 'Mudanya', 16),
(672, 'Mudurnu', 14),
(673, 'Muradiye', 65),
(674, 'Muratlı', 59),
(675, 'Muratpaşa', 7),
(676, 'Murgul', 8),
(677, 'Musabeyli', 79),
(678, 'Mustafakemalpaşa', 16),
(679, 'Muş', 49),
(680, 'Mut', 33),
(681, 'Mutki', 13),
(682, 'Nallıhan', 6),
(683, 'Narlıdere', 35),
(684, 'Narman', 25),
(685, 'Nazımiye', 62),
(686, 'Nazilli', 9),
(687, 'Nevşehir', 50),
(688, 'Niğde', 51),
(689, 'Niksar', 60),
(690, 'Nilüfer', 16),
(691, 'Nizip', 27),
(692, 'Nurdağı', 27),
(693, 'Nurhak', 46),
(694, 'Nusaybin', 47),
(695, 'Odunpazarı', 26),
(696, 'Of', 61),
(697, 'Oğuzeli', 27),
(698, 'Oğuzlar', 19),
(699, 'Oltu', 25),
(700, 'Olur', 25),
(701, 'Ondokuzmayıs', 55),
(702, 'Onikişubat', 46),
(703, 'Orhaneli', 16),
(704, 'Orhangazi', 16),
(705, 'Orta', 18),
(706, 'Ortaca', 48),
(707, 'Ortahisar', 61),
(708, 'Ortaköy', 68),
(709, 'Ortaköy', 19),
(710, 'Osmancık', 19),
(711, 'Osmaneli', 11),
(712, 'Osmangazi', 16),
(713, 'Osmaniye', 80),
(714, 'Otlukbeli', 24),
(715, 'Ovacık', 78),
(716, 'Ovacık', 62),
(717, 'Ödemiş', 35),
(718, 'Ömerli', 47),
(719, 'Özalp', 65),
(720, 'Özvatan', 38),
(721, 'Palandöken', 25),
(722, 'Palu', 23),
(723, 'Pamukkale', 20),
(724, 'Pamukova', 54),
(725, 'Pasinler', 25),
(726, 'Patnos', 4),
(727, 'Payas', 31),
(728, 'Pazar', 53),
(729, 'Pazar', 60),
(730, 'Pazarcık', 46),
(731, 'Pazarlar', 43),
(732, 'Pazaryeri', 11),
(733, 'Pazaryolu', 25),
(734, 'Pehlivanköy', 39),
(735, 'Pendik', 34),
(736, 'Perşembe', 52),
(737, 'Pertek', 62),
(738, 'Pervari', 56),
(739, 'Pınarbaşı', 37),
(740, 'Pınarbaşı', 38),
(741, 'Pınarhisar', 39),
(742, 'Piraziz', 28),
(743, 'Polateli', 79),
(744, 'Polatlı', 6),
(745, 'Posof', 75),
(746, 'Pozantı', 1),
(747, 'Pursaklar', 6),
(748, 'Pülümür', 62),
(749, 'Pütürge', 44),
(750, 'Refahiye', 24),
(751, 'Reşadiye', 60),
(752, 'Reyhanlı', 31),
(753, 'Rize', 53),
(754, 'Safranbolu', 78),
(755, 'Saimbeyli', 1),
(756, 'Salıpazarı', 55),
(757, 'Salihli', 45),
(758, 'Samandağ', 31),
(759, 'Samsat', 2),
(760, 'Sancaktepe', 34),
(761, 'Sandıklı', 3),
(762, 'Sapanca', 54),
(763, 'Saray', 59),
(764, 'Saray', 65),
(765, 'Saraydüzü', 57),
(766, 'Saraykent', 66),
(767, 'Sarayköy', 20),
(768, 'Sarayönü', 42),
(769, 'Sarıcakaya', 26),
(770, 'Sarıçam', 1),
(771, 'Sarıgöl', 45),
(772, 'Sarıkamış', 36),
(773, 'Sarıkaya', 66),
(774, 'Sarıoğlan', 38),
(775, 'Sarıveliler', 70),
(776, 'Sarıyahşi', 68),
(777, 'Sarıyer', 34),
(778, 'Sarız', 38),
(779, 'Saruhanlı', 45),
(780, 'Sason', 72),
(781, 'Savaştepe', 10),
(782, 'Savur', 47),
(783, 'Seben', 14),
(784, 'Seferihisar', 35),
(785, 'Selçuk', 35),
(786, 'Selçuklu', 42),
(787, 'Selendi', 45),
(788, 'Selim', 36),
(789, 'Senirkent', 32),
(790, 'Serdivan', 54),
(791, 'Serik', 7),
(792, 'Serinhisar', 20),
(793, 'Seydikemer', 48),
(794, 'Seydiler', 37),
(795, 'Seydişehir', 42),
(796, 'Seyhan', 1),
(797, 'Seyitgazi', 26),
(798, 'Sındırgı', 10),
(799, 'Siirt', 56),
(800, 'Silifke', 33),
(801, 'Silivri', 34),
(802, 'Silopi', 73),
(803, 'Silvan', 21),
(804, 'Simav', 43),
(805, 'Sinanpaşa', 3),
(806, 'Sincan', 6),
(807, 'Sincik', 2),
(808, 'Sinop', 57),
(809, 'Sivas', 58),
(810, 'Sivaslı', 64),
(811, 'Siverek', 63),
(812, 'Sivrice', 23),
(813, 'Sivrihisar', 26),
(814, 'Solhan', 12),
(815, 'Soma', 45),
(816, 'Sorgun', 66),
(817, 'Söğüt', 11),
(818, 'Söğütlü', 54),
(819, 'Söke', 9),
(820, 'Sulakyurt', 71),
(821, 'Sultanbeyli', 34),
(822, 'Sultandağı', 3),
(823, 'Sultangazi', 34),
(824, 'Sultanhisar', 9),
(825, 'Suluova', 5),
(826, 'Sulusaray', 60),
(827, 'Sumbas', 80),
(828, 'Sungurlu', 19),
(829, 'Sur', 21),
(830, 'Suruç', 63),
(831, 'Susurluk', 10),
(832, 'Susuz', 36),
(833, 'Suşehri', 58),
(834, 'Süleymanpaşa', 59),
(835, 'Süloğlu', 22),
(836, 'Sürmene', 61),
(837, 'Sütçüler', 32),
(838, 'Şabanözü', 18),
(839, 'Şahinbey', 27),
(840, 'Şalpazarı', 61),
(841, 'Şaphane', 43),
(842, 'Şarkışla', 58),
(843, 'Şarkikaraağaç', 32),
(844, 'Şarköy', 59),
(845, 'Şavşat', 8),
(846, 'Şebinkarahisar', 28),
(847, 'Şefaatli', 66),
(848, 'Şehitkamil', 27),
(849, 'Şehzadeler', 45),
(850, 'Şemdinli', 30),
(851, 'Şenkaya', 25),
(852, 'Şenpazar', 37),
(853, 'Şereflikoçhisar', 6),
(854, 'Şırnak', 73),
(855, 'Şile', 34),
(856, 'Şiran', 29),
(857, 'Şirvan', 56),
(858, 'Şişli', 34),
(859, 'Şuhut', 3),
(860, 'Talas', 38),
(861, 'Taraklı', 54),
(862, 'Tarsus', 33),
(863, 'Taşkent', 42),
(864, 'Taşköprü', 37),
(865, 'Taşlıçay', 4),
(866, 'Taşova', 5),
(867, 'Tatvan', 13),
(868, 'Tavas', 20),
(869, 'Tavşanlı', 43),
(870, 'Tefenni', 15),
(871, 'Tekkeköy', 55),
(872, 'Tekman', 25),
(873, 'Tepebaşı', 26),
(874, 'Tercan', 24),
(875, 'Termal', 77),
(876, 'Terme', 55),
(877, 'Tillo', 56),
(878, 'Tire', 35),
(879, 'Tirebolu', 28),
(880, 'Tokat', 60),
(881, 'Tomarza', 38),
(882, 'Tonya', 61),
(883, 'Toprakkale', 80),
(884, 'Torbalı', 35),
(885, 'Toroslar', 33),
(886, 'Tortum', 25),
(887, 'Torul', 29),
(888, 'Tosya', 37),
(889, 'Tufanbeyli', 1),
(890, 'Tunceli', 62),
(891, 'Turgutlu', 45),
(892, 'Turhal', 60),
(893, 'Tuşba', 65),
(894, 'Tut', 2),
(895, 'Tutak', 4),
(896, 'Tuzla', 34),
(897, 'Tuzluca', 76),
(898, 'Tuzlukçu', 42),
(899, 'Türkeli', 57),
(900, 'Türkoğlu', 46),
(901, 'Uğurludağ', 19),
(902, 'Ula', 48),
(903, 'Ulaş', 58),
(904, 'Ulubey', 52),
(905, 'Ulubey', 64),
(906, 'Uluborlu', 32),
(907, 'Uludere', 73),
(908, 'Ulukışla', 51),
(909, 'Ulus', 74),
(910, 'Urla', 35),
(911, 'Uşak', 64),
(912, 'Uzundere', 25),
(913, 'Uzunköprü', 22),
(914, 'Ümraniye', 34),
(915, 'Ünye', 52),
(916, 'Ürgüp', 50),
(917, 'Üsküdar', 34),
(918, 'Üzümlü', 24),
(919, 'Vakfıkebir', 61),
(920, 'Varto', 49),
(921, 'Vezirköprü', 55),
(922, 'Viranşehir', 63),
(923, 'Vize', 39),
(924, 'Yağlıdere', 28),
(925, 'Yahşihan', 71),
(926, 'Yahyalı', 38),
(927, 'Yakakent', 55),
(928, 'Yakutiye', 25),
(929, 'Yalıhüyük', 42),
(930, 'Yalova', 77),
(931, 'Yalvaç', 32),
(932, 'Yapraklı', 18),
(933, 'Yatağan', 48),
(934, 'Yavuzeli', 27),
(935, 'Yayladağı', 31),
(936, 'Yayladere', 12),
(937, 'Yazıhan', 44),
(938, 'Yedisu', 12),
(939, 'Yenice', 17),
(940, 'Yenice', 78),
(941, 'Yeniçağa', 14),
(942, 'Yenifakılı', 66),
(943, 'Yenimahalle', 6),
(944, 'Yenipazar', 9),
(945, 'Yenipazar', 11),
(946, 'Yenişarbademli', 32),
(947, 'Yenişehir', 16),
(948, 'Yenişehir', 21),
(949, 'Yenişehir', 33),
(950, 'Yerköy', 66),
(951, 'Yeşilhisar', 38),
(952, 'Yeşilli', 47),
(953, 'Yeşilova', 15),
(954, 'Yeşilyurt', 44),
(955, 'Yeşilyurt', 60),
(956, 'Yığılca', 81),
(957, 'Yıldırım', 16),
(958, 'Yıldızeli', 58),
(959, 'Yomra', 61),
(960, 'Yozgat', 66),
(961, 'Yumurtalık', 1),
(962, 'Yunak', 42),
(963, 'Yunusemre', 45),
(964, 'Yusufeli', 8),
(965, 'Yüksekova', 30),
(966, 'Yüreğir', 1),
(967, 'Zara', 58),
(968, 'Zeytinburnu', 34),
(969, 'Zile', 60),
(970, 'Zonguldak', 67),
(971, 'Kemalpaşa', 8),
(972, 'Sultanhanı', 68);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogrenciler`
--

CREATE TABLE `ogrenciler` (
  `Ogrenci_id` int(11) NOT NULL,
  `Ogrenci_adi` varchar(50) DEFAULT NULL,
  `Ogrenci_soyadi` varchar(50) DEFAULT NULL,
  `Ogrenci_Email` varchar(50) DEFAULT NULL,
  `Ogrenci_Sifre` varchar(20) DEFAULT NULL,
  `Ogrenci_cinsiyet` varchar(5) DEFAULT NULL,
  `Ogrenci_Telefon` varchar(11) DEFAULT NULL,
  `Ogrenci_no` varchar(9) NOT NULL,
  `Ogrenci_resim` varchar(40) DEFAULT NULL,
  `il_kodu` varchar(20) NOT NULL,
  `ilce_kodu` varchar(255) DEFAULT NULL,
  `Ogrenci_sinif_id` int(11) DEFAULT NULL,
  `Ogrenci_danisman_id` int(11) DEFAULT NULL,
  `Ogrenci_bolum_id` int(11) NOT NULL,
  `Durumu` int(11) DEFAULT NULL,
  `StajOnay` int(11) NOT NULL,
  `StajOnayBaskan` int(11) DEFAULT NULL,
  `Silinme_Durumu` tinyint(1) DEFAULT NULL,
  `OgrenciStajBasvuru` tinyint(4) NOT NULL,
  `OgrenciStajGonderim` tinyint(4) NOT NULL,
  `ReddetmeYorumu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Tablo döküm verisi `ogrenciler`
--

INSERT INTO `ogrenciler` (`Ogrenci_id`, `Ogrenci_adi`, `Ogrenci_soyadi`, `Ogrenci_Email`, `Ogrenci_Sifre`, `Ogrenci_cinsiyet`, `Ogrenci_Telefon`, `Ogrenci_no`, `Ogrenci_resim`, `il_kodu`, `ilce_kodu`, `Ogrenci_sinif_id`, `Ogrenci_danisman_id`, `Ogrenci_bolum_id`, `Durumu`, `StajOnay`, `StajOnayBaskan`, `Silinme_Durumu`, `OgrenciStajBasvuru`, `OgrenciStajGonderim`, `ReddetmeYorumu`) VALUES
(1, 'Umut', 'Saatci', 'umutsaatci.34@gmail.com', '6061', 'Erkek', '05453659525', '205036061', 'UmutSaatci4.png', '34', '538', 1, 3, 1, 1, 0, 0, 0, 0, 0, ''),
(2, 'Abdullah', 'Üzülmez', 'adabdullahuzulmez@gmail.com', '123456', 'Erkek', '05453659526', '205036063', 'abdullah.jpg', '42', '561', 3, 1, 1, 1, 1, 0, 0, 0, 1, 'Eksik Bilgi'),
(3, 'Burak', 'Koç', 'burak_koc@gmail.com', '123456', 'Erkek', '0543615785', '205036064', NULL, '6', '261', 5, 3, 1, 1, 0, 0, 0, 0, 0, NULL),
(4, 'Turap', 'Tarhan', 'turap@gmail.com', '123456', 'Erkek', '05436985634', '205036065', NULL, '42', NULL, 5, 3, 1, 1, 0, 0, 0, 0, 0, NULL),
(5, 'Furkan Enes', 'Güngör', 'furkangngr@gmail.com', '123456', 'Erkek', '05511373504', '205036002', NULL, '40', NULL, 1, 3, 1, 1, 0, 0, 0, 0, 0, NULL),
(6, 'Ahmet', 'Ayaz', 'ahmetayaz@gmail.com', '123456', 'Erkek', '05511373507', '205036003', NULL, '', NULL, 2, 3, 1, 1, 0, 0, 0, 0, 0, NULL),
(7, 'Muhammet', 'Zengin', 'muhammet1@gmail.com', '123456', 'Erkek', '05511373508', '205036004', NULL, '', NULL, 4, 1, 1, 1, 0, 0, 0, 0, 0, ''),
(8, 'Ahmet', 'Yağlıkçı', 'ahmetyaglkc@gmail.com', '123456', 'Erkek', '05511373509', '205036005', NULL, '', NULL, 5, 3, 1, 1, 0, 0, 0, 0, 0, NULL),
(9, 'Fatih', 'Altuntaş', 'fatihalt@gmail.com', '123456', 'Erkek', '05511373510', '205036006', NULL, '', NULL, 3, 1, 1, 1, 0, 0, 0, 0, 0, NULL),
(10, 'İbrahim', 'Pekgül', 'ibrahimpkgl@gmail.com', '123456', 'Erkek', '05511373511', '205036007', NULL, '', NULL, 3, 1, 1, 1, 0, 0, 0, 0, 0, NULL),
(11, 'İsmail', 'Ulusal', 'isoulusual@gmail.com', '123456', 'Erkek', '05511373512', '205036008', NULL, '', NULL, 4, 1, 1, 1, 0, 0, 0, 0, 0, NULL),
(12, 'Solmaz', 'Filikci', 'solmazfilikci@gmail.com', '123456', 'Kız', '05511373513', '205036009', NULL, '', NULL, 5, 3, 1, 1, 0, 0, 0, 0, 0, NULL),
(13, 'Neslişah', 'Üzer', 'neslisahuzer@gmail.com', '123456', 'Kız', '05511373514', '205036010', NULL, '', NULL, 5, 3, 1, 1, 0, 0, 0, 0, 0, NULL),
(14, 'Fatma', 'Alemdar', 'fatma123@gmail.com', '123456', 'Kız', '05511373515', '205036011', NULL, '', NULL, 5, 3, 1, 1, 0, 0, 0, 0, 0, NULL),
(15, 'Ali', 'Çetin', 'alictn@gmail.com', '123456', 'Erkek', '05511373516', '205036012', NULL, '', NULL, 1, 3, 1, 1, 0, 0, 0, 0, 0, NULL),
(16, 'Ebru', 'Polat', 'ebrupolat@gmail.com', '123456', 'Kız', '05511373517', '205036013', NULL, '', NULL, 3, 1, 1, 1, 0, 0, 0, 0, 0, NULL),
(17, 'Mehmet', 'Söğüncü', 'memosögüncü@gmail.com', '123456', 'Erkek', '05511373518', '205036014', NULL, '', NULL, 4, 1, 1, 1, 0, 0, 0, 0, 0, NULL),
(18, 'Ayşe', 'Çelik', 'Ayseclk@gmail.com', '123456', 'Kız', '05511373518', '205036015', NULL, '', NULL, 2, 3, 1, 1, 0, 0, 0, 0, 0, NULL),
(19, 'Büşra', 'Çelik', 'bsrclk@gmail.com', '123456', 'Kız', '05511373519', '205036016', NULL, '', NULL, 2, 3, 1, 1, 0, 0, 0, 0, 0, NULL),
(20, 'Büşra', 'Yılmaz', 'bsrylmz@gmail.com', '123456', 'Kız', '05511373520', '205036017', NULL, '', NULL, 2, 3, 1, 1, 0, 0, 0, 0, 0, NULL),
(35, 'Gürkan', 'Uygun', 'ogr123@gmail.com', '123456', 'Erkek', '05511373521', '205036018', NULL, '', NULL, 6, 3, 1, 1, 0, 0, 0, 0, 0, NULL),
(36, 'Hakan', 'Uygun', 'ogr12@gmail.com', '123456', 'Erkek', '05511373522', '205036019', NULL, '', NULL, 6, 3, 1, 1, 0, 0, 0, 0, 0, NULL),
(37, 'Polat', 'Kemal', 'ogr123@gmail.com', '123456', 'Erkek', '05511373523', '205036020', NULL, '', NULL, 6, 3, 1, 1, 0, 0, 0, 0, 0, NULL),
(38, 'Yasemin', 'Genç', 'ogr124@gmail.com', '123456', 'Kız', '05511373524', '205036021', NULL, '', NULL, 6, 3, 1, 1, 0, 0, 0, 0, 0, NULL),
(39, 'Ayşe', 'Çetin', 'ogr125@gmail.com', '123456', 'Kız', '05511373525', '205036022', NULL, '', NULL, 6, 3, 1, 1, 0, 0, 0, 0, 0, NULL),
(40, 'Buse', 'Çetin', 'ogr126@gmail.com', '123456', 'Kız', '05511373526', '205036023', NULL, '', NULL, 6, 3, 1, 1, 0, 0, 0, 0, 0, NULL),
(41, 'Havvanur', 'Kara', 'ogr127@gmail.com', '123456', 'Kız', '05511373527', '205036024', NULL, '', NULL, 7, 1, 1, 1, 0, 0, 0, 0, 0, NULL),
(42, 'Erhan', 'Kara', 'ogr128@gmail.com', '123456', 'Erkek', '05511373528', '205036025', NULL, '', NULL, 7, 1, 1, 1, 0, 0, 0, 0, 0, NULL),
(43, 'Sevim', 'Yağlıkçı', 'ogr129@gmail.com', '123456', 'Kız', '05511373529', '205036026', NULL, '', NULL, 7, 1, 1, 1, 0, 0, 0, 0, 0, NULL),
(44, 'Hüseyin', 'Yağlıkçı', 'ogr131@gmail.com', '123456', 'Erkek', '05511373530', '205036027', NULL, '', NULL, 7, 1, 1, 1, 0, 0, 0, 0, 0, NULL),
(45, 'Fatma', 'Çini', 'ogr132@gmail.com', '123456', 'Kız', '05511373531', '205036028', NULL, '', NULL, 7, 1, 1, 1, 0, 0, 0, 0, 0, NULL),
(46, 'Veli', 'Çini', 'ogr133@gmail.com', '123456', 'Erkek', '05511373532', '205036029', NULL, '', NULL, 7, 1, 1, 1, 0, 0, 0, 0, 0, NULL),
(47, 'Ethem', 'Gürz', 'ogr134@gmail.com', '123456', 'Erkek', '05511373533', '205036030', NULL, '', NULL, 7, 1, 1, 1, 0, 0, 0, 0, 0, NULL),
(48, 'İbrahim', 'Ethem', 'ogr135@gmail.com', '123456', 'Erkek', '05511373534', '205036031', NULL, '', NULL, 8, 1, 1, 1, 0, 0, 0, 0, 0, NULL),
(49, 'Ayşe', 'Örgü', 'ogr136@gmail.com', '123456', 'Kız', '05511373535', '205036032', NULL, '', NULL, 8, 1, 1, 1, 0, 0, 0, 0, 0, NULL),
(50, 'Poyraz', 'Karabulut', 'ogr137@gmail.com', '123456', 'Erkek', '05511373536', '205036033', NULL, '', NULL, 8, 1, 1, 1, 0, 0, 0, 0, 0, NULL),
(51, 'Sipahi', 'Çetin', 'ogr138@gmail.com', '123456', 'Erkek', '05511373537', '205036034', NULL, '', NULL, 8, 1, 1, 1, 0, 0, 0, 0, 0, NULL),
(52, 'Aybike', 'Eren', 'ogr139@gmail.com', '123456', 'Kız', '05511373538', '205036035', NULL, '', NULL, 9, 2, 4, 1, 0, 0, 0, 0, 0, NULL),
(53, 'Asiye', 'Eren', 'ogr140@gmail.com', '123456', 'Kız', '05511373539', '205036036', NULL, '', NULL, 9, 1, 4, 1, 0, 0, 0, 0, 0, NULL),
(54, 'Ömer', 'Eren', 'ogr141@gmail.com', '123456', 'Erkek', '05511373540', '205036037', NULL, '', NULL, 9, 2, 4, 1, 0, 0, 0, 0, 0, NULL),
(55, 'Emel', 'Eren', 'ogr142@gmail.com', '123456', 'Kız', '05511373541', '205036038', NULL, '', NULL, 9, 2, 4, 1, 0, 0, 0, 0, 0, NULL),
(56, 'Orhan', 'Eren', 'ogr143@gmail.com', '123456', 'Erkek', '05511373542', '205036039', NULL, '', NULL, 9, 2, 4, 1, 0, 0, 0, 0, 0, NULL),
(57, 'Fadik', 'Eren', 'ogr144@gmail.com', '123456', 'Kız', '05511373543', '205036040', NULL, '', NULL, 9, 2, 4, 1, 0, 0, 0, 0, 0, NULL),
(58, 'Berk', 'Özkaya', 'ogr145@gmail.com', '123456', 'Erkek', '05511373544', '205036041', NULL, '', NULL, 9, 2, 4, 1, 0, 0, 0, 0, 0, NULL),
(59, 'Ayla', 'Özkaya', 'ogr146@gmail.com', '123456', 'Kız', '05511373545', '205036042', NULL, '', NULL, 10, 2, 4, 1, 0, 0, 0, 0, 0, NULL),
(60, 'Doruk', 'Atakul', 'ogr147@gmail.com', '123456', 'Erkek', '05511373546', '205036043', NULL, '', NULL, 9, 2, 4, 1, 0, 0, 0, 0, 0, NULL),
(61, 'Melisa', 'Atakul', 'ogr148@gmail.com', '123456', 'Kız', '05511373547', '205036069', NULL, '', NULL, 9, 2, 4, 1, 0, 0, 0, 0, 0, NULL),
(62, 'Harika', 'Manyaslı', 'ogr149@gmail.com', '123456', 'Kız', '05511373548', '205036045', NULL, '', NULL, 10, 2, 4, 1, 0, 0, 0, 0, 0, NULL),
(63, 'Ahmet', 'Manyaslı', 'ogr150@gmail.com', '123456', 'Erkek', '05511373549', '205036046', NULL, '', NULL, 10, 2, 4, 1, 0, 0, 0, 0, 0, NULL),
(64, 'Selin', 'Ataman', 'ogr151@gmail.com', '123456', 'Kız', '05511373550', '205036047', NULL, '', NULL, 10, 2, 4, 1, 0, 0, 0, 0, 0, NULL),
(65, 'Havvanur', 'Ataman', 'ogr152@gmail.com', '123456', 'Kız', '05511373551', '205036048', NULL, '', NULL, 10, 2, 4, 1, 0, 0, 0, 0, 0, NULL),
(66, 'Bengü', 'Mantık', 'ogr153@gmail.com', '123456', 'Kız', '05511373552', '205036049', NULL, '', NULL, 10, 2, 4, 1, 0, 0, 0, 0, 0, NULL),
(67, 'Fatma Zehra', 'Manta', 'ogr154@gmail.com', '123456', 'Kız', '05511373553', '205036050', NULL, '', NULL, 10, 2, 4, 1, 0, 0, 0, 0, 0, NULL),
(68, 'Fatima', 'Çomaz', 'ogr155@gmail.com', '123456', 'Kız', '05511373554', '205036051', NULL, '', NULL, 10, 2, 4, 1, 0, 0, 0, 0, 0, NULL),
(69, 'Rabia', 'Çomaz', 'ogr156@gmail.com', '123456', 'Kız', '05511373555', '205036052', NULL, '', NULL, 10, 2, 4, 1, 0, 0, 0, 0, 0, NULL),
(72, 'Emre', 'Uygun', 'ogr157@gmail.com', '123456', 'Erkek', '05511373556', '205036053', NULL, '', NULL, 15, 5, 2, 1, 0, 0, 0, 0, 0, NULL),
(73, 'Ali', 'Kemal', 'ogr158@gmail.com', '123456', 'Erkek', '05511373557', '205036054', NULL, '', NULL, 15, 5, 2, 1, 0, 0, 0, 0, 0, NULL),
(74, 'Rüzgar', 'Genç', 'ogr159@gmail.com', '123456', 'Kız', '05511373558', '205036055', NULL, '', NULL, 15, 5, 2, 1, 0, 0, 0, 0, 0, NULL),
(75, 'Buse', 'Çetin', 'ogr160@gmail.com', '123456', 'Kız', '05511373559', '205036056', NULL, '', NULL, 15, 5, 2, 1, 0, 0, 0, 0, 0, NULL),
(76, 'Kübra', 'Çetin', 'ogr161@gmail.com', '123456', 'Kız', '05511373560', '205036057', NULL, '', NULL, 15, 5, 2, 1, 0, 0, 0, 0, 0, NULL),
(77, 'Rahime', 'Kara', 'ogr162@gmail.com', '123456', 'Kız', '05511373561', '205036058', NULL, '', NULL, 15, 5, 2, 1, 0, 0, 0, 0, 0, NULL),
(78, 'Hasan', 'Kara', 'ogr163@gmail.com', '123456', 'Erkek', '05511373562', '205036059', NULL, '', NULL, 15, 5, 2, 1, 0, 0, 0, 0, 0, NULL),
(79, 'Halime', 'Yağlıkçı', 'ogr164@gmail.com', '123456', 'Kız', '05511373563', '205036060', NULL, '', NULL, 15, 5, 2, 1, 0, 0, 0, 0, 0, NULL),
(80, 'Polat', 'Yağlıkçı', 'ogr165@gmail.com', '123456', 'Erkek', '05511373564', '205036066', NULL, '', NULL, 16, 5, 2, 1, 0, 0, 0, 0, 0, NULL),
(81, 'Rabia', 'Çini', 'ogr166@gmail.com', '123456', 'Kız', '05511373565', '205036067', NULL, '', NULL, 16, 5, 2, 1, 0, 0, 0, 0, 0, NULL),
(82, 'Zuhal', 'Çini', 'ogr167@gmail.com', '123456', 'Erkek', '05511373566', '205036068', NULL, '', NULL, 16, 5, 2, 1, 0, 0, 0, 0, 0, NULL),
(83, 'Şeyma', 'Akdemir', 'ogr168@gmail.com', '123456', 'Kız', '05511373567', '205036044', NULL, '', NULL, 16, 5, 2, 1, 0, 0, 0, 0, 0, NULL),
(84, 'Ahmet', 'Çelik', 'ogr169@gmail.com', '123456', 'Erkek', '05511373568', '205036070', NULL, '', NULL, 16, 5, 2, 1, 0, 0, 0, 0, 0, NULL),
(85, 'Damlanur', 'Çelik', 'ogr170@gmail.com', '123456', 'Kız', '05511373569', '205036071', NULL, '', NULL, 17, 2, 3, 1, 0, 0, 0, 0, 0, NULL),
(86, 'Salih', 'Karabulut', 'ogr171@gmail.com', '123456', 'Erkek', '05511373570', '205036072', NULL, '', NULL, 17, 2, 3, 1, 0, 0, 0, 0, 0, NULL),
(87, 'Batuhan', 'Çetin', 'ogr172@gmail.com', '123456', 'Erkek', '05511373571', '205036073', NULL, '', NULL, 17, 2, 3, 1, 0, 0, 0, 0, 0, NULL),
(88, 'Asuman', 'Eren', 'ogr173@gmail.com', '123456', 'Kız', '05511373572', '205036074', NULL, '', NULL, 17, 2, 3, 1, 0, 0, 0, 0, 0, NULL),
(89, 'Rüzgar', 'Eren', 'ogr174@gmail.com', '123456', 'Kız', '05511373573', '205036075', NULL, '', NULL, 17, 2, 3, 1, 0, 0, 0, 0, 0, NULL),
(90, 'Faruk', 'Eren', 'ogr175@gmail.com', '123456', 'Erkek', '05511373574', '205036076', NULL, '', NULL, 18, 2, 3, 1, 0, 0, 0, 0, 0, NULL),
(91, 'Züleyha', 'Eren', 'ogr176@gmail.com', '123456', 'Kız', '05511373575', '205036077', NULL, '', NULL, 18, 2, 3, 1, 0, 0, 0, 0, 0, NULL),
(92, 'Veli', 'Eren', 'ogr177@gmail.com', '123456', 'Erkek', '05511373576', '205036078', NULL, '', NULL, 18, 2, 3, 1, 0, 0, 0, 0, 0, NULL),
(93, 'Ayşe', 'Eren', 'ogr178@gmail.com', '123456', 'Kız', '05511373577', '205036079', NULL, '', NULL, 19, 6, 3, 1, 0, 0, 0, 0, 0, NULL),
(94, 'Eren', 'Özkaya', 'ogr179@gmail.com', '123456', 'Erkek', '05511373578', '205036080', NULL, '', NULL, 19, 6, 3, 1, 0, 0, 0, 0, 0, NULL),
(95, 'Aysun', 'Özkaya', 'ogr180@gmail.com', '123456', 'Kız', '05511373579', '205036081', NULL, '', NULL, 19, 6, 3, 1, 0, 0, 0, 0, 0, NULL),
(96, 'Fatma', 'Atakul', 'ogr181@gmail.com', '123456', 'Erkek', '05511373580', '205036082', NULL, '', NULL, 19, 6, 3, 1, 0, 0, 0, 0, 0, NULL),
(97, 'Ayşe', 'Atakul', 'ogr182@gmail.com', '123456', 'Kız', '05511373581', '205036083', NULL, '', NULL, 20, 6, 3, 1, 0, 0, 0, 0, 0, NULL),
(98, 'Wonder', 'Manyaslı', 'ogr183@gmail.com', '123456', 'Kız', '05511373582', '205036084', NULL, '', NULL, 20, 6, 3, 1, 0, 0, 0, 0, 0, NULL),
(99, 'Jack', 'Manyaslı', 'ogr184@gmail.com', '123456', 'Erkek', '05511373583', '205036085', NULL, '', NULL, 20, 6, 3, 1, 0, 0, 0, 0, 0, NULL),
(100, 'Mihayloviç', 'Ataman', 'ogr185@gmail.com', '123456', 'Kız', '05511373584', '205036086', NULL, '', NULL, 20, 6, 3, 1, 0, 0, 0, 0, 0, NULL),
(101, 'Esrin', 'Ataman', 'ogr186@gmail.com', '123456', 'Kız', '05511373585', '205036087', NULL, '', NULL, 21, 2, 3, 1, 0, 0, 0, 0, 0, NULL),
(102, 'Ecrin', 'Mantık', 'ogr187@gmail.com', '123456', 'Kız', '05511373586', '205036088', NULL, '', NULL, 21, 2, 3, 1, 0, 0, 0, 0, 0, NULL),
(103, 'Ece', 'Manta', 'ogr188@gmail.com', '123456', 'Kız', '05511373587', '205036089', NULL, '', NULL, 21, 2, 3, 1, 0, 0, 0, 0, 0, NULL),
(104, 'Zehra', 'Çomaz', 'ogr189@gmail.com', '123456', 'Kız', '05511373588', '205036090', NULL, '', NULL, 21, 2, 3, 1, 0, 0, 0, 0, 0, NULL),
(105, 'Zühre', 'Çomaz', 'ogr190@gmail.com', '123456', 'Kız', '05511373589', '205036091', NULL, '', NULL, 21, 2, 3, 1, 0, 0, 0, 0, 0, NULL),
(106, 'Fatih', 'Çoruh', 'ogr191@gmail.com', '123456', 'Erkek', '05511373590', '205036092', NULL, '', NULL, 22, 2, 3, 1, 0, 0, 0, 0, 0, NULL),
(107, 'Eli', 'Çorun', 'ogr192@gmail.com', '123456', 'Kız', '05511373591', '205036093', NULL, '', NULL, 22, 2, 3, 1, 0, 0, 0, 0, 0, NULL),
(108, 'Gamze', 'Demir', 'ogr193@gmail.com', '123456', 'Kız', '05511373592', '205036094', NULL, '', NULL, 22, 2, 3, 1, 0, 0, 0, 0, 0, NULL),
(109, 'Ayşe', 'Deri', 'ogr194@gmail.com', '123456', 'Kız', '05511373593', '205036095', NULL, '', NULL, 22, 2, 3, 1, 0, 0, 0, 0, 0, NULL),
(110, 'Betül', 'Karabulut', 'ogr195@gmail.com', '123456', 'Kız', '05511373594', '205036096', NULL, '', NULL, 22, 2, 3, 1, 0, 0, 0, 0, 0, NULL),
(111, 'Abdullah', 'Poyraz', 'ogr196@gmail.com', '123456', 'Erkek', '05511373595', '205036097', NULL, '', NULL, 22, 2, 3, 1, 0, 0, 0, 0, 0, NULL),
(112, 'Şeyma', 'Poyraz', 'ogr197@gmail.com', '123456', 'Kız', '05511373596', '205036098', NULL, '', NULL, 22, 2, 3, 1, 0, 0, 0, 0, 0, NULL),
(113, 'Tuğçe', 'Kahraman', 'ogr198@gmail.com', '123456', 'Kız', '05511373597', '205036099', NULL, '', NULL, 22, 2, 3, 1, 0, 0, 0, 0, 0, NULL),
(114, 'Asya', 'Akyurt', 'ogr199@gmail.com', '123456', 'Kız', '05511373598', '205036100', NULL, '', NULL, 22, 2, 3, 1, 0, 0, 0, 0, 0, NULL),
(115, 'Nagehan', 'Çiçek', 'ogr200@gmail.com', '123456', 'Kız', '05511373599', '205036101', NULL, '', NULL, 23, 6, 3, 1, 0, 0, 0, 0, 0, NULL),
(116, 'Furkan', '.Çoban', 'ogr201@gmail.com', '123456', 'Erkek', '05511373600', '205036102', NULL, '', NULL, 23, 6, 3, 1, 0, 0, 0, 0, 0, NULL),
(117, 'Bengü', 'Eren', 'ogr202@gmail.com', '123456', 'Kız', '05511373601', '205036103', NULL, '', NULL, 23, 6, 3, 1, 0, 0, 0, 0, 0, NULL),
(118, 'Berk', 'Çehre', 'ogr203@gmail.com', '123456', 'Erkek', '05511373602', '205036104', NULL, '', NULL, 23, 6, 3, 1, 0, 0, 0, 0, 0, NULL),
(119, 'Muhammet', 'Demir', 'ogr204@gmail.com', '123456', 'Erkek', '05511373603', '205036105', NULL, '', NULL, 23, 6, 3, 1, 0, 0, 0, 0, 0, NULL),
(120, 'Umut', 'Uygun', 'ogr205@gmail.com', '123456', 'Erkek', '05511373604', '205036106', NULL, '', NULL, 24, 6, 3, 1, 0, 0, 0, 0, 0, NULL),
(121, 'Burak', 'Kemal', 'ogr206@gmail.com', '123456', 'Erkek', '05511373605', '205036107', NULL, '', NULL, 24, 6, 3, 1, 0, 0, 0, 0, 0, NULL),
(122, 'Mine', 'Genç', 'ogr207@gmail.com', '123456', 'Kız', '05511373606', '205036108', NULL, '', NULL, 24, 6, 3, 1, 0, 0, 0, 0, 0, NULL),
(123, 'Melisa', 'Çetin', 'ogr208@gmail.com', '123456', 'Kız', '05511373607', '205036109', NULL, '', NULL, 24, 6, 3, 1, 0, 0, 0, 0, 0, NULL),
(124, 'Müge', 'Çetin', 'ogr209@gmail.com', '123456', 'Kız', '05511373608', '205036110', NULL, '', NULL, 24, 6, 3, 1, 0, 0, 0, 0, 0, NULL),
(125, 'Mücver', 'Kara', 'ogr210@gmail.com', '123456', 'Kız', '05511373609', '205036111', NULL, '', NULL, 25, 7, 4, 1, 0, 0, 0, 0, 0, NULL),
(126, 'Onur', 'Kara', 'ogr211@gmail.com', '123456', 'Erkek', '05511373610', '205036112', NULL, '', NULL, 25, 7, 4, 1, 0, 0, 0, 0, 0, NULL),
(127, 'Miss', 'Yağlıkçı', 'ogr212@gmail.com', '123456', 'Kız', '05511373611', '205036113', NULL, '', NULL, 25, 7, 4, 1, 0, 0, 0, 0, 0, NULL),
(128, 'Furkan', 'Yağlıkçı', 'ogr213@gmail.com', '123456', 'Erkek', '05511373612', '205036114', NULL, '', NULL, 25, 7, 4, 1, 0, 0, 0, 0, 0, NULL),
(129, 'Mihri', 'Çini', 'ogr214@gmail.com', '123456', 'Kız', '05511373613', '205036115', NULL, '', NULL, 26, 7, 4, 1, 0, 0, 0, 0, 0, NULL),
(130, 'Doruk', 'Çini', 'ogr215@gmail.com', '123456', 'Erkek', '05511373614', '205036116', NULL, '', NULL, 26, 7, 4, 1, 0, 0, 0, 0, 0, NULL),
(131, 'Mihri', 'Akdemir', 'ogr216@gmail.com', '123456', 'Kız', '05511373615', '205036117', NULL, '', NULL, 26, 7, 4, 1, 0, 0, 0, 0, 0, NULL),
(132, 'Berk', 'Çelik', 'ogr217@gmail.com', '123456', 'Erkek', '05511373616', '205036118', NULL, '', NULL, 26, 7, 4, 1, 0, 0, 0, 0, 0, NULL),
(133, 'Damla', 'Çelik', 'ogr218@gmail.com', '123456', 'Kız', '05511373617', '205036119', NULL, '', NULL, 27, 8, 4, 1, 0, 0, 0, 0, 0, NULL),
(134, 'Selim', 'Karabulut', 'ogr219@gmail.com', '123456', 'Erkek', '05511373618', '205036120', NULL, '', NULL, 27, 8, 4, 1, 0, 0, 0, 0, 0, NULL),
(135, 'Hasan', 'Çetin', 'ogr220@gmail.com', '123456', 'Erkek', '05511373619', '205036121', NULL, '', NULL, 27, 8, 4, 1, 0, 0, 0, 0, 0, NULL),
(136, 'Elif', 'Eren', 'ogr221@gmail.com', '123456', 'Kız', '05511373620', '205036122', NULL, '', NULL, 28, 8, 4, 1, 0, 0, 0, 0, 0, NULL),
(137, 'Emine', 'Eren', 'ogr222@gmail.com', '123456', 'Kız', '05511373621', '205036123', NULL, '', NULL, 28, 8, 4, 1, 0, 0, 0, 0, 0, NULL),
(138, 'Assi', 'Eren', 'ogr223@gmail.com', '123456', 'Erkek', '05511373622', '205036124', NULL, '', NULL, 28, 8, 4, 1, 0, 0, 0, 0, 0, NULL),
(139, 'Zülu', 'Eren', 'ogr224@gmail.com', '123456', 'Kız', '05511373623', '205036125', NULL, '', NULL, 28, 8, 4, 1, 0, 0, 0, 0, 0, NULL),
(140, 'İsmail', 'Eren', 'ogr225@gmail.com', '123456', 'Erkek', '05511373624', '205036126', NULL, '', NULL, 28, 8, 4, 1, 0, 0, 0, 0, 0, NULL),
(141, 'Emine', 'Eren', 'ogr226@gmail.com', '123456', 'Kız', '05511373625', '205036127', NULL, '', NULL, 29, 7, 4, 1, 0, 0, 0, 0, 0, NULL),
(142, 'Rüzgar', 'Özkaya', 'ogr227@gmail.com', '123456', 'Erkek', '05511373626', '205036128', NULL, '', NULL, 29, 7, 4, 1, 0, 0, 0, 0, 0, NULL),
(143, 'Rzg', 'Özkaya', 'ogr228@gmail.com', '123456', 'Kız', '05511373627', '205036129', NULL, '', NULL, 29, 7, 4, 1, 0, 0, 0, 0, 0, NULL),
(144, 'Doğukan', 'Atakul', 'ogr229@gmail.com', '123456', 'Erkek', '05511373628', '205036130', NULL, '', NULL, 29, 7, 4, 1, 0, 0, 0, 0, 0, NULL),
(145, 'Mihriban', 'Atakul', 'ogr230@gmail.com', '123456', 'Kız', '05511373629', '205036131', NULL, '', NULL, 29, 7, 4, 1, 0, 0, 0, 0, 0, NULL),
(146, 'WonderFUL', 'Manyaslı', 'ogr231@gmail.com', '123456', 'Kız', '05511373630', '205036132', NULL, '', NULL, 29, 7, 4, 1, 0, 0, 0, 0, 0, NULL),
(147, 'Grealish', 'Manyaslı', 'ogr232@gmail.com', '123456', 'Erkek', '05511373631', '205036133', NULL, '', NULL, 30, 7, 4, 1, 0, 0, 0, 0, 0, NULL),
(148, 'Bilge', 'Ataman', 'ogr233@gmail.com', '123456', 'Kız', '05511373632', '205036134', NULL, '', NULL, 30, 7, 4, 1, 0, 0, 0, 0, 0, NULL),
(149, 'Büge', 'Ataman', 'ogr234@gmail.com', '123456', 'Kız', '05511373633', '205036135', NULL, '', NULL, 30, 7, 4, 1, 0, 0, 0, 0, 0, NULL),
(150, 'Ece', 'Mantık', 'ogr235@gmail.com', '123456', 'Kız', '05511373634', '205036136', NULL, '', NULL, 30, 7, 4, 1, 0, 0, 0, 0, 0, NULL),
(151, 'Ecrin', 'Manta', 'ogr236@gmail.com', '123456', 'Kız', '05511373635', '205036137', NULL, '', NULL, 30, 7, 4, 1, 0, 0, 0, 0, 0, NULL),
(152, 'Zühre', 'Çomaz', 'ogr237@gmail.com', '123456', 'Kız', '05511373636', '205036138', NULL, '', NULL, 31, 8, 4, 1, 0, 0, 0, 0, 0, NULL),
(153, 'Zehra', 'Çomaz', 'ogr238@gmail.com', '123456', 'Kız', '05511373637', '205036139', NULL, '', NULL, 31, 8, 4, 1, 0, 0, 0, 0, 0, NULL),
(154, 'Talha', 'Çoruh', 'ogr239@gmail.com', '123456', 'Erkek', '05511373638', '205036140', NULL, '', NULL, 31, 8, 4, 1, 0, 0, 0, 0, 0, NULL),
(155, 'Zural', 'Çorun', 'ogr240@gmail.com', '123456', 'Kız', '05511373639', '205036141', NULL, '', NULL, 31, 8, 4, 1, 0, 0, 0, 0, 0, NULL),
(156, 'Zühre', 'Demir', 'ogr241@gmail.com', '123456', 'Kız', '05511373640', '205036142', NULL, '', NULL, 31, 8, 4, 1, 0, 0, 0, 0, 0, NULL),
(157, 'Zümge', 'Deri', 'ogr242@gmail.com', '123456', 'Kız', '05511373641', '205036143', NULL, '', NULL, 32, 8, 4, 1, 0, 0, 0, 0, 0, NULL),
(158, 'Zütel', 'Karabulut', 'ogr243@gmail.com', '123456', 'Kız', '05511373642', '205036144', NULL, '', NULL, 32, 8, 4, 1, 0, 0, 0, 0, 0, NULL),
(159, 'Zahid', 'Poyraz', 'ogr244@gmail.com', '123456', 'Erkek', '05511373643', '205036145', NULL, '', NULL, 32, 8, 4, 1, 0, 0, 0, 0, 0, NULL),
(160, 'Zeynep', 'Poyraz', 'ogr245@gmail.com', '123456', 'Kız', '05511373644', '205036146', NULL, '', NULL, 32, 8, 4, 1, 0, 0, 0, 0, 0, NULL),
(161, 'Zeyno', 'Kahraman', 'ogr246@gmail.com', '123456', 'Kız', '05511373645', '205036147', NULL, '', NULL, 32, 8, 4, 1, 0, 0, 0, 0, 0, NULL),
(162, 'Asiye', 'Akyurt', 'ogr247@gmail.com', '123456', 'Kız', '05511373646', '205036148', NULL, '', NULL, 32, 8, 4, 1, 0, 0, 0, 0, 0, NULL),
(163, 'Aybüke', 'Çiçek', 'ogr248@gmail.com', '123456', 'Kız', '05511373647', '205036149', NULL, '', NULL, 32, 8, 4, 1, 0, 0, 0, 0, 0, NULL),
(164, 'Grealish', '.Çoban', 'ogr249@gmail.com', '123456', 'Erkek', '05511373648', '205036150', NULL, '', NULL, 32, 8, 4, 1, 0, 0, 0, 0, 0, NULL),
(165, 'Ayşe', 'Eren', 'ogr250@gmail.com', '123456', 'Kız', '05511373649', '205036151', NULL, '', NULL, 32, 8, 4, 1, 0, 0, 0, 0, 0, NULL),
(166, 'Bruyne', 'Çehre', 'ogr251@gmail.com', '123456', 'Erkek', '05511373650', '205036152', NULL, '', NULL, 32, 8, 4, 1, 0, 0, 0, 0, 0, NULL),
(167, 'Merih', 'Demir', 'ogr252@gmail.com', '123456', 'Erkek', '05511373651', '205036153', NULL, '', NULL, 32, 8, 4, 1, 0, 0, 0, 0, 0, NULL),
(168, 'BB', 'CC', 'bbcc@gmail.com', '6789', 'Erkek', '05511373555', '123456789', NULL, '15', '57', 1, 1, 1, 1, 0, NULL, 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siniflar`
--

CREATE TABLE `siniflar` (
  `sinif_id` int(11) NOT NULL,
  `sinif_adi` varchar(10) NOT NULL,
  `sinif_bolum_id` int(11) NOT NULL,
  `sinif_danisman_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Tablo döküm verisi `siniflar`
--

INSERT INTO `siniflar` (`sinif_id`, `sinif_adi`, `sinif_bolum_id`, `sinif_danisman_id`) VALUES
(1, '1/A NÖ', 1, 3),
(2, '1/B NÖ', 1, 3),
(3, '1/A İÖ', 1, 1),
(4, '1/B İÖ', 1, 1),
(5, '2/A NÖ', 1, 3),
(6, '2/B NÖ', 1, 3),
(7, '2/A İO', 1, 1),
(8, '2/B İÖ', 1, 1),
(9, '1/A NÖ', 2, 4),
(10, '1/B NÖ', 2, 4),
(11, '1/A İÖ', 2, 5),
(12, '1/B İÖ', 2, 5),
(13, '2/A NÖ', 2, 4),
(14, '2/B NÖ', 2, 4),
(15, '2/A İÖ', 2, 5),
(16, '2/B İÖ', 2, 5),
(17, '1/A NÖ', 3, 2),
(18, '1/B NÖ', 3, 2),
(19, '1/A İÖ', 3, 6),
(20, '1/B İÖ', 3, 6),
(21, '2/A NÖ', 3, 2),
(22, '2/B NÖ', 3, 2),
(23, '2/A İÖ', 3, 6),
(24, '2/B İÖ', 3, 6),
(25, '1/A NÖ', 4, 7),
(26, '1/B NÖ', 4, 7),
(27, '1/A İÖ', 4, 8),
(28, '1/B İÖ', 4, 8),
(29, '2/A NÖ', 4, 7),
(30, '2/B NÖ', 4, 7),
(31, '2/A İÖ', 4, 8),
(32, '2/B İÖ', 4, 8);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `stajbasvurudetay`
--

CREATE TABLE `stajbasvurudetay` (
  `StajBasvuruDetay` int(11) NOT NULL,
  `OgrenciID` int(11) NOT NULL,
  `OgrenciIsim` varchar(55) NOT NULL,
  `OgrenciSoyisim` varchar(55) NOT NULL,
  `OgrenciMail` varchar(55) NOT NULL,
  `OgrenciTelefon` varchar(11) NOT NULL,
  `Ogrenci_Vesikalık` varchar(255) NOT NULL,
  `OgrenciSSKNo` varchar(20) NOT NULL,
  `OgrenciOkulNo` varchar(9) NOT NULL,
  `OgrenciBolumAdı` varchar(55) NOT NULL,
  `OgrenciProgramSınıf` varchar(100) NOT NULL,
  `OgrenciStajDonem` tinyint(4) NOT NULL,
  `OgrenciIkametgahAdres` varchar(255) NOT NULL,
  `OgrenciTC` varchar(11) NOT NULL,
  `OgrenciTCSeriNo` varchar(9) NOT NULL,
  `OgrenciIl` varchar(55) DEFAULT NULL,
  `OgrenciIlce` varchar(55) DEFAULT NULL,
  `OgrenciKoyMahalle` varchar(55) NOT NULL,
  `OgrenciBabaAdi` varchar(55) NOT NULL,
  `OgrenciAnneAdi` varchar(55) NOT NULL,
  `OgrenciCiltNo` varchar(9) NOT NULL,
  `OgrenciAileSiraNo` varchar(10) NOT NULL,
  `OgrenciDogumYer` varchar(55) NOT NULL,
  `OgrenciSiraNo` varchar(6) NOT NULL,
  `OgrenciDogumTarihi` date NOT NULL,
  `OgrenciİmzaTarih` date DEFAULT NULL,
  `OgrenciImza` varchar(255) NOT NULL,
  `SirketAdi` varchar(100) NOT NULL,
  `SirketAdres` varchar(255) NOT NULL,
  `SirketHizmetAlani` varchar(55) NOT NULL,
  `SirketToplamPersonel` varchar(50) NOT NULL,
  `SirketTelefonNo` varchar(11) NOT NULL,
  `SirketFaksNo` varchar(7) NOT NULL,
  `SirketYetkiliAdSoyadGorevUnvan` varchar(100) NOT NULL,
  `SirketYetkiliGorev` varchar(50) DEFAULT NULL,
  `SirketİmzaTarih` date DEFAULT NULL,
  `SirketMail` varchar(55) NOT NULL,
  `Sirketİmza` varchar(255) NOT NULL,
  `SirketWebAdres` varchar(255) NOT NULL,
  `SirketIbanNo` varchar(26) NOT NULL,
  `ÜcretAliyorMu` varchar(10) DEFAULT NULL,
  `BelgeDoldurmaTarihi` date DEFAULT NULL,
  `SaglikHizmeti` tinyint(3) UNSIGNED DEFAULT NULL,
  `AcikRizaOnay` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Tablo döküm verisi `stajbasvurudetay`
--

INSERT INTO `stajbasvurudetay` (`StajBasvuruDetay`, `OgrenciID`, `OgrenciIsim`, `OgrenciSoyisim`, `OgrenciMail`, `OgrenciTelefon`, `Ogrenci_Vesikalık`, `OgrenciSSKNo`, `OgrenciOkulNo`, `OgrenciBolumAdı`, `OgrenciProgramSınıf`, `OgrenciStajDonem`, `OgrenciIkametgahAdres`, `OgrenciTC`, `OgrenciTCSeriNo`, `OgrenciIl`, `OgrenciIlce`, `OgrenciKoyMahalle`, `OgrenciBabaAdi`, `OgrenciAnneAdi`, `OgrenciCiltNo`, `OgrenciAileSiraNo`, `OgrenciDogumYer`, `OgrenciSiraNo`, `OgrenciDogumTarihi`, `OgrenciİmzaTarih`, `OgrenciImza`, `SirketAdi`, `SirketAdres`, `SirketHizmetAlani`, `SirketToplamPersonel`, `SirketTelefonNo`, `SirketFaksNo`, `SirketYetkiliAdSoyadGorevUnvan`, `SirketYetkiliGorev`, `SirketİmzaTarih`, `SirketMail`, `Sirketİmza`, `SirketWebAdres`, `SirketIbanNo`, `ÜcretAliyorMu`, `BelgeDoldurmaTarihi`, `SaglikHizmeti`, `AcikRizaOnay`) VALUES
(146, 2, 'Abdullah', 'Üzülmez', 'adabdullahuzulmez@gmail.com', '05453659526', '5833172746.jpg', '', '205036063', 'sadsad', 'Bilgisayar Programcılığı', 1, 'sad', '53740297490', 'A12B12222', '17', '381', 'dsad', 'sad', 'sadsa', '01', '01', 'dsad', '01', '2022-06-15', '2022-06-30', '96981329273.jpg', 'sad', 'dsa', 'dsad', 'sad', '05511373506', 'dsa', 'sadsa', 'sadsad', '2022-06-22', 'sadsa@gmail.com', '1691633901.jpg', 'sadsad', 'TR123456789123456789111111', 'Almıyor', '2022-06-11', 2, 'Onaylıyorum');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `stajdosyasi`
--

CREATE TABLE `stajdosyasi` (
  `stajdosyasi` int(11) NOT NULL,
  `OgrenciID` int(11) NOT NULL,
  `Ogrenci_dosya` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `stajdosyasi`
--

INSERT INTO `stajdosyasi` (`stajdosyasi`, `OgrenciID`, `Ogrenci_dosya`) VALUES
(2, 2, 'rapor.doc');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yetkiler`
--

CREATE TABLE `yetkiler` (
  `yetki_id` int(11) NOT NULL,
  `yetki_adi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Tablo döküm verisi `yetkiler`
--

INSERT INTO `yetkiler` (`yetki_id`, `yetki_adi`) VALUES
(1, 'Öğrenci'),
(2, 'Danışman'),
(3, 'Bölüm Başkanı'),
(4, 'İdare');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `baskanlar`
--
ALTER TABLE `baskanlar`
  ADD PRIMARY KEY (`baskan_id`) USING BTREE,
  ADD KEY `bolum_id` (`baskan_bolum_id`) USING BTREE;

--
-- Tablo için indeksler `bilgi_islem`
--
ALTER TABLE `bilgi_islem`
  ADD PRIMARY KEY (`Bilgi_islem_id`) USING BTREE;

--
-- Tablo için indeksler `bolumler`
--
ALTER TABLE `bolumler`
  ADD PRIMARY KEY (`bolum_id`) USING BTREE;

--
-- Tablo için indeksler `danismanlar`
--
ALTER TABLE `danismanlar`
  ADD PRIMARY KEY (`danisman_id`) USING BTREE,
  ADD KEY `danisman_bolum_id` (`danisman_bolum_id`) USING BTREE,
  ADD KEY `Durumu` (`Durumu`) USING BTREE;

--
-- Tablo için indeksler `ogrenciler`
--
ALTER TABLE `ogrenciler`
  ADD PRIMARY KEY (`Ogrenci_id`) USING BTREE,
  ADD KEY `Ogrenci_sinif_id` (`Ogrenci_sinif_id`) USING BTREE,
  ADD KEY `Ogrenci_danisman_id` (`Ogrenci_danisman_id`) USING BTREE,
  ADD KEY `Ogrenci_bolum_id` (`Ogrenci_bolum_id`) USING BTREE,
  ADD KEY `Durumu` (`Durumu`) USING BTREE;

--
-- Tablo için indeksler `siniflar`
--
ALTER TABLE `siniflar`
  ADD PRIMARY KEY (`sinif_id`) USING BTREE,
  ADD KEY `sinif_bolum_id` (`sinif_bolum_id`) USING BTREE,
  ADD KEY `sinif_danisman_id` (`sinif_danisman_id`) USING BTREE;

--
-- Tablo için indeksler `stajbasvurudetay`
--
ALTER TABLE `stajbasvurudetay`
  ADD PRIMARY KEY (`StajBasvuruDetay`) USING BTREE;

--
-- Tablo için indeksler `stajdosyasi`
--
ALTER TABLE `stajdosyasi`
  ADD PRIMARY KEY (`stajdosyasi`);

--
-- Tablo için indeksler `yetkiler`
--
ALTER TABLE `yetkiler`
  ADD PRIMARY KEY (`yetki_id`) USING BTREE;

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `baskanlar`
--
ALTER TABLE `baskanlar`
  MODIFY `baskan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `bilgi_islem`
--
ALTER TABLE `bilgi_islem`
  MODIFY `Bilgi_islem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `bolumler`
--
ALTER TABLE `bolumler`
  MODIFY `bolum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `danismanlar`
--
ALTER TABLE `danismanlar`
  MODIFY `danisman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `ogrenciler`
--
ALTER TABLE `ogrenciler`
  MODIFY `Ogrenci_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- Tablo için AUTO_INCREMENT değeri `siniflar`
--
ALTER TABLE `siniflar`
  MODIFY `sinif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Tablo için AUTO_INCREMENT değeri `stajbasvurudetay`
--
ALTER TABLE `stajbasvurudetay`
  MODIFY `StajBasvuruDetay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- Tablo için AUTO_INCREMENT değeri `stajdosyasi`
--
ALTER TABLE `stajdosyasi`
  MODIFY `stajdosyasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `yetkiler`
--
ALTER TABLE `yetkiler`
  MODIFY `yetki_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `baskanlar`
--
ALTER TABLE `baskanlar`
  ADD CONSTRAINT `baskanlar_ibfk_1` FOREIGN KEY (`baskan_bolum_id`) REFERENCES `bolumler` (`bolum_id`);

--
-- Tablo kısıtlamaları `danismanlar`
--
ALTER TABLE `danismanlar`
  ADD CONSTRAINT `danismanlar_ibfk_1` FOREIGN KEY (`danisman_bolum_id`) REFERENCES `bolumler` (`bolum_id`),
  ADD CONSTRAINT `danismanlar_ibfk_2` FOREIGN KEY (`Durumu`) REFERENCES `yetkiler` (`yetki_id`);

--
-- Tablo kısıtlamaları `ogrenciler`
--
ALTER TABLE `ogrenciler`
  ADD CONSTRAINT `ogrenciler_ibfk_1` FOREIGN KEY (`Ogrenci_sinif_id`) REFERENCES `siniflar` (`sinif_id`),
  ADD CONSTRAINT `ogrenciler_ibfk_2` FOREIGN KEY (`Ogrenci_danisman_id`) REFERENCES `danismanlar` (`danisman_id`),
  ADD CONSTRAINT `ogrenciler_ibfk_3` FOREIGN KEY (`Ogrenci_bolum_id`) REFERENCES `bolumler` (`bolum_id`),
  ADD CONSTRAINT `ogrenciler_ibfk_4` FOREIGN KEY (`Durumu`) REFERENCES `yetkiler` (`yetki_id`);

--
-- Tablo kısıtlamaları `siniflar`
--
ALTER TABLE `siniflar`
  ADD CONSTRAINT `siniflar_ibfk_1` FOREIGN KEY (`sinif_bolum_id`) REFERENCES `bolumler` (`bolum_id`),
  ADD CONSTRAINT `siniflar_ibfk_2` FOREIGN KEY (`sinif_danisman_id`) REFERENCES `danismanlar` (`danisman_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
