-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 17 2020 г., 17:39
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `laravel_todolist`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'LETS GO HOME', 1, '2020-04-17 10:20:59', '2020-04-17 10:20:59'),
(4, 'WHere gg', 1, '2020-04-17 10:21:29', '2020-04-17 10:21:29'),
(5, 'soometging goo', 1, '2020-04-17 10:21:38', '2020-04-17 10:21:38'),
(6, 'This is the first task', 2, '2020-04-17 10:29:29', '2020-04-17 10:29:29'),
(7, 'kkkk ttt tt', 1, '2020-04-17 10:32:27', '2020-04-17 10:32:27');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
