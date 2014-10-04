-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://wwwmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2014 at 11:12 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wellspr_data`
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
  KEY `type` (`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

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
