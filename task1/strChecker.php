<?php
/**
* Файл класса Task1\strChecker
* 
* @author Lev Makarenko <r59makarenko@gmail.com>
* @version 1.0
* @package Task1
*/

namespace Task1;

/**
* Подключаем файл с константами Task1\strChecker
*/
include 'constants.php';

use stdClass, Exception;

/**
 * Класс для проверки строки на предмет закрытых скобок
 * @package Task1
 */
class strChecker
{
    
    /**
     * Обрабатываемая строка
     * @var string
     */
    private $string = '';
    
    /**
     * Массив элементов открытых скобок (работа по правилу стэка)
     * @var array
     */
    private $stack_opened = [];
    
    /**
     * Конструктор класса
     * @param string $string Строка для проверки
     * @return void
     */
    public function __construct($string)
    {
        // Валидация строки
        $this->validateStr($string);
        $this->string = $string;
        // Запуск проверки строки
        $this->process();
    }
    
    /**
     * Валидация входной строки
     * @param string $string Строка для валидации
     * @uses Task1\strChecker\BRACKETS_MAP Для анализа символов строки
     * @throws Exception
     * @return void
     */
    protected function validateStr($string)
    {
        // Строка не должна быть пустой
        if(empty($string)) {
            throw new Exception('Пустая строка');
        }
        // В передаваемой строке допустимы только символы скобок из массива-карты
        if (!preg_match('#[\[\]\(\)\{\}]#i', $string)) {
            throw new Exception("Недопустимые символы: {$string}");
        }
        // Проверка первого символа строки, который дожлен быть открывающей скобкой
        $char = $string[0];
        if(BRACKETS_MAP[$char][1] != BRACKET_OPEN) {
            throw new Exception("Неверный начальный символ: {$char}");
        }
        // Проверка последнего символа строки, который дожлен быть закрывающей скобкой
        $char = mb_substr($string, -1);
        if(BRACKETS_MAP[$char][1] != BRACKET_CLOSE) {
            throw new Exception("Неверный конечный символ: {$char}");
        }
        return true;
    }
    
    /**
     * Запуск обработки строки
     * @uses strChecker::$string Для обработки строки
     * @return boolean 
     */
    protected function process()
    {
        $string_len = mb_strlen($this->string); 
        for($i=0; $i<$string_len; ++$i) {
            $el = $this->getElInfo($this->string[$i], $i);
            if($el->dir == BRACKET_OPEN) {
                $this->pushEl($el);
            } else {
                $this->checkEl($el);
            }       
        }
        return true;
    }
    
    /**
     * Проверка текущего элемента строки на предмет закрытия последней открытой скобки
     * @param object $el Проверяемый элемент, сравниваемый с последним элементом из стэка ($el_prev)
     * @throws Exception
     * @return void
     */
    protected function checkEl($el)
    {
        $el_prev = $this->popEl();
        //echo 'checking element: '; print_r($el);
        //echo 'previous element: '; print_r($el_prev);
        //echo 'current stack: '; print_r($this->stack_opened);
        if($el->type != $el_prev->type) {
            throw new Exception("Неверная скобка в строке: {$this->string}, символ '{$el->char}' в позиции {$el->pos}");
        }
    }
    
    /**
     * Создание обьекта со всей необходимой информацией по данному символу скобки и его позиции в строке
     * @param char $char Символ скобки
     * @param int $i Индекс символа в строке
     * @return object
     */
    protected function getElInfo($char, $i)
    {
        $info = BRACKETS_MAP[$char];
        $obj = new stdClass();
        $obj->char = $char;
        $obj->pos = $i;
        $obj->type = $info[0];
        $obj->dir = $info[1];
        return $obj;
    }
    
    /**
     * Добавление элемента открытой скобки в стэк
     * @param object $el Элемент для добавления в стэк
     * @uses strChecker::$stack_opened Для размещения данных
     * @return void
     */
    protected function pushEl($el)
    {
        array_push($this->stack_opened, $el);
    }
    
    /**
     * Удаление элемента из стэка
     * @uses strChecker::$stack_opened Для размещения данных
     * @return object Верхний элемент из стэка
     */
    protected function popEl()
    {
        return array_pop($this->stack_opened);
    }
    
}