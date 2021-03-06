<?php
/**
* Файл решения задания №4
* 
* @author Lev Makarenko <r59makarenko@gmail.com>
* @version 1.0
* @package Task4
*/

namespace Task4;

/**
* Подключаем файл с классом Task4\TreeBuilder
*/
include 'TreeBuilder.php';

use Exception, Task4\TreeBuilder;

/**
* Функция построения массива строк по заданным параметрам
 * @param int $nlines Количество строк в итоговом массиве
 * @param char $char Символ для заполнения массива
 * @return boolean
*/
function build($nlines = 25, $char = '*')
{
    echo "Построение дерева : число строк {$nlines}, символ '{$char}'<br><br>";
    try {
        $treeBuilder = new TreeBuilder($nlines, $char);
    } catch (Exception $ex) {
        echo $ex->getMessage(), '<br><br>';
        return false;
    }
    echo '<br>Успех<br><br>';
    return true;
}

/**
 *  Построения нескольких массивов строк функцией
 */
build(1, '0');
build(2, '0');
build(30);
build(40, '+');