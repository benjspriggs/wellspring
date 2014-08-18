-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2014 at 09:06 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cdcol`
--

-- --------------------------------------------------------

--
-- Table structure for table `cds`
--

CREATE TABLE IF NOT EXISTS `cds` (
  `titel` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `interpret` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `jahr` int(11) DEFAULT NULL,
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `cds`
--

INSERT INTO `cds` (`titel`, `interpret`, `jahr`, `id`) VALUES
('Beauty', 'Ryuichi Sakamoto', 1990, 1),
('Goodbye Country (Hello Nightclub)', 'Groove Armada', 2001, 4),
('Glee', 'Bran Van 3000', 1997, 5);
--
-- Database: `phpmyadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `pma_bookmark`
--

CREATE TABLE IF NOT EXISTS `pma_bookmark` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pma_column_info`
--

CREATE TABLE IF NOT EXISTS `pma_column_info` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin' AUTO_INCREMENT=42 ;

--
-- Dumping data for table `pma_column_info`
--

INSERT INTO `pma_column_info` (`id`, `db_name`, `table_name`, `column_name`, `comment`, `mimetype`, `transformation`, `transformation_options`) VALUES
(1, 'wellspr_test', 'embeds', 'song_id', '', '', '_', ''),
(2, 'wellspr_test', 'embeds', 'user_id', '', '', '_', ''),
(3, 'wellspr_test', 'embeds', 'embed_id', '', '', '_', ''),
(4, 'wellspr_test', 'embeds', 'embeds', '', '', '_', ''),
(5, 'wellspr_test', 'embeds', 'postdate', '', '', '_', ''),
(6, 'wellspr_test', 'embeds', 'timestamp', '', '', '_', ''),
(7, 'wellspr_test', 'media', 'media_id', '', '', '_', ''),
(8, 'wellspr_test', 'media', 'song_id', '', '', '_', ''),
(9, 'wellspr_test', 'media', 'user_id', '', '', '_', ''),
(10, 'wellspr_test', 'media', 'media_name', '', '', '_', ''),
(11, 'wellspr_test', 'media', 'filetype', '', '', '_', ''),
(12, 'wellspr_test', 'media', 'postdate', '', '', '_', ''),
(13, 'wellspr_test', 'session_data', 'id', '', '', '_', ''),
(14, 'wellspr_test', 'session_data', 'user_id', '', '', '_', ''),
(15, 'wellspr_test', 'session_data', 'token', '', '', '_', ''),
(16, 'wellspr_test', 'session_data', 'timestamp', '', '', '_', ''),
(17, 'wellspr_test', 'songs_meta', 'song_id', '', '', '_', ''),
(18, 'wellspr_test', 'songs_meta', 'song_name', '', '', '_', ''),
(19, 'wellspr_test', 'songs_meta', 'user_id', '', '', '_', ''),
(20, 'wellspr_test', 'songs_meta', 'lyrics', '', '', '_', ''),
(21, 'wellspr_test', 'songs_meta', 'song_desc', '', '', '_', ''),
(22, 'wellspr_test', 'songs_meta', 'postdate', '', '', '_', ''),
(23, 'wellspr_test', 'songs_meta', 'timestamp', '', '', '_', ''),
(24, 'wellspr_test', 'tags', 'tag_id', '', '', '_', ''),
(25, 'wellspr_test', 'tags', 'timestamp', '', '', '_', ''),
(26, 'wellspr_test', 'tags', 'postdate', '', '', '_', ''),
(27, 'wellspr_test', 'media', 'timestamp', '', '', '_', ''),
(28, 'wellspr_test', 'groups_lookup', 'group_id', '', '', '_', ''),
(29, 'wellspr_test', 'groups_lookup', 'song_id', '', '', '_', ''),
(30, 'wellspr_test', 'groups_lookup', 'user_id', '', '', '_', ''),
(31, 'wellspr_test', 'groups', 'group_id', '', '', '_', ''),
(32, 'wellspr_test', 'groups', 'group_name', '', '', '_', ''),
(33, 'wellspr_test', 'groups', 'group_desc', '', '', '_', ''),
(34, 'wellspr_test', 'groups', 'type', '', '', '_', ''),
(35, 'wellspr_test', 'groups', 'user_id', '', '', '_', ''),
(36, 'wellspr_test', 'songs_meta', 'id', '', '', '_', ''),
(37, 'wellspr_test', 'media', 'id', '', '', '_', ''),
(38, 'wellspr_test', 'tags', 'id', '', '', '_', ''),
(39, 'wellspr_test', 'users', 'id', '', '', '_', ''),
(40, 'wellspr_test', 'users', 'user_id', '', '', '_', ''),
(41, 'wellspr_test', 'tags', 'tags_id', '', '', '_', '');

-- --------------------------------------------------------

--
-- Table structure for table `pma_designer_coords`
--

CREATE TABLE IF NOT EXISTS `pma_designer_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `x` int(11) DEFAULT NULL,
  `y` int(11) DEFAULT NULL,
  `v` tinyint(4) DEFAULT NULL,
  `h` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`db_name`,`table_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma_history`
