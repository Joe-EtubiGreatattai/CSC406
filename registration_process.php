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
$username = $_POST['username'];
$matriculationNumber = strtoupper($_POST['matriculationNumber']);
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];
$level = $_POST['userLevel'];  // Get the selected level from the form

// Check if username or matriculation number is already in use
$query = "SELECT * FROM student_portal WHERE username = '$username' OR matriculation_number = '$matriculationNumber'";
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) > 0) {
    // Username or matriculation number is already in use
    header("Location: studentregisteration.php?usernameError=true");
    exit();
} elseif ($password !== $confirmPassword) {
    // Passwords do not match
    header("Location: studentregisteration.php?passwordError=true");
    exit();
} else {
    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert new user into the database
    $insert_query = "INSERT INTO student_portal (username, matriculation_number, password, level) VALUES ('$username', '$matriculationNumber', '$hashedPassword', '$level')";
    if (mysqli_query($connection, $insert_query)) {
        // Registration successful
        header("Location: studentlogin.php");
        exit();
    } else {
        // Registration failed
        header("Location: studentregisteration.php?error=true");
        exit();
    }
}
// Close the database connection
mysqli_close($connection);
?>