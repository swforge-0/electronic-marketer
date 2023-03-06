-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Хост: 10.0.0.110:3306
-- Время создания: Мар 06 2023 г., 07:49
-- Версия сервера: 10.1.48-MariaDB
-- Версия PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `9225989007_em`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auth_users`
--

CREATE TABLE `auth_users` (
  `id` int(11) NOT NULL,
  `object_id` int(11) NOT NULL DEFAULT '0',
  `block` int(11) NOT NULL DEFAULT '0',
  `login` text NOT NULL,
  `pass` text NOT NULL,
  `access_level` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `auth_users`
--

INSERT INTO `auth_users` (`id`, `object_id`, `block`, `login`, `pass`, `access_level`) VALUES
(1, 0, 0, 'smirnov', '0192023a7bbd73250516f069df18b500', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_users_data`
--

CREATE TABLE `auth_users_data` (
  `dump` text NOT NULL,
  `name` text NOT NULL,
  `val` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auth_users`
--
ALTER TABLE `auth_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `auth_users`
--
ALTER TABLE `auth_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
