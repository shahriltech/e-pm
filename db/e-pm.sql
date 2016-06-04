-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 20, 2016 at 03:03 PM
-- Server version: 5.5.43-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `e-pm`
--

-- --------------------------------------------------------

--
-- Table structure for table `lookup_position`
--

CREATE TABLE IF NOT EXISTS `lookup_position` (
  `position_id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(100) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  PRIMARY KEY (`position_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `lookup_position`
--

INSERT INTO `lookup_position` (`position_id`, `position`, `role`) VALUES
(13, 'Pendidikan', 2),
(14, 'Dakwah', 2),
(15, 'Keselamatan', 2),
(16, 'Wakil Wanita', 2),
(17, 'Kebajikan', 2),
(18, 'Ict', 2),
(19, 'Ekonomi', 2),
(20, 'Wakil Pemuda', 2),
(21, 'Tanah Wakaf', 2),
(22, 'Pembangunan', 2),
(23, 'Tanah Kubur', 2),
(24, 'Penerbitan', 2),
(25, 'Nazir', 1),
(26, 'Timbalan Nazir', 1),
(27, 'Bendahari', 1),
(28, 'Setiausaha', 1),
(29, 'Sistem Admin', 3);

-- --------------------------------------------------------

--
-- Table structure for table `lookup_role`
--

CREATE TABLE IF NOT EXISTS `lookup_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `lookup_role`
--

INSERT INTO `lookup_role` (`id`, `role`) VALUES
(1, 'Pengurusan'),
(2, 'AJK/Sokongan'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `paperwork`
--

CREATE TABLE IF NOT EXISTS `paperwork` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nama_program` varchar(200) DEFAULT NULL,
  `pw_obj` varchar(1000) DEFAULT NULL,
  `pw_background` varchar(1000) DEFAULT NULL,
  `pw_justifikasi` varchar(1000) DEFAULT NULL,
  `pw_advantage` varchar(1000) DEFAULT NULL,
  `pw_startdate` varchar(20) DEFAULT NULL,
  `pw_endDate` varchar(50) DEFAULT NULL,
  `jangka_masa` varchar(100) DEFAULT NULL,
  `pw_budget` decimal(10,2) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status_by_su` int(11) DEFAULT '0',
  `status_by_bendahari` int(11) NOT NULL DEFAULT '0',
  `status_by_timbalan` int(11) NOT NULL DEFAULT '0',
  `status_by_nazir` int(11) NOT NULL DEFAULT '0',
  `pw_submit_status` varchar(200) DEFAULT NULL,
  `pw_norujukan` varchar(50) DEFAULT NULL,
  `pw_dateUpdated` varchar(50) DEFAULT NULL,
  `pw_yearApprove` varchar(20) DEFAULT NULL,
  `pw_monthlyApprove` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `paperwork`
--

INSERT INTO `paperwork` (`id`, `nama_program`, `pw_obj`, `pw_background`, `pw_justifikasi`, `pw_advantage`, `pw_startdate`, `pw_endDate`, `jangka_masa`, `pw_budget`, `user_id`, `status_by_su`, `status_by_bendahari`, `status_by_timbalan`, `status_by_nazir`, `pw_submit_status`, `pw_norujukan`, `pw_dateUpdated`, `pw_yearApprove`, `pw_monthlyApprove`) VALUES
(38, 'Program Kesedaran Ibu Bapa dan Pengenalan Job Coach Untuk Orang Kurang Upaya (OKU).', 'Pengisian program Job Coach ini adalah bagi memberi pendedahan dan penekanan kepada ibu bapa supaya mereka dapat membantu dan melatih perkembangan diri anak OKU bukan sahaja dari segi pendidikan malah dari segi pendekatan dan membuka peluang kepada anak-anak OKU itu sendiri.', 'Program ini akan berkunjung ke Perak buat pertama kalinya pada 29 Mei 2016 bersamaan hari Jumaat bertempat di Dewan Masjid Jamek, Bota. Program yang bakal dijalankan ini turut mendapat kerjasama dan sokongan daripada Jabatan Kebajikan Masyarakat.', 'Dengan berlangsungnya program ini, ianya dapat memberi kesedaran kepada ibu bapa mengenai kepentingan dalam meningkatkan motivasi diri Anak Kurang Upaya (OKU) serta melatih perkembangan diri anak-anak ini supaya mereka dapat berdikari apabila mereka besar kelak. Pengenalan Job Coach ini juga dapat membantu ibu bapa untuk melatih anak mereka serta membantu dari segi mencari pekerjaan untuk anak-anak mereka.', 'Kelebihan program ini dapat memberi kesedaran kepada ibu bapa malah dapat membantu Anak Kurang Upaya dalam beberapa program yang akan di jalankan di bawah Job Coach For Malaysia (JCFM).', '29/05/2016', '29/05/2016', '9.00 pagi - 1.00 petang', 5500.00, 37, 1, 1, 2, 2, 'Telah Di Hantar', 'e-kk72086', '2016-05-18', '2016', 'Mei, 2016'),
(39, 'KERTAS CADANGAN PROGRAM TAZKIRAH ', 'Melahirkan warga SMKA yang memiliki sahsiah diri yang mulia, berbudi pekerti, berhemah dan cintakan ajaran Islam. Mewujudkan suasana keakraban, kemesraan dan seronok beramal  ibadah demi menyemarakkan amalan secara jamaie serta seimbang dalam mengendalikan urusan duniawi dan ukhrawi. Melahirkan rasa bersyukur dengan nikmat keselesaan hidup dan  kesihatan di kalangan warga SMKA. Memantap dan menyemarakkan lagi ukhuwah Islamiah antara warga SMK Agama Slim River. Melatih pelajar mempunyai keyakinan diri apabila berhadapan dengan orang ramai.', 'Semua murid SMK Agama Slim River, Perak Darul Ridzuan.  Program yang dirancang adalah untuk kecemerlangan sahsiah pelajarSMK Agama Slim River sesuai dengan Falsafah Pendidikan Kebangsaan yangingin melahirkan insan yang seimbang dari segi jasmani, emosi, rohani danintelek. Program yang dirancang, perlu dilaksanakan secara berterusan agarmembuahkan hasil yang membanggakan. ', 'Program yang dirancang adalah untuk kecemerlangan sahsiah pelajarSMK Agama Slim River sesuai dengan Falsafah Pendidikan Kebangsaan yangingin melahirkan insan yang seimbang dari segi jasmani, emosi, rohani danintelek. Program yang dirancang, perlu dilaksanakan secara berterusan agarmembuahkan hasil yang membanggakan. ', 'Program Tazkirah adalah salah satu aktiviti yang dilaksanakan olehpara   pelajar   SMK   Agama   Slim   River   di   bawah   bimbingan   AJK   BADANI.Program ini dapat mehidupkan sunnah Rasulullah di samping melatih pelajarmempunyai   keyakinan   diri   apabila   berhadapan   dengan   para   jamaahseterusnya   dapat   merapatkan   hubungan   antara   warga   SMK   Agama   SlimRiver serta menambah pahala. ', '19/05/2016', '21/05/2016', '9.00 pagi - 3.00 petang', 4500.00, 37, 0, 0, 0, 0, 'Belum Di hantar', 'e-kk06952', '2016-05-19', '2016', 'Mei, 2016');

-- --------------------------------------------------------

--
-- Table structure for table `reason_paperworkNotapproved`
--

CREATE TABLE IF NOT EXISTS `reason_paperworkNotapproved` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sebab` varchar(1000) DEFAULT NULL,
  `paperwork_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `reason_paperworkNotapproved`
--

INSERT INTO `reason_paperworkNotapproved` (`id`, `sebab`, `paperwork_id`) VALUES
(3, 'Peruntukan tidak mencukupi untuk program ini.', 38);

-- --------------------------------------------------------

--
-- Table structure for table `status_paperwork`
--

CREATE TABLE IF NOT EXISTS `status_paperwork` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `status_paperwork`
--

INSERT INTO `status_paperwork` (`id`, `status`) VALUES
(0, 'Belum Diluluskan'),
(1, 'Diluluskan'),
(2, 'Tidak Diluluskan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ic_no` varchar(14) DEFAULT NULL,
  `fullname` varchar(250) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `password_hash` varchar(255) CHARACTER SET latin2 DEFAULT NULL,
  `position_id` int(100) DEFAULT NULL,
  `auth_key` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '10',
  `email` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `ic_no`, `fullname`, `username`, `role`, `password_hash`, `position_id`, `auth_key`, `status`, `email`) VALUES
