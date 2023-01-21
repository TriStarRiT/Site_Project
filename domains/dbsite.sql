-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 21 2023 г., 16:00
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dbsite`
--

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `stat` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `telephone` double DEFAULT NULL,
  `address_cit` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `address_pod` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `address_str` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `address_flo` int UNSIGNED DEFAULT NULL,
  `address_hou` int UNSIGNED DEFAULT NULL,
  `address_fla` int UNSIGNED DEFAULT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `payment` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `cost` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id`, `user_id`, `stat`, `date`, `telephone`, `address_cit`, `address_pod`, `address_str`, `address_flo`, `address_hou`, `address_fla`, `comment`, `payment`, `cost`) VALUES
(1, 1, 'Завершён', '15th January 2023', 79195237655, 'Киров', '5', 'Пр', 10, 10, 202, 'Чунга чанга', 'картой', 790),
(2, 1, 'Завершён', '15th January 2023', 79195237655, 'Киров', '', 'Производственная', 10, 10, 202, 'Чунга чанга', 'наличными', 840),
(3, 1, 'Не готов', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 2, 'Завершён', '15th January 2023', 79229619507, 'Люберцы', '6', 'Шоссейная', 8, 10, 210, 'Покажи жопу', 'картой', 897),
(5, 2, 'Завершён', '15th January 2023', 79229619507, 'Люберцы', '', 'Шоссейная', 8, 10, 210, 'Покажи жопу', 'картой', 470),
(6, 2, 'Завершён', '20th January 2023', 79229619507, 'Киров', '', 'Ленина', 5, 10, 14, 'Ещё пакетик пожалуйста', 'картой', 326.6),
(10, 2, 'Не готов', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `pocket`
--

CREATE TABLE `pocket` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `order_id` int UNSIGNED DEFAULT NULL,
  `product_id` int UNSIGNED DEFAULT NULL,
  `ones` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `pocket`
--

INSERT INTO `pocket` (`id`, `user_id`, `order_id`, `product_id`, `ones`) VALUES
(1, 2, 6, 1, 2),
(2, 2, 6, 2, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `type_of_product` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `cost` decimal(10,2) DEFAULT NULL,
  `ones` int UNSIGNED DEFAULT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `type_of_product`, `cost`, `ones`, `picture`) VALUES
(1, 'Молоко 2%', 'Молоко питьевое пастеризованное 2,0% 900мл', 'Молочные продукты', '78.95', 16, '8178862milk.png'),
(2, 'Нарезка 115г', 'Карбонад копчено-вареный По-Егорьевски Егорьевская КГФ, нарезка, 115 г', 'Мясные продукты', '84.35', 34, '7057477vetchina.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int UNSIGNED NOT NULL,
  `second_name` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `fathers_name` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `passsword` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `telephone` double DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `permission` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `order_id` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `second_name`, `first_name`, `fathers_name`, `email`, `passsword`, `telephone`, `date_of_birth`, `permission`, `order_id`) VALUES
(1, 'Кашин', 'Алексей', 'Владимирович', 'alex-kashin-02@mail.ru', '$2y$10$RpFMXZCyMpWxXCb8o4l2i.J4sLnlbUixMfCWmdo.wqIi9vuSw.Jk6', 79195237655, '2002-10-28', 'user', 3),
(2, 'Сторощук', 'Сергей', 'Игоревич', 'Lordus604@gmail.com', '$2y$10$M/h7xP5BZOaPt7V0/Cr8dOZkN63NZ3LJOp.JjzXnJCgrfFxJZKYBa', 79229619507, '2023-01-07', 'user', 10);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_foreignkey_order_user` (`user_id`);

--
-- Индексы таблицы `pocket`
--
ALTER TABLE `pocket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_foreignkey_pocket_user` (`user_id`),
  ADD KEY `index_foreignkey_pocket_order` (`order_id`),
  ADD KEY `index_foreignkey_pocket_product` (`product_id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_foreignkey_user_order` (`order_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `pocket`
--
ALTER TABLE `pocket`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `c_fk_order_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Ограничения внешнего ключа таблицы `pocket`
--
ALTER TABLE `pocket`
  ADD CONSTRAINT `c_fk_pocket_order_id` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `c_fk_pocket_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `c_fk_pocket_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `c_fk_user_order_id` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
