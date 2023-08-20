<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/images/nacosandful-removebg-preview.png" type="image/x-icon">
    <title>Student Profile</title>
    <!-- Include Bootstrap and Tailwind CSS stylesheets -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <style>
        /* Add your custom CSS styles here */
    </style>
</head>

<body class="bg-gray-100">
    <!-- Navbar -->
    <!-- Include your navigation bar code here -->
    <!-- Welcome Message -->
    <div class="bg-white p-4 shadow-md">
        <div class="container mx-auto">
            <?php
            session_start();
            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
                $matriculationNumber = $_SESSION['matriculationNumber'];
                $level = $_SESSION['level'];
                echo "<div class='mb-4 w-full flex justify-between'>";
                echo "<div>";
                echo "<h2 class='text-2xl font-semibold'>Welcome, $username!</h2>";
                echo "<p class='text-gray-500'>$matriculationNumber</p>";
                echo "<p class='text-gray-500'>Level: $level</p>";
                echo "</div>";
                echo "<button class='bg-red-500 text-white px-4 py-1 rounded-full my-3 hover:bg-red-600' onclick='logout()'>Logout</button>";
                echo "</div>";
            } else {
                echo "<p class='text-red-500'>You are not logged in.</p>";
            }
            ?>
        </div>
    </div>
    <!-- Content Section -->
    <div class="container mx-auto mt-4">
        <?php
        // Include the database connection
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'cscassigment';

        $connection = new mysqli($host, $username, $password, $database);

        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }

        $level = $_SESSION['level'];
        $matriculationNumber = $_SESSION['matriculationNumber'];
        $username = $_SESSION['username'];

        // Retrieve sent messages that match the user's level and matriculation number
        $query = "SELECT * FROM admin_messages WHERE (recipient_type = 'level' AND recipient_identifier = '$level') OR (recipient_type = 'individual' AND recipient_identifier = '$matriculationNumber')";
        $result = $connection->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Display messages
                echo '<div class="bg-white p-4 shadow-md mb-4 rounded-lg">';
                echo '<p>' . $row['message'] . '</p>';
                echo '<p class="text-gray-500 mt-2">' . date('F j, Y g:i A', strtotime($row['timestamp'])) . '</p>';
                echo '<p class="text-gray-500 mt-2">' . ($row['recipient_type'] === 'level' ? 'Sent to Level: ' . $row['recipient_identifier'] : 'Sent to Individual: ' . $row['recipient_identifier']) . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p class="text-gray-500">No messages sent yet.</p>';
        }

        // Retrieve the student's final word from the database
        $finalWordQuery = "SELECT final_word FROM final_words WHERE author = '$username'";
        $finalWordResult = $connection->query($finalWordQuery);

        if ($finalWordResult->num_rows > 0) {
            $finalWordRow = $finalWordResult->fetch_assoc();
            echo '<div class="bg-white p-4 shadow-md mb-4 rounded-lg">';
            echo '<h3 class="text-xl font-semibold mb-2">Your Final Word</h3>';
            echo '<p>' . $finalWordRow['final_word'] . '</p>';
            echo '<form method="post" action="delete_final_word.php">';
            echo '<input type="hidden" name="matriculationNumber" value="' . $matriculationNumber . '">';
            echo '</form>';
            echo '</div>';
        }

        // Check if the user is in 400-level
        if ($level === '400LEVEL' && $finalWordResult->num_rows === 0) {
            echo '<div class="bg-white p-4 shadow-md mb-4 rounded-lg">';
            echo '<h3 class="text-xl font-semibold mb-2">Final Word</h3>';
            echo '<form method="post" action="submit_final_word.php">';
            echo '<textarea name="finalWord" class="w-full rounded-md p-2 mb-2" rows="4" placeholder="Enter your final word"></textarea>';
            echo '<button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Submit</button>';
            echo '</form>';
            echo '</div>';
        }

        // Close the database connection
        $connection->close();
        ?>
    </div>


    <script>
        function logout() {
            // Redirect to logout_process.php or your desired logout logic
            window.location.href = "logout_process.php";
        }
    </script>
    <!-- Include Bootstrap and Tailwind CSS scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>