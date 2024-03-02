<?php
session_start();
require("action_form.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    Задание №1<br>
    Создать форму для регистрации (учета) пользователей: форма может содержать любые данные, данные необходимо записывать в файл<br>
    <form action="#" method="post">
        Имя: <input type="text" name="firstname">
        Фамилия: <input type="text" name="lastname">
        <input type="submit" name="send_name">
    </form>
    <?php
    if (!empty($_POST["send_name"])) {
        $file = fopen("DB.txt", "r") or die("Невозможно открыть файл");
        while (!feof($file)) {
            echo fgets($file) . "<br>";
        }
        fclose($file);
    }
    ?>
    <hr>
    Задание №2<br>
    Создать файл, заполнить его случайными числами от 0 до 10, написать функцию которая будет принимать пользовательское значение с формы, посчитать сколько раз встречается введенное пользователем число в файле<br>
    Введите искомое число:
    <form action="#" method="post">
        <input type="number" name="num">
        <input type="submit" name="send_num">
    </form>

    <?php
    if (!empty($_POST["send_num"])) {
        echo "Файл содержит числа: " . print_file('rand.txt') . "<br>";
        echo  "Введенное вами число " . $num . " встречается в файле " . count_f($num) . " раз.";
    }
    ?>


    <hr>
    Задание №3: Получить структуру текущего каталога, посчитать количество папок и файлов в данном каталоге<br>
    <?= "Структура текущего каталога: " . $_SERVER['DOCUMENT_ROOT'] . "<br>" ?>
    Дирректория содержит <br><?= count_file($_SERVER['DOCUMENT_ROOT']) ?> файлов<br><?= count_dir($_SERVER['DOCUMENT_ROOT']) ?> папок.<br>
    <hr>
    Задание №4: Написать функцию транслит используя строку ввода. Пользователь вводит текст на русском языке и при нажатии на кнопку отправить, ему показывается строка - транслит (например, привет - privet). Правила транслита не важны.
    <form action="#" method="post">
        <input type="text" name="str">
        <input type="submit" name="send_str">
    </form>
    <?php if (!empty($_POST['send_str'])) {
        $str = $_POST["str"];
        echo "Полученная строка: " . translit($str);
    } ?>
    <hr>
    Задание №5: Используя 1 задание написать авторизацию с использованием сессий: создать сессию, в неё записать логин пользователя и всё содержание сессии (id, логин и остальное по умолчанию) и при входе на страницу (или создать другую) должно подтягивать пользователя из авторизации и выдавать ему приветствие.
    <form action="#" method="post">
        Логин: <input type="text" name="login">
        Пароль: <input type="password" name="pass">
        <input type="submit" name="send_autorization">
    </form>
    <?php
    if (!empty($_POST["send_autorization"])) {
        if (!empty($_SESSION['user_id']))
            die('Вы уже авторизованы');
        $user = ($_POST['login']);
        if (!$user)
            die('Пользователь не найден');
        echo "Привет,  $user <br> ";
    }
    session_destroy();
    ?>
</body>

</html>