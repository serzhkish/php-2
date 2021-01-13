-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 13 2021 г., 14:46
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `php-02-06`
--

-- --------------------------------------------------------

--
-- Структура таблицы `s_basket`
--

CREATE TABLE `s_basket` (
  `id_basket` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_good` int(11) NOT NULL,
  `price` double NOT NULL,
  `is_in_order` tinyint(4) NOT NULL,
  `is_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `s_basket`
--

INSERT INTO `s_basket` (`id_basket`, `id_user`, `id_good`, `price`, `is_in_order`, `is_order`) VALUES
(18, 6, 2, 500, 0, 0),
(19, 6, 2, 500, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `s_categories`
--

CREATE TABLE `s_categories` (
  `id_category` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `s_goods`
--

CREATE TABLE `s_goods` (
  `id_good` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `id_category` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `s_goods`
--

INSERT INTO `s_goods` (`id_good`, `name`, `price`, `id_category`, `status`) VALUES
(1, 'iphone', 1000, 1, 0),
(2, 'msi', 2000, 2, 0),
(3, 'samsung', 300, 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `s_order`
--

CREATE TABLE `s_order` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `amount` double NOT NULL,
  `datetime_create` datetime NOT NULL,
  `id_order_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `s_order_status`
--

CREATE TABLE `s_order_status` (
  `id_order_status` int(11) NOT NULL,
  `order_status_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `s_pages`
--

CREATE TABLE `s_pages` (
  `id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `s_role`
--

CREATE TABLE `s_role` (
  `id_role` int(11) NOT NULL,
  `role_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `s_role`
--

INSERT INTO `s_role` (`id_role`, `role_name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Структура таблицы `s_user`
--

CREATE TABLE `s_user` (
  `id_user` int(11) NOT NULL,
  `user_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_login` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_last_action` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `s_user`
--

INSERT INTO `s_user` (`id_user`, `user_name`, `user_login`, `user_password`, `user_last_action`) VALUES
(1, 'Bugrov Sergey', 'bs', 'bs', '0000-00-00 00:00:00'),
(2, '', 'ss', 'ss', '2021-01-11 06:16:28'),
(3, '', '', '', '2021-01-11 07:00:50'),
(4, '', 'sss', '', '2021-01-11 07:01:10'),
(5, '', 'aa', 'aa', '2021-01-11 09:24:05'),
(6, 'Алекс', 'qq', 'qq', '2021-01-11 09:25:35');

-- --------------------------------------------------------

--
-- Структура таблицы `s_user_role`
--

CREATE TABLE `s_user_role` (
  `id_user_role` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `s_user_role`
--

INSERT INTO `s_user_role` (`id_user_role`, `id_user`, `id_role`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 2),
(4, 4, 2),
(5, 5, 2),
(6, 6, 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `s_basket`
--
ALTER TABLE `s_basket`
  ADD PRIMARY KEY (`id_basket`);

--
-- Индексы таблицы `s_categories`
--
ALTER TABLE `s_categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Индексы таблицы `s_goods`
--
ALTER TABLE `s_goods`
  ADD PRIMARY KEY (`id_good`);

--
-- Индексы таблицы `s_order`
--
ALTER TABLE `s_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Индексы таблицы `s_order_status`
--
ALTER TABLE `s_order_status`
  ADD PRIMARY KEY (`id_order_status`);

--
-- Индексы таблицы `s_pages`
--
ALTER TABLE `s_pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `s_role`
--
ALTER TABLE `s_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Индексы таблицы `s_user`
--
ALTER TABLE `s_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Индексы таблицы `s_user_role`
--
ALTER TABLE `s_user_role`
  ADD PRIMARY KEY (`id_user_role`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `s_basket`
--
ALTER TABLE `s_basket`
  MODIFY `id_basket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `s_categories`
--
ALTER TABLE `s_categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `s_goods`
--
ALTER TABLE `s_goods`
  MODIFY `id_good` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `s_order`
--
ALTER TABLE `s_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `s_order_status`
--
ALTER TABLE `s_order_status`
  MODIFY `id_order_status` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `s_pages`
--
ALTER TABLE `s_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `s_role`
--
ALTER TABLE `s_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `s_user`
--
ALTER TABLE `s_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `s_user_role`
--
ALTER TABLE `s_user_role`
  MODIFY `id_user_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
