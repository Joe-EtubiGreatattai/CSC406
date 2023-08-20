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

// Get the message ID from the URL parameter
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $messageId = $_GET['id'];

    // Delete the message from the database
    $query = "DELETE FROM admin_messages WHERE id = $messageId";

    if ($connection->query($query) === TRUE) {
        // Message deleted successfully
        header("Location: student-profile.php?messageDeleted=true");
    } else {
        // Error deleting message
        header("Location: student-profile.php?messageDeleted=false");
    }
} else {
    // Invalid message ID parameter
    header("Location: student-profile.php?messageDeleted=false");
}

// Close the database connection
$connection->close();
?>
