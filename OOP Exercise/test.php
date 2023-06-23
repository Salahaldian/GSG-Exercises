<?php

require_once 'Student.php';
require_once 'Courses.php';
require_once 'Manager.php';

use App\Classes\Student;
use App\Classes\Course;
use App\Manager;

$manager = new Manager();

// Add students
$student1 = new Student('Salahaldin', 'salah@gmail.com');
$student2 = new Student('Ahmad', 'ahmad@gmail.com');
$manager->addStudent($student1);
$manager->addStudent($student2);

// Update student details
$student1->setName('Salahaldin 2');
$manager->updateStudent($student1);

// Add courses to student
$course1 = new Course('Mathematics');
$course2 = new Course('Science');
$student1->addCourse($course1);
$student1->addCourse($course2);
$manager->updateStudent($student1);

// الجزئية التالية تم حلها بمساعدة من chatGPT
// Retrieve student information
$retrievedStudent1 = $manager->getStudentById($student1->getId());
$retrievedStudent2 = $manager->getStudentById($student2->getId());

if ($retrievedStudent1) {
    echo "Retrieved student 1:<br>";
    echo "ID: " . $retrievedStudent1->getId() . "<br>";
    echo "Name: " . $retrievedStudent1->getName() . "<br>";
    echo "Email: " . $retrievedStudent1->getEmail() . "<br>";
    echo "Courses:<br>";
    foreach ($retrievedStudent1->getCourses() as $course) {
        echo "- " . $course->getName() . "<br>";
    }
    echo "<br>";
} else {
    echo "Student 1 not found.<br>";
}

if ($retrievedStudent2) {
    echo "Retrieved student 2:<br>";
    echo "ID: " . $retrievedStudent2->getId() . "<br>";
    echo "Name: " . $retrievedStudent2->getName() . "<br>";
    echo "Email: " . $retrievedStudent2->getEmail() . "<br>";
    echo "Courses:<br>";
    foreach ($retrievedStudent2->getCourses() as $course) {
        echo "- " . $course->getName() . "<br>";
    }
    echo "<br>";
} else {
    echo "Student 2 not found.<br>";
}

// Delete a student
$manager->deleteStudent($student2);

// Show log file contents
$logFileContents = file_get_contents('log.txt');
echo "Log file contents:" . PHP_EOL;
echo $logFileContents . PHP_EOL;
?>
