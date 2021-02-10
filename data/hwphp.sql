-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Фев 08 2021 г., 22:06
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hwphp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id_product` int NOT NULL,
  `id_session` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id_product`, `id_session`, `quantity`, `id`) VALUES
(1, '1', 2, 53),
(2, '1', 1, 54),
(5, '2', 5, 55);

-- --------------------------------------------------------

--
-- Структура таблицы `catalog`
--

CREATE TABLE `catalog` (
  `id` int NOT NULL,
  `name_product` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `img_prod` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `veiws` int NOT NULL DEFAULT '0',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `catalog`
--

INSERT INTO `catalog` (`id`, `name_product`, `price`, `img_prod`, `veiws`, `description`) VALUES
(1, 'Pizza', 50, '1.jpg', 206, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, dolorum.'),
(2, 'Apple', 1, '2.jpg', 45, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, dolorum.'),
(5, 'Tea', 7, '5.jpg', 97, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, dolorum.'),
(7, 'Грибы', 30, '', 0, 'Лисички'),
(13, 'Молоко', 50, '12.img', 0, 'Коровье'),
(31, 'Торт', 45, NULL, 0, 'шоколадный'),
(32, 'Цай', 25, NULL, 0, 'Цейлонский'),
(41, 'Ананас', 250, NULL, 0, 'Вьетнамский'),
(43, 'Банан', 49, NULL, 0, 'Индийский'),
(44, 'Киви', 123, NULL, 0, 'Зеленый'),
(45, 'Катофель', 20, NULL, 0, 'красный'),
(51, 'Огурец', 40, NULL, 0, 'Тепличный'),
(56, 'Арбуз', 40, NULL, 0, 'Астраханский'),
(57, 'Арбуз', 40, NULL, 0, 'Астраханский'),
(58, 'Памела', 124, NULL, 0, 'врпилцу'),
(59, 'Мандарин', 60, NULL, 0, 'Азербайджан');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `idfeed` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `feedback` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `datefeedback` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`idfeed`, `name`, `feedback`, `datefeedback`, `id`) VALUES
(4, 'Admin', 'С Наступающим!!', ' 28 December 2020 02:04:07 AM', 0),
(5, 'Вася', 'Успехов в Новом Году!', ' 28 December 2020 02:04:46 AM', 0),
(10, 'Коля', 'CRUD работает!', ' 28 December 2020 03:08:11 PM', 0),
(15, 'NIKOLAI DAVYDOV', ' Тест1', ' 16 January 2021 06:26:06 PM', 0),
(25, 'NIKOLAI DAVYDOV', ' Вкусно', ' 16 January 2021 06:43:21 PM', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE `gallery` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int NOT NULL,
  `views` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`id`, `name`, `size`, `views`) VALUES
(40, '4.jpg', 310517, 33),
(42, '6.jpg', 141976, 91),
(43, '7.jpg', 1066328, 3),
(45, '5.jpg', 462708, NULL),
(46, '3.jpg', 493065, NULL),
(47, '2.jpg', 36767, NULL),
(48, '1.jpg', 274209, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `id_order` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `iduser` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `userName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `products` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sumOrder` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `id_order`, `iduser`, `userName`, `number`, `email`, `city`, `products`, `status`, `sumOrder`) VALUES
(1, '5fff633597dab', '4', 'Вася', '435346', '2345@mail.ru', 'Лес', '[{\"idorder\":\"5fff633597dab\",\"iduser\":\"4\",\"idprod\":\"2\",\"quantity\":\"1\",\"id\":\"2\",\"name\":\"Apple\",\"price\":\"1\",\"imgProd\":\"2.jpg\",\"veiws\":\"36\",\"description\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, dolorum.\"},{\"idorder\":\"5fff633597dab\",\"iduser\":\"4\",\"idprod\":\"5\",\"quantity\":\"6\",\"id\":\"5\",\"name\":\"Tea\",\"price\":\"7\",\"imgProd\":\"5.jpg\",\"veiws\":\"85\",\"description\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, dolorum.\"}]', 'Заказ отправлен', '43 '),
(2, '600583bb5a6f3', '1', 'NIKOLAI DAVYDOV', '578940', 'range91111@gmail.com', 'ИВАНОВО', '[{\"idorder\":\"600583bb5a6f3\",\"iduser\":\"1\",\"idprod\":\"1\",\"quantity\":\"2\",\"id\":\"1\",\"name\":\"Pizza\",\"price\":\"50\",\"imgProd\":\"1.jpg\",\"veiws\":\"186\",\"description\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, dolorum.\"},{\"idorder\":\"600583bb5a6f3\",\"iduser\":\"1\",\"idprod\":\"5\",\"quantity\":\"2\",\"id\":\"5\",\"name\":\"Tea\",\"price\":\"7\",\"imgProd\":\"5.jpg\",\"veiws\":\"85\",\"description\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, dolorum.\"}]', 'Заказ выполнен', '114 '),
(3, '60058b9b92e7d', '1', 'NIKOLAI DAVYDOV', '578940', 'range91111@gmail.com', 'ИВАНОВО', '[{\"idorder\":\"60058b9b92e7d\",\"iduser\":\"1\",\"idprod\":\"5\",\"quantity\":\"1\",\"id\":\"5\",\"name\":\"Tea\",\"price\":\"7\",\"imgProd\":\"5.jpg\",\"veiws\":\"85\",\"description\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, dolorum.\"},{\"idorder\":\"60058b9b92e7d\",\"iduser\":\"1\",\"idprod\":\"1\",\"quantity\":\"3\",\"id\":\"1\",\"name\":\"Pizza\",\"price\":\"50\",\"imgProd\":\"1.jpg\",\"veiws\":\"186\",\"description\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, dolorum.\"}]', 'Заказ отправлен на обратоку', '157 '),
(4, '600590b78ad1f', '27063018560058fe87a12b9.59547360', 'Петя', '578940', 'setg@jhfg.ru', 'Ljhjuf', '[{\"idorder\":\"600590b78ad1f\",\"iduser\":\"27063018560058fe87a12b9.59547360\",\"idprod\":\"5\",\"quantity\":\"1\",\"id\":\"5\",\"name\":\"Tea\",\"price\":\"7\",\"imgProd\":\"5.jpg\",\"veiws\":\"85\",\"description\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, dolorum.\"},{\"idorder\":\"600590b78ad1f\",\"iduser\":\"27063018560058fe87a12b9.59547360\",\"idprod\":\"2\",\"quantity\":\"1\",\"id\":\"2\",\"name\":\"Apple\",\"price\":\"1\",\"imgProd\":\"2.jpg\",\"veiws\":\"36\",\"description\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, dolorum.\"}]', 'Заказ отправлен на обратоку', '8 '),
(5, '600593a6020f0', '1478104380600592b42508f7.57231874', 'Катя', '578940', '325@edtg.ru', 'Дом', '[{\"idorder\":\"600593a6020f0\",\"iduser\":\"1478104380600592b42508f7.57231874\",\"idprod\":\"1\",\"quantity\":\"1\",\"id\":\"1\",\"name\":\"Pizza\",\"price\":\"50\",\"imgProd\":\"1.jpg\",\"veiws\":\"186\",\"description\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, dolorum.\"},{\"idorder\":\"600593a6020f0\",\"iduser\":\"1478104380600592b42508f7.57231874\",\"idprod\":\"5\",\"quantity\":\"1\",\"id\":\"5\",\"name\":\"Tea\",\"price\":\"7\",\"imgProd\":\"5.jpg\",\"veiws\":\"85\",\"description\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, dolorum.\"}]', 'Заказ отправлен на обратоку', '57 '),
(6, '60059a1d24b1e', '501254841600599a52ffe40.30049324', '43546', '578940', 'range91111@gmail.com', 'ИВАНОВО', '[{\"idorder\":\"60059a1d24b1e\",\"iduser\":\"501254841600599a52ffe40.30049324\",\"idprod\":\"5\",\"quantity\":\"1\",\"id\":\"5\",\"name\":\"Tea\",\"price\":\"7\",\"imgProd\":\"5.jpg\",\"veiws\":\"85\",\"description\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, dolorum.\"}]', 'Заказ отправлен на обратоку', '7 '),
(7, '6005a7665dfea', '1', NULL, NULL, NULL, NULL, '[{\"idorder\":\"6005a7665dfea\",\"iduser\":\"1\",\"idprod\":\"1\",\"quantity\":\"5\",\"id\":\"1\",\"name\":\"Pizza\",\"price\":\"50\",\"imgProd\":\"1.jpg\",\"veiws\":\"187\",\"description\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, dolorum.\"},{\"idorder\":\"6005a7665dfea\",\"iduser\":\"1\",\"idprod\":\"5\",\"quantity\":\"20\",\"id\":\"5\",\"name\":\"Tea\",\"price\":\"7\",\"imgProd\":\"5.jpg\",\"veiws\":\"85\",\"description\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, dolorum.\"}]', NULL, '390 ');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hash` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `hash`) VALUES
(1, 'admin', '$2y$10$/lf/pL9Y77Q3fXDFIp7qNeg4/NAFz6M3D.JuIkFrjSrS8WpNkE6Vi', '153573128360205eb5d38702.57698977'),
(4, 'login', '$2y$10$8yrE5aymeCHOzaWQawc1qucyaqIbKWbgR7/gUkgMR5liwUWzNFbum', '123');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`idfeed`);

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_order` (`id_order`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT для таблицы `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `idfeed` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
