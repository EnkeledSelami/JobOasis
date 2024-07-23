<?php
session_start();
require 'config.php';

if (isset($_SESSION["login"]) && $_SESSION["login"] === true && isset($_SESSION["id"])) {
    $userId = $_SESSION["id"];

    $sql = "SELECT name, username, email, avatar FROM user WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->bind_result($name, $username, $email, $avatar);
    
    if ($stmt->fetch()) {
        $stmt->close();
    } else {
        $stmt->close();
        header("Location: login.php");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        body {
            font-family: sans-serif;
            background-image: url('images/nightdesert.jpg'); /* Background image */
            background-size: cover;
            background-position: center;
            color: whitesmoke;
        }

        h1 {
            text-align: center;
        }

        form {
            width: 35rem;
            margin: auto;
            color: whitesmoke;
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
            background-color: #E53935;
            color: white;
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

    </style>

    <script>
        function validateForm() {
            var avatarInput = document.forms["avatarForm"]["avatar"];
            if (avatarInput.files.length === 0) {
                alert("Please select a file to upload.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="profile-container">
        <h1>Welcome, <?php echo htmlspecialchars($username); ?></h1>
        <div class="profile-info">
            <?php if ($avatar): ?>
                <img src="<?php echo htmlspecialchars($avatar); ?>" alt="Avatar" class="avatar">
            <?php else: ?>
                <img src="images/profile avatars" alt="Default Avatar" class="avatar">
            <?php endif; ?>
            <p><strong>Name:</strong> <?php echo htmlspecialchars($name); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
            <p><strong>Username:</strong> <?php echo htmlspecialchars($username); ?></p>
            <p><strong>Role:</strong> User</p>
            <form name="avatarForm" action="upload_avatar.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                <input type="file" name="avatar">
                <button type="submit">Upload Avatar</button>
                </form>
        </div>
        <a href="logout.php" class="logout-btn">Logout</a>
        <a href="index1.html" class="home-btn">Home</a>
    </div>
</body>
</html>
