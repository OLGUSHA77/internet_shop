-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 21 2019 г., 10:25
-- Версия сервера: 5.7.25-log
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `firstbase`
--

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `id_product`, `name`, `email`, `comment`, `date`) VALUES
(1, 6, 'Nick Larson', 'nick0001@mail.ru', 'comment 2', 1571641908),
(2, 2, 'Alice', 'al@yandex.ru', 'Комментарий 3', 1571611649),
(3, 3, 'Ольга', 'olgusha0707@mail.ru', 'Комментарий 3', 1571613294),
(4, 6, 'Таня', 'conradelectric@mail.ru', '', 1571378306),
(5, 5, 'Heinrich', 'proautoel@yandex.ru', 'Комментарий 5', 1571642681),
(8, 1, 'Nick', 'nick01@mail.ru', 'comment1', 1571614540),
(9, 4, 'Катя', 'kate@mail.ru', 'Comment', 1571642564);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id_product` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `short_name` varchar(255) NOT NULL,
  `full_name` text NOT NULL,
  `num_clients` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id_product`, `name`, `short_name`, `full_name`, `num_clients`) VALUES
(1, 'Колготки EVERY 20 den, цвет черный, размер 4', 'EVERY 20-4 черный', 'Колготки EVERY 20 den, цвет черный, размер 4, производитель ТЕКСТИЛЬ ПРОФЕШЕНЕЛ, Россия, г. Сергиев Посад', 1),
(2, 'Колготки EVERY 20 den, цвет загар, размер 4', 'EVERY 20-4 загар', 'Колготки EVERY 20 den, цвет загар, размер 4, производитель ТЕКСТИЛЬ ПРОФЕШЕНЕЛ, Россия, г. Сергиев Посад', 1),
(3, 'Колготки EVERY 20 den, цвет телесный, размер 4', 'EVERY 20-4 телесный', 'Колготки EVERY 20 den, цвет телесный, размер 4, производитель ТЕКСТИЛЬ ПРОФЕШЕНЕЛ, г. Сергиев Посад', 1),
(4, 'Колготки ELEGANT 40 den, цвет телесный, размер 3', 'ELEGANT 40-3 телесный', 'Колготки ELEGANT 40 den, цвет телесный, размер 3, производитель ТЕКСТИЛЬ ПРОФЕШЕНЕЛ, Россия, г. Сергиев Посад', 1),
(5, 'Колготки ELEGANT 40 den, цвет загар, размер 3', 'ELEGANT 40-3 загар', 'Колготки ELEGANT 40 den, цвет загар, размер 3, производитель ТЕКСТИЛЬ ПРОФЕШЕНЕЛ, Россия, г. Сергиев Посад', 0),
(6, 'Колготки ELEGANT 40 den, цвет черный, размер 3', 'ELEGANT 40-3 черный', 'Колготки ELEGANT 40 den, цвет черный, размер 3, производитель ТЕСТИЛЬ ПРОФЕШЕНЕЛ, Россия, г.Сергиев Посад', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
