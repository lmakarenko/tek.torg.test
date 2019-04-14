--
-- SQL-запрос выборки данных для нормализованной БД
--
SELECT
-- идентификатор ученика (выборка уникальных значений)
DISTINCT u.user_id,
-- возраст ученика
u.age,
-- пол ученика
u.gender,
-- признак того, что ученик отличник – подзапрос, подсчитывающий число записей из таблицы оценок для данного пользователя, у которых оценка не равна 5, т.е. для отличников данный подзапрос вернет 0
IF((SELECT COUNT(id) FROM users_marks WHERE user_id = u.user_id AND mark != 5) = 0, 1, 0) is_excellent,
-- кол-во записей для конкретного ученика в таблице оценок
users_marks (SELECT COUNT(id) FROM users_marks WHERE user_id = u.user_id) total
FROM users u
-- внутренний join с таблицей оценок по полю user_id
INNER JOIN users_marks um ON um.user_id = u.user_id
-- сортировка по убыванию для полей age, is_excellent
ORDER BY u.age DESC, is_excellent DESC