-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 02 2022 г., 07:53
-- Версия сервера: 5.6.51
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `autorisation`
--

-- --------------------------------------------------------

--
-- Структура таблицы `autorisation`
--

CREATE TABLE `autorisation` (
  `login` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `autorisation`
--

INSERT INTO `autorisation` (`login`, `password`, `site`, `color`) VALUES
('user1', '6dbd0fe19c9a301c4708287780df41a2', 'Факт', 'yellow'),
('admin', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Факт', 'red'),
('user2', '4cc2321ca77b832bd20b66f86f85bef6', 'Битрикс', 'green'),
('user3', 'a6fc8c37c5a4ee63f21c8cddedc44e4b', 'Битрикс', 'red');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
