<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <link rel="shortcut icon" href="assets/images/nacosandful-removebg-preview.png" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Federal University Lokoja - Home</title>
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
  <link rel="stylesheet" href="https://unpkg.com/@splidejs/splide@3.0.6/dist/css/splide.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>

</head>

<body class="bg-gray-100">
  <!-- Header -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white absolute sticky">
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
            <a class="active nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="aboutus.html">About</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
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


  <section class="relative mobile-height md:h-[500px]">
    <div class="swiper-container h-full">
      <div class="swiper-wrapper">
        <!-- Slide 1 -->
        <div class="swiper-slide">
          <img src="assets/images/students1.jpg" alt="Slide 1" class="w-full h-full object-cover" />
          <div class="text-container">
            <h1 class="text-white text-xl font-bold">
              Welcome to the Department of Computer Science at Federal University Lokoja
            </h1>
            <p class="text-white text-sm hide-on-mobile">
              Dynamic field powering technology and innovation, turning ideas into reality through programming. </p>
          </div>
        </div>
        <div class="swiper-slide">
          <img src="assets/images/students2.jpg" alt="Slide 1" class="w-full h-full object-cover" />
          <div class="text-container">
            <h1 class="text-white text-xl font-bold">
              Welcome to the Department of Computer Science at Federal University Lokoja
            </h1>
            <p class="text-white text-sm hide-on-mobile">
              Nurturing computer scientists through dedicated faculty, state-of-the-art facilities, exploring vast
              realms of Computer science
            </p>
          </div>
        </div>
        <div class="swiper-slide">
          <img src="assets/images/students3.jpg" alt="Slide 1" class="w-full h-full object-cover" />
          <div class="text-container">
            <h1 class="text-white text-xl font-bold">Who are we!</h1>
            <p class="text-white text-sm hide-on-mobile">
              We are the roaring department, delivering on every promise we make.
            </p>
          </div>
        </div>
        <!-- Add more slides with images and content as needed -->
      </div>
    </div>
  </section>

  <section class="bg-gray-100 py-16">
    <div class="container mx-auto flex flex-col md:flex-col  justify-center">
      <!-- HOD Image and Info -->
      <div class="w-full mb-8 md:mb-0 flex items-center">
        <img src="assets/images/prof.jpeg" alt="Head of Department" class="w-40 h-40 rounded-full mr-4" />
        <div>
          <h2 class=" font-bold mb-2">Head of Department's Welcome Address</h2>
          <p>Edgar Osaghae</p>
          <p class="text-gray-500">BSc., MSc and PhD in Computer Science</p>
        </div>
      </div>

      <!-- HOD Welcome Address -->
      <div class="w-full md:w-full">
        <div class="text-sm md:text-base">
          <!-- Display the first 4 lines of text -->
          <p class="line-clamp-4" id="welcome-text">
            The world as we come to see it today is shaped by technologies
            largely made possible by computers. Looking at the advancement in
            technology in this present day, one would not have believed that
            the first set of computers were developed less than a century ago
            and they seem to have taken over every aspect of human endeavor.
          </p>

          <!-- Read more button -->
          <button class="mt-2 text-blue-500 hover:underline outline-none" id="read-more-btn">
            See More
          </button>
        </div>

        <!-- Full text hidden initially -->
        <div class="hidden" id="full-text">
          <p class="mt-4">
            The Computer Science Department at the Federal University Lokoja
            seeks to rigorously train students who are interested in
            theoretical computing and its applications to solving humanity
            problems. The curriculum is specially designed to allow students
            to pursue the area(s) of Computer Science that they find most
            interesting while providing an overall solid foundation for
            advanced research.
          </p>
          <p class="mt-4">
            This page contains all the relevant information about the
            department. Additional information is available in the students'
            handbook which can be downloaded from this page.
          </p>
          <!-- More text here ... -->
          <p class="font-bold mb-4 text-green-600">
            On successful completion of the B.Sc. Computer Science program,
            students will have:
          </p>
          <ul class="animated-list">
            <li>
              Knowledge of basic science and computer science fundamentals
            </li>
            <li>
              Understanding of entrepreneurship, the need for and process of
              innovation, as well as the need and capacity for lifelong
              learning
            </li>
            <li>
              In-depth technical competence in the discipline of computer
              science
            </li>
            <li>
              An ability to carry out problem analysis, requirements capture,
              problem formulation, and integrated software development for the
              solution of a problem
            </li>
            <li>
              Capacity to continue developing relevant knowledge, skills, and
              expertise in computer science throughout their careers
            </li>
            <li>
              An ability to communicate effectively with other computer
              scientists, software engineers, other professional disciplines,
              managers, and the community generally
            </li>
            <li>
              An ability to undertake and coordinate large computer science
              projects and to identify problems and their formulation and
              solution
            </li>
            <li>
              An ability to function effectively as an individual, as a team
              member in multidisciplinary and multicultural teams and as a
              leader/manager with the capacity to assist and encourage those
              under their direction
            </li>
            <li>
              Understanding of the social, cultural, global, and business
              opportunities of the professional computer scientist as well as
              understanding of the need for and principles of sustainability
              and adaptability
            </li>
            <li>
              Understanding of and commitment to professional and ethical
              responsibilities
            </li>
          </ul>
          <p class="mt-4 font-bold">
            I most sincerely welcome you to the most relevant degree program
            in the age of “e-everything”.
          </p>
        </div>
      </div>
    </div>
  </section>
  <section class="bg-gray-100 py-5">
  <div class="container mx-auto">
  <!-- Our Final Words Slider -->
  <div class="our-final-words-slider">
    <?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'cscassigment';

    // Create a connection
    $connection = new mysqli($host, $username, $password, $database);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Retrieve final words from the database
    $query = "SELECT final_word, author FROM final_words";
    $result = $connection->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="card">';
            echo '<p class="quote italic">' . $row['final_word'] . '</p>';
            echo '<p class="student-name font-bold">' . $row['author'] . ' - Final words</p>';
            echo '</div>';
        }
    } else {
        echo '<p class="text-gray-500">No final words available yet.</p>';
    }

    // Close the database connection
    $connection->close();
    ?>
  </div>
