-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: std-mysql
-- Время создания: Янв 28 2021 г., 10:00
-- Версия сервера: 5.7.26-0ubuntu0.16.04.1
-- Версия PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `std_933`
--

-- --------------------------------------------------------

--
-- Структура таблицы `answers`
--

DROP TABLE IF EXISTS `answers`;
CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `q1` int(11) NOT NULL,
  `q2` int(11) NOT NULL,
  `q3` varchar(30) NOT NULL,
  `q4` text NOT NULL,
  `q5` varchar(50) NOT NULL,
  `q6res1` varchar(50) DEFAULT NULL,
  `q6res2` varchar(50) DEFAULT NULL,
  `q6res3` varchar(50) DEFAULT NULL,
  `balls` int(11) NOT NULL,
  `ip` text NOT NULL,
  `datetime` datetime NOT NULL,
  `good1` tinyint(1) NOT NULL,
  `good2` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `answers`
--

INSERT INTO `answers` (`id`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6res1`, `q6res2`, `q6res3`, `balls`, `ip`, `datetime`, `good1`, `good2`) VALUES
(1, 14, 18, 'Ирина Громова', 'я люблю печеньки', 'холодок+', 'синий+', '', 'жёлтый+', 150, '127.0.0.1', '2020-06-25 16:03:41', 1, 1),
(1, 15, 17, 'Сашка Эрнст', 'я люблю доту', 'пейзаж', 'синий+', '', 'жёлтый+', -50, '127.0.0.1', '2020-06-25 16:04:01', 0, 1),
(1, 1, 12, 'Петя Петров', 'Петя Петров', 'холодок+', 'синий+', '', 'жёлтый+', 150, '127.0.0.1', '2020-06-25 17:26:31', 1, 1),
(1, 5, 23, 'Александр Эрнст', 'Дуракб', 'холодок+', 'синий+', '', 'жёлтый+', 150, '127.0.0.1', '2020-06-25 19:07:33', 1, 1),
(1, 1, 19, 'Карина Османова', 'Я это я', 'холодок+', 'синий+', '', 'жёлтый+', 150, '127.0.0.1', '2020-06-25 20:51:27', 1, 1),
(1, 24, 18, 'Дарья Киселева', 'Даша', 'холодок+', 'синий+', '', 'жёлтый+', 150, '127.0.0.1', '2020-06-26 08:31:15', 1, 1),
(1, 12, 112, 'еркерке кероеноено', 'ререкпкерке', 'пейзаж', 'синий+', 'коричневый', 'жёлтый+', -150, '127.0.0.1', '2020-07-07 17:27:14', 0, 0),
(1, 1, 112, 'еркерке кероеноено', 'бдгшдгш', 'холодок+', '', 'коричневый', 'жёлтый+', 50, '127.0.0.1', '2020-07-09 13:26:14', 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(10) NOT NULL,
  `q1` varchar(50) NOT NULL,
  `q2` varchar(50) NOT NULL,
  `q3` varchar(50) NOT NULL,
  `q4` varchar(50) NOT NULL,
  `q5` varchar(30) NOT NULL,
  `q5res1` varchar(50) NOT NULL,
  `q5res2` varchar(50) NOT NULL,
  `ball5true` int(11) NOT NULL,
  `ball5false` int(11) NOT NULL,
  `q6` varchar(30) NOT NULL,
  `q6res1` varchar(50) NOT NULL,
  `q6res2` varchar(50) NOT NULL,
  `q6res3` varchar(50) NOT NULL,
  `ball6true` int(11) NOT NULL,
  `ball6false` int(11) NOT NULL,
  `closed` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sessions`
--

INSERT INTO `sessions` (`id`, `q1`, `q2`, `q3`, `q4`, `q5`, `q5res1`, `q5res2`, `ball5true`, `ball5false`, `q6`, `q6res1`, `q6res2`, `q6res3`, `ball6true`, `ball6false`, `closed`) VALUES
('1', 'Придумайте любое число!', 'Ваш возраст', 'Ваше имя и фамилия', 'Расскажите о себе', 'В какой строке больше букв?', 'холодок+', 'пейзаж', 100, -100, 'Какие цвета есть в радуге?', 'синий+', 'коричневый', 'жёлтый+', 50, -50, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
