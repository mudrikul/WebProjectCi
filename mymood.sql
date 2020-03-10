-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2020 at 08:45 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mymood`
--

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(10) NOT NULL,
  `first` varchar(10) NOT NULL,
  `second` varchar(10) NOT NULL,
  `third` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `first`, `second`, `third`) VALUES
(1, '1', '2', '3'),
(3, '24', '24', '23a'),
(17, '12', '12', '12'),
(18, 'a', 'a', 'a'),
(37, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `image`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'miku', 'hachiru@gmail.com', 'aa', '', 0, 0, ''),
(2, 'hachioi', 'ekajsaj@gmail.co', 'aaa', '', 0, 0, ''),
(3, 'delete * from user where id=1', 'duniadesainia@gmail.com', 'aaa', '', 0, 0, ''),
(4, 'DELETE FROM `user` WHERE `user`.`id` = 3', 'kyutkitten@gmail.com', 'aaa', '', 0, 0, ''),
(5, '; drop table user', 'kyutkittenh@gmail.com', 'aaa', '', 0, 0, ''),
(6, 'asdj832u3*#u2r3rHDH;awdj', 'ekajsaaaj@gmail.co', 'aaa', '', 0, 0, ''),
(7, 'aaa', 'gdg@gmail.com', 'ss', '', 0, 0, ''),
(8, 'Mudrikul Test', 'aaa@mail.com', '$2y$10$wBpWVSJ0H1qJwiBJdpARs.tydkTI4g4QcnkFsjf/trLFiAv2BVtgS', 'default.jpg', 2, 1, '1583824387'),
(9, 'Mikam', 'aaaaa@mail.com', '$2y$10$vOlunEsveP/wV4j4tCXpeO3kIOCUC/xM6rsiHXn1QAaS480iCcJtO', 'default.jpg', 2, 1, '0'),
(10, 'Mikam', 'aaaaaa@mail.com', '$2y$10$UzUVixj2ZtEz8RE9ZjXzb.AzQI8gDN.47g1HLfLMp9g4jK57PNeuC', 'default.jpg', 2, 1, '0'),
(11, 'Mikam', 'aaaaaaaa@mail.com', '$2y$10$khSC9rT9RwdsoMWRt3La0eo/Avdwj3EtI/rwb0bpYa2rtygo5zONK', 'default.jpg', 2, 1, '0'),
(12, 'aaaaa', 'aaaaaaaaaaa@mail.com', '$2y$10$ZpD9LWH4pxHljCsOqlWfHeIC7/jYefIJd75aHebzpgGs3nAGZJBp6', 'default.jpg', 2, 1, '0'),
(13, 'aaaaaaa', 'aaaaaaaaaaaaa@mail.com', '$2y$10$sbyqYDU7gGqLEbJIWBXlguMwjbpko0DbBTytzutMHRZedZqRkMm1W', 'default.jpg', 2, 1, '20:03:10'),
(14, 'aaaaaaa', 'aaaaaaaaaaaaaaaa@mail.com', '$2y$10$uEPpI/9l7aNU6itOtxcBK.0Mm0b4RBO4N680GhUIxu9MHOadtBnEa', 'default.jpg', 2, 1, '20:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
