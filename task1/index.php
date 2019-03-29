<?php
/**
* Файл решения задания №1
* 
* @author Lev Makarenko <r59makarenko@gmail.com>
* @version 1.0
* @package Task1
*/

namespace Task1;

/**
* Подключаем файл с классом Task1\strChecker
*/
include 'strChecker.php';

use Exception, Task1\strChecker;

/**
* Функция проверки строки на предмет закрытых скобок
 * @param string $string Строка для проверки
 * @return boolean
*/
function check_string_brackets($string)
{
    echo "Проверка строки : {$string}<br>";
    try {
        $strChecker = new strChecker($string);
    } catch (Exception $ex) {
        echo $ex->getMessage(), '<br><br>';
        return false;
    }
    echo 'Успех<br><br>';
    return true;
}

/**
 * Тестовый массив строк для проверки
 */
$strings = [
    '(){}[]',
    '([{}])',
    '(}',
    '[(])',
    '[({})](]'
];

/**
 *  Проверка массива строк функцией
 */
array_walk($strings, 'Task1\check_string_brackets');