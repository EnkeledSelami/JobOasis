<?php
// Check if job ID is provided in the URL
if(isset($_GET['job_id'])) {
    $job_id = $_GET['job_id'];

    // Connect to the database
    $mysqli = new mysqli("localhost", "root", "", "jobform");
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Prepare SQL query to retrieve job details
    $sql = "SELECT * FROM job_listings WHERE id = $job_id";
    $result = $mysqli->query($sql);

    // Check if job exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $jobTitle = $row["jobTitle"];
        $jobLocation = $row["jobLocation"];
        $jobSalary = $row["jobSalary"];
        $jobExperience = $row["jobExperience"];
        $jobType = $row["jobType"];
        $companyName = $row["companyName"];
        $imageURL = $row["imageURL"];
        $jobDescription = $row["jobDescription"];
        $jobInformation = $row["jobInformation"];

        // Close the database connection
        $mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $jobTitle; ?> - Job Details</title>
    <!-- CSS FILES -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-icons.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Custom CSS styles */
        .container {
            text-align: center;
        }
        .job-info {
            margin-top: 20px;
            text-align: left;
        }
        .job-info p {
            margin-bottom: 10px;
        }
        .job-info .row {
            margin-bottom: 10px;
        }
        .align-right {
            text-align: right;
        }
        .company-name {
            font-weight: bold;
            font-size: 20px;
        }
        .company-logo {
            max-width: 200px;
            height: auto;
            display: block;
            margin: 0 auto
        }
        .img-fluid {
            max-width: 200px;
            height: auto;
        }
        .apply-now-button button {
            font-size: 20px; /* Increase button font size */
            padding: 10px 20px; /* Increase button padding */
        }

    </style>
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="index1.html">
            <img src="images/logo.png" class="img-fluid logo-image">
            <div class="d-flex flex-column">
                <strong class="logo-text">Job Oasis</strong>
                <small class="logo-slogan">Navigating the Job Search Desert</small>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav align-items-center ms-lg-5">
                <li class="nav-item">
                    <a class="nav-link" href="index1.html">Homepage</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about1.html">About Job Oasis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="job-listings1.php">Job Listings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact1.html">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link custom-btn btn" href="profile.php">Profile</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

    <!-- Main content -->
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h2><?php echo $jobTitle; ?></h2>
                    <div class="company-name"><?php echo $companyName; ?></div>
                    <img src="<?php echo $imageURL; ?>" alt="Company Logo" class="img-fluid company-logo">
                    <div class="job-info">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Location:</strong> <?php echo $jobLocation; ?></p>
                            </div>
                            <div class="col-md-6 align-right">
                                <p><strong>Salary:</strong> <?php echo $jobSalary; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Experience:</strong> <?php echo $jobExperience; ?></p>
                            </div>
                            <div class="col-md-6 align-right">
                                <p><strong>Type:</strong> <?php echo $jobType; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p><strong>Description:</strong> <?php echo $jobDescription; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p><strong>Information:</strong> <?php echo $jobInformation; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="apply-now-button">
                    <a href="ApplicationForm.html" class="btn btn-primary btn-lg">Apply Now</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="site-footer">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6 col-12 mb-3">
                        <div class="d-flex align-items-center mb-4">
                            <img src="images/logo.png" class="img-fluid logo-image">

                            <div class="d-flex flex-column">
                                <strong class="logo-text">Job Oasis</strong>
                                <small class="logo-slogan">Navigating the Job Search Desert</small>
                            </div>
                        </div>  

                        <p class="mb-2">
                            <i class="custom-icon bi-globe me-1"></i>

                            <a href="commingsoon.html" class="site-footer-link">
                                www.joboasis.com
                            </a>
                        </p>

                        <p class="mb-2">
                            <i class="custom-icon bi-telephone me-1"></i>

                            <a href="tel: 305-240-9671" class="site-footer-link">
                                **********
                            </a>
                        </p>

                        <p>
                            <i class="custom-icon bi-envelope me-1"></i>

                            <a href="mailto:info@yourgmail.com" class="site-footer-link">
                                info@joboasis.com
                            </a>
                        </p>

                    </div>

                    <div class="col-lg-2 col-md-3 col-6 ms-lg-auto">
                        <h6 class="site-footer-title">Company</h6>

                        <ul class="footer-menu">
                            <li class="footer-menu-item"><a href="commingsoon.html" class="footer-menu-link">About</a></li>

                            <li class="footer-menu-item"><a href="commingsoon.html" class="footer-menu-link">Blog</a></li>

                            <li class="footer-menu-item"><a href="commingsoon.html" class="footer-menu-link">Jobs</a></li>

                            <li class="footer-menu-item"><a href="commingsoon.html" class="footer-menu-link">Contact</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-3 col-6">
                        <h6 class="site-footer-title">Resources</h6>

                        <ul class="footer-menu">
                            <li class="footer-menu-item"><a href="commingsoon.html" class="footer-menu-link">Guide</a></li>

                            <li class="footer-menu-item"><a href="commingsoon.html" class="footer-menu-link">How it works</a></li>

                            <li class="footer-menu-item"><a href="SalaryTool.php" class="footer-menu-link">Salary Tool</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-8 col-12 mt-3 mt-lg-0">
                        <h6 class="site-footer-title">Newsletter</h6>

                        <form class="custom-form newsletter-form" action="#" method="post" role="form">
                            <h6 class="site-footer-title">Get notified jobs news</h6>

                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="bi-person"></i></span>

                                <input type="text" name="newsletter-name" id="newsletter-name" class="form-control" placeholder="yourname@gmail.com" required>

                                <button type="submit" class="form-control">
                                    <i class="bi-send"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <div class="site-footer-bottom">
                <div class="row justify-content-center">

                        <div class="col-lg-4 col-12 d-flex align-items-center">
                            <p class="copyright-text">Copyright © Job Oasis 2023</p>

                            <ul class="footer-menu d-flex">
                                <li class="footer-menu-item"><a href="commingsoon.html" class="footer-menu-link">Privacy Policy</a></li>

                                <li class="footer-menu-item"><a href="commingsoon.html" class="footer-menu-link">Terms</a></li>
                            </ul>
                        </div>

                        <div class="col-lg-5 col-12 mt-2 mt-lg-0">
                            <ul class="social-icon">
                                <li class="social-icon-item">
                                    <a href="commingsoon.html" class="social-icon-link bi-twitter"></a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="commingsoon.html" class="social-icon-link bi-facebook"></a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="commingsoon.html" class="social-icon-link bi-linkedin"></a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="commingsoon.html" class="social-icon-link bi-instagram"></a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="commingsoon.html" class="social-icon-link bi-youtube"></a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-3 col-12 mt-2 d-flex align-items-center mt-lg-0">
                        </div>

                        <a class="back-top-icon bi-arrow-up smoothscroll d-flex justify-content-center align-items-center" href="#top"></a>

                    </div>
                </div>
            </div>
        </footer>


    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/counter.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>


<?php
    } else {
        echo "Job not found.";
    }
} else {
    echo "Job ID not provided.";
}
?>
