<?php

//--------------------
//---Написать функцию, которая принимает на вход массив из целых чисел и вычисляет их сумму---
$arr = [1, 6, 3, 2, 5];

function Sum (array $arr) : int{
    $sum = 0;
    foreach ($arr as $values){
        $sum += $values;
    }
return $sum;
};

echo Sum($arr) . "<br><hr>";

//-----------------------
//---Написать функцию, которая принимает на вход массив первым аргументом и вторым аргументом что-то строковое. Проверить содержат ли элементы данного массива это число, завершить выполнение массива, если да.---
$array = ['one','two','three','four'];


function SearchArg(array $array,string $str){
    foreach($array as $value){
        if($value === $str){
            echo $value . "<br><hr>";
            break;
        }
    }
}

SearchArg($array, 'three');
//-----------------------
//---Написать функцию, которая принимает на вход массив, а возвращает элементы массива отсортированные по возрастанию.---

function SortArr(array $arr) : array {
  
    $temp = 0; // временная переменная для обмена элементов местами
    // Сортировка массива пузырьком
    for ($i = 0; $i < count($arr)- 1; $i++) {
        for ($j = 0; $j < count($arr) - $i - 1; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                // меняем элементы местами
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;
            }
        }
    }
    return $arr;
};

echo "<pre>";
var_dump(SortArr($arr));
echo "</pre>";
