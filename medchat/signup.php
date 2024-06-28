<?php
session_start();
include_once 'includes/dbconn.php';
if(isset($_SESSION['user'])!="")
{
    header("Location: chatbot.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <!-- Include Tailwind CSS -->
    <link href="tailwind.min.css"stylesheet">
    <script>
        function validatePass() {
            const password = document.getElementById('password').value;
            const cpassword = document.getElementById('cpassword').value;
            if (password !== cpassword) {
                alert('Passwords do not match!');
            } else{
                document.getElementById('signup-form').submit();
            }
        }
    </script>
</head>
<body class="bg-gradient-to-r from-purple-400 via-purple-500 to-purple-600 min-h-screen flex items-center justify-center">

<div class="bg-white p-8 rounded-lg shadow-md w-96">
    <h1 class="text-2xl font-semibold mb-6">Sign Up</h1>

    <form action="auth/signup.php" method="POST" id="signup-form">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">Username</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="username" id="username" type="text" placeholder="John Smith" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Password</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="password" id="password" type="password" placeholder="********" required>
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Confirm Password</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="cpassword" id="cpassword" type="password" placeholder="********" required>
        </div>
        <button onclick="validatePass()" class="bg-purple-500 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline" type="button">
            Sign Up
        </button>
        <a href="index.php" class="text-gray-500 hover:text-purple-500 float-right mt-2">Already have an account?</a>
    </form>
    </div>
</div>

</body>
</html>