-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2020 at 05:06 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `firmanhidup`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin1', 'd01393436e02c4c5078bd5d4a9808182'),
('admin2', 'd01393436e02c4c5078bd5d4a9808182'),
('andreas', 'd01393436e02c4c5078bd5d4a9808182'),
('benny', 'd01393436e02c4c5078bd5d4a9808182'),
('yoko', 'd01393436e02c4c5078bd5d4a9808182');

-- --------------------------------------------------------

--
-- Table structure for table `error_log`
--

CREATE TABLE `error_log` (
  `id_log` datetime NOT NULL DEFAULT current_timestamp(),
  `value` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `IdKategori` int(255) NOT NULL,
  `NamaKategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`IdKategori`, `NamaKategori`) VALUES
(1, 'Kategori1'),
(2, 'kategori2'),
(3, 'kategori3');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `IdVideo` int(255) NOT NULL,
  `NamaVideo` varchar(255) DEFAULT NULL,
  `IdKategori` int(255) DEFAULT NULL,
  `SourceVideo` varchar(255) DEFAULT NULL,
  `SourceGambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`IdVideo`, `NamaVideo`, `IdKategori`, `SourceVideo`, `SourceGambar`) VALUES
(10, 'semua ada 1', 1, '2010282020_09_10_11_36_51.mp4', NULL),
(11, 'semua ada', 2, '2010282020_09_10_11_36_511.mp4', NULL),
(12, 'hhh', 3, '2010282020_09_10_11_38_30.mp4', NULL),
(13, 'kat1', 1, '2010282020_09_10_11_37_38.mp4', NULL),
(14, 'kkkk', 2, '2010282020_09_10_11_31_42.mp4', NULL),
(15, 'asdada', 3, '2010282020_09_10_11_37_381.mp4', NULL),
(16, 'semua ada', 1, '2010282020_09_10_11_38_301.mp4', NULL),
(17, 'kkkk', 2, '2010282020_09_10_11_37_382.mp4', NULL),
(18, 'semua ada', 3, '2010282020_09_10_11_37_383.mp4', NULL),
(19, 'semua ada', 1, '2010282020_09_10_11_37_384.mp4', NULL),
(20, 'asd', 2, '2010282020_09_10_11_37_385.mp4', NULL),
(21, 'jjj', 3, '2010282020_09_10_11_37_386.mp4', NULL),
(22, 'kat1', NULL, '2010282020_09_10_11_36_512.mp4', NULL),
(23, 'asd', NULL, '2010282020_09_10_11_37_387.mp4', NULL),
(24, 'kat1', NULL, '2010282020_09_10_11_37_388.mp4', NULL),
(25, 'kat1', NULL, '2010282020_09_10_11_37_389.mp4', NULL),
(26, 'semua ada', NULL, '2010282020_09_10_11_37_3810.mp4', NULL),
(27, 'Video 2', 2, '2010302020_09_10_11_39_02.mp4', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `error_log`
--
ALTER TABLE `error_log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`IdKategori`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`IdVideo`),
  ADD KEY `IdKategori` (`IdKategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `IdKategori` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `IdVideo` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video_ibfk_1` FOREIGN KEY (`IdKategori`) REFERENCES `kategori` (`IdKategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
