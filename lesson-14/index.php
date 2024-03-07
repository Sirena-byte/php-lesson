<?php
//------1--------
interface Enimal
{
    public function get_name();
    public function hello();
}

class Fox implements Enimal
{
    use Moveable, Eatable, Enimals,Logger;
    private string $name;
    public function __construct()
    {
        $this->name = "Fox";
    }
    public function get_name()
    {
        return $this->name;
    }
    public function hello()
    {
        echo "hello, a'm " . $this->get_name() . "<br>";
    }
    //------4-----------
    public function check_enimal(): bool
    {
        $array = [];
        $array = $this->get_file();

        foreach ($array as $elements) {
            foreach ($elements as $element) {
                foreach ($element as $key => $value)
                    if ($key == "type" && $value == $this->name) {
                        return true;
                    }
            }
            return false;
        }
    }
}
class Elephant implements Enimal
{
    use Moveable, Eatable, Enimals,Logger;
    private string $name;
    public function __construct()
    {
        $this->name = "Elephant";
    }
    public function get_name()
    {
        return $this->name;
    }
    public function hello()
    {
        echo "hello, a'm " . $this->get_name() . "<br>";
    }
    public function check_enimal(): bool
    {
        $array = [];
        $array = $this->get_file();

        foreach ($array as $elements) {
            foreach ($elements as $element) {
                foreach ($element as $key => $value)
                    if ($key == "type" && $value == $this->name) {
                        return true;
                    }
            }
            return false;
        }
    }
}
class Pigeon implements Enimal
{
    use Moveable, Eatable, Enimals,Logger;
    private string $name;
    public function __construct()
    {
        $this->name = "Pigeon";
    }
    public function get_name()
    {
        return $this->name;
    }
    public function hello()
    {
        echo "hello, a'm " . $this->get_name() . "<br>";
    }
    public function check_enimal(): bool
    {
        $array = [];
        $array = $this->get_file();
        foreach ($array as $elements) {
            foreach ($elements as $element) {
                foreach ($element as $key => $value)
                    if ($key == "type" && $value == $this->name) {
                        return true;
                    }
            }
        }
        return false;
    }
}
echo "------------1--------------<br>";
$fox = new Fox;
$fox->hello();

$elephant = new Elephant;
$elephant->hello();

$pigeon = new pigeon;
$pigeon->hello();

echo "<hr>------------2-------------<br>";

trait  Moveable
{
    public function moveable(string $str): string
    {
        return $str;
    }
}
trait Eatable
{
    public function eatable(string $str): string
    {
        return "я ем " . $str;
    }
}
$fox->hello();
echo $fox->moveable("я быстро бегаю. ");
echo $fox->eatable(" того, кого споймаю") . "<br>";

$elephant->hello();
echo $elephant->moveable("я хожу медленно, но уверенно. ");
echo $elephant->eatable("траву и плоды деревьев") . "<br>";

$pigeon->hello();
echo $pigeon->moveable("я умею летать. ");
echo $pigeon->eatable("зерно") . "<br>";

echo "<hr>";
echo "-------------3------------<br>";

trait Enimals
{
    private string $file;
    public function __construct()
    {
        $this->file = "data/Animals.txt";
    }
    public function get_file(): array
    {
        $content = substr(file_get_contents("data/Animals.txt"), 0);
        $animals[] = json_decode($content, true);
        return $animals;
    }
}

if ($fox->check_enimal()) {
    echo $fox->get_name() . " есть в массиве<br>";
} else {
    $log = $fox->get_name() . " в массиве нет<br>";
    $fox->log_data($log);
    echo $log;
}
if ($elephant->check_enimal()) {
    echo $elephant->get_name() . " есть в массиве<br>";
} else {
    $log = $elephant->get_name() . " в массиве нет<br>";
    $elephant->log_data($log);
    echo $log;
}
if ($pigeon->check_enimal()) {
    echo $pigeon->get_name() . " есть в массиве<br>";
} else {
    $log = $pigeon->get_name() . " в массиве нет<br>";
    $pigeon->log_data($log);
    echo $log;
}
echo "-------------6------------<br>";
trait Logger{
    public function log_data($data){
        $myfile = fopen("data/logger.txt","w") or die("невозможно открыть файл!");
        fwrite($myfile,$data);
        fclose($myfile);

    }
}

