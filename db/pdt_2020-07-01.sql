# ************************************************************
# Sequel Pro SQL dump
# Version 5446
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.29)
# Database: pdt
# Generation Time: 2020-07-01 13:59:35 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table letters
# ------------------------------------------------------------

DROP TABLE IF EXISTS `letters`;

CREATE TABLE `letters` (
  `letter_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `letter_no` varchar(100) DEFAULT NULL,
  `letter_fullname` varchar(100) DEFAULT NULL,
  `letter_phone` varchar(15) DEFAULT NULL,
  `letter_file` varchar(255) DEFAULT NULL,
  `uke_4_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `letter_code` int(11) DEFAULT NULL,
  `letter_hukum` int(11) DEFAULT NULL,
  `letter_hukum_date` datetime DEFAULT NULL,
  `letter_sesditjen` int(11) DEFAULT NULL,
  `letter_sesditjen_date` datetime DEFAULT NULL,
  `letter_kpa` int(11) DEFAULT NULL,
  `letter_kpa_date` datetime DEFAULT NULL,
  `letter_dirjen` int(11) DEFAULT NULL,
  `letter_dirjen_date` datetime DEFAULT NULL,
  `letter_note` text,
  `letter_status` tinyint(4) DEFAULT '0',
  `user_id` int(11) DEFAULT NULL,
  `user_fullname` varchar(100) DEFAULT NULL,
  `letter_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `letter_updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`letter_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `letters` WRITE;
/*!40000 ALTER TABLE `letters` DISABLE KEYS */;

INSERT INTO `letters` (`letter_id`, `letter_no`, `letter_fullname`, `letter_phone`, `letter_file`, `uke_4_id`, `type_id`, `letter_code`, `letter_hukum`, `letter_hukum_date`, `letter_sesditjen`, `letter_sesditjen_date`, `letter_kpa`, `letter_kpa_date`, `letter_dirjen`, `letter_dirjen_date`, `letter_note`, `letter_status`, `user_id`, `user_fullname`, `letter_created_at`, `letter_updated_at`)
VALUES
	(1,'0001/PDT-202007','Achyar Anshorie','0811366875','S_15936095441843.pdf',1,1,3,1,'2020-07-01 20:19:39',NULL,NULL,1,'2020-07-01 20:19:48',NULL,NULL,'okee',1,1,'Administrator','2020-07-01 20:19:04','2020-07-01 20:19:56');

/*!40000 ALTER TABLE `letters` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `role_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;

INSERT INTO `roles` (`role_id`, `role_name`)
VALUES
	(1,'Admin'),
	(2,'User');

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table rules
# ------------------------------------------------------------

DROP TABLE IF EXISTS `rules`;

CREATE TABLE `rules` (
  `rule_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rule_no` varchar(100) DEFAULT NULL,
  `rule_about` text,
  `rule_year` year(4) DEFAULT NULL,
  `rule_date` date DEFAULT NULL,
  `rule_file` varchar(255) DEFAULT NULL,
  `rule_status` tinyint(4) DEFAULT '0',
  `uke_2_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_fullname` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`rule_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `rules` WRITE;
/*!40000 ALTER TABLE `rules` DISABLE KEYS */;

INSERT INTO `rules` (`rule_id`, `rule_no`, `rule_about`, `rule_year`, `rule_date`, `rule_file`, `rule_status`, `uke_2_id`, `type_id`, `user_id`, `user_fullname`, `created_at`, `updated_at`)
VALUES
	(1,'002','Covid 19','2020','2020-07-01','L_15936096633872.pdf',1,1,1,1,'Administrator','2020-07-01 20:21:03','2020-07-01 20:42:24');

/*!40000 ALTER TABLE `rules` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table type_letter
# ------------------------------------------------------------

DROP TABLE IF EXISTS `type_letter`;

CREATE TABLE `type_letter` (
  `type_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(100) DEFAULT NULL,
  `type_status` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `type_letter` WRITE;
/*!40000 ALTER TABLE `type_letter` DISABLE KEYS */;

INSERT INTO `type_letter` (`type_id`, `type_name`, `type_status`, `created_at`, `updated_at`)
VALUES
	(1,'SK Kuasa Pengguna Anggaran',1,'2020-07-01 20:17:39','2020-07-01 20:22:32'),
	(2,'SK Direktur Jenderal',1,'2020-07-01 20:22:40','2020-07-01 20:22:42');

/*!40000 ALTER TABLE `type_letter` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table uke_2
# ------------------------------------------------------------

DROP TABLE IF EXISTS `uke_2`;

CREATE TABLE `uke_2` (
  `uke_2_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uke_2_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`uke_2_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `uke_2` WRITE;
/*!40000 ALTER TABLE `uke_2` DISABLE KEYS */;

INSERT INTO `uke_2` (`uke_2_id`, `uke_2_name`)
VALUES
	(1,'Sekretariat Ditjen PDT'),
	(2,'Direktorat Perencanaan dan Identifikasi Daerah Tertinggal'),
	(3,'Direktorat Pengembangan Sumber Daya Manusia'),
	(4,'Direktorat Pengembangan Sumber Daya dan Lingkungan Hidup'),
	(5,'Direktorat Peningkatan Sarana dan Prasarana'),
	(6,'Direktorat Pengembangan Ekonomi Lokal');

/*!40000 ALTER TABLE `uke_2` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table uke_3
# ------------------------------------------------------------

DROP TABLE IF EXISTS `uke_3`;

CREATE TABLE `uke_3` (
  `uke_3_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uke_3_name` varchar(255) DEFAULT NULL,
  `uke_2_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`uke_3_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `uke_3` WRITE;
/*!40000 ALTER TABLE `uke_3` DISABLE KEYS */;

INSERT INTO `uke_3` (`uke_3_id`, `uke_3_name`, `uke_2_id`)
VALUES
	(1,'Bagian Perencanaan',1),
	(2,'Bagian Keuangan dan BMN',1),
	(3,'Bagian Kepegawaian dan Umum',1),
	(4,'Bagian Hukum, Organisasi dan Tata Laksana',1),
	(5,'Sub Dit Penyusunan Indikator Daerah Tertinggal',2),
	(6,'Sub Dit Identifikasi Daerah Tertinggal',2),
	(7,'Sub Dit Penyusunan Rencana dan Skema Pendanaan K/L',2),
	(8,'Sub Dit Penyusunan Rencana dan Skema Pendanaan Daerah',2),
	(9,'Sub Dit Evaluasi dan Pelaporan',2),
	(10,'Sub Dit Pendidikan',3),
	(11,'Sub Dit Kesehatan',3),
	(12,'Sub Dit Keterampilan',3),
	(13,'Sub Dit Tenaga Kerja',3),
	(14,'Sub Dit Inovasi dan Penerapan Teknologi',3),
	(15,'Sub Dit Sumber Daya Hayati',4),
	(16,'Sub Dit Tata Guna Lahan',4),
	(17,'Sub Dit Pariwisata',4),
	(18,'Sub Dit Sumber Daya Energi',4),
	(19,'Sub Dit Lingkungan Hidup',4),
	(20,'Sub Dit Sarana Prasarana Transportasi',5),
	(21,'Sub Dit Sarana Prasarana Air Bersih dan Permukiman',5),
	(22,'Sub Dit Sarana Prasarana Ekonomi',5),
	(23,'Sub Dit Sarana Prasarana Energi',5),
	(24,'Sub Dit Sarana Prasarana Informasi dan Telekomunikasi',5),
	(25,'Sub Dit Investasi dan Permodalan',6),
	(26,'Sub Dit Koperasi, Usaha Mikro, Kecil dan Menengah',6),
	(27,'Sub Dit Potensi Produk Unggulan',6),
	(28,'Sub Dit Kemitraan Usaha',6),
	(29,'Sub Dit Industri, Distribusi dan Pemasaran',6);

/*!40000 ALTER TABLE `uke_3` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table uke_4
# ------------------------------------------------------------

DROP TABLE IF EXISTS `uke_4`;

CREATE TABLE `uke_4` (
  `uke_4_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uke_4_name` varchar(255) DEFAULT NULL,
  `uke_3_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`uke_4_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `uke_4` WRITE;
/*!40000 ALTER TABLE `uke_4` DISABLE KEYS */;

INSERT INTO `uke_4` (`uke_4_id`, `uke_4_name`, `uke_3_id`)
VALUES
	(1,'Sub Bag Penyusunan Program dan Anggaran',1),
	(2,'Sub Bag Data dan Informasi',1),
	(3,'Sub Bag Evaluasi dan Pelaporan',1),
	(4,'Sub Bag Pelaksana Anggaran',2),
	(5,'Sub Bag Perbendaharaan',2),
	(6,'Sub Bag Akuntansi dan BMN',2),
	(7,'Sub Bag Kepegawaian',3),
	(8,'Sub Bag Persuratan',3),
	(9,'Sub Bag Perlengkapan dan Rumah Tangga',3),
	(10,'Sub Bag Penyusunan Peraturan Perundang-undangan',4),
	(11,'Sub Bag Advokasi Hukum',4),
	(12,'Sub Bag Organisasi dan Tata Laksana',4),
	(13,'Sub Bag Tata Usaha',4),
	(14,'Seksi Pengumpulan dan Analisis',5),
	(15,'Seksi Pengolahan dan Penyajian',5),
	(16,'Seksi Pengumpulan dan Analisis',6),
	(17,'Seksi Pengolahan dan Penyajian',6),
	(18,'Seksi Penyusunan Rencana',7),
	(19,'Seksi Skema Pendanaan',7),
	(20,'Seksi Penyusunan Rencana',8),
	(21,'Seksi Skema Pendanaan',8),
	(22,'Seksi Evaluasi',9),
	(23,'Seksi Pelaporan',9),
	(24,'Seksi Peningkatan SDM',10),
	(25,'Seksi Peningkatan Sarana dan Prasarana',10),
	(26,'Seksi Peningkatan SDM',11),
	(27,'Seksi Peningkatan Sarana dan Prasarana',11),
	(28,'Seksi Peningkatan Kualitas',12),
	(29,'Seksi Peningkatan Sarana dan Prasarana',12),
	(30,'Seksi Peningkatan Kapasitas Tenaga Kerja',13),
	(31,'Seksi Peningkatan Kesempatan Kerja',13),
	(32,'Seksi Inovasi',14),
	(33,'Seksi Penerapan Teknologi',14),
	(34,'Seksi Sumber Daya Hayati Berbasis Daratan',15),
	(35,'Seksi Sumber Daya Hayati Berbasis Maritim',15),
	(36,'Seksi Perencanaan Tata Guna Lahan',16),
	(37,'Seksi Pendayagunaan Tata Guna Lahan',16),
	(38,'Seksi Pengembangan Potensi Pariwisata',17),
	(39,'Seksi Promosi Pariwisata',17),
	(40,'Seksi Pemanfaatan Energi Terbarukan',18),
	(41,'Seksi Pemanfaatan Energi Non Terbarukan',18),
	(42,'Seksi Pelestarian Lingkungan Hidup',19),
	(43,'Seksi Peningkatan Kapasitas Lingkungan Hidup',19),
	(44,'Seksi Transportasi Darat',20),
	(45,'Seksi Transportasi Laut dan Udara',20),
	(46,'Seksi Air Bersih',21),
	(47,'Seksi Permukiman',21),
	(48,'Seksi Industri dan Perdagangan',22),
	(49,'Seksi Pertanian, Kelautan, Perikanan',22),
	(50,'Seksi Energi Baru Terbarukan Nabati',23),
	(51,'Seksi Energi Baru Terbarukan Non Nabati',23),
	(52,'Seksi Jaringan Informasi',24),
	(53,'Seksi Jaringan Telekomunikasi',24),
	(54,'Seksi Investasi',25),
	(55,'Seksi Permodalan',25),
	(56,'Seksi Koperasi',26),
	(57,'Seksi Usaha Mikro, Kecil dan Koperasi',26),
	(58,'Seksi Identifikasi dan Analisis Potensi Produk Ungulan',27),
	(59,'Seksi Pengembangan Produk Unggulan',27),
	(60,'Seksi Identifikasi Usaha',28),
	(61,'Seksi Evaluasi dan Pelaporan',28),
	(62,'Seksi Industri ',29),
	(63,'Seksi Distribusi dan Pemasaran',29);

/*!40000 ALTER TABLE `uke_4` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_fullname` varchar(255) DEFAULT NULL,
  `uke_3_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT '1',
  `user_desc` varchar(100) DEFAULT NULL,
  `user_status` tinyint(4) DEFAULT '1',
  `user_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_fullname`, `uke_3_id`, `role_id`, `user_desc`, `user_status`, `user_created_at`, `user_updated_at`)
VALUES
	(1,'admin','$2y$10$Pnw72BQhI/cjtaBR/51lK.SLtB5u3198dfIfJ/tnpRWA3efyWPIbu','Administrator',1,1,'Admin',1,'2020-07-01 20:10:34','2020-07-01 20:12:27'),
	(2,'bagren','$2y$10$q4uFz1YUa4SJ33j2uwxOceeTjX0GAfrxccF2r8kroJT2d/OrQXvay','Bagian Perencanaan',1,2,NULL,1,'2020-07-01 20:56:09',NULL),
	(3,'keuangan','$2y$10$1V/lsL142hH1B4n2aZI5Nehk9kddomCG4yjbQ3iqoHaS7RrtK5/mO','Bagian Keuangan dan BMN',2,2,NULL,1,'2020-07-01 20:56:09',NULL),
	(4,'kepum','$2y$10$RYbanwO3dmuyJKmKaUd4/.iXfwwrSGLD58Ve12RdlhfL1Q8hlDNuu','Bagian Kepegawaian dan Umum',3,2,NULL,1,'2020-07-01 20:56:09',NULL),
	(5,'baghot','$2y$10$lkMuhbGRqcLLaImal218eO3GusGqIfUjFSx5YbPr2xEkTPICPuoTi','Bagian Hukum, Organisasi dan Tata Laksana',4,2,NULL,1,'2020-07-01 20:56:10',NULL),
	(6,'indikator.pidt','$2y$10$bPVNXvoUPHWg8CeCGXPFSOspsal5lxBnEcamAvptCkulkFZ/VAPZK','Sub Dit Penyusunan Indikator Daerah Tertinggal',5,2,NULL,1,'2020-07-01 20:56:10',NULL),
	(7,'identifikasi.pidt','$2y$10$bxsTOlrvebinZv.js39k/uBLhN68JnMAwkCfxwXAXhHOYayoTKm2G','Sub Dit Identifikasi Daerah Tertinggal',6,2,NULL,1,'2020-07-01 20:56:10',NULL),
	(8,'pendanaankl.pidt','$2y$10$E/bUk0vi6Gg4KodBgfiIWepTm317qqnnnBOqg6b70U4Vxd.PK.MGm','Sub Dit Penyusunan Rencana dan Skema Pendanaan K/L',7,2,NULL,1,'2020-07-01 20:56:11',NULL),
	(9,'pendanaandaerah.pidt','$2y$10$2esXkSc7CFUIhOzXUaYWGeDNOj.sRMTiqnc7sgJIh0Wyif2Osy.22','Sub Dit Penyusunan Rencana dan Skema Pendanaan Daerah',8,2,NULL,1,'2020-07-01 20:56:11',NULL),
	(10,'evalap.pidt','$2y$10$jH5If0K8RlTzDkk9G6E/jOYpZ.16NIBafhId3uwjK2xbzfMkzcBF.','Sub Dit Evaluasi dan Pelaporan',9,2,NULL,1,'2020-07-01 20:56:11',NULL),
	(11,'pendidikan.psdm','$2y$10$wRl4uhevir1I28DmHL7USeXYrj7AkAThEmEmCCC56S615GPeae.Da','Sub Dit Pendidikan',10,2,NULL,1,'2020-07-01 20:56:12',NULL),
	(12,'kesehatan.psdm','$2y$10$vY2A59c7zjZS4cZtjeAHkuBC5nw0rGMJ5AQxN9LkQjmhFPCwOJooi','Sub Dit Kesehatan',11,2,NULL,1,'2020-07-01 20:56:12',NULL),
	(13,'keterampilan.psdm','$2y$10$/MCdz6Eyclvh5PRGfB9dYOF9vkwn759MGGGUj.QUF.kEeullknBhC','Sub Dit Keterampilan',12,2,NULL,1,'2020-07-01 20:56:12',NULL),
	(14,'tenagakerja.psdm','$2y$10$D3nfSd41UvLzA5.Kbbojcu/a.AtkqAXjk05.7es0V9qhUNsP8zhuy','Sub Dit Tenaga Kerja',13,2,NULL,1,'2020-07-01 20:56:13',NULL),
	(15,'inovtek.psdm','$2y$10$IwS/rLPED70VBdN92TPH3OZrpEw9L/loFABOckbdYMx4WtXuxUxAm','Sub Dit Inovasi dan Penerapan Teknologi',14,2,NULL,1,'2020-07-01 20:56:13',NULL),
	(16,'sdhayati.psdlh','$2y$10$dgu6ya5UinAf3O3pAF9.pOw/nKeIu4EtGahPNlH75MbMUlsC5u1J6','Sub Dit Sumber Daya Hayati',15,2,NULL,1,'2020-07-01 20:56:13',NULL),
	(17,'tglahan.psdlh','$2y$10$fnjFvILNdz2MaV94lyQoUuBckvgbnuAtZyaRG4Ab/f.4vWKlmXO.6','Sub Dit Tata Guna Lahan',16,2,NULL,1,'2020-07-01 20:56:14',NULL),
	(18,'pariwisata.psdlh','$2y$10$A9WePcEt3xOJ6E.T5ofyB.HBXisJQ65X40pVZqC.E/hhNmex2225e','Sub Dit Pariwisata',17,2,NULL,1,'2020-07-01 20:56:14',NULL),
	(19,'sdenergi.psdlh','$2y$10$Czx8SEvifr6XVLypdG.Di.P9c9ds/Tr5d9B626.06vYvi81gejyhe','Sub Dit Sumber Daya Energi',18,2,NULL,1,'2020-07-01 20:56:14',NULL),
	(20,'lhidup.psdlh','$2y$10$iAXeWnHOkEgSxqpDqp9hTOQSLdZ1tU2bP3rv2QwRhJCEYq/XE.jdK','Sub Dit Lingkungan Hidup',19,2,NULL,1,'2020-07-01 20:56:15',NULL),
	(21,'transportasi.sarpras','$2y$10$W0xxmhS2cTwHnxF2wgcgWeq/TtU3hOReMFnE/fPuQwmOli14NBZ26','Sub Dit Sarana Prasarana Transportasi',20,2,NULL,1,'2020-07-01 20:56:15',NULL),
	(22,'airbersih.sarpras','$2y$10$jLqBCgGfgirJ/8Qdy3WDW.N3Ar/gA7NKtcXcTmKmjq2V0KIQXLvJ.','Sub Dit Sarana Prasarana Air Bersih dan Permukiman',21,2,NULL,1,'2020-07-01 20:56:15',NULL),
	(23,'ekonomi.sarpras','$2y$10$AJHDKpBqbB7uqhGvaHGahewc/5yvCXa1eEtgtGjdKoTby.8S5K82.','Sub Dit Sarana Prasarana Ekonomi',22,2,NULL,1,'2020-07-01 20:56:16',NULL),
	(24,'energi.sarpras','$2y$10$Src07d.Z90yfSTKNWn5CFOSlc0/SGHo5Hiwt9bWwczKWu6M0M30i6','Sub Dit Sarana Prasarana Energi',23,2,NULL,1,'2020-07-01 20:56:16',NULL),
	(25,'infotel.sarpras','$2y$10$y20zt56Cub4LJUAqd9wyIuwPkz21o6xC7RP/e/o.bBb/C6YtCcBiW','Sub Dit Sarana Prasarana Informasi dan Telekomunikasi',24,2,NULL,1,'2020-07-01 20:56:16',NULL),
	(26,'investasi.pel','$2y$10$Ld2oMUHQlIpkQxehwnEgEuF.3dOvMqpoXdHawZhvwgxElQJ2MfbbW','Sub Dit Investasi dan Permodalan',25,2,NULL,1,'2020-07-01 20:56:16',NULL),
	(27,'koperasi.pel','$2y$10$GZU4NhT1Vqkwt8meuQZLleoHSmqC5hEwJJSycy7KJlM8ZpPu/6e2O','Sub Dit Koperasi, Usaha Mikro, Kecil dan Menengah',26,2,NULL,1,'2020-07-01 20:56:17',NULL),
	(28,'ppu.pel','$2y$10$NXRBewQwAnUA50aaS616kOqFVNmF6Hg..t7qCy.3f6r07rHdCXoWC','Sub Dit Potensi Produk Unggulan',27,2,NULL,1,'2020-07-01 20:56:17',NULL),
	(29,'kemitraan.pel','$2y$10$ywwua6/dn5UUciswPACrnuNbMQKeomz6HKRwQjXCyoKBbELo1SULq','Sub Dit Kemitraan Usaha',28,2,NULL,1,'2020-07-01 20:56:17',NULL),
	(30,'idp.pel','$2y$10$joyOYun5favvyOjcDxC/ZuCJXrtDs2DFiFLU.WDkdMgkQK2F7YIOW','Sub Dit Industri, Distribusi dan Pemasaran',29,2,NULL,1,'2020-07-01 20:56:18',NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
