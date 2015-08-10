<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Домашнее задание 1. Тема функции.</title>
</head>
<body>


<?php
/*
 * dz functions
 */


/*
 * 1. Функция, принимающая массив строк и выводящая каждую строку в отдельном
 *  параграфе.
 */
function showArrayStrings($aString){
    if(!is_array($aString)){
        echo "<p>Эта переменная не является массивом</p>";
        return false;
    }else{
        if(count($aString) == 0){
            echo '<p>Массив пустой!</p>';
        }
        foreach($aString as $a){
            if(!is_string($a)){
                echo "<p>Не все элементы являются строками!</p>";
                return false;
            }
        }
        foreach($aString as $a){
            echo "<p>{$a}</p>";
        }
        return true;
    }
}
/*
 * проверка работы функции showArrayStrings
 */
/*
$arrStr = array('Apple','cherry','raspberries','pear','watermelon');
$intVar = 3;
$arrStr2 = array('Apple','cherry','raspberries','pear','watermelon', true);
$arrStr3 = array();

showArrayStrings($arrStr);
showArrayStrings($intVar);
showArrayStrings($arrStr2);
showArrayStrings($arrStr3);
/*
 * ********************************
 */

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
            foreach($arrayNumbers as $q)
                $result -= $q;
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

arithmeticOperator($arrNumb,'+');
arithmeticOperator($arrNumb,'-');
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
            for($i = 1; $i < func_num_args(); $i++)
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
 * 4. Функция принимающая два параметра 2
целых числа. Если вводятся не 2 целых
числа то
функция должна выводить ошибку на экран. Если пользователь вводит 2
целых числа то
ему должна отрисовываться таблица умножение размером со
значения параметров, переданных функции. Например, если вызовем нашу
функцию таким образом tabl (4,3), то функция нарисует следующую таблицу
 */

function drawTable($rows,$cols){
    if(!is_int($rows) || !is_int($cols))
        die('<p>Не верный тип параметров. Оба параметра должны быть целыми числами!</p>');

    echo "<table border='1' cellpadding='1' cellspacing='1'>";
    for($i = 1; $i<=$rows;$i++){
        if($i == 1)
            echo "<tr style='background: #CFE2F3'>";
        else
            echo '<tr>';
            for($j = 1;$j <=$cols;$j++){
                if($j == 1)
                    echo "<td style='padding:5px; background: #FFF2CC'>".$i*$j."</td>";
                else
                    echo "<td style='padding:5px;'>".$i*$j."</td>";
            }
        echo '</tr>';
    }
    echo '<table>';
}

/*
* проверка работы функции drawTable($rows,$cols)
*/
/*
drawTable(10,10);

drawTable(1.5,14);
/*
 * **************************************
 */

/*
 * 5. Функция, принимающая в качестве аргумента массив чисел вида: 1, 22, 5, 66, 3, 57
и возвращает массив по возрастанию: 1, 3, 5, 22, 57, 66
 */

function sortUp($arr){
    if(!is_array($arr)) die('<p>Параметр функции не является масивом!</p>');

    if((count($arr) == 0) ||(count($arr) == 1)){
        return $arr;
    }

    for($i=0;$i<count($arr);$i++){
        for($j=0;$j<count($arr)-1-$i;$j++){
            if($arr[$j]>$arr[$j+1]){
                $temp = $arr[$j];
                $arr[$j] = $arr[$j+1];
                $arr[$j+1] = $temp;
            }
        }
    }

    return $arr;
}

/*
* проверка работы функции sortUp($arr)
*/
/*
$a = array(34,0,-4,456,1024,-90,4.458,-880);
$a1 = array();
$a2 = array(12);
echo '<pre>';

echo 'массив $a до сортировки <br>';
var_dump($a);
echo 'массив $a после сортировки <br>';
var_dump(sortUp($a));
echo '<br>';
echo 'массив $a до сортировки <br>';
var_dump($a1);
echo 'массив $a после сортировки <br>';
var_dump(sortUp($a1));
echo '<br>';
echo 'массив $a до сортировки <br>';
var_dump($a2);
echo 'массив $a после сортировки <br>';
var_dump(sortUp($a2));
echo '<br>';
sortUp('string');

echo '</pre>';


/*
 * **************************************
 */

/*
 * 6. Рекурсивную функцию, принимающую два целых числа начальное
значение и
конечное значение. Например, первый аргумент 10, второй 35.
Функция должна
вывести на список нечетных чисел от 10 до 35.
 */
function recursionN($a,$b){
    if($a>$b) die('<p>Не верный формат параметров. Первый параметр не должен быть больше другого!</p>');
    if((!is_int($a)) || (!is_int($b))) die('<p>Не верный формат параметров. Параметры должны быть целочисленного типа!</p>');
    $temp = $a;
    if($temp<$b){
        if(!($temp%2 == 0) ) echo $temp.' ';
        $temp++;
        recursionN($temp, $b);
    }
    return;
}

/*
* проверка работы функции recursionN($a,$b)
*/
/*
recursionN(10, 20);
echo '<br>';
recursionN(10, 27);
echo '<br>';
recursionN(10, 10);
echo '<br>';
//recursionN('dsfw3f', 20);
echo '<br>';
recursionN(10, 2);

/*
 * **************************************
 */

/*
 * 7. Функция, получающая 1 параметр (строку) и возвращающая TRUE если
строка
является палиндромом, FALSE в
противном случае.
 */

/*
 * в обоих функциях изменил вывод булевых значений на числовые
 * true = 1
 * false = 0
 * так как при выводе результата в случае false возвращается пустая строка и не видно результата в браузере
 */

function isPolindrom($str){

    if(!is_string($str)) die('<p>Параметр функции не является строкой!</p>');

    if(strlen($str) == 0) die('<p>Строка пуста!</p>');

    if(strlen($str) == 1) return 1;

    if(strlen($str) == 2) {
        if ($str{0} == $str{1})  return 1;
        else return 0;
    }


    if(strlen($str) > 2){
        if($str{0} == $str{strlen($str) -1}) {
            return isPolindrom(substr($str, 1, strlen($str) - 2));
        }
    }
}


// или так
function isP($str){
    if(!is_string($str)) die('<p>Параметр функции не является строкой!</p>');

    if(strlen($str) == 0) die('<p>Строка пуста!</p>');

    $temp = strrev($str);

    if($str === $temp) return 1;
    else return 0;
}


/*
* проверка работы функции isPolindrom($str)
*/
/*


echo isPolindrom('abcdrtdcba');
echo '<br>';
echo isPolindrom('abcddcba');
echo '<br>';
echo isPolindrom('asa');
echo '<br>';
echo isPolindrom('ab');
echo '<br>';
echo isPolindrom('aa');
echo '<br>';
echo isPolindrom('a');
echo '<br>';
//echo isPolindrom('');
echo '<br>';
//echo isPolindrom(458);

echo '<h1>Простой вид функции проверки на палиндром</h1>';
echo isP('abcdrtdcba');
echo '<br>';
echo isP('abcddcba');
echo '<br>';
echo isP('asa');
echo '<br>';
echo isP('ab');
echo '<br>';
echo isP('aa');
echo '<br>';
echo isPolindrom('a');
echo '<br>';
echo isP('');
echo '<br>';
//echo isP(458);


/*
 * end dz 1  **********************************
 */

?>
</body>
</html>