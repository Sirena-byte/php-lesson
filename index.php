<!--Сделать форму-анкету с отправкой данных на сервер (можно использовать один файл с формой и пхп скриптом).
 В форме запросить данные пользователя - номер телефона, адрес, дата рождения, email, пол как radio. Произвести валидацию всех полей формы на клиенте (если возможно html, кто может js) и на сервере усилиями php.-->
<?php
include("funtions.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" autocomplete="on">
        <fieldset>
            <legend>Аккаунт пользователя</legend>
            <input type="text" name="lastname" pattern="[A-zА-я]{3-12}" placeholder="Введите свое имя" autofocus required>
            <span style="color: red;">* <?php echo $lastnameErr;?></span><br>
            <input type="text" name="firstname" pattern="[A-zА-я]{3-12}" placeholder="Введите свою фамилию" required>
            <span style="color: red;">* <?php echo $firstnameErr;?></span><br>
            <input type="text" name="country" pattern="[A-zА-я]{3-12}" placeholder="Введите страну" required>
            <span style="color: red;">* <?php echo $countryErr;?></span><br>
            <input type="text" name="city" pattern="[A-zА-я]{3-12}" placeholder="Введите город" required>
            <span style="color: red;">* <?php echo $cityErr;?></span><br>
            <input type="text" name="street" pattern="[A-zА-я]{3-12}" placeholder="Введите улицу" required>
            <span style="color: red;">* <?php echo $streetErr;?></span><br>
            <input type="text" name="adress" pattern="([A-z])+([0-9\-_\+\.])*([A-z0-9\-_\+\.])*@([A-z])+([0-9\-_\+\.])*([A-z0-9\-_\+\.])*[\.]([A-zА-я])+" placeholder="Введите адрес эл почты" required>
            <span style="color: red;">* <?php echo $adressErr; ?></span><br>
            <input type="phone" name="phone" placeholder="Введите номер телефона" pattern="^\+?[375][-\(]?\d{3}\)?-?\d{3}-?\d{2}-?\d{2}$" required><span style="color: red;">* <?php echo $phoneErr; ?></span><br>
            <label for="gender">Введите вашу половую принадлежность: </label><br>
            <select name="gender" id="gender" required>
                <option value=""></option>
                <option value="женский">женский</option>
                <option value="мужской">мужской</option>
                <option value="другой">еще не определился</option>
            </select><span style="color: red;">* <?php echo $genderErr; ?></span><br>
            <input type="password" name="pass" placeholder="Пароль" maxlength="12" required><span style="color: red;">* <?php echo $passErr; ?></span><br>
            <label for="date">Дата рождения: </label><br>
            <input type="date" name="bday" max="2020-12-31" placeholder="Введите вашу дату рождения" required><span style="color: red;">* <?php echo $bdayErr; ?></span>
        </fieldset>
        <input type="submit" name="submit" value="Отправить данные на сервер">
        <input type="reset">
    </form>
    <pre>
 <?php
 adr($dataUser,$homAdr);
 var_dump($dataUser);?> 
    </pre>
</body>

</html>