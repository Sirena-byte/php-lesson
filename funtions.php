<?php
// определяем переменные и устанавливаем пустые значения
// $lastname = $firstname = $adress = $phone = $gender = $pass = $bday = "";
$dataUser = [];
$homAdr = [];
$lastnameErr = $firstnameErr = $adressErr = $phoneErr = $bdayErr = $passErr = $genderErr = $homAdressErr = $countryErr = $cityErr = $streetErr = "";

$patternName = "/^[а-яa-z]{3,13}$/iu";
$patternAdress = "/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/";
$patternPhone = "/^\([0-9]{3}\) [0-9]{3}-[0-9]{2}-[0-9]{2}/";
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["firstname"])) {
        $firstnameErr = "Введите фамилию";
    } else {
        if (!preg_match($patternName, $_POST["firstname"])) {
            $firstnameErr = "Введите корректные данные. Фамилия должна содержать только буквы, а также быть не короче 3 и не длиннее 13 символов";
        } else
            $dataUser["firstname"] = test_input($_POST["firstname"]);
    }

    if (empty($_POST["lastname"])) {
        $lastnameErr = "Введите имя";
    } else {
        if (!preg_match($patternName, $_POST["lastname"])) {
            $lastnameErr = "Введите корректные данные. Имя должно содержать только буквы, а также быть не короче 3 и не длиннее 13 символов";
        } else
            $dataUser["lastname"] = test_input($_POST["lastname"]);
    }
    if (empty($_POST["country"])) {
        $countryErr = "Введите страну проживания";
    } else {
        if (!preg_match($patternName, $_POST["country"])) {
            $countryErr = "Введите корректные данные. Название страны должно содержать только буквы, а также быть не короче 3 и не длиннее 13 символов";
        } else
        $homAdr['country'] = test_input($_POST["country"]);
    }
    if (empty($_POST["city"])) {
        $cityErr = "Введите город проживания";
    } else {
        if (!preg_match($patternName, $_POST["city"])) {
            $cityErr = "Введите корректные данные. Название города должно содержать только буквы, а также быть не короче 3 и не длиннее 13 символов";
        } else
        $homAdr['city'] = test_input($_POST["city"]);
    }
    if (empty($_POST["street"])) {
        $streetErr = "Введите улицу";
    } else {
        if (!preg_match($patternName, $_POST["street"])) {
            $streetErr = "Введите корректные данные. Название улицы должно содержать только буквы, а также быть не короче 3 и не длиннее 13 символов";
        } else
            $homAdr['street'] = test_input($_POST["street"]);
    }

    if (empty($_POST["adress"])) {
        $adressErr = "Введите email";
    } else {
        if (!preg_match($patternAdress, $_POST["adress"])) {
            $adressErr = "Некорректно введён email";
        } else
            $dataUser["adress"] = test_input($_POST["adress"]);
    }

    if (empty($_POST["bday"])) {
        $bdayErr = "Введите дату рождения";
    } else {
        $dataUser["bday"] = test_input($_POST["bday"]);
    }

    if (empty($_POST["pass"])) {
        $passErr = "Введите пароль";
    } else {
        $dataUser["pass"] = test_input($_POST["pass"]);
    }

    if (empty($_POST["phone"])) {
        $phoneErr = "Введите номер телефона";
    } else {
        if (!preg_match('/^\+[0-9]{3}-[0-9]{2}-[0-9]{3}-[0-9]{2}-[0-9]{2}/', $_POST["phone"])) {
            $phoneErr = "Некорректно введён номер телефона. Введите номер телефона в формате +375-29-222-22-22";
        } else
            $dataUser["phone"] = test_input($_POST["phone"]);
    }
    if (empty($_POST["gender"])) {
        $genderErr = "Выберите половую принадлежность";
    } else {
        $dataUser["gender"] = test_input($_POST["gender"]);
    }
}

function adr(array &$dataUser,array $data) {
array_push($dataUser,$data);
}


