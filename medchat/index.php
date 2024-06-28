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
    <title>Login Page</title>
    <!-- Include Tailwind CSS -->
    <link href="tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-purple-400 via-purple-500 to-purple-600 min-h-screen flex items-center justify-center">

<div class="bg-white p-8 rounded-lg shadow-md w-96">
    <h1 class="text-2xl font-semibold mb-6">Login</h1>

    <form action="auth/login.php" method="POST">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">Username</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="username" id="username" type="text" placeholder="John Smith">
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="password" id="password" type="password" placeholder="********">
        </div>
        <button class="bg-purple-500 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline" type="submit">
            Login
        </button>
        <a href="signup.php" class="text-gray-500 hover:text-purple-500 float-right mt-2">Create a new account</a>
    </form>
</div>

</body>
</html>