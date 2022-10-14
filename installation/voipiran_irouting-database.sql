-- Adminer 4.8.1 MySQL 5.5.68-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `voipiran_irouting`;
CREATE DATABASE `voipiran_irouting` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `voipiran_irouting`;

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `route_name` varchar(30) NOT NULL,
  `route_name_title` varchar(30) NOT NULL,
  `route_desc` varchar(200) NOT NULL,
  `timespan` int(10) NOT NULL,
  `play_agent_num` varchar(1) NOT NULL,
  `prompt1` varchar(100) DEFAULT NULL,
  `prompt2` varchar(100) DEFAULT NULL,
  `prompt3` varchar(100) DEFAULT NULL,
  `accept_digit` varchar(1) DEFAULT NULL,
  `enable` tinyint(4) NOT NULL,
  `priority` int(11) NOT NULL,
  `agent_num_prefix` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `settings` (`id`, `route_name`, `route_name_title`, `route_desc`, `timespan`, `play_agent_num`, `prompt1`, `prompt2`, `prompt3`, `accept_digit`, `enable`, `priority`, `agent_num_prefix`) VALUES
(1,	'last-talk-to',	'آخرین مکالمه به شرکت',	'هدایت مشتری به کارشناس مربوطه در آخرین مکالمه انجام شده یه طرف شرکت.',	1,	'0',	'prompt-ltt-1.wav',	'prompt-ltt-2.wav',	'prompt-ltt-3.wav',	'1',	0,	30,	'_'),
(2,	'last-talk-from',	'آخرین مکالمه از شرکت',	'هدایت مشتری به کارشناس مربوطه در آخرین مکالمه انجام شده از طرف شرکت.',	1,	'0',	'prompt-ltf-1.wav',	'prompt-ltf-2.wav',	'prompt-ltf-3.wav',	'1',	1,	20,	'_'),
(3,	'last-mised-from',	'تماس از دست رفته',	'هدایت تماس گیرنده به کارشناس مربوطه در آخرین تماس از دست رفته از شرکت.',	1,	'1',	'prompt-lmf-1.wav',	'prompt-lmf-2.wav',	'prompt-lmf-3.wav',	'1',	1,	10,	'_');

-- 2022-10-14 14:41:17
