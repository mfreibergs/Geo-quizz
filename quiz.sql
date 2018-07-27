-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2018 at 07:57 AM
-- Server version: 8.0.11
-- PHP Version: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE `choices` (
  `id` int(11) NOT NULL,
  `quiz_type` text NOT NULL,
  `question_number` int(11) NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT '0',
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `choices`
--

INSERT INTO `choices` (`id`, `quiz_type`, `question_number`, `is_correct`, `text`) VALUES
(1, 'europe', 1, 1, 'Riga'),
(2, 'europe', 1, 0, 'Rio'),
(3, 'europe', 1, 0, 'Shanghai'),
(4, 'europe', 2, 1, 'Vilnius'),
(5, 'europe', 2, 0, 'Zagreb'),
(6, 'europe', 2, 0, 'Sofia'),
(7, 'asia', 1, 1, 'Seoul'),
(8, 'asia', 1, 0, 'Shenzhen'),
(9, 'asia', 1, 0, 'Busan'),
(10, 'asia', 2, 1, 'Tokyo'),
(11, 'asia', 2, 0, 'Kyoto'),
(12, 'asia', 2, 0, 'Osaka'),
(13, 'europe', 1, 0, 'Kabul'),
(14, 'europe', 2, 0, 'Tirana'),
(15, 'europe', 3, 1, 'Zagreb'),
(16, 'europe', 3, 0, 'Algiers'),
(17, 'europe', 3, 0, 'Luanda'),
(18, 'europe', 3, 0, 'Buenos Aires'),
(19, 'europe', 4, 0, 'Yerevan'),
(20, 'europe', 4, 0, 'Vienna'),
(21, 'europe', 4, 1, 'Paris'),
(22, 'europe', 4, 0, 'Baku'),
(23, 'europe', 5, 0, 'Dhaka'),
(24, 'europe', 5, 1, 'Oslo'),
(25, 'europe', 5, 0, 'Minsk'),
(26, 'europe', 5, 0, 'Brussels'),
(27, 'asia', 1, 0, 'La Pez'),
(28, 'asia', 2, 0, 'Sarajevo'),
(29, 'asia', 3, 0, 'Bujumbura'),
(30, 'asia', 3, 1, 'Beijing'),
(31, 'asia', 3, 0, 'Ottawa'),
(32, 'asia', 3, 0, 'Praia'),
(33, 'asia', 4, 0, 'Bogota'),
(34, 'asia', 4, 0, 'Roseau'),
(35, 'asia', 4, 0, 'Prague'),
(36, 'asia', 4, 1, 'Hanoi '),
(37, 'asia', 5, 0, 'Dili'),
(38, 'asia', 5, 0, 'Palikir'),
(39, 'asia', 5, 1, 'Singapore'),
(40, 'asia', 5, 0, 'Libreville');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `quiz_type` text NOT NULL,
  `question_number` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`quiz_type`, `question_number`, `text`) VALUES
('asia', 1, 'What is the capital of South Korea?'),
('asia', 2, 'What is the capital of Japan?'),
('asia', 3, 'What is the capital of China?'),
('asia', 4, 'What is the capital of Vietnam?'),
('asia', 5, 'What is the capital of Singapore?'),
('europe', 1, 'What is the capital of Latvia?'),
('europe', 2, 'What is the capital of Lithuania?'),
('europe', 3, ' What is the capital of Croatia?'),
('europe', 4, 'What is the capital of France?'),
('europe', 5, 'What is the capital of Norway?');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `choices`
--
ALTER TABLE `choices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
