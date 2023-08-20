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

// Retrieve form data
$senderUsername = "admin"; // Assuming the admin's username
$recipientType = $_POST['recipient'];
$recipientIdentifier = $_POST['matriculationNumber']; // For individual, or level name/code for whole level
$message = $_POST['message'];

// If sending to a whole level, update recipient identifier with chosen level
if ($recipientType === 'level') {
    $level = $_POST['level_identifier']; // Assuming you have a level_identifier in your form
    $recipientIdentifier = $level;
}

// Insert message into the database
$query = "INSERT INTO admin_messages (sender_username, recipient_type, recipient_identifier, message)
          VALUES ('$senderUsername', '$recipientType', '$recipientIdentifier', '$message')";

if ($connection->query($query) === TRUE) {
    // Message sent successfully
    header("Location: student.php?messageSent=true");
} else {
    // Error sending message
    header("Location: student.php?messageSent=false");
}

// Close the database connection
$connection->close();
?>
