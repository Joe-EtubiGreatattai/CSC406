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

$totalStaffQuery = "SELECT COUNT(*) AS total_staff FROM staff";
$totalStaffResult = mysqli_query($connection, $totalStaffQuery);
$totalStaff = 0;

if ($totalStaffResult) {
  $totalStaffRow = mysqli_fetch_assoc($totalStaffResult);
  $totalStaff = $totalStaffRow['total_staff'];
}

mysqli_close($connection);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="../assets/images/nacosandful-removebg-preview.png" type="image/x-icon">
  <title>Admin Dashboard</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <!-- TailwindCSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- Include Font Awesome for the notification icon -->
  <link rel="stylesheet" href="../assets/styles/admin.css">
  <script src="https://kit.fontawesome.com/your-font-awesome-kit-id.js" crossorigin="anonymous"></script>
  <style>

  </style>
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
        <li class="mb-4 active">
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

  <!-- Main Content Area -->
  <main class="ml-64 p-4">
    <section id="topBar" class="bg-blue-600 py-2 px-4 text-white flex justify-between items-center sticky">
      <h2 class="text-2xl font-bold mb-4">Dashboard</h2>
      <div class="flex items-center">
        <a href="#success_stories">
          <i class="fas fa-bell text-2xl mr-2"></i>
        </a>
        <?php
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'cscassigment';

        $connection = mysqli_connect($host, $username, $password, $database);

        if (!$connection) {
          die('Connection failed: ' . mysqli_connect_error());
        }

        // Fetch the number of pending success stories
        $pendingQuery = "SELECT COUNT(*) AS pending_count FROM pending_success_stories";
        $pendingResult = mysqli_query($connection, $pendingQuery);
        $pendingCount = mysqli_fetch_assoc($pendingResult)['pending_count'];



        echo '<span class="bg-red-500 text-white rounded-full px-2 py-1 text-sm">' . $pendingCount . '</span>';
        ?>
        <!-- Number of pending success stories -->
      </div>
    </section>

    <!-- Dashboard Section -->
    <section id="dashboard" class="mb-8">

      <!-- Dashboard Content -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Card - Total Students -->
        <div class="bg-white rounded-lg p-6 shadow-md">
          <div class="flex items-center">
            <div class="bg-blue-500 rounded-full h-12 w-12 flex items-center justify-center mr-4">
              <i class="fas fa-users text-white text-xl"></i>
            </div>
            <div>
              <p class="text-gray-500 text-sm">Total Students</p>
              <h3 class="font-bold text-2xl">
                <?php


                // Query to get the count of students
                $query = "SELECT COUNT(*) AS total_students FROM student_portal";
                $result = mysqli_query($connection, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                  $row = mysqli_fetch_assoc($result);
                  echo $row['total_students']; // Display the total number of students
                } else {
                  echo '0'; // Default value if no students are found
                }

                // Close the database connection
                mysqli_close($connection);
                ?>
              </h3>

            </div>
          </div>
        </div>

        <!-- Card - Total Staff -->
        <div class="bg-white rounded-lg p-6 shadow-md">
          <div class="flex items-center">
            <div class="bg-green-500 rounded-full h-12 w-12 flex items-center justify-center mr-4">
              <i class="fas fa-user-tie text-white text-xl"></i>
            </div>
            <div>
              <p class="text-gray-500 text-sm">Total Staff</p>
              <h3 class="font-bold text-2xl">
                <?php echo $totalStaff; ?>
              </h3>
            </div>
          </div>
        </div>

        <!-- Chart - Students Enrollment
        <div class="bg-white rounded-lg p-6 shadow-md col-span-2">
          <canvas id="studentsEnrollmentChart"></canvas>
        </div> -->

        <div class="bg-white rounded-lg p-6 shadow-md col-span-2">
          <h3 class="font-bold text-xl mb-4">Recent Events</h3>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <?php
            $host = 'localhost';
            $username = 'root';
            $password = '';
            $database = 'cscassigment';

            $connection = mysqli_connect($host, $username, $password, $database);

            if (!$connection) {
              die('Connection failed: ' . mysqli_connect_error());
            }

            $query = "SELECT * FROM events ORDER BY event_date DESC LIMIT 2";
            $result = mysqli_query($connection, $query);

            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="border rounded-lg p-4">';
                echo '<img src="' . $row['event_image'] . '" alt="Event Image" class="w-full h-32 object-cover mb-4 rounded-lg">';
                echo '<h4 class="font-bold text-lg">' . $row['event_title'] . '</h4>';
                echo '<p class="text-gray-500">Date: ' . $row['event_date'] . '</p>';

                // Extracting the first 15 words of the about event text
                $about_event_words = explode(' ', $row['about_event']);
                $about_event_preview = implode(' ', array_slice($about_event_words, 0, 15));

                echo '<p class="text-sm mt-2">' . $about_event_preview . '...</p>'; // Displaying the preview
                echo '</div>';
              }
            } else {
              echo '<p>No events available.</p>';
            }

            mysqli_close($connection);
            ?>
          </div>


          <!-- Call to Action -->
          <div class="mt-4 text-center">
            <a href="./event.php" class="text-blue-500 font-bold hover:underline">Open Events</a>
          </div>
        </div>
    </section>

    <!-- Success Stories Section -->
    <section id="success_stories" class="mb-8">
      <h2 class="text-2xl font-bold mb-4">Pending Success Stories</h2>
      <!-- Fetch and display pending success stories from the database -->

      <?php
      $host = 'localhost';
      $username = 'root';
      $password = '';
      $database = 'cscassigment';

      $connection = mysqli_connect($host, $username, $password, $database);

      if (!$connection) {
        die('Connection failed: ' . mysqli_connect_error());
      }

      // Fetch pending success stories from the database
      $pendingQuery = "SELECT * FROM pending_success_stories";
      $pendingResult = mysqli_query($connection, $pendingQuery);

      if (mysqli_num_rows($pendingResult) > 0) {
        while ($row = mysqli_fetch_assoc($pendingResult)) {
          $imageURL = str_replace('dashboard/', '', $row['image_url']); // Remove 'dashboard/' from image URL
          echo '<div class="bg-white rounded-lg p-6 shadow-md mb-4">';
          echo '<img src="' . $imageURL . '" alt="Profile Picture" class="w-16 h-16 rounded-full object-cover">';
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

      mysqli_close($connection);
      ?>
    </section>

    <!-- Messages Messages Section -->
    <section id="contact_messages" class="mb-8">
      <h2 class="text-2xl font-bold mb-4">Messages Messages</h2>

      <?php
      $host = 'localhost';
      $username = 'root';
      $password = '';
      $database = 'cscassigment';

      $connection = mysqli_connect($host, $username, $password, $database);

      if (!$connection) {
        die('Connection failed: ' . mysqli_connect_error());
      }

      $query = "SELECT * FROM contact_us LIMIT 3";
      $result = mysqli_query($connection, $query);

      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<div class="bg-white rounded-lg p-6 shadow-md mb-4">';
          echo '<p class="text-gray-500">Name: ' . $row['name'] . '</p>';
          echo '<p class="text-gray-500">Email: ' . $row['email'] . '</p>';
          echo '<p class="text-sm mt-2">' . $row['message'] . '</p>';
          echo '<button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 mt-4" onclick="deleteAndReload(' . $row['id'] . ')">Delete</button>';
          echo '</div>';
        }
      } else {
        echo '<p class="my-4">No messages available.</p>';
      }

      mysqli_close($connection);
      ?>

      <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600"
        onclick="window.open('./contactus.php')">Open All
        Messages</button>
    </section>


  </main>

  <!-- Add JavaScript for interactivity here -->
  <!-- Bootstrap and jQuery JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    // Sample data for student enrollment over months
    const enrollmentData = {
      labels: [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Dec",
      ],
      datasets: [
        {
          label: "Enrollment",
          data: [50, 70, 100, 120, 90, 80, 110, 130, 150, 140, 120, 160],
          backgroundColor: "rgba(54, 162, 235, 0.5)",
          borderColor: "rgba(54, 162, 235, 1)",
          borderWidth: 1,
          fill: true,
        },
      ],
    };

    // Chart configuration options
    const chartOptions = {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    };

    // Get the canvas element and initialize the chart
    const studentsEnrollmentChart = document
      .getElementById("studentsEnrollmentChart")
      .getContext("2d");
    new Chart(studentsEnrollmentChart, {
      type: "bar", // You can change the chart type here (e.g., 'line', 'bar', 'pie', etc.)
      data: enrollmentData,
      options: chartOptions,
    });

  </script>
  <script>
    function deleteAndReload(messageId) {
      if (confirm("Are you sure you want to delete this message?")) {
        fetch('delete_message.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
          },
          body: 'message_id=' + messageId
        })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              location.reload();
            } else {
              location.reload();
            }
          })
          .catch(error => {
            console.error('Error:', error);
            location.reload();
          });
      }
    }
  </script>

</body>

</html>