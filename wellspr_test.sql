-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
<<<<<<< HEAD
-- Generation Time: Sep 06, 2014 at 02:12 AM
=======
<<<<<<< HEAD
-- Generation Time: Sep 05, 2014 at 08:55 AM
=======
<<<<<<< HEAD
-- Generation Time: Sep 04, 2014 at 07:54 AM
>>>>>>> origin/business-branch
>>>>>>> origin/business-branch
-- Server version: 5.6.16
-- PHP Version: 5.5.11
=======
-- Generation Time: Aug 26, 2014 at 04:38 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19
>>>>>>> origin/business-branch

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
  `song_id` int(255) unsigned NOT NULL,
  `user_id` int(255) unsigned NOT NULL,
  `embed_id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `embeds` varchar(100) NOT NULL,
  `postdate` datetime NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`embed_id`),
  KEY `song_id` (`song_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `group_id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(40) NOT NULL,
  `group_desc` text NOT NULL,
  `type` tinyint(4) NOT NULL,
  `user_id` int(255) unsigned NOT NULL,
  PRIMARY KEY (`group_id`),
  KEY `user_id` (`user_id`),
  KEY `type` (`type`)
<<<<<<< HEAD
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;
=======
<<<<<<< HEAD
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;
=======
<<<<<<< HEAD
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;
=======
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;
>>>>>>> origin/business-branch
>>>>>>> origin/business-branch
>>>>>>> origin/business-branch

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`, `group_desc`, `type`, `user_id`) VALUES
<<<<<<< HEAD
(5, 'YES', 'FINALLY', 1, 1),
(9, 'Cool, dood', 'yeah', 2, 0);
=======
<<<<<<< HEAD
(5, 'YES', 'FINALLY', 1, 1),
(9, 'Cool, dood', 'yeah', 2, 0);
=======
<<<<<<< HEAD
(5, 'YES', 'FINALLY', 1, 1),
(8, 'a', 'b', 1, 1),
(9, 'Cool, dood', 'yeah', 2, 0);
=======
(1, 'test', 'this is a test', 2, 1),
(2, 'test', 'this is a test', 2, 1),
(3, 'test', 'this is a test', 2, 1),
(4, 'test', 'this is a test', 2, 1),
(5, 'YES', 'FINALLY', 1, 0),
(8, 'a', 'b', 1, 1);
>>>>>>> origin/business-branch
>>>>>>> origin/business-branch
>>>>>>> origin/business-branch

-- --------------------------------------------------------

--
-- Table structure for table `groups_lookup`
--

