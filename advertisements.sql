-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 10, 2021 at 09:00 PM
-- Server version: 5.7.20-log
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `advertisements`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(1023) NOT NULL,
  `photos` varchar(500) NOT NULL,
  `time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `title`, `description`, `photos`, `time`) VALUES
(1, 'Lorem Ipsum is simply dummy text', 'test', '[\"1628614263_6112ae7723748.jpg\",\"1628614263_6112ae772382d.jpg\",\"1628614263_6112ae77238e8.jpg\"]\r\n', '1630254780 '),
(2, 'It is a long established fact', 'test', '[\"1628614263_6112ae7723748.jpg\",\"1628614263_6112ae772382d.jpg\",\"1628614263_6112ae77238e8.jpg\"]\r\n', '1215099671'),
(3, 'Contrary to popular belief', 'test', '[\"1628614263_6112ae7723748.jpg\",\"1628614263_6112ae772382d.jpg\",\"1628614263_6112ae77238e8.jpg\"]\r\n', '1112757499 '),
(4, 'There are many variations of passages', 'test', '[\"1628614263_6112ae7723748.jpg\",\"1628614263_6112ae772382d.jpg\",\"1628614263_6112ae77238e8.jpg\"]\r\n', '1580094670 '),
(5, 'Why do we use it?', 'test', '[\"1628614263_6112ae7723748.jpg\",\"1628614263_6112ae772382d.jpg\",\"1628614263_6112ae77238e8.jpg\"]\r\n', '1601760449 '),
(6, 'Where does it come from?\r\n', 'test', '[\"1628614263_6112ae7723748.jpg\",\"1628614263_6112ae772382d.jpg\",\"1628614263_6112ae77238e8.jpg\"]\r\n', '1598717367 '),
(7, 'Where does it come from?\r\n', 'test', '[\"1628614263_6112ae7723748.jpg\",\"1628614263_6112ae772382d.jpg\",\"1628614263_6112ae77238e8.jpg\"]\r\n', '1590862666 '),
(8, 'Test note', 'Test note', '[\"1628615034_6112b17a2b3e5.jpg\",\"1628615034_6112b17a2b4b2.jpg\",\"1628615034_6112b17a2b556.jpg\"]', '1628615034'),
(9, 'sdfsdfsdf', 'sdfsdfssdf', '[\"1628616746_6112b82a20cdd.jpg\"]', '1628616746');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creation_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
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
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
