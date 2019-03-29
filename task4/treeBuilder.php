<?php
/**
* Файл класса Task4\treeBuilder
* 
* @author Lev Makarenko <r59makarenko@gmail.com>
* @version 1.0
* @package Task4
*/

namespace Task4;

use Exception;

/**
 * Класс для построения массива строк по заданным параметрам
 * @package Task4
 */
class treeBuilder
{
    
    /**
     * Число строк
     * @var int
     */
    private $nlines;
    
    /**
     * Символ
     * @var char
     */
    private $char;
    
    /**
     * Конструктор класса
     * @param int $nlines
     * @param char $char
     * @return void
     */
    public function __construct($nlines, $char)
    {
        // Формирование обьекта с параметрами
        $params = (object)[
            'nlines' => $nlines,
            'char' => $char
        ];
        // Валидация параметров
        $this->validate($params);
        $this->nlines = $params->nlines;
        $this->char = $params->char;
        // Построение массива строк
        $this->build();
    }
    
    /**
     * Валидация входных параметров
     * @param object $params параметры для валидации
     * @throws Exception
     * @return boolean
     */
    protected function validate($params)
    {
        if($params->nlines < 2) {
            throw new Exception("Неверное число строк ({$params->nlines}), число строк должно быть >= 2");
        }
        if($params->char == '') {
            throw new Exception("Неверный символ ('{$params->char}'), символ не должен быть пустым");
        }
        return true;
    }
    
    /**
     * Построение массива строк
     * @return void
     */
    protected function build()
    {
        // Вывод строк массива, начиная с первой строки
        for($nline = 1; $nline <= $this->nlines; ++$nline) {
            $this->print_row($this->nlines - $nline, $nline*2 - 1);
        }  
    }
    
    /**
     * Вывод одной строки массива
     * @param int $nspaces Число пробелов перед символами
     * @param char $char Символ
     * @return void
     */
    protected function print_row($nspaces, $nchars)
    {
        // Вывод пробелов перед символами
        for($i = 0; $i < $nspaces; ++$i) {
            echo '&nbsp;&nbsp;';
        }
        // Вывод символов
        for($i = 0; $i < $nchars; ++$i) {
            echo $this->char;
        }
        // Конец строки
        echo '<br>';
    }
    
}