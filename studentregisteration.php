<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/images/nacosandful-removebg-preview.png" type="image/x-icon">
    <title>Registration Page</title>
    <!-- Include Bootstrap and Tailwind CSS stylesheets -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        /* Add your custom CSS styles here */
    </style>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-md shadow-md w-full md:w-1/3 lg:w-1/4">
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
        <h1 class="text-2xl font-semibold mb-4">Register</h1>
        <form id="registrationForm" method="post" action="registration_process.php">
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" id="username" name="username" class="form-control">
                <?php if (isset($_GET['usernameError'])): ?>
                    <p class="text-red-500">Username is already in use.</p>
                <?php endif; ?>
            </div>
            <div class="mb-4">
                <label for="matriculationNumber" class="block text-sm font-medium text-gray-700">Matriculation
                    Number</label>
                <input type="text" id="matriculationNumber" name="matriculationNumber" class="form-control">
                <?php if (isset($_GET['matriculationError'])): ?>
                    <p class="text-red-500">Matriculation Number is already in use.</p>
                <?php endif; ?>
            </div>
            <div class="mb-4">
                <label for="userLevel" class="block text-sm font-medium text-gray-700">User Level</label>
                <select id="userLevel" name="userLevel" class="form-select">
                    <option value="100LEVEL">100LEVEL</option>
                    <option value="200LEVEL">200LEVEL</option>
                    <option value="300LEVEL">300LEVEL</option>
                    <option value="400LEVEL">400LEVEL</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
            <div class="mb-4">
                <label for="confirmPassword" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" id="confirmPassword" name="confirmPassword" class="form-control">
                <?php if (isset($_GET['passwordError'])): ?>
                    <p class="text-red-500">Passwords do not match.</p>
                <?php endif; ?>
            </div>
            <div class="my-4">
                <p class="text-gray-600"><a href="studentlogin.php" class="text-blue-500 font-semibold"><i class="bi bi-arrow-left-short"></i> Return to Login</a></p>
            </div>
            <button type="submit" class="btn btn-primary w-full">Register</button>
        </form>
    </div>
    <!-- Include Bootstrap and Tailwind CSS scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>