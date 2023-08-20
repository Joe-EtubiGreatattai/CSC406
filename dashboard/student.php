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
    <title>Student Page</title>
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
                <li class="mb-4">
                    <a href="staff.php" class="block hover:text-blue-500">Staff</a>
                </li>
                <li class="mb-4 active">
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
    <form method="post" action="send_message.php" class="mb-4">
    <div class="mb-3">
        <label for="recipient" class="form-label">Recipient Type:</label>
        <select name="recipient" id="recipient" class="form-select">
            <option value="individual">Individual Student</option>
            <option value="level">Whole Level</option>
        </select>
    </div>

    <!-- Input for Matriculation Number or Level -->
    <div id="recipientInput" class="mb-3">
        <label for="matriculationNumber" class="form-label">Matriculation Number:</label>
        <input type="text" name="matriculationNumber" id="matriculationNumber"
            placeholder="Enter Matriculation Number" class="p-2 form-control">
    </div>

    <!-- Message Input -->
    <div class="mb-3">
        <label for="message" class="form-label">Message:</label>
        <textarea name="message" rows="4" cols="50" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Send</button>
</form>

    </main>



    <!-- Include Bootstrap and Tailwind CSS scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- JavaScript for Image Preview -->
    <script>
        const recipientSelect = document.getElementById("recipient");
        const recipientInput = document.getElementById("recipientInput");

        recipientSelect.addEventListener("change", function () {
            if (recipientSelect.value === "individual") {
                recipientInput.innerHTML = '<label for="matriculationNumber">Matriculation Number:</label>' +
                    '<input type="text" name="matriculationNumber" class="p-2 form-control" id="matriculationNumber" placeholder="Enter Matriculation Number">';
            } else if (recipientSelect.value === "level") {
                recipientInput.innerHTML = '<label for="level">Level:</label>' +
                    '<select name="level_identifier" class="p-2 form-control" id="level">' +
                    '    <option value="100LEVEL">100 Level</option>' +
                    '    <option value="200LEVEL">200 Level</option>' +
                    '    <option value="300LEVEL">300 Level</option>' +
                    '    <option value="400LEVEL">400 Level</option>' +
                    '    <!-- ... Add other level options ... -->' +
                    '</select>';
            }
        });
    </script>
</body>

</html>