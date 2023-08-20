<?php
// Include the database connection
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'cscassigment';

// Create a database connection
$connection = new mysqli($host, $username, $password, $database);

// Check the connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Initialize variables
$matriculationNumber = strtoupper($_POST['matriculationNumber']);
$password = $_POST['password'];

// Fetch user details from the database
$query = "SELECT * FROM student_portal WHERE matriculation_number = '$matriculationNumber'";
$result = mysqli_query($connection, $query);

if ($row = mysqli_fetch_assoc($result)) {
    // Verify password
    if (password_verify($password, $row['password'])) {
        // Start session and set user information
        session_start();

        $username = $row['username'];
        $level = $row['level']; // Assuming you fetch the level from the database

        $_SESSION['username'] = $username;
        $_SESSION['matriculationNumber'] = $matriculationNumber;
        $_SESSION['level'] = $level; // Set the user's level

        // Redirect to profile page
        header("Location: student-profile.php");
        exit();
    } else {
        // Invalid password
        header("Location: studentlogin.php?error=password");
        exit();
    }
} else {
    header("Location: studentlogin.php?error=userNotFound");
    exit();
}

// Close the database connection
mysqli_close($connection);
?>