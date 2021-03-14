-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2019 at 12:26 AM
-- Server version: 10.4.8-MariaDB
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
CREATE DATABASE IF NOT EXISTS `final_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `final_db`;

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `Submission_id` int(6) NOT NULL,
  `title` text NOT NULL,
  `Upload_date` date NOT NULL,
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
(1, 'Final Fantasy', '2019-11-14', 3, 'gallery/carbuncle.jpg', 'This piece is something that i created during my painting 101 class. Made with oils, I made a painting of the character Carbuncle from the video game series Final Fantasy', 35.99, 'Physical'),
(2, 'Digital Sketched Kohaku (Dr Stone)', '2019-11-19', 2, 'gallery/Kohaku.png', 'Digital sketch of lead female character Kohaku from the anime Dr Stone.', 21, 'Digital'),
(3, 'Colored sketched Iris (Fire Force)', '2019-11-20', 2, 'gallery/Iris.png', 'Colored illustration of female lead character Iris from the anime Fire Force.', 25, 'Digital '),
(4, 'Digitally Illustrated Ana (Overwatch)', '2019-11-22', 5, 'gallery/Ana.png', 'Digital illustration of Ana from Overwatch in her Captain Amari skin.', 13.99, 'Digital '),
(5, 'Persona 5 Joker painting (persona 5)', '2019-11-21', 5, 'gallery/Persona.jpg', 'Handmade painting of Persona 5 protagonist Joker.', 40, 'Physical '),
(6, 'Pixel Art Bunny', '2019-11-21', 5, 'gallery/Bunny.png', 'Pixel art of a small cute Bunny that goes wonderful on kitchen walls to add decoration.', 15.99, 'Digital '),
(7, 'Grum (OC)', '2019-11-12', 5, 'gallery/Grum.png', 'Clean illustration of my original character Grum. ', 9.99, 'Digital '),
(8, 'Digitally Sketched Neeko (league)', '2019-11-22', 1, 'gallery/Neeko.png', 'Digitally sketched illustration of League of legends champion Neeko the the Curious Chameleon.', 25, 'Digital '),
(9, 'Illustrated Rakan and Xayah (league)', '2019-11-20', 4, 'gallery/Rakan.png', 'Popular digital illustration of league of legends bot lane couple Xayah and Rakan.', 12, 'Digital '),
(10, 'illustrated Rakan and Xayah (league)', '2019-11-13', 5, 'gallery/Rakan_Xya.png', 'Clean illustration of Rakan and Xayah. Perfect for decoration.', 199.99, 'Digital '),
(11, 'True Damage Shen (league)', '2019-11-23', 5, 'gallery/Shen.jpg', 'Potential concept of what Shen would look like in league of legends True damage skin line up.', 14.99, 'Physical '),
(12, 'Digital Illustrated Irelia (League)', '2019-11-19', 4, 'https://cdnb.artstation.com/p/assets/images/images/010/118/763/large/kylin-wu-1.jpg?1522687811', 'Digital illustration of Irelea. Its gorgeous :>', 19.99, 'Digital'),
(15, 'Pokemon Nessa', '2019-12-15', 2, ' https://cdna.artstation.com/p/assets/images/images/019/406/786/large/cabonara-artblock-nessa.jpg?1563349278', 'Pokemon :>', 15.99, 'Digital'),
(16, 'Legend of Zelda Breath of the Wild', '2019-12-15', 2, ' https://assets1.ignimgs.com/thumbs/userUploaded/2018/11/8/nvc-zeldabreakout-1541718712390.jpg', 'Link n Zelda :>', 167.89, 'Digital\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `Username` varchar(40) NOT NULL,
  `Full_name` varchar(60) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Username`, `Full_name`, `Email`, `Password`, `role`) VALUES
(1, 'DarkSoul175', 'James Williams', 'Jwilliams765@gmail.com', 'Password', 1),
(2, 'Madmanz', 'Gregory Smith', 'Gsmith576@gmail.com', 'Password', 1),
(3, 'Mark', 'Abby Zapatos ', 'ZapToes756@gmail.com', 'Password', 1),
(4, 'RedQuazar', 'Benedict Cumberbatch', 'Bcumber345@gmail.com', 'Password', 1),
(5, 'Gecko', 'Lee SIn', 'Lsin69@AOL.com', 'Password', 1),
(6, 'Test ', 'Test ', 'Test', 'Test', 1),
(7, 'Admin', 'Admin', 'Admin@gmail.com', 'Admin', 2);

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
  MODIFY `Submission_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
