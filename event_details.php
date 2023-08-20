<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="shortcut icon" href="assets/images/nacosandful-removebg-preview.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Federal University Lokoja - Event Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" />
    <link rel="stylesheet" href="assets/styles/style.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Add the following links for Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <!-- Splide.js CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<link rel="stylesheet" href="https://unpkg.com/@splidejs/splide@3.0.6/dist/css/splide.min.css">

<body class="bg-gray-100">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="#">
                <div class="flex items-center">
                    <div class="mr-2">
                        <img src="assets/images/nacosandful-removebg-preview.png" alt="Logo 1" class="w-12 h-12" />
                    </div>
                    <div>
                        <img src="assets/images/nacoslogo-removebg-preview.png" alt="Logo 2" class="w-12 h-12" />
                    </div>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto flex items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aboutus.html">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#giftcards" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            Academics
                        </a>
                        <!-- Submenu -->
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="couses.php">Courses</a></li>
                            <li><a class="dropdown-item" href="academicstaff.php">Academic Staff</a></li>
                            <li><a class="dropdown-item" href="nonacademicstaff.php">Non-Academic Staff</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="event.php">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contactus.html">Contact us</a>
                    </li>
                    <li>
            <a href="studentlogin.php"
              class="bg-blue-500 text-decoration-none hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
              Login <i class="bi bi-arrow-right-short"></i>
            </a>
          </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="bg-gray-100 py-8">
        <div class="container mx-auto">
            <div class="flex flex-wrap -mx-4">
                <div class="w-full lg:w-2/3 px-4">
                    <!-- Event Image Slider -->
                    <div class="swiper-container event-slider mb-6">
                        <div class="swiper-wrapper">
                            <?php
                            $host = 'localhost'; // Your database host
                            $username = 'root'; // Your database username
                            $password = ''; // Your database password
                            $database = 'cscassigment'; // Your database name
                            $connection = mysqli_connect($host, $username, $password, $database);

                            if (!$connection) {
                                die('Connection failed: ' . mysqli_connect_error());
                            }

                            if (isset($_GET['id'])) {
                                $event_id = $_GET['id'];
                                $query = "SELECT * FROM events WHERE event_id = $event_id";
                                $result = mysqli_query($connection, $query);

                                if (isset($_GET['id'])) {
                                    $event_id = $_GET['id'];
                                    $query = "SELECT * FROM events WHERE event_id = $event_id";
                                    $result = mysqli_query($connection, $query);

                                    if (mysqli_num_rows($result) > 0) {
                                        $row = mysqli_fetch_assoc($result);
                                        $eventImage = $row['event_image']; // Change 'event_images' to 'event_image'
                                        echo '<div class="swiper-slide">';
                                        echo '<img src="dashboard/' . $eventImage . '" alt="Event Image" class="w-full h-64 object-cover" />';
                                        echo '</div>';
                                    }
                                }
                            }

                            mysqli_close($connection);
                            ?>
                            <!-- Add more images for the slider as needed -->
                        </div>
                        <!-- Add pagination -->
                        <div class="swiper-pagination"></div>
                    </div>

                    <!-- Event Details -->
                    <?php
                    $host = 'localhost'; // Your database host
                    $username = 'root'; // Your database username
                    $password = ''; // Your database password
                    $database = 'cscassigment'; // Your database name
                    $connection = mysqli_connect($host, $username, $password, $database);

                    if (!$connection) {
                        die('Connection failed: ' . mysqli_connect_error());
                    }

                    if (isset($_GET['id'])) {
                        $event_id = $_GET['id'];
                        $query = "SELECT * FROM events WHERE event_id = $event_id";
                        $result = mysqli_query($connection, $query);

                        if (mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);
                            echo '<div class="bg-white p-4 shadow-md">';
                            echo '<h2 class="text-3xl font-bold mb-4">' . $row['event_title'] . '</h2>';
                            echo '<p class="text-gray-500 mb-2">Event Date: ' . $row['event_date'] . '</p>';
                            echo '<p class="text-sm mb-4">' . $row['about_event'] . '</p>';
                            echo '</div>';
                        } else {
                            echo '<p>No event found.</p>';
                        }
                    } else {
                        echo '<p>Invalid event ID.</p>';
                    }

                    ?>

                    <!-- Comment Section -->
                    <!-- Comment Section -->
                    <div class="bg-white p-4 mt-4 shadow-md">
                        <h2 class="text-2xl font-bold mb-4">Comments</h2>
                        <?php
                        // Assuming $event_id is already defined from your previous code
                        $comment_query = "SELECT * FROM comments WHERE event_id = $event_id";
                        $comment_result = mysqli_query($connection, $comment_query);

                        if ($comment_result && mysqli_num_rows($comment_result) > 0) {
                            while ($comment_row = mysqli_fetch_assoc($comment_result)) {
                                $comment_author = $comment_row['name']; // Replace 'author' with your actual column name
                                $comment_content = $comment_row['comment_text']; // Replace 'content' with your actual column name
                                $comment_time = $comment_row['created_at']; // Replace 'content' with your actual column name
                                $formatted_time = date('F j, Y \a\t g:i A', strtotime($comment_time));
                                echo '<div class="border-t border-gray-300 pt-4 mt-4">';
                                echo '<p class="text-gray-500 mb-2">' . $comment_author . '</p>';
                                echo '<p class="text-gray-500 mb-2">' . $formatted_time . '</p>';
                                echo '<p class="text-sm mb-4">';
                                echo '<span class="font-bold">Comment:</span> ' . $comment_content;
                                echo '</p>';
                                echo '</div>';
                            }
                        } else {
                            echo '<p>No comments yet.</p>';
                        }

                        // Free the result set
                        mysqli_free_result($comment_result);
                        ?>
                    </div>
                    <!-- Comment Submission Form -->
                    <div class="mt-4">
                        <h2 class="text-2xl font-bold mb-2">Submit Your Comment</h2>
                        <form action="submit_comment.php" method="post" class="mb-4">
                            <div class="mb-2">
                                <label for="name" class="block text-gray-700">Name</label>
                                <input type="text" id="name" name="name" required
                                    class="form-input w-full px-4 py-2 rounded-lg">
                            </div>
                            <div class="mb-2">
                                <label for="comment" class="block text-gray-700">Comment</label>
                                <textarea id="comment" name="comment" required
                                    class="form-textarea w-full px-4 py-2 rounded-lg"></textarea>
                            </div>
                            <input type="hidden" name="event_id" value="<?php echo $event_id; ?>">
                            <button type="submit"
                                class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="w-full lg:w-1/3 px-4">
                    <div class="bg-white p-4 shadow-md">
                        <h2 class="text-2xl font-bold mb-4">Latest Events</h2>
                        <hr class="my-2 border-t">
                        <?php
                        $host = 'localhost';
                        $username = 'root';
                        $password = '';
                        $database = 'cscassigment';

                        $connection = mysqli_connect($host, $username, $password, $database);

                        if (!$connection) {
                            die('Connection failed: ' . mysqli_connect_error());
                        }

                        $query = "SELECT * FROM events ORDER BY event_date DESC LIMIT 3";
                        $result = mysqli_query($connection, $query);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<div class="mb-4">';
                                // Make the event title clickable and link to event details page
                                echo '<a href="event_details.php?id=' . $row['event_id'] . '" class="text-black text-decoration-none">';
                                echo '<h3 class="text-lg font-semibold">' . $row['event_title'] . '</h3>';
                                echo '<p class="text-gray-500">Event Date: ' . $row['event_date'] . '</p>';
                                // Display the first few words of about_event text
                                $aboutText = $row['about_event'];
                                $aboutWords = explode(' ', $aboutText);
                                $firstFewWords = implode(' ', array_slice($aboutWords, 0, 15)); // Adjust the number of words as needed
                                echo '<p class="mt-2">' . $firstFewWords . '...</p>';
                                echo '</a>';
                                echo '<hr class="my-2 border-t">';
                                echo '</div>';
                            }
                        } else {
                            echo '<p>No upcoming events available.</p>';
                        }

                        mysqli_close($connection);
                        ?>

                    </div>
                </div>

            </div>
        </div>
    </section>




    <section class="bg-gradient-to-r from-blue-500 to-blue-700 py-8 text-white">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold mb-4">Departmental Contact Email</h2>
            <p class="text-lg mb-8">For inquiries and more information, you can reach us at:</p>
            <div class="contact-email">
                <a href="mailto:computerscience@fulokoja.edu.ng" class="email-link">computerscience@fulokoja.edu.ng</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-blue-700 text-white py-6">
        <div class="container mx-auto text-center">
            <h3 class="text-2xl font-bold mb-4">National Association of Computing Students</h3>
            <p class="text-lg mb-2">Federal University Lokoja</p>
            <p class="mb-6">Email us at : <a href="mailto:computerscience@fulokoja.edu.ng"
                    class="underline text-white">computerscience@fulokoja.edu.ng</a></p>
            <div class="social-icons">
                <!-- Font Awesome Icons -->
                <a href="#" class="social-icon">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="social-icon">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="social-icon">
                    <i class="fab fa-instagram"></i>
                </a>
                <!-- Add more social media icons as needed -->
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Font Awesome Icons (You'll need to add the link to the CDN in the head section) -->
    <script src="https://kit.fontawesome.com/your-font-awesome-kit-id.js" crossorigin="anonymous"></script>
    <!-- Add the following script tags before the closing body tag -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Add the following script tag before the closing body tag -->
    <!-- Add the following script tag before the closing body tag -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <!-- Splide.js JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="assets/script/script.js"></script>
    <!-- Add the following script tag before the closing body tag -->
    <script>
        const mobileMenuBtn = document.getElementById("mobile-menu");
        const navLinks = document.querySelector("nav");

        mobileMenuBtn.addEventListener("click", () => {
            navLinks.classList.toggle("show-mobile-menu");
        });
    </script>
</body>

</html>




