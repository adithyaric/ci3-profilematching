-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 22, 2021 at 03:39 PM
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
(17, 'IR.64', 'padi'),
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
(10, 'bentuk tanaman', 'secondary'),
(11, 'bentuk gabah', 'secondary'),
(12, 'kadar amilosa', 'core'),
(13, 'Kerebahan', 'secondary');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_alternatif`
--

CREATE TABLE `nilai_alternatif` (
  `id_nilai` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_subkriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_alternatif`
--

INSERT INTO `nilai_alternatif` (`id_nilai`, `id_alternatif`, `id_subkriteria`) VALUES
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
(215, 18, 17),
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
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id_subkriteria` int(11) NOT NULL,
  `nama_subkriteria` text NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id_subkriteria`, `nama_subkriteria`, `id_kriteria`, `nilai`) VALUES
(16, '90 - 109 cm', 6, 1),
(17, '110 - 120 cm', 6, 2),
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `level`) VALUES
(1, 'user', '6ad14ba9986e3615423dfca256d04e3f', 'user'),
(2, 'admin', '0192023a7bbd73250516f069df18b500', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

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
  ADD KEY `id_subkriteria` (`id_subkriteria`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id_subkriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`);

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
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  ADD CONSTRAINT `nilai_alternatif_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_alternatif_ibfk_2` FOREIGN KEY (`id_subkriteria`) REFERENCES `sub_kriteria` (`id_subkriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD CONSTRAINT `sub_kriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
