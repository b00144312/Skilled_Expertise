<?php

class Course {
    private $courseID;
    private $courseTitle;
    private $price;

    public function __construct($courseID, $courseTitle, $price) {
        $this->courseID = $courseID;
        $this->courseTitle = $courseTitle;
        $this->price = $price;
    }

    public function getCourseID() {
        return $this->courseID;
    }

    public function getCourseTitle() {
        return $this->courseTitle;
    }

    public function getPrice() {
        return $this->price;
    }
}

$course1 = new Course("GS586", "Get Slim", 49.99);
$course2 = new Course("GS299", "Get Fit", 59.99);
$course3 = new Course("GS173", "Get Muscles", 69.99);
$course4 = new Course("GS173", "Get Hard", 69.99);

?>