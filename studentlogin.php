<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="./assets/images/nacosandful-removebg-preview.png" type="image/x-icon" />
  <title>Login Page</title>
  <!-- Include Bootstrap and Tailwind CSS stylesheets -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
    /* Add your custom CSS styles here */
  </style>
</head>

<body class="bg-gray-100 flex flex-col items-center justify-center h-screen">
  <div class="fixed w-full top-0 bg-white p-4 flex items-center justify-between shadow-md">
    <div>
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
    </div>
    <a class="bg-blue-500 text-white text-decoration-none px-4 py-2 rounded hover:bg-blue-500" href="index.php"><i class="bi bi-arrow-left-short"></i> Return to Site</a>
  </div>

  <div class="bg-white p-8 rounded-md shadow-md w-full md:w-1/3 lg:w-1/4">
    <!-- ... your existing code ... -->
    <form id="loginForm" method="post" action="login_process.php">
      <div class="mb-4">
        <label for="matriculationNumber" class="block text-sm font-medium text-gray-700">Matriculation Number</label>
        <input type="text" id="matriculationNumber" name="matriculationNumber" class="form-control">
        <?php
        if (isset($_GET['error']) && $_GET['error'] === 'userNotFound') {
          echo '<p class="text-red-500">Invalid matric number</p>';
        }
        ?>
      </div>
      <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" id="password" name="password" class="form-control">
        <?php
        if (isset($_GET['error']) && $_GET['error'] === 'password') {
          echo '<p class="text-red-500">Invalid password.</p>';
        }
        ?>

      </div>
      <div class="my-4">
        <p class="text-gray-600">Don't have an account? <a href="studentregisteration.php"
            class="text-blue-500">Register here</a></p>
      </div>
      <button type="submit" class="btn btn-primary w-full">Login</button>
    </form>
    <!-- ... your existing code ... -->

  </div>


  <!-- Include Bootstrap and Tailwind CSS scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>