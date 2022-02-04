<?php
class Student
{

    public $name;
    function set_name($name)
    {
        $this->name = $name;
    }
    function get_name()
    {
        return $this->name;
    }
}

$wesley = new Student();

$wesley->set_name("Wesley");

echo $wesley->get_name();


class Fruit
{
    public $name;
    protected $color;
    private $weight;

    function getfruit()
    {
        return $this->name;
    }
}

$mango = new Fruit();
$mango->name = 'Mango'; // OK
// $mango->color = 'Yellow'; // ERROR
// $mango->weight = '300'; // ERROR

$mango->getfruit();
