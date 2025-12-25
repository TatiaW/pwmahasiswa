-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 25, 2025 at 06:59 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbuniversitas`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbmahasiswa`
--

CREATE TABLE `tbmahasiswa` (
  `id` int NOT NULL,
  `nim` varchar(12) NOT NULL,
  `nama` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jk` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbmahasiswa`
--

INSERT INTO `tbmahasiswa` (`id`, `nim`, `nama`, `jk`) VALUES
(1, '2405181028', 'M. AUZAN QISTHI', 'L'),
(2, '2405181023', 'NADDYA DAMANIK', 'P'),
(3, '2405181003', 'NAIZUL FAHMI NST', 'L'),
(4, '2405181103', 'NAJMI KHAIRURIZQA', 'P'),
(5, '2405181053', 'NUR LIZA', 'P'),
(6, '2405181098', 'RAKHA BAIHAQY H', 'L'),
(7, '2405181118', 'RASSID RISDA SULPA', 'L'),
(8, '2405181123', 'RICHARD NAEL SRGR', 'L'),
(11, '2405181018', 'TATIA WARDAH NASUTION', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `tbsemester`
--

CREATE TABLE `tbsemester` (
  `id_semester` int NOT NULL,
  `nama_semester` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbsemester`
--

INSERT INTO `tbsemester` (`id_semester`, `nama_semester`) VALUES
(1, 'Semester 1'),
(2, 'Semester 2'),
(3, 'Semester 3'),
(4, 'Semester 4');

-- --------------------------------------------------------

--
-- Table structure for table `tbukt`
--

CREATE TABLE `tbukt` (
  `id_ukt` int NOT NULL,
  `id_mhs` int NOT NULL,
  `semester` int NOT NULL,
  `biaya` int NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbukt`
--

INSERT INTO `tbukt` (`id_ukt`, `id_mhs`, `semester`, `biaya`, `tanggal_bayar`, `status`) VALUES
(1, 1, 1, 3083129, '2024-09-01', 'Lunas'),
(2, 2, 1, 2344248, '2024-09-01', 'Lunas'),
(3, 3, 1, 4471853, '2024-09-01', 'Lunas'),
(4, 4, 1, 3326524, '2024-09-01', 'Lunas'),
(5, 5, 1, 1717059, '2024-09-01', 'Lunas'),
(6, 6, 1, 4105722, '2024-09-01', 'Lunas'),
(7, 7, 1, 3377437, '2024-09-01', 'Lunas'),
(8, 8, 1, 3070020, '2024-09-01', 'Lunas'),
(16, 1, 2, 3717787, '2025-02-01', 'Lunas'),
(17, 2, 2, 4378876, '2025-02-01', 'Lunas'),
(18, 3, 2, 2241021, '2025-02-01', 'Lunas'),
(19, 4, 2, 3568475, '2025-02-01', 'Lunas'),
(20, 5, 2, 2619313, '2025-02-01', 'Lunas'),
(21, 6, 2, 4391142, '2025-02-01', 'Lunas'),
(22, 7, 2, 2097773, '2025-02-01', 'Lunas'),
(23, 8, 2, 2815438, '2025-02-01', 'Lunas'),
(31, 1, 3, 2783870, '2025-09-01', 'Lunas'),
(32, 2, 3, 3973039, '2025-09-01', 'Lunas'),
(33, 3, 3, 3013583, '2025-09-01', 'Lunas'),
(34, 4, 3, 1648802, '2025-09-01', 'Lunas'),
(35, 5, 3, 4703260, '2025-09-01', 'Lunas'),
(36, 6, 3, 3069893, '2025-09-01', 'Lunas'),
(37, 7, 3, 3239686, '2025-09-01', 'Lunas'),
(38, 8, 3, 1988752, '2025-09-01', 'Lunas'),
(46, 1, 4, 2224701, '2026-02-01', 'Belum Lunas'),
(47, 2, 4, 3657253, '2026-02-01', 'Belum Lunas'),
(48, 3, 4, 3112159, '2026-02-01', 'Belum Lunas'),
(49, 4, 4, 3089038, '2026-02-01', 'Belum Lunas'),
(50, 5, 4, 4608715, '2026-02-01', 'Belum Lunas'),
(51, 6, 4, 1776459, '2026-02-01', 'Belum Lunas'),
(52, 7, 4, 4056154, '2026-02-01', 'Belum Lunas'),
(53, 8, 4, 2951391, '2026-02-01', 'Belum Lunas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbmahasiswa`
--
ALTER TABLE `tbmahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbsemester`
--
ALTER TABLE `tbsemester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Indexes for table `tbukt`
--
ALTER TABLE `tbukt`
  ADD PRIMARY KEY (`id_ukt`),
  ADD KEY `id_mhs` (`id_mhs`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbmahasiswa`
--
ALTER TABLE `tbmahasiswa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbsemester`
--
ALTER TABLE `tbsemester`
  MODIFY `id_semester` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbukt`
--
ALTER TABLE `tbukt`
  MODIFY `id_ukt` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbukt`
--
ALTER TABLE `tbukt`
  ADD CONSTRAINT `tbukt_ibfk_1` FOREIGN KEY (`id_mhs`) REFERENCES `tbmahasiswa` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
