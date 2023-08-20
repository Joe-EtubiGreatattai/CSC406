<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'cscassigment';

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die('Connection failed: ' . mysqli_connect_error());
}

if (isset($_POST['story_id'])) {
    $storyId = mysqli_real_escape_string($connection, $_POST['story_id']);

    // Delete the story from the success_stories table
    $deleteQuery = "DELETE FROM success_stories WHERE id = '$storyId'";
    $result = mysqli_query($connection, $deleteQuery);

    if ($result) {
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('success' => false));
    }
} else {
    echo json_encode(array('success' => false));
}

mysqli_close($connection);

header('Location: success_stories.php');
?>
