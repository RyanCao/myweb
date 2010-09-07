# --------------------------------------------------------
# Host:                         127.0.0.1
# Database:                     techflash
# Server version:               5.1.47-community
# Server OS:                    Win32
# HeidiSQL version:             5.0.0.3272
# Date/time:                    2010-09-08 00:59:11
# --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
# Dumping database structure for techflash
CREATE DATABASE IF NOT EXISTS `techflash` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `techflash`;


# Dumping structure for table techflash.tech_article
CREATE TABLE IF NOT EXISTS `tech_article` (
  `article_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_title` varchar(100) DEFAULT NULL,
  `article_author` varchar(50) DEFAULT NULL,
  `article_time` int(10) unsigned DEFAULT NULL,
  `article_detail` mediumtext,
  PRIMARY KEY (`article_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='tech_article';

# Dumping data for table techflash.tech_article: 0 rows
/*!40000 ALTER TABLE `tech_article` DISABLE KEYS */;
/*!40000 ALTER TABLE `tech_article` ENABLE KEYS */;


# Dumping structure for table techflash.tech_list
CREATE TABLE IF NOT EXISTS `tech_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(10) unsigned DEFAULT NULL,
  `article_link` varchar(50) DEFAULT NULL,
  `article_info` varchar(500) DEFAULT NULL,
  `article_time` int(10) unsigned DEFAULT NULL,
  `article_title` varchar(100) DEFAULT NULL,
  `article_author` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='tech_list';

# Dumping data for table techflash.tech_list: 2 rows
/*!40000 ALTER TABLE `tech_list` DISABLE KEYS */;
INSERT INTO `tech_list` (`id`, `article_id`, `article_link`, `article_info`, `article_time`, `article_title`, `article_author`) VALUES (1, 1, 'ewe', ' cvdsfdsfdsf', 12323, 'jjjjjjjjj', 'Ryancao'), (2, 2, 'http://www.baidu.com', '这是假的', 889982, '家具家电是多少', 'Ryancao');
/*!40000 ALTER TABLE `tech_list` ENABLE KEYS */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
