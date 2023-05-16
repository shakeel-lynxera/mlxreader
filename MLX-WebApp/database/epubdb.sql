-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2021 at 05:19 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epubdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `domin_epub_files`
--

CREATE TABLE `domin_epub_files` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `cover_image` varchar(50) NOT NULL,
  `file_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `domin_epub_files`
--

INSERT INTO `domin_epub_files` (`id`, `title`, `cover_image`, `file_name`) VALUES
(1, 'Ad Sample Book', 'book1.png', ' 602a12df0284e3.07835762.epub'),
(2, 'Ad Sample Book', 'book1.png', ' 602a12df0284e3.07835762.epub'),
(3, 'Ad Sample Book', 'book1.png', ' 602a12df0284e3.07835762.epub'),
(4, 'Ad Sample Book', 'book1.png', ' 602a12df0284e3.07835762.epub');

-- --------------------------------------------------------

--
-- Table structure for table `epub_table`
--

CREATE TABLE `epub_table` (
  `id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `name` varchar(999) NOT NULL,
  `title` varchar(50) NOT NULL,
  `cover_image` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `epub_table`
--

INSERT INTO `epub_table` (`id`, `user_id`, `name`, `title`, `cover_image`) VALUES
(50, '7', 'medical_book.epub', 'mybook', ' 6027f91202cd11.36454295.png'),
(56, '5', 'medical_book.epub', 'test book', ' 602b8acfc4fd29.67976645.jpeg'),
(57, '5', ' 602a12df0284e3.07835762.epub', 'test book2', ' 602b9c15b7f2d3.57441477.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` decimal(20,0) NOT NULL,
  `password` varchar(200) NOT NULL,
  `token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `token`) VALUES
(5, 'user', 'itxme4all@gmail.com', '911', 'e2b63a3492bfd04b92fd2b829bab4541', 'lskfdjas09dfaisfkj'),
(6, 'umerkhanwazir', 'wazirumer0@gmail.com', '3330303744', 'e2fc714c4727ee9395f324cd2e7f331f', 'sklfdjalsdf9as8d7f'),
(7, 'tester', 'tester@gmail.com', '333333333', 'f5d1278e8109edd94e1e4197e04873b9', 'salkdfjas98s'),
(8, 'tester', 'tester@mail.com', '333333', 'f5d1278e8109edd94e1e4197e04873b9', ''),
(9, 'tester', 'user@mail.com', '9090', 'f5d1278e8109edd94e1e4197e04873b9', ''),
(10, 'tester', 'tester@lynxera.com', '99999', 'f5d1278e8109edd94e1e4197e04873b9', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `domin_epub_files`
--
ALTER TABLE `domin_epub_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `epub_table`
--
ALTER TABLE `epub_table`
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
-- AUTO_INCREMENT for table `domin_epub_files`
--
ALTER TABLE `domin_epub_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `epub_table`
--
ALTER TABLE `epub_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
