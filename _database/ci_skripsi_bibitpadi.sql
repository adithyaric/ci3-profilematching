-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 18, 2022 at 05:10 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_skripsi_bibitpadi`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `nama_alternatif` varchar(50) NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `nama_alternatif`, `detail`) VALUES
(9, 'Raja Lele', 'padi'),
(10, 'Mapan P-05', 'padi'),
(11, 'Ciherang', 'padi'),
(12, 'Ciherang Janger', 'padi'),
(13, 'Inpari 42', 'padi'),
(14, 'Inpari 43', 'padi'),
(15, 'Inpari 45 Dirgahayu', 'padi'),
(16, 'Inpari 32', 'padi'),
(17, 'IR 64', 'padi'),
(18, 'Mekonga', 'padi'),
(19, 'Sidenuk', 'padi'),
(20, 'Sintanur', 'padi'),
(21, 'M70D', 'padi'),
(22, 'Inpari 24', 'padi'),
(23, 'Cimelati', 'padi'),
(24, 'Pepe', 'padi'),
(25, 'Padjadjaran Agritan', 'padi'),
(26, 'Kabir 05', 'padi'),
(27, 'Sunggal', 'padi');

-- --------------------------------------------------------

--
-- Table structure for table `bobot_kriteria`
--

CREATE TABLE `bobot_kriteria` (
  `id_bobotkriteria` int(11) NOT NULL,
  `nama_bobotkriteria` text NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bobot_kriteria`
--

INSERT INTO `bobot_kriteria` (`id_bobotkriteria`, `nama_bobotkriteria`, `id_kriteria`, `nilai`) VALUES
(16, '80 - 100 cm', 6, 1),
(17, '101 - 120 cm', 6, 2),
(18, '>121cm', 6, 3),
(19, 'Tahan/Sulit (<6%)', 7, 1),
(20, 'Sedang (6%-50%)', 7, 2),
(21, 'Mudah (51% - 100%)', 7, 3),
(22, '>=100 rb/kg', 8, 1),
(23, '>=81rb/kg & <=99 rb/kg', 8, 2),
(24, '<=80 rb/kg', 8, 3),
(25, '116 - 125 hari', 9, 1),
(26, '105 - 115 hari', 9, 2),
(27, '80 - 104 hari', 9, 3),
(28, 'Tunduk', 10, 1),
(29, 'Agak Tegak', 10, 2),
(30, 'Tegak', 10, 3),
(31, 'Ramping', 11, 1),
(32, 'Sedang', 11, 2),
(33, 'Panjang ramping', 11, 3),
(34, '9 - 19% (rendah)', 12, 1),
(35, '20 - 24% (sedang)', 12, 2),
(36, '25 - 33% (tinggi)', 12, 3),
(37, 'toleran', 13, 1),
(38, 'sedang', 13, 2),
(39, 'tahan', 13, 3);

-- --------------------------------------------------------

--
-- Table structure for table `keterangan`
--

