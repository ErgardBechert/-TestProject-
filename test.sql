-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 04 2023 г., 11:28
-- Версия сервера: 10.6.9-MariaDB
-- Версия PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Bank`
--

CREATE TABLE `Bank` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interest_rate` decimal(5,2) DEFAULT NULL,
  `loan_term` int(11) DEFAULT NULL,
  `monthly_payment` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Bank`
--

INSERT INTO `Bank` (`id`, `logo`, `name`, `interest_rate`, `loan_term`, `monthly_payment`) VALUES
(1, '/media/logo/sber.png', 'Сбербанк', '3.00', 40, '0.00'),
(3, '/media/logo/vtb.png', 'Втб банк', '10.00', 30, '1000.00'),
(4, '/media/logo/raiffeisen.png', 'Райфайзен банк', '23.00', 40, '1500.00'),
(5, '/media/logo/promsvyazbank.png\r\n', 'Промсвязьбанк', '17.00', 25, '1200.00');

-- --------------------------------------------------------

--
-- Структура таблицы `Promotion`
--

CREATE TABLE `Promotion` (
  `id` int(11) NOT NULL,
  `background` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interest_rate` decimal(5,2) DEFAULT NULL,
  `target_audience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Promotion`
--

INSERT INTO `Promotion` (`id`, `background`, `title`, `subtitle`, `interest_rate`, `target_audience`) VALUES
(1, '/media/promotion/bcg-slider.jpg', 'Ипотека молодым семьям от', 'Воспользуйтесь уникальной программой ипотечного \nкредитования для молодых семей', '8.00', 'молодые семья'),
(4, '../../media/promotion/bcg-slider.jpg', 'Ипотека пенсионерам от', 'Воспользуйтесь уникальной программой ипотечного \nкредитования для пенсионеров', '6.00', 'пенсионеры');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Bank`
--
ALTER TABLE `Bank`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Promotion`
--
ALTER TABLE `Promotion`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Bank`
--
ALTER TABLE `Bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `Promotion`
--
ALTER TABLE `Promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
