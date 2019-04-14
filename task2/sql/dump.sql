--
-- Дамп нормализованной БД
--
--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` tinyint(1) DEFAULT '0' COMMENT '0 - male, 1 - female'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `age`, `gender`) VALUES
(1, 18, 1),
(2, 20, 1),
(3, 22, 0),
(4, 22, 1),
(5, 30, 1),
(6, 32, 0),
(7, 30, 1),
(8, 33, 0),
(9, 26, 1),
(10, 29, 1),
(11, 18, 0);
-- --------------------------------------------------------

--
-- Структура таблицы `users_marks`
--

CREATE TABLE `users_marks` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `mark` int(11) UNSIGNED NOT NULL COMMENT '1-5',
  `tms` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users_marks`
--

INSERT INTO `users_marks` (`id`, `user_id`, `mark`, `tms`) VALUES
(1, 1, 5, '2019-03-28 14:20:23'),
(2, 2, 3, '2019-03-28 14:20:23'),
(3, 3, 4, '2019-03-28 14:20:23'),
(4, 4, 4, '2019-03-28 14:20:23'),
(5, 5, 3, '2019-03-28 14:20:23'),
(6, 6, 4, '2019-03-28 14:20:23'),
(7, 7, 5, '2019-03-28 14:20:23'),
(8, 8, 2, '2019-03-28 14:20:23'),
(9, 9, 5, '2019-03-28 14:20:23'),
(10, 10, 4, '2019-03-28 14:20:23'),
(11, 1, 5, '2019-03-28 14:20:23'),
(12, 5, 4, '2019-03-28 14:20:23');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Индексы таблицы `users_marks`
--
ALTER TABLE `users_marks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_users` (`user_id`);
--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `users_marks`
--
ALTER TABLE `users_marks`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `users_marks`
--
ALTER TABLE `users_marks`
  ADD CONSTRAINT `FK_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
