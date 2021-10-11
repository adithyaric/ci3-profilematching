-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 10, 2021 at 10:25 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_bibitpadi`
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
(1, 'Inpasari 42 GSR', 'Varietas inbrida keluaran tahun 2016, rasanya enak dan pulen luar biasa, kerontokannya\r\npun mudah sekali. Potensi hasilnya mencapai 7,11 ton '),
(2, 'Sertani 13 ', 'Sertani 13 merupakan jenis padi dari MSP. Popularitasnya begitu meluas dari Sabang\r\nsampai Merauke. Sertani 13 adalah jenis terbaik yaitu 13A, 13B, dan 13C.\r\n'),
(3, 'Mapan P-05', 'Padi hibrida merupakan unggulan berkualitas,Keunggulan utamanya adalah bobot tiap\r\ngabah yang tinggi dengan hasil > 8 ton / ha.');

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
(1, 'Batas tanam', 'core'),
(2, 'Kadar air', 'core'),
(3, 'Tinggi tanaman', 'secondary'),
(4, 'Kerontokan', 'secondary'),
(5, 'Harga bibit', 'secondary');

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
(1, 1, 3),
(2, 1, 4),
(3, 1, 7),
(4, 1, 11),
(5, 1, 15),
(6, 2, 2),
(7, 2, 5),
(8, 2, 7),
(9, 2, 11),
(10, 2, 13),
(11, 3, 1),
(12, 3, 5),
(13, 3, 8),
(14, 3, 12),
(15, 3, 15);

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
(1, 'Kualitas sangat buruk jika ditanam lebih dari 1 kali', 1, 1),
(2, '\"Kualitas kurang jika ditanam\r\nlebih dari 1 kali\"\r\n', 1, 2),
(3, 'Kualitas tetap jika ditanam lebih dari 1 kali\r\n', 1, 3),
(4, '<20%\r\n', 2, 1),
(5, '21% - 45%\r\n', 2, 2),
(6, '>45%\r\n', 2, 3),
(7, '90 - 110 cm\r\n', 3, 1),
(8, '110 - 120 cm\r\n', 3, 2),
(9, '>121cm\r\n', 3, 3),
(10, 'Sulit (<6%)\r\n', 4, 1),
(11, 'Sedang (6%-50%)\r\n', 4, 2),
(12, 'Mudah (51% - 100%)\r\n', 4, 3),
(13, '>=60 rb/kg\r\n', 5, 1),
(14, '<60rb/kg dan >=30 rb/kg\r\n', 5, 2),
(15, '<30 rb/kg\r\n', 5, 3);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
