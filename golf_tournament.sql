-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2022 at 10:46 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `golf_tournament`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` bigint(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_pass` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_email`, `admin_pass`) VALUES
(1, 'shahjoo@gmail.com', '$2y$10$O/k9LVeltSjPnl74v1EiM.W/ZZwwsmSKnklz3sB.lydjSZpwjaZyG'),
(24, 'admin@gmail.com', '$2y$10$vJ5Sh0OTfEchl.Cs80cHO.ir.iQNzu7p4R3rIvvrP0UiXUeb2eiuG');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `picture_id` bigint(20) NOT NULL,
  `picture_path` varchar(2048) DEFAULT NULL,
  `picture` longblob DEFAULT NULL,
  `picture_uploadDate` date DEFAULT NULL,
  `picture_description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`picture_id`, `picture_path`, `picture`, `picture_uploadDate`, `picture_description`) VALUES
(76, 'uploads/11430140_898697413484146_8829456522907710696_n.jpg', NULL, '2022-04-03', 'This is the description '),
(84, 'uploads/1391690_898697670150787_8489921260378051936_n.jpg', NULL, '2022-04-07', NULL),
(85, 'uploads/1972542_899293043424583_8980683384252576558_n.jpg', NULL, '2022-04-07', NULL),
(86, 'uploads/10917402_826324950721393_398327282521249405_n.jpg', NULL, '2022-04-07', NULL),
(87, 'uploads/10934110_835299503157271_4596385893852657957_o.jpg', NULL, '2022-04-07', NULL),
(88, 'uploads/11180299_898697380150816_1259604255639333608_n.jpg', NULL, '2022-04-07', NULL),
(89, 'uploads/11350409_899292960091258_3780632971915576776_n.jpg', NULL, '2022-04-07', NULL),
(90, 'uploads/11407158_898697463484141_5380299530372014268_n.jpg', NULL, '2022-04-07', NULL),
(91, 'uploads/11426384_898697600150794_3276763619969160420_n.jpg', NULL, '2022-04-07', NULL),
(92, 'uploads/62523236_10161948811155302_8762200438842851328_o.jpg', NULL, '2022-04-07', NULL),
(93, 'uploads/63739408_10161948816995302_6578293157480366080_o.jpg', NULL, '2022-04-07', NULL),
(94, 'uploads/64222566_10161948812630302_5750741405802692608_o.jpg', NULL, '2022-04-07', NULL),
(95, 'uploads/64287810_10161948821245302_7217143326279991296_o.jpg', NULL, '2022-04-07', NULL),
(96, 'uploads/64301988_10161948821380302_6028919965048897536_o.jpg', NULL, '2022-04-07', NULL),
(97, 'uploads/64376245_10161948807830302_1854191090249236480_o.jpg', NULL, '2022-04-07', NULL),
(98, 'uploads/64409397_10161948832820302_4101993165555236864_o.jpg', NULL, '2022-04-07', NULL),
(99, 'uploads/64768298_10161948807655302_4281514358917300224_o.jpg', NULL, '2022-04-07', NULL),
(100, 'uploads/64869547_10161948817030302_1734081642621829120_o.jpg', NULL, '2022-04-07', NULL),
(101, 'uploads/DSC07385.jpg', NULL, '2022-04-07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sponsor_logos`
--

CREATE TABLE `sponsor_logos` (
  `sponsor_id` bigint(20) NOT NULL,
  `sponsor_name` varchar(256) NOT NULL,
  `file_path` varchar(1000) NOT NULL,
  `sponsor_description` varchar(1000) DEFAULT NULL,
  `sponsor_link` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sponsor_logos`
--

INSERT INTO `sponsor_logos` (`sponsor_id`, `sponsor_name`, `file_path`, `sponsor_description`, `sponsor_link`) VALUES
(29, 'Amazon', 'images/sponsors/amazon_logo.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'https://www.amazon.ca/'),
(30, 'Boston Pizza', 'images/sponsors/Boston_pizza.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 'https://bostonpizza.com/en/index.html');

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `year_id` int(11) NOT NULL,
  `year_number` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`year_id`, `year_number`) VALUES
(2, '9TH'),
(3, '9TH'),
(4, '9TH'),
(5, '10TH'),
(6, '12TH'),
(7, '15TH'),
(8, '14TH'),
(9, '9TH'),
(10, '10TH'),
(11, '9TH'),
(12, '15TH'),
(13, '13TH'),
(14, '9TH'),
(15, '15TH'),
(16, '9TH'),
(17, '10TH'),
(18, '9TH'),
(19, '10TH'),
(20, '9TH'),
(21, '10TH'),
(22, '9TH'),
(23, '10TH'),
(24, '9TH');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`picture_id`);

--
-- Indexes for table `sponsor_logos`
--
ALTER TABLE `sponsor_logos`
  ADD PRIMARY KEY (`sponsor_id`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`year_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `picture_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `sponsor_logos`
--
ALTER TABLE `sponsor_logos`
  MODIFY `sponsor_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
