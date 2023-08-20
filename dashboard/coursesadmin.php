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
    <title>Course Page</title>
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
                <li class="mb-4 active">
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
    <h2 class="text-2xl font-semibold mb-4">Courses</h2>

    <?php
    $connection = mysqli_connect($host, $username, $password, $database);

    if (!$connection) {
        die('Connection failed: ' . mysqli_connect_error());
    }

    // Fetch courses from the database ordered by course_level_value
    $query = "SELECT * FROM courses ORDER BY course_level_value";
    $result = mysqli_query($connection, $query);

    $currentLevel = '';

    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['course_level'] !== $currentLevel) {
            // Display section header for each course level
            echo '<h3 class="text-xl font-semibold mt-6">' . $row['course_level'] . '</h3>';
            $currentLevel = $row['course_level'];
        }
        // Display course details and delete button
        echo '<div class="mb-4 border p-4 rounded shadow-md">';
        echo '<p><strong>Course Code:</strong> ' . $row['course_code'] . '</p>';
        echo '<p><strong>Course Title:</strong> ' . $row['course_title'] . '</p>';
        echo '<p><strong>About Course:</strong> ' . $row['about_course'] . '</p>';
        echo '<form action="delete_course.php" method="POST">';
        echo '<input type="hidden" name="course_id" value="' . $row['id'] . '">';
        echo '<button type="submit" class="mt-2 bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Delete</button>';
        echo '</form>';
        echo '</div>';
    }

    mysqli_close($connection);
    ?>

</section>


        <!-- Event Uploader Form -->
        <section class="w-80 bg-white rounded-lg p-4 shadow-md fixed top-20 right-8">
            <h2 class="text-2xl font-semibold mb-4">Course Uploader</h2>
            <!-- Course Uploader Form -->
            <!-- Course Uploader Form -->
            <form action="upload_course.php" method="POST" enctype="multipart/form-data" class="mb-4">
                <label for="course_code" class="block mb-2 font-medium">Course Code</label>
                <input type="text" id="course_code" name="coursecode" class="w-full px-4 py-2 border rounded">

                <label for="course_title" class="block mb-2 mt-4 font-medium">Course Title</label>
                <input type="text" id="course_title" name="coursetitle" class="w-full px-4 py-2 border rounded">

                <label for="about_course" class="block mb-2 mt-4 font-medium">About the Course</label>
                <textarea id="about_course" name="aboutcourse" class="w-full px-4 py-2 border rounded"
                    rows="4"></textarea>

                <!-- Dropdown for selecting course level -->
                <label for="course_level" class="block mb-2 mt-4 font-medium">Course Level</label>
                <select id="course_level" name="courselevel" class="w-full px-4 py-2 border rounded">
                    <option value="100LEVEL">100 LEVEL</option>
                    <option value="200LEVEL">200 LEVEL</option>
                    <option value="300LEVEL">300 LEVEL</option>
                    <option value="400LEVEL">400 LEVEL</option>
                    <option value="PGD">PGD</option>
                    <option value="MSc">MSc</option>
                    <option value="Phd">PhD</option>
                </select>

                <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Upload Course
                </button>
            </form>

        </section>
    </main>


    <!-- Include Bootstrap and Tailwind CSS scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- JavaScript for Image Preview -->
</body>

</html>