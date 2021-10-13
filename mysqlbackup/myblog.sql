-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 13, 2021 at 11:36 PM
-- Server version: 8.0.26-0ubuntu0.20.04.2
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogcategory`
--

CREATE TABLE `blogcategory` (
  `cat_id` int NOT NULL,
  `cat_des` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blogcategory`
--

INSERT INTO `blogcategory` (`cat_id`, `cat_des`) VALUES
(1, 'Category 1');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comid` int NOT NULL,
  `comblogid` int NOT NULL,
  `comusdid` int NOT NULL,
  `comddt` datetime NOT NULL,
  `comdes` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comid`, `comblogid`, `comusdid`, `comddt`, `comdes`) VALUES
(1, 26, 1, '2021-10-13 11:43:02', 'awh rwhqwrh rwhewrqh qrhqerhq wrhwq rqhw hwrqh rwh wrqhew hhewh ewh ewh\r\new weh\r\n\r\n weyqw er rh rh '),
(13, 19, 2, '2021-10-13 16:19:47', 'wet wee wre yqryh ryh rh erhreh'),
(4, 26, 2, '2021-10-13 16:01:02', 'sdvw aegrah reh'),
(9, 26, 2, '2021-10-13 16:14:59', 'a wegeg ge e'),
(10, 26, 2, '2021-10-13 16:15:18', 'sdgweg weg eeh'),
(14, 21, 5, '2021-10-13 16:20:35', 'Comments Here'),
(15, 27, 5, '2021-10-13 16:23:26', 'we gewg qwe eq qeh'),
(16, 27, 5, '2021-10-13 16:23:41', 'weq qwege weq weh whwe hwe eh'),
(17, 27, 5, '2021-10-13 16:27:14', ' ewq ehq hh qehwe h'),
(18, 21, 1, '2021-10-13 16:31:11', 'Comments Here'),
(20, 20, 2, '2021-10-13 18:52:56', 'Comment Here');

-- --------------------------------------------------------

--
-- Table structure for table `myblogs`
--

CREATE TABLE `myblogs` (
  `blog_id` int NOT NULL,
  `blog_usdid` int NOT NULL,
  `blog_header` varchar(500) NOT NULL,
  `blog_des` text NOT NULL,
  `blog_createddt` date NOT NULL,
  `blog_views` int NOT NULL,
  `blog_category` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `myblogs`
--

INSERT INTO `myblogs` (`blog_id`, `blog_usdid`, `blog_header`, `blog_des`, `blog_createddt`, `blog_views`, `blog_category`) VALUES
(18, 2, 'Taj Mahal', 'The Taj Mahal (/ˌtɑːdʒ məˈhɑːl, ˌtɑːʒ-/;[4] lit. `Crown of the Palace`, [taːdʒ ˈmɛːɦ(ə)l]),[5] is an ivory-white marble mausoleum on the right bank of the river Yamuna in the Indian city of Agra. It was commissioned in 1632 by the Mughal emperor Shah Jahan (reigned from 1628 to 1658) to house the tomb of his favourite wife, Mumtaz Mahal; it also houses the tomb of Shah Jahan himself. The tomb is the centrepiece of a 17-hectare (42-acre) complex, which includes a mosque and a guest house, and is set in formal gardens bounded on three sides by a crenellated wall. ', '2021-10-12', 0, 1),
(19, 5, 'Great Wall of China', 'The Great Wall of China (traditional Chinese: 萬里長城; simplified Chinese: 万里长城; pinyin: Wànlǐ Chángchéng) is a series of fortifications that were built across the historical northern borders of ancient Chinese states and Imperial China as protection against various nomadic groups from the Eurasian Steppe. Several walls were built from as early as the 7th century BC,[2] with selective stretches later joined together by Qin Shi Huang (220–206 BC), the first emperor of China. Little of the Qin wall remains.[3] Later on, many successive dynasties built and maintained multiple stretches of border walls. The most well-known sections of the wall were built by the Ming dynasty (1368–1644). ', '2021-10-12', 0, 1),
(20, 2, 'Christ the Redeemer (statue)', 'Christ the Redeemer (Portuguese: Cristo Redentor, standard Brazilian Portuguese: [ˈkɾistu ʁedẽˈtoʁ], local pronunciation: [ˈkɾiɕtŭ̥ xe̞dẽˈtoɦ]) is an Art Deco statue of Jesus Christ in Rio de Janeiro, Brazil, created by French sculptor Paul Landowski and built by Brazilian engineer Heitor da Silva Costa, in collaboration with French engineer Albert Caquot. Romanian sculptor Gheorghe Leonida fashioned the face. Constructed between 1922 and 1931, the statue is 30 metres (98 ft) high, excluding its 8-metre (26 ft) pedestal. The arms stretch 28 metres (92 ft) wide.[1][2]\r\n\r\nThe statue weighs 635 metric tons (625 long, 700 short tons), and is located at the peak of the 700-metre (2,300 ft) Corcovado mountain in the Tijuca Forest National Park overlooking the city of Rio de Janeiro. A symbol of Christianity across the world, the statue has also become a cultural icon of both Rio de Janeiro and Brazil and was voted one of the New Seven Wonders of the World.[3] It is made of reinforced concrete and soapstone', '2021-10-12', 0, 1),
(21, 5, 'Colosseum', 'The Colosseum, also known as the Flavian Amphitheatre, is a large artefact or structure in the city of Rome. The construction of the Colosseum started around 70–72 AD and was finished in 80 AD. Emperor Vespasian started all the work, and Emperor Titus completed the colosseum. Emperor Domitian made some changes to the building between 81–96 AD.[1] It had seating for 50,000 people.[2] It is the biggest amphitheatre built by the Roman Empire. ', '2021-10-12', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usdmast`
--

CREATE TABLE `usdmast` (
  `usdid` int NOT NULL,
  `usdnam` varchar(200) NOT NULL,
  `usdfnam` varchar(200) NOT NULL,
  `usdlnam` varchar(200) NOT NULL,
  `usdemail` varchar(200) NOT NULL,
  `usdpsw` varchar(200) NOT NULL,
  `usdadmin` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `usdmast`
--

INSERT INTO `usdmast` (`usdid`, `usdnam`, `usdfnam`, `usdlnam`, `usdemail`, `usdpsw`, `usdadmin`) VALUES
(1, 'nila', 'Nilanga', 'Perera', 'nilanga.perera@gmail.com', 'mypass', 'admin'),
(2, 'amila', 'Amila', 'Perera', 'ss@gmail.com', '123', 'user'),
(5, 'syl', 'Sylvester', 'Perera', 'syl@gmail.com', '123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogcategory`
--
ALTER TABLE `blogcategory`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `cat_des` (`cat_des`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comid`);

--
-- Indexes for table `myblogs`
--
ALTER TABLE `myblogs`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `usdmast`
--
ALTER TABLE `usdmast`
  ADD PRIMARY KEY (`usdid`),
  ADD UNIQUE KEY `usdnam` (`usdnam`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogcategory`
--
ALTER TABLE `blogcategory`
  MODIFY `cat_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `myblogs`
--
ALTER TABLE `myblogs`
  MODIFY `blog_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `usdmast`
--
ALTER TABLE `usdmast`
  MODIFY `usdid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
