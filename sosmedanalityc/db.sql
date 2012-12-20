-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 20, 2012 at 05:54 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sosmedsis`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(25) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `user_first_name` varchar(160) NOT NULL,
  `user_last_name` varchar(160) NOT NULL,
  `user_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(160) NOT NULL,
  `payment_method` tinyint(1) NOT NULL,
  `package_type` tinyint(1) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_password`, `user_first_name`, `user_last_name`, `user_address`, `user_email`, `payment_method`, `package_type`) VALUES
(1, 'peekho', 'aac4950ab6b778f09da4ff9626dadd38', 'Cepy Setia', 'Nugraha', 'Jl. Kolonel Masturi no 004/485 02/12 Jambudipa Cisarua Bandung Barat', 'cepy.setia@gmail.com', 1, 1),
(2, 'cacas', 'e10adc3949ba59abbe56e057f20f883e', 'Cahyadi', 'Supardi', 'Parompong', 'cahyadi@gmail.com', 1, 2),
(3, 'lucido', '1', 'Lucido', 'Peekho', 'Barukai', 'lpeekho@gmail.com', 1, 0),
(4, 'gundala', 'e10adc3949ba59abbe56e057f20f883e', 'Gundala', 'Darman', 'Jalan Kolonel Masturi no 485', 'pyce@gmail.com', 1, 3),
(5, 'adihawuk', 'e10adc3949ba59abbe56e057f20f883e', 'Adi', 'Supriadi', 'Jalan Kolonel Masturi no 58', 'adihawuk@gmail.com', 0, 1);
