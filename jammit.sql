-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 29, 2019 at 11:31 AM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jammit`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `per_name` varchar(255) NOT NULL,
  `per_gender` varchar(255) NOT NULL,
  `per_age` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `per_instr` varchar(255) NOT NULL,
  `event_guitar` varchar(255) NOT NULL,
  `event_bass` varchar(255) NOT NULL,
  `event_drum` varchar(255) NOT NULL,
  `event_piano` varchar(255) NOT NULL,
  `event_vocals` varchar(255) NOT NULL,
  `event_sax` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `location_cat` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `time_start` time DEFAULT NULL,
  `time_end` time DEFAULT NULL,
  `distance` int(3) NOT NULL,
  `soundsys` varchar(255) NOT NULL,
  `drum` varchar(255) NOT NULL,
  `g_amp` varchar(255) NOT NULL,
  `b_amp` varchar(255) NOT NULL,
  `keyboard` varchar(255) NOT NULL,
  `snacks` varchar(255) NOT NULL,
  `extra` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `per_name`, `per_gender`, `per_age`, `name`, `genre`, `level`, `age`, `per_instr`, `event_guitar`, `event_bass`, `event_drum`, `event_piano`, `event_vocals`, `event_sax`, `location`, `location_cat`, `date`, `time_start`, `time_end`, `distance`, `soundsys`, `drum`, `g_amp`, `b_amp`, `keyboard`, `snacks`, `extra`) VALUES
(22, 'Lukas Debeerst 2', 'intersex', '16-18', 'The Epic rock jam 2', 'rock', 'beginner', '16-18', 'Bass', 'guitar', '0', '0', 'piano', 'vocals', '0', 'Sportpaleis', 'public', '2019-11-21', '05:59:00', '08:09:00', 30, 'soundsys', '0', 'g_amp', 'b_amp', '0', '0', 'sdfsdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