CREATE TABLE `keterangan` (
  `id_keterangan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keterangan`
--

INSERT INTO `keterangan` (`id_keterangan`, `id_user`, `tanggal`, `detail`) VALUES
(16, 3, '2022-01-02', '													Tinggi tanaman (core) : >121cm, <br>Kerontokan (secondary) : Mudah (51% - 100%), <br>Harga bibit (core) : <=80 rb/kg, <br>Umur tanaman (secondary) : 80 - 104 hari, <br>bentuk tanaman (secondary) : Tegak, <br>bentuk gabah (secondary) : Panjang ramping, <br>kadar amilosa (core) : 25 - 33% (tinggi), <br>Kerebahan (secondary) : tahan, <br>													Core Factor : 60, Secondary Factor : 40												'),
(23, 1, '2022-01-10', '													<tr><td>Tinggi tanaman</td><td>core</td><td>>121cm</td></tr><tr><td>Kerontokan</td><td>secondary</td><td>Mudah (51% - 100%)</td></tr><tr><td>Harga bibit</td><td>core</td><td><=80 rb/kg</td></tr><tr><td>Umur tanaman</td><td>secondary</td><td>80 - 104 hari</td></tr><tr><td>bentuk tanaman</td><td>secondary</td><td>Tegak</td></tr><tr><td>bentuk gabah</td><td>secondary</td><td>Panjang ramping</td></tr><tr><td>kadar amilosa</td><td>core</td><td>25 - 33% (tinggi)</td></tr><tr><td>Kerebahan</td><td>secondary</td><td>tahan</td></tr>													<tr>\r\n														<td>\r\n															<b>Bobot Core & Secondary Factor :</b>\r\n														</td>\r\n														<td>\r\n															Core Factor : 60%\r\n														</td>\r\n														<td>\r\n															Secondary Factor : 40%\r\n														</td>\r\n													</tr>\r\n												'),
(24, 1, '2022-01-11', '													<tr><td>Tinggi tanaman</td><td>core</td><td>>121cm</td></tr><tr><td>Kerontokan</td><td>secondary</td><td>Mudah (51% - 100%)</td></tr><tr><td>Harga bibit</td><td>core</td><td><=80 rb/kg</td></tr><tr><td>Umur tanaman</td><td>secondary</td><td>80 - 104 hari</td></tr><tr><td>bentuk tanaman</td><td>secondary</td><td>Tegak</td></tr><tr><td>bentuk gabah</td><td>secondary</td><td>Panjang ramping</td></tr><tr><td>kadar amilosa</td><td>core</td><td>25 - 33% (tinggi)</td></tr><tr><td>Kerebahan</td><td>secondary</td><td>tahan</td></tr>													<tr>\r\n														<td>\r\n															<b>Bobot Core & Secondary Factor :</b>\r\n														</td>\r\n														<td>\r\n															Core Factor : 60%\r\n														</td>\r\n														<td>\r\n															Secondary Factor : 40%\r\n														</td>\r\n													</tr>\r\n												'),
(25, 3, '2022-01-16', '													<tr><td>Tinggi tanaman</td><td>core</td><td>>121cm</td></tr><tr><td>Kerontokan</td><td>secondary</td><td>Mudah (51% - 100%)</td></tr><tr><td>Harga bibit</td><td>core</td><td><=80 rb/kg</td></tr><tr><td>Umur tanaman</td><td>secondary</td><td>80 - 104 hari</td></tr><tr><td>bentuk tanaman</td><td>secondary</td><td>Tegak</td></tr><tr><td>bentuk gabah</td><td>secondary</td><td>Panjang ramping</td></tr><tr><td>kadar amilosa</td><td>core</td><td>25 - 33% (tinggi)</td></tr><tr><td>Kerebahan</td><td>secondary</td><td>tahan</td></tr>													<tr>\r\n														<td>\r\n															<b>Bobot Core & Secondary Factor :</b>\r\n														</td>\r\n														<td>\r\n															Core Factor : 60%\r\n														</td>\r\n														<td>\r\n															Secondary Factor : 40%\r\n														</td>\r\n													</tr>\r\n												'),
(26, 1, '2022-01-17', '													<tr><td>Tinggi tanaman</td><td>core</td><td>>121cm</td></tr><tr><td>Kerontokan</td><td>secondary</td><td>Mudah (51% - 100%)</td></tr><tr><td>Harga bibit</td><td>core</td><td><=80 rb/kg</td></tr><tr><td>Umur tanaman</td><td>secondary</td><td>80 - 104 hari</td></tr><tr><td>bentuk tanaman</td><td>secondary</td><td>Tegak</td></tr><tr><td>bentuk gabah</td><td>secondary</td><td>Panjang ramping</td></tr><tr><td>kadar amilosa</td><td>core</td><td>25 - 33% (tinggi)</td></tr><tr><td>Kerebahan</td><td>secondary</td><td>tahan</td></tr>													<tr>\r\n														<td>\r\n															<b>Bobot Core & Secondary Factor :</b>\r\n														</td>\r\n														<td>\r\n															Core Factor : 60%\r\n														</td>\r\n														<td>\r\n															Secondary Factor : 40%\r\n														</td>\r\n													</tr>\r\n												');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `jenis_kriteria` enum('core','secondary') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `jenis_kriteria`) VALUES
(6, 'Tinggi tanaman', 'core'),
(7, 'Kerontokan', 'secondary'),
(8, 'Harga bibit', 'core'),
(9, 'Umur tanaman', 'secondary'),
(10, 'Bentuk tanaman', 'secondary'),
(11, 'Bentuk gabah', 'secondary'),
(12, 'Kadar amilosa', 'core'),
(13, 'Kerebahan', 'secondary');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_alternatif`
--

CREATE TABLE `nilai_alternatif` (
  `id_nilai` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_bobotkriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_alternatif`
