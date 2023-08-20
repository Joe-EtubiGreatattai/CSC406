<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'cscassigment';

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die('Connection failed: ' . mysqli_connect_error());
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Get the staff image file path to delete it from the server
    $getImageQuery = "SELECT staff_image FROM staff WHERE id = '$id'";
    $getImageResult = mysqli_query($connection, $getImageQuery);
    $imageRow = mysqli_fetch_assoc($getImageResult);
    $imageFilePath = $imageRow['staff_image'];

    // Delete staff record from the database
    $deleteQuery = "DELETE FROM staff WHERE id = '$id'";

    if (mysqli_query($connection, $deleteQuery)) {
        // Delete the staff image file from the server
        unlink($imageFilePath);
        echo 'Staff record deleted successfully.';
        header("Location: staff.php");
    } else {
        echo 'Error: ' . mysqli_error($connection);
    }
}

mysqli_close($connection);
?>
