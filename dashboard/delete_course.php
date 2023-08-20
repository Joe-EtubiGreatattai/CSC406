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

    $course_id = $_POST['course_id'];

    // Delete the course from the database
    $query = "DELETE FROM courses WHERE id = '$course_id'";
    
    if (mysqli_query($connection, $query)) {
        header("Location: coursesadmin.php"); // Redirect back to the courses page
    } else {
        echo '<p>Error deleting course: ' . mysqli_error($connection) . '</p>';
    }

    mysqli_close($connection);
}
?>
