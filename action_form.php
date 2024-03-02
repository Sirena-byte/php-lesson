<?php
$firstname = "";
$lastname = "";
$send_name = "";
$send_num = "";
$send_str = "";


if (isset($_POST['lastname']) && isset($_POST['firstname'])) {
    $myfile = fopen("DB.txt", "a+") or die("Невозможно открыть файл!");
    $firstname = trim(htmlspecialchars($_POST['firstname']));
    $lastname = trim(htmlspecialchars($_POST['lastname']));
    fwrite($myfile, $firstname);
    fwrite($myfile, " ");
    fwrite($myfile, $lastname);
    fwrite($myfile, "\n");
    fclose($myfile);
} else {
    echo "Данные не введены!";
}

//----------2---------------------
$file_rand = fopen("rand.txt", "w") or die("Невозможно открыть файл!");
// $numbers = [];
for ($i = 0; $i < 10; $i++) {
    $numbers[$i] = mt_rand(0, 10);
    fwrite($file_rand, $numbers[$i] . "\n");
}
fclose($file_rand);
if (isset($_POST['num'])) {
    $num = $_POST["num"];
}
//header('Location: http://' . $_SERVER['HTTP_HOST']);

function count_f(int $num): int
{
    $count = 0;
    $myfile = fopen("rand.txt", "r") or die("Невозможно открыть файл!");
    $numbers = [];
    while (!feof($myfile)) {  // цикл завершится, при обнаружении конца файла
        $numbers[] = fgets($myfile); // Вывести одну строку
    }
    fclose($myfile);
    array_pop($numbers);

    foreach ($numbers as $number) {
        if ($number == $num) {
            $count++;
        }
    }
    return $count;
}
function print_file($file)
{
    $myfile = fopen("rand.txt", "r") or die("Невозможно открыть файл!");
    while (!feof($myfile)) {  // цикл завершится, при обнаружении конца файла
        echo fgets($myfile) . " "; // Вывести одну строку
    }
    fclose($myfile);
    echo "<br>";
}
//---------------3---------------
function count_file(string $path): int
{
    $count = 0;
    if ($dir = opendir($path)) {
        echo "Файлы:<br>";
    }

    while (false !== ($entry = readdir($dir))) {
        if ($entry != "." && $entry != ".." && !is_dir($entry)) {
            echo "$entry<br>";
            $count++;
        }
    }
    closedir($dir);
    return $count;
}
function count_dir(string $path): int
{
    $count = 0;
    if ($dir = opendir($path)) {
        echo "Папки:<br>";
    }
    while (false !== ($entry = readdir($dir))) {
        if ($entry != "." && $entry != "..") {
            if (is_dir($entry)) {
                echo "$entry<br>";
                $count++;
            }
        }
    }
    closedir($dir);
    return $count;
}
//-------------4----------
function translit($str)
{
$tr = array(
"А"=>"A","Б"=>"B","В"=>"V","Г"=>"G",
"Д"=>"D","Е"=>"E","Ж"=>"J","З"=>"Z","И"=>"I",
"Й"=>"Y","К"=>"K","Л"=>"L","М"=>"M","Н"=>"N",
"О"=>"O","П"=>"P","Р"=>"R","С"=>"S","Т"=>"T",
"У"=>"U","Ф"=>"F","Х"=>"H","Ц"=>"TS","Ч"=>"CH",
"Ш"=>"SH","Щ"=>"SCH","Ъ"=>"","Ы"=>"YI","Ь"=>"",
"Э"=>"E","Ю"=>"YU","Я"=>"YA","а"=>"a","б"=>"b",
"в"=>"v","г"=>"g","д"=>"d","е"=>"e","ж"=>"j",
"з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
"м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
"с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
"ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"y",
"ы"=>"yi","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya",
"Ё"=>"E","Є"=>"E","Ї"=>"YI","ё"=>"e","є"=>"e","ї"=>"yi",
" "=> "_", "/"=> "_"
);
if (preg_match('/[^A-Za-z0-9_\-]/', $str)) {
$str = strtr($str,$tr);
$str = preg_replace('/[^A-Za-z0-9_\-.]/', '', $str);
}
return $str;
}

//-----------5-----------
