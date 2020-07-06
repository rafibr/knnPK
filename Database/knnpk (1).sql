-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2020 at 08:15 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knnpk`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_target`
--

CREATE TABLE `data_target` (
  `ID_DATA_TARGET` int(11) NOT NULL,
  `NAMA_DATA_TARGET` varchar(100) NOT NULL,
  `KB_DATA_TARGET` varchar(5) NOT NULL,
  `PBO_DATA_TARGET` varchar(5) NOT NULL,
  `PW_DATA_TARGET` varchar(5) NOT NULL,
  `RPL_DATA_TARGET` varchar(5) NOT NULL,
  `APS_DATA_TARGET` varchar(5) NOT NULL,
  `MANPRO_DATA_TARGET` varchar(5) NOT NULL,
  `KWU_DATA_TARGET` varchar(5) NOT NULL,
  `TKTI_DATA_TARGET` varchar(5) NOT NULL,
  `LABEL_DATA_TARGET` varchar(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_target`
--

INSERT INTO `data_target` (`ID_DATA_TARGET`, `NAMA_DATA_TARGET`, `KB_DATA_TARGET`, `PBO_DATA_TARGET`, `PW_DATA_TARGET`, `RPL_DATA_TARGET`, `APS_DATA_TARGET`, `MANPRO_DATA_TARGET`, `KWU_DATA_TARGET`, `TKTI_DATA_TARGET`, `LABEL_DATA_TARGET`) VALUES
(1, 'Radiya', '3', '3', '3', '3', '3', '3', '3', '3', '2');

-- --------------------------------------------------------

--
-- Table structure for table `data_testing`
--

CREATE TABLE `data_testing` (
  `ID_DATA_TESTING` int(11) NOT NULL,
  `NAMA_DATA_TESTING` varchar(100) NOT NULL,
  `KP_DATA_TESTING` varchar(5) NOT NULL,
  `PBO_DATA_TESTING` varchar(5) NOT NULL,
  `PW_DATA_TESTING` varchar(5) NOT NULL,
  `RPL_DATA_TESTING` varchar(5) NOT NULL,
  `APS_DATA_TESTING` varchar(5) NOT NULL,
  `MANPRO_DATA_TESTING` varchar(5) NOT NULL,
  `KWU_DATA_TESTING` varchar(5) NOT NULL,
  `TKTI_DATA_TESTING` varchar(5) NOT NULL,
  `LABEL_FACT_DATA_TESTING` varchar(5) NOT NULL DEFAULT '0',
  `LABEL_PREDICT_DATA_TESTING` varchar(5) NOT NULL DEFAULT '0',
  `BATCH_DATA_TESTING` varchar(5) NOT NULL DEFAULT '2017'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_testing`
--

INSERT INTO `data_testing` (`ID_DATA_TESTING`, `NAMA_DATA_TESTING`, `KP_DATA_TESTING`, `PBO_DATA_TESTING`, `PW_DATA_TESTING`, `RPL_DATA_TESTING`, `APS_DATA_TESTING`, `MANPRO_DATA_TESTING`, `KWU_DATA_TESTING`, `TKTI_DATA_TESTING`, `LABEL_FACT_DATA_TESTING`, `LABEL_PREDICT_DATA_TESTING`, `BATCH_DATA_TESTING`) VALUES
(1, 'Leticia Labat', '3.13', '3.31', '2.68', '3.8', '1.36', '2.38', '3.43', '2.53', '1', '2', '2017'),
(2, 'Saul Skyner', '1.35', '2.95', '1.69', '2.87', '0.86', '1.3', '0.3', '1.94', '2', '3', '2017'),
(3, 'Monroe Mayou', '2.51', '2.1', '2.77', '0.68', '2.78', '3.6', '3.18', '2.3', '3', '1', '2017'),
(4, 'Rossie Headon', '0.04', '2.94', '0.19', '2.22', '0.62', '1.78', '0.63', '1.15', '1', '3', '2017'),
(5, 'Linus Drust', '0.79', '2.2', '0.25', '1.75', '0.88', '2.25', '1.62', '3.08', '2', '2', '2017'),
(6, 'Devin Shawyers', '1.81', '2.75', '0.51', '2.05', '0.04', '1.9', '3.23', '0.92', '3', '2', '2017'),
(7, 'Abigael Welburn', '0.69', '0.64', '3.88', '3.5', '0.8', '1.63', '1.35', '0.2', '1', '1', '2017'),
(8, 'Damien Mcsarry', '0.65', '1.26', '0.85', '1.54', '0.16', '2.49', '3.96', '2.78', '2', '2', '2017'),
(9, 'Dale Uttley', '2.57', '3.42', '2.93', '1.64', '0.98', '2.63', '3.29', '3.78', '3', '2', '2017'),
(10, 'Torr Tomankowski', '2.17', '3.23', '3.46', '0.92', '1.24', '2.38', '1.97', '2.78', '2', '3', '2017'),
(11, 'Alford Brands', '3.63', '2.38', '3.05', '0.12', '1.05', '2.24', '0.16', '2.26', '2', '3', '2017'),
(12, 'Juan Bisley', '2.62', '1.01', '3.95', '1.6', '1.25', '1.83', '0.36', '3.76', '1', '3', '2017'),
(13, 'Sholom Fearneley', '2.49', '2.33', '3.24', '1.39', '1.13', '2.74', '1.05', '0.58', '3', '3', '2017'),
(14, 'Sheridan Gheorghie', '1.49', '1.85', '1.13', '1.63', '0.67', '1.45', '3.8', '1.28', '3', '2', '2017'),
(15, 'Tabbi Beslier', '3.13', '0.14', '2.39', '1.72', '1.52', '0.97', '1.88', '2.76', '2', '2', '2017'),
(16, 'Marian Braben', '0.67', '3.65', '3.12', '1.5', '1.56', '3.54', '0.76', '2.36', '2', '3', '2017'),
(17, 'Maison Cahey', '2.18', '2.91', '0.92', '0.07', '0.27', '0.43', '3.57', '0.96', '2', '3', '2017'),
(18, 'Carmella Hiland', '2.81', '2.59', '1.49', '0.59', '1.69', '0.66', '2.5', '1.51', '3', '3', '2017'),
(19, 'Andromache Crennell', '1.4', '1.27', '1.22', '2.63', '1.24', '1.81', '2.14', '3.99', '1', '2', '2017'),
(20, 'Joan Cammack', '1.2', '1.4', '1.21', '3.21', '2.05', '3.17', '0.57', '3.12', '1', '3', '2017'),
(21, 'Shandy Mitchener', '1.2', '3.18', '1.82', '2.26', '0.38', '1.38', '0.65', '1.54', '1', '3', '2017'),
(22, 'Reinwald Blackborn', '3.12', '1.84', '0.54', '2.06', '3.39', '3.28', '0.63', '0.27', '2', '3', '2017'),
(23, 'Beverie Fortnon', '3.35', '1.64', '3.84', '1.3', '0.11', '3.63', '0.5', '1.12', '3', '3', '2017'),
(24, 'Emmery Erswell', '0.56', '1.46', '0.8', '2.39', '2.53', '1.98', '1.41', '3.73', '2', '2', '2017'),
(25, 'Zacharie Masdin', '1.79', '0.48', '2.86', '3.92', '3.84', '1.12', '2.97', '3.16', '1', '2', '2017'),
(26, 'Colleen Barthram', '2.15', '1.17', '1.32', '1.43', '0.27', '0.17', '3.39', '3.68', '2', '1', '2017'),
(27, 'Lanny Beilby', '3.19', '0.2', '0.58', '3.6', '2.12', '0.81', '2.3', '2.06', '1', '1', '2017'),
(28, 'Emmalynn Nollet', '1.89', '0.36', '3.87', '3.72', '3.56', '3.4', '1.93', '1.81', '3', '2', '2017'),
(29, 'Ware Lynskey', '3.05', '1.95', '0.8', '0.08', '0.24', '0.84', '2.35', '1.97', '2', '1', '2017'),
(30, 'Brander Elsworth', '3.73', '1.71', '2.68', '3.94', '1.29', '3.6', '2.93', '2.08', '2', '2', '2017');

-- --------------------------------------------------------

--
-- Table structure for table `data_training`
--

CREATE TABLE `data_training` (
  `ID_DATA_TRAINING` int(11) NOT NULL,
  `NAMA_DATA_TRAINING` varchar(100) NOT NULL,
  `KB_DATA_TRAINING` varchar(5) NOT NULL,
  `PBO_DATA_TRAINING` varchar(5) NOT NULL,
  `PW_DATA_TRAINING` varchar(5) NOT NULL,
  `RPL_DATA_TRAINING` varchar(5) NOT NULL,
  `APS_DATA_TRAINING` varchar(5) NOT NULL,
  `MANPRO_DATA_TRAINING` varchar(5) NOT NULL,
  `KWU_DATA_TRAINING` varchar(5) NOT NULL,
  `TKTI_DATA_TRAINING` varchar(5) NOT NULL,
  `LABEL_DATA_TRAINING` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_training`
--

INSERT INTO `data_training` (`ID_DATA_TRAINING`, `NAMA_DATA_TRAINING`, `KB_DATA_TRAINING`, `PBO_DATA_TRAINING`, `PW_DATA_TRAINING`, `RPL_DATA_TRAINING`, `APS_DATA_TRAINING`, `MANPRO_DATA_TRAINING`, `KWU_DATA_TRAINING`, `TKTI_DATA_TRAINING`, `LABEL_DATA_TRAINING`) VALUES
(1, 'Agusvia Fikri Budiman', '2.5', '2', '3.75', '3.5', '3', '1.5', '3.5', '1', '1'),
(2, 'ABDUL GHOFAR', '4', '2.75', '3', '4', '2.5', '3', '3.75', '3.5', '2'),
(3, 'RIZKI NOVIYANTI', '3.5', '0', '3.5', '3', '3', '3', '4', '3', '1'),
(4, 'Muhammad Khairunanda Pratama', '2', '2', '2.75', '2.5', '3', '2.5', '3', '3', '2'),
(5, 'SAUSAN HIDAYAH NOVA', '3.5', '3', '4', '3.75', '3', '2.75', '3.75', '3', '1'),
(6, 'Muhammad Reza Karimi', '2', '2', '3.75', '2.75', '2.75', '3', '2.75', '2.75', '3'),
(7, 'Naomi Sekariyanti', '2', '2', '3.5', '2.75', '3.75', '2.75', '3.75', '2.75', '3'),
(8, 'Muhammad Rizal Fikri', '2', '2', '3', '3.5', '2.5', '4', '3', '3', '3'),
(9, 'Nurul Qamariah', '2.5', '2', '4', '2.5', '3.75', '2.5', '2.5', '2.75', '1'),
(10, 'REZA RAMADHAN', '3', '4', '3.5', '3.75', '2.5', '3', '3.75', '3', '2'),
(11, 'Dicky Setia Kurniawan', '2', '2', '3', '3', '2.75', '3', '1.5', '2.5', '3'),
(12, 'M Herru Setiawan', '2', '1.5', '4', '3.5', '2.75', '4', '3', '3', '2'),
(13, 'Misnariyani', '2.5', '3', '3.5', '2.75', '3.75', '3', '2.75', '3', '2'),
(14, 'Halimah', '3.5', '3.5', '3.75', '3.5', '4', '2.75', '4', '3', '2'),
(15, 'MUKARRAMAH', '3', '3.5', '2.5', '4', '3.5', '3.5', '4', '3', '1'),
(16, 'AKHMAD ROJALI', '3', '3.5', '2.5', '4', '4', '3', '3.5', '3', '1'),
(17, 'MUHAMAD REZA ANWAR', '3', '3.5', '3.5', '4', '3.5', '3.5', '4', '3', '1'),
(18, 'Triana Rifkah', '2.5', '2', '3.75', '3', '3.75', '4', '3.5', '3', '1'),
(19, 'NANDANG EKO YULIANTO', '3.5', '3.5', '2.5', '3', '4', '3', '4', '3', '1'),
(20, 'MAULIDIA ARAFAH', '2.5', '3', '3.5', '3.75', '3', '4', '3.75', '3.75', '1'),
(21, 'PUJA DARMAWAN', '3', '3.5', '3.5', '4', '3.5', '3.5', '3.5', '3.5', '2'),
(22, 'MUHAMMAD RIDHO AKBAR GAFURI DOHAMID', '3', '4', '2.5', '4', '3.5', '0', '3.5', '3', '3'),
(23, 'RYAN HIDAYAT', '3', '3.5', '2.5', '3', '3.5', '3.5', '3.5', '3.5', '1'),
(24, 'AKBAR REFORMA ERIPUTRA', '4', '4', '4', '3.75', '2.75', '3.5', '4', '2.75', '2'),
(25, 'YUDHA RAMADANU', '3', '3.5', '2', '2', '3.5', '0', '4', '3', '3'),
(26, 'YUDHA RAMADANU', '3', '3.5', '2', '2', '3.5', '0', '4', '3', '2'),
(27, 'SYARIFAH NURUL HUDA', '3', '3.5', '3.5', '4', '3.5', '4', '4', '2', '3'),
(28, 'MUHAMMAD RAIS NORHIDAYAT', '2', '2.5', '3.75', '3.5', '3.75', '4', '3', '3', '2'),
(29, 'FAHRIZAL SYAHRI RAMADHAN', '3', '3.5', '2.5', '3', '3.5', '4', '3.5', '3', '2'),
(30, 'YANUARY YULISTIAN PUTRA', '2.5', '4', '2.5', '4', '3.5', '0', '4', '3.5', '1'),
(31, 'RIKA WAHYUNI', '4', '3', '2.5', '3', '4', '4', '4', '3', '1'),
(32, 'Taufik Abrory', '3', '4', '3.75', '2.75', '3.75', '2.75', '3', '3', '2'),
(33, 'MUHAMMAD ARIF RAHMAN', '3', '3.5', '3.5', '4', '4', '3.5', '4', '3.5', '3'),
(34, 'MUHAMMAD ARIF RAHMAN', '3', '3.5', '3.5', '4', '4', '3.5', '4', '3.5', '2'),
(35, 'ISMI VIDIYA', '2.5', '4', '2.5', '4', '3.5', '3.5', '4', '3', '1'),
(36, 'FUNGKY ARYA', '4', '3.5', '3.5', '4', '4', '3.5', '3.5', '3.5', '1'),
(37, 'AKHMAD RIVALDY', '2.5', '4', '2.5', '4', '4', '3', '4', '3', '1'),
(38, 'AHMAD YUSUF', '3', '3.75', '3', '4', '3.75', '4', '4', '3', '3'),
(39, 'RAZAK MAULANA', '3.5', '4', '3.5', '4', '4', '3.5', '4', '3', '2'),
(40, 'KHAIR ZUNIAR RAHMAN', '3.5', '3.5', '3.5', '3', '4', '3.5', '4', '4', '3'),
(41, 'RYAN MAULANA', '3.5', '4', '3', '4', '4', '3.5', '4', '3.5', '3'),
(42, 'WINARTO CHANDRA', '3.75', '4', '3.75', '4', '3', '3.75', '4', '4', '3'),
(43, 'BUDI HARYADI', '3.5', '4', '2.5', '4', '4', '3.5', '4', '3.5', '1'),
(44, 'ARINA IHDA RAHMAH SYARIFAH', '2', '3.5', '3', '4', '3.75', '4', '3', '3', '1'),
(45, 'ANDIKA BENU', '3.5', '0', '0', '3.5', '0', '0', '4', '3.5', '1'),
(46, 'ANDI ERIADY', '3', '4', '3.5', '4', '4', '3.5', '4', '3.5', '2'),
(47, 'AKBAR KURNIAWAN', '3.5', '3.5', '4', '3', '4', '3.5', '4', '4', '3'),
(48, 'AKBAR KURNIAWAN', '3.5', '3.5', '4', '3', '4', '3.5', '4', '4', '2'),
(49, 'MUHAMMAD NUR RIZQAN', '2.5', '4', '3', '4', '4', '3.5', '3.5', '3.5', '1'),
(50, 'MUHAMMAD ARIF RAHMAN', '2.5', '4', '3', '4', '4', '3.5', '4', '3.5', '3'),
(51, 'MUHAMMAD TAMJIDI', '2.5', '4', '3', '4', '4', '3.5', '4', '3.5', '1'),
(52, 'IRHAM MAULANI ABDUL GANI', '3', '4', '4', '4', '3.5', '4', '4', '3', '2'),
(53, 'SUGIANTORO', '2.5', '4', '4', '4', '3.75', '3.75', '4', '2.75', '2'),
(54, 'SYARIFAH SORAYA AL BACHASIM', '2.5', '4', '4', '4', '3.5', '3.5', '4', '4', '1'),
(55, 'WENNY PUSPITA', '3', '4', '3', '4', '4', '3.5', '4', '4', '1'),
(56, 'HANI PRATIWI', '2.75', '4', '4', '3.75', '3.75', '4', '3.75', '2.75', '2'),
(57, 'PANDAN RASNA', '3', '3.75', '3.5', '4', '3.75', '4', '4', '4', '1'),
(58, 'DEWI RIZQIA NAJIPAH', '4', '4', '2.5', '4', '4', '3.5', '4', '4', '2'),
(59, 'Nia Maharani', '2.5', '3.5', '3.75', '3', '4', '4', '3', '3.5', '1'),
(60, 'M RIKO ANSHORI PRASETYA', '4', '4', '3.5', '4', '4', '3.5', '4', '4', '2'),
(61, 'NOVI RUSIANA', '4', '4', '3.5', '4', '4', '3.5', '4', '4', '1'),
(62, 'SYAHRUL ALAM SURIAZDIN', '4', '4', '3.75', '3.75', '3.75', '3.75', '4', '4', '3'),
(63, 'SYAHRUL ALAM SURIAZDIN', '4', '4', '3.75', '3.75', '3.75', '3.75', '4', '4', '1'),
(64, 'ADHA AKBAR', '2.5', '3.5', '2', '1.5', '4', '3.5', '3.5', '2.5', '1'),
(65, 'NUR LATHIFAH', '3.5', '4', '4', '4', '4', '3.5', '4', '4', '1'),
(66, 'FIRDAUS AKMAL', '4', '4', '4', '4', '4', '3.5', '4', '4', '3'),
(67, 'RIZKY AWLIA FAJRIN', '2.5', '4', '4', '4', '4', '3.5', '4', '4', '2'),
(68, 'ACHMAD MUJADDID ISLAMI', '4', '4', '4', '4', '3.75', '4', '4', '4', '2'),
(69, 'Yohanes Hendro Wicaksono', '3.5', '4', '4', '2.75', '3.75', '4', '2.5', '3.5', '2');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID_USER` int(11) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `LAST_LOGIN` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_USER`, `USERNAME`, `PASSWORD`, `LAST_LOGIN`) VALUES
(1, 'adminPK', '21232f297a57a5a743894a0e4a801fc3', '2020-05-09 17:15:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_target`
--
ALTER TABLE `data_target`
  ADD PRIMARY KEY (`ID_DATA_TARGET`);

--
-- Indexes for table `data_testing`
--
ALTER TABLE `data_testing`
  ADD PRIMARY KEY (`ID_DATA_TESTING`);

--
-- Indexes for table `data_training`
--
ALTER TABLE `data_training`
  ADD PRIMARY KEY (`ID_DATA_TRAINING`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_target`
--
ALTER TABLE `data_target`
  MODIFY `ID_DATA_TARGET` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_testing`
--
ALTER TABLE `data_testing`
  MODIFY `ID_DATA_TESTING` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `data_training`
--
ALTER TABLE `data_training`
  MODIFY `ID_DATA_TRAINING` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
