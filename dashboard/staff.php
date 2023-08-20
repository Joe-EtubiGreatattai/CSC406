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
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/images/nacosandful-removebg-preview.png" type="image/x-icon">
    <title>Staff Page</title>
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
                <li class="mb-4">
                    <a href="success_stories.php" class="block hover:text-blue-500">Success Stories</a>
                </li>
                <li class="mb-4 active">
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
            <div class="w-full">
                <h2 class="text-2xl font-semibold mb-4">Academic Staff</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <?php
                    $academicQuery = "SELECT * FROM staff WHERE category = 'academic'";
                    $academicResult = mysqli_query($connection, $academicQuery);

                    while ($academicRow = mysqli_fetch_assoc($academicResult)) {
                        echo '<div class="card">';
                        echo '<img src="' . $academicRow['staff_image'] . '" alt="Staff" class="staff-image">';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title">' . $academicRow['staff_name'] . '</h5>';
                        echo '<p class="card-text">' . $academicRow['qualifications'] . '</p>';
                        echo '<p class="card-text">' . $academicRow['email'] . '</p>';
                        echo '<button class="btn btn-danger btn-sm" onclick="deleteStaff(' . $academicRow['id'] . ')">Delete</button>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
            <div class="w-full mt-8">
                <h2 class="text-2xl font-semibold mb-4">Non-Academic Staff</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <?php
                    $nonAcademicQuery = "SELECT * FROM staff WHERE category = 'non-academic'";
                    $nonAcademicResult = mysqli_query($connection, $nonAcademicQuery);

                    while ($nonAcademicRow = mysqli_fetch_assoc($nonAcademicResult)) {
                        echo '<div class="card">';
                        echo '<img src="' . $nonAcademicRow['staff_image'] . '" alt="Staff" class="staff-image">';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title">' . $nonAcademicRow['staff_name'] . '</h5>';
                        echo '<p class="card-text">' . $nonAcademicRow['qualifications'] . '</p>';
                        echo '<p class="card-text">' . $nonAcademicRow['email'] . '</p>';
                        echo '<button class="btn btn-danger btn-sm" onclick="deleteStaff(' . $nonAcademicRow['id'] . ')">Delete</button>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </section>



        <section class="w-80 bg-white rounded-lg p-4 shadow-md fixed top-0 right-8">
            <h2 class="text-2xl font-semibold mb-4">Staff Uploader</h2>

            <form action="upload_staff.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <input type="file" name="staffImage" class="form-control" id="staffImage" accept="image/*"
                        onchange="previewImage(event)">
                    <img id="imagePreview" src="#" alt="Image Preview"
                        style="max-width: 100%; max-height: 100px; display: none;">
                </div>
                <div class="mb-3">
                    <label for="staffName" class="form-label">Staff Name</label>
                    <input type="text" class="form-control" id="staffName" name="staffName" required>
                </div>
                <div class="mb-3">
                    <label for="staffEmail" class="form-label">Staff Email</label>
                    <input type="email" class="form-control" id="staffEmail" name="staffEmail" required>
                </div>
                <div class="mb-3">
                    <label for="staffQualifications" class="form-label">Staff Qualifications</label>
                    <textarea class="form-control" id="staffQualifications" name="staffQualifications" rows="3"
                        required></textarea>
                </div>
                <div class="mb-3">
                    <label for="staffCategory" class="form-label">Staff Category</label>
                    <select class="form-control" id="staffCategory" name="staffCategory" required>
                        <option value="academic">Academic</option>
                        <option value="non-academic">Non-Academic</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Upload Staff</button>
            </form>
        </section>

    </main>


    <!-- Include Bootstrap and Tailwind CSS scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- JavaScript for Image Preview -->
    <script>
        function previewImage(event) {
            const imagePreview = document.getElementById('imagePreview');
            const fileInput = event.target;

            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                }

                reader.readAsDataURL(fileInput.files[0]);
            }
        }

        function deleteStaff(id) {
            if (confirm("Are you sure you want to delete this staff record?")) {
                fetch('delete_staff.php', {
                    method: 'POST',
                    body: new URLSearchParams({ id: id }),
                })
                    .then(response => response.text())
                    .then(message => {
                        // alert(message);
                        // Refresh the page or update the staff list
                        location.reload();
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        }

    </script>
</body>

</html>