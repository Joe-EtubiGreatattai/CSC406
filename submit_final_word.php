<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $host = 'localhost'; // Your database host
    $username = 'root'; // Your database username
    $password = ''; // Your database password
    $database = 'cscassigment'; // Your database name

    // Create a connection
    $connection = mysqli_connect($host, $username, $password, $database);

    // Check if the connection was successful
    if (!$connection) {
        die('Connection failed: ' . mysqli_connect_error());
    }

    // Get final word details from form
    $finalWord = mysqli_real_escape_string($connection, $_POST['finalWord']);
    $author = $_SESSION['username'];

    // Insert final word data into the database
    $insertQuery = "INSERT INTO final_words (final_word, author) VALUES ('$finalWord', '$author')";
    
    if (mysqli_query($connection, $insertQuery)) {
        mysqli_close($connection);
        header("Location: student-profile.php"); // Redirect back to the student profile page
        exit(); // Terminate the script
    } else {
        echo "Error submitting final word: " . mysqli_error($connection);
    }

    // Close the database connection
    mysqli_close($connection);
}
?>