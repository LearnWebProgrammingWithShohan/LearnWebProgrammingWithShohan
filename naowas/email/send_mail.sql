-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2020 at 07:59 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `email_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `send_mail`
--

CREATE TABLE `send_mail` (
  `id` int(11) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `sub` varchar(100) NOT NULL,
  `message_body` varchar(1000) NOT NULL,
  `sent_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `send_mail`
--

INSERT INTO `send_mail` (`id`, `email_id`, `sub`, `message_body`, `sent_time`) VALUES
(42, 'naowas.morshed.eimon@gmail.com', 'dd', 'dd', '2020-04-03 18:38:50'),
(43, 'morshedbd01@gmail.com', 'Welcome to XAMPP for Windows 7.3.9', 'You have successfully installed XAMPP on this system! Now you can start using Apache, MariaDB, PHP and other components. You can find more info in the FAQs section or check the HOW-TO Guides for getting started with PHP applications', '2020-04-03 19:12:33'),
(44, 'naowas.morshed.eimon@gmail.com', 'qwertyuio', 'qwertyuiopasdfghjklzxcvbnm', '2020-04-04 14:58:00'),
(45, 'naowas.morshed.eimon@gmail.com', 'file', 'hi', '2020-04-04 15:29:19'),
(46, 'naowas.morshed.eimon@gmail.com', 'final version', 'ksckxcx ', '2020-04-04 15:30:48'),
(47, 'naowas.morshed.eimon@gmail.com', 'Testing form', 'rgfg', '2020-04-04 15:31:49'),
(48, 'naowas.morshed.eimon@gmail.com', 'Testing form', 'gg', '2020-04-04 15:32:21'),
(49, 'naowas.morshed.eimon@gmail.com', 'Testing form', 'yg', '2020-04-04 15:33:41'),
(50, 'naowas.morshed.eimon@gmail.com', 'big', 'eee', '2020-04-04 15:35:42'),
(51, 'naowas.morshed.eimon@gmail.com', 'trehthhghnhn', 'sdfd', '2020-04-04 16:41:29'),
(52, 'naowas.morshed.eimon@gmail.com', 'Testing form', 'dvdf', '2020-04-04 16:43:14'),
(53, 'naowas.morshed.eimon@gmail.com', 'Testing form', 'rrr', '2020-04-04 16:45:28'),
(54, 'naowas.morshed.eimon@gmail.com', 'Testing form', 'dd', '2020-04-04 17:01:44'),
(55, 'naowas.morshed.eimon@gmail.com', 'h', 'hh', '2020-04-04 17:04:54'),
(56, 'naowas.morshed.eimon@gmail.com', 'Testing form', 'tgr', '2020-04-04 17:05:52'),
(57, 'naowas.morshed.eimon@gmail.com', 'Im sending file', 'Welcome aboard!\r\nNaowas - thank you for completing your signup at testmail.app - we are thrilled to welcome you aboard!\r\n\r\nOur complete documentation has everything you will need to get started, and more - use the search field and navigation bar on the left to find anything.\r\n\r\nSignin to the console to create and retrieve namespaces and API keys, invite team members to collaborate, and manage your account.\r\n\r\nIf you ever hit a roadblock or need help, please reach out via', '2020-04-04 17:12:06'),
(58, 'naowas.morshed.eimon@gmail.com', 'ccccccc', 'ccccccccccccccc', '2020-04-04 17:15:28'),
(59, 'naowas.morshed.eimon@gmail.com', 'dd', 'dd', '2020-04-05 19:49:55'),
(60, 'naowas.morshed.eimon@gmail.com', 'dddddddddddddddddddddddd', 'dddddddd', '2020-04-05 20:00:15'),
(61, '16101002@uap-bd.edu', 'test mail', 'fiekchhhhhhhhhhhhhhhhhhhhhhhhh', '2020-04-06 08:46:06'),
(62, '16101002@uap-bd.edu', 'Please enter a correct email address.', 'dsds', '2020-04-06 08:51:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `send_mail`
--
ALTER TABLE `send_mail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `send_mail`
--
ALTER TABLE `send_mail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
