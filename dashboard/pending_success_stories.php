<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'cscassigment';

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die('Connection failed: ' . mysqli_connect_error());
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending Success Stories</title>
    <!-- Include your CSS and other head elements here -->
</head>
<body>
    <!-- Display header and navigation if needed -->

    <section id="pending_success_stories" class="mb-8">
        <h2 class="text-2xl font-bold mb-4">Pending Success Stories</h2>
        <!-- Fetch and display pending success stories from the database -->

        <?php
        $pendingQuery = "SELECT * FROM pending_success_stories";
        $pendingResult = mysqli_query($connection, $pendingQuery);

        if (mysqli_num_rows($pendingResult) > 0) {
            while ($row = mysqli_fetch_assoc($pendingResult)) {
                echo '<div class="bg-white rounded-lg p-6 shadow-md mb-4">';
                echo '<img src="' . $row['image_url'] . '" alt="Profile Picture" class="w-16 h-16 rounded-full object-cover">';
                echo '<p class="text-gray-500">Name: ' . $row['user_name'] . '</p>';
                echo '<p class="text-gray-500">Matric Number: ' . $row['matric_number'] . '</p>';
                echo '<p class="text-sm mt-2">' . substr($row['story'], 0, 15) . '...</p>'; // Display only the first 15 words
                echo '<div class="mt-4 flex justify-between">';
                echo '<form action="approve_story.php" method="post">';
                echo '<input type="hidden" name="story_id" value="' . $row['id'] . '">';
                echo '<button type="submit" name="approve" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">Approve</button>';
                echo '</form>';
                echo '<form action="reject_story.php" method="post">';
                echo '<input type="hidden" name="story_id" value="' . $row['id'] . '">';
                echo '<button type="submit" name="reject" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">Reject</button>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>No pending success stories available.</p>';
        }

        header('Location: dashboard.php');
        ?>
    </section>

    <!-- Display footer if needed -->
</body>
</html>
<?php
mysqli_close($connection);
?>
