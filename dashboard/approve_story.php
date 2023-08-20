<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'cscassigment';

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die('Connection failed: ' . mysqli_connect_error());
}

if (isset($_POST['approve']) && isset($_POST['story_id'])) {
    $storyId = mysqli_real_escape_string($connection, $_POST['story_id']);

    // Fetch the pending story details
    $pendingQuery = "SELECT * FROM pending_success_stories WHERE id = '$storyId'";
    $pendingResult = mysqli_query($connection, $pendingQuery);

    if (mysqli_num_rows($pendingResult) > 0) {
        $pendingRow = mysqli_fetch_assoc($pendingResult);

        $userName = mysqli_real_escape_string($connection, $pendingRow['user_name']);
        $matricNumber = mysqli_real_escape_string($connection, $pendingRow['matric_number']);
        $story = mysqli_real_escape_string($connection, $pendingRow['story']);
        $imageURL = mysqli_real_escape_string($connection, $pendingRow['image_url']);

        // Insert the pending story into the success_stories table
        $insertQuery = "INSERT INTO success_stories (user_name, matric_number, story, image_url) VALUES ('$userName', '$matricNumber', '$story', '$imageURL')";
        mysqli_query($connection, $insertQuery);

        // Delete the approved story from the pending_success_stories table
        $deleteQuery = "DELETE FROM pending_success_stories WHERE id = '$storyId'";
        mysqli_query($connection, $deleteQuery);

        // Redirect back to the pending success stories page or display a success message
        header('Location: dashboard.php');
    } else {
        echo 'Pending story not found.';
    }
}

mysqli_close($connection);
?>
