<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <link rel="shortcut icon" href="assets/images/nacosandful-removebg-preview.png" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Courses Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" />
  <link rel="stylesheet" href="assets/styles/style.css" />
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Add the following links for Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"
    crossorigin="anonymous"></script>
  <!-- Splide.js CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<link rel="stylesheet" href="https://unpkg.com/@splidejs/splide@3.0.6/dist/css/splide.min.css">

</head>

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
            <a class="active nav-link" href="#giftcards" role="button" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              Academics
            </a>
            <!-- Submenu -->
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="active dropdown-item" href="couses.php">Courses</a></li>
              <li><a class="dropdown-item" href="academicstaff.php">Academic Staff</a></li>
              <li><a class="dropdown-item" href="nonacademicstaff.php">Non-Academic Staff</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="event.php">Events</a>
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

  <div class="container mx-auto mt-5">
    <?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'cscassigment';

    // Create a connection
    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute a query to fetch course data grouped by level
    $sql = "SELECT course_code, course_title, about_course, course_level FROM courses ORDER BY course_level_value";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Bind result variables
    $stmt->bind_result($courseCode, $courseTitle, $aboutCourse, $courseLevel);

    // Initialize a variable to track the current course level
    $currentLevel = null;

    // Fetch course data and display in grouped cards
    while ($stmt->fetch()) {
        // If a new course level is encountered, display its title
        if ($courseLevel !== $currentLevel) {
            if ($currentLevel !== null) {
                echo '</div>';
            }
            echo '<h2 class="text-2xl font-bold mb-4">' . $courseLevel . ' Courses</h2>';
            echo '<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">';
            $currentLevel = $courseLevel;
        }

        echo '<div class="card">';
        echo '<div class="card-header bg-primary text-white">';
        echo '<h5 class="mb-0">' . $courseCode . '</h5>';
        echo '</div>';
        echo '<div class="card-body">';
        echo '<p class="mb-1"><strong>' . $courseCode . ':</strong> ' . $courseTitle . '</p>';
        echo '<p class="mb-1">' . $aboutCourse . '</p>';
        echo '</div>';
        echo '</div>';
    }

    if ($currentLevel !== null) {
        echo '</div>';
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
    ?>
</div>


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
  <script>
    // Your custom JavaScript for See More button
    document.addEventListener("DOMContentLoaded", function () {
      const seeMoreButtons = document.querySelectorAll(".see-more");
      const coursesExtras = document.querySelectorAll(".courses-extra");

      seeMoreButtons.forEach((button, index) => {
        button.addEventListener("click", function () {
          coursesExtras[index].classList.toggle("hidden");
          button.textContent = coursesExtras[index].classList.contains("hidden") ? "See More" : "See Less";
        });
      });
    });

  </script>
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

    $(document).ready(function () {
      $(".see-more").on("click", function (e) {
        e.preventDefault();
        $(this).parent().find(".d-none").toggleClass("d-flex");
        $(this).text($(this).text() === "See More" ? "See Less" : "See More");
      });
    });
  </script>
</body>

</html>