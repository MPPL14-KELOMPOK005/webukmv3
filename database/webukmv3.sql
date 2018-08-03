-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 03, 2018 at 05:02 
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `webukmv3`
--

-- --------------------------------------------------------

--
-- Table structure for table `halamanstatis`
--

CREATE TABLE IF NOT EXISTS `halamanstatis` (
  `id_halaman` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) NOT NULL,
  `judul_seo` varchar(100) NOT NULL,
  `isi_halaman` text NOT NULL,
  `tgl_posting` date NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `dibaca` int(5) NOT NULL DEFAULT '1',
  `jam` time NOT NULL,
  `hari` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_halaman`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `halamanstatis`
--

INSERT INTO `halamanstatis` (`id_halaman`, `judul`, `judul_seo`, `isi_halaman`, `tgl_posting`, `gambar`, `username`, `dibaca`, `jam`, `hari`) VALUES
(1, 'Visi dan Misi', 'visi-dan-misi', '<p><strong>VISI</strong><br />\r\nTerwujudnya generasi berakhlak mulia, cerdas, dan demokratis mengakar pada budaya bangsa serta mampu bersaing di era global.<br />\r\n<br />\r\n<strong>MISI</strong></p>\r\n\r\n<ol>\r\n	<li>Mengadakan kegiatan keagamaan secara rutin dan teratur untuk menumbuhkan penghayatan terhadap ajaran agama yang dianutnya.</li>\r\n	<li>Membentuk karakter siswa yang berbudi pekerti luhur sesuai dengan budaya bangsa Indonesia.</li>\r\n	<li>Menyelenggarakan proses pendidikan yang bermutu berorientasi pada pencapaian kompetensi berstandar nasional dan Internasional</li>\r\n	<li>Membentuk siswa kreatif, inovatif, dan cerdas yang mampu berkompetisi di era global.</li>\r\n	<li>Membentuk siswa agar memiliki sikap disiplin, jujur, baik, adil, demokratis, dan bertanggung jawab.</li>\r\n	<li>Mendidik dan melatih siswa agar mampu bersaing di perguruan tinggi terbaik di dalam maupun di luar negeri dan menjadi manusia pembelajar sepanjang hayat.<span id="cke_bm_98E" style="display:none">&nbsp;</span></li>\r\n</ol>\r\n\r\n<div style="overflow: hidden; color: rgb(0, 0, 0); background-color: rgb(255, 255, 255); text-align: left; text-decoration: none; border: medium none;">&nbsp;</div>\r\n', '2012-06-19', '59visi-misi.jpeg', 'admin', 61, '09:20:12', 'Selasa'),
(2, 'Profil Singkat', 'profil-singkat', '<p>MySchool, Jakarta yang juga dikenal dengan nama Myschool, berada di bilangan Kalibata Jakarta Selatan. Berdiri pada tanggal 18 Agustus 1964, awalnya hanya sebagai kelas jauh dari MySchool, Jakarta, hingga ditetapkan menjadi sekolah mandiri pada tahun 1968.<br />\r\n<br />\r\nPada tahun 1994 sekolah ini menjadi sekolah unggulan di wilayah Jakarta Selatan. Pada tahun 2004 ditetapkan sebagai sekolah internasional di wilayah DKI Jakarta.<br />\r\n<br />\r\n<strong>VISI</strong><br />\r\nTerwujudnya generasi berakhlak mulia, cerdas, dan demokratis mengakar pada budaya bangsa serta mampu bersaing di era global.<br />\r\n<br />\r\n<strong>MISI</strong></p>\r\n\r\n<ul>\r\n	<li>Mengadakan kegiatan keagamaan secara rutin dan teratur untuk menumbuhkan penghayatan terhadap ajaran agama yang dianutnya.</li>\r\n	<li>Membentuk karakter siswa yang berbudi pekerti luhur sesuai dengan budaya bangsa Indonesia.</li>\r\n	<li>Menyelenggarakan proses pendidikan yang bermutu berorientasi pada pencapaian kompetensi berstandar nasional dan Internasional</li>\r\n	<li>Membentuk siswa kreatif, inovatif, dan cerdas yang mampu berkompetisi di era global.</li>\r\n	<li>Membentuk siswa agar memiliki sikap disiplin, jujur, baik, adil, demokratis, dan bertanggung jawab.</li>\r\n	<li>Mendidik dan melatih siswa agar mampu bersaing di perguruan tinggi terbaik di dalam maupun di luar negeri dan menjadi manusia pembelajar sepanjang hayat.</li>\r\n</ul>\r\n\r\n<div style="overflow: hidden; color: rgb(0, 0, 0); background-color: rgb(255, 255, 255); text-align: left; text-decoration: none; border: medium none;">&nbsp;</div>\r\n', '2016-02-07', '86gedung.jpg', 'admin', 33, '21:22:58', 'Minggu'),
(3, 'Sejarah Sekolah', 'sejarah-sekolah', '<p>MySchool, Jakarta yang juga dikenal dengan nama Myschool, berada di bilangan Kalibata Jakarta Selatan. Berdiri pada tanggal 18 Agustus 1964, awalnya hanya sebagai kelas jauh dari MySchool, Jakarta, hingga ditetapkan menjadi sekolah mandiri pada tahun 1968.<br />\r\n<br />\r\nPada tahun 1994 sekolah ini menjadi sekolah unggulan di wilayah Jakarta Selatan. Pada tahun 2004 ditetapkan sebagai sekolah internasional di wilayah DKI Jakarta.<br />\r\n<br />\r\n<strong>VISI</strong><br />\r\nTerwujudnya generasi berakhlak mulia, cerdas, dan demokratis mengakar pada budaya bangsa serta mampu bersaing di era global.<br />\r\n<br />\r\n<strong>MISI</strong></p>\r\n\r\n<ol>\r\n	<li>Mengadakan kegiatan keagamaan secara rutin dan teratur untuk menumbuhkan penghayatan terhadap ajaran agama yang dianutnya.</li>\r\n	<li>Membentuk karakter siswa yang berbudi pekerti luhur sesuai dengan budaya bangsa Indonesia.</li>\r\n	<li>Menyelenggarakan proses pendidikan yang bermutu berorientasi pada pencapaian kompetensi berstandar nasional dan Internasional</li>\r\n	<li>Membentuk siswa kreatif, inovatif, dan cerdas yang mampu berkompetisi di era global.</li>\r\n	<li>Membentuk siswa agar memiliki sikap disiplin, jujur, baik, adil, demokratis, dan bertanggung jawab.</li>\r\n	<li>Mendidik dan melatih siswa agar mampu bersaing di perguruan tinggi terbaik di dalam maupun di luar negeri dan menjadi manusia pembelajar sepanjang hayat.</li>\r\n</ol>\r\n', '2016-02-07', '70gedung.jpg', 'admin', 41, '21:30:13', 'Minggu'),
(4, 'Ekstra Kurikuler', 'ekstra-kurikuler', '<p>Kualitas tamatan sekolah dituntut untuk memenuhi standar kompetensi dunia kerja. Salah satunya, selain mampu menguasai materi pelajaran, siswa harus dapat berinteraksi dan aktif dalam hubungan sosial.</p>\r\n\r\n<p>Kegiatan ekstrakurikuler merupakan salah satu alat pengenalan siswa pada hubungan sosial. Di dalamnya terdapat pendidikan pengenalan diri dan pengembangan kemampuan selain pemahaman materi pelajaran.</p>\r\n\r\n<p>Berangkat dari pemikiran tersebut, di MySchool diselenggarakan berbagai kegiatan ekstrakurikuler.</p>\r\n\r\n<p>Selain OSIS sebagai induk kegiatan ektrakurikuler di sekolah, kegiatan ektrakurikuler lainnya adalah:</p>\r\n\r\n<ul>\r\n	<li>Pramuka</li>\r\n	<li>Paskibra</li>\r\n	<li>Palang Merah Remaja (PMR)</li>\r\n	<li>Patroli Keamanan Sekolah (PKS)</li>\r\n	<li>Pecinta Alam (PA)</li>\r\n	<li>Olahraga (Bola Voli, Bola Basket, Karate, Tenis Meja, Tenis Lapangan)</li>\r\n	<li>Kerohanian / IRMA (Ikatan Remaja Mesjid Al-Forqon), dan</li>\r\n	<li>Koperasi Sekolah (Kopsis)<span id="cke_bm_98E" style="display:none">&nbsp;</span></li>\r\n</ul>\r\n', '2016-02-07', '34Ekstrakurikuler.JPG', 'admin', 17, '21:53:42', 'Minggu');

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

CREATE TABLE IF NOT EXISTS `header` (
  `id_header` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) NOT NULL,
  `tgl_posting` date NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `dibaca` int(5) NOT NULL DEFAULT '1',
  `jam` time NOT NULL,
  PRIMARY KEY (`id_header`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `header`
--

INSERT INTO `header` (`id_header`, `judul`, `tgl_posting`, `gambar`, `username`, `dibaca`, `jam`) VALUES
(1, 'Fasilitas MySchool " Lab. Komputer"', '2016-01-07', '97banner-sekolah-2.jpg', 'admin', 1, '11:27:24'),
(2, 'Pengajar Profesional dalam bidang masing-masing', '2016-01-07', '2banner-sekolah-1.jpg', 'admin', 1, '11:27:50'),
(3, 'Siswa Siswi " My School " Lulusan Terbaik 2015', '2016-01-07', '62banner-sekolah.jpg', 'admin', 1, '11:29:27');

-- --------------------------------------------------------

--
-- Table structure for table `hubungi`
--

CREATE TABLE IF NOT EXISTS `hubungi` (
  `id_hubungi` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `subjek` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `ip_address` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `pesan` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `dibaca` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_hubungi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `hubungi`
--


-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE IF NOT EXISTS `identitas` (
  `id_identitas` int(5) NOT NULL AUTO_INCREMENT,
  `nama_website` varchar(100) NOT NULL,
  `titel` varchar(250) NOT NULL,
  `meta_deskripsi` varchar(250) NOT NULL,
  `meta_keyword` varchar(250) NOT NULL,
  `favicon` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `user_twitter` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`id_identitas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`id_identitas`, `nama_website`, `titel`, `meta_deskripsi`, `meta_keyword`, `favicon`, `url`, `nip`, `twitter`, `user_twitter`, `username`) VALUES
