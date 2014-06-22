-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2014 at 10:57 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wellspr_test`
--
CREATE DATABASE IF NOT EXISTS `wellspr_test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `wellspr_test`;

-- --------------------------------------------------------

--
-- Table structure for table `embeds`
--

CREATE TABLE IF NOT EXISTS `embeds` (
  `song_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `embed_id` int(11) NOT NULL AUTO_INCREMENT,
  `embeds` varchar(100) NOT NULL,
  `postdate` datetime NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`embed_id`),
  KEY `song_id` (`song_id`,`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `embeds`
--

INSERT INTO `embeds` (`song_id`, `user_id`, `embed_id`, `embeds`, `postdate`, `timestamp`) VALUES
(11, 0, 1, 'youtube.com', '2014-05-29 00:00:00', '2014-05-11 14:59:08'),
(41, 0, 2, ':embeds', '0000-00-00 00:00:00', '2014-05-13 05:16:45');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `media_id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `song_id` int(255) unsigned NOT NULL,
  `user_id` int(255) unsigned NOT NULL,
  `media_name` varchar(150) NOT NULL,
  `filetype` varchar(10) NOT NULL,
  `postdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`media_id`),
  KEY `song_id` (`song_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`media_id`, `song_id`, `user_id`, `media_name`, `filetype`, `postdate`) VALUES
(2, 0, 0, '001_NVLeFom - Copy', 'jpg', '2014-04-17 22:04:13'),
(3, 0, 0, '001_NVLeFom', 'jpg', '2014-04-17 22:04:13'),
(4, 0, 0, '002_DPr3BlP - Copy', 'jpg', '2014-04-17 22:04:13'),
(5, 0, 0, '002_DPr3BlP', 'jpg', '2014-04-17 22:04:13'),
(6, 0, 0, '2Uh4L4C', 'jpg', '2014-04-17 22:04:13'),
(7, 5, 0, '001_NVLeFom - Copy', 'jpg', '2014-04-17 22:10:12'),
(8, 6, 0, '001_NVLeFom - Copy', 'jpg', '2014-04-23 21:28:22'),
(9, 0, 0, '001_NVLeFom', 'jpg', '2014-04-23 21:28:22'),
(10, 10, 0, '001_NVLeFom - Copy', 'jpg', '2014-04-23 21:31:56'),
(11, 0, 0, '001_NVLeFom', 'jpg', '2014-04-23 21:31:56'),
(12, 11, 0, '002_DPr3BlP', 'jpg', '2014-04-23 21:53:30'),
(13, 11, 0, '2Uh4L4C', 'jpg', '2014-05-04 06:37:37'),
(14, 15, 0, '002_DPr3BlP', 'jpg', '2014-04-23 21:55:46'),
(15, 0, 0, '2Uh4L4C', 'jpg', '2014-04-23 21:55:46'),
(16, 17, 0, '002_DPr3BlP', 'jpg', '2014-04-23 22:04:38'),
(17, 0, 0, '2Uh4L4C', 'jpg', '2014-04-23 22:04:38'),
(18, 18, 0, '002_DPr3BlP', 'jpg', '2014-04-23 22:05:48'),
(19, 0, 0, '2Uh4L4C', 'jpg', '2014-04-23 22:05:48'),
(20, 19, 0, '002_DPr3BlP', 'jpg', '2014-04-23 22:06:40'),
(21, 0, 0, '2Uh4L4C', 'jpg', '2014-04-23 22:06:40'),
(22, 0, 0, '002_DPr3BlP', 'jpg', '2014-04-23 22:16:01'),
(23, 0, 0, '2Uh4L4C', 'jpg', '2014-04-23 22:16:01'),
(24, 0, 0, '2Uh4L4C', 'jpg', '2014-04-25 17:30:04'),
(25, 0, 0, '003_S1KHwzl', 'jpg', '2014-04-25 17:30:04'),
(26, 30, 0, '002_DPr3BlP - Copy', 'jpg', '2014-04-25 17:32:20'),
(27, 30, 0, '002_DPr3BlP', 'jpg', '2014-04-25 17:32:20'),
(28, 32, 0, '002_DPr3BlP - Copy', 'jpg', '2014-04-25 17:32:40'),
(29, 32, 0, '002_DPr3BlP', 'jpg', '2014-04-25 17:32:40'),
(30, 33, 0, '001_NVLeFom - Copy', 'jpg', '2014-04-29 01:16:01'),
(31, 33, 0, '001_NVLeFom', 'jpg', '2014-04-29 01:16:01'),
(32, 33, 0, '002_DPr3BlP - Copy', 'jpg', '2014-04-29 01:16:01'),
(33, 33, 0, '002_DPr3BlP', 'jpg', '2014-04-29 01:16:01'),
(34, 33, 0, '2Uh4L4C', 'jpg', '2014-04-29 01:16:01'),
(35, 33, 21, 'Seperator 3-1.jpg', 'jpg', '2014-06-04 15:50:40'),
(36, 37, 21, '20130925_131850.jpg', 'jpg', '2014-06-04 15:54:20'),
(37, 229, 21, '20130925_131733', 'jpg', '2014-06-04 17:38:32'),
(38, 37, 21, '20130925_131850.jpg', 'jpg', '2014-06-04 17:18:15'),
(39, 38, 21, 'Divider-1.png', 'png', '2014-06-04 17:18:15'),
(40, 39, 21, 'fountain72.jpg', 'jpg', '2014-06-04 17:18:15'),
(41, 40, 21, 'Seperator 3-1.jpg', 'jpg', '2014-06-04 17:18:15'),
(42, 41, 21, 'Top Glyph 2.png', 'png', '2014-06-04 17:18:15'),
(43, 230, 21, 'fountain72', 'jpg', '2014-06-04 18:12:48'),
(44, 232, 21, 'Typesetter Header3', 'jpg', '2014-06-04 18:14:49');

-- --------------------------------------------------------

--
-- Table structure for table `session_data`
--

CREATE TABLE IF NOT EXISTS `session_data` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `token` varchar(32) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `songs_meta`
--

CREATE TABLE IF NOT EXISTS `songs_meta` (
  `song_id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `song_name` varchar(100) NOT NULL,
  `user_id` int(250) unsigned NOT NULL,
  `lyrics` text NOT NULL,
  `song_desc` text,
  `postdate` datetime NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`song_id`),
  UNIQUE KEY `song_name` (`song_name`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=233 ;

--
-- Dumping data for table `songs_meta`
--

INSERT INTO `songs_meta` (`song_id`, `song_name`, `user_id`, `lyrics`, `song_desc`, `postdate`, `timestamp`) VALUES
(3, 'dsfklj', 0, 'sdlfkj', 'sdflkj', '2014-04-17 15:04:13', '2014-04-17 22:04:13'),
(4, 'asd', 0, 'sdlfkj', 'sdflkj', '2014-04-17 15:06:15', '2014-04-17 22:06:15'),
(5, 'sdf', 0, 'sdlfkj', 'sdflkj', '2014-04-17 15:10:12', '2014-04-17 22:10:12'),
(10, 'O Lord My God', 0, 'It feels wonderful with all rainbows and trees\r\nIt sets a joy in your heart and makes you feel free\r\nLet''s enjoy its beauty together.', 'It''s nature!', '2014-04-23 14:31:56', '2014-04-23 21:31:56'),
(11, 'break', 0, 'down', 'the ', '2014-04-23 14:53:30', '2014-04-23 21:53:30'),
(13, 's', 0, 'down', 'the c', '2014-04-23 14:54:40', '2014-04-23 21:54:40'),
(15, 'sd', 0, 'down', 'the cs', '2014-04-23 14:55:46', '2014-04-23 21:55:46'),
(17, 'sdlij', 0, 'down', 'the cs', '2014-04-23 15:04:38', '2014-04-23 22:04:38'),
(18, 'sdlijklj', 0, 'down', 'the cs', '2014-04-23 15:05:48', '2014-04-23 22:05:48'),
(19, 'sdlijkljlk', 0, 'down', 'the cs', '2014-04-23 15:06:40', '2014-04-23 22:06:40'),
(20, 'sdldf', 0, 'down', 'the cs', '2014-04-23 15:08:38', '2014-04-23 22:08:38'),
(21, 'sdldfl', 0, 'down', 'the cs', '2014-04-23 15:08:56', '2014-04-23 22:08:56'),
(22, 'dldflo', 0, 'down', 'the cs', '2014-04-23 15:09:59', '2014-04-23 22:09:59'),
(23, 'dldflfdo', 0, 'down', 'the cs', '2014-04-23 15:13:17', '2014-04-23 22:13:17'),
(24, 'cats', 0, 'down', 'the cs', '2014-04-23 15:15:19', '2014-04-23 22:15:19'),
(26, 'catsdf', 0, 'down', 'the cs', '2014-04-23 15:15:30', '2014-04-23 22:15:30'),
(28, 'YASI HELP', 0, 'down', 'the cs', '2014-04-23 15:16:01', '2014-04-23 22:16:01'),
(29, 'sdiu', 0, 'sdfsdfd', 'k', '2014-04-25 10:30:04', '2014-04-25 17:30:04'),
(30, 'rtyuio', 0, 'tyuio', 'lkj', '2014-04-25 10:32:20', '2014-04-25 17:32:20'),
(32, 'rtyusadsao', 0, 'tyuio', 'lkj', '2014-04-25 10:32:40', '2014-04-25 17:32:40'),
(33, 'lsdjdjkls;f', 0, 'jkl;l', 'lkj', '2014-04-28 18:16:01', '2014-04-29 01:16:01'),
(34, 'test', 0, 'test', 'test', '0000-00-00 00:00:00', '2014-05-01 17:32:42'),
(36, 'tkjest', 0, 'tmkest', 'tlkjest', '0000-00-00 00:00:00', '2014-05-01 17:36:21'),
(37, 'dsflkj', 0, 'sd', 'sldfkj', '0000-00-00 00:00:00', '2014-05-01 17:54:39'),
(38, 'jlksjdfl', 0, 'xldfk', 'sdlkfjsldkf', '0000-00-00 00:00:00', '2014-05-02 01:33:01'),
(39, '3', 0, 'l', 'l', '0000-00-00 00:00:00', '2014-05-11 22:26:41'),
(40, 'f', 0, '1', '1', '0000-00-00 00:00:00', '2014-05-11 22:25:40'),
(41, ':songname', 0, ':lyrics', ':songdesc', '0000-00-00 00:00:00', '2014-05-13 05:16:45'),
(47, 'lkjlkj', 0, 'lkjlkj', 'lkjlkj', '0000-00-00 00:00:00', '2014-05-19 05:15:47'),
(68, 'sdfls', 9, 'dsf', 'sdfl', '0000-00-00 00:00:00', '2014-05-19 16:47:50'),
(87, 'dhdhsus', 0, 'jjsjxj', 'jddjd', '0000-00-00 00:00:00', '2014-05-19 17:37:31'),
(88, 'mjkjhg', 0, 'hjkjhkh', 'kjhkjh', '0000-00-00 00:00:00', '2014-05-19 17:38:27'),
(93, 'skjjjdf', 0, 'sdflkj', 'sdfsf', '0000-00-00 00:00:00', '2014-05-19 17:42:34'),
(96, 'sdfjshdkfjh', 0, 'sdfkm;lsdf;l', '64', '0000-00-00 00:00:00', '2014-05-19 18:15:15'),
(97, '9', 0, '8', '7', '0000-00-00 00:00:00', '2014-05-19 18:18:10'),
(98, 'jlkj', 0, 'jhk', 'gs', '0000-00-00 00:00:00', '2014-05-19 18:19:00'),
(102, 'jkhkjh', 0, 'kjhkjh', 'kjhkjh', '0000-00-00 00:00:00', '2014-05-23 18:56:53'),
(104, 'lkjlkjhkjhfkjhkdjhkjhkdjh', 0, 'sdfsdf', 'sdfj,xcvxbmsdf', '0000-00-00 00:00:00', '2014-05-23 19:02:31'),
(107, 'eweer', 0, 'lkjf', 'jdsfsdf', '0000-00-00 00:00:00', '2014-05-23 19:06:02'),
(108, 'hjkl;sdf', 21, 'skldfjsldkfjsd', 'sdlfkjslfksjdfl', '0000-00-00 00:00:00', '2014-06-03 22:34:27'),
(109, 'lkjdflksdjfslkfjs', 21, 'sdlfm,sdf', 'sdlfksjdf', '0000-00-00 00:00:00', '2014-06-03 22:38:23'),
(110, ',xdfdf,msdf', 21, 'df.s,dfmsdfk', ',sdmfsd,fm', '0000-00-00 00:00:00', '2014-06-03 22:39:30'),
(112, 'temnmnmnst', 0, 'sdfasmndkj', 'dsfmnasdfsa', '0000-00-00 00:00:00', '2014-06-03 23:00:05'),
(114, 'tehmnnmnst', 0, 'sdfasmndkj', 'dfmsdfsdfsa', '0000-00-00 00:00:00', '2014-06-03 23:01:52'),
(116, 'tehmkljnnmnst', 0, 'sdfasmndkj', 'dfmsdfsdfsa', '0000-00-00 00:00:00', '2014-06-03 23:04:29'),
(118, 'tehmkannmnst', 0, 'sdfasmndkj', 'dfmsdfsdfsa', '0000-00-00 00:00:00', '2014-06-03 23:05:06'),
(119, 'thmkannmnst', 0, 'sdfasmndkj', 'dfmsdfsdfsa', '0000-00-00 00:00:00', '2014-06-03 23:05:42'),
(120, 'thkannmnst', 0, 'sdfasmndkj', 'dfmsdfsdfsa', '0000-00-00 00:00:00', '2014-06-03 23:07:21'),
(121, 'tkannmnst', 0, 'sdfasmndkj', 'dfmsdfsdfsa', '0000-00-00 00:00:00', '2014-06-03 23:08:07'),
(123, 'tannmnst', 0, 'sdfasmndkj', 'dfmsdfsdfsa', '0000-00-00 00:00:00', '2014-06-04 03:56:41'),
(124, 'tdsfannmnst', 0, 'sdfasmndkj', 'dfmsdfsdfsa', '0000-00-00 00:00:00', '2014-06-04 03:59:53'),
(125, 'tdsfnnmnst', 0, 'sdfasmndkj', 'dfmsdfsdfsa', '0000-00-00 00:00:00', '2014-06-04 04:03:47'),
(126, 'tdsdnmnst', 0, 'sdfasmndkj', 'dfmsdfsdfsa', '0000-00-00 00:00:00', '2014-06-04 04:07:15'),
(127, 'tdsdnm5nst', 0, 'sdfasmndkj', 'dfmsdfsdfsa', '0000-00-00 00:00:00', '2014-06-04 04:10:22'),
(128, 'td4sdnm5nst', 0, 'sdfasmndkj', 'dfmsdfsdfsa', '0000-00-00 00:00:00', '2014-06-04 04:10:53'),
(129, 'td4sdn5m5nst', 0, 'sdfasmndkj', 'dfmsdfsdfsa', '0000-00-00 00:00:00', '2014-06-04 04:38:20'),
(130, 'td44sdn5m5nst', 0, 'sdfasmndkj', 'dfmsdfsdfsa', '0000-00-00 00:00:00', '2014-06-04 04:39:02'),
(131, 't4sdn5m5nst', 0, 'sdfasmndkj', 'dfmsdfsdfsa', '0000-00-00 00:00:00', '2014-06-04 04:40:05'),
(133, 'tdn5m5nst', 0, 'sdfasmndkj', 'dfmsdfsdfsa', '0000-00-00 00:00:00', '2014-06-04 04:42:36'),
(134, 'tdn5st', 0, 'sdfasmndkj', 'dfmsdfsdfsa', '0000-00-00 00:00:00', '2014-06-04 04:43:10'),
(135, 'tdn55st', 0, 'sdfasmndkj', 'dfmsdfsdfsa', '0000-00-00 00:00:00', '2014-06-04 04:44:11'),
(136, 'tdlfkjad5st', 0, 'sdfasmndkj', 'dfmsdfsdfsa', '0000-00-00 00:00:00', '2014-06-04 04:46:34'),
(137, 'xcvsdlfkjsfdlkj', 21, 'sflksjfdc,mc,', 'lkjfsdfs', '0000-00-00 00:00:00', '2014-06-04 04:47:31'),
(138, 'dskl', 21, 'sdlfkjasdflk', 'xfv,mv', '0000-00-00 00:00:00', '2014-06-04 04:51:53'),
(140, 'xfdf', 21, 'lkj', 'lkj', '0000-00-00 00:00:00', '2014-06-04 05:59:56'),
(141, 'lkjsdfldskjf', 21, 'x,sdf,mnfsd', 'lkj', '0000-00-00 00:00:00', '2014-06-04 06:21:50'),
(143, 'xlfkjsdflsdfm', 21, 'sldkfsd,fsmlcks', 'sd,.msdfsdfdslk', '0000-00-00 00:00:00', '2014-06-04 06:33:13'),
(144, 'xdfgdjgdkjh', 21, 'ghjkl', 'ghjkl', '0000-00-00 00:00:00', '2014-06-04 06:33:31'),
(145, 'poiu', 21, 'poiu', 'poiuy', '0000-00-00 00:00:00', '2014-06-04 06:34:39'),
(147, 'pokjiu', 21, 'poiu', 'poiuy', '0000-00-00 00:00:00', '2014-06-04 06:36:19'),
(149, 'oijijhu8hb', 21, 'oijijn8iuh', 'oihujnsdfjs', '0000-00-00 00:00:00', '2014-06-04 06:44:21'),
(150, 'kjnkj', 21, 'sdfosd9f', 'lsjndf', '0000-00-00 00:00:00', '2014-06-04 06:46:31'),
(151, 'l', 21, 'l', 'l', '0000-00-00 00:00:00', '2014-06-04 06:49:18'),
(171, 'j', 21, 'j', 'j', '0000-00-00 00:00:00', '2014-06-04 15:50:40'),
(176, 'jlj9', 21, 'jj', 'j', '0000-00-00 00:00:00', '2014-06-04 15:54:20'),
(197, 'm', 21, 'm', 'mm', '0000-00-00 00:00:00', '2014-06-04 16:09:33'),
(199, 'qpeo', 21, 'qpeor', 'qpweo', '0000-00-00 00:00:00', '2014-06-04 16:16:18'),
(200, 'sdfls0kf', 21, 'sdf', 'k', '0000-00-00 00:00:00', '2014-06-04 16:17:42'),
(229, 'xdk', 21, 'sdfk', 'dfk', '0000-00-00 00:00:00', '2014-06-04 17:18:15'),
(230, 'sheren', 21, 'sheren', 'dkf', '0000-00-00 00:00:00', '2014-06-04 18:07:05'),
(232, 'testerdf', 21, 'sdflskj', 'lsdkfj', '0000-00-00 00:00:00', '2014-06-04 18:14:49');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `song_id` int(255) unsigned NOT NULL,
  `user_id` int(255) unsigned NOT NULL,
  `tags` varchar(1000) NOT NULL,
  `posdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`tag_id`),
  KEY `song_id` (`song_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`song_id`, `user_id`, `tags`, `posdate`, `tag_id`) VALUES
