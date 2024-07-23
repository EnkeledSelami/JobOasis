<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to JobOasis</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('images/oasis.jpg');
            background-size: cover;
            background-position: center;
            color: #ffffff; /* Lighter text color */
            text-align: center;
            position: relative;
            margin: 0;
            padding: 0;
        }

        .logo {
            position: absolute;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            width: 150px;
        }

        .welcome-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding-top: 100px; /* Adjusted padding to create space for logo */
        }

        h1, p {
            margin-bottom: 20px;
            font-size: 2rem; /* Adjusted font size */
            color: lightblue; /* Light blue text */
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black background for better contrast */
            padding: 20px; /* Increased padding for better visibility */
            border-radius: 10px;
        }

        .logout-btn {
            background-color: orange; /* Orange background */
            color: #ffffff; /* White text */
            padding: 12px 24px;
            border-radius: 5px;
            text-decoration: none;
            margin: 0 10px;
            border: 2px solid #ffffff; /* White border */
            font-size: 1rem; /* Adjusted font size */
        }

        .home-btn {
            background-color: violet; /* Violet background */
            color: #ffffff; /* White text */
            padding: 12px 24px;
            border-radius: 5px;
            text-decoration: none;
            margin: 0 10px;
            border: 2px solid #ffffff; /* White border */
            font-size: 1rem; /* Adjusted font size */
        }

        .logout-btn:hover, .home-btn:hover {
            background-color: rgba(255, 255, 255, 0.3); /* Semi-transparent white background on hover */
        }
    </style>
</head>
<body>
    <img src="images/logo.png" alt="Logo" class="logo">
    <div class="welcome-container">
        <h1>Welcome to JobOasis</h1>
        <p>JobOasis is a platform designed to connect job seekers with employers. It provides a user-friendly interface for job seekers to search and apply for job openings.</p>
        <p>Feel free to explore the features and functionalities of JobOasis.</p>
        <div class="btn-container">
            <a href="logout.php" class="logout-btn">Logout</a>
            <a href="index1.html" class="home-btn">Home</a>
        </div>
    </div>
</body>
</html>
