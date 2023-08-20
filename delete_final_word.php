<?php
// Include the database connection
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'cscassigment';

$connection = new mysqli($host, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the matriculation number from the form
    $matriculationNumber = $_POST['matriculationNumber'];
    $username = $_SESSION['username'];

    // Delete the final word record from the database
    $deleteQuery = "DELETE FROM final_words WHERE author = '$username'";
    
    if ($connection->query($deleteQuery) === TRUE) {
        // Final word deleted successfully, redirect back to the student profile page
        header("Location: student-profile.php");
        exit();
    } else {
        // If there's an error in deleting the final word, display an error message
        echo "Error deleting final word: " . $connection->error;
    }
}

// Close the database connection
$connection->close();
?>