(1, 'Web UKM', 'Universitas Komputer Indonesia', 'Website UKM Universitas Komputer Indonesia', 'pendidikan, pengumuman', 'favicon.png', 'http://localhost/webukmv3', '1984567873627899', '698840972189261824', 'aneka_web', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
  `id_jadwal` int(5) NOT NULL AUTO_INCREMENT,
  `nama_kegiatan` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tempat` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `keterangan` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `ukm` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `nama_kegiatan`, `tempat`, `tanggal`, `jam`, `keterangan`, `ukm`) VALUES
(10, 'Latihan Rutin', 'Gedung 5', '2018-08-23', '12:00 WIB', 'Baju bebas', 'Pancaksilat'),
(2, 'Latihan Bersama', 'Lapangan', '2016-05-31', '15:00 WIB', 'Kegiatan Mingguan', 'Tarung Derajat'),
(3, 'Futsal Fun', 'Lapang Futsal', '2016-05-31', '16:00 WIB', 'Kegiatan Mingguan', 'Sepakbola');

-- --------------------------------------------------------

--
-- Table structure for table `konter`
--

CREATE TABLE IF NOT EXISTS `konter` (
  `ip` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `tanggal` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `waktu` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `konter`
--

INSERT INTO `konter` (`ip`, `tanggal`, `waktu`) VALUES
('127.0.0.1', '24-10-2015', '07:52:48'),
('127.0.0.1', '30-12-2015', '01:33:40'),
('127.0.0.1', '05-01-2016', '04:44:45'),
('127.0.0.1', '06-01-2016', '08:42:46'),
('127.0.0.1', '07-01-2016', '06:11:37'),
('127.0.0.1', '01-02-2016', '04:32:04'),
('127.0.0.1', '09-02-2016', '08:40:38'),
('127.0.0.1', '09-02-2016', '03:15:42'),
('127.0.0.1', '10-02-2016', '08:44:52'),
('127.0.0.1', '13-02-2016', '09:24:51'),
('127.0.0.1', '25-02-2016', '10:16:40'),
('127.0.0.1', '26-05-2016', '09:40:35'),
('127.0.0.1', '28-05-2016', '10:36:56'),
('127.0.0.1', '31-05-2016', '04:06:20'),
('127.0.0.1', '01-06-2016', '08:10:15'),
('127.0.0.1', '01-06-2016', '08:11:16'),
('127.0.0.1', '01-06-2016', '10:02:00'),
('127.0.0.1', '01-06-2016', '11:13:52'),
('127.0.0.1', '12-09-2016', '06:44:29'),
('127.0.0.1', '12-09-2016', '09:46:01'),
('127.0.0.1', '13-09-2016', '03:43:52'),
('127.0.0.1', '13-09-2016', '03:50:53'),
('127.0.0.1', '19-09-2016', '05:49:49'),
('127.0.0.1', '26-09-2016', '06:29:46'),
('127.0.0.1', '05-10-2016', '06:49:35'),
('127.0.0.1', '06-10-2016', '05:27:08'),
('127.0.0.1', '07-10-2016', '06:13:49'),
('127.0.0.1', '07-10-2016', '06:17:11'),
('127.0.0.1', '07-10-2016', '07:42:34'),
('127.0.0.1', '07-10-2016', '08:21:23'),
('127.0.0.1', '07-10-2016', '10:19:44'),
('127.0.0.1', '07-10-2016', '10:27:16'),
('127.0.0.1', '07-10-2016', '08:44:22'),
('127.0.0.1', '07-10-2016', '09:28:24'),
('127.0.0.1', '08-10-2016', '05:28:53'),
('127.0.0.1', '08-10-2016', '05:31:27'),
('127.0.0.1', '08-10-2016', '07:42:28'),
('127.0.0.1', '08-10-2016', '07:42:31'),
('127.0.0.1', '08-10-2016', '08:08:25'),
('127.0.0.1', '08-10-2016', '08:14:38'),
('127.0.0.1', '08-10-2016', '09:32:43'),
('127.0.0.1', '08-10-2016', '10:33:12'),
('127.0.0.1', '09-10-2016', '07:23:39'),
('127.0.0.1', '09-10-2016', '07:23:51'),
('127.0.0.1', '09-10-2016', '07:33:14'),
('127.0.0.1', '09-10-2016', '07:35:07'),
('127.0.0.1', '09-10-2016', '07:35:10'),
('127.0.0.1', '09-10-2016', '06:38:23'),
('127.0.0.1', '10-10-2016', '09:28:38'),
('127.0.0.1', '10-10-2016', '09:40:29'),
('127.0.0.1', '10-10-2016', '06:49:20'),
('127.0.0.1', '10-10-2016', '07:08:31'),
('127.0.0.1', '10-10-2016', '09:19:10'),
('127.0.0.1', '10-10-2016', '09:28:41'),
('127.0.0.1', '11-10-2016', '05:56:34'),
('127.0.0.1', '11-10-2016', '06:17:42'),
('127.0.0.1', '11-10-2016', '06:30:00'),
('127.0.0.1', '11-10-2016', '08:15:20'),
('127.0.0.1', '11-10-2016', '10:09:25'),
('127.0.0.1', '11-10-2016', '10:09:29'),
('127.0.0.1', '11-10-2016', '10:16:57'),
('127.0.0.1', '11-10-2016', '10:41:43'),
('127.0.0.1', '11-10-2016', '12:35:57'),
('127.0.0.1', '11-10-2016', '06:37:40'),
('127.0.0.1', '11-10-2016', '06:37:40'),
('127.0.0.1', '11-10-2016', '08:46:21'),
('127.0.0.1', '12-10-2016', '07:31:28'),
('127.0.0.1', '12-10-2016', '07:31:29'),
('127.0.0.1', '12-10-2016', '07:33:34'),
('127.0.0.1', '12-10-2016', '08:07:36'),
('127.0.0.1', '13-10-2016', '06:11:53'),
('127.0.0.1', '13-10-2016', '06:11:53'),
('127.0.0.1', '13-10-2016', '06:15:13'),
('127.0.0.1', '13-10-2016', '09:27:26'),
('127.0.0.1', '13-10-2016', '07:47:56'),
('127.0.0.1', '13-10-2016', '08:26:06'),
('127.0.0.1', '14-10-2016', '07:47:42'),
('127.0.0.1', '14-10-2016', '08:17:48'),
('127.0.0.1', '03-11-2016', '06:01:08'),
('127.0.0.1', '14-02-2017', '05:36:56'),
('127.0.0.1', '22-02-2017', '06:12:33'),
('127.0.0.1', '24-05-2017', '06:05:56'),
('127.0.0.1', '24-05-2017', '10:28:32'),
('127.0.0.1', '25-05-2017', '06:36:58'),
('127.0.0.1', '25-05-2017', '09:25:36'),
('127.0.0.1', '25-05-2017', '08:00:33'),
('127.0.0.1', '26-05-2017', '06:06:41'),
('127.0.0.1', '26-05-2017', '06:57:48'),
('127.0.0.1', '26-05-2017', '07:57:45'),
('127.0.0.1', '27-05-2017', '05:21:12'),
('127.0.0.1', '27-05-2017', '09:27:17'),
('127.0.0.1', '27-05-2017', '02:21:02'),
('127.0.0.1', '27-05-2017', '09:04:37'),
('127.0.0.1', '27-05-2017', '09:31:30'),
('127.0.0.1', '28-05-2017', '05:20:01'),
('127.0.0.1', '28-05-2017', '05:31:58'),
('127.0.0.1', '28-05-2017', '06:41:16'),
('127.0.0.1', '28-05-2017', '10:15:18'),
('127.0.0.1', '28-05-2017', '10:32:38'),
('127.0.0.1', '28-05-2017', '10:53:33'),
('127.0.0.1', '28-05-2017', '11:22:55'),
('127.0.0.1', '28-05-2017', '08:46:22'),
('127.0.0.1', '29-05-2017', '05:16:35'),
('127.0.0.1', '29-05-2017', '12:31:58'),
('127.0.0.1', '29-05-2017', '09:03:35'),
('127.0.0.1', '30-05-2017', '05:24:30'),
('127.0.0.1', '30-05-2017', '12:38:52'),
('127.0.0.1', '30-05-2017', '08:43:56'),
('127.0.0.1', '31-05-2017', '12:36:12'),
('127.0.0.1', '31-05-2017', '01:04:17'),
('127.0.0.1', '31-05-2017', '08:44:05'),
('127.0.0.1', '01-06-2017', '10:16:08'),
('127.0.0.1', '16-06-2017', '08:57:28'),
('127.0.0.1', '03-07-2017', '05:31:27'),
('127.0.0.1', '04-07-2017', '04:02:12'),
('127.0.0.1', '20-07-2017', '05:31:33'),
('::1', '18-04-2018', '12:43:02'),
('::1', '02-08-2018', '11:20:56'),
('::1', '02-08-2018', '06:14:50'),
('::1', '02-08-2018', '06:30:12'),
('::1', '02-08-2018', '08:36:47'),
('::1', '02-08-2018', '08:53:01'),
('::1', '02-08-2018', '09:56:51'),
('::1', '03-08-2018', '03:54:41'),
('::1', '03-08-2018', '04:02:19'),
('::1', '03-08-2018', '04:07:59'),
('::1', '03-08-2018', '04:20:22'),
('::1', '03-08-2018', '04:27:09'),
('::1', '03-08-2018', '04:43:08'),
('::1', '03-08-2018', '04:43:57'),
('::1', '03-08-2018', '04:46:29'),
('::1', '03-08-2018', '04:46:57'),
('::1', '03-08-2018', '07:32:36'),
('::1', '03-08-2018', '07:32:55'),
('::1', '03-08-2018', '07:34:57'),
('::1', '03-08-2018', '08:14:01'),
('::1', '03-08-2018', '08:18:21'),
('::1', '03-08-2018', '08:24:17'),
('::1', '03-08-2018', '08:45:35'),
('::1', '03-08-2018', '08:47:59'),
('::1', '03-08-2018', '08:49:10'),
('::1', '03-08-2018', '08:51:02'),
('::1', '03-08-2018', '08:51:48'),
('::1', '03-08-2018', '08:56:06'),
('::1', '03-08-2018', '09:01:02'),
('::1', '03-08-2018', '09:01:19'),
('::1', '03-08-2018', '09:06:25'),
('::1', '03-08-2018', '09:07:10'),
('::1', '03-08-2018', '09:08:40'),
('::1', '03-08-2018', '09:25:28'),
('::1', '03-08-2018', '09:55:06'),
('::1', '03-08-2018', '10:17:08'),
('::1', '03-08-2018', '10:49:57'),
('::1', '03-08-2018', '01:37:38'),
('::1', '03-08-2018', '02:40:49'),
('::1', '03-08-2018', '02:47:25'),
('::1', '03-08-2018', '02:47:47'),
('::1', '03-08-2018', '02:49:05'),
('::1', '03-08-2018', '02:56:31'),
('::1', '03-08-2018', '02:57:40'),
('::1', '03-08-2018', '02:58:29'),
('::1', '03-08-2018', '02:59:17'),
('::1', '03-08-2018', '03:03:57'),
('::1', '03-08-2018', '03:04:31'),
('::1', '03-08-2018', '03:04:47'),
('::1', '03-08-2018', '03:05:42'),
('::1', '03-08-2018', '03:09:13'),
('::1', '03-08-2018', '03:18:40'),
('::1', '03-08-2018', '03:21:07'),
('::1', '03-08-2018', '03:21:51'),
('::1', '03-08-2018', '03:22:02'),
('::1', '03-08-2018', '03:25:05');

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE IF NOT EXISTS `link` (
  `id_link` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `link` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  PRIMARY KEY (`id_link`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `link`
--

INSERT INTO `link` (`id_link`, `judul`, `link`, `gambar`, `username`, `tgl_posting`) VALUES
(1, 'Web UKM', 'http://localhost', 'logo-anekaweb-link.jpg', 'admin', '2016-02-08'),
(2, 'Website Murah', 'http://anekaweb.com', 'website-murah.jpg', 'admin', '2016-02-08');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE IF NOT EXISTS `logo` (
  `id_logo` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  PRIMARY KEY (`id_logo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id_logo`, `judul`, `url`, `gambar`, `tgl_posting`) VALUES
(1, 'MySchool', 'http://localhost/myschool', 'logo.png', '2012-03-13');

-- --------------------------------------------------------

--
-- Table structure for table `mainmenu`
--

CREATE TABLE IF NOT EXISTS `mainmenu` (
  `id_main` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `nama_menu` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `link` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `urutan` int(5) NOT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_main`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `mainmenu`
--

INSERT INTO `mainmenu` (`id_main`, `username`, `nama_menu`, `link`, `urutan`, `aktif`) VALUES
(1, 'admin', 'Beranda', '', 1, 'Y'),
(10, 'admin', 'Pendaftaran', 'pendaftaran.html', 11, 'Y'),
(7, 'admin', 'Jadwal Kegiatan', 'jadwal.html', 7, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE IF NOT EXISTS `modul` (
  `id_modul` int(5) NOT NULL AUTO_INCREMENT,
  `nama_modul` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `link` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  `publish` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  `urutan` int(5) NOT NULL,
  `status` enum('user','admin') COLLATE latin1_general_ci NOT NULL,
  `username` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_modul`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=33 ;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id_modul`, `nama_modul`, `link`, `aktif`, `publish`, `urutan`, `status`, `username`) VALUES
(1, 'Home', '?module=home', 'Y', 'Y', 1, 'admin', 'admin'),
(2, 'Konfigurasi Web', '?module=identitas', 'Y', 'Y', 2, 'admin', 'admin'),
(3, 'Menu Utama', '?module=menuutama', 'Y', 'Y', 3, 'user', 'admin'),
(4, 'Submenu', '?module=submenu', 'Y', 'Y', 4, 'user', 'admin'),
(5, 'Halaman Baru', '?module=halamanstatis', 'Y', 'Y', 5, 'user', 'admin'),
(6, 'Berita', '?module=berita', 'Y', 'Y', 6, 'user', 'admin'),
(7, 'Kategori Berita', '?module=kategoriberita', 'Y', 'Y', 7, 'user', 'admin'),
(8, 'Tag Berita', '?module=tag', 'Y', 'Y', 8, 'user', 'admin'),
(9, 'UKM', '?module=ukm', 'Y', 'Y', 9, 'user', 'admin'),
(10, 'Komentar Berita', '?module=komentar', 'Y', 'Y', 10, 'user', 'admin'),
(11, 'Sensor Kata', '?module=sensorkata', 'Y', 'Y', 11, 'user', 'admin'),
(12, 'Album Berita Foto', '?module=album', 'Y', 'Y', 12, 'user', 'admin'),
(13, 'Galeri Berita Foto', '?module=galerifoto', 'Y', 'Y', 13, 'user', 'admin'),
(14, 'Yahoo Messenger', '?module=ym', 'Y', 'Y', 14, 'user', 'admin'),
(15, 'Logo Web', '?module=logo', 'Y', 'Y', 15, 'user', 'admin'),
(16, 'Template Web', '?module=templates', 'Y', 'Y', 16, 'user', 'admin'),
(17, 'Poling', '?module=poling', 'Y', 'Y', 17, 'user', 'admin'),
(18, 'Manajemen User', '?module=user', 'Y', 'Y', 18, 'user', 'admin'),
(19, 'Manajemen Modul', '?module=modul', 'Y', 'Y', 19, 'admin', 'admin'),
(20, 'Hubungi Kami', '?module=hubungi', 'Y', 'Y', 20, 'user', 'admin'),
(21, 'Iklan Header', '?module=iklanheader', 'Y', 'Y', 21, 'user', 'admin'),
(22, 'Iklan Tengah', '?module=iklanhome', 'Y', 'Y', 22, 'user', 'admin'),
(23, 'Iklan Sidebar Kiri', '?module=iklansidebarkirihome', 'Y', 'Y', 23, 'user', 'admin'),
(24, 'Profil', '?module=profil', 'Y', 'Y', 24, 'user', 'admin'),
(25, 'Video', '?module=video', 'Y', 'Y', 25, 'user', 'admin'),
(26, 'Iklan Sidebar Kanan', '?module=iklansidebarkananhome', '', '', 26, 'user', 'admin'),
(27, 'Iklan Popup', '?module=iklanpopup', '', '', 27, 'user', 'admin'),
(28, 'Kategori Video', '?module=kategorivideo', '', '', 28, 'user', 'admin'),
(29, 'Tag Video', '?module=tagvideo', '', '', 29, 'user', 'admin'),
(30, 'Komentar Video', '?module=komentarvideo', '', '', 30, 'user', 'admin'),
(31, 'Newsletter', '?module=newsletter', '', '', 31, 'user', 'admin'),
(32, 'Profil Pengurus', '?module=profilpengurus', 'Y', 'Y', 32, 'user', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE IF NOT EXISTS `pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT,
  `no_daftar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `nama_mahasiswa` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `nim` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `pilihukm` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `terdaftar` enum('Diterima','Menunggu Konfirmasi') COLLATE latin1_general_ci NOT NULL DEFAULT 'Menunggu Konfirmasi',
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_pendaftaran`),
  UNIQUE KEY `id_pendaftaran` (`id_pendaftaran`),
  UNIQUE KEY `id_pendaftaran_2` (`id_pendaftaran`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=34 ;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `no_daftar`, `nama_mahasiswa`, `nim`, `email`, `password`, `pilihukm`, `gambar`, `terdaftar`, `tanggal`) VALUES
(23, 'UKM00003', 'Amanda Bryliantri', '10115636', 'amanda@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Sadaya', '', 'Diterima', '2018-08-03'),
(11, 'UKM00001', 'Novan Herdiyansyah', '10115611', 'novan.herdiyansyah@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Sepakbola', '504547rsz_img_20170603_174859.jpg', 'Diterima', '2018-07-02'),
(12, 'UKM00002', 'Zaimmudin Alsagaf', '10115603', 'zaimmudinalsagaf@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Sepakbola', '34582510115602-zaim.jpg', 'Menunggu Konfirmasi', '2018-07-11'),
(33, 'UKM00004', 'Redny Grid', '10115629', 'rendi.grid@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Pancaksilat', '4846491478.jpg', 'Diterima', '2018-08-03');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE IF NOT EXISTS `pengumuman` (
  `id_pengumuman` int(5) NOT NULL AUTO_INCREMENT,
  `tema` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tema_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi_pengumuman` text COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  `dibaca` int(5) NOT NULL DEFAULT '1',
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_pengumuman`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `tema`, `tema_seo`, `isi_pengumuman`, `gambar`, `tgl_posting`, `dibaca`, `username`) VALUES
(1, 'Kalender Pendidikan 2015', 'kalender-pendidikan-2015', '<div>\r\nDalam implementasi Kurikulum 2013 ada beberapa perangkat pembelajaran yang sudah dibuatkan pusat dan ada perangkat pembelajaran yang harus dikembangkan guru sendiri. Tahun ajaran baru harus disambut dengan semangat baru, dengan perencanaan serta target yang ingin dicapai.\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\nKalender pendidikan tahun pelajaran 2014/2015 sebagai dasar panduan atau dasar dalam proses pembelajaran. Dapat diketahui waktu pelaksanaan ulangan semester, libur semester, dan hari efektif.\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n', '989440kaee.jpg', '2014-08-24', 2, 'admin'),
(2, 'Jadwal Pelaksanaan Tes Peserta Didik Baru', 'jadwal-pelaksanaan-tes-peserta-didik-baru', '<p>Tes akan dilaksanakan pada tanggal 17-19 Agustus 2015</p>\r\n', '278167buku.jpg', '2014-08-19', 18, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `pengurus`
--

CREATE TABLE IF NOT EXISTS `pengurus` (
  `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT,
  `no_daftar` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `nama_mahasiswa` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `nim` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `email` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `pilihukm` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `terdaftar` enum('Pengurus') NOT NULL DEFAULT 'Pengurus',
  PRIMARY KEY (`id_pendaftaran`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pengurus`
--

INSERT INTO `pengurus` (`id_pendaftaran`, `no_daftar`, `nama_mahasiswa`, `nim`, `email`, `password`, `pilihukm`, `gambar`, `terdaftar`) VALUES
(1, 'PUKM0001', 'Pengurus Sepakbola', '10115612', 'novan.herdiyansyah@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Sepakbola', '913208sepakbola.jpg', 'Pengurus'),
(2, 'PUKM0002', 'Rendi Pengurus', '10115600', 'rendi.pengurus@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Pancaksilat', '612091pancaksilat.jpg', 'Pengurus'),
(3, 'PUKM0003', 'Pengurus Sadaya', '10116040', 'renal@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Sadaya', '', 'Pengurus'),
(4, 'PUKM0004', 'Pengurus Tarung Derajat', '10115501', 'rendi@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Tarung Derajat', '', 'Pengurus');

-- --------------------------------------------------------

--
-- Table structure for table `statistik`
--

CREATE TABLE IF NOT EXISTS `statistik` (
  `ip` varchar(20) NOT NULL DEFAULT '',
  `tanggal` date NOT NULL,
  `hits` int(10) NOT NULL DEFAULT '1',
  `online` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statistik`
--

INSERT INTO `statistik` (`ip`, `tanggal`, `hits`, `online`) VALUES
('127.0.0.1', '2014-11-25', 7, '1416922380'),
('127.0.0.1', '2014-11-21', 2, '1416585247'),
('127.0.0.1', '2014-11-19', 2, '1416405342'),
('127.0.0.1', '2014-11-29', 5, '1417237297'),
('127.0.0.1', '2014-12-11', 8, '1418314316'),
('127.0.0.1', '2014-12-12', 5, '1418399961'),
('127.0.0.1', '2014-12-14', 1, '1418566256'),
('127.0.0.1', '2014-12-15', 1, '1418655713'),
('127.0.0.1', '2014-12-16', 1, '1418741850'),
('127.0.0.1', '2014-12-17', 6, '1418830153'),
('127.0.0.1', '2014-12-18', 25, '1418903006'),
('127.0.0.1', '2014-12-19', 1, '1418997324'),
('127.0.0.1', '2014-12-25', 1, '1419487908'),
('127.0.0.1', '2014-12-27', 1, '1419680200'),
('127.0.0.1', '2014-12-29', 4, '1419863305'),
('127.0.0.1', '2014-12-30', 3, '1419932895'),
('127.0.0.1', '2014-12-31', 2, '1420027810'),
('127.0.0.1', '2015-01-01', 2, '1420119338'),
('127.0.0.1', '2015-01-02', 2, '1420198434'),
('127.0.0.1', '2015-01-03', 2, '1420276261'),
('127.0.0.1', '2015-01-04', 2, '1420379538'),
('127.0.0.1', '2015-01-05', 4, '1420455816'),
('127.0.0.1', '2015-01-06', 2, '1420542662'),
('127.0.0.1', '2015-01-07', 1, '1420592580'),
('127.0.0.1', '2015-01-08', 1, '1420717045'),
('127.0.0.1', '2015-01-16', 1, '1421403008'),
('127.0.0.1', '2015-01-17', 2, '1421480581'),
('127.0.0.1', '2015-01-18', 2, '1421572662'),
('127.0.0.1', '2015-01-19', 2, '1421659689'),
('127.0.0.1', '2015-01-20', 1, '1421718944'),
('127.0.0.1', '2015-01-21', 1, '1421842147'),
('127.0.0.1', '2015-02-16', 2, '1424101442'),
('127.0.0.1', '2015-02-17', 1, '1424137038'),
('127.0.0.1', '2015-02-20', 5, '1424447926'),
('127.0.0.1', '2015-02-21', 1, '1424483695'),
('127.0.0.1', '2015-02-22', 2, '1424580829'),
('127.0.0.1', '2015-02-23', 1, '1424706807'),
('127.0.0.1', '2015-02-24', 3, '1424772745'),
('127.0.0.1', '2015-02-26', 1, '1424963825'),
('127.0.0.1', '2015-03-01', 3, '1425171663'),
('127.0.0.1', '2015-03-02', 1, '1425259857'),
('127.0.0.1', '2015-03-07', 3, '1425741450'),
('127.0.0.1', '2015-03-13', 2, '1426234611'),
('127.0.0.1', '2015-03-14', 1, '1426287051'),
('127.0.0.1', '2015-03-17', 1, '1426605904'),
('127.0.0.1', '2015-03-21', 2, '1426913154'),
('127.0.0.1', '2015-03-22', 1, '1426997730'),
('127.0.0.1', '2015-03-23', 1, '1427071413'),
('127.0.0.1', '2015-03-25', 1, '1427246277'),
('127.0.0.1', '2015-03-28', 1, '1427560452'),
('127.0.0.1', '2015-04-04', 3, '1428113442'),
('127.0.0.1', '2015-07-28', 1, '1438082620'),
('127.0.0.1', '2015-07-29', 11, '1438145921'),
('127.0.0.1', '2015-11-20', 4, '1448029227'),
('127.0.0.1', '2015-11-21', 16, '1448124942'),
('127.0.0.1', '2015-11-22', 7, '1448126373'),
('127.0.0.1', '2015-12-07', 6, '1449500562'),
('223.255.231.148', '2014-05-06', 1, '1399357334'),
('223.255.231.147', '2014-05-15', 3, '1400119147'),
('223.255.224.73', '2014-05-15', 12, '1400123797'),
('223.255.224.69', '2014-05-16', 2, '1400215103'),
('118.96.51.231', '2014-05-16', 19, '1400233044'),
('223.255.231.146', '2014-05-16', 2, '1400228049'),
('::1', '2014-06-20', 2, '1403230579'),
('::1', '2014-06-22', 8, '1403436591'),
('223.255.231.154', '2014-06-26', 1, '1403739948'),
('223.255.231.148', '2014-06-26', 6, '1403745715'),
('223.255.224.74', '2014-06-26', 1, '1403748060'),
('223.255.224.69', '2014-06-26', 1, '1403753239'),
('223.255.224.77', '2014-06-29', 1, '1404039342'),
('::1', '2014-07-02', 6, '1404277263'),
('127.0.0.1', '2014-07-17', 2, '1405582494'),
('127.0.0.1', '2014-07-21', 1, '1405929828'),
('36.76.60.43', '2014-07-21', 1, '1405951864'),
('223.255.231.154', '2014-07-21', 2, '1405957200'),
('223.255.227.21', '2014-07-22', 1, '1405995171'),
('223.255.231.146', '2014-07-22', 1, '1405997152'),
('223.255.227.21', '2014-07-23', 1, '1406100212'),
('223.255.227.17', '2014-07-23', 1, '1406104552'),
('223.255.227.23', '2014-07-24', 1, '1406168095'),
('223.255.231.153', '2014-07-24', 1, '1406204439'),
('223.255.231.146', '2014-07-25', 1, '1406268985'),
('180.76.5.193', '2014-08-06', 1, '1407302738'),
('180.76.5.23', '2014-08-06', 1, '1407304739'),
('202.67.36.241', '2014-08-06', 1, '1407305643'),
('198.148.27.22', '2014-08-06', 1, '1407306703'),
('180.251.170.42', '2014-08-06', 7, '1407310167'),
('128.199.171.191', '2014-08-06', 3, '1407323435'),
('223.255.231.149', '2014-08-06', 2, '1407309879'),
('223.255.227.28', '2014-08-06', 8, '1407311801'),
('103.24.49.242', '2014-08-06', 1, '1407312326'),
('223.255.231.146', '2014-08-06', 1, '1407313297'),
('180.214.233.34', '2014-08-06', 1, '1407321063'),
('66.249.77.87', '2014-08-06', 1, '1407323509'),
('223.255.227.30', '2014-08-06', 1, '1407325862'),
('180.254.207.13', '2014-08-06', 5, '1407330687'),
('114.79.13.199', '2014-08-06', 1, '1407336900'),
('202.152.199.34', '2014-08-06', 7, '1407337100'),
('180.76.6.21', '2014-08-07', 1, '1407347753'),
('114.79.13.55', '2014-08-07', 3, '1407354277'),
('114.125.41.136', '2014-08-07', 1, '1407352625'),
('180.76.6.147', '2014-08-07', 1, '1407355344'),
('180.76.6.64', '2014-08-07', 1, '1407367237'),
('69.171.247.116', '2014-08-07', 1, '1407379834'),
('69.171.247.119', '2014-08-07', 1, '1407379834'),
('69.171.247.114', '2014-08-07', 1, '1407379834'),
('69.171.247.115', '2014-08-07', 1, '1407379834'),
('202.67.34.29', '2014-08-07', 2, '1407380415'),
('36.76.52.112', '2014-08-07', 1, '1407380496'),
('223.255.231.145', '2014-08-07', 5, '1407387045'),
('223.255.231.153', '2014-08-07', 2, '1407388883'),
('223.255.227.27', '2014-08-07', 1, '1407393087'),
('180.76.5.25', '2014-08-07', 1, '1407394749'),
('223.255.231.146', '2014-08-07', 1, '1407397183'),
('157.55.39.248', '2014-08-07', 1, '1407397231'),
('180.254.200.55', '2014-08-07', 2, '1407399466'),
('110.139.67.15', '2014-08-07', 8, '1407399221'),
('180.242.17.64', '2014-08-07', 11, '1407414373'),
('141.0.8.59', '2014-08-07', 1, '1407412384'),
('110.76.149.91', '2014-08-07', 1, '1407422367'),
('223.255.231.151', '2014-08-07', 3, '1407426943'),
('82.145.209.206', '2014-08-07', 1, '1407430369'),
('223.255.227.28', '2014-08-08', 3, '1407469589'),
('66.93.156.50', '2014-08-08', 1, '1407472340'),
('202.62.17.47', '2014-08-08', 1, '1407484393'),
('36.70.135.163', '2014-08-08', 6, '1407485987'),
('173.252.74.115', '2014-08-08', 1, '1407485153'),
('118.96.58.136', '2014-08-08', 2, '1407486347'),
('114.79.29.68', '2014-08-08', 1, '1407502537'),
('66.220.156.113', '2014-08-08', 1, '1407503375'),
('112.215.66.79', '2014-08-08', 1, '1407503381'),
('125.163.113.156', '2014-08-08', 9, '1407508824'),
('180.76.5.94', '2014-08-08', 1, '1407508624'),
('120.172.9.192', '2014-08-08', 1, '1407515634'),
('202.67.41.51', '2014-08-08', 1, '1407515702'),
('180.253.243.222', '2014-08-09', 1, '1407542724'),
('36.75.224.20', '2014-08-09', 1, '1407548005'),
('180.76.5.65', '2014-08-09', 1, '1407548865'),
('66.249.77.77', '2014-08-09', 2, '1407582711'),
('180.76.6.137', '2014-08-09', 1, '1407553037'),
('66.249.77.87', '2014-08-09', 1, '1407554836'),
('66.249.77.97', '2014-08-09', 2, '1407562640'),
('120.177.44.126', '2014-08-09', 2, '1407558625'),
('223.255.231.145', '2014-08-09', 3, '1407558663'),
('36.73.64.113', '2014-08-09', 1, '1407558640'),
('36.72.187.12', '2014-08-09', 1, '1407560351'),
('202.67.41.51', '2014-08-09', 1, '1407561096'),
('114.125.60.68', '2014-08-09', 4, '1407561514'),
('202.67.40.50', '2014-08-09', 1, '1407562007'),
('180.76.6.136', '2014-08-09', 1, '1407562581'),
('110.232.81.2', '2014-08-09', 5, '1407563275'),
('146.185.28.59', '2014-08-09', 1, '1407564768'),
('120.174.157.139', '2014-08-09', 1, '1407568139'),
('223.255.227.23', '2014-08-09', 2, '1407570163'),
('193.105.210.119', '2014-08-09', 1, '1407577518'),
('125.162.57.66', '2014-08-09', 2, '1407579822'),
('180.241.163.1', '2014-08-09', 8, '1407580493'),
('36.76.44.163', '2014-08-09', 6, '1407603574'),
('180.76.5.144', '2014-08-09', 1, '1407582757'),
('107.167.103.40', '2014-08-09', 1, '1407586189'),
('36.68.48.23', '2014-08-09', 1, '1407586974'),
('192.99.218.151', '2014-08-09', 4, '1407587574'),
('36.74.55.24', '2014-08-09', 3, '1407589161'),
('118.97.212.184', '2014-08-09', 8, '1407595169'),
('36.72.114.118', '2014-08-09', 2, '1407597684'),
('180.76.5.153', '2014-08-09', 1, '1407602870'),
('180.76.5.59', '2014-08-09', 1, '1407603153'),
('180.76.5.18', '2014-08-10', 1, '1407606581'),
('180.254.155.156', '2014-08-10', 2, '1407607003'),
('180.76.6.42', '2014-08-10', 1, '1407608363'),
('36.68.242.217', '2014-08-10', 5, '1407627100'),
('66.249.77.77', '2014-08-10', 2, '1407633623'),
('202.67.44.64', '2014-08-10', 1, '1407629598'),
('180.76.6.43', '2014-08-10', 1, '1407631270'),
('118.97.212.182', '2014-08-10', 4, '1407632228'),
('139.0.102.140', '2014-08-10', 1, '1407633944'),
('66.249.77.87', '2014-08-10', 1, '1407636902'),
('66.249.77.97', '2014-08-10', 1, '1407639983'),
('180.76.6.159', '2014-08-10', 1, '1407640798'),
('118.97.212.181', '2014-08-10', 3, '1407642556'),
('36.68.46.37', '2014-08-10', 2, '1407642940'),
('180.76.5.69', '2014-08-10', 1, '1407645158'),
('180.76.5.80', '2014-08-10', 1, '1407648268'),
('180.76.5.143', '2014-08-10', 1, '1407650068'),
('223.255.231.145', '2014-08-10', 1, '1407650216'),
('180.76.6.149', '2014-08-10', 1, '1407657020'),
('36.77.183.218', '2014-08-10', 2, '1407657119'),
('127.0.0.1', '2014-08-10', 2, '1407660057'),
('127.0.0.1', '2014-08-11', 2, '1407725194'),
('127.0.0.1', '2014-08-12', 1, '1407862185'),
('127.0.0.1', '2014-08-13', 1, '1407899819'),
('127.0.0.1', '2014-08-17', 44, '1408287630'),
('127.0.0.1', '2014-08-18', 253, '1408372590'),
('127.0.0.1', '2014-08-19', 4, '1408413702'),
('::1', '2014-08-19', 90, '1408433250'),
('::1', '2014-08-31', 1, '1409487043'),
('::1', '2015-03-11', 11, '1426061663'),
('::1', '2015-03-12', 1, '1426114982'),
('::1', '2015-03-15', 32, '1426430637'),
('::1', '2015-03-18', 137, '1426666506'),
('::1', '2015-03-19', 143, '1426751746'),
('::1', '2015-03-21', 198, '1426912294'),
('::1', '2015-03-22', 554, '1427039069'),
('127.0.0.1', '2015-03-22', 1, '1427030317'),
('::1', '2015-03-23', 275, '1427093113'),
('::1', '2015-03-24', 42, '1427179474'),
('::1', '2015-03-25', 45, '1427251499'),
('39.225.164.2', '2015-05-14', 7, '1431584409'),
('119.110.72.130', '2015-05-14', 30, '1431595368'),
('89.145.95.2', '2015-05-14', 1, '1431582645'),
('66.220.158.118', '2015-05-14', 1, '1431582842'),
('66.220.158.115', '2015-05-14', 1, '1431582852'),
('66.220.158.112', '2015-05-14', 3, '1431595371'),
('66.220.158.119', '2015-05-14', 1, '1431582942'),
('114.125.43.185', '2015-05-14', 5, '1431602132'),
('119.110.72.130', '2015-05-15', 1, '1431673658'),
('114.125.45.206', '2015-05-16', 18, '1431741581'),
('66.220.158.116', '2015-05-16', 1, '1431741049'),
('66.220.158.118', '2015-05-16', 1, '1431741224'),
('66.220.158.114', '2015-05-16', 1, '1431741233'),
('39.229.6.148', '2015-05-16', 11, '1431791037'),
('39.225.236.155', '2015-05-17', 8, '1431862096'),
('119.110.72.130', '2015-05-19', 6, '1432006569'),
('89.145.95.42', '2015-05-19', 2, '1432006661'),
('114.121.133.117', '2015-05-19', 3, '1432046663'),
('124.195.114.65', '2015-05-28', 16, '1432832381'),
('66.220.158.119', '2015-05-28', 1, '1432831000'),
('66.220.158.115', '2015-05-28', 1, '1432831013'),
('66.220.158.116', '2015-05-28', 1, '1432832385'),
('124.195.114.65', '2015-05-29', 77, '1432836214'),
('66.220.158.113', '2015-05-29', 1, '1432835961'),
('66.249.84.178', '2015-05-29', 1, '1432836220'),
('103.246.200.14', '2015-05-29', 1, '1432851867'),
('103.246.200.59', '2015-05-29', 1, '1432851916'),
('114.124.5.250', '2015-05-29', 6, '1432852876'),
('173.252.105.114', '2015-05-29', 1, '1432852770'),
('120.180.175.150', '2015-05-29', 36, '1432864082'),
('103.246.200.50', '2015-05-29', 1, '1432863615'),
('103.246.200.1', '2015-05-29', 1, '1432863650'),
('103.246.200.33', '2015-05-29', 1, '1432863711'),
('103.246.200.44', '2015-05-29', 1, '1432863795'),
('120.174.144.115', '2015-05-29', 1, '1432908445'),
('119.110.72.130', '2015-05-29', 27, '1432912022'),
('173.252.90.117', '2015-05-29', 1, '1432910852'),
('173.252.90.116', '2015-05-29', 1, '1432910873'),
('173.252.90.118', '2015-05-29', 1, '1432911344'),
('173.252.90.122', '2015-05-29', 1, '1432911470'),
('66.249.84.190', '2015-05-30', 1, '1432945579'),
('39.254.117.222', '2015-05-30', 1, '1432991226'),
('66.249.84.178', '2015-05-31', 1, '1433037242'),
('120.176.92.190', '2015-06-01', 3, '1433128955'),
('66.102.6.210', '2015-06-01', 1, '1433134430'),
('120.164.44.28', '2015-06-01', 13, '1433149419'),
('124.195.118.227', '2015-06-01', 1, '1433170960'),
('120.177.28.244', '2015-06-02', 8, '1433220043'),
('66.249.84.190', '2015-06-02', 1, '1433247837'),
('120.190.75.179', '2015-06-03', 7, '1433302768'),
('119.110.72.130', '2015-06-03', 4, '1433302761'),
('89.145.95.2', '2015-06-03', 1, '1433302690'),
('66.249.71.147', '2015-06-07', 46, '1433696370'),
('66.249.71.130', '2015-06-07', 30, '1433696150'),
('66.249.71.164', '2015-06-07', 37, '1433696154'),
('173.252.74.113', '2015-06-07', 8, '1433694061'),
('173.252.74.117', '2015-06-07', 3, '1433676319'),
('66.249.64.57', '2015-06-07', 1, '1433674283'),
('173.252.88.89', '2015-06-07', 5, '1433677999'),
('173.252.88.86', '2015-06-07', 2, '1433677597'),
('173.252.74.119', '2015-06-07', 7, '1433694862'),
('66.249.79.117', '2015-06-07', 1, '1433674983'),
('173.252.88.84', '2015-06-07', 2, '1433676738'),
('173.252.74.115', '2015-06-07', 3, '1433676460'),
('173.252.74.114', '2015-06-07', 2, '1433694204'),
('173.252.74.118', '2015-06-07', 3, '1433676180'),
('173.252.74.112', '2015-06-07', 5, '1433695314'),
('173.252.88.85', '2015-06-07', 2, '1433677804'),
('173.252.88.90', '2015-06-07', 1, '1433676251'),
('173.252.74.116', '2015-06-07', 5, '1433695249'),
('173.252.88.87', '2015-06-07', 2, '1433677488'),
('173.252.88.88', '2015-06-07', 1, '1433677370'),
('66.249.79.130', '2015-06-07', 1, '1433694848'),
('66.220.156.116', '2015-06-07', 2, '1433696197'),
('66.249.67.104', '2015-06-07', 1, '1433696147'),
('66.220.156.112', '2015-06-07', 2, '1433696173'),
('66.220.146.22', '2015-06-07', 1, '1433696162'),
('66.249.67.117', '2015-06-07', 1, '1433696288'),
('66.220.156.114', '2015-06-07', 1, '1433696309'),
('66.220.156.117', '2015-06-08', 3, '1433711204'),
('66.249.71.164', '2015-06-08', 32, '1433779112'),
('66.220.146.25', '2015-06-08', 2, '1433736854'),
('66.220.156.116', '2015-06-08', 2, '1433709422'),
('66.249.71.147', '2015-06-08', 29, '1433748751'),
('66.220.156.112', '2015-06-08', 4, '1433715007'),
('66.220.146.20', '2015-06-08', 1, '1433696744'),
('66.249.71.130', '2015-06-08', 38, '1433777391'),
('66.220.156.118', '2015-06-08', 2, '1433712628'),
('66.220.146.27', '2015-06-08', 1, '1433712556'),
('66.220.146.26', '2015-06-08', 1, '1433712746'),
('66.249.67.104', '2015-06-08', 4, '1433746797'),
('66.220.146.22', '2015-06-08', 1, '1433714244'),
('66.220.156.115', '2015-06-08', 2, '1433714821'),
('66.249.67.117', '2015-06-08', 2, '1433780504'),
('120.176.251.49', '2015-06-08', 2, '1433737104'),
('66.220.156.119', '2015-06-08', 1, '1433737457'),
('66.249.71.147', '2015-06-09', 3, '1433836081'),
('66.249.71.130', '2015-06-09', 4, '1433835126'),
('66.249.67.104', '2015-06-09', 1, '1433788622'),
('66.249.71.164', '2015-06-09', 1, '1433823064'),
('66.249.71.130', '2015-06-10', 5, '1433953790'),
('66.249.67.117', '2015-06-10', 1, '1433911605'),
('66.249.71.164', '2015-06-10', 3, '1433954890'),
('66.249.71.147', '2015-06-10', 2, '1433953573'),
('66.249.71.147', '2015-06-11', 1, '1433957808'),
('66.249.71.164', '2015-06-11', 2, '1433990805'),
('68.180.228.104', '2015-06-11', 1, '1433975257'),
('66.249.71.130', '2015-06-11', 1, '1433991891'),
('36.68.28.19', '2015-06-14', 5, '1434224041'),
('120.164.46.127', '2015-06-14', 2, '1434239557'),
('66.249.67.248', '2015-06-15', 1, '1434362861'),
('104.193.10.50', '2015-06-15', 3, '1434372762'),
('104.193.10.50', '2015-06-16', 2, '1434454308'),
('36.80.234.114', '2015-06-16', 4, '1434443273'),
('173.252.74.115', '2015-06-16', 1, '1434443264'),
('173.252.74.114', '2015-06-16', 1, '1434443279'),
('119.110.72.130', '2015-06-16', 1, '1434467216'),
('124.195.116.71', '2015-06-17', 3, '1434551738'),
('120.184.130.21', '2015-06-27', 1, '1435386862'),
('66.249.84.246', '2015-06-27', 1, '1435387150'),
('120.176.176.106', '2015-06-28', 7, '1435461088'),
('66.220.158.114', '2015-06-28', 1, '1435461007'),
('66.249.84.129', '2015-06-28', 1, '1435466083'),
('66.249.84.246', '2015-06-29', 2, '1435563211'),
('66.249.84.252', '2015-06-29', 1, '1435563206'),
('66.249.84.246', '2015-06-30', 3, '1435677685'),
('66.249.84.252', '2015-06-30', 1, '1435645799'),
('66.249.84.252', '2015-07-01', 1, '1435710707'),
('66.249.84.129', '2015-07-01', 1, '1435711780'),
('120.177.18.200', '2015-07-02', 1, '1435824891'),
('66.249.84.252', '2015-07-02', 1, '1435842420'),
('66.249.84.129', '2015-07-02', 1, '1435842966'),
('195.154.250.39', '2015-07-02', 2, '1435844809'),
('36.84.68.252', '2015-07-02', 1, '1435850089'),
('119.110.72.130', '2015-07-03', 1, '1435919361'),
('125.165.98.167', '2015-07-03', 3, '1435928326'),
('114.4.79.82', '2015-07-08', 45, '1436334680'),
('173.252.88.87', '2015-07-08', 1, '1436319002'),
('173.252.88.91', '2015-07-08', 1, '1436319776'),
('127.0.0.1', '2015-07-08', 15, '1436340840'),
('127.0.0.1', '2015-10-27', 122, '1445954524'),
('127.0.0.1', '2015-10-28', 67, '1446038747'),
('120.191.222.200', '2015-10-29', 15, '1446080121'),
('69.171.230.99', '2015-10-29', 1, '1446077641'),
('69.171.230.113', '2015-10-29', 1, '1446077750'),
('114.4.79.16', '2015-10-29', 5, '1446102748'),
('124.195.112.167', '2015-10-30', 2, '1446180561'),
('120.164.46.139', '2015-10-31', 7, '1446247278'),
('103.47.133.110', '2015-10-31', 11, '1446282030'),
('204.236.226.210', '2015-10-31', 2, '1446305898'),
('204.236.226.210', '2015-11-01', 1, '1446311496'),
('120.168.0.85', '2015-11-01', 17, '1446337871'),
('103.47.133.86', '2015-11-01', 10, '1446358238'),
('223.255.231.145', '2015-11-01', 2, '1446366605'),
('127.0.0.1', '2015-12-07', 14, '1449500562'),
('127.0.0.1', '2016-05-28', 64, '1464411200'),
('127.0.0.1', '2016-05-29', 335, '1464533724'),
('127.0.0.1', '2016-05-30', 700, '1464627575'),
('127.0.0.1', '2016-05-31', 308, '1464686719');

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE IF NOT EXISTS `submenu` (
  `id_sub` int(5) NOT NULL AUTO_INCREMENT,
  `nama_sub` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `link_sub` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `id_main` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`id_sub`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`id_sub`, `nama_sub`, `link_sub`, `id_main`, `username`) VALUES
(1, 'Visi & Misi', 'hal/visi-dan-misi', 2, 'admin'),
(2, 'Profil Singkat', 'hal/profil-singkat', 2, 'admin'),
(3, 'Sejarah Sekolah', 'hal/sejarah-sekolah', 2, 'admin'),
(4, 'Ekstra Kurikuler', 'hal/ekstra-kurikuler', 3, 'admin'),
(5, 'Galeri Foto', 'galeri-foto.html', 5, 'admin'),
(6, 'Galeri Video', 'galeri-video.html', 5, 'admin'),
(7, 'Pengumuman', 'pengumuman.html', 3, 'admin'),
(8, 'Data Siswa ', 'data-siswa.html', 10, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE IF NOT EXISTS `templates` (
  `id_templates` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pembuat` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `folder` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_templates`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id_templates`, `judul`, `pembuat`, `folder`, `aktif`, `username`) VALUES
(1, 'MySchool', 'anekaweb.com', 'templates/webukmv3', 'Y', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `ukm`
--

CREATE TABLE IF NOT EXISTS `ukm` (
  `id_ukm` int(5) NOT NULL AUTO_INCREMENT,
  `tema` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tema_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi_ukm` text COLLATE latin1_general_ci NOT NULL,
  `pengirim` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  `hari` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `dibaca` int(5) NOT NULL DEFAULT '1',
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_ukm`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `ukm`
--

INSERT INTO `ukm` (`id_ukm`, `tema`, `tema_seo`, `isi_ukm`, `pengirim`, `gambar`, `tgl_posting`, `hari`, `dibaca`, `username`) VALUES
(1, 'Youth English Society', 'Youth-English-Society', '<p style="text-align:justify">\r\n<h3>President of YES</h3><br>\r\n<p>Visi : Mengantarkan YES yang lebih aktif , unggul & beprestasi serta mempersatukan seluruh anggota YES untuk memajukan YES</p>\r\n<p>Misi :</p>\r\n<p>1. Mempererat dan menjaga hubungan antar external YES</p>\r\n<p>2. Ikut bergabung dalam kegiatan yang berkaitan dengan YES di luar kampus</p>\r\n<p>3. Berusaha memperkenalkan UKM YES ke khalayak umum yang lebih luas</p>\r\n<p>4. Membuat YES menjadi rumah kedua yang berlandaskan kekeluargaan</p>\r\n<br><br>\r\n\r\n<h3>Vice president of YES</h3><br>\r\n\r\n<p>Visi :  meningkatkan komunikasi internal</p>\r\n<p>Misi :</p>\r\n<p>1. Menjadikan UKM YES sebagai wadah kreativitas anggota</p>\r\n<p>2. Meningkatkan kembali kesadaran anggota mengenai pentingnya kerjasama dan komunikasi</p>\r\n<p>3. Menimbulkan rasa kekeluargaan antar anggota </p>\r\n<br><br>\r\n\r\n<p>Proker :</p>\r\n<p>1. YES Happy Village - Maret</p>\r\n<p>2. Gathering english - Mei</p>\r\n<p>3. Culture shock - September</p>\r\n<p>4. YES for all - November</p>\r\n<br><br>\r\n\r\n<p>Kontak Humas :</p>\r\n<p>Line @lord_lukman19</p>\r\n<p>WA : 0895339971572</p>\r\n<br><br>\r\n</p>', '-', 'UKM-YES.jpg', '2016-02-07', 'Minggu', 18, 'admin'),
(6, 'Volly', 'volly', '<p style="text-align:justify">\r\n<p>Visi : menjadikan UKM Bola Volly UNIKOM sebagai wadah pelatihan \r\ndan pemngembangan bakat di bidang olahraga , khususnya bola voli dan \r\nmembawa nama baik unikom dalam ajang kejuaraantingkat nasional maupun regional</p>\r\n<p>Misi : </p>\r\n<p>1. Mengembangkan kemampuan dan prestasi mahasiswa unikom dalam olahraga bola voli melalui latihan-latihan rutin</p>\r\n<p>2. Mengadakan berbagai kegiatan guna mempererat hubungan antar \r\nanggota , alumni , pembina , dan pelatih ; diantaranya melalui pertemuan-pertemuan dan acara-acara internal lainnya</p>\r\n<p>3. Menjalin hubungan persahabatan dengan UKM dari universitas lain agar jaringan komunikasi semakin \r\nmeluar melalui sparing-sparing atau pertandingan-pertandingan yang diikuti</p>\r\n<br><br>\r\n\r\n<p>Proker :</p>\r\n<p>1. Turnamen bola voli antar jurusan di unikom</p>\r\n<p>2. Diklat keanggotaan (makrab)</p>\r\n<p>3. Mubes</p>\r\n<p>4. Mengikuti kejuaraan di luar kampus</p>\r\n<br><br>\r\n\r\n<p>Kontak Humas :</p>\r\n<p>Line @yogapriaa</p>\r\n<br><br>\r\n</p>', '', 'volly.jpg', '2018-04-10', 'Selasa', 42, 'admin'),
(2, 'Sadaya', 'sadaya', '<p style="text-align:justify">\r\n<p>Visi : menjadikan sadaya tempat yang bisa di jadikan anggota sebagai rumah sekaligus wadah aspirasi bagi anggota yang ingin belajar \r\nberorganisasi serta mengembangkan seni musik dan budaya.</p>\r\n<p>Misi :</p>\r\n<p>1. Menyelenggarakan kegiatan yang bersifat seni dan budaya sekaligus mempelajari budaya organisasi di sadaya</p>\r\n<p>2. Menanamkan rasa memiliki terhadap seni dan budaya dalam keseharian anggotanya</p>\r\n<br><br>\r\n\r\n<p>Proker :</p>\r\n<p>1. Fun with sadaya</p>\r\n<p>2. Marab</p>\r\n<p>3. Bukber</p>\r\n<p>4. Harmoni Budaya</p>\r\n<p>5. Pengabdian Masyarakat</p>\r\n<p>6. Study Tour</p>\r\n<br><br>\r\n\r\n<p>Kontak Humas :</p>\r\n<p>Line @ sekaraa (humas 1 )</p>\r\n<p>Line @negritatsa11 (humas 2)</p>\r\n<br><br>\r\n</p>', '--', 'sadaya.jpg', '2016-02-07', 'Minggu', 21, 'admin'),
(3, 'Sepakbola', 'sepakbola', '<p style="text-align:justify">\r\n<p>Visi : terbinanya insan mahasiswa disiplin , bertanggung jawab dan mempunyai jiwa solidaritas tinggi.</p>\r\n<p>Misi :</p>\r\n<p>1. Mengembangkan prestasi dalam bidang sepakbola</p>\r\n<p>2. Membina pribadi agar memiliki rasa kekeluargaan yang tinggi</p>\r\n<p>3. Memajukan dunia persepakbolaan di UNIKOM</p>\r\n<p>4. Menyalurkan bakat mahasiswa dalam bidang sepakbola</p>\r\n<p>5. Memperkuat dan menambah tali persaudaraan</p>\r\n<br><br>\r\n\r\n<p>Proker :</p>\r\n<p>1. Latihan Rutin</p>\r\n<p>2. Gathering UKM Sepakbola</p>\r\n<p>3. Training camp</p>\r\n<p>4. Cross country</p>\r\n<p>5. Open turnamen internal kampus (antar jurusan)</p>\r\n<p>6. Open turnament tingkat SA/sederajat se-bandung raya</p>\r\n<p>7. Liga mahasiswa jawa barat (LISMAJAB)</p>\r\n<p>8. Torabika campus cup 2018</p>\r\n<p>9. Kompetisi USBU CUP 2018 (skala nasional)</p>\r\n<br><br>\r\n\r\n<p>Kontak Humas :</p>\r\n<p>Line @andreir_</p>\r\n<br><br>\r\n</p>', '-', 'sepakbola.jpg', '2016-02-07', 'Minggu', 15, 'admin'),
(4, 'Pancaksilat', 'pancaksilat', '<p style="text-align:justify">\r\n<p>Visi : menjadikan UKM pencak silat unikom sebagai ukm yang berperan aktif dalam semua kompetisi \r\npencak silat baik kanca regional , nasional maupun internasional serta aktif dalam sistem \r\nkeorganisasian antar lembaga kemahasiswaan yang ada di unikom.</p>\r\n<p>Misi :</p>\r\n<p>1. Meningkatkan potensi dan minat semua anggota ukm silat dalam mengikuti kompetisi pencak silat yang ada</p>\r\n<p>2. Meningkatkan prestasi ukm pencak silat unikom dengan mengikuti semua kompetisi silat kancah nasional dan internasional</p>\r\n<p>3. Menjaga dan meningkatkan keharmonisan antar sesama anggota sehingga terciptalah kebersamaan tanpa kesenjangan serta ke semua lembaga kampus yang ada di unikom.\r\n</p>\r\n<br><br>\r\n\r\n<p>Proker :</p>\r\n<p>1. Latihan Rutin</p>\r\n<p>2. Malam Keakraban</p>\r\n<p>3. lautan Alam</p>\r\n<p>4. HUT UKM</p>\r\n<p>5. Mengikuti Kejuaraan</p>\r\n<p>6. Studi banding ke universitas yang ada di Bandung</p>\r\n<p>7. Ujian kenaikan sabuk</p>\r\n<p>8. Perawatan dan penambahan alat</p>\r\n<p>9. Membuat film pendek</p>\r\n<p>10. Menerima Mahasiswa Baru</p>\r\n<p>11. Serah terima jabatan</p>\r\n<br><br>\r\n\r\n<p>Kontak Humas :</p>\r\n<p>Line @022kresna</p>\r\n<br><br>\r\n</p>', '', 'pancaksilat.jpg', '2017-02-21', 'Selasa', 8, 'admin'),
(5, 'Tarung Derajat', 'tarung-derajat', '<p style="text-align:justify">\r\n<p>Visi : menjadikan UKM tarung derajat unikom sebagai organisasi beladiri yang solid demi tercapainya tujuan organisasi.</p>\r\n<p>Misi : </p>\r\n<p>1. Menciptakan keharmonisan dan menumbuhkan kenyamanan kepada seluruh anggota</p>\r\n<p>2. Mewujudkan prestasi UKM tarung derajat unikom di jawa barat khususnya di kota Bandung</p>\r\n<p>3. Menjaga dan mengembangkan eksistensi UKM tarung derajat unikom di lingkup eksternal</p>\r\n<br><br>\r\n\r\n<p>Proker :</p>\r\n<p>1. Latihan rutin 2 kali seminggu</p>\r\n<p>2. latihan gabungan</p>\r\n<p>3. Latihgan fisik</p>\r\n<p>4. Latihan khusus pendalaman materi</p>\r\n<p>5. Latihan alam</p>\r\n<p>6. Rapat bulanan</p>\r\n<p>7. Silaturahmi dengan Hima UKM lain di UNIKOM</p>\r\n<p>8. Uji tanding dengan satlat lain</p>\r\n<p>9. Penyabukan kenaikan tingkat</p>\r\n<p>10. Musatlat</p>\r\n<p>11. Kejuaraan antar mahasiswa</p>\r\n<p>12. Kejuaraan walikota cup</p>\r\n<p>13. Bakti sosial</p>\r\n<br><br>\r\n\r\n<p>Kontak Humas :</p>\r\n<p>Line @mfadilahh</p>\r\n<br><br>\r\n</p>', '', 'tarung-derajat.jpg', '2018-04-10', 'Selasa', 9, 'admin'),
(16, 'coba1222', 'coba1222', '<p>s</p>\r\n', 's', '81478.jpg', '2018-08-03', 'Jumat', 6, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'user',
  `blokir` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `foto` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `profil` text COLLATE latin1_general_ci NOT NULL,
  `id_session` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `nama_lengkap`, `email`, `no_telp`, `level`, `blokir`, `foto`, `profil`, `id_session`) VALUES
('admin', 'edbd881f1ee2f76ba0bd70fd184f87711be991a0401fd07ccd4b199665f00761afc91731d8d8ba6cbb188b2ed5bfb465b9f3d30231eb0430b9f90fe91d136648', 'Novan', 'aneka_web@yahoo.co.id', '085694871343', 'admin', 'N', '8anekaweb.jpg', '<p>isi profil untuk melengkapi isi profil penulis. isi profil untuk melengkapi isi profil penulis. isi profil untuk melengkapi isi profil penulis.&nbsp;isi profil untuk melengkapi isi profil penulis.&nbsp;isi profil untuk melengkapi isi profil penulis.&nbsp;isi profil untuk melengkapi isi profil penulis.&nbsp;isi profil untuk melengkapi isi profil penulis.&nbsp;isi profil untuk melengkapi isi profil penulis.&nbsp;</p>', 'b2ktnji13jgbati1d0966p8ss0');

-- --------------------------------------------------------

--
-- Table structure for table `usersonline`
--

CREATE TABLE IF NOT EXISTS `usersonline` (
  `timestamp` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `ip` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `file` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `usersonline`
--

INSERT INTO `usersonline` (`timestamp`, `ip`, `file`) VALUES
('1452165098', '127.0.0.1', '/inspirasi/media.php'),
('1452165160', '127.0.0.1', '/inspirasi/media.php');

-- --------------------------------------------------------

--
-- Table structure for table `users_modul`
--

CREATE TABLE IF NOT EXISTS `users_modul` (
  `id_umod` int(11) NOT NULL AUTO_INCREMENT,
  `id_session` varchar(100) NOT NULL,
  `id_modul` int(11) NOT NULL,
  PRIMARY KEY (`id_umod`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `users_modul`
--

INSERT INTO `users_modul` (`id_umod`, `id_session`, `id_modul`) VALUES
(1, 'sfuikuckb828c4cn22sk8elik6', 1),
(2, 'sfuikuckb828c4cn22sk8elik6', 2),
(3, 'sfuikuckb828c4cn22sk8elik6', 3),
(4, 'sfuikuckb828c4cn22sk8elik6', 4),
(5, 'sfuikuckb828c4cn22sk8elik6', 5),
(6, 'sfuikuckb828c4cn22sk8elik6', 6),
(7, 'sfuikuckb828c4cn22sk8elik6', 7),
(8, 'sfuikuckb828c4cn22sk8elik6', 8),
(9, 'sfuikuckb828c4cn22sk8elik6', 9),
(10, 'sfuikuckb828c4cn22sk8elik6', 10),
(11, 'sfuikuckb828c4cn22sk8elik6', 11),
(12, 'sfuikuckb828c4cn22sk8elik6', 12),
(13, 'sfuikuckb828c4cn22sk8elik6', 13),
(14, 'sfuikuckb828c4cn22sk8elik6', 14),
(15, 'sfuikuckb828c4cn22sk8elik6', 15),
(16, 'sfuikuckb828c4cn22sk8elik6', 16),
(17, 'sfuikuckb828c4cn22sk8elik6', 17),
(18, 'sfuikuckb828c4cn22sk8elik6', 18),
(26, 'sfuikuckb828c4cn22sk8elik6', 19),
(20, 'sfuikuckb828c4cn22sk8elik6', 20),
(21, 'sfuikuckb828c4cn22sk8elik6', 21),
(22, 'sfuikuckb828c4cn22sk8elik6', 22),
(23, 'sfuikuckb828c4cn22sk8elik6', 23),
(24, 'sfuikuckb828c4cn22sk8elik6', 24),
(25, 'sfuikuckb828c4cn22sk8elik6', 25),
(27, 'sfuikuckb828c4cn22sk8elik6', 26),
(28, 'sfuikuckb828c4cn22sk8elik6', 27),
(29, 'sfuikuckb828c4cn22sk8elik6', 28),
(30, 'sfuikuckb828c4cn22sk8elik6', 29);

-- --------------------------------------------------------

--
-- Table structure for table `watermark`
--

CREATE TABLE IF NOT EXISTS `watermark` (
  `id_watermark` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_watermark`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `watermark`
--

INSERT INTO `watermark` (`id_watermark`, `judul`, `gambar`) VALUES
(1, 'Inspirasi', 'watermark-logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `welcome`
--

CREATE TABLE IF NOT EXISTS `welcome` (
  `id_welcome` int(5) NOT NULL AUTO_INCREMENT,
  `welcome` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `judul` varchar(250) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`id_welcome`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `welcome`
--

INSERT INTO `welcome` (`id_welcome`, `welcome`, `judul`, `gambar`, `username`) VALUES
(1, '<p>Alhamdulillah, segala puji hanya milik Allah SWT semata, atas kehendak-Nya kami bisa hadir ditengah derasnya perkembangan teknologi informasi setelah kami lakukan update, baik dari sisi pengelolaan maupun isinya. Metamorfosa dunia pendidikan tak lagi bisa dihindari sejalan dengan peradaban IPTEK, termasuk MySchool Kota Jakarta Selatan sebagai institusi pendidikan berusaha membangun efektivitas komunikasi dan informasi dalam era globalisasi. Sistem digital telah berkembang secara cepat dan merambah pesat dalam dunia pendidikan. Oleh karena itu, revolusi teknologi informasi ini kita optimalkan agar pendidikan masa mendatang lebih bersifat terbuka dan kolaboratif. Berbagai informasi berkaitan dengan program dan pengembangan sekolah dapat diakses melalui website MySchool Kota Jakarta Selatan sehingga media ini dapat digunakan sebagai sarana interaksi antara sekolah dengan siswa, orang tua siswa, alumni dan stakeholder lainnya secara luas. Kami sadari bahwa website MySchool Kota Jakarta Selatan masih banyak kekurangan baik dari sisi tampilan, menu maupun isi. Namun demikian, kami akan terus berkreasi dan meng-update agar informasi penyelenggaraan pendidikan dapat tersosialisasi dengan baik.</p>\r\n', 'Selamat Datang di Website MySchool', '86kepsek.jpg', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
