-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Апр 24 2026 г., 03:50
-- Версия сервера: 8.0.29-0ubuntu0.20.04.3
-- Версия PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ijtsvfnh_m1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id_cat` int NOT NULL,
  `category` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id_cat`, `category`) VALUES
(1, 'Молочные продукты'),
(2, 'Хлебобулочные изделия'),
(3, 'Кондитерские изделия');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `id_order` int NOT NULL,
  `id_user` int NOT NULL,
  `id_tovar` int NOT NULL,
  `quantity` int NOT NULL,
  `cost` float NOT NULL,
  `datatime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `id_order`, `id_user`, `id_tovar`, `quantity`, `cost`, `datatime`) VALUES
(1, 1776312778, 1, 2, 1, 70, '2026-04-16 04:12:58'),
(2, 1776312778, 1, 12, 1, 70, '2026-04-16 04:12:58'),
(3, 1776313583, 3, 12, 2, 30, '2026-04-16 04:26:23'),
(4, 1776313583, 3, 16, 8, 66, '2026-04-16 04:26:23'),
(5, 1776313583, 3, 3, 9, 230, '2026-04-16 04:26:23'),
(6, 1776397245, 2, 10, 3, 600, '2026-04-17 03:40:45'),
(7, 1776397245, 2, 13, 5, 70, '2026-04-17 03:40:45'),
(8, 1776397245, 2, 2, 3, 70, '2026-04-17 03:40:45');

-- --------------------------------------------------------

--
-- Структура таблицы `tovars`
--

CREATE TABLE `tovars` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `cena` float NOT NULL,
  `kol` int NOT NULL,
  `srok` date NOT NULL,
  `id_cat` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `tovars`
--

INSERT INTO `tovars` (`id`, `name`, `cena`, `kol`, `srok`, `id_cat`) VALUES
(1, 'молоко ', 50, 40, '2020-08-20', 1),
(2, 'хлеб', 70, 50, '2020-10-20', 2),
(3, 'конфеты', 230, 10, '2020-09-20', 3),
(10, 'сыр', 600, 3, '2026-03-08', 1),
(11, 'Торт', 399, 567, '2026-03-27', 3),
(12, 'Булочка с маком', 30, 100, '2026-03-28', 2),
(13, 'Йогурт', 70, 10, '2026-02-27', 1),
(16, 'батон', 66, 668, '2026-03-29', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name_users` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `login` varchar(50) NOT NULL,
  `hash` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `img` text CHARACTER SET utf8mb3 COLLATE utf8_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name_users`, `login`, `hash`, `img`) VALUES
(2, 'sasha', 'sasha', '$2y$10$kk0uUhFmFHYkqhh1jGZU7uQfQANvOEZsZvUxCBvAtXO49wUZpsCk.', 'sasha2.0.jpg'),
(3, 'user5', 'user5', '$2y$10$V242Xtu/FHZhfc2trHIqKuOYM.w8Apq7cbGFXwhfC16tCU0lGVvKW', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_cat`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tovars`
--
ALTER TABLE `tovars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cat` (`id_cat`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id_cat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `tovars`
--
ALTER TABLE `tovars`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `tovars`
--
ALTER TABLE `tovars`
  ADD CONSTRAINT `tovars_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categories` (`id_cat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
