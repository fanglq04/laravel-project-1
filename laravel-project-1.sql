-- --------------------------------------------------------
-- 主机:                           127.0.0.1
-- 服务器版本:                        5.7.13-log - MySQL Community Server (GPL)
-- 服务器操作系统:                      Win32
-- HeidiSQL 版本:                  9.2.0.4947
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 导出 laravel-project-1 的数据库结构
CREATE DATABASE IF NOT EXISTS `laravel-project-1` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `laravel-project-1`;


-- 导出  表 laravel-project-1.lp_countries 结构
CREATE TABLE IF NOT EXISTS `lp_countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- 正在导出表  laravel-project-1.lp_countries 的数据：~5 rows (大约)
/*!40000 ALTER TABLE `lp_countries` DISABLE KEYS */;
INSERT INTO `lp_countries` (`id`, `name`) VALUES
	(1, '中国'),
	(2, '美国'),
	(3, '新加坡'),
	(4, '马来西亚'),
	(5, '泰国');
/*!40000 ALTER TABLE `lp_countries` ENABLE KEYS */;


-- 导出  表 laravel-project-1.lp_posts 结构
CREATE TABLE IF NOT EXISTS `lp_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- 正在导出表  laravel-project-1.lp_posts 的数据：~17 rows (大约)
/*!40000 ALTER TABLE `lp_posts` DISABLE KEYS */;
INSERT INTO `lp_posts` (`id`, `user_id`, `title`) VALUES
	(1, 1, '1212'),
	(2, 1, 'this is test 1'),
	(3, 2, 'this is test 2'),
	(4, 2, 'this is test 3'),
	(5, 3, 'this is test4'),
	(6, 3, 'this is test5'),
	(7, 4, 'this is test 6'),
	(8, 5, 'this is test 7'),
	(9, 5, 'this is test 7'),
	(10, 6, 'this is test 7'),
	(11, 6, 'this is test 7'),
	(12, 7, 'this is test 7'),
	(13, 7, 'this is test 7'),
	(14, 8, 'this is test 7'),
	(15, 9, 'this is test 7'),
	(16, 9, 'this is test 7'),
	(17, 10, 'this is test 7');
/*!40000 ALTER TABLE `lp_posts` ENABLE KEYS */;


-- 导出  表 laravel-project-1.lp_users 结构
CREATE TABLE IF NOT EXISTS `lp_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `remember_token` varchar(250) NOT NULL,
  `country_id` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- 正在导出表  laravel-project-1.lp_users 的数据：~1 rows (大约)
/*!40000 ALTER TABLE `lp_users` DISABLE KEYS */;
INSERT INTO `lp_users` (`id`, `name`, `email`, `password`, `remember_token`, `country_id`, `created_at`, `updated_at`) VALUES
	(1, 'test1', 'test1@123.com', '$2y$10$IOb7vVuIGvmY1QONq96eo.vJy2tMGi0hu8ToyGd8JN9efOIIBarVe', 'w3YE03MWm4iY8YsEfHxBfEwZtybXCqYvyt5ALnbbWR8eDGSQqvmjItOjxiNO', 1, 1467700345, 1467705821),
	(2, 'test2', 'test2@123.com', '$2y$10$KMlKOYUr6NwnENSa.bQ2.eGADJOWtAYl0N0jGb4YYi7OBr6y5EBQm', '', 0, 1467706104, 1467706104);
/*!40000 ALTER TABLE `lp_users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
