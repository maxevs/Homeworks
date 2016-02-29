-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Фев 28 2016 г., 18:26
-- Версия сервера: 10.1.9-MariaDB
-- Версия PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `books`
--

-- --------------------------------------------------------

--
-- Структура таблицы `books_in_the_store`
--

CREATE TABLE `books_in_the_store` (
  `id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_author` varchar(255) NOT NULL,
  `price(grn)` float(7,2) NOT NULL,
  `store_emaunt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books_in_the_store`
--

INSERT INTO `books_in_the_store` (`id`, `book_name`, `book_author`, `price(grn)`, `store_emaunt`) VALUES
(1, 'name_1', 'author_1', 150.00, 5),
(2, 'name_2', 'author_2', 245.50, 3),
(3, 'name_3', 'author_3', 790.85, 1),
(4, 'name_4', 'author_4', 760.60, 10),
(5, 'name_5', 'author_5', 456.90, 7);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `books_in_the_store`
--
ALTER TABLE `books_in_the_store`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `books_in_the_store`
--
ALTER TABLE `books_in_the_store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
