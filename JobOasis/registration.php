<?php
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    
    // Handle avatar upload
    $avatar = $_FILES["avatar"];
    $avatarName = $avatar["name"];
    $avatarTmpName = $avatar["tmp_name"];
    $avatarError = $avatar["error"];

    // Specify the directory to store the uploaded avatars
    $avatarDirectory = "images/profile avatars/";
    $avatarPath = $avatarDirectory . $avatarName;

    if ($avatarError === 0) {
        move_uploaded_file($avatarTmpName, $avatarPath);
    }

    // Check if there are any existing users with the role 'admin'
    $checkAdminQuery = "SELECT COUNT(*) as adminCount FROM user WHERE role='admin'";
    $adminResult = $mysqli->query($checkAdminQuery);
    $adminCount = $adminResult->fetch_assoc()['adminCount'];

    // Insert the new user with the appropriate role
    $role = ($adminCount == 0) ? 'admin' : 'user';
    $query = "INSERT INTO user (name, username, email, password, avatar, role) VALUES ('$name', '$username', '$email', '$password', '$avatarPath', '$role')";

    if ($mysqli->query($query)) {
        header("Location: login.php");
        exit();
    } else {
        echo "Registration failed: " . $mysqli->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        body {
            font-family: sans-serif;
            background-image: url('images/desert.jpg'); /* Background image */
            background-size: cover;
            background-position: center;
            color: whitesmoke;
            position: relative; /* Set position to relative for absolute positioning of logo */
        }

        h1 {
            text-align: center;
        }

        form {
            width: 35rem;
            margin: auto;
            color: whitesmoke;
            background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent background color */
            padding: 20px;
            border-radius: 10px;
        }

        input {
            width: 100%;
            margin: 10px 0;
            border-radius: 5px;
            padding: 15px 18px;
            box-sizing: border-box;
        }

        button {
            background-color: #030804;
            color: white;
            padding: 14px 20px;
            border-radius: 5px;
            margin: 7px 0;
            width: 100%;
            font-size: 18px;
        }

        button:hover {
            opacity: 0.6;
            cursor: pointer;
        }

        .avatar {
            display: block;
            margin: 0 auto;
            width: 150px; /* Adjust the width as needed */
            height: 150px; /* Adjust the height as needed */
            border-radius: 50%;
            object-fit: cover;
        }

        .profile-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .profile-info {
            text-align: center;
            margin-top: 20px; /* Adjust the margin as needed */
        }

        .logout-btn {
            background-color: transparent; /* Transparent background */
            border: none; /* Remove border */
            color: #E53935; /* Text color */
            padding: 10px 20px;
            border-radius: 5px;
            margin-right: 10px;
            text-decoration: none;
}

        .home-btn {
            background-color: #2196F3;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }

        /* Logo CSS */
        .logo {
            position: absolute;
            top: 25px;
            left: 25px;
            width: 165px; /* Adjust width as needed */
            height: auto; /* Maintain aspect ratio */
        }
    </style>
</head>
<body>
    <!-- Logo -->
    <img src="images/logo.png" alt="Logo" class="logo">

    <h1>Sign Up</h1>
    <form action="registration.php" method="post" enctype="multipart/form-data">
        <div class="headingsContainer">
            <h3>Register</h3>
            <p>Sign up with your details</p>
        </div>

        <div class="mainContainer">
            <table>
                <tr>
                    <td><label for="name">Name:</label></td>
                    <td><input type="text" placeholder="Enter your name" name="name" required></td>
                </tr>
                <tr>
                    <td><label for="username">Username:</label></td>
                    <td><input type="text" placeholder="Enter a username" name="username" required></td>
                </tr>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td><input type="email" placeholder="Enter your email" name="email" required></td>
                </tr>
                <tr>
                    <td><label for="password">Password:</label></td>
                    <td><input type="password" placeholder="Enter a password" name="password" required></td>
                </tr>
                <tr>
                    <td><label for="confirmpassword">Confirm Password:</label></td>
                    <td><input type="password" placeholder="Confirm your password" name="confirmpassword" required></td>
                </tr>
                <tr>
                    <td><label for="avatar">Avatar:</label></td>
                    <td><input type="file" name="avatar"></td>
                </tr>
            </table>

            <button type="submit">Register</button>

            <p class="register">Already have an account? <a href="login.php" class="logout-btn">Sign in here!</a></p>
        </div>
    </form>
</body>
</html>

