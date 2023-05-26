-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Ned 21. kvě 2023, 13:50
-- Verze serveru: 10.4.27-MariaDB
-- Verze PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `carsshop`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `poloznanauctence`
--

CREATE TABLE `poloznanauctence` (
  `id` int(11) NOT NULL,
  `idzbozi` int(11) NOT NULL,
  `mnoztvi` int(11) NOT NULL,
  `aktualniCena` int(11) NOT NULL,
  `iductenka` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `uctenka`
--

CREATE TABLE `uctenka` (
  `id` int(11) NOT NULL,
  `iduzivatele` int(11) NOT NULL,
  `datum` date NOT NULL,
  `vysCena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Role` enum('1','2') NOT NULL DEFAULT '1',
  `Phone` varchar(9) NOT NULL,
  `Email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `Role`, `Phone`, `Email`) VALUES
(2, 'honza', '$2y$10$K6xJpbDa53kWmRNxFx3S6eJvN/8uN09mvcw.ZrlrVbst7c1KPFXRC', '2', '', ''),
(5, 'radim', '$2y$10$hsxxkFmctKeua4DyuR4QeuePUpZ0A4E.8VNFYuJLC6xZDCfWEqTZ2', '2', '', ''),
(6, 'sdf', '$2y$10$V/zPSpYxbgXmVw70vKWEM.59ZVrwU3Qd/5y27NqvwMOWABPP.HoBy', '1', '', '');

-- --------------------------------------------------------

--
-- Struktura tabulky `zbozi`
--

CREATE TABLE `zbozi` (
  `id` int(11) NOT NULL,
  `nazev` varchar(50) NOT NULL,
  `typ` varchar(30) NOT NULL,
  `cena` int(11) NOT NULL,
  `pocet` int(11) NOT NULL,
  `pic` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `zbozi`
--

INSERT INTO `zbozi` (`id`, `nazev`, `typ`, `cena`, `pocet`, `pic`) VALUES
(7, 'přední nárazník', 'dil', 6000, 3, 'predni-naraznik-bmw-f30-f31-m3-style-11-pdc.jpg'),
(8, 'pneu', 'dil', 3000, 10, 'PIC-57A601012DJ-1.jpg'),
(9, 'Mustang', 'sportovni', 4500000, 1, 'sportovní1.jpg'),
(10, 'Supra', 'sportovni', 2000000, 3, 'sportovní2.jpg'),
(11, 'Dodge', 'sportovni', 1500000, 3, 'sportovní4.jpg'),
(12, 'Gtr', 'sportovni', 2100000, 5, 'sportovní3.jpg'),
(13, 'zrcátko', 'dil', 2000, 20, 'zrcátko.jpg'),
(14, 'man', 'dodavka', 350000, 3, 'dodavka3.jpg'),
(15, 'iveco', 'dodavka', 400000, 1, 'dodavka2.jpg'),
(16, 'mercedes', 'dodavka', 800000, 2, 'dodavka4.png'),
(17, 'fiat', 'dodavka', 160000, 5, 'dodavka1.jpg'),
(18, 'pneu', 'dil', 1000, 30, 'výfuk.jpg'),
(19, 'střešní nosič', 'doplnek', 1500, 20, 'nosiče.jpg'),
(20, 'spoiker', 'doplnek', 2500, 10, 'spoiler.jpg'),
(21, 'podsvícení', 'doplnek', 1000, 40, 'ledPodsvícení.jpg'),
(22, 'tažná koule', 'doplnek', 3500, 12, 'tažné.jpg'),
(23, 'ford', 'osobni', 200000, 3, 'ford.jpg'),
(24, 'renault', 'osobni', 300000, 2, 'renault.jpg'),
(25, 'peugeot', 'osobni', 300000, 2, 'peugeot.jpg'),
(26, 'mazda', 'osobni', 500000, 3, 'mazda.jpg');

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `poloznanauctence`
--
ALTER TABLE `poloznanauctence`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idzbozi` (`idzbozi`),
  ADD KEY `iductenka` (`iductenka`);

--
-- Indexy pro tabulku `uctenka`
--
ALTER TABLE `uctenka`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iduzivatele` (`iduzivatele`);

--
-- Indexy pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `zbozi`
--
ALTER TABLE `zbozi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `poloznanauctence`
--
ALTER TABLE `poloznanauctence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `uctenka`
--
ALTER TABLE `uctenka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pro tabulku `zbozi`
--
ALTER TABLE `zbozi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `poloznanauctence`
--
ALTER TABLE `poloznanauctence`
  ADD CONSTRAINT `poloznanauctence_ibfk_1` FOREIGN KEY (`idzbozi`) REFERENCES `zbozi` (`id`),
  ADD CONSTRAINT `poloznanauctence_ibfk_2` FOREIGN KEY (`iductenka`) REFERENCES `uctenka` (`id`);

--
-- Omezení pro tabulku `uctenka`
--
ALTER TABLE `uctenka`
  ADD CONSTRAINT `uctenka_ibfk_1` FOREIGN KEY (`iduzivatele`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
