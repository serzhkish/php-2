-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 26 2020 г., 17:04
-- Версия сервера: 5.6.47
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mvc`
--

-- --------------------------------------------------------

--
-- Структура таблицы `last_pages`
--

CREATE TABLE `last_pages` (
  `id` int(11) NOT NULL,
  `page` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `id_usr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `last_pages`
--

INSERT INTO `last_pages` (`id`, `page`, `date`, `id_usr`) VALUES
(1, 'http://php-02-05/index.php?c=user&act=profile', '2020-12-26 17:03:08', 3),
(2, 'http://php-02-05/index.php?c=user&act=profile', '2020-12-26 17:03:07', 3),
(3, 'http://php-02-05/index.php?c=page&act=edit', '2020-12-26 17:03:33', 1),
(4, 'http://php-02-05/index.php?c=user&act=profile', '2020-12-26 17:03:34', 1),
(5, 'http://php-02-05/index.php?c=page&act=edit', '2020-12-26 17:03:08', 3),
(6, 'http://php-02-05/index.php?c=page&act=edit', '2020-12-26 17:03:06', 3),
(7, 'http://php-02-05/index.php?c=page&act=edit', '2020-12-26 17:03:07', 3),
(8, 'http://php-02-05/index.php?c=user&act=profile', '2020-12-26 17:03:31', 1),
(14, 'http://php-02-05/index.php?c=page&act=edit', '2020-12-26 17:03:32', 1),
(15, 'http://php-02-05/index.php', '2020-12-26 17:03:33', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `usrs`
--

CREATE TABLE `usrs` (
  `id` int(11) NOT NULL,
  `login` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pwd` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `usrs`
--

INSERT INTO `usrs` (`id`, `login`, `pwd`, `prv`) VALUES
(1, 'usr1', '123', 1),
(3, 'usr2', '123', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `last_pages`
--
ALTER TABLE `last_pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `usrs`
--
ALTER TABLE `usrs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `last_pages`
--
ALTER TABLE `last_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `usrs`
--
ALTER TABLE `usrs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
