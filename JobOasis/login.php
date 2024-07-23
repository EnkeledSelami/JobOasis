<?php
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    
    // Perform your login logic here, e.g., check the credentials in the database
    $sql = "SELECT id, username FROM user WHERE (username = ? OR email = ?) AND password = ?";
    $stmt = $mysqli->prepare($sql);
    if (!$stmt) {
        die("Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error);
    }
    
    if (!$stmt->bind_param("sss", $usernameemail, $usernameemail, $password)) {
        die("Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error);
    }

    if (!$stmt->execute()) {
        die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
    }

    $stmt->bind_result($id, $username);
    $stmt->fetch();
    $stmt->close();
    
    if ($id) {
        $_SESSION["login"] = true;
        $_SESSION["id"] = $id;
        $_SESSION["username"] = $username;
        
        if ($username === "Admin" || $usernameemail === "admin@example.com") {
            header("Location: welcome1.php");
            exit();
        } else {
            header("Location: welcome.php");
            exit();
        }
    } else {
        echo "Invalid username/email or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

        button.login-btn {
            background-color: #030804; /* Login button color */
            color: white; /* Text color */
            padding: 14px 20px;
            border-radius: 5px;
            margin: 7px 0;
            width: 100%;
            font-size: 18px;
            cursor: pointer;
        }

        button.login-btn:hover {
            opacity: 0.6;
        }

        .register-btn {
            background-color: transparent; /* Transparent background */
            border: 2px solid #2196F3; /* Border color for transparent effect */
            color: #2196F3; /* Text color */
            padding: 14px 20px;
            border-radius: 5px;
            margin: 7px 0;
            width: 100%;
            font-size: 18px;
            cursor: pointer;
        }

        .register-btn:hover {
            background-color: #2196F3; /* Change background color on hover */
            color: white; /* Change text color on hover */
        }

        .register {
            color: white;
            margin-top: 20px;
        }

        .register a {
            color: #2196F3; /* Specify the color explicitly */
            text-decoration: none; /* Remove underline */
        }

        .register a:hover {
            text-decoration: underline; /* Add underline on hover */
        }

        /* Logo CSS */
        .logo {
            position: absolute;
            top: 10px;
            left: 50px;
            width: 150px; /* Adjust width as needed */
            height: auto; /* Maintain aspect ratio */
        }
    </style>
</head>
<body>
    <!-- Logo -->
    <img src="images/logo.png" alt="Logo" class="logo">

    <h1>Login</h1>
    <form action="login.php" method="post">
        <div class="headingsContainer">
            <h3>Sign in</h3>
            <p>Sign in with your username and password</p>
        </div>

        <div class="mainContainer">
            <table>
                <tr>
                    <td><label for="usernameemail">Username or Email:</label></td>
                    <td><input type="text" placeholder="Enter Username or Email" name="usernameemail" required></td>
                </tr>
                <tr>
                    <td><label for="password">Password:</label></td>
                    <td><input type="password" placeholder="Enter Password" name="password" required></td>
                </tr>
            </table>

            <button type="submit" class="login-btn">Login</button>

            <p class="register">Not a member? <a href="registration.php" class="home-btn">Register here!</a></p>
        </div>
    </form>
</body>
</html>

