<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'cscassigment';

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die('Connection failed: ' . mysqli_connect_error());
}

$userName = mysqli_real_escape_string($connection, $_POST['user_name']);
$matricNumber = mysqli_real_escape_string($connection, $_POST['matric_number']);
$story = mysqli_real_escape_string($connection, $_POST['story']);

$profilePic = $_FILES['profile_pic']['name'];
$profilePicTmp = $_FILES['profile_pic']['tmp_name'];
$profilePicPath = 'dashboard/event_images/' . $profilePic; // Set the appropriate path

if (move_uploaded_file($profilePicTmp, $profilePicPath)) {
    $insertQuery = "INSERT INTO pending_success_stories (user_name, matric_number, story, image_url) VALUES ('$userName', '$matricNumber', '$story', '$profilePicPath')";
    mysqli_query($connection, $insertQuery);
}

mysqli_close($connection);

// Redirect the user back to the main site or display a success message
header('Location: index.php');
?>
