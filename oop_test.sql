-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 04 2017 г., 13:32
-- Версия сервера: 5.5.50-log
-- Версия PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `oop_test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) unsigned NOT NULL,
  `header` varchar(255) NOT NULL,
  `date_create` date NOT NULL,
  `anons` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `header`, `date_create`, `anons`) VALUES
(1, 'Новость 1', '2017-07-03', 'Анонс 1'),
(2, 'Новость 2', '2017-07-02', 'Анонс 2'),
(3, 'Новость 3', '2017-07-02', 'Анонс 3'),
(4, 'Новость 4', '2017-07-02', 'Анонс 4');

-- --------------------------------------------------------

--
-- Структура таблицы `rel_news_comments`
--

CREATE TABLE IF NOT EXISTS `rel_news_comments` (
  `id` int(10) unsigned NOT NULL,
  `news_id` int(10) unsigned NOT NULL,
  `comment_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `rel_news_rubrics`
--

CREATE TABLE IF NOT EXISTS `rel_news_rubrics` (
  `id` int(10) unsigned NOT NULL,
  `news_id` int(10) unsigned NOT NULL,
  `rubric_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `rel_news_rubrics`
--

INSERT INTO `rel_news_rubrics` (`id`, `news_id`, `rubric_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 4, 5),
(6, 4, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `rel_news_users`
--

CREATE TABLE IF NOT EXISTS `rel_news_users` (
  `id` int(10) unsigned NOT NULL,
  `news_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `rel_news_users`
--

INSERT INTO `rel_news_users` (`id`, `news_id`, `user_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 2),
(4, 4, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `rel_users_comments`
--

CREATE TABLE IF NOT EXISTS `rel_users_comments` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `comment_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `rubrics`
--

CREATE TABLE IF NOT EXISTS `rubrics` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `rubrics`
--

INSERT INTO `rubrics` (`id`, `name`, `parent_id`) VALUES
(1, 'Sport', 0),
(2, 'Culture', 0),
(3, 'Tech', 0),
(4, 'Finance', 0),
(5, 'Auto', 0),
(6, 'Health', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`) VALUES
(1, 'user_1'),
(2, 'user_2');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rel_news_comments`
--
ALTER TABLE `rel_news_comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rel_news_rubrics`
--
ALTER TABLE `rel_news_rubrics`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rel_news_users`
--
ALTER TABLE `rel_news_users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rel_users_comments`
--
ALTER TABLE `rel_users_comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rubrics`
--
ALTER TABLE `rubrics`
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
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `rel_news_comments`
--
ALTER TABLE `rel_news_comments`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `rel_news_rubrics`
--
ALTER TABLE `rel_news_rubrics`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `rel_news_users`
--
ALTER TABLE `rel_news_users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `rel_users_comments`
--
ALTER TABLE `rel_users_comments`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `rubrics`
--
ALTER TABLE `rubrics`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
