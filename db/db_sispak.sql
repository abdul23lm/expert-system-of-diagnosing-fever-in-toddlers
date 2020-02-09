-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2019 at 10:51 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sispak`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_arahan`
--

CREATE TABLE `tbl_arahan` (
  `no_arahan` int(4) NOT NULL,
  `id_kesimpulan` varchar(4) NOT NULL,
  `id_identifikasi` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_arahan`
--

INSERT INTO `tbl_arahan` (`no_arahan`, `id_kesimpulan`, `id_identifikasi`) VALUES
(1, 'K10', 'A20'),
(2, 'K20', 'B10'),
(3, 'K30', 'B30'),
(4, 'K40', 'C10'),
(5, 'K50', 'C20'),
(6, 'K60', 'C30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aturan_tidak`
--

CREATE TABLE `tbl_aturan_tidak` (
  `id_aturan_tidak` int(3) UNSIGNED ZEROFILL NOT NULL,
  `satu` varchar(4) NOT NULL,
  `dua` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_aturan_tidak`
--

INSERT INTO `tbl_aturan_tidak` (`id_aturan_tidak`, `satu`, `dua`) VALUES
(000, 'C30', 'B30'),
(001, 'A10', 'A20'),
(002, 'A20', 'B10'),
(003, 'B10', 'B20'),
(004, 'B20', 'B30'),
(005, 'B30', 'B20'),
(006, 'C10', 'C20'),
(007, 'C20', 'C30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aturan_ya`
--

CREATE TABLE `tbl_aturan_ya` (
  `id_aturan_ya` int(3) UNSIGNED ZEROFILL NOT NULL,
  `satu` varchar(4) NOT NULL,
  `dua` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_aturan_ya`
--

INSERT INTO `tbl_aturan_ya` (`id_aturan_ya`, `satu`, `dua`) VALUES
(001, 'B10', 'A10'),
(002, 'C10', 'B20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_identifikasi`
--

CREATE TABLE `tbl_identifikasi` (
  `id_identifikasi` varchar(4) NOT NULL,
  `pertanyaan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_identifikasi`
--

INSERT INTO `tbl_identifikasi` (`id_identifikasi`, `pertanyaan`) VALUES
('A10', 'Apakah balita anda kurang dari 5 tahun?'),
('A20', 'Apakah balita anda lebih dari 5 tahun?'),
('B10', 'Apakah balita anda memiliki suhu diatas 39 derajat celcius?'),
('B20', 'Apakah balita anda memiliki suhu diantara 37.5 derajat celcius sampai kurang dari 39 derajat celcius?'),
('B30', 'Apakah balita anda memiliki suhu dibawah 37.5 derajat celcius sampai 36 derajat celcius?'),
('C10', 'Apakah balita anda memiliki trombosit darah dibawah 100.000 (mcL)?'),
('C20', 'Apakah lidah balita anda berwarna putih?'),
('C30', 'Apakah lidah balita anda berwarna merah muda?');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kamus`
--

CREATE TABLE `tbl_kamus` (
  `id_kamus` int(10) UNSIGNED ZEROFILL NOT NULL,
  `kata` varchar(50) NOT NULL,
  `keterangan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kamus`
--

INSERT INTO `tbl_kamus` (`id_kamus`, `kata`, `keterangan`) VALUES
(0000000023, 'Balita', 'Bawah Lima Tahun atau sering disingkat sebagai Balita merupakan salah satu periode usia manusia setelah bayi dengan rentang usia dimulai dari dua sampai dengan lima tahun.'),
(0000000024, 'Demam', 'Demam adalah kondisi balita ketika suhu tubuh memiliki suhu diantara 37.5 derajat celcius sampai kurang dari 39 derajat celcius'),
(0000000025, 'Kejang-Kejang', 'Kejang-Kejang adalah kondisi balita ketika memiliki suhu diatas 39 derajat celcius'),
(0000000026, 'Demam Berdarah', 'Demam berdarah adalah kondisi tubuh balita yang mengalami demam serta memiliki trombosit darah dibawah 100.000 (mcL)'),
(0000000027, 'Tipes', 'Tipes adalah kondisi tubuh balita yang mengalami demam serta lidah berwarna putih'),
(0000000028, 'Flu', 'Flu adalah kondisi tubuh balita yang mengalami demam serta lidah berwarna merah muda');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kesimpulan`
--

CREATE TABLE `tbl_kesimpulan` (
  `id_kesimpulan` varchar(4) NOT NULL,
  `kesimpulan` varchar(200) NOT NULL,
  `solusi` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kesimpulan`
--

INSERT INTO `tbl_kesimpulan` (`id_kesimpulan`, `kesimpulan`, `solusi`) VALUES
('K10', 'Mohon maaf sasaran aplikasi ini hanya untuk balita dibawah 5 tahun ', 'Silahkan coba aplikasi lain'),
('K20', 'Kondisi balita anda sekarang mengalami kejang-kejang', 'Segera bawa balita anda ke dokter'),
('K30', 'Kondisi tubuh balita anda normal', 'Tetap perhatikan kondisi balita anda'),
('K40', 'Balita anda teridentifikasi penyakit demam berdarah', 'Segera bawa balita anda ke dokter'),
('K50', 'Balita anda teridentifikasi penyakit tipes', 'Segera bawa balita anda ke dokter'),
('K60', 'Balita anda teridentifikasi penyakit flu', 'Segera bawa balita anda ke dokter');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `id_pengguna` int(3) NOT NULL,
  `nm_pengguna` varchar(50) NOT NULL,
  `sandi` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nm_lengkap` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`id_pengguna`, `nm_pengguna`, `sandi`, `email`, `nm_lengkap`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'abdul23lm@gmail.com', 'AbdulLM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_temp`
--

CREATE TABLE `tbl_temp` (
  `id_identifikasi` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_temp`
--

INSERT INTO `tbl_temp` (`id_identifikasi`) VALUES
('A10'),
('B10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_arahan`
--
ALTER TABLE `tbl_arahan`
  ADD PRIMARY KEY (`no_arahan`),
  ADD KEY `id_identifikasi` (`id_kesimpulan`),
  ADD KEY `id_kesimpulan` (`id_identifikasi`),
  ADD KEY `id_kesimpulan_2` (`id_kesimpulan`),
  ADD KEY `id_identifikasi_2` (`id_identifikasi`);

--
-- Indexes for table `tbl_aturan_tidak`
--
ALTER TABLE `tbl_aturan_tidak`
  ADD PRIMARY KEY (`id_aturan_tidak`);

--
-- Indexes for table `tbl_aturan_ya`
--
ALTER TABLE `tbl_aturan_ya`
  ADD PRIMARY KEY (`id_aturan_ya`);

--
-- Indexes for table `tbl_identifikasi`
--
ALTER TABLE `tbl_identifikasi`
  ADD PRIMARY KEY (`id_identifikasi`);

--
-- Indexes for table `tbl_kamus`
--
ALTER TABLE `tbl_kamus`
  ADD PRIMARY KEY (`id_kamus`);

--
-- Indexes for table `tbl_kesimpulan`
--
ALTER TABLE `tbl_kesimpulan`
  ADD PRIMARY KEY (`id_kesimpulan`);

--
-- Indexes for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tbl_temp`
--
ALTER TABLE `tbl_temp`
  ADD PRIMARY KEY (`id_identifikasi`),
  ADD KEY `id_identifikasi` (`id_identifikasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_arahan`
--
ALTER TABLE `tbl_arahan`
  MODIFY `no_arahan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_kamus`
--
ALTER TABLE `tbl_kamus`
  MODIFY `id_kamus` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `id_pengguna` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