</div>

  </section>

  <section class="bg-gray-100 py-12">
    <div class="container mx-auto">
      <h2 class="text-3xl font-bold mb-8 text-center">Upcoming Events</h2>
      <div class="event-cards">
        <?php
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'cscassigment';

        $connection = mysqli_connect($host, $username, $password, $database);

        if (!$connection) {
          die('Connection failed: ' . mysqli_connect_error());
        }

        $query = "SELECT * FROM events LIMIT 3"; // Fetch up to 3 events
        $result = mysqli_query($connection, $query);

        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            $aboutEvent = implode(' ', array_slice(explode(' ', $row['about_event']), 0, 15));
            echo '<div class="event-card">';
            echo '<div class="event-image" style="background-image: url(\'dashboard/' . $row['event_image'] . '\');">';
            echo '<div class="overlay">';
            echo '<h3 class="event-title">' . $row['event_title'] . '</h3>';
            echo '<p class="event-text">' . $aboutEvent . '...</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
          }
        } else {
          echo '<p>No events available.</p>';
        }

        mysqli_close($connection);
        ?>
      </div>
      <div class="see-more-events">
        <a href="event.php" class="see-more-link">See More Events</a>
      </div>
    </div>
  </section>



  <section class="bg-blue-700 text-white py-12">
    <div class="container mx-auto">
      <div class="about-nacoss">
        <div class="nacoss-logo">
          <img src="assets/images/nacoslogo-removebg-preview.png" alt="NACOSS Logo" class="w-32 h-32 mx-auto mb-4">
        </div>
        <h2 class="text-4xl font-bold mb-4 text-center">About NACOSS</h2>
        <div class="nacoss-content">
          <div class="short-text">
            <p>
              The National Association of Computer Science Students (NACOSS) is a vibrant and inclusive community of
              passionate computer science students at the Federal University Lokoja. Our aim is to foster innovation,
              collaboration, and academic excellence in the field of computer science.
            </p>
          </div>
          <div class="long-text hidden">
            <p>
              NACOSS provides a platform for students to explore their interests, share ideas, and develop technical
              and leadership skills. We organize various events, workshops, seminars, and hackathons throughout the
              academic year to enhance the learning experience and encourage students to apply their knowledge in
              real-world projects.
            </p>
            <p>
              Our objectives include:
            </p>
            <ul class="objectives-list">
              <li>
                <i class="fas fa-check text-green-500 mr-2"></i>
                Promoting academic excellence in computer science and related fields.
              </li>
              <li>
                <i class="fas fa-check text-green-500 mr-2"></i>
                Fostering networking and collaboration among students and industry professionals.
              </li>
              <li>
                <i class="fas fa-check text-green-500 mr-2"></i>
                Advocating for the interests of computer science students and professionals.
              </li>
              <li>
                <i class="fas fa-check text-green-500 mr-2"></i>
                Organizing social and community development initiatives through technology.
              </li>
            </ul>
            <p>
              In addition to academic pursuits, NACOSS is also a place for personal growth and leadership development.
              We encourage students to actively participate in organizing events, taking up leadership roles, and
              contributing
              positively to the society through their technical skills.
            </p>
            <p>
              As a member of NACOSS, you gain access to a supportive and inspiring community where you can interact with
              like-minded individuals, collaborate on projects, and stay updated with the latest trends in technology.
              We value diversity and inclusivity, ensuring every student feels welcomed and respected in our community.
            </p>
            <p>
              Whether you are a seasoned computer science enthusiast or a beginner eager to explore the world of
              technology,
              NACOSS is the perfect place to unlock your potential and make meaningful connections.
            </p>
            <p>
              Join us in shaping the future of technology and computer science at the Federal University Lokoja.
              Together, we can create a brighter and more innovative tomorrow.
            </p>
          </div>
          <button class="see-more-less font-black outline-none" onclick="toggleText()">See More...</button>
        </div>
      </div>
    </div>
  </section>
  <section class="bg-white py-12">
    <div class="container mx-auto">
      <h2 class="text-3xl font-bold mb-8 text-center">Student Success Stories</h2>
      <!-- Success Stories Slider -->
      <div class="splide">
        <div class="splide__track">
          <ul class="splide__list grid grid-cols-1 md:grid-cols-3 gap-8">

            <?php
            $host = 'localhost';
            $username = 'root';
            $password = '';
            $database = 'cscassigment';

            $connection = mysqli_connect($host, $username, $password, $database);

            if (!$connection) {
              die('Connection failed: ' . mysqli_connect_error());
            }

            $query = "SELECT * FROM success_stories";
            $result = mysqli_query($connection, $query);

            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                echo '<li class="splide__slide">';
                echo '<div class="card bg-gray-100 p-4">';
                echo '<div class="mb-4">';
                echo '<img src="' . $row['image_url'] . '" alt="Student" class="w-20 h-20 rounded-full mx-auto">';
                echo '</div>';
                echo '<h3 class="text-lg font-bold text-center">' . $row['user_name'] . '</h3>';
                echo '<p class="text-center mb-4">' . $row['story'] . '</p>';
                echo '</div>';
                echo '</li>';
              }
            } else {
              echo '<p>No success stories available.</p>';
            }

            mysqli_close($connection);
            ?>

          </ul>
        </div>
      </div>

      <!-- Input Form for New Success Stories -->
      <div class="container mx-auto mt-12">
        <h3 class="text-xl font-bold mb-4 text-center">Share Your Success Story</h3>
        <form action="submit_story.php" method="post" class="space-y-4 flex items-center justify-between w-full"
          enctype="multipart/form-data">
          <div class="flex flex-col items-center">
            <div class="mb-4">
              <div class="w-32 h-32 rounded-full overflow-hidden">
                <img src="assets/images/dp.jpeg" alt="Profile Picture" class="w-full h-full object-cover"
                  id="profile-pic-preview">
              </div>
              <label for="profile-pic" class="block text-center mt-2 cursor-pointer">
                <span class="text-blue-500"><i class="fas fa-camera"></i></span>
                Choose Profile Picture
              </label>
              <input type="file" id="profile-pic" name="profile_pic" class="hidden" accept="image/*" required>
            </div>
          </div>
          <div class="w-full">
            <div class="mb-4 w-full">
              <input type="text" name="user_name" class="form-input outline-none border-1 w-full p-4"
                placeholder="Your Name" required>
            </div>
            <div class="mb-4 w-full">
              <input type="text" name="matric_number" class="form-input  outline-none border-1 w-full p-4"
                placeholder="Matric Number" required>
            </div>
            <div class="mb-4 w-full">
              <textarea name="story" class="form-textarea  outline-none border-1 w-full p-4" rows="4"
                placeholder="Your Success Story or Experience" maxlength="75" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary flex items-center  outline-none border-1 w-full p-4">
              <span class="mr-2"><i class="fas fa-check"></i></span>Submit
            </button>
          </div>
        </form>
      </div>

    </div>
  </section>


  <!-- Features Section -->
  <section class="bg-white py-12 px-4">
    <div class="container mx-auto">
      <div class="flex justify-center items-center">
        <!-- Logo -->
        <img src="assets/images/nacosandful-removebg-preview.png" alt="Logo" class="w-12 h-12 mr-4">

        <!-- Icon 1 -->
        <div class="mr-4 icon-container">
          <i class="fas fa-book text-blue-700 text-4xl"></i>
        </div>
        <div>
          <h2 class="text-xl font-bold">Academic Excellence</h2>
          <p class="mt-2">
            Our rigorous academic programs ensure students achieve their full
            potential.
          </p>
        </div>
      </div>
      <!-- Add more feature sections with icons as needed -->
    </div>
  </section>


  <section class="bg-gradient-to-r from-blue-500 to-blue-700 py-8 text-white">
    <div class="container mx-auto">
      <h3 class="font-bold mb-4">Departmental Contact Email</h3>
      <p class="mb-8">For inquiries and more information, you can reach us at:</p>
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

  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <!-- Add the following script tags before the closing body tag -->
  <!-- Add the following script tags before the closing body tag -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
  <script>
    $(document).ready(function () {
      $(".grid-gallery").slick({
        dots: false,
        arrows: false,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 3000,
        speed: 500,
        slidesToShow: 3,
        slidesToScroll: 1,
        variableWidth: true, // Allow variable width for carousel items
      });
    });
  </script>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Font Awesome Icons (You'll need to add the link to the CDN in the head section) -->
  <script src="https://kit.fontawesome.com/your-font-awesome-kit-id.js" crossorigin="anonymous"></script>
  <!-- Add the following script tags before the closing body tag -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Add the following script tag before the closing body tag -->
  <!-- Add the following script tag before the closing body tag -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
  <script>
    $(document).ready(function () {
      $(".our-final-words-slider").slick({
        dots: false, // Hide pagination dots
        arrows: false, // Hide previous and next arrows
        infinite: true,
        autoplay: true,
        autoplaySpeed: 5000,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,
      });
    });


    const profilePicInput = document.getElementById('profile-pic');
    const profilePicPreview = document.getElementById('profile-pic-preview');

    profilePicInput.addEventListener('change', (event) => {
      const selectedFile = event.target.files[0];
      if (selectedFile) {
        const reader = new FileReader();
        reader.onload = (e) => {
          profilePicPreview.src = e.target.result;
        };
        reader.readAsDataURL(selectedFile);
      }
    });
  </script>
  <!-- Splide.js JS -->
  <script src="https://unpkg.com/@splidejs/splide@3.0.6/dist/js/splide.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      new Splide('.splide', {
        perPage: 3,
        perMove: 1,
        gap: '1rem',
        breakpoints: {
          768: {
            perPage: 1,
            arrows: false,
          },
        },
      }).mount();
    });
  </script>

  <script>
    const swiper = new Swiper(".swiper-container", {
      loop: true, // Enable looping
      speed: 500, // Transition speed in milliseconds
      autoplay: {
        delay: 5000, // Autoplay delay in milliseconds
        disableOnInteraction: false, // Allow autoplay to continue after user interaction
      },
      pagination: {
        el: ".swiper-pagination", // Pagination container
        clickable: true, // Enable clickable pagination bullets
      },
    });
  </script>

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