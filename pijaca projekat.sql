-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2024 at 11:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pijaca`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `korisnicko_ime` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `broj_telefona` varchar(20) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `korisnicko_ime`, `email`, `broj_telefona`, `lozinka`, `created_at`) VALUES
(1, 'filipg', 'fgeratovic03@gmail.com', '0621466115', 'Drenovac1', '2024-04-25 21:56:30'),
(2, 'filipg', 'fgeratovic03@gmail.com', '0621466115', 'Drenovac1', '2024-04-25 21:57:22'),
(3, 'petarp', 'petarpetrovic@gmail.com', '06012345647', 'OetarPetrovic123', '2024-04-25 22:01:03'),
(4, 'asdasdas', 'fgeratovic@gmail.com', '06214616161', 'pROBA1234', '2024-04-25 22:03:23'),
(5, 'proba1', 'petarpetrovic@gmail.com', '0621466115', 'proba2345', '2024-04-25 22:06:06');

-- --------------------------------------------------------

--
-- Table structure for table `proizvodi`
--

CREATE TABLE `proizvodi` (
  `id` int(11) NOT NULL,
  `ime` varchar(255) DEFAULT NULL,
  `cena` decimal(10,2) DEFAULT NULL,
  `kategorija` varchar(255) DEFAULT NULL,
  `slika` varchar(255) DEFAULT NULL,
  `jedinica` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proizvodi`
--

INSERT INTO `proizvodi` (`id`, `ime`, `cena`, `kategorija`, `slika`, `jedinica`) VALUES
(1, 'Jabuke', 90.00, 'Voće', 'proizvodi/jabuke.jpg', 'kg'),
(2, 'Banane', 150.00, 'Voće', 'proizvodi/banane.jpg', 'kg'),
(3, 'Paradajz', 200.00, 'Povrće', 'proizvodi/paradajz.jpg', 'kg'),
(4, 'Krastavci', 70.00, 'Povrće', 'proizvodi/krastavac.jpg', 'kom'),
(5, 'Krompir', 100.00, 'Povrće', 'proizvodi/krompir.jpg', 'kg'),
(6, 'Luk', 220.00, 'Povrće', 'proizvodi/luk.jpg', 'kg'),
(7, 'Paprika', 100.00, 'Povrće', 'proizvodi/paprika.jpg', 'kg'),
(8, 'Ljuta paprika', 60.00, 'Povrće', 'proizvodi/ljuta paprika.jpg', 'kom'),
(9, 'Jaja', 15.00, 'Hrana', 'proizvodi/jaja.jpg', 'kom'),
(10, 'Jagode', 250.00, 'Voće', 'proizvodi/jagode.jpg', 'kg'),
(11, 'Limun', 60.00, 'Voće', 'proizvodi/limun.jpg', 'kg'),
(12, 'Groždje', 200.00, 'Voće', 'proizvodi/grozdje.jpg', 'kg'),
(13, 'Kajmak', 900.00, 'Mlečni proizvodi', 'proizvodi/kajmak.jpg', 'kg'),
(14, 'Sir', 700.00, 'Mlečni proizvodi', 'proizvodi/sir.jpg', 'kg'),
(15, 'Kobasica', 1100.00, 'Hrana', 'proizvodi/kobasica.jpg', 'kg'),
(16, 'Slanina', 850.00, 'Hrana', 'proizvodi/slanina.jpg', 'kg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
