-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 24, 2020 at 03:36 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `DMS`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `no_pegawai` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('Aktif','Non Aktif','','') NOT NULL,
  `level` enum('User','Admin') NOT NULL,
  `level_akses_folder` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`no_pegawai`, `nama`, `email`, `username`, `password`, `status`, `level`, `level_akses_folder`) VALUES
(1, 'admin', 'admin@admin.com', 'admin', '4802107792c4629154657be6a5ad559f5dc6b817c5e2b05e08ec1481f0dd751b41941db6607d51aa5cb05dee71936a40ae0bc96690f6ca944712b6feae249ae4MKfuxrrJf14qyoMnHhWnXBzCzgAGquMlxjNAzECGjjY=', 'Aktif', 'Admin', '1'),
(12345, 'HR', 'HR@ptba.com', 'hr', '93bb7912fe9825fb3c5a23be1ad97865da43d392247459404027165fe582d1d3eb841fc922ec6e6b5039218666d9d6656b646d47ea2f9f3cf126be057cb4d21eEw84LP97mEHcmGJoUvVvw5D4kGmQyW/hKY7HCHNqXxs=', 'Aktif', 'User', '2'),
(56784, 'Marketing', 'marketing@ptba.com', 'marketing', '38fe3ac2c2fb0e85d19c7ba638cdb64aaca9c8996fc0356f97dcb291bc90b0617bcd3bf8a13bf0796a7b84502463531ccd337f3bcb9a15f5c7ea74ef48cea7faSotdkBnVEJuJeNRTvRJyHEij7ys+9bR14B8lrvMhnIA=', 'Aktif', 'User', '3'),
(987654, 'Sales', 'salesa@ptba.com', 'sales', 'cd17a98c8b180e50f345fdd6b67df6265c400196844b74f06c46015005cdb74e46b719285aec712541dcd870f736e4d335d0782a835b6760b7fab1df3071d9cfughRwuOdYOrKAb/4NqfbyC924s60BB2yjo5G6jl2dwE=', 'Aktif', 'User', '4');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id_file` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `dibaca` int(11) NOT NULL,
  `folder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id_file`, `file`, `dibaca`, `folder`) VALUES
(1, 'BPS_286_2004.pdf', 3, 1),
(2, 'AK max calon PK.pdf', 5, 1),
(3, '15-PETUNJUK TEKNIS ORGANISASI DAN TATA KERJA.pdf', 7, 11);

-- --------------------------------------------------------

--
-- Table structure for table `folder`
--

CREATE TABLE `folder` (
  `id_folder` int(11) NOT NULL,
  `parent` varchar(11) NOT NULL,
  `position` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `folder`
--

INSERT INTO `folder` (`id_folder`, `parent`, `position`, `nama`) VALUES
(1, '#', 1, 'Root'),
(5, '4', 0, 'ganti nama'),
(8, '#', 0, 'Sales'),
(9, '#', 0, 'HR'),
(10, '#', 0, 'Marketing'),
(11, '#', 0, 'Umum'),
(14, '1', 0, 'folder baru'),
(15, '14', 0, 'node'),
(16, '14', 1, 'leaf');

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id_hak_akses` int(11) NOT NULL,
  `id_level_akses` int(11) NOT NULL,
  `id_folder_root` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id_hak_akses`, `id_level_akses`, `id_folder_root`) VALUES
(22, 1, 1),
(24, 2, 11),
(25, 2, 9),
(26, 3, 10),
(27, 3, 11),
(28, 3, 8),
(29, 4, 8),
(30, 4, 11),
(31, 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `level_akses`
--

CREATE TABLE `level_akses` (
  `id_level` int(11) NOT NULL,
  `level` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_akses`
--

INSERT INTO `level_akses` (`id_level`, `level`, `keterangan`) VALUES
(1, 'Admin', 'Level akses tertinggi'),
(2, 'HR', 'Level Akses Bagian HR'),
(3, 'Marketing', 'Level Akses Bagian Marketing'),
(4, 'Sales', 'Level akses bagian sales');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`no_pegawai`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id_file`),
  ADD KEY `folder` (`folder`);

--
-- Indexes for table `folder`
--
ALTER TABLE `folder`
  ADD PRIMARY KEY (`id_folder`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id_hak_akses`),
  ADD KEY `level_akses` (`id_level_akses`),
  ADD KEY `relasi_folder` (`id_folder_root`);

--
-- Indexes for table `level_akses`
--
ALTER TABLE `level_akses`
  ADD PRIMARY KEY (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `folder`
--
ALTER TABLE `folder`
  MODIFY `id_folder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id_hak_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `level_akses`
--
ALTER TABLE `level_akses`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `relasi` FOREIGN KEY (`folder`) REFERENCES `folder` (`id_folder`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD CONSTRAINT `level_akses` FOREIGN KEY (`id_level_akses`) REFERENCES `level_akses` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relasi_folder` FOREIGN KEY (`id_folder_root`) REFERENCES `folder` (`id_folder`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
