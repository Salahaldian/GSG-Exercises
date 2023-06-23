<?php

namespace App;

use App\Classes\Student;

trait Loggable
{
  public function log($message)
  {
    // فتح الملف
    $logFile = fopen('log.txt', 'a'); // a للكتابة على الموجود في الملف
    fwrite($logFile, $message . PHP_EOL); // شو بدي اكتب في الملف
    fclose($logFile); // اغلاق الملف
  }
}

class Manager
{
  use Loggable;

  private $students;

  public function __construct()
  {
    $this->students = [];
  }

  public function addStudent(Student $student)
  {
    $this->students[$student->getId()] = $student;
    $this->log('Added student: ' . $student->getId());
  }

  public function getStudentById($id)
  {
    if (isset($this->students[$id])) {
      return $this->students[$id];
    }
    return null;
  }

  // عملية تحديث بيانات الطالب من خلال ال id
  public function updateStudent(Student $student)
  {
    if (isset($this->students[$student->getId()])) {
      $this->students[$student->getId()] = $student;
      $this->log('Updated student: ' . $student->getId());
    }
  }

  // عملية حذف طالب من خلال ال id
  public function deleteStudent(Student $student)
  {
    if (isset($this->students[$student->getId()])) {
      unset($this->students[$student->getId()]);
      $this->log('Deleted student: ' . $student->getId());
    }
  }
}
