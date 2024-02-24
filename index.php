<?php
//Вычислить факториал числа, используем классы
class Factorial
{
    private int $n;
    public function get_factorial(int $n): int
    {
        $this->n = $n;
        if ($this->n === 0) {
            return 0;
        }
        if ($this->n === 1) {
            return 1;
        } else {
            for ($i = 1, $sum = 1; $i <= $this->n; $i++) {
                $sum = $sum * $i;
            }
            return $sum;
        }
    }
}

$fac = new Factorial;
echo $fac->get_factorial(3) . "<br><hr>";
?>


<?php
//Создать класс Калькулятор при помощи классов и методов (можно использовать запись файлов для хранения истории)
class Calc
{
    private float $x1;
    private float $x2;
    private string $operation;
    private float $result;
    private string $error;
    public function __construct()
    {
        if (!empty($_POST)) {

            if ((!empty($_POST['x1']) != "") && (!empty($_POST['x2']) != "")) {
                $this->x1 = (preg_replace("/[^0-9]/", "", $_POST['x1']));
                $this->x2 = (preg_replace("/[^0-9]/", "", $_POST['x2']));
                $this->operation = $_POST['operation'];
                $this->error = "";
                var_dump($this);
            }
        } else {
            $this->error = "Введите корректные данные";
        }
    }
    public function result_data()
    {
        switch ($this->operation) {
            case "+":
                $this->result = $this->x1 + $this->x2;
                return $this->result;
                break;
            case "-":
                $this->result = $this->x1 - $this->x2;
                return $this->result;
                break;
            case "*":
                $this->result = $this->x1 * $this->x2;
                return $this->result;
                break;
            case "/":
                $this->result = $this->x1 / $this->x2;
                return $this->result;
                break;
            default:
                $this->error = "Введены некорректные данные. Исправьте данные и попробуйте еще раз!";
                return $this->error;
        }
    }
    public function __get($property)
    {
        switch ($property) {
            case "x1":
                return $this->x1;
                break;
            case "x2":
                return $this->x2;
                break;
            case "result":
                return $this->reset;
                break;
            case "operation":
                return $this->operation;
                break;
            case "result":
                return $this->result;
                break;
            case "error":
                return $this->error;
                break;
        }
    }
}
$calc = new Calc;


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="#" method="POST">
        <input type="text" name="x1">
        <select name="operation" id="">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <input type="text" name="x2">
        <input type="submit" value="итого">
    </form>

    <?php
    if (($calc->__get("x1") != "") && ($calc->__get("x2") != ""))
        echo $calc->__get("x1") . " " . $calc->__get("operation") . " " . $calc->__get("x2") . " = " . $calc->result_data();
    else {
        // echo $calc->__get("error");
        echo "Введены неккоректные данные";
    }

    ?>
    <span style="color: red;"><?= $calc->__get("error"); ?></span>

</body>

</html>