(0, 0, 'adsflaskdj', '2014-06-03 23:00:05', 1),
(11, 0, 'que dlk dfa', '2014-05-03 19:36:10', 2),
(41, 0, ':tags', '2014-05-13 05:16:45', 3),
(0, 0, 'ad,sflaskdj', '2014-06-03 23:01:52', 4),
(0, 0, 'ad,sflaskdj', '2014-06-03 23:04:29', 5),
(0, 0, 'ad,sflaskdj', '2014-06-03 23:05:06', 6),
(0, 0, 'ad,sflaskdj', '2014-06-03 23:05:42', 7),
(0, 0, 'ad,sflaskdj', '2014-06-03 23:07:21', 8),
(0, 0, 'ad,sflaskdj', '2014-06-03 23:08:07', 9),
(0, 0, 'ad,sflaskdj', '2014-06-04 03:56:41', 10),
(0, 0, 'ad,sflaskdj', '2014-06-04 03:59:53', 11),
(0, 0, 'ad,sflaskdj', '2014-06-04 04:03:47', 12),
(0, 0, 'ad,sflaskdj', '2014-06-04 04:07:15', 13),
(0, 0, 'ad,sflaskdj', '2014-06-04 04:10:22', 14),
(0, 0, 'ad,sflaskdj', '2014-06-04 04:10:53', 15),
(0, 0, 'ad,sflaskdj', '2014-06-04 04:38:20', 16),
(0, 0, 'ad,sflaskdj', '2014-06-04 04:39:02', 17),
(0, 0, 'ad,sflaskdj', '2014-06-04 04:40:05', 18),
(0, 0, 'ad,sflaskdj', '2014-06-04 04:42:36', 19),
(0, 0, 'ad,sflaskdj', '2014-06-04 04:43:10', 20),
(135, 0, 'ad,sflaskdj', '2014-06-04 04:44:11', 21),
(136, 0, 'ad,sflaskdj', '2014-06-04 04:46:34', 22),
(0, 21, 'dflgkdflkdvf', '2014-06-04 04:47:31', 23),
(138, 21, 'dlfsldkfjs', '2014-06-04 04:51:53', 24),
(140, 21, 'lkj', '2014-06-04 05:59:56', 25),
(141, 21, ',mn', '2014-06-04 06:21:50', 26),
(143, 21, 's,dfmsdfslkfj', '2014-06-04 06:33:13', 27),
(144, 21, 'bnm', '2014-06-04 06:33:31', 28),
(145, 21, 'oiuy', '2014-06-04 06:34:39', 29),
(147, 21, 'oiuy', '2014-06-04 06:36:19', 30),
(149, 21, 'lknl', '2014-06-04 06:44:21', 31),
(150, 21, 'msndfs', '2014-06-04 06:46:31', 32),
(171, 21, 'j', '2014-06-04 15:50:40', 33),
(176, 21, 'j', '2014-06-04 15:54:20', 37),
(197, 21, 'm', '2014-06-04 16:09:33', 55),
(199, 21, 'ewrpw', '2014-06-04 16:16:18', 56),
(0, 21, 'df', '2014-06-04 18:07:05', 57);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `email` varchar(60) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `is_accepted` tinyint(1) NOT NULL DEFAULT '0',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `pass`, `email`, `salt`, `is_verified`, `is_accepted`, `is_admin`) VALUES
(1, 'nova', 'q54atdb5kci', 'test@gmail.com', 'ldkjfslfkjsdfs0d9fsd0f98sd0f98s0', 1, 1, 1),
(2, 'test', 'z', 'another@yahoo.com', 'slfkjasdof8asd0fjds09ij', 0, 0, 0),
(3, 'tester', 'eeb0763a3b7c9b50c254', '', '0b79bff1833a2eda097447d1c06bc343', 0, 1, 0),
(4, 'nne', 'sdfasdf', '''trey@yahoo.com''', 'dsafalsdkfjas', 0, 1, 0),
(6, 'nlkjne', 'sdfasdf', 'tdrey@yahoo.com', 'dsaflkalsdkfjas', 0, 1, 0),
(21, 'novak', '88c9056b94a7d7a4026f82f0d5aae9a3', 'test@gam.com', '91ec77e44bc4995d27e4632b4927fbe8', 0, 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
