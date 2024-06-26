-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 26 2024 г., 15:24
-- Версия сервера: 8.0.29
-- Версия PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `availabilities`
--

CREATE TABLE `availabilities` (
                                  `id` int NOT NULL,
                                  `amount` int NOT NULL,
                                  `product_id` int NOT NULL,
                                  `stock_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `availabilities`
--

INSERT INTO `availabilities` (`id`, `amount`, `product_id`, `stock_id`) VALUES(1, 3, 1, 1);
INSERT INTO `availabilities` (`id`, `amount`, `product_id`, `stock_id`) VALUES(2, 2, 1, 5);
INSERT INTO `availabilities` (`id`, `amount`, `product_id`, `stock_id`) VALUES(5, 5, 2, 1);
INSERT INTO `availabilities` (`id`, `amount`, `product_id`, `stock_id`) VALUES(6, 2, 5, 5);
INSERT INTO `availabilities` (`id`, `amount`, `product_id`, `stock_id`) VALUES(9, 1, 6, 1);
INSERT INTO `availabilities` (`id`, `amount`, `product_id`, `stock_id`) VALUES(10, 1, 6, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
                              `id` int NOT NULL,
                              `title` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`) VALUES(1, 'Электроника');
INSERT INTO `categories` (`id`, `title`) VALUES(2, 'Бытовая техника');
INSERT INTO `categories` (`id`, `title`) VALUES(6, 'Расходные материалы');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
                            `id` int NOT NULL,
                            `title` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
                            `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `category_id`) VALUES(1, 'Телевизор LG', 1);
INSERT INTO `products` (`id`, `title`, `category_id`) VALUES(2, 'Смартфон Samsung', 1);
INSERT INTO `products` (`id`, `title`, `category_id`) VALUES(5, 'Микроволновая печь Redmond', 2);
INSERT INTO `products` (`id`, `title`, `category_id`) VALUES(6, 'Кухонная вытяжка Elica', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `stocks`
--

CREATE TABLE `stocks` (
                          `id` int NOT NULL,
                          `title` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `stocks`
--

INSERT INTO `stocks` (`id`, `title`) VALUES(1, 'Главный склад');
INSERT INTO `stocks` (`id`, `title`) VALUES(5, 'Склад на Бакинской');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `availabilities`
--
ALTER TABLE `availabilities`
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
-- Индексы таблицы `stocks`
--
ALTER TABLE `stocks`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `availabilities`
--
ALTER TABLE `availabilities`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `stocks`
--
ALTER TABLE `stocks`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;