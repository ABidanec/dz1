<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Домашнее задание 1. Тема функции.</title>
</head>
<body>
<?php

/*
 * 2. Функция, принимающая 2 параметра массив
        чисел и строку, обозначающую
        арифметическое действие, которое нужно выполнить со всеми элементами
        массива. Функция должна выводить результат на экран.
 */

function arithmeticOperator($arrayNumbers,$operator){
    if(!is_array($arrayNumbers)) {
        echo '<p>Данные предоставленные в не верном формате!</p>';
        return false;
    }
    if(!is_string($operator)){
        echo '<p>Не верный формат оператора!</p>';
        return false;
    }

    $result = 0;

    switch($operator){
        case '+':
            foreach($arrayNumbers as $q)
                $result += $q;
            break;
        case '-':
            $result = $arrayNumbers[0];
            for($i=1;$i<count($arrayNumbers);$i++)
                $result -= $arrayNumbers[$i];
            break;
        case '*':
            $result = 1;
            foreach($arrayNumbers as $q)
                $result *= $q;
            break;
        case '/':
            $result = 1;
            foreach($arrayNumbers as $q){
                if($q == 0) die("<p>Ошибка деления на 0!</p>");
                $result /= $q;
            }
            break;
        default:
            die ('<p>Ошибка значения оператора!</p>');
            break;
    }

    echo '<p>Результат выплонения функции: '.$result.'</p>';
    return true;

}
/*
 * проверка работы функции arithmeticOperator
 */
/*
$arrNumb = array(1,2,3,4,5);
$arrNumb2 = array(1,2,0,3,4,5);
$arrNumb3 = array(10,1,1);

arithmeticOperator($arrNumb,'+');
arithmeticOperator($arrNumb,'-');
arithmeticOperator($arrNumb2,'-');
arithmeticOperator($arrNumb3,'-');
arithmeticOperator($arrNumb,'*');
arithmeticOperator($arrNumb,'/');

//arithmeticOperator($arrNumb2,'/');

arithmeticOperator('d','/');
arithmeticOperator($arrNumb,false);

arithmeticOperator($arrNumb,'dsfdsfsdf');
/*
 * **************************************
 */

/*
 * 3. Функция, принимающая переменное число аргументов, но первым аргументов
обязательно должна быть строка, обозначающее арифметическое действие,
которое необходимо выполнить со всеми передаваемыми аргументами.
 */

function aOperator(){
    if(func_num_args() == 0)
        die('<p>Нет аргументов для работы!</p>');
    if(func_num_args() <3)
        die('<p>Не достаточно аргументов для работы. Минимальное число аргументов - 3. Первый оператор строкового типа,
                остальные числа (не менее 2-х).</p>');
    if(!is_string(func_get_arg(0)))
        die('<p>Не верный формат оператора</p>');

    $result = 0;

    switch (func_get_arg(0)){
        case '+':
            for($i = 1; $i < func_num_args(); $i++)
                $result += func_get_arg($i);
            break;
        case '-':
            $result = func_get_arg(1);
            for($i = 2; $i < func_num_args(); $i++)
                $result -= func_get_arg($i);
            break;
        case '*':
            $result = 1;
            for($i = 1; $i < func_num_args(); $i++)
                $result *= func_get_arg($i);
            break;
        case '/':
            $result = 1;
            for($i = 1; $i < func_num_args(); $i++){
                if(func_get_arg($i) == 0) die("<p>Ошибка деления на 0!</p>");
                $result /= func_get_arg($i);
            }
            break;
        default:
            die ('<p>Ошибка значения оператора!</p>');
            break;
    }

    echo '<p>Результат работы функции:'.$result.'</p>';
}

/*
 * проверка работы функции aOperator
 */
/*
aOperator("+",1,2,3.5);
aOperator("-",1,2,3.5);
aOperator("-",1,2,0,3,4,5);
aOperator("*",1,2,3.5);
aOperator("/",1,2,3.5);

//aOperator("/",1,2,0,3.5);

//aOperator(1,2,3.5);
//aOperator();
aOperator("-",1);
/*
 * **************************************
 */


/*
 * 7. Функция, получающая 1 параметр (строку) и возвращающая TRUE если
строка
является палиндромом, FALSE в
противном случае.
 */


function isPalindrom($str){
    if(is_string($str)){
        $str = strtolower($str);
        $rev = function($s){
            preg_match_all('/./us', $s, $ar);
            return join('', array_reverse($ar[0]));
        };

        if($str === $rev($str)){
            return true;
        }else{
            return false;
        }
    }else{
        die("Входные данные не являются строкой!");
    }

}

/*
* проверка работы функции isPalindrom($str)
*/

echo isPalindrom('фау уаф').'<br>';
echo isPalindrom(' фау уаф ').'<br>';
echo isPalindrom(' фаууаф ').'<br>';
echo isPalindrom('фаафы').'<br>';
echo isPalindrom('фааф').'<br>';
echo isPalindrom('ф').'<br>';
echo isPalindrom('фф').'<br>';
echo isPalindrom('фаууаф').'<br>';
echo isPalindrom(' фау уаф ').'<br>';
echo isPalindrom('фауцуаф').'<br>';
echo isPalindrom('фауйлдуаф').'<br>';
echo isPalindrom(' ddssdd ').'<br>';
echo isPalindrom(true).'<br>';

/* end */
?>
</body>
</html>