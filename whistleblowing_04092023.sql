-- MySQL dump 10.13  Distrib 5.5.55, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: whistleblowing
-- ------------------------------------------------------
-- Server version	5.5.55-0ubuntu0.14.04.1-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori`
--

LOCK TABLES `kategori` WRITE;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` VALUES (1,'Penyimpangan dari Tugas dan Fungsi'),(2,'Gratifikasi'),(3,'Benturan Kepentingan'),(4,'Melanggar Peraturan dan Perundangan yang berlaku'),(5,'Tindak Pidana Korupsi');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `level` enum('masyarakat','petugas','admin') DEFAULT NULL,
  PRIMARY KEY (`id_login`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (1,'whistleblowing.pemkabwonosobo@gmail.com','$2y$10$aVqbTLEQCTedt0F.dPVcSeOqQpNEkNKZ/8T6ukyAsee3ZU.x1nkUO','admin'),(2,'petugas1@gmail.com','$2y$10$raRvkBE1lCkEuBcZ7PCBs.bZBqsDolHwmixjzheAFTm43AryGRuEG','petugas'),(3,'petugas2@gmail.com','$2y$10$lEOrPv.un8wfv0e1.dJhvePO2b27pWq/jGffHjPaVho99BJTRdhnK','petugas'),(4,'petugas3@gmail.com','$2y$10$hBRKalrFv1Nj9cF2k7lwN.bgBZ2XObkMRzDP52/mwU/HtS0L3fr8i','petugas'),(5,'pengadu1@gmail.com','$2y$10$rxNMcrrRP/RBNF.kOBJc3OGuNSZM5jZcwX0xtSBuIcERj65hIszyC','masyarakat'),(6,'kabwsb@gmail.com','$2y$10$JlvmBbhJPN2R91aajPx.6ep7IzPx3ZRhpl8OoI4PzjU/sV3ruAI7K','masyarakat'),(7,'dhittamvan60@gmail.com','$2y$10$cDdXPhdbFcLH.aCmzdh68OZFWE7PI09e3V56WGK2rfgtK0aSjp5uu','masyarakat'),(8,'inspektoratkabwonosobo@yahoo.co.id','$2y$10$4dsomHSm.GIHPzgCyTkFQuW49tNUbldYiDbL1/dh3hZiCNmHpAkqa','masyarakat'),(9,'e4wvatlgiq@the23app.com','$2y$10$dJh6/PFM6yEfqbIzXvvcC.x6YZZg53fa.F7BHof4YDYEHgZ4dPTXG','masyarakat'),(10,'pirojas907@flipssl.com','$2y$10$Wjmh8z5SEuqldA5UPZkWn.Xb/VQJvLSwd.qm6W.ASr8C2tu3DP3MC','masyarakat'),(11,'pejuanghati08@gmail.com','$2y$10$pbD3Vl2VMKwhkygwodKLBeLb3.PhGdZmXMMMZuOrFdj5.FNaJy6nS','masyarakat'),(12,'adikgansgans@gmail.com','$2y$10$jJtWJLRgeD4Oq/1QentR3.KamHx1SD26HeCpAucrTo.oNfSsRTyEi','masyarakat'),(13,'fitrifitri278@gmail.com','$2y$10$wrc3yrOEC5hT6haBvOabgekRgn3naVUzGk56L5gFVZUno21kZV35G','masyarakat'),(14,'atikaasapratiwi@gmail.com','$2y$10$0LQO8ktrDWqBQD8UQZpEhu1sEKuQ45h8OuK.ex/EvFarMllrvXaf2','masyarakat'),(15,'cinayir522@revtxt.com','$2y$10$EiBCFBjLxBUIMtLnOsMgauseiY0GoDzpjh1hl0YKqL8yXcaVRtQJi','masyarakat'),(16,'javasbrilianto@gmail.com','$2y$10$fuePod29.OSSAoZR8Hftvu4fTXJeLhzNh2p7OXIIg3WXVUztMfTF.','masyarakat'),(17,'lintangfebiusmani7@gmail.com','$2y$10$o.bYx1CxrdrOSumqgQAiDOZMBgv0OUPCj0IBKe0sqp0dQ3haJ.UcG','masyarakat'),(18,'ika.aris.jatmika@gmail.com','$2y$10$2svUoO4g9i1WrrO/ebH7xubMm8y4sPB8cZpZX/nC.J91OOEbhADBW','masyarakat'),(19,'dudunk_1986@yahoo.co.id','$2y$10$c4ccwuEGKR0iUQlwn1jmAu8P2wC1h7Vw.7oTahNRS2v2CxKRG3lya','masyarakat');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `masyarakat`
--

DROP TABLE IF EXISTS `masyarakat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `masyarakat` (
  `nik` varchar(18) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(128) DEFAULT NULL,
  `telp` varbinary(13) DEFAULT NULL,
  `id_login` int(11) DEFAULT NULL,
  PRIMARY KEY (`nik`),
  UNIQUE KEY `nik` (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `masyarakat`
--

LOCK TABLES `masyarakat` WRITE;
/*!40000 ALTER TABLE `masyarakat` DISABLE KEYS */;
INSERT INTO `masyarakat` VALUES ('0899777777777','pandu','wonosobo','085727506296',8),('1111111111111111','memek','peterongan','085760840123',9),('197111291999031002','Ika Aris Jatmika','Banaran RT. 1 RW. 7 Kalierang Selomerto Wonosobo','081327063600',18),('198605152009031004','Agung Setiawan','wonosobo','082111557773',19),('198605152009031005','Agung Coba-coba','Wonosobo','082111557774',5),('199802072022032003','Lintang Febi','Krasak','082223020891',17),('199805022022032001','Atika Asa Pratiwi','Kampung Sruni Kota 32B RT 01 RW 07','0895376164089',14),('2345675678902567','Andrea Ahrens','Stutzweg 16','05454545',7),('3212161607070001','Ucup sanusi','Jakarta','081234567890',15),('3304155703940004','Fitriyati','Krajan Sijeruk 03/03 Tieng Kejajar Wonosobo','085726985504',13),('3307071402930004','Javas Brilianto','Sapuran','089697379097',16),('465454545455454','Just pentest','Anjay','0855154554555',11),('72727273738383883','adikadik','Hzhshshshjs','0827727272',12),('7394819494949499','oreo oreo','Jakarta','085811488903',10),('898989898989','budi','wonosobo','0898989898',6);
/*!40000 ALTER TABLE `masyarakat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengaduan`
--

DROP TABLE IF EXISTS `pengaduan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) DEFAULT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `nama_terlapor` varchar(50) NOT NULL,
  `lokasi_kejadian` text NOT NULL,
  `tanggal_kejadian` date NOT NULL,
  `tanggal_pengaduan` date DEFAULT NULL,
  `isi_pengaduan` text,
  `file` varchar(50) DEFAULT NULL,
  `status` enum('Pending','Proses','Approved','Selesai') DEFAULT 'Pending',
  PRIMARY KEY (`id_pengaduan`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengaduan`
--

LOCK TABLES `pengaduan` WRITE;
/*!40000 ALTER TABLE `pengaduan` DISABLE KEYS */;
INSERT INTO `pengaduan` VALUES (1,2,'1986051520090310','Agus','Kantor','2021-08-31','2021-09-01','abc','Tidak Ada Bukti Dukung yang Dilampirkan','Pending'),(2,2,'1986051520090310','dwi','kantor','2021-08-31','2021-09-02','abc','Tidak Ada Bukti Dukung yang Dilampirkan','Pending'),(3,2,'898989898989','fahri','dkk','2021-09-01','2021-09-02','abcde','Tidak Ada Bukti Dukung yang Dilampirkan','Selesai'),(4,1,'2345675678902567','083838337','Hdjdjd','2021-11-08','2021-11-01','Bdbdndbdnd ssbdb','Tidak Ada Bukti Dukung yang Dilampirkan','Pending'),(5,3,'2345675678902567','083837373','Bdbdndb','2021-11-08','2021-11-08','Ndndbd d','Tidak Ada Bukti Dukung yang Dilampirkan','Pending'),(6,2,'1111111111111111','nfn','jf','2021-12-29','2021-12-29','cmc','Tidak Ada Bukti Dukung yang Dilampirkan','Pending'),(7,3,'1111111111111111','nfn','nf','2021-12-29','2021-12-06','cm','Tidak Ada Bukti Dukung yang Dilampirkan','Pending'),(8,2,'7394819494949499','oreo','ok','2022-02-07','2022-02-07','vhughhjj jjjjjjjjj','Tidak Ada Bukti Dukung yang Dilampirkan','Pending'),(9,3,'465454545455454','Dhjd','Bdjd','2022-01-13','2022-03-20','Ddd','Tidak Ada Bukti Dukung yang Dilampirkan','Pending'),(10,3,'465454545455454','Hh','Jxj','2022-03-20','2022-03-20','Xnnx','Tidak Ada Bukti Dukung yang Dilampirkan','Pending'),(11,3,'465454545455454','Hh','Jxj','2022-03-20','2022-03-20','Xnnx','Tidak Ada Bukti Dukung yang Dilampirkan','Pending'),(12,2,'465454545455454','Hdhd','Hdhd','2022-03-20','2022-03-11','Jdjd','Tidak Ada Bukti Dukung yang Dilampirkan','Pending'),(13,3,'7272727373838388','Hsjsjs','Jsjsusss','2022-04-09','2022-04-02','Njzjjzjzjxxhzhzhzz','Tidak Ada Bukti Dukung yang Dilampirkan','Pending'),(14,1,'1998050220220320','cek','cek','2022-07-25','2022-07-26','cek aja','Tidak Ada Bukti Dukung yang Dilampirkan','Pending');
/*!40000 ALTER TABLE `pengaduan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `petugas`
--

DROP TABLE IF EXISTS `petugas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_petugas` varchar(50) DEFAULT NULL,
  `telp` varchar(13) DEFAULT NULL,
  `id_login` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_petugas`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `petugas`
--

LOCK TABLES `petugas` WRITE;
/*!40000 ALTER TABLE `petugas` DISABLE KEYS */;
INSERT INTO `petugas` VALUES (1,'Petugas 1','082111557771',2),(2,'Petugas 2','082111557772',3),(3,'Petugas 3','082111557773',4);
/*!40000 ALTER TABLE `petugas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tanggapan`
--

DROP TABLE IF EXISTS `tanggapan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengaduan` int(11) DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  `tanggal_tanggapan` date DEFAULT NULL,
  `isi_tanggapan` text,
  `file2` varchar(50) DEFAULT NULL,
  `status2` enum('Ditolak','Terbukti','Tidak Terbukti') DEFAULT NULL,
  PRIMARY KEY (`id_tanggapan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tanggapan`
--

LOCK TABLES `tanggapan` WRITE;
/*!40000 ALTER TABLE `tanggapan` DISABLE KEYS */;
INSERT INTO `tanggapan` VALUES (1,3,1,'2021-09-02','&lt;p&gt;Terima kasih telah.... silahkan download attachment untuk jawaban lebih lengkap....&lt;/p&gt;','','Terbukti');
/*!40000 ALTER TABLE `tanggapan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_token`
--

DROP TABLE IF EXISTS `user_token`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_token`
--

LOCK TABLES `user_token` WRITE;
/*!40000 ALTER TABLE `user_token` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_token` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-09-04 23:10:02
