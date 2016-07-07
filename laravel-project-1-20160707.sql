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


-- 导出  表 laravel-project-1.lp_jobs 结构
CREATE TABLE IF NOT EXISTS `lp_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_reserved_reserved_at_index` (`queue`,`reserved`,`reserved_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  laravel-project-1.lp_jobs 的数据：~0 rows (大约)
/*!40000 ALTER TABLE `lp_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `lp_jobs` ENABLE KEYS */;


-- 导出  表 laravel-project-1.lp_migrations 结构
CREATE TABLE IF NOT EXISTS `lp_migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  laravel-project-1.lp_migrations 的数据：6 rows
/*!40000 ALTER TABLE `lp_migrations` DISABLE KEYS */;
INSERT INTO `lp_migrations` (`migration`, `batch`) VALUES
	('2014_10_12_000000_create_users_table', 1),
	('2014_10_12_100000_create_password_resets_table', 1),
	('2016_07_05_092509_add_cashier_to_users_table', 2),
	('2016_07_06_094045_create_jobs_table', 3),
	('2016_07_07_021007_session', 4),
	('2016_07_07_035849_create_tasks_table', 5);
/*!40000 ALTER TABLE `lp_migrations` ENABLE KEYS */;


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


-- 导出  表 laravel-project-1.lp_sessions 结构
CREATE TABLE IF NOT EXISTS `lp_sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  laravel-project-1.lp_sessions 的数据：~0 rows (大约)
/*!40000 ALTER TABLE `lp_sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `lp_sessions` ENABLE KEYS */;


-- 导出  表 laravel-project-1.lp_subscriptions 结构
CREATE TABLE IF NOT EXISTS `lp_subscriptions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stripe_plan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  laravel-project-1.lp_subscriptions 的数据：~0 rows (大约)
/*!40000 ALTER TABLE `lp_subscriptions` DISABLE KEYS */;
/*!40000 ALTER TABLE `lp_subscriptions` ENABLE KEYS */;


-- 导出  表 laravel-project-1.lp_tasks 结构
CREATE TABLE IF NOT EXISTS `lp_tasks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  laravel-project-1.lp_tasks 的数据：~7 rows (大约)
/*!40000 ALTER TABLE `lp_tasks` DISABLE KEYS */;
INSERT INTO `lp_tasks` (`id`, `user_id`, `name`, `created_at`, `updated_at`) VALUES
	(3, 1, '7899', '2016-07-07 14:45:11', '2016-07-07 14:45:13'),
	(7, 3, 'pifdg', '2016-07-07 06:44:38', '2016-07-07 06:44:38'),
	(8, 3, 'uysdd', '2016-07-07 06:44:51', '2016-07-07 06:44:51'),
	(9, 2, '8989878', '2016-07-07 06:54:41', '2016-07-07 06:54:41'),
	(10, 3, 'adassdas', '2016-07-07 07:34:18', '2016-07-07 07:34:18'),
	(11, 3, 'sdasda', '2016-07-07 07:34:40', '2016-07-07 07:34:40'),
	(12, 3, 'gsdsd', '2016-07-07 07:35:23', '2016-07-07 07:35:23');
/*!40000 ALTER TABLE `lp_tasks` ENABLE KEYS */;


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
  `fans` int(11) NOT NULL COMMENT '粉丝数，测试',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- 正在导出表  laravel-project-1.lp_users 的数据：~4 rows (大约)
/*!40000 ALTER TABLE `lp_users` DISABLE KEYS */;
INSERT INTO `lp_users` (`id`, `name`, `email`, `password`, `remember_token`, `country_id`, `created_at`, `updated_at`, `fans`) VALUES
	(1, 'test1', 'test1@123.com', '$2y$10$AtgvoJMTOp9v5moClAwWROknQ/t16k8yb2KdlI90UqeVScTj.WTzK', '', 1, 1467700345, 1467791586, 0),
	(2, 'test2', 'test2@123.com', '$2y$10$B4SUdqmYfDINpn6/PXBT7OpxHe5ZRtE..9jtdoxtPuqLPvaKByxX6', '', 0, 1467706104, 1467792780, 0),
	(3, 'test3', 'test3@123.com', '$2y$10$GNyD/hTKi7hTGaPc0wXPqOQ1kUMazagxQL/GbqY5Uw1zQ2z7gw7oa', 'GyAlYjrp312pLpnrYp5DJXQJFVyJpsRHHCwUsNVDDuFA8BcnrvyPAbH6tP3N', 0, 1467860743, 1467879421, 0),
	(4, 'test4', 'test4@123.com', '$2y$10$sOREaFEa0Ajra8LPLGs.jeGPVmru0gUceag.B.1t2b/N7byTDXBFq', '', 0, 1467879435, 1467879435, 0);
/*!40000 ALTER TABLE `lp_users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
