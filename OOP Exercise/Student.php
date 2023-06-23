<?php

namespace App\Classes;

class Student
{
    private $id;
    private $name;
    private $email;
    private $courses;

    public function __construct($name, $email, $courses = [])
    {
        $this->id = uniqid();
        $this->name = $name;
        $this->email = $email;
        $this->courses = $courses;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function addCourse(Course $course)
    {
        $this->courses[] = $course;
    }

    public function getCourses()
    {
        return $this->courses;
    }
}
?>
