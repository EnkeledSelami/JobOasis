<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Job Oasis Listings</title>
    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/owl.carousel.min.css" rel="stylesheet">
    <link href="css/owl.theme.default.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        .job-thumb {
            background-color: #f9f9f9;
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 10px;
            border: 1px solid #ddd; /* Add border */
        }

        .job-thumb img.company-logo {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
            max-height: 100px; /* Adjust as needed */
        }

        .job-description {
            margin-top: 20px;
            color: #777;
        }

        .detail-title {
            color: #000;
            font-weight: bold;
        }

        .form-control {
            border-radius: 0;
            padding: 15px;
            margin-bottom: 20px;
            font-size: 16px;
            border: 1px solid #ddd; /* Add border */
        }

        .custom-icon {
            color: #888;
        }

        .job-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .details-btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-transform: uppercase;
            font-weight: bold;
            cursor: pointer;
        }

        .apply-btn {
            background-color: #fd7e14;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-transform: uppercase;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>
<body class="job-listings-page" id="top">

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

<main>
    <header class="site-header">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 text-center">
                    <h1 class="text-white">Job Listings</h1>
                </div>
            </div>
        </div>
    </header>
    <section class="section-padding pb-0 d-flex justify-content-center align-items-center">
        <div class="container">
            <form class="custom-form hero-form" action="" method="get" role="form">
                <h3 class="text-white mb-3">Search Your Dream Job</h3>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="bi-person custom-icon"></i></span>
                            <input type="text" name="company" class="form-control" placeholder="Company Name">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="bi-geo-alt custom-icon"></i></span>                           
                            <input type="text" name="jobLocation" class="form-control" placeholder="Location">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
    <div class="input-group">
        <span class="input-group-text" id="basic-addon1"><i class="bi-cash custom-icon"></i></span>
        <input type="text" name="salaryFrom" class="form-control" placeholder="Salary From" oninput="formatSalaryInput(this)">
    </div>
</div>
<div class="col-lg-3 col-md-6 col-12">
    <div class="input-group">
        <span class="input-group-text" id="basic-addon1"><i class="bi-cash custom-icon"></i></span>
        <input type="text" name="salaryTo" class="form-control" placeholder="Salary To" oninput="formatSalaryInput(this)">
    </div>
</div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="bi-laptop custom-icon"></i></span>
                            <select class="form-select form-control" name="jobType" aria-label="Job Type">
                                <option value="">Select Job Type</option>
                                <option value="full-time">Full Time</option>
                                <option value="part-time">Part Time</option>
                                <option value="remote">Remote</option>
                                <option value="internship">Internship</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="bi-laptop custom-icon"></i></span>
                            <select class="form-select form-control" name="jobExperience" aria-label="Experience">
                                <option value="">Select Experience</option>
                                <option value="entry-level">Entry Level</option>
                                <option value="junior-level">Junior Level</option>
                                <option value="senior-level">Senior Level</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12 col-12">
                        <button type="submit" class="form-control">Search Job</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <section class="job-section section-padding">
        <div class="container">
            <div class="row align-items-center">
                <?php
                $mysqli = new mysqli("localhost", "root", "", "jobform");
                if ($mysqli->connect_error) {
                    die("Connection failed: " . $mysqli->connect_error);
                }
                $sql = "SELECT * FROM job_listings WHERE 1=1";
                if (!empty($_GET['jobLocation'])) {
                    $jobLocation = $_GET['jobLocation'];
                    $sql .= " AND jobLocation LIKE '%$jobLocation%'";
                }
                if (!empty($_GET['company'])) {
                    $company = $_GET['company'];
                    $sql .= " AND companyName LIKE '%$company%'";
                }
                if (!empty($_GET['jobType'])) {
                    $jobType = $_GET['jobType'];
                    $sql .= " AND jobType = '$jobType'";
                }
                if (!empty($_GET['jobExperience'])) {
                    $jobExperience = $_GET['jobExperience'];
                    $sql .= " AND jobExperience = '$jobExperience'";
                }
                if (!empty($_GET['salaryFrom'])) {
                    $salaryFrom = str_replace(',', '', $_GET['salaryFrom']);        // Remove commas
                    $sql .= " AND CAST(REPLACE(jobSalary, ',', '') AS UNSIGNED) >= $salaryFrom"; // Convert to unsigned integer
                }
                if (!empty($_GET['salaryTo'])) {
                    $salaryTo = str_replace(',', '', $_GET['salaryTo']);
                    $sql .= " AND CAST(REPLACE(jobSalary, ',', '') AS UNSIGNED) <= $salaryTo"; // Convert to unsigned integer
                }
                $result = $mysqli->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="col-lg-4 col-md-6 col-12">';
                        echo '<div class="job-thumb job-thumb-box">';
                        echo '<h4 class="job-title">' . $row["jobTitle"] . '</h4>';
                        echo '<p class="detail-title job-location">Location: ' . $row["jobLocation"] . '</p>';
                        echo '<p class="detail-title job-salary">Salary: ' . $row["jobSalary"] . '</p>';
                        echo '<p class="detail-title job-type">Type: ' . $row["jobType"] . '</p>';
                        echo '<p class="detail-title job-experience">Experience: ' . $row["jobExperience"] . '</p>';
                        echo '<p class="detail-title company-name">Company Name: ' . $row["companyName"] . '</p>';
                        echo '<img src="' . $row["imageURL"] . '" alt="Company Logo" class="company-logo">';
                        echo '<p class="detail-title job-description">' . $row["jobDescription"] . '</p>';
                        echo '<div class="job-buttons">';
                        echo '<a href="job-details.php?job_id=' . $row["id"] . '" class="details-btn">Details</a>';
                        echo '<a href="ApplicationForm.html" class="apply-btn">Apply Now</a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No job listings found.</p>';
                }
                $mysqli->close();
                ?>
            </div>
        </div>
    </section>
</main>
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

                            <li class="footer-menu-item"><a href="job-listings1.php" class="footer-menu-link">Jobs</a></li>

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
                <div class="container">
                    <div class="row">

                        <div class="col-lg-4 col-12 d-flex align-items-center">
                            <p class="copyright-text">Copyright � Job Oasis 2023</p>

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