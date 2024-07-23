<?php
include_once 'config1.php';

// Initialize variables with default values to prevent errors
$jobTitle = '';
$jobLocation = '';
$jobSalary = '';
$jobType = '';
$jobExperience = '';
$companyName = '';
$datePosted = '';
$jobDescription = '';
$jobInformation = '';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $jobTitle = isset($_POST['jobTitle']) ? $_POST['jobTitle'] : '';
    $jobLocation = isset($_POST['jobLocation']) ? $_POST['jobLocation'] : '';
    $jobSalary = isset($_POST['jobSalary']) ? $_POST['jobSalary'] : '';
    $jobType = isset($_POST['jobType']) ? $_POST['jobType'] : '';
    $jobExperience = isset($_POST['jobExperience']) ? $_POST['jobExperience'] : '';
    $companyName = isset($_POST['companyName']) ? $_POST['companyName'] : '';
    $datePosted = isset($_POST['datePosted']) ? $_POST['datePosted'] : '';
    $jobDescription = isset($_POST['jobDescription']) ? $_POST['jobDescription'] : '';
    $jobInformation = isset($_POST['jobInformation']) ? $_POST['jobInformation'] : '';

    // Handle Company Logo upload
    $imageURL = '';
    if (isset($_FILES['companyLogo']) && $_FILES['companyLogo']['error'] === UPLOAD_ERR_OK) {
        $logoFile = $_FILES['companyLogo'];
        $logoFileName = $logoFile['name'];
        $logoTmpFilePath = $logoFile['tmp_name'];
        $logoError = $logoFile['error'];

        // Specify the directory to store the uploaded logos
        $logoDirectory = 'images/logos/';
        $logoPath = $logoDirectory . $logoFileName;

        if ($logoError === UPLOAD_ERR_OK) {
            if (move_uploaded_file($logoTmpFilePath, $logoPath)) {
                $imageURL = $logoPath;
            }
        }
    }

    // Prepare the SQL statement
    $stmt = $mysqli->prepare("INSERT INTO job_listings (jobTitle, jobLocation, jobSalary, jobExperience, jobType, companyName, imageURL, datePosted, jobDescription, jobInformation) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $jobTitle, $jobLocation, $jobSalary, $jobExperience, $jobType, $companyName, $imageURL, $datePosted, $jobDescription, $jobInformation);

    // Execute the SQL statement
    if ($stmt->execute()) {
        // Form submission successful
        echo "<script>alert('Job added successfully!'); window.location.href = 'welcome1.php';</script>";
        exit(); // Ensure that no other output is sent before the redirection
    } else {
        // Error occurred during execution of SQL statement
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close database connection
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        /* CSS Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #4c0404;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: relative; /* Add position relative for absolute positioning */
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .back-button {
            position: absolute;
            left: 20px;
            top: 20px;
            background-color: #6c17e3;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .success-message {
            color: #ffffff;
            font-size: 24px;
            background-color: rgba(0, 0, 0, 0.8);
            padding: 20px;
            border-radius: 5px;
            display: none;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <a href="javascript:history.back()" class="back-button">Back</a> <!-- Changed href to JavaScript function -->
    <div class="container">
        <img src="images/logo.png" class="img-fluid logo-image" style="max-width: 95px; height: auto;">
        <h1>Job Listings Form</h1>
        <form method="POST" action="JobListingsForm.php" enctype="multipart/form-data">
            <!-- Form fields -->
            <input type="text" name="jobTitle" placeholder="Job Title" value="<?php echo $jobTitle; ?>"><br>
            <input type="text" name="jobLocation" placeholder="Job Location" value="<?php echo $jobLocation; ?>"><br>
            <input type="text" name="jobSalary" placeholder="Job Salary" value="<?php echo $jobSalary; ?>"><br>
            <select name="jobType">
                <option value="">Select Job Type</option>
                <option value="full-time">Full Time</option>
                <option value="part-time">Part Time</option>
                <option value="remote">Remote</option>
                <option value="internship">Internship</option>
            </select><br>
            <select name="jobExperience">
                <option value="">Select Experience</option>
                <option value="entry-level">Entry Level</option>
                <option value="junior-level">Junior Level</option>
                <option value="senior-level">Senior Level</option>
            </select><br>
            <input type="text" name="companyName" placeholder="Company Name" value="<?php echo $companyName; ?>"><br>
            <label for="companyLogo">Company Logo:</label>
            <input type="file" id="companyLogo" name="companyLogo"><br>
            <label for="datePosted">Date Posted:</label>
            <input type="date" id="datePosted" name="datePosted" value="<?php echo $datePosted; ?>"><br>
            <textarea name="jobDescription" placeholder="Job Description"><?php echo $jobDescription; ?></textarea><br>
            <textarea name="jobInformation" placeholder="Job Details"><?php echo $jobInformation; ?></textarea><br>
            <button id="submitButton" type="submit">Submit</button>
        </form>
        <div class="success-message" style="display: none;"><?php echo $successMessage; ?></div>
    </div>
</body>
</html>
