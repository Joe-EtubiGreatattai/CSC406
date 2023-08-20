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
    <title>Messages Page</title>
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
                <li class="mb-4">
                    <a href="student.php" class="block hover:text-blue-500">Student</a>
                </li>
                <li class="mb-4 active">
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
        <section id="contact_messages" class="mb-8">
            <h2 class="text-2xl font-bold mb-4">Messages</h2>

            <?php
            $host = 'localhost';
            $username = 'root';
            $password = '';
            $database = 'cscassigment';

            $connection = mysqli_connect($host, $username, $password, $database);

            if (!$connection) {
                die('Connection failed: ' . mysqli_connect_error());
            }

            if (isset($_POST['delete'])) {
                $messageId = mysqli_real_escape_string($connection, $_POST['message_id']);
                $deleteQuery = "DELETE FROM contact_us WHERE id = '$messageId'";
                mysqli_query($connection, $deleteQuery);
            }

            if (isset($_POST['send_reply'])) {
                $messageId = mysqli_real_escape_string($connection, $_POST['message_id']);
                $replyText = mysqli_real_escape_string($connection, $_POST['reply_text']);

                // Set SMTP and smtp_port settings
                ini_set('SMTP', 'smtp.gmail.com');
                ini_set('smtp_port', '587');

                // Fetch user's email from the database
                $getEmailQuery = "SELECT email FROM contact_us WHERE id = '$messageId'";
                $getEmailResult = mysqli_query($connection, $getEmailQuery);
                $row = mysqli_fetch_assoc($getEmailResult);
                $userEmail = $row['email'];

                // Send the reply email using the mail() function
                $subject = "Reply to your message";
                $body = "Thank you for contacting us. Here's our reply:\n\n" . $replyText;
                $headers = "From: greatattai442442@gmail.com";


                if (mail($userEmail, $subject, $body, $headers)) {
                    echo '<script>alert("Reply sent successfully.");</script>';
                } else {
                    echo '<script>alert("Failed to send the reply.");</script>';
                }
            }

            $query = "SELECT * FROM contact_us";
            $result = mysqli_query($connection, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="bg-white rounded-lg p-6 shadow-md mb-4">';
                    echo '<p class="text-gray-500">Name: ' . $row['name'] . '</p>';
                    echo '<p class="text-gray-500">Email: ' . $row['email'] . '</p>';
                    echo '<p class="text-sm mt-2">' . $row['message'] . '</p>';
                    echo '<button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 mt-4" onclick="toggleReplyInput(' . $row['id'] . ')">Reply</button>';
                    echo '<div class="mt-4" id="replyInput' . $row['id'] . '" style="display: none;">';
                    echo '<textarea placeholder="Type your reply here" class="form-textarea w-full px-4 py-2 rounded-lg" id="replyText' . $row['id'] . '"></textarea>';
                    echo '<form action="" method="post">';
                    echo '<input type="hidden" name="message_id" value="' . $row['id'] . '">';
                    echo '<input type="hidden" name="reply_text" id="replyTextHidden' . $row['id'] . '">';
                    echo '<button type="submit" name="send_reply" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 mt-4" onclick="setReplyText(' . $row['id'] . ')">Send</button>';
                    echo '</form>';
                    echo '</div>';
                    echo '<form action="" method="post">';
                    echo '<input type="hidden" name="message_id" value="' . $row['id'] . '">';
                    echo '<button type="submit" name="delete" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 mt-4">Delete</button>';
                    echo '</form>';
                    echo '</div>';
                }
            } else {
                echo '<p class="my-4">No messages available.</p>';
            }

            mysqli_close($connection);
            ?>
    </main>
    <script>
        function toggleReplyInput(messageId) {
            var replyInput = document.getElementById('replyInput' + messageId);
            replyInput.style.display = replyInput.style.display === 'none' ? 'block' : 'none';
        }

        function setReplyText(messageId) {
            var replyTextHidden = document.getElementById('replyTextHidden' + messageId);
            var replyText = document.getElementById('replyText' + messageId).value;
            replyTextHidden.value = replyText;
        }

        function openAllMessages() {
            // Implement code here to show all messages or navigate to a separate page
            alert('Open all messages');
        }
    </script>
    <!-- Include Bootstrap and Tailwind CSS scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>