-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 11, 2020 at 01:52 PM
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
(987654, 'Sales', 'sales@ptba.com', 'sales', '9cabd82ce5db77121201a3820bd6ad109f4f652b1ac0a2d4ad86e8acf3ca6a653c8086a7d92b8fedd93dbd3f957f47d5987feeb5bc8ad435798bcf6c23fecfbepo+77xbTgyHPM8G8r7OR+OpOBr+DhSAe2k1Q7cfM2Bg=', 'Aktif', 'User', '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`no_pegawai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
