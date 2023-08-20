<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'cscassigment';

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die('Connection failed: ' . mysqli_connect_error());
}

$query = "SELECT COUNT(*) AS message_count FROM contact_us";
$result = mysqli_query($connection, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $numberOfMessages = $row['message_count'];
} else {
    $numberOfMessages = 0;
}

mysqli_close($connection);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/images/nacosandful-removebg-preview.png" type="image/x-icon">
    <title>Event Page</title>
    <!-- Include Bootstrap and Tailwind CSS stylesheets -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <style>
        /* Add your custom CSS styles here */
    </style>
    <link rel="stylesheet" href="../assets/styles/admin.css">
</head>

<body class="bg-gray-100">
    <!-- Sidebar -->
    <aside class="bg-gray-800 text-white h-screen w-64 fixed top-0 left-0 p-4">
        <!-- Admin Dashboard Logo -->
        <div class="text-center mb-8">
            <img src="../assets/images/nacosandful-removebg-preview.png" alt="Admin Dashboard Logo"
                class="w-16 h-16 mx-auto" />
            <h3 class="text-xl mt-2">Admin Dashboard</h3>
        </div>

        <!-- Sidebar Navigation -->
        <nav class="text-sm">
            <ul>
                <li class="mb-4">
                    <a href="./dashboard.php" class="block hover:text-blue-500">Dashboard</a>
                </li>
                <li class="mb-4">
                    <a href="./event.php" class="block hover:text-blue-500">Events</a>
                </li>
                <li class="mb-4">
                    <a href="coursesadmin.php" class="block hover:text-blue-500">Courses</a>
                </li>
                <li class="mb-4 active">
                    <a href="success_stories.php" class="block hover:text-blue-500">Success Stories</a>
                </li>
                <li class="mb-4">
                    <a href="staff.php" class="block hover:text-blue-500">Staff</a>
                </li>
                <li class="mb-4">
                    <a href="student.php" class="block hover:text-blue-500">Student</a>
                </li>
                <li class="mb-4">
                    <a href="contactus.php" class="block hover:text-blue-500">
                        Messages <span class="number-of-messages">
                            <?php echo $numberOfMessages; ?>
                        </span>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="ml-64 p-8 w-3/5 flex flex-col">
        <section class="flex-1 overflow-y-auto w-full mx-auto">
            <div class="container mx-auto">
                <h2 class="text-3xl font-bold mb-8 text-center">Student Success Stories</h2>
                <div class="flex flex-col">
                    <?php
                    $host = 'localhost';
                    $username = 'root';
                    $password = '';
                    $database = 'cscassigment';

                    $connection = mysqli_connect($host, $username, $password, $database);

                    if (!$connection) {
                        die('Connection failed: ' . mysqli_connect_error());
                    }

                    $query = "SELECT * FROM success_stories";
                    $result = mysqli_query($connection, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="bg-gray-100 rounded-lg p-6 shadow-md mb-4">';
                            // echo '<div class="mb-4">';
                            // $image_url = str_replace('dashboard/', '', $row['image_url']);
                            // echo '<img src="' . $image_url . '" alt="Student" class="w-32 h-32 rounded-full">';
                            // echo '</div>';
                            echo '<h3 class="text-lg font-bold ">' . $row['user_name'] . '</h3>';
                            echo '<p class=" mb-4">' . $row['story'] . '</p>';
                            echo '<div class="flex">';
                            echo '<form action="delete_story.php" method="post">';
                            echo '<input type="hidden" name="story_id" value="' . $row['id'] . '">';
                            echo '<button type="submit" name="delete" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">Delete</button>';
                            echo '</form>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo '<p>No success stories available.</p>';
                    }

                    mysqli_close($connection);
                    ?>
                </div>
            </div>
        </section>



    </main>

    <!-- Include Bootstrap and Tailwind CSS scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- JavaScript for Image Preview -->
    <script>
        function previewImage(event) {
            const imagePreview = document.getElementById("imagePreview");
            const fileInput = event.target;

            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    imagePreview.innerHTML = `<img src="${e.target.result}" alt="Image Preview" class="w-full h-32 object-cover mb-2">`;
                };
                reader.readAsDataURL(fileInput.files[0]);
            } else {
                imagePreview.innerHTML = "";
            }
        }
    </script>
</body>

</html>