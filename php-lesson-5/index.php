<?php
function AreaRectangle($lenght, $width){
    return ($lenght * $width);
}
echo AreaRectangle(5,7) . "<br><hr>";

//--------------------------------------


function AmountDays (string $month, int $year){
$months=[
    "январь"=>1,
    "февраль"=>2,
    "март"=>3,
    "апрель"=>4,
    "май"=>5,
    "июнь"=>6,
    "июль"=>7,
    "август"=>8,
    "сентябрь"=>9,
    "октябрь"=>10,
    "ноябрь"=>11,
    "декабрь"=>12];

$count = cal_days_in_month(CAL_GREGORIAN,(int)($months[$month]) , $year);

echo " {$month} в {$year} году содержит {$count} дней <br><hr>";

}

AmountDays("февраль", 2024);

//-----------------------------------------

function PrintStr (string $str){
echo $str;
}
PrintStr("Hello, world!<br><hr>");

//---------------------------------------------
$currentDate = time(); 
$newYourDate = strtotime("2025-01-01"); 
$dateDiff = $newYourDate - $currentDate ; 

echo "До нового года осталось " . floor($dateDiff / (60 * 60 * 24)) ." дней<br><hr>"; 

//-------------------------------------------------

function DateDiff (string $oneDate, string $twoDate) {
    $dateDiff = (strtotime($oneDate)) - (strtotime($twoDate));
    echo "Между указанными датами "  . floor($dateDiff / (60 * 60 * 24)) ." дней<br><hr>";
}
$oneDate = "2024-10-19";
$twoDate = "2024-01-27";
DateDiff ($oneDate,$twoDate);




