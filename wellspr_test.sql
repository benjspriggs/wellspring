-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2014 at 05:05 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wellspr_test`
--

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
  FULLTEXT KEY `group_desc` (`group_desc`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`, `group_desc`, `type`, `user_id`) VALUES
(1, 'test', 'this is a test', 2, 1),
(2, 'test', 'this is a test', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `groups_lookup`
--

CREATE TABLE IF NOT EXISTS `groups_lookup` (
  `group_id` int(255) unsigned NOT NULL,
  `song_id` int(255) unsigned NOT NULL,
  `user_id` int(255) unsigned NOT NULL,
  KEY `group_id` (`group_id`),
  KEY `song_id` (`song_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups_lookup`
--

INSERT INTO `groups_lookup` (`group_id`, `song_id`, `user_id`) VALUES
(1, 30, 1),
(1, 32, 1),
(1, 33, 1),
(1, 34, 1),
(2, 30, 1),
(2, 32, 1),
(2, 33, 1),
(2, 34, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`media_id`, `song_id`, `user_id`, `media_name`, `filetype`, `timestamp`) VALUES
(2, 37, 1, '9asJe', 'jpg', '2014-07-22 03:08:42'),
(3, 38, 1, '88la2', 'jpg', '2014-07-22 03:27:04'),
(4, 38, 1, 'a0uoN', 'jpg', '2014-07-22 03:27:04');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `songs_meta`
--

CREATE TABLE IF NOT EXISTS `songs_meta` (
  `song_id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `song_name` varchar(100) NOT NULL,
  `user_id` int(255) unsigned NOT NULL,
  `lyrics` text NOT NULL,
  `song_desc` text,
  `postdate` datetime NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`song_id`),
  UNIQUE KEY `song_name` (`song_name`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `songs_meta`
--

INSERT INTO `songs_meta` (`song_id`, `song_name`, `user_id`, `lyrics`, `song_desc`, `postdate`, `timestamp`) VALUES
(30, 'Making sure it works', 0, 'Lala/\\r\\nla/\\r\\nthe last line/', 'This is a test song.', '2014-06-27 02:58:02', '2014-06-27 00:58:02'),
(32, 'hahah', 1, 'ahah', 'ahahaha', '2014-07-02 05:17:05', '2014-07-02 03:17:05'),
(33, 'aaaaaaaahaha', 1, 'hahah', 'ahah', '2014-07-02 05:18:23', '2014-07-02 03:18:23'),
(34, 'dfsd', 1, 'asdfasdf', 'asdfaf', '2014-07-02 05:24:51', '2014-07-02 03:24:51'),
(37, 'plz', 1, 'work', 'thnx', '2014-07-22 05:08:42', '2014-07-22 03:08:42'),
(38, 'two', 1, 'testing', 'the', '2014-07-22 05:27:04', '2014-07-22 03:27:04'),
(39, 'this is a story', 0, 'about life, y\\''know', 'like dood', '2014-08-01 04:01:30', '2014-08-01 02:01:30'),
(40, 'boom bam shebang', 0, 'hello there', 'fadgadsf', '2014-08-05 18:31:37', '2014-08-05 16:31:37');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`song_id`, `user_id`, `tags`, `postdate`, `timestamp`, `tags_id`) VALUES
(37, 1, 'plz, k', '2014-07-22 05:08:42', '2014-07-22 03:08:42', 23),
(38, 1, 'two, tings', '2014-07-22 05:27:04', '2014-07-22 03:27:04', 24),
(39, 0, 'this, is, a, story, yeah', '2014-08-01 04:01:30', '2014-08-01 02:01:30', 25),
(40, 0, 'boom, bam, shebang, df,  asdfkajsd,  asdfaskdjf', '2014-08-05 18:31:37', '2014-08-05 16:31:37', 26);

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
(0, 'anonymous', 'be8d2c5fd7ea1889d37eade115ee6a47', 'mail@yahoo.com', '88bfb546294e94dacfd655c5bc30222e', 0, 1, 0),
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
