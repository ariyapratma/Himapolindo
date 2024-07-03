-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2024 at 04:59 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `himapolindo`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul_artikel` varchar(255) NOT NULL,
  `thumbnail_artikel` varchar(10000) NOT NULL,
  `konten_artikel` text NOT NULL,
  `tanggal_artikel` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `calek`
--

CREATE TABLE `calek` (
  `id_calek` int(11) NOT NULL,
  `judul_calek` varchar(255) NOT NULL,
  `thumbnail_calek` varchar(10000) NOT NULL,
  `konten_calek` text NOT NULL,
  `tanggal_calek` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diesnatalis`
--

CREATE TABLE `diesnatalis` (
  `id_diesnatalis` int(11) NOT NULL,
  `judul_diesnatalis` varchar(255) NOT NULL,
  `thumbnail_diesnatalis` varchar(10000) NOT NULL,
  `konten_diesnatalis` text NOT NULL,
  `tanggal_diesnatalis` date NOT NULL DEFAULT current_timestamp(),
  `views` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diesnatalis`
--

INSERT INTO `diesnatalis` (`id_diesnatalis`, `judul_diesnatalis`, `thumbnail_diesnatalis`, `konten_diesnatalis`, `tanggal_diesnatalis`, `views`) VALUES
(2, 'Dies Natalis IPB', '../../assets_dashboard/images/uploads/Logo-IPB-baru.png', 'IPB merayakan dies natalisnya yang ke-61 Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2024-06-29', 7),
(3, 'Dies Natalis Sekolah Vokasi IPB', '../../assets_dashboard/images/uploads/logo_sv_ipb-removebg-preview.png', 'Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2024-06-29', 6),
(4, 'ABC', '../../assets_dashboard/images/uploads/Spider-Man in the Rain wallpaper.jpeg', 'Lorem Ipsum', '2024-06-29', 3);

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `judul_galeri` varchar(255) NOT NULL,
  `thumbnail_galeri` varchar(10000) NOT NULL,
  `konten_galeri` text NOT NULL,
  `tanggal_galeri` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komentar_artikel`
--

CREATE TABLE `komentar_artikel` (
  `id_komentar` int(11) NOT NULL,
  `id_artikel` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `komentar` text DEFAULT NULL,
  `tanggal_komentar` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komentar_calek`
--

CREATE TABLE `komentar_calek` (
  `id_komentar` int(11) NOT NULL,
  `id_calek` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `komentar` text DEFAULT NULL,
  `tanggal_komentar` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komentar_diesnatalis`
--

CREATE TABLE `komentar_diesnatalis` (
  `id_komentar` int(11) NOT NULL,
  `id_diesnatalis` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `komentar` text DEFAULT NULL,
  `tanggal_komentar` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komentar_diesnatalis`
--

INSERT INTO `komentar_diesnatalis` (`id_komentar`, `id_diesnatalis`, `nama`, `komentar`, `tanggal_komentar`) VALUES
(1, 2, 'Andhika Pratama Putra', 'Wahh selamat dies natalis kampusku tercinta', '2024-06-29 09:20:48'),
(2, 2, 'Arif Satria', 'Perkenalkan saya rektor IPB University, terima kasih atas ucapannya guys', '2024-06-29 09:25:04'),
(3, 3, 'Andhika Pratama Putra', 'Haloo, aku dari TPL 58, salken ges', '2024-06-29 09:37:10'),
(4, 2, 'Prabowo Subianto', 'Selamat', '2024-06-29 11:36:23'),
(5, 3, 'Yanto', 'Bismillah tahun ini TPL 61', '2024-06-29 11:59:51'),
(6, 2, 'Anies Baswedan', 'Semoga berkah IPB untuk Indonesia #salamperubahan', '2024-06-29 12:00:40'),
(7, 2, 'Ganjar Pranowo', 'Wong saya suka kok', '2024-06-29 12:00:52'),
(8, 4, 'Andhika Pratama Putra', 'Tes', '2024-06-29 14:06:39');

-- --------------------------------------------------------

--
-- Table structure for table `komentar_galeri`
--

CREATE TABLE `komentar_galeri` (
  `id_komentar` int(11) NOT NULL,
  `id_galeri` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `komentar` text DEFAULT NULL,
  `tanggal_komentar` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komentar_kongres`
--

CREATE TABLE `komentar_kongres` (
  `id_komentar` int(11) NOT NULL,
  `id_kongres` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `komentar` text DEFAULT NULL,
  `tanggal_komentar` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komentar_rakernas`
--

CREATE TABLE `komentar_rakernas` (
  `id_komentar` int(11) NOT NULL,
  `id_rakernas` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `komentar` text DEFAULT NULL,
  `tanggal_komentar` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komentar_ravelnas`
--

CREATE TABLE `komentar_ravelnas` (
  `id_komentar` int(11) NOT NULL,
  `id_ravelnas` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `komentar` text DEFAULT NULL,
  `tanggal_komentar` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kongres`
--

CREATE TABLE `kongres` (
  `id_kongres` int(11) NOT NULL,
  `judul_kongres` varchar(255) NOT NULL,
  `thumbnail_kongres` varchar(10000) NOT NULL,
  `konten_kongres` text NOT NULL,
  `tanggal_kongres` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `email`, `username`, `role`, `password`) VALUES
(1, 'admin@gmail.com', 'administrator', 'admin', 'himapolindo');

-- --------------------------------------------------------

--
-- Table structure for table `ravelnas`
--

CREATE TABLE `ravelnas` (
  `id_ravelnas` int(11) NOT NULL,
  `judul_ravelnas` varchar(255) NOT NULL,
  `thumbail_ravelnas` varchar(10000) NOT NULL,
  `konten_ravelnas` text NOT NULL,
  `tanggal_ravelnas` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rekernas`
--

CREATE TABLE `rekernas` (
  `id_rakernas` int(11) NOT NULL,
  `judul_rakernas` varchar(255) NOT NULL,
  `thumbnail_rakernas` varchar(10000) NOT NULL,
  `konten_rakernas` text NOT NULL,
  `tanggal_rakernas` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `calek`
--
ALTER TABLE `calek`
  ADD PRIMARY KEY (`id_calek`);

--
-- Indexes for table `diesnatalis`
--
ALTER TABLE `diesnatalis`
  ADD PRIMARY KEY (`id_diesnatalis`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `komentar_artikel`
--
ALTER TABLE `komentar_artikel`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_artikel` (`id_artikel`);

--
-- Indexes for table `komentar_calek`
--
ALTER TABLE `komentar_calek`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_calek` (`id_calek`);

--
-- Indexes for table `komentar_diesnatalis`
--
ALTER TABLE `komentar_diesnatalis`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_diesnatalis` (`id_diesnatalis`);

--
-- Indexes for table `komentar_galeri`
--
ALTER TABLE `komentar_galeri`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_galeri` (`id_galeri`);

--
-- Indexes for table `komentar_kongres`
--
ALTER TABLE `komentar_kongres`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_kongres` (`id_kongres`);

--
-- Indexes for table `komentar_rakernas`
--
ALTER TABLE `komentar_rakernas`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_rakernas` (`id_rakernas`);

--
-- Indexes for table `komentar_ravelnas`
--
ALTER TABLE `komentar_ravelnas`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_ravelnas` (`id_ravelnas`);

--
-- Indexes for table `kongres`
--
ALTER TABLE `kongres`
  ADD PRIMARY KEY (`id_kongres`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `ravelnas`
--
ALTER TABLE `ravelnas`
  ADD PRIMARY KEY (`id_ravelnas`);

--
-- Indexes for table `rekernas`
--
ALTER TABLE `rekernas`
  ADD PRIMARY KEY (`id_rakernas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `calek`
--
ALTER TABLE `calek`
  MODIFY `id_calek` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diesnatalis`
--
ALTER TABLE `diesnatalis`
  MODIFY `id_diesnatalis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komentar_artikel`
--
ALTER TABLE `komentar_artikel`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komentar_calek`
--
ALTER TABLE `komentar_calek`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komentar_diesnatalis`
--
ALTER TABLE `komentar_diesnatalis`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `komentar_galeri`
--
ALTER TABLE `komentar_galeri`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komentar_kongres`
--
ALTER TABLE `komentar_kongres`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komentar_rakernas`
--
ALTER TABLE `komentar_rakernas`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komentar_ravelnas`
--
ALTER TABLE `komentar_ravelnas`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kongres`
--
ALTER TABLE `kongres`
  MODIFY `id_kongres` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ravelnas`
--
ALTER TABLE `ravelnas`
  MODIFY `id_ravelnas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekernas`
--
ALTER TABLE `rekernas`
  MODIFY `id_rakernas` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar_artikel`
--
ALTER TABLE `komentar_artikel`
  ADD CONSTRAINT `komentar_artikel_ibfk_1` FOREIGN KEY (`id_artikel`) REFERENCES `artikel` (`id_artikel`);

--
-- Constraints for table `komentar_calek`
--
ALTER TABLE `komentar_calek`
  ADD CONSTRAINT `komentar_calek_ibfk_1` FOREIGN KEY (`id_calek`) REFERENCES `calek` (`id_calek`);

--
-- Constraints for table `komentar_diesnatalis`
--
ALTER TABLE `komentar_diesnatalis`
  ADD CONSTRAINT `komentar_diesnatalis_ibfk_1` FOREIGN KEY (`id_diesnatalis`) REFERENCES `diesnatalis` (`id_diesnatalis`);

--
-- Constraints for table `komentar_galeri`
--
ALTER TABLE `komentar_galeri`
  ADD CONSTRAINT `komentar_galeri_ibfk_1` FOREIGN KEY (`id_galeri`) REFERENCES `galeri` (`id_galeri`);

--
-- Constraints for table `komentar_kongres`
--
ALTER TABLE `komentar_kongres`
  ADD CONSTRAINT `komentar_kongres_ibfk_1` FOREIGN KEY (`id_kongres`) REFERENCES `kongres` (`id_kongres`);

--
-- Constraints for table `komentar_rakernas`
--
ALTER TABLE `komentar_rakernas`
  ADD CONSTRAINT `komentar_rakernas_ibfk_1` FOREIGN KEY (`id_rakernas`) REFERENCES `rekernas` (`id_rakernas`);

--
-- Constraints for table `komentar_ravelnas`
--
ALTER TABLE `komentar_ravelnas`
  ADD CONSTRAINT `komentar_ravelnas_ibfk_1` FOREIGN KEY (`id_ravelnas`) REFERENCES `ravelnas` (`id_ravelnas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
