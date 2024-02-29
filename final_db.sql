-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2019 at 10:41 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_db`
--
DROP DATABASE IF EXISTS `final_db`;
CREATE DATABASE IF NOT EXISTS `final_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `final_db`;

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `Submission_id` int(6) NOT NULL,
  `title` text NOT NULL,
  `Upload_date` datetime NOT NULL,
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`Submission_id`, `title`, `Upload_date`, `id`, `image`, `description`, `price`, `category`) VALUES
(1, 'Final Fantasy', '2019-11-14 14:37:44', 3, 'gallery/carbuncle.jpg', 'This piece is something that i created during my painting 101 class. Made with oils, I made a painting of the character Carbuncle from the video game series Final Fantasy', 35.99, 'Physical '),
(2, 'Digital Sketched Kohaku (Dr Stone)', '2019-11-19 03:14:14', 2, 'gallery/Kohaku.png', 'Digital sketch of lead female character Kohaku from the anime Dr Stone.', 20.99, 'Digital '),
(3, 'Colored sketched Iris (Fire Force)', '2019-11-20 05:30:16', 2, 'gallery/Iris.png', 'Colored illustration of female lead character Iris from the anime Fire Force.', 25, 'Digital '),
(4, 'Digitally Illustrated Ana (Overwatch)', '2019-11-22 06:03:19', 5, 'gallery/Ana.png', 'Digital illustration of Ana from Overwatch in her Captain Amari skin.', 13.99, 'Digital '),
(5, 'Persona 5 Joker painting (persona 5)', '2019-11-21 08:04:22', 5, 'gallery/Persona.jpg', 'Handmade painting of Persona 5 protagonist Joker.', 40, 'Physical '),
(6, 'Pixel Art Bunny', '2019-11-21 04:11:18', 5, 'gallery/Bunny.png', 'Pixel art of a small cute Bunny that goes wonderful on kitchen walls to add decoration.', 15.99, 'Digital '),
(7, 'Grum (OC)', '2019-11-12 07:06:16', 5, 'gallery/Grum.png', 'Clean illustration of my original character Grum. ', 9.99, 'Digital '),
(8, 'Digitally Sketched Neeko (league)', '2019-11-22 08:14:21', 1, 'gallery/Neeko.png', 'Digitally sketched illustration of League of legends champion Neeko the the Curious Chameleon.', 25, 'Digital '),
(9, 'Digitally Illustrated Rakan and Xayah', '2019-11-20 19:23:59', 4, 'gallery/Rakan.png', 'Popular digital illustration of league of legends bot lane couple Xayah and Rakan.', 12, 'Digital '),
(10, 'Digitally illustrated Rakan and Xayah', '2019-11-13 00:00:00', 5, 'gallery/Rakan_Xya.png', 'Clean illustration of Rakan and Xayah. Perfect for decoration.', 199.99, 'Digital '),
(11, 'True Damage Shen (league)', '2019-11-23 13:22:21', 5, 'gallery/Shen.jpg', 'Potential concept of what Shen would look like in league of legends True damage skin line up.', 14.99, 'Physical ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `Username` varchar(40) NOT NULL,
  `Full_name` varchar(60) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Username`, `Full_name`, `Email`, `Password`) VALUES
(1, 'DarkSoul175', 'James Williams', 'Jwilliams765@gmail.com', '1'),
(2, 'Madmanz', 'Gregory Smith', 'Gsmith576@gmail.com', '12'),
(3, 'Mark', 'Abby Zapatos ', 'ZapToes756@gmail.com', '123'),
(4, 'RedQuazar', 'Benedict Cumberbatch', 'Bcumber345@gmail.com', '1234'),
(5, 'Gecko', 'Lee SIn', 'Lsin69@AOL.com', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`Submission_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `Submission_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
