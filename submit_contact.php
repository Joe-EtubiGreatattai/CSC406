<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'cscassigment';

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die('Connection failed: ' . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $message = mysqli_real_escape_string($connection, $_POST['message']);

    $query = "INSERT INTO contact_us (name, email, message) VALUES ('$name', '$email', '$message')";

    if (mysqli_query($connection, $query)) {
        echo 'Message submitted successfully!';
    } else {
        echo 'Error submitting message: ' . mysqli_error($connection);
    }
}

mysqli_close($connection);
header('Location: contactus.html');
?>
