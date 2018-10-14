-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Окт 14 2018 г., 18:15
-- Версия сервера: 5.7.17
-- Версия PHP: 7.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Структура таблицы `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `brand_title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `brands`
--

INSERT INTO `brands` (`id`, `brand_title`) VALUES
(1, 'Apple'),
(2, 'Samsung'),
(3, 'Nokia'),
(4, 'Xiaomi'),
(5, 'Meizu'),
(6, 'HTC'),
(7, 'Lenovo');

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(4) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `p_id` int(4) NOT NULL,
  `qty` int(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `ip_address`, `p_id`, `qty`) VALUES
(230, 'fe80::1', 5, 1),
(231, 'fe80::1', 6, 1),
(232, 'fe80::1', 7, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(12) NOT NULL,
  `cat_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `cat_title`) VALUES
(1, 'смартфоны'),
(2, 'ноутбуки'),
(3, 'фотоаппараты'),
(4, 'планшеты');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `brand` int(50) NOT NULL,
  `category` int(8) NOT NULL,
  `price` int(4) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) CHARACTER SET latin1 NOT NULL,
  `keywords` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `brand`, `category`, `price`, `description`, `image`, `keywords`) VALUES
(5, 'HTC U ULTRA dual sim', 6, 1, 2000, '<p>Отличный современный смартфон</p>\r\n', 'HTC U ULTRA DUAL SIM.jpeg', 'смартфон современный HTC'),
(6, 'Apple Iphone X', 1, 1, 2600, '<p>Самый желанный и популярный смартфон в настоящее время.</p>\r\n', 'Apple Iphone X.jpeg', 'смартфон современный лучший Apple'),
(7, 'Nokia 6', 3, 1, 1800, '<p>Смартфоны финской марки не перестают удивлять</p>\r\n', 'Nokia 6.jpeg', 'смартфон современный  Nokia'),
(8, 'Xiaomi Redmi 5 Plus', 4, 1, 1800, '<p>Наверное самый популярный производитель смартфонов на сегодняшний день.</p>\r\n\r\n<p>Оптимальное соотношение цена/качество.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Xiaomi Redmi 5.jpeg', 'смартфон современный  Xiaomi'),
(9, 'Samsung Galaxy S9', 2, 1, 2800, '<p>Передовые технологии</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Samsung Galaxy S9.jpeg', 'смартфон современный  Samsung'),
(10, 'Apple Iphone 6', 1, 1, 2000, '<p>Уже ставший классикой, но все еще мощный и современный смартфон от Apple</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Apple Iphone 6S.jpeg', 'смартфон современный  Apple'),
(11, 'Samsung Galaxy S6 Edge', 2, 1, 2200, '<p>Мощный современный смартфон, сочетающий в себе прекрасные характеристики и разнообразие функций</p>\r\n', 'Samsung Galaxy S6 Edge.jpg', 'смартфон современный  стильный мощный Samsung'),
(12, 'Samsung Galaxy A5', 2, 1, 1800, '<p>Отличный сбалансированный смартфон для повседневного использования</p>\r\n', 'Samsung Galaxy A5.jpeg', 'смартфон современный  стильный Samsung'),
(16, 'Lenovo P2 4GB/64GB', 7, 1, 1600, '<p>Современный стильный и мощный смартфон. Имеет все основания, чтобы пользоваться успехом.</p>\r\n', 'Lenovo p2.jpeg', 'смартфон современный  стильный Lenovo'),
(17, 'Apple MacBook Air 13\"', 1, 2, 4000, '<p>Отличный, удобный, производительный современный ноутбук компании Apple</p>\r\n', 'macbook.jpeg', 'Apple, супер, ноутбук, отличный, удобный, производительный современный'),
(18, 'HP 250 G6 3DP01ES', 0, 2, 2000, '<p>Ноутбук начального уровня. Прекрасно справляется с любыми рабочими задачами и не только.</p>\r\n', 'HP 250 G6 3DP01ES.jpeg', 'бюджетный ноутбук'),
(19, 'ASUS X507UA-BQ040', 0, 2, 2200, '<p>Если Вы не заядлый геймер этот ноутбук подойдет Вам.</p>\r\n', 'ASUS X507UA-BQ040.jpeg', 'бюджетный ноутбук '),
(20, 'Xiaomi Mi Notebook Pro', 0, 2, 4000, '<p>Считается, что этот ноутбук настолько замечателен, что способен конкурировать с Apple Mac Book</p>\r\n', 'Xiaomi Mi Notebook Pro.jpeg', 'ноутбук премиальный лучший '),
(21, 'ASUS VivoBook S15 ', 0, 2, 2500, '<p>Отличный ноутбук, с хорошими характеристиками</p>\r\n', 'ASUS VivoBook S15 S510UA-BR409T.jpeg', 'бюджетный ноутбук'),
(22, 'Dell Inspiron 15 7577-5464', 0, 2, 3900, '<p>Прекрасный ноутбук, в котором есть все, что необходимо даже самому взыскательному покупателю.</p>\r\n', 'Dell Inspiron 15 7577-5464.jpeg', 'Dell премиальный ноутбук ');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(12) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `admin`) VALUES
(1, 'Ihar', 'secretpwd', 'petrushen@yahoo.com', 1),
(2, 'John', 'secretpwd', '777ihar@gmail.com', 0),
(3, 'Игорь', 'secretpwd', 'ihar777igor@yandex.by', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;
--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
