<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'cscassigment';

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die('Connection failed: ' . mysqli_connect_error());
}

if (isset($_POST['message_id'])) {
    $messageId = $_POST['message_id'];
    
    // Delete the message from the database
    $deleteQuery = "DELETE FROM contact_us WHERE id = '$messageId'";
    mysqli_query($connection, $deleteQuery);
}

mysqli_close($connection);
header('Location: index.php');
?>