--

CREATE TABLE IF NOT EXISTS `pma_history` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`,`db`,`table`,`timevalue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pma_pdf_pages`
--

CREATE TABLE IF NOT EXISTS `pma_pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  PRIMARY KEY (`page_nr`),
  KEY `db_name` (`db_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pma_recent`
--

CREATE TABLE IF NOT EXISTS `pma_recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma_recent`
--

INSERT INTO `pma_recent` (`username`, `tables`) VALUES
('root', '[{"db":"wellspr_test","table":"tags"},{"db":"wellspr_test","table":"session_data"},{"db":"wellspr_test","table":"users"},{"db":"wellspr_test","table":"media"},{"db":"wellspr_test","table":"groups"},{"db":"wellspr_test","table":"embeds"},{"db":"wellspr_test","table":"groups_lookup"},{"db":"wellspr_test","table":"songs_meta"},{"db":"information_schema","table":"INNODB_SYS_FOREIGN_COLS"},{"db":"information_schema","table":"INNODB_SYS_FOREIGN"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma_relation`
--

CREATE TABLE IF NOT EXISTS `pma_relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  KEY `foreign_field` (`foreign_db`,`foreign_table`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma_table_coords`
--

CREATE TABLE IF NOT EXISTS `pma_table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float unsigned NOT NULL DEFAULT '0',
  `y` float unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma_table_info`
--

CREATE TABLE IF NOT EXISTS `pma_table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`db_name`,`table_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma_table_uiprefs`
--

CREATE TABLE IF NOT EXISTS `pma_table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`username`,`db_name`,`table_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data for table `pma_table_uiprefs`
--

INSERT INTO `pma_table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'wellspr_test', 'embeds', '{"sorted_col":"embeds.postdate"}', '2014-06-26 04:23:42'),
('root', 'wellspr_test', 'songs_meta', '{"sorted_col":"songs_meta.postdate"}', '2014-06-26 04:23:51');

-- --------------------------------------------------------

--
-- Table structure for table `pma_tracking`
--

CREATE TABLE IF NOT EXISTS `pma_tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) unsigned NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`db_name`,`table_name`,`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma_userconfig`
--

CREATE TABLE IF NOT EXISTS `pma_userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma_userconfig`
--

INSERT INTO `pma_userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2014-06-22 20:01:39', '{"collation_connection":"utf8mb4_general_ci"}');
--
-- Database: `test`
--
--
-- Database: `webauth`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_pwd`
--

CREATE TABLE IF NOT EXISTS `user_pwd` (
  `name` char(30) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `pass` char(32) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `user_pwd`
--

INSERT INTO `user_pwd` (`name`, `pass`) VALUES
('xampp', 'wampp');
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`, `group_desc`, `type`, `user_id`) VALUES
(1, 'test', 'this is a test', 2, 1),
(2, 'test', 'this is a test', 2, 1),
(3, 'test', 'this is a test', 2, 1),
(4, 'test', 'this is a test', 2, 1);

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
(2, 34, 1),
(3, 30, 1),
(3, 32, 1),
(3, 33, 1),
(3, 34, 1),
(4, 30, 1),
(4, 32, 1),
(4, 33, 1),
(4, 34, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`media_id`, `song_id`, `user_id`, `media_name`, `filetype`, `timestamp`) VALUES
(2, 37, 1, '9asJe', 'jpg', '2014-07-22 03:08:42'),
(3, 38, 1, '88la2', 'jpg', '2014-07-22 03:27:04'),
(4, 38, 1, 'a0uoN', 'jpg', '2014-07-22 03:27:04'),
(6, 47, 1, 'The Misha Song ', 'mp3', '2014-08-16 03:35:03'),
(8, 48, 1, 'UpiaE', 'jpg', '2014-08-17 18:56:52');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

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
(48, 'delete me', 1, 'please', 'do it', '2014-08-17 20:55:56', '2014-08-17 18:55:56');

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
(33, 1, 'aaaaaaaahaha', '2014-08-17 22:03:49', '2014-08-17 19:49:48', 80);

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
