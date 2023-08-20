<?php
$host = 'localhost'; // Your database host
$username = 'root'; // Your database username
$password = ''; // Your database password
$database = 'cscassigment'; // Your database name
$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die('Connection failed: ' . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event_id = $_POST['event_id'];
    $name = $_POST['name'];
    $comment_text = $_POST['comment'];

    $insert_query = "INSERT INTO comments (event_id, name, comment_text) VALUES ('$event_id', '$name', '$comment_text')";

    if (mysqli_query($connection, $insert_query)) {
        // Redirect back to the event details page with the submitted event ID
        header("Location: event_details.php?id=$event_id");
        exit(); // Make sure to exit after sending the redirect header
    } else {
        echo "Error: " . $insert_query . "<br>" . mysqli_error($connection);
    }
}

mysqli_close($connection);
?>