--

INSERT INTO `nilai_alternatif` (`id_nilai`, `id_alternatif`, `id_bobotkriteria`) VALUES
(143, 9, 18),
(144, 9, 19),
(145, 9, 23),
(146, 9, 26),
(147, 9, 30),
(148, 9, 32),
(149, 9, 35),
(150, 9, 38),
(151, 10, 16),
(152, 10, 21),
(153, 10, 22),
(154, 10, 26),
(155, 10, 30),
(156, 10, 31),
(157, 10, 35),
(158, 10, 39),
(159, 11, 18),
(160, 11, 20),
(161, 11, 22),
(162, 11, 25),
(163, 11, 30),
(164, 11, 33),
(165, 11, 35),
(166, 11, 38),
(167, 12, 18),
(168, 12, 20),
(169, 12, 23),
(170, 12, 26),
(171, 12, 30),
(172, 12, 33),
(173, 12, 35),
(174, 12, 38),
(175, 13, 16),
(176, 13, 21),
(177, 13, 23),
(178, 13, 26),
(179, 13, 30),
(180, 13, 31),
(181, 13, 34),
(182, 13, 39),
(183, 14, 16),
(184, 14, 20),
(185, 14, 23),
(186, 14, 26),
(187, 14, 30),
(188, 14, 31),
(189, 14, 34),
(190, 14, 39),
(191, 15, 17),
(192, 15, 20),
(193, 15, 22),
(194, 15, 25),
(195, 15, 30),
(196, 15, 31),
(197, 15, 34),
(198, 15, 38),
(199, 16, 16),
(200, 16, 21),
(201, 16, 23),
(202, 16, 25),
(203, 16, 30),
(204, 16, 32),
(205, 16, 35),
(206, 16, 38),
(207, 17, 16),
(208, 17, 19),
(209, 17, 24),
(210, 17, 26),
(211, 17, 30),
(212, 17, 33),
(213, 17, 36),
(214, 17, 39),
(215, 18, 16),
(216, 18, 20),
(217, 18, 23),
(218, 18, 25),
(219, 18, 29),
(220, 18, 33),
(221, 18, 35),
(222, 18, 38),
(223, 19, 16),
(224, 19, 20),
(225, 19, 23),
(226, 19, 27),
(227, 19, 30),
(228, 19, 31),
(229, 19, 35),
(230, 19, 39),
(231, 20, 18),
(232, 20, 20),
(233, 20, 23),
(234, 20, 25),
(235, 20, 30),
(236, 20, 32),
(237, 20, 34),
(238, 20, 38),
(239, 21, 16),
(240, 21, 21),
(241, 21, 22),
(242, 21, 27),
(243, 21, 30),
(244, 21, 31),
(245, 21, 35),
(246, 21, 39),
(247, 22, 16),
(248, 22, 20),
(249, 22, 23),
(250, 22, 26),
(251, 22, 30),
(252, 22, 31),
(253, 22, 34),
(254, 22, 39),
(255, 23, 17),
(256, 23, 20),
(257, 23, 23),
(258, 23, 25),
(259, 23, 30),
(260, 23, 31),
(261, 23, 34),
(262, 23, 38),
(263, 24, 17),
(264, 24, 21),
(265, 24, 23),
(266, 24, 25),
(267, 24, 30),
(268, 24, 31),
(269, 24, 35),
(270, 24, 39),
(271, 25, 16),
(272, 25, 20),
(273, 25, 22),
(274, 25, 27),
(275, 25, 29),
(276, 25, 31),
(277, 25, 35),
(278, 25, 37),
(279, 26, 17),
(280, 26, 20),
(281, 26, 22),
(282, 26, 27),
(283, 26, 30),
(284, 26, 33),
(285, 26, 35),
(286, 26, 38),
(287, 27, 17),
(288, 27, 20),
(289, 27, 22),
(290, 27, 25),
(291, 27, 30),
(292, 27, 33),
(293, 27, 35),
(294, 27, 38);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `id_riwayat` int(11) NOT NULL,
  `id_keterangan` int(11) NOT NULL,
  `rangking` int(11) NOT NULL,
  `nama_alternatif` varchar(200) NOT NULL,
  `nilai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`id_riwayat`, `id_keterangan`, `rangking`, `nama_alternatif`, `nilai`) VALUES
(97, 16, 1, 'IR 64', '4.74'),
(98, 16, 2, 'Inpari 32', '4.68'),
(99, 16, 3, 'Mekonga', '4.60'),
(100, 16, 4, 'Sidenuk', '4.60'),
(101, 16, 5, 'Pepe', '4.58'),
(102, 16, 6, 'Inpari 43', '4.48'),
(103, 16, 7, 'Inpari 24', '4.48'),
(104, 16, 8, 'Mapan P-05', '4.44'),
(105, 16, 9, 'Inpari 42', '4.44'),
(106, 16, 10, 'Sunggal', '4.38'),
(107, 16, 11, 'M70D', '4.36'),
(108, 16, 12, 'Ciherang Janger', '4.34'),
(109, 16, 13, 'Cimelati', '4.34'),
(110, 16, 14, 'Raja Lele', '4.30'),
(111, 16, 15, 'Kabir 05', '4.26'),
(112, 16, 16, 'Sintanur', '4.22'),
(113, 16, 17, 'Ciherang', '4.18'),
(114, 16, 18, 'Padjadjaran Agritan', '4.16'),
(115, 16, 19, 'Inpari 45 Dirgahayu', '4.14'),
(230, 23, 1, 'IR 64', '4.74'),
(231, 23, 2, 'Inpari 32', '4.68'),
(232, 23, 3, 'Mekonga', '4.60'),
(233, 23, 4, 'Sidenuk', '4.60'),
(234, 23, 5, 'Pepe', '4.58'),
(235, 23, 6, 'Inpari 43', '4.48'),
(236, 23, 7, 'Inpari 24', '4.48'),
(237, 23, 8, 'Mapan P-05', '4.44'),
(238, 23, 9, 'Inpari 42', '4.44'),
(239, 23, 10, 'Sunggal', '4.38'),
(240, 23, 11, 'M70D', '4.36'),
(241, 23, 12, 'Ciherang Janger', '4.34'),
(242, 23, 13, 'Cimelati', '4.34'),
(243, 23, 14, 'Raja Lele', '4.30'),
(244, 23, 15, 'Kabir 05', '4.26'),
(245, 23, 16, 'Sintanur', '4.22'),
(246, 23, 17, 'Ciherang', '4.18'),
(247, 23, 18, 'Padjadjaran Agritan', '4.16'),
(248, 23, 19, 'Inpari 45 Dirgahayu', '4.14'),
(249, 24, 1, 'IR 64', '4.74'),
(250, 24, 2, 'Inpari 32', '4.68'),
(251, 24, 3, 'Mekonga', '4.60'),
(252, 24, 4, 'Sidenuk', '4.60'),
(253, 24, 5, 'Pepe', '4.58'),
(254, 24, 6, 'Inpari 43', '4.48'),
(255, 24, 7, 'Inpari 24', '4.48'),
(256, 24, 8, 'Mapan P-05', '4.44'),
(257, 24, 9, 'Inpari 42', '4.44'),
(258, 24, 10, 'Sunggal', '4.38'),
(259, 24, 11, 'M70D', '4.36'),
(260, 24, 12, 'Ciherang Janger', '4.34'),
(261, 24, 13, 'Cimelati', '4.34'),
(262, 24, 14, 'Raja Lele', '4.30'),
(263, 24, 15, 'Kabir 05', '4.26'),
(264, 24, 16, 'Sintanur', '4.22'),
(265, 24, 17, 'Ciherang', '4.18'),
(266, 24, 18, 'Padjadjaran Agritan', '4.16'),
(267, 24, 19, 'Inpari 45 Dirgahayu', '4.14'),
(268, 25, 1, 'IR 64', '4.74'),
(269, 25, 2, 'Inpari 32', '4.68'),
(270, 25, 3, 'Mekonga', '4.60'),
(271, 25, 4, 'Sidenuk', '4.60'),
(272, 25, 5, 'Pepe', '4.58'),
(273, 25, 6, 'Inpari 43', '4.48'),
(274, 25, 7, 'Inpari 24', '4.48'),
(275, 25, 8, 'Mapan P-05', '4.44'),
(276, 25, 9, 'Inpari 42', '4.44'),
(277, 25, 10, 'Sunggal', '4.38'),
(278, 25, 11, 'M70D', '4.36'),
(279, 25, 12, 'Ciherang Janger', '4.34'),
(280, 25, 13, 'Cimelati', '4.34'),
(281, 25, 14, 'Raja Lele', '4.30'),
(282, 25, 15, 'Kabir 05', '4.26'),
(283, 25, 16, 'Sintanur', '4.22'),
(284, 25, 17, 'Ciherang', '4.18'),
(285, 25, 18, 'Padjadjaran Agritan', '4.16'),
(286, 25, 19, 'Inpari 45 Dirgahayu', '4.14'),
(287, 26, 1, 'IR 64', '4.74'),
(288, 26, 2, 'Inpari 32', '4.68'),
(289, 26, 3, 'Mekonga', '4.60'),
(290, 26, 4, 'Sidenuk', '4.60'),
(291, 26, 5, 'Pepe', '4.58'),
(292, 26, 6, 'Inpari 43', '4.48'),
(293, 26, 7, 'Inpari 24', '4.48'),
(294, 26, 8, 'Mapan P-05', '4.44'),
(295, 26, 9, 'Inpari 42', '4.44'),
(296, 26, 10, 'Sunggal', '4.38'),
(297, 26, 11, 'M70D', '4.36'),
(298, 26, 12, 'Ciherang Janger', '4.34'),
(299, 26, 13, 'Cimelati', '4.34'),
(300, 26, 14, 'Raja Lele', '4.30'),
(301, 26, 15, 'Kabir 05', '4.26'),
(302, 26, 16, 'Sintanur', '4.22'),
(303, 26, 17, 'Ciherang', '4.18'),
(304, 26, 18, 'Padjadjaran Agritan', '4.16'),
(305, 26, 19, 'Inpari 45 Dirgahayu', '4.14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `level`) VALUES
(1, 'adit', '486b6c6b267bc61677367eb6b6458764', 'user'),
(2, 'admin', '0192023a7bbd73250516f069df18b500', 'admin'),
(3, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `bobot_kriteria`
--
ALTER TABLE `bobot_kriteria`
  ADD PRIMARY KEY (`id_bobotkriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `keterangan`
--
ALTER TABLE `keterangan`
  ADD PRIMARY KEY (`id_keterangan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_alternatif` (`id_alternatif`),
  ADD KEY `id_subkriteria` (`id_bobotkriteria`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `id_keterangan` (`id_keterangan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `bobot_kriteria`
--
ALTER TABLE `bobot_kriteria`
  MODIFY `id_bobotkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `keterangan`
--
ALTER TABLE `keterangan`
  MODIFY `id_keterangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=295;

--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=306;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bobot_kriteria`
--
ALTER TABLE `bobot_kriteria`
  ADD CONSTRAINT `bobot_kriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keterangan`
--
ALTER TABLE `keterangan`
  ADD CONSTRAINT `keterangan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  ADD CONSTRAINT `nilai_alternatif_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_alternatif_ibfk_2` FOREIGN KEY (`id_bobotkriteria`) REFERENCES `bobot_kriteria` (`id_bobotkriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD CONSTRAINT `riwayat_ibfk_1` FOREIGN KEY (`id_keterangan`) REFERENCES `keterangan` (`id_keterangan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
