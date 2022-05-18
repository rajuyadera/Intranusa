-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 18, 2022 at 01:16 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Intranusa`
--

-- --------------------------------------------------------

--
-- Table structure for table `cctv`
--

CREATE TABLE `cctv` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `harga` int(50) NOT NULL,
  `specifikasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cctv`
--

INSERT INTO `cctv` (`id`, `judul`, `harga`, `specifikasi`) VALUES
(31, 'ip cam ', 3, 'ip cam diskon'),
(32, 'paket hemat', 1, '2 Kamera 1 Outdoor HD 2MP 1 Indoor HD 2MP 1 DVR 4 Channel 1 HDD 250 GB 2 Unit Adaptor'),
(33, 'paket1', 1, '2 Kamera 1 Outdoor HD 2MP 1 Indoor HD 2MP 1 DVR 4 Channel 1 HDD 250 GB 2 Unit Adaptor'),
(34, 'paket2', 2, '2 Kamera 1 Outdoor HD 2MP 1 Indoor HD 2MP 1 DVR 4 Channel 1 HDD 250 GB 2 Unit Adaptor'),
(35, 'paket3', 5, '2 Kamera 1 Outdoor HD 2MP 1 Indoor HD 2MP 1 DVR 4 Channel 1 HDD 250 GB 2 Unit Adaptor'),
(36, 'paket5', 5, '2 Kamera 1 Outdoor HD 2MP 1 Indoor HD 2MP 1 DVR 4 Channel 1 HDD 250 GB 2 Unit Adaptor'),
(37, 'paket6', 2, '2 Kamera 1 Outdoor HD 2MP 1 Indoor HD 2MP 1 DVR 4 Channel 1 HDD 250 GB 2 Unit Adaptor'),
(38, 'paket7', 3, '2 Kamera 1 Outdoor HD 2MP 1 Indoor HD 2MP 1 DVR 4 Channel 1 HDD 250 GB 2 Unit Adaptor'),
(39, 'paket8', 1, '2 Kamera 1 Outdoor HD 2MP 1 Indoor HD 2MP 1 DVR 4 Channel 1 HDD 250 GB 2 Unit Adaptor'),
(40, 'paket hemat2', 1, '2 Kamera 1 Outdoor HD 2MP 1 Indoor HD 2MP 1 DVR 4 Channel 1 HDD 250 GB 2 Unit Adaptor');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `it`
--

CREATE TABLE `it` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `it`
--

INSERT INTO `it` (`id`, `judul`, `keterangan`) VALUES
(2, 'mikrotik', 'aLorem ipsum dolor, sit amet consectetur adipisicing elit. Itaque voluptatum facilis quos totam? Voluptatum dolorem dicta unde obcaecati reiciendis ');

-- --------------------------------------------------------

--
-- Table structure for table `panel`
--

CREATE TABLE `panel` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `harga` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `panel`
--

INSERT INTO `panel` (`id`, `judul`, `harga`) VALUES
(5, 'solar home system', 3);

-- --------------------------------------------------------

--
-- Table structure for table `portofolio`
--

CREATE TABLE `portofolio` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `portofolio`
--

INSERT INTO `portofolio` (`id`, `judul`, `alamat`, `keterangan`, `gambar`) VALUES
(8, 'Installasi cctv', 'bogor', 'iasfsdfsd', '628222f9c3c7a.jpg'),
(9, 'Installasi panel', 'dramaga, bogor', 'asdasdadwadadawdawdawd', '6283aa3ab0a04.jpg'),
(10, 'Installasi cctv', 'Kebun Raya Bogor', 'Pemasangan CCTV 8 Kamera Indoor dan Outdoor 3 MP', '6283aafd167b9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sosmed`
--

CREATE TABLE `sosmed` (
  `id` int(11) NOT NULL,
  `instagram` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `code`) VALUES
(27, 'raju', 'rajuyaderaa@gmail.com', '03c017f682085142f3b60f56673e22dc', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cctv`
--
ALTER TABLE `cctv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `it`
--
ALTER TABLE `it`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panel`
--
ALTER TABLE `panel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portofolio`
--
ALTER TABLE `portofolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sosmed`
--
ALTER TABLE `sosmed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cctv`
--
ALTER TABLE `cctv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `it`
--
ALTER TABLE `it`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `panel`
--
ALTER TABLE `panel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `portofolio`
--
ALTER TABLE `portofolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sosmed`
--
ALTER TABLE `sosmed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
