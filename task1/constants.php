<?php
/**
* Файл констант для задачи №1
* 
* @author Lev Makarenko <r59makarenko@gmail.com>
* @version 1.0
* @package Task1
*/

namespace Task1;

/**
 * Константа
 * Код квадратных скобок
 */
const BRACKET_SQUARE = 1001;

/**
 * Константа
 * Код круглых скобок
 */
const BRACKET_ROUND = 1002;

/**
 * Константа
 * Код фигурных скобок
 */
const BRACKET_CURSIVE = 1003;

/**
 * Константа
 * Код открытой скобки
 */
const BRACKET_OPEN = 1004;

/**
 * Константа
 * Код закрытой скобки
 */
const BRACKET_CLOSE = 1005;

/**
 * Константа
 * Массив-карта всех скобок и их описаний c помощью констант
 */
const BRACKETS_MAP = [
    '{' => [
        BRACKET_CURSIVE, BRACKET_OPEN
    ],
    '}' => [
        BRACKET_CURSIVE, BRACKET_CLOSE
    ],
    '(' => [
        BRACKET_ROUND, BRACKET_OPEN
    ],
    ')' => [
        BRACKET_ROUND, BRACKET_CLOSE
    ],
    '[' => [
        BRACKET_SQUARE, BRACKET_OPEN
    ],
    ']' => [
        BRACKET_SQUARE, BRACKET_CLOSE
    ],
];
