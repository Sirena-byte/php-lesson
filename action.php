<?php
//---------1-----------
class Factorial
{
    private int $n;
    public function __construct($num)
    {
        $this->n = $num;
    }
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
    public function get_num(): int
    {
        return $this->n;
    }
}
//-----------2--------

class Calc
{
    private  $x1;
    private  $x2;
    private string $operation;
    private float $result;
    private string $error;
    public function __construct()
    {
        if (!empty($_POST['send_calc'])) {
            if ((!empty($_POST['x1'])) && (!empty($_POST['x2']))) {
                $this->x1 = (preg_replace("/[^0-9]/", "", $_POST['x1']));
                $this->x2 = (preg_replace("/[^0-9]/", "", $_POST['x2']));
                $this->operation = $_POST['operation'];
                $this->error = "";
            } else {
                $this->error = "Заполните поля и нажмите 'итого'";
            }
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
//------3------
class User
{
    private string $login = "";
    private string $pass = "";
    private string $file = "my_base";

    public function __construct($login, $password)
    {
        if (!empty($_POST['send_reg'])) {
            $this->login = $this->validate($login, '/^[-_a-z\d]{4,16}$/i');
            $this->pass = $this->validate($password, '/^[0-9]{4,16}$/');
            $this->write_file();
        } else {
            echo "попробуйте еще раз";
        }
    }
    public function validate($value, $pattern)
    {
        if (!empty($value)) {
            $value = htmlspecialchars(trim($value));
            if (preg_match($pattern, $value)) {
                return $value;
            } else {
                echo "не подходит под заданные критерии ввода";
                return "ошибка";
            }
        }
    }
    public function write_file()
    {
        $myfile = fopen($this->file, "a") or die("Невозможно открыть файл!");
        $str = $this->login . "-" . $this->pass . "\n";
        fwrite($myfile, $str);
        fclose($myfile);
    }
}
//------------4-------------

class Shape
{
    protected string $name;
    public function __construct()
    {
        $this->name = "";
    }
    public function get_name(){
        return $this->name;
    }
}
class Circle extends Shape
{
    protected int $r;
    public function __construct (int $r)
    {
        $this->r=$r;
        $this->name = "круг";
    }
    public function find_area()
    {
        return (3.14 * ($this->r*$this->r));
    }
}
class Square extends Shape
{
    protected int $x;
    public function __construct(int $x)
    {
        $this->x = $x;
        $this->name = "квадрат";
    }
    public function find_area(){
return ($this->x*$this->x);
    }
}
