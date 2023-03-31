<?php require_once 'Course.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Online Courses</title>
</head>
<body>
<h1>Online Courses</h1>
<h2><?php echo $course1->getCourseTitle(); ?></h2>
<p>Course ID: <?php echo $course1->getCourseID(); ?></p>
<p>Price: $<?php echo $course1->getPrice(); ?></p>
<h2><?php echo $course2->getCourseTitle(); ?></h2>
<p>Course ID: <?php echo $course1->getCourseID(); ?></p>
<p>Price: $<?php echo $course1->getPrice(); ?></p>
<h2><?php echo $course3->getCourseTitle(); ?></h2>
<p>Course ID: <?php echo $course1->getCourseID(); ?></p>
<p>Price: $<?php echo $course1->getPrice(); ?></p>
</body>
</html>