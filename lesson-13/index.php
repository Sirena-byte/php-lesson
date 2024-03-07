<?php
require("action.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lesson 13</title>
</head>

<body>
    Задание №1: Вычислить факториал числа, используем классы
    <form action="#" method="post">
        <input type="number" name="num">
        <input type="submit" name="send_num">
    </form>
    <?php
    if (!empty($_POST["send_num"])) {
        $fac = new Factorial($_POST["num"]);
        echo "Факториал числа " . $fac->get_num() . " равен " . $fac->get_factorial($_POST['num']);
    } else {
    }
    ?><br>
    <hr><br>
    Задание №2: Создать класс Калькулятор при помощи классов и методов (можно использовать запись файлов для хранения истории)
    <form action="#" method="POST">
        <input type="text" name="x1">
        <select name="operation" id="">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <input type="text" name="x2">
        <input type="submit" name="send_calc">
    </form>
    <?php

    if (!empty($_POST['send_calc'])) {
        if ((!empty($_POST['x1'])) && (!empty($_POST['x2']))) {
            $calc = new Calc;
            echo $calc->__get("x1") . " " . $calc->__get("operation") . " " . $calc->__get("x2") . " = " . $calc->result_data();
        } else {
            echo "<span style='color:red;'> Введены неккоректные данные. Введите корректные данные и попробуйте еще раз!</span>";
        }
    } else {
        echo "Введите данные и нажмите кнопку 'Отправить'";
    }
    ?>
    <!-- <span style="color: red;">
        <? //$calc->__get("error"); 
        ?>
    </span> -->
    <br>
    <hr><br>
    Задание №3: Используя задание №5 из прошлого дз выполните всё тоже самое (форма регистрации/авторизации и запись в файл) но с использованием классов (создайте класс User или Registration, методы для валидации).

    <form action="#" method="POST">
        <input type="text" name="login">
        <input type="password" name="pass">
        <input type="submit" name="send_reg">
    </form>
    <?php
    if (!empty($_POST['send_reg'])) {
        $user = new User($_POST['login'], $_POST['pass']);
    }
    ?>
    <br>
    <hr><br>
    Задание №4: Создать родительский класс Фигура и дочерний класс Круг (можно ещё несколько дочерних)
    <br>
    <form action="#" method="get">
        Выберите фигуру для нахождения ее площади:<br>
        <select name="shape" id="">
            <option value="none">не выбрано</option>
            <option value="circle">круг</option>
            <option value="square">квадрат</option>
        </select>
            <br><input type='number' name='x'>
            <input type='submit' name='send_num'><br>
        <?php
        if (!empty($_GET['send_num'])) {
            $shape = $_GET['shape'];
            $num = $_GET['x'];
            if ($shape === 'circle') {
                $fig = new Circle($num);
                echo "Вы выбрали круг с радиусом " . $num . " см<br>";
            } elseif($shape === 'square') {
                $fig = new Square($num);
                echo "Вы выбрали квадрат со стороной " . $num . "<br>";
            }else{
                echo "Выберите фигуру для нахождения площади<br>";
            }
        }
        echo "площадь " . $fig->get_name() . "а равна " . $fig->find_area() . " см.";
        ?>
    </form>

</body>

</html>