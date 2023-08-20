<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'cscassigment';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $connection = mysqli_connect($host, $username, $password, $database);

    if (!$connection) {
        die('Connection failed: ' . mysqli_connect_error());
    }

    $course_code = strtoupper($_POST['coursecode']);
    $course_title = $_POST['coursetitle'];
    $about_course = $_POST['aboutcourse'];
    $course_level = $_POST['courselevel'];

    // Map the course levels to their corresponding values
    $course_level_values = [
        '100LEVEL' => 1,
        '200LEVEL' => 2,
        '300LEVEL' => 3,
        '400LEVEL' => 4,
        'PGD' => 5,
        'MSc' => 6,
        'Phd' => 7
    ];

    // Get the corresponding course level value
    $course_level_value = $course_level_values[$course_level];

    $query = "INSERT INTO courses (course_code, course_title, about_course, course_level, course_level_value) 
              VALUES ('$course_code', '$course_title', '$about_course', '$course_level', '$course_level_value')";

    if (mysqli_query($connection, $query)) {
        echo '<p>Course uploaded successfully!</p>';
        header("Location: coursesadmin.php");
    } else {
        echo '<p>Error uploading course: ' . mysqli_error($connection) . '</p>';
    }

    mysqli_close($connection);
}
?>
