<?php
$str = "я люблю обучаться PHP";


$newStr = mb_convert_case($str, MB_CASE_TITLE, "UTF-8");
echo $newStr . "<br><hr>";

//--------------------------------

function ReplacementWord(string $str,string $replace) : string{
    $res = str_replace("PHP", $replace, $str);
 return $res;
}

$res = replacementWord($str,"наукам");
echo $res . "<br><hr>";

//-------------------------
$newStr = preg_replace('/ {2,}/',' ',$str);//удаляем лишние пробелы
$count = sizeof(mb_split(" ",$str));
echo "В строке '{$str}'  {$count} слова <br><hr>";

//----------------------------

$count = mb_strlen($str,'UTF-8');
$newStr = str_replace(' ','',$str);
$count2 = mb_strlen($newStr,'UTF-8');
echo "В строке '{$str}' {$count} символов включая пробелы и {$count2} символов исключая пробелы<br><hr>";

//---------------------------
$array = [
	"name" => "Fred",
	"remove" => True,
	"additional_params" => [
        "is_married" => false,
        "country" => "France",
        "born" => "10.09.1982"
    ]
];
echo "начальный массив: <br>";
echo "<pre>";
print_r($array);
echo "</pre>";
unset($array["remove"]);
echo "полученный массив: <br>";
echo "<pre>";
print_r($array);
echo "</pre>";
echo "<br><hr>";
//--------------------
function get_age( $birthday ){

	$diffDate = date( 'Ymd' ) - date( 'Ymd', strtotime($birthday) );

	return substr( $diffDate, 0, -4 );
}
$age = get_age(19831019);
echo "Вам {$age} лет<br><hr>";

//---------------------------

ksort($array);
echo "<pre>";
print_r($array);
echo "</pre>";
echo "<br><hr>";

//------------------------

$array["additional_params"]["country"] =[
    "country"=>"Беларусь",
    "capital"=>"Минск",
    "timezone"=>"UTC+3",
];
echo "полученный массив после изменения ключа: <br>";
echo "<pre>";
print_r($array);
echo "</pre>";
echo "<br><hr>";
//--------------------------

$arr = [ "child" => null];
$result = array_merge($array,$arr);

echo "полученный массив после слияния: <br>";
echo "<pre>";
var_dump($result);
echo "</pre>";
echo "<br><hr>";

//-----------------------------------

$result = explode(".",$array["additional_params"]["born"]);


$array["additional_params"]["born"] =[
    "day"=>$result[0],
    "month"=>$result[1],
    "year"=>$result[2]
];
echo "<pre>";
print_r($array);
echo "</pre>";

//-------------------
$maxRes = max($array["additional_params"]["born"]);
$minRes = min($array["additional_params"]["born"]);

echo "максимальное знчение в дате рождения = {$maxRes}, минимальное значение = {$minRes} <br><hr>";

//--------------------------------

array_multisort($array["additional_params"]["born"]);
echo "<pre>";
print_r($array);
echo "</pre>";

//---------------------------------

function getZodiacalSign($month, $day) {
    $signs = ["Козерог", "Водолей", "Рыбы", "Овен", "Телец", "Близнецы", "Рак", "Лев", "Девa", "Весы", "Скорпион", "Стрелец"];
    $signsstart = [1=>21, 2=>20, 3=>20, 4=>20, 5=>20, 6=>20, 7=>21, 8=>22, 9=>23, 10=>23, 11=>23, 12=>23];
    return $day < $signsstart[$month + 1] ? $signs[$month - 1] : $signs[$month % 12];
  }

  echo getZodiacalSign($array["additional_params"]["born"]["month"],$array["additional_params"]["born"]["day"]);