CREATE TABLE IF NOT EXISTS `groups_lookup` (
  `lookup_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(255) unsigned NOT NULL,
  `song_id` int(255) unsigned NOT NULL,
  `user_id` int(255) unsigned NOT NULL,
  PRIMARY KEY (`lookup_id`),
  KEY `group_id` (`group_id`),
  KEY `song_id` (`song_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `groups_lookup`
--

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> origin/business-branch
INSERT INTO `groups_lookup` (`lookup_id`, `group_id`, `song_id`, `user_id`) VALUES
(1, 9, 37, 0),
(2, 9, 49, 0),
(3, 9, 50, 0),
(5, 5, 49, 1);
<<<<<<< HEAD
=======
=======
INSERT INTO `groups_lookup` (`group_id`, `song_id`, `user_id`) VALUES
<<<<<<< HEAD
(9, 37, 0),
(9, 49, 0),
(9, 50, 0);
=======
(1, 30, 1),
(1, 32, 1),
(1, 33, 1),
(1, 34, 1),
(2, 30, 1),
(2, 32, 1),
(2, 33, 1),
(2, 34, 1),
(3, 30, 1),
(3, 32, 1),
(3, 33, 1),
(3, 34, 1),
(4, 30, 1),
(4, 32, 1),
(4, 33, 1),
(4, 34, 1),
(5, 30, 0),
(5, 33, 0),
(8, 33, 1),
(8, 38, 1),
(8, 48, 1);
>>>>>>> origin/business-branch
>>>>>>> origin/business-branch
>>>>>>> origin/business-branch

-- --------------------------------------------------------

--
-- Table structure for table `group_type`
--

CREATE TABLE IF NOT EXISTS `group_type` (
  `type_id` tinyint(4) NOT NULL,
  `type_name` varchar(40) NOT NULL,
  `type_desc` varchar(250) NOT NULL,
  PRIMARY KEY (`type_id`),
  UNIQUE KEY `type_name` (`type_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_type`
--

INSERT INTO `group_type` (`type_id`, `type_name`, `type_desc`) VALUES
(1, 'Album', 'Recorded as a set, or relased as a set to the public - usually by one artist.'),
(2, 'Compilation', 'Assorted songs that fit a mood, or are complimentary.');

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
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`media_id`),
  KEY `song_id` (`song_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`media_id`, `song_id`, `user_id`, `media_name`, `filetype`, `timestamp`) VALUES
(2, 37, 1, '9asJe', 'jpg', '2014-07-22 03:08:42'),
(3, 38, 1, '88la2', 'jpg', '2014-07-22 03:27:04'),
(4, 38, 1, 'a0uoN', 'jpg', '2014-07-22 03:27:04'),
(6, 47, 1, 'The Misha Song ', 'mp3', '2014-08-16 03:35:03'),
(8, 48, 1, 'UpiaE', 'jpg', '2014-08-17 18:56:52'),
(9, 49, 1, 'rosariaaaans', 'mp4', '2014-08-26 02:58:24'),
(10, 49, 1, 'FFsplit-2013-03-31_22-01-44-793', 'mp4', '2014-08-26 03:00:23');

-- --------------------------------------------------------

--
-- Table structure for table `session_data`
--

CREATE TABLE IF NOT EXISTS `session_data` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(255) unsigned NOT NULL,
  `token` varchar(32) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
<<<<<<< HEAD
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;
=======
<<<<<<< HEAD
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;
=======
<<<<<<< HEAD
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;
=======
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;
>>>>>>> origin/business-branch

--
-- Dumping data for table `session_data`
--

INSERT INTO `session_data` (`id`, `user_id`, `token`, `timestamp`) VALUES
<<<<<<< HEAD
(12, 1, '9822579a13c21b7a87ee0ebcb69b7a9b', '2014-09-05 06:41:41');
=======
(1, 1, 'b04cf05eaa1b6435607092ef5982c845', '2014-08-25 21:17:44');
>>>>>>> origin/business-branch
>>>>>>> origin/business-branch
>>>>>>> origin/business-branch

-- --------------------------------------------------------

--
-- Table structure for table `songs_meta`
--

CREATE TABLE IF NOT EXISTS `songs_meta` (
  `song_id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `song_name` varchar(100) NOT NULL,
  `user_id` int(255) unsigned NOT NULL DEFAULT '0',
  `lyrics` text NOT NULL,
  `song_desc` text,
  `postdate` datetime NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`song_id`),
  UNIQUE KEY `song_name` (`song_name`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `songs_meta`
--

INSERT INTO `songs_meta` (`song_id`, `song_name`, `user_id`, `lyrics`, `song_desc`, `postdate`, `timestamp`) VALUES
(30, 'Making sure it works', 1, 'This is really getting out of hand, or something.', 'This is a test song.', '2014-06-27 02:58:02', '2014-08-17 19:22:24'),
(32, 'hahah', 1, 'ahah', 'ahahaha', '2014-07-02 05:17:05', '2014-07-02 03:17:05'),
(33, 'aaaaaaaahaha', 1, 'hahah', 'ahah', '2014-07-02 05:18:23', '2014-07-02 03:18:23'),
(34, 'dfsd', 1, 'asdfasdf', 'asdfaf', '2014-07-02 05:24:51', '2014-07-02 03:24:51'),
(37, 'plz', 1, 'work', 'thnx', '2014-07-22 05:08:42', '2014-07-22 03:08:42'),
(38, 'two', 1, 'testing', 'the', '2014-07-22 05:27:04', '2014-07-22 03:27:04'),
(39, 'this is a story', 0, 'about life, y\\''know', 'like dood', '2014-08-01 04:01:30', '2014-08-01 02:01:30'),
(40, 'boom bam shebang', 0, 'hello there', 'fadgadsf', '2014-08-05 18:31:37', '2014-08-05 16:31:37'),
(42, 'why no', 1, 'f', 'd', '2014-08-16 05:25:17', '2014-08-16 03:25:17'),
(47, 'Zdsd', 1, 'asdasd', 'asda', '2014-08-16 05:35:03', '2014-08-16 03:35:03'),
(48, 'delete me', 1, 'please', 'do it', '2014-08-17 20:55:56', '2014-08-17 18:55:56'),
(49, 'video', 0, 'lookie here', 'it works?', '2014-08-26 04:53:06', '2014-09-03 20:12:38'),
(50, 'testac', 0, 'testac', 'testac', '2014-09-03 22:18:41', '2014-09-03 20:22:39');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `song_id` int(255) unsigned NOT NULL,
  `user_id` int(255) unsigned NOT NULL,
  `tags` varchar(1000) NOT NULL,
  `postdate` datetime NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tags_id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`tags_id`),
  UNIQUE KEY `song_id_2` (`song_id`),
  UNIQUE KEY `song_id_3` (`song_id`),
  KEY `song_id` (`song_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=83 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`song_id`, `user_id`, `tags`, `postdate`, `timestamp`, `tags_id`) VALUES
(37, 1, 'plz, plz,  k', '2014-08-17 20:52:08', '2014-07-22 03:08:42', 23),
(38, 1, 'two, tings', '2014-07-22 05:27:04', '2014-07-22 03:27:04', 24),
(39, 0, 'this, is, a, story, yeah', '2014-08-01 04:01:30', '2014-08-01 02:01:30', 25),
(40, 0, 'boom, bam, shebang, df,  asdfkajsd,  asdfaskdjf', '2014-08-05 18:31:37', '2014-08-05 16:31:37', 26),
(42, 1, 'why, no', '2014-08-16 05:25:17', '2014-08-16 03:25:17', 28),
(47, 1, 'Zdsd, a', '2014-08-16 05:35:03', '2014-08-16 03:35:03', 33),
(48, 1, 'delete, me, delete, me, agents of shield', '2014-08-17 21:19:55', '2014-08-17 18:55:56', 35),
(30, 1, 'Making, sure, it, works', '2014-08-17 21:49:39', '2014-08-17 19:30:44', 53),
(33, 1, 'aaaaaaaahaha', '2014-08-17 22:03:49', '2014-08-17 19:49:48', 80),
(49, 1, 'video', '2014-08-26 05:00:23', '2014-08-26 02:53:06', 81),
(50, 0, 'testac', '2014-09-03 22:18:41', '2014-09-03 20:18:41', 82);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `pass`, `email`, `salt`, `is_verified`, `is_accepted`, `is_admin`) VALUES
(0, 'anonymous', 'be8d2c5fd7ea1889d37eade115ee6a47', 'mail@yahoo.com', '88bfb546294e94dacfd655c5bc30222e', 0, 0, 0),
(1, 'novak', '2cf57e4d94d09ccda03d6094b61add5a', 'pokepower@sprico.com', '238034763abccfbe5ce501707b30bdc1', 0, 1, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `embeds`
--
ALTER TABLE `embeds`
  ADD CONSTRAINT `embeds_ibfk_1` FOREIGN KEY (`song_id`) REFERENCES `songs_meta` (`song_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `groups_lookup`
--
ALTER TABLE `groups_lookup`
  ADD CONSTRAINT `groups_lookup_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `groups_lookup_ibfk_2` FOREIGN KEY (`song_id`) REFERENCES `songs_meta` (`song_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `groups_lookup_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`song_id`) REFERENCES `songs_meta` (`song_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `media_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `session_data`
--
ALTER TABLE `session_data`
  ADD CONSTRAINT `session_data_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `songs_meta`
--
ALTER TABLE `songs_meta`
  ADD CONSTRAINT `songs_meta_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `tags_ibfk_1` FOREIGN KEY (`song_id`) REFERENCES `songs_meta` (`song_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tags_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
