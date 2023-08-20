<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'cscassigment';

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die('Connection failed: ' . mysqli_connect_error());
}

if (isset($_POST['staffName']) && isset($_POST['staffEmail']) && isset($_POST['staffQualifications']) && isset($_POST['staffCategory'])) {
    $staffName = $_POST['staffName'];
    $staffEmail = $_POST['staffEmail'];
    $staffQualifications = $_POST['staffQualifications'];
    $staffCategory = $_POST['staffCategory'];

    // Upload staff image
    $targetDir = 'staff_images/';
    $originalFileName = $_FILES['staffImage']['name'];
    $fileName = preg_replace("/[^a-zA-Z0-9_\-\.]/", "", $originalFileName); // Sanitize file name
    $targetFile = $targetDir . $fileName;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES['staffImage']['tmp_name']);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo 'File is not an image.';
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES['staffImage']['size'] > 500000) {
        echo 'Sorry, your file is too large.';
        $uploadOk = 0;
    }

    // Allow only certain image file formats
    if ($imageFileType !== 'jpg' && $imageFileType !== 'png' && $imageFileType !== 'jpeg' && $imageFileType !== 'gif') {
        echo 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo 'Sorry, your file was not uploaded.';
    } else {
        if (move_uploaded_file($_FILES['staffImage']['tmp_name'], $targetFile)) {
            // Insert staff information into the database
            $insertQuery = "INSERT INTO staff (staff_name, email, qualifications, category, staff_image)
                            VALUES ('$staffName', '$staffEmail', '$staffQualifications', '$staffCategory', '$targetFile')";
            
            if (mysqli_query($connection, $insertQuery)) {
                echo 'Staff information uploaded successfully.';
                header("Location: staff.php");
            } else {
                echo 'Error: ' . mysqli_error($connection);
            }
        } else {
            echo 'Sorry, there was an error uploading your file.';
        }
    }
}

mysqli_close($connection);
?>
