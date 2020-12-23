-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 23 2020 г., 15:55
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
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `img` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `img`) VALUES
(1, 'iphone 1', 1000, '1.jpg'),
(2, 'samsung 1', 900, '2.jpg'),
(3, 'nokia 1', 500, '3.jpg'),
(4, 'iphone 1', 1000, '1.jpg'),
(5, 'samsung 1', 900, '2.jpg'),
(6, 'nokia 1', 500, '3.jpg'),
(7, 'iphone 0', 400, '0.jpg'),
(8, 'iphone 1', 1000, '1.jpg'),
(9, 'iphone 2', 1000, '2.jpg'),
(10, 'iphone 3', 800, '3.jpg'),
(11, 'iphone 4', 800, '4.jpg'),
(12, 'iphone 5', 100, '5.jpg'),
(13, 'iphone 6', 1000, '6.jpg'),
(14, 'iphone 7', 400, '7.jpg'),
(15, 'iphone 8', 500, '8.jpg'),
(16, 'iphone 9', 400, '9.jpg'),
(17, 'iphone 10', 200, '10.jpg'),
(18, 'iphone 11', 300, '11.jpg'),
(19, 'iphone 12', 500, '12.jpg'),
(20, 'iphone 13', 100, '13.jpg'),
(21, 'iphone 14', 300, '14.jpg'),
(22, 'iphone 15', 400, '15.jpg'),
(23, 'iphone 16', 900, '16.jpg'),
(24, 'iphone 17', 700, '17.jpg'),
(25, 'iphone 18', 100, '18.jpg'),
(26, 'iphone 19', 900, '19.jpg'),
(27, 'iphone 20', 100, '20.jpg'),
(28, 'iphone 21', 600, '21.jpg'),
(29, 'iphone 22', 400, '22.jpg'),
(30, 'iphone 23', 300, '23.jpg'),
(31, 'iphone 24', 500, '24.jpg'),
(32, 'iphone 25', 500, '25.jpg'),
(33, 'iphone 26', 200, '26.jpg'),
(34, 'iphone 27', 1000, '27.jpg'),
(35, 'iphone 28', 700, '28.jpg'),
(36, 'iphone 29', 100, '29.jpg'),
(37, 'iphone 30', 200, '30.jpg'),
(38, 'iphone 31', 800, '31.jpg'),
(39, 'iphone 32', 600, '32.jpg'),
(40, 'iphone 33', 700, '33.jpg'),
(41, 'iphone 34', 800, '34.jpg'),
(42, 'iphone 35', 900, '35.jpg'),
(43, 'iphone 36', 200, '36.jpg'),
(44, 'iphone 37', 500, '37.jpg'),
(45, 'iphone 38', 1000, '38.jpg'),
(46, 'iphone 39', 800, '39.jpg'),
(47, 'iphone 40', 200, '40.jpg'),
(48, 'iphone 41', 100, '41.jpg'),
(49, 'iphone 42', 100, '42.jpg'),
(50, 'iphone 43', 100, '43.jpg'),
(51, 'iphone 44', 100, '44.jpg'),
(52, 'iphone 45', 200, '45.jpg'),
(53, 'iphone 46', 800, '46.jpg'),
(54, 'iphone 47', 800, '47.jpg'),
(55, 'iphone 48', 100, '48.jpg'),
(56, 'iphone 49', 500, '49.jpg'),
(57, 'iphone 50', 1000, '50.jpg'),
(58, 'iphone 51', 100, '51.jpg'),
(59, 'iphone 52', 800, '52.jpg'),
(60, 'iphone 53', 100, '53.jpg'),
(61, 'iphone 54', 800, '54.jpg'),
(62, 'iphone 55', 100, '55.jpg'),
(63, 'iphone 56', 400, '56.jpg'),
(64, 'iphone 57', 400, '57.jpg'),
(65, 'iphone 58', 800, '58.jpg'),
(66, 'iphone 59', 900, '59.jpg'),
(67, 'iphone 60', 400, '60.jpg'),
(68, 'iphone 61', 700, '61.jpg'),
(69, 'iphone 62', 700, '62.jpg'),
(70, 'iphone 63', 500, '63.jpg'),
(71, 'iphone 64', 900, '64.jpg'),
(72, 'iphone 65', 800, '65.jpg'),
(73, 'iphone 66', 900, '66.jpg'),
(74, 'iphone 67', 700, '67.jpg'),
(75, 'iphone 68', 600, '68.jpg'),
(76, 'iphone 69', 100, '69.jpg'),
(77, 'iphone 70', 100, '70.jpg'),
(78, 'iphone 71', 400, '71.jpg'),
(79, 'iphone 72', 400, '72.jpg'),
(80, 'iphone 73', 1000, '73.jpg'),
(81, 'iphone 74', 400, '74.jpg'),
(82, 'iphone 75', 800, '75.jpg'),
(83, 'iphone 76', 600, '76.jpg'),
(84, 'iphone 77', 300, '77.jpg'),
(85, 'iphone 78', 300, '78.jpg'),
(86, 'iphone 79', 100, '79.jpg'),
(87, 'iphone 80', 900, '80.jpg'),
(88, 'iphone 81', 600, '81.jpg'),
(89, 'iphone 82', 800, '82.jpg'),
(90, 'iphone 83', 900, '83.jpg'),
(91, 'iphone 84', 300, '84.jpg'),
(92, 'iphone 85', 500, '85.jpg'),
(93, 'iphone 86', 500, '86.jpg'),
(94, 'iphone 87', 400, '87.jpg'),
(95, 'iphone 88', 700, '88.jpg'),
(96, 'iphone 89', 700, '89.jpg'),
(97, 'iphone 90', 600, '90.jpg'),
(98, 'iphone 91', 900, '91.jpg'),
(99, 'iphone 92', 800, '92.jpg'),
(100, 'iphone 93', 900, '93.jpg'),
(101, 'iphone 94', 100, '94.jpg'),
(102, 'iphone 95', 800, '95.jpg'),
(103, 'iphone 96', 300, '96.jpg'),
(104, 'iphone 97', 800, '97.jpg'),
(105, 'iphone 98', 200, '98.jpg'),
(106, 'iphone 99', 800, '99.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
