-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 06, 2023 at 03:07 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carsshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `poloznanauctence`
--

CREATE TABLE `poloznanauctence` (
  `id` int(11) NOT NULL,
  `idzbozi` int(11) NOT NULL,
  `mnoztvi` int(11) NOT NULL,
  `aktualniCena` int(11) NOT NULL,
  `iductenka` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `uctenka`
--

CREATE TABLE `uctenka` (
  `id` int(11) NOT NULL,
  `iduzivatele` int(11) NOT NULL,
  `datum` date NOT NULL,
  `vysCena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Role` enum('1','2') NOT NULL DEFAULT '1',
  `Phone` varchar(9) NOT NULL,
  `Email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `Role`, `Phone`, `Email`) VALUES
(2, 'honza', '$2y$10$K6xJpbDa53kWmRNxFx3S6eJvN/8uN09mvcw.ZrlrVbst7c1KPFXRC', '2', '', ''),
(5, 'radim', '$2y$10$hsxxkFmctKeua4DyuR4QeuePUpZ0A4E.8VNFYuJLC6xZDCfWEqTZ2', '2', '', ''),
(6, 'sdf', '$2y$10$V/zPSpYxbgXmVw70vKWEM.59ZVrwU3Qd/5y27NqvwMOWABPP.HoBy', '1', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `zbozi`
--

CREATE TABLE `zbozi` (
  `id` int(11) NOT NULL,
  `nazev` varchar(50) NOT NULL,
  `typ` varchar(30) NOT NULL,
  `cena` int(11) NOT NULL,
  `pocet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `poloznanauctence`
--
ALTER TABLE `poloznanauctence`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idzbozi` (`idzbozi`),
  ADD KEY `iductenka` (`iductenka`);

--
-- Indexes for table `uctenka`
--
ALTER TABLE `uctenka`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iduzivatele` (`iduzivatele`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zbozi`
--
ALTER TABLE `zbozi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `poloznanauctence`
--
ALTER TABLE `poloznanauctence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uctenka`
--
ALTER TABLE `uctenka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `zbozi`
--
ALTER TABLE `zbozi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `poloznanauctence`
--
ALTER TABLE `poloznanauctence`
  ADD CONSTRAINT `poloznanauctence_ibfk_1` FOREIGN KEY (`idzbozi`) REFERENCES `zbozi` (`id`),
  ADD CONSTRAINT `poloznanauctence_ibfk_2` FOREIGN KEY (`iductenka`) REFERENCES `uctenka` (`id`);

--
-- Constraints for table `uctenka`
--
ALTER TABLE `uctenka`
  ADD CONSTRAINT `uctenka_ibfk_1` FOREIGN KEY (`iduzivatele`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
