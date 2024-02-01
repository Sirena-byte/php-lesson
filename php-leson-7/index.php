<?php
//---Удалить пробелы из исходной строки---
$str = "Я люблю PHP";
$newStr = preg_replace('/\s+/','',$str);
echo $newStr . "<br><hr>";

//-----------------
//---Заменить “PHP” на другую строку---

$newStr = preg_replace('/\bPHP\b/i', 'world', $str);
echo $newStr . "<br><hr>";

//-----------------
//---Найти содержит ли строка подстроку PHP---

echo preg_match("/PHP/", $str) . '<br><hr>';

//------------------
//---Удалить второе слово из исходной строки---

$newStr = preg_replace('/\s(.*)\s/', ' ',$str);
echo $newStr . "<br><hr>";

//------------------
//---Написать регулярку для проверки моб номера телефона для РБ (+375…)---

$pattern = "/^\+\(375\)\d{3}\d{2}\d{2}\d{2}$/";
echo preg_match($pattern, "+(375)295290289") . '<br><hr>';

//-------------------
//---Регулярное выражение для проверки УРЛа вида /catalog/125/item-12/tovar-name
//---Урл адрес должен состоять из 4 выражений отделенными слешами, могут содержать спец символы -_№. Количество цифр может быть любым

$pattern = '/^\/\w+\/\d+\/\w+-\d+\/\w+$/';
echo preg_match('/^\/\w+\/\d+\/\w+-\d+\/\w+-|_|№\w+$/', "/catalog/125/item-12/tovar-name") ? 'true' : 'false' . '<br><hr>';



