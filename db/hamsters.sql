-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 12 2018 г., 20:38
-- Версия сервера: 10.1.32-MariaDB
-- Версия PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hamsters`
--

-- --------------------------------------------------------

--
-- Структура таблицы `hamsters`
--

CREATE TABLE `hamsters` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `age` int(11) NOT NULL,
  `profession` varchar(28) NOT NULL,
  `weight` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `hamsters`
--

INSERT INTO `hamsters` (`id`, `name`, `age`, `profession`, `weight`) VALUES
(1, 'Homa-Sanya', 15, 'Teacher', 0.025),
(2, 'Homa-Daniel', 7, 'Student', 0.028),
(3, 'Homa-Kesha', 10, 'Anykey', 0.066),
(4, 'Homa-Pola', 3, 'Children', 0.009),
(5, 'Homa-Lion', 5, 'people', 0.05);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `hamsters`
--
ALTER TABLE `hamsters`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `hamsters`
--
ALTER TABLE `hamsters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
