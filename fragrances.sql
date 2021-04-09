-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2021 at 09:33 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fragrances`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `quantity`, `price`, `image`) VALUES
(1, 'Jo Malone - Velvet Rose &amp; Oud Cologne Intense', 'La Rose de Damas la plus sombre. \r\nRiche et textur&eacute;e, envelopp&eacute;e d\\\'un voile fum&eacute; de bois de oud. Relev&eacute;e par le clou de girofle, d&eacute;cadente avec la praline.\r\nTextur&eacute;. Magn&eacute;tique. D&eacute;cadent.\r\n\r\n100 ml', 8, 149, 'rose-velvet.webp'),
(2, 'Montale - Starry Nights', 'Aussi brillante qu&rsquo;une &eacute;toile, la Bergamote de Calabre illumine un c&oelig;ur floral o&ugrave;, la Rose de Bulgarie, r&eacute;chauff&eacute;e par les notes orientales du Patchouli de Sumatra, se m&ecirc;le au Jasmin d&rsquo;&Eacute;gypte, et laisse sur la peau un sillage de Musc Blanc sensuel aux Notes Poudr&eacute;es.\r\n\r\n100 ml', 0, 115, 'starry-nights.png'),
(6, 'Sunnamusk - Emirates', 'Worldly women will adore the deep, lingering rose yet the scent takes on a more musky, smoky quality on a man. Its opulence lends well to winter months.\r\n\r\n50 ml', 7, 84, 'Emirates-Hover.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `name`, `email`, `password`, `status`) VALUES
(1, 'admin', 'William G', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(2, 'user', 'Jean B', 'jean@dede.d', 'e10adc3949ba59abbe56e057f20f883e', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
