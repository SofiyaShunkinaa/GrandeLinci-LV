-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 25 2024 г., 22:07
-- Версия сервера: 8.0.29
-- Версия PHP: 8.0.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `grandelinci`
--
CREATE DATABASE IF NOT EXISTS `grandelinci` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `grandelinci`;

-- --------------------------------------------------------

--
-- Структура таблицы `booking_request`
--

CREATE TABLE IF NOT EXISTS `booking_request` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `id_kitten` int NOT NULL,
  `question1` text NOT NULL,
  `question2` text NOT NULL,
  `question3` text,
  `question4` text,
  PRIMARY KEY (`id`),
  KEY `id_kitten` (`id_kitten`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `booking_request`
--

INSERT INTO `booking_request` (`id`, `user_name`, `email`, `phone_number`, `id_kitten`, `question1`, `question2`, `question3`, `question4`) VALUES
(1, 'name', 'email@email.com', '+274957365', 1, 'jojo-k-', 'hjkl;p098u7ytrfdcvbhjkuytgf', 'y89u89898', 'hiuhhuhi');

-- --------------------------------------------------------

--
-- Структура таблицы `cats`
--

CREATE TABLE IF NOT EXISTS `cats` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `id_color` int NOT NULL,
  `id_pattern` int DEFAULT NULL,
  `id_sex` int NOT NULL,
  `img_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_color` (`id_color`),
  KEY `id_pattern` (`id_pattern`),
  KEY `idx_sex` (`id_sex`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `cats`
--

INSERT INTO `cats` (`id`, `name`, `date_of_birth`, `id_color`, `id_pattern`, `id_sex`, `img_path`) VALUES
(1, 'Monica', '2021-01-20', 1, 1, 2, '/assets/images/cats/cat1.png'),
(2, 'Lord', '2015-09-20', 1, NULL, 1, '/assets/images/cats/cat2.png'),
(3, 'Jessy', '2019-09-20', 1, 1, 2, '/assets/images/cats/cat3.png'),
(4, 'Alex', '2020-06-20', 1, NULL, 1, '/assets/images/cats/cat4.png'),
(5, 'Gucci', '2018-05-20', 1, NULL, 2, '/assets/images/cats/cat3.png'),
(6, 'Maggy', '2022-03-20', 1, 1, 2, '/assets/images/cats/cat4.png'),
(7, 'Richard', '2021-12-20', 1, NULL, 1, '/assets/images/cats/cat1.png'),
(8, 'Lessi', '2015-08-20', 1, NULL, 2, '/assets/images/cats/cat2.png'),
(9, 'Sam', '2019-11-20', 1, NULL, 1, '/assets/images/cats/cat2.png'),
(10, 'Mell', '2020-10-20', 1, NULL, 2, '/assets/images/cats/cat4.png'),
(11, 'Karry', '2021-07-20', 1, 1, 2, '/assets/images/cats/cat1.png'),
(12, 'Lucy', '2019-08-20', 1, NULL, 2, '/assets/images/cats/cat3.png'),
(13, 'Robin', '2018-03-20', 1, NULL, 1, '/assets/images/cats/cat4.png'),
(14, 'Jackson', '2021-02-20', 1, NULL, 1, '/assets/images/cats/cat1.png'),
(15, 'Christy', '2022-08-20', 1, NULL, 1, '/assets/images/cats/cat2.png'),
(16, 'Rodger', '2022-12-20', 1, 1, 1, '/assets/images/cats/cat3.png'),
(17, 'NewCat', '2010-01-20', 1, 1, 1, '/assets/images/cats/cat1.png'),
(18, 'test_adding', '2024-02-02', 1, 1, 1, '/assets/images/cats/cat1.png');

-- --------------------------------------------------------

--
-- Структура таблицы `color`
--

CREATE TABLE IF NOT EXISTS `color` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code_name` varchar(2) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_name` (`code_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `color`
--

INSERT INTO `color` (`id`, `code_name`, `name`) VALUES
(1, 'A', 'red');

-- --------------------------------------------------------

--
-- Структура таблицы `kittens`
--

CREATE TABLE IF NOT EXISTS `kittens` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `price` int NOT NULL DEFAULT '0',
  `id_sex` int NOT NULL,
  `age` int NOT NULL,
  `id_mother` int NOT NULL,
  `id_father` int NOT NULL,
  `id_color` int NOT NULL,
  `id_pattern` int DEFAULT NULL,
  `img_path` varchar(255) DEFAULT NULL,
  `castration` int NOT NULL DEFAULT '1',
  `selling` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id_mother` (`id_mother`),
  KEY `id_father` (`id_father`),
  KEY `id_color` (`id_color`),
  KEY `id_pattern` (`id_pattern`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `kittens`
--

INSERT INTO `kittens` (`id`, `name`, `price`, `id_sex`, `age`, `id_mother`, `id_father`, `id_color`, `id_pattern`, `img_path`, `castration`, `selling`) VALUES
(1, '1', 899, 1, 3, 3, 4, 1, NULL, '/assets/images/kittens/kit1.png', 1, 1),
(2, '1', 899, 1, 3, 3, 4, 1, NULL, '/assets/images/kittens/kit2.png', 1, 1),
(3, '1', 899, 2, 3, 3, 4, 1, NULL, '/assets/images/kittens/kit3.png', 1, 1),
(4, '1', 899, 2, 3, 3, 4, 1, NULL, '/assets/images/kittens/kit4.png', 1, 1),
(5, '1', 899, 1, 3, 3, 4, 1, NULL, '/assets/images/kittens/kit5.png', 1, 1),
(6, '1', 899, 2, 3, 3, 4, 1, NULL, '/assets/images/kittens/kit6.png', 1, 1),
(7, '1', 899, 1, 3, 3, 4, 1, NULL, '/assets/images/kittens/kit7.png', 1, 1),
(8, '1', 899, 1, 3, 3, 4, 1, NULL, '/assets/images/kittens/kit8.png', 1, 1),
(9, '1', 899, 2, 3, 3, 4, 1, NULL, '/assets/images/kittens/kit9.png', 1, 1),
(10, '1', 899, 2, 3, 3, 4, 1, NULL, '/assets/images/kittens/kit1.png', 1, 1),
(11, '1', 899, 1, 3, 3, 4, 1, NULL, '/assets/images/kittens/kit2.png', 1, 1),
(12, '1', 899, 1, 3, 3, 4, 1, NULL, '/assets/images/kittens/kit3.png', 1, 1),
(13, '1', 899, 2, 3, 3, 4, 1, NULL, '/assets/images/kittens/kit4.png', 1, 1),
(14, '1', 899, 1, 3, 3, 4, 1, NULL, '/assets/images/kittens/kit5.png', 1, 1),
(15, '1', 899, 2, 3, 3, 4, 1, NULL, '/assets/images/kittens/kit6.png', 1, 1),
(16, 'test', 500, 1, 1, 1, 1, 1, 1, '/assets/images/kittens/kit1.png', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `main_menu`
--

CREATE TABLE IF NOT EXISTS `main_menu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT '#',
  `img_path` varchar(255) DEFAULT NULL,
  `parent_id` int NOT NULL,
  `custom_class` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `main_menu`
--

INSERT INTO `main_menu` (`id`, `name`, `link`, `img_path`, `parent_id`, `custom_class`) VALUES
(1, 'about_us', 'about_us', NULL, 0, NULL),
(2, 'available_kittens', 'available_kittens', NULL, 0, NULL),
(3, 'our_cats', 'our_cats&filter=all&page=1', NULL, 0, NULL),
(4, 'photogallery', 'photogallery', NULL, 0, NULL),
(5, 'about_breed', 'about_breed', NULL, 0, NULL),
(6, 'contacts', 'contacts', NULL, 0, NULL),
(7, NULL, 'our_cats&filter=girls&page=1', NULL, 3, NULL),
(8, NULL, 'our_cats&filter=boys&page=1', NULL, 3, NULL),
(9, NULL, 'our_cats&filter=girls', NULL, 7, NULL),
(10, NULL, '#', NULL, 0, 'secondary'),
(11, NULL, 'tel:+37125614622', NULL, 0, 'secondary'),
(13, NULL, 'mailto:karoleinga@gmail.com', NULL, 0, 'secondary'),
(14, NULL, 'ru', '/assets/images/flags/ru.png', 17, 'secondary has-img'),
(15, NULL, 'lv', '/assets/images/flags/lv.png', 17, 'secondary has-img'),
(16, NULL, 'en', '/assets/images/flags/en.png', 17, 'secondary has-img'),
(17, NULL, '#', NULL, 0, 'secondary dropdown show dropdown-lang'),
(27, 'testing', '#', NULL, 1, '');

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `page_id` smallint NOT NULL AUTO_INCREMENT,
  `page_alias` varchar(255) DEFAULT NULL,
  `page_publish` char(1) DEFAULT 'Y',
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`page_id`, `page_alias`, `page_publish`) VALUES
(1, 'home', 'Y'),
(2, 'available_kittens', 'Y'),
(3, 'our_cats', 'Y'),
(4, 'photogallery', 'Y'),
(5, 'about_breed', 'Y'),
(6, 'contacts', 'Y'),
(7, 'about_us', 'Y');

-- --------------------------------------------------------

--
-- Структура таблицы `pattern`
--

CREATE TABLE IF NOT EXISTS `pattern` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code_name` int NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_name` (`code_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `pattern`
--

INSERT INTO `pattern` (`id`, `code_name`, `name`) VALUES
(1, 2, 'patterned');

-- --------------------------------------------------------

--
-- Структура таблицы `sex`
--

CREATE TABLE IF NOT EXISTS `sex` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `sex`
--

INSERT INTO `sex` (`id`, `name`) VALUES
(1, 'male'),
(2, 'female');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `booking_request`
--
ALTER TABLE `booking_request`
  ADD CONSTRAINT `booking_request_ibfk_1` FOREIGN KEY (`id_kitten`) REFERENCES `kittens` (`id`);

--
-- Ограничения внешнего ключа таблицы `cats`
--
ALTER TABLE `cats`
  ADD CONSTRAINT `cats_ibfk_1` FOREIGN KEY (`id_color`) REFERENCES `color` (`id`),
  ADD CONSTRAINT `cats_ibfk_2` FOREIGN KEY (`id_pattern`) REFERENCES `pattern` (`id`),
  ADD CONSTRAINT `cats_ibfk_3` FOREIGN KEY (`id_sex`) REFERENCES `sex` (`id`);

--
-- Ограничения внешнего ключа таблицы `kittens`
--
ALTER TABLE `kittens`
  ADD CONSTRAINT `kittens_ibfk_1` FOREIGN KEY (`id_mother`) REFERENCES `cats` (`id`),
  ADD CONSTRAINT `kittens_ibfk_2` FOREIGN KEY (`id_father`) REFERENCES `cats` (`id`),
  ADD CONSTRAINT `kittens_ibfk_3` FOREIGN KEY (`id_color`) REFERENCES `color` (`id`),
  ADD CONSTRAINT `kittens_ibfk_4` FOREIGN KEY (`id_pattern`) REFERENCES `pattern` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
