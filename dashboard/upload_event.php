<?php
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

    // Get event details from form
    $eventTitle = $_POST['eventTitle'];
    $eventDate = $_POST['eventDate'];
    $aboutEvent = mysqli_real_escape_string($connection, $_POST['aboutEvent']); // Escape and sanitize the input

    // Image upload handling
    $targetDir = 'event_images/';
    $targetFile = $targetDir . basename($_FILES['eventImage']['name']);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a valid image
    $validExtensions = array('jpg', 'jpeg', 'png', 'gif');
    if (in_array($imageFileType, $validExtensions)) {
        if (move_uploaded_file($_FILES['eventImage']['tmp_name'], $targetFile)) {
            // Insert event data into the database using prepared statement
            $insertQuery = "INSERT INTO events (event_title, event_date, about_event, event_image) VALUES (?, ?, ?, ?)";
            $insertStatement = mysqli_prepare($connection, $insertQuery);

            if ($insertStatement) {
                // Bind parameters and execute the prepared statement
                mysqli_stmt_bind_param($insertStatement, "ssss", $eventTitle, $eventDate, $aboutEvent, $targetFile);

                if (mysqli_stmt_execute($insertStatement)) {
                    mysqli_stmt_close($insertStatement);
                    mysqli_close($connection);
                    header("Location: event.php"); // Redirect to the event page
                    exit(); // Terminate the script
                } else {
                    echo "Error uploading event: " . mysqli_error($connection);
                }
            } else {
                echo "Error preparing statement: " . mysqli_error($connection);
            }
        } else {
            echo "Error uploading event image.";
        }
    } else {
        echo "Invalid image format. Allowed formats: JPG, JPEG, PNG, GIF.";
    }

    // Close the database connection
    mysqli_close($connection);
}
?>
