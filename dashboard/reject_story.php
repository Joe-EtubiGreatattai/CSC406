<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'cscassigment';

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die('Connection failed: ' . mysqli_connect_error());
}

if (isset($_POST['reject']) && isset($_POST['story_id'])) {
    $storyId = $_POST['story_id'];

    // Fetch the pending success story based on story ID
    $fetchQuery = "SELECT * FROM pending_success_stories WHERE id = ?";
    $stmt = mysqli_prepare($connection, $fetchQuery);
    mysqli_stmt_bind_param($stmt, "i", $storyId);
    mysqli_stmt_execute($stmt);
    $pendingRow = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
    mysqli_stmt_close($stmt);

    if ($pendingRow) {
        // Delete the pending story
        $deleteQuery = "DELETE FROM pending_success_stories WHERE id = ?";
        $stmt = mysqli_prepare($connection, $deleteQuery);
        mysqli_stmt_bind_param($stmt, "i", $storyId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        // Redirect back to the pending success stories page or display a success message
        header('Location: pending_success_stories.php');
        exit();
    } else {
        echo 'Story not found.';
    }
} else {
    echo 'Invalid request.';
}

mysqli_close($connection);
?>