(26, '123456-78-9102', 'admin', 'admin', 3, '$2y$13$YuAjeB6XKLq5UUhgWAPS4.qlq6b1/CW4rit4lr7.fNtsWCfRl1aEK', 29, 'YRZOmY34aJv_V1F0Uzw2wECFi1cHkNdP', 10, 'silenttech9@gmail.com'),
(30, '910420-08-4563', 'shahril anuar bin md din ', 'shahril9', 2, '$2y$13$dXJbvFf0KKNZzXXltFmVmuyx5tAMYsbedCDUyKW6LVlOfd9HT13RO', 18, 'Rxhn8pI09-6qC9_UhBwXX3WMHPxPy8lx', 10, 'silenttech9@gmail.com'),
(34, '111135-55-1568', 'Abdullah Zaid Bin Abdullah', 'zaid', 1, '$2y$13$ncHd715ZH54jZVfbnfHUReEaezYy.S./vSB2af7qRfQyInjsM2MHW', 28, '7Avgr48udem4D9syuUMZP02fJ7JI0xhg', 10, 'zaid@gmail.com'),
(35, '901211-12-4569', 'muhammad sazali bin ramli', 'sazali', 1, '$2y$13$NZ4uK.QBcH1LaoKjq5KTyepCJlnpwAd8N8QJ6i9u1PX6SzwYG5XRG', 27, '0NtQ7hV3BHb9w-qTW7YKN-ZU1t0SRwKp', 10, 'sazali@gmail.com'),
(36, '900401-03-1234', 'Muhammad Zulmadi', 'zulmadi', 1, '$2y$13$2zEbRAIa6dyH9j8thkgsJ.IlZl3Fv1u54QdhaAFBaGqYIrYssPUPu', 26, '5wTzyLsh1z-amXdZvk-hlFZFUu0LC-so', 10, 'zulmadi@gmail.com'),
(37, '900808-14-6543', 'Muhammad Fuad Bin Samsudin', 'fuad', 2, '$2y$13$Y8EmGIclJUj2kLzlMc/S..r9Hkd9vIJi8cmRU9vT9mOrGqzuRHhK.', 13, 'LA2ijPFPOiagiQLao9ImnjhnGXM9FEvP', 10, 'silenttech9@gmail.com'),
(38, '870505-06-9874', 'Nik Mohd Fadzil', 'nikpadel', 1, '$2y$13$YRRJRVwS1M3pKjjKXYsnEePdJHrhL2JvVxdK2zelSJD/WiNFloVla', 25, 'n7JDhC3zcPqjh_IDBwIExoNk1ygqnhQR', 10, 'i.marizkillah@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `userpass`
--

CREATE TABLE IF NOT EXISTS `userpass` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pass` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `userpass`
--

INSERT INTO `userpass` (`id`, `pass`, `user_id`) VALUES
(9, 'admin', 26),
(13, 'shahril9', 30),
(15, 'zaidgomez', 34),
(16, 'sazali', 35),
(17, 'zulmadi', 36),
(18, 'fuad', 37),
(19, 'nikpadel', 38);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
