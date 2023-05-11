-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 11, 2023 at 07:18 PM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

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
  `vysCena` int(11) NOT NULL,
  `adresa` text NOT NULL
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
(6, 'sdf', '$2y$10$V/zPSpYxbgXmVw70vKWEM.59ZVrwU3Qd/5y27NqvwMOWABPP.HoBy', '1', '', ''),
(7, 'RadimWithParams', '$2y$10$rjMeJfIHyIvMdGH97do2l.YGvAz1ue.SHPkSWTTatfjUKy9aXbsM2', '1', '666666666', 'hruska@hell.com'),
(8, 'r', '$2y$10$A429mIuOU3wsJHr7g/g7Ze.Dg1hy4TFuHQ9yK5n8TLwVGKu8UIvgG', '1', '333333333', 'dsf'),
(9, 'a', '$2y$10$jNAFDmPSyQN96pBsVbbpPu3PZBzpIu2QllifLKzd0O62w4FdzvK4u', '2', '666666666', 'dfs');

-- --------------------------------------------------------

--
-- Table structure for table `zbozi`
--

CREATE TABLE `zbozi` (
  `id` int(11) NOT NULL,
  `nazev` varchar(50) NOT NULL,
  `typ` enum('sportovni','osobni','dodavka','dil','doplnek') NOT NULL,
  `cena` int(11) NOT NULL,
  `pocet` int(11) NOT NULL,
  `pic` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `zbozi`
--

INSERT INTO `zbozi` (`id`, `nazev`, `typ`, `cena`, `pocet`, `pic`, `description`) VALUES
(1, 'Auto', 'sportovni', 1000000, 2, '', ''),
(3, 'dodávka', 'dodavka', 500000, 1, '', ''),
(4, 'rgb pásek', 'doplnek', 1000, 5, '', ''),
(9, 'kolo', 'dil', 1000, 2, 'PIC-57A601012DJ-1.jpg', ''),
(10, 'Nárazník', 'dil', 3000, 10, 'predni-naraznik-bmw-f30-f31-m3-style-11-pdc.jpg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nunc tincidunt ante vitae massa. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Fusce tellus. Nulla pulvinar eleifend sem. Nullam sit amet magna in magna gravida vehicula. Donec ipsum massa, ullamcorper in, auctor et, scelerisque sed, est. Aliquam erat volutpat. Nullam eget nisl. Maecenas ipsum velit, consectetuer eu lobortis ut, dictum at dui. Nulla turpis magna, cursus sit amet, suscipit a, interdum id, felis. Aliquam erat volutpat. Ut tempus purus at lorem. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Suspendisse nisl. Nulla est. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Integer pellentesque quam vel velit.\r\n\r\nPellentesque ipsum. Phasellus et lorem id felis nonummy placerat. Nullam sit amet magna in magna gravida vehicula. Morbi leo mi, nonummy eget tristique non, rhoncus non leo. Phasellus et lorem id felis nonummy placerat. Maecenas fermentum, sem in pharetra pellentesque, velit turpis volutpat ante, in pharetra metus odio a lectus. Duis condimentum augue id magna semper rutrum. Etiam dui sem, fermentum vitae, sagittis id, malesuada in, quam. Praesent in mauris eu tortor porttitor accumsan. Integer lacinia. Vestibulum erat nulla, ullamcorper nec, rutrum non, nonummy ac, erat. Curabitur sagittis hendrerit ante. Etiam quis quam. Mauris elementum mauris vitae tortor. Sed vel lectus. Donec odio tempus molestie, porttitor ut, iaculis quis, sem. Nulla est.\r\n\r\nMaecenas ipsum velit, consectetuer eu lobortis ut, dictum at dui. Curabitur ligula sapien, pulvinar a vestibulum quis, facilisis vel sapien. Aliquam erat volutpat. Duis viverra diam non justo. Vestibulum erat nulla, ullamcorper nec, rutrum non, nonummy ac, erat. Morbi imperdiet, mauris ac auctor dictum, nisl ligula egestas nulla, et sollicitudin sem purus in lacus. Etiam quis quam. Etiam bibendum elit eget erat. In laoreet, magna id viverra tincidunt, sem odio bibendum justo, vel imperdiet sapien wisi sed libero. Nullam sapien sem, ornare ac, nonummy non, lobortis a enim. Integer imperdiet lectus quis justo. Nulla turpis magna, cursus sit amet, suscipit a, interdum id, felis. Integer imperdiet lectus quis justo. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Duis sapien nunc, commodo et, interdum suscipit, sollicitudin et, dolor.'),
(12, 'rgb pásek', 'doplnek', 1000, 5, '', ''),
(15, 'kolo', 'dil', 1000, 2, 'PIC-57A601012DJ-1.jpg', ''),
(16, 'Stěrač', 'dil', 30, 2, 'sterace-280-mm.jpg', ''),
(17, 'Stěrač', 'dil', 30, 2, 'sterace-280-mm.jpg', ''),
(18, 'kolo', 'dil', 1000, 2, 'PIC-57A601012DJ-1.jpg', ''),
(19, 'kolo', 'dil', 1000, 2, 'PIC-57A601012DJ-1.jpg', ''),
(20, 'Nárazník', 'dil', 3000, 10, 'predni-naraznik-bmw-f30-f31-m3-style-11-pdc.jpg', '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `zbozi`
--
ALTER TABLE `zbozi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
