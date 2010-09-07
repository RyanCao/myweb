# --------------------------------------------------------
# Host:                         127.0.0.1
# Database:                     news
# Server version:               5.5.3-m3-community
# Server OS:                    Win64
# HeidiSQL version:             5.0.0.3272
# Date/time:                    2010-09-07 17:07:07
# --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
# Dumping database structure for news
CREATE DATABASE IF NOT EXISTS `news` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `news`;


# Dumping structure for table news.tb_news_ch
CREATE TABLE IF NOT EXISTS `tb_news_ch` (
  `iNewsID` int(10) NOT NULL AUTO_INCREMENT,
  `vcNewsTitle` varchar(1200) DEFAULT NULL,
  PRIMARY KEY (`iNewsID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

# Dumping data for table news.tb_news_ch: 4 rows
/*!40000 ALTER TABLE `tb_news_ch` DISABLE KEYS */;
INSERT INTO `tb_news_ch` (`iNewsID`, `vcNewsTitle`) VALUES (1, 'dsds'), (2, 'dsdsds'), (3, 'dsds c cvc'), (4, 'dsdsdscxcx');
/*!40000 ALTER TABLE `tb_news_ch` ENABLE KEYS */;


# Dumping structure for table news.tb_news_in
CREATE TABLE IF NOT EXISTS `tb_news_in` (
  `iNewsID` int(10) NOT NULL AUTO_INCREMENT,
  `vcNewsTitle` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`iNewsID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

# Dumping data for table news.tb_news_in: 5 rows
/*!40000 ALTER TABLE `tb_news_in` DISABLE KEYS */;
INSERT INTO `tb_news_in` (`iNewsID`, `vcNewsTitle`) VALUES (1, 'dsdas '), (2, '感谢。。。 '), (3, '好东西,謝謝! '), (4, '谢谢楼主 '), (5, '感谢分享！！！ ');
/*!40000 ALTER TABLE `tb_news_in` ENABLE KEYS */;


# Dumping structure for table news.tb_news_mu
CREATE TABLE IF NOT EXISTS `tb_news_mu` (
  `iNewsID` int(10) NOT NULL AUTO_INCREMENT,
  `vcNewsTitle` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`iNewsID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

# Dumping data for table news.tb_news_mu: 0 rows
/*!40000 ALTER TABLE `tb_news_mu` DISABLE KEYS */;
INSERT INTO `tb_news_mu` (`iNewsID`, `vcNewsTitle`) VALUES (1, 'dsdas '), (2, 'dsdas '), (3, 'dsdas '), (4, 'dsdas ');
/*!40000 ALTER TABLE `tb_news_mu` ENABLE KEYS */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
