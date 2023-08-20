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
                <li class="mb-4 active">
                    <a href="./event.php" class="block hover:text-blue-500">Events</a>
                </li>
                <li class="mb-4">
                    <a href="coursesadmin.php" class="block hover:text-blue-500">Courses</a>
                </li>
                <li class="mb-4">
                    <a href="success_stories.php" class="block hover:text-blue-500">Success Stories</a>
                </li>
                <li class="mb-4">
                    <a href="staff.php" class="block hover:text-blue-500">Staff</a>
                </li>
                <li class="mb-4">
                    <a href="student.php" class="block hover:text-blue-500">Student</a>
                </li>
                <li class="mb-4 ">
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
            <h2 class="text-2xl font-semibold mb-4">All Events</h2>
            <!-- PHP code to fetch and display events -->
            <?php
            $host = 'localhost';
            $username = 'root';
            $password = '';
            $database = 'cscassigment';

            $connection = mysqli_connect($host, $username, $password, $database);

            if (!$connection) {
                die('Connection failed: ' . mysqli_connect_error());
            }

            if (isset($_GET['delete_event'])) {
                $eventId = $_GET['delete_event'];
                $deleteQuery = "DELETE FROM events WHERE event_id = $eventId"; // Corrected query
                if (mysqli_query($connection, $deleteQuery)) {
                    echo '<p class="text-green-500">Event deleted successfully.</p>';
                } else {
                    echo '<p class="text-red-500">Error deleting event: ' . mysqli_error($connection) . '</p>';
                }
            }

            $query = "SELECT * FROM events";
            $result = mysqli_query($connection, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="border p-4 mb-4 rounded-lg bg-white">';
                    echo '<img src="' . $row['event_image'] . '" alt="Event Image" class="w-full h-32 object-cover mb-2">';
                    echo '<h4 class="text-xl font-semibold">' . $row['event_title'] . '</h4>';
                    echo '<p class="text-gray-500">Date: ' . $row['event_date'] . '</p>';
                    echo '<p>' . $row['about_event'] . '</p>';
                    if (isset($row['event_id'])) {
                        echo '<a href="?delete_event=' . $row['event_id'] . '" class="text-red-500 font-semibold hover:underline mt-2">Delete Event</a>';
                    }
                    echo '</div>';
                }
            } else {
                echo '<p>No events available.</p>';
            }

            mysqli_close($connection);
            ?>
        </section>



        <!-- Event Uploader Form -->
        <section class="w-80 bg-white rounded-lg p-4 shadow-md fixed top-20 right-8">
            <h2 class="text-2xl font-semibold mb-4">Event Uploader</h2>
            <form action="upload_event.php" method="post" enctype="multipart/form-data">
                <label for="eventImage">Event Image:</label>
                <input type="file" name="eventImage" id="eventImage" required class="form-control mb-2"
                    onchange="previewImage(event)">
                <!-- Image Preview -->
                <div id="imagePreview" class="mb-2"></div>
                <label for="eventTitle">Event Title:</label>
                <input type="text" name="eventTitle" id="eventTitle" required class="form-control mb-2">
                <label for="eventDate">Event Date:</label>
                <input type="date" name="eventDate" id="eventDate" required class="form-control mb-2">
                <label for="aboutEvent">About Event:</label>
                <textarea name="aboutEvent" id="aboutEvent" rows="4" required class="form-control"></textarea>
                <input type="submit" value="Upload Event" class="btn btn-primary mt-2 w-full">
            </form>
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