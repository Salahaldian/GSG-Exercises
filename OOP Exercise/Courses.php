<?php

namespace App\Classes;

class Course
{
    private $id;
    private $name;

    public function __construct($name)
    {
        $this->id = uniqid();
        $this->name = $name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }
}
