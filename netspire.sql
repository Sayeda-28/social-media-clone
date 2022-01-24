-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 24, 2022 at 09:41 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `netspire`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `com` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `post_id`, `username`, `com`) VALUES
(28, NULL, 2, NULL, 'ytytjy yj yjtryjtyjrtyjrtyjtjyjtytrytryjtyjrtyjrytj'),
(27, NULL, 179, NULL, 'b bhthy yn tytn'),
(26, NULL, 179, NULL, 'b bhthy yn tytn'),
(25, NULL, 179, NULL, 'htr ytyttyjtyjt yjt'),
(24, NULL, 179, NULL, 'htr ytyttyjtyjt yjt'),
(23, NULL, 179, NULL, 'htr ytyttyjtyjt yjt'),
(22, NULL, 179, NULL, 'ghn yntr ytttt'),
(21, NULL, 179, NULL, 'ghn yntr ytttt'),
(20, NULL, 179, NULL, 'ghn yntr ytttt'),
(19, NULL, 179, NULL, 'ghn yntr ytttt'),
(18, NULL, 179, NULL, 'ghn yntr ytttt'),
(29, NULL, 2, NULL, 'ytytjy yj yjtryjtyjrtyjrtyjtjyjtytrytryjtyjrtyjrytj'),
(30, NULL, 1, NULL, ' wow! nice pic'),
(31, NULL, 1, NULL, 'good\r\n'),
(32, NULL, 8, NULL, 'good one'),
(33, NULL, 1, NULL, ' great'),
(34, NULL, 3, NULL, 'very good'),
(35, NULL, 16, NULL, 'good'),
(36, NULL, 4, NULL, ' great '),
(37, NULL, 1, NULL, ' wow'),
(38, NULL, 4, NULL, 'cool');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `post` varchar(255) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `count` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `username`, `post`, `caption`, `count`) VALUES
(1, '123abc', '1642878293-post1.jpeg', 'Photography is what I love to do', NULL),
(2, '123abc', '1642878357-post2.jpeg', 'Old but catchy ;)', NULL),
(3, '123abc', '1642878388-post4.jpeg', 'Something from my gallery', NULL),
(4, '123abc', '1642878421-post7.jpeg', 'My new study cabin :)', NULL),
(5, 'an_artist', '1642878575-post6.jpeg', 'Cool!!!!!!', NULL),
(7, 'an_artist', '1642878662-post5.jpeg', ' wow!!!!', NULL),
(8, 'an_artist', '1642879499-post8.jpeg', 'The sky is pink ', NULL),
(9, 'an_artist', '1642879529-post9.jpeg', 'For oxygen', NULL),
(12, 'unknown', '1642983789-Color Hunt Palette 2d24245c3d2eb85c38e0c097.png', 'color palette.', NULL),
(13, 'bella', '1643050140-post11.jpg', 'black and  white', NULL),
(14, 'bella', '1643050170-post12.jpeg', 'amazing!!', NULL),
(15, 'bella', '1643050206-post13.jpeg', 'I love busy streets', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profile_image`
--

DROP TABLE IF EXISTS `profile_image`;
CREATE TABLE IF NOT EXISTS `profile_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profile_img` varchar(255) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_image`
--

INSERT INTO `profile_image` (`id`, `profile_img`, `bio`, `username`) VALUES
(24, NULL, NULL, 'see_day12'),
(25, NULL, NULL, '123edc'),
(26, NULL, NULL, '5676576'),
(23, '1642628093-milford-sound-night-fine-art-photography-new-zealand.jpg', 'fbgb  5yj yjy', 'see_day'),
(20, '1642621835-splashs.png', ' really tired of this shit ', '111'),
(21, NULL, NULL, '234'),
(22, '1642628093-milford-sound-night-fine-art-photography-new-zealand.jpg', 'fbgb  5yj yjy', 'see_day'),
(14, '1641909524-milford-sound-night-fine-art-photography-new-zealand.jpg', '', 'saeed'),
(16, '1642344994-steg.png', 'This account is about art', 'abcdef123'),
(17, NULL, NULL, '3r4tr4t'),
(18, '1642596938-task.png', 'jhiuh ih hui hiu iu', 'tatata'),
(19, '1642609847-milford-sound-night-fine-art-photography-new-zealand.jpg', 'my bio hahahaha', '123456789'),
(27, NULL, NULL, '86776554656'),
(28, NULL, NULL, '123'),
(29, '1642726120-ellipse.png', ' This is a page about arts and crafts', 'day28'),
(30, NULL, NULL, ''),
(31, NULL, NULL, 'y28'),
(32, NULL, NULL, '34567'),
(33, '1642732114-final-logo.jpg', 'This page is about arts and crafts', '8'),
(34, '1642735309-final-logo.jpg', ' Sharing here what I like. Leave a comment :)', 'unknown'),
(35, '1642851350-logo.jpg', 'This page is about arts and crafts', '123abc'),
(36, '1642983017-post4.jpeg', ' This is page about photography', 'an_artist'),
(37, NULL, ' Sharing here what I like. Leave a comment :)', 'unknown'),
(38, '1643050230-post14.jpeg', NULL, 'bella'),
(39, '1643051559-post16.jpeg', 'this page is about art', 'user123'),
(40, '1643053718-post14.jpeg', NULL, 'user12345'),
(41, NULL, NULL, 'useracb'),
(42, NULL, NULL, 'user987'),
(43, '1643055113-post14.jpeg', ' this page is about art', 'username123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_register`
--

DROP TABLE IF EXISTS `tbl_register`;
CREATE TABLE IF NOT EXISTS `tbl_register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_db` varchar(256) NOT NULL,
  `username_register_db` varchar(256) NOT NULL,
  `password_register_db` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_register`
--

INSERT INTO `tbl_register` (`id`, `email_db`, `username_register_db`, `password_register_db`) VALUES
(50, 'hopeithelps777@gmail.com', 'username123', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
(46, 'abc123@gmail.com', 'user123', '6ebe76c9fb411be97b3b0d48b791a7c9'),
(43, 'abc@gmail', 'an_artist', '202cb962ac59075b964b07152d234b70'),
(42, 'da@gmail.com', '123abc', 'caf1a3dfb505ffed0d024130f58c5cfa'),
(44, 'attaullahsayeda@gmail.com', 'unknown', '202cb962ac59075b964b07152d234b70'),
(45, 'sayeda@gmail.com', 'bella', '202cb962ac59075b964b07152d234b70');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
