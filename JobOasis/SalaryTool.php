<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Salary Toolkit</title>
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
        body {
            font-family: 'League Spartan', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }
        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        #result {
            margin-top: 20px;
        }

        #salary {
            font-weight: bold;
        }
        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        #result p {
            color: #2E8B57; /* Change the color of result fonts */
        }
        #salary {
            font-size: 28px;
            font-weight: bold;
        }
        .chat-container {
            width: 400px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .chat-header {
            background-color: #4CAF50;
            color: #ffffff;
            padding: 15px;
            font-weight: bold;
            text-align: center;
            border-bottom: 1px solid #dddddd;
        }

        .chat-messages {
            padding: 15px;
            height: 250px;
            overflow-y: auto;
        }

        .chat-message {
            margin-bottom: 10px;
        }

        .user-message {
            background-color: #e6f7ff;
            padding: 8px 10px;
            border-radius: 10px;
            text-align: right;
            max-width: 70%;
            align-self: flex-end;
        }

        .bot-message {
            background-color: #f2f2f2;
            padding: 8px 10px;
            border-radius: 10px;
            text-align: left;
            max-width: 70%;
            align-self: flex-start;
        }

        .chat-input-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            border-top: 1px solid #dddddd;
        }

        .chat-input {
            flex: 1;
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-right: 10px;
        }

        .chat-submit {
            background-color: #4CAF50;
            color: #ffffff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .chat-submit:hover {
            background-color: #45a049;
        }

    </style>

    </head>
<body class="salary-toolkit-page" id="top">

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

    <!-- Salary Recommendation Section -->
     <section id="salary-recommendation" class="section">
     <div class="container">
        <h2 class="section-title">Salary Recommendation</h2>
        <p style="color: #333;">💰 Get Personalized Salary Recommendations Tailored Just for You! 💼</p>
        <p style="color: #333;">Unlock insights into your earning potential based on your profession, experience level, location, education, and more. Our advanced algorithms analyze market data to provide you with personalized salary recommendations to guide your career decisions.</p>
        <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form method="POST" action="">
            <label for="job">Profession:</label>
            <input type="text" id="job" name="job" placeholder="Enter your profession"><br>

            <label for="experience">Experience Level:</label>
            <select id="experience" name="experience">
                <option value="entry-level">Entry Level</option>
                <option value="junior-level">Junior Level</option>
                <option value="senior-level">Senior Level</option>
            </select><br>

            <label for="location">Location:</label>
            <input type="text" id="location" name="location" placeholder="Enter your location"><br>

            <label for="education">Education Level:</label>
            <select id="education" name="education">
                <option value="high-school">High School</option>
                <option value="associate-degree">Associate Degree</option>
                <option value="bachelors-degree">Bachelor's Degree</option>
                <option value="masters-degree">Master's Degree</option>
                <option value="phd">PhD</option>
            </select><br>

            <label for="industry">Industry:</label>
            <input type="text" id="industry" name="industry" placeholder="Enter your industry"><br>

            <label for="certifications">Certifications:</label>
            <input type="text" id="certifications" name="certifications" placeholder="Enter your certifications"><br>

            <label for="years">Years of Experience:</label>
            <input type="number" id="years" name="years" min="0" placeholder="Enter years of experience"><br>

            <button type="submit">Get Salary Recommendation</button>
        </form>
                    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Fetch input values
            $skills = $_POST["job"];
            $experience = $_POST["experience"];
            $location = $_POST["location"];
            $education = $_POST["education"];
            $industry = $_POST["industry"];
            $certifications = $_POST["certifications"];
            $years = $_POST["years"];

            // Perform some processing here, such as querying a database or calling an API to get personalized salary recommendation
            // For demonstration purposes, we'll just generate a random salary recommendation
            $minSalary = 50000;
            $maxSalary = 150000;
            $recommendedSalary = rand($minSalary, $maxSalary);

            // Display the recommended salary
            echo '<div id="result">';
            echo "<p>Your personalized salary recommendation for $skills in $location with $experience experience level, $education education level, working in the $industry industry, with certifications in $certifications, and $years years of experience is:</p>";
            echo "<p id='salary'>$" . number_format($recommendedSalary) . " per year</p>";
            echo '</div>';
        }
        ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Salary Visualisation Section -->
     <section id="salary-visualization" class="section">
    <div class="container">
        <h2 class="section-title">Salary Visualization</h2>
        <p style="color: #333;">📊 Explore Salary Trends with our Interactive Visualizations 📈</p>
        <p style="color: #333;">Discover valuable insights into salary trends across various industries and job roles with our interactive visualizations. Gain a deeper understanding of market dynamics and make informed decisions about your career.</p>
        <div class="row">
                <div class="col-md-8 offset-md-2">
                    <canvas id="salaryChart" width="800" height="400"></canvas>
                </div>
            </div>
        </div>
    </section>

    <!-- Career Adviser Section -->
     <section class="section">
    <div class="container">
        <h2 class="section-title">Career Adviser</h2>
        <p style="color: #333;">🌟 Meet Vocatio: Your Career Adviser Bot 🌟</p>
        <p style="color: #333;">Welcome to JobOasis's Career Adviser powered by Vocatio! 🚀</p>
        <p style="color: #333;">Vocatio is your dedicated companion on the journey to your dream career. With its wealth of knowledge and expert guidance, Vocatio is here to help you navigate the complexities of the job market, discover exciting career opportunities, and develop the skills you need to succeed. 💼✨</p>
        <p style="color: #333;">Ask Vocatio anything related to careers, job search strategies, resume building, interview tips, or professional development, and let its insightful advice propel you towards your professional goals.</p>
        <p style="color: #333;">Embark on this transformative journey with Vocatio today! 💪</p>
        <div id="career-adviser" class="content" style="display: flex; justify-content: center;">
            <div class="chat-container">
                <div class="chat-header">Vocatio</div>
                <div class="chat-messages" id="chat-messages"></div>
                <div class="chat-input-container">
                    <input type="text" class="chat-input" id="user-input" placeholder="Type your message...">
                    <button class="chat-submit" onclick="sendMessage()">Send</button>
                </div>
            </div>
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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Dummy salary data (replace this with your actual data)
    const salaries = {
        "Software Engineer": 100000,
        "Data Analyst": 80000,
        "Product Manager": 120000,
        "UX Designer": 90000,
        "Marketing Manager": 95000
    };

    // Get the canvas element
    const ctx = document.getElementById('salaryChart').getContext('2d');

    // Create the chart
    const salaryChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: Object.keys(salaries),
            datasets: [{
                label: 'Average Salary',
                data: Object.values(salaries),
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<script>
    // JavaScript Code
    let isFirstMessage = true;

    function appendMessage(message, role) {
        const chatMessages = document.getElementById('chat-messages');
        const messageElement = document.createElement('div');
        messageElement.classList.add('chat-message', role + '-message');
        messageElement.innerHTML = message;
        chatMessages.appendChild(messageElement);
        chatMessages.scrollTop = chatMessages.scrollHeight;

        // Show welcome message after the first user message
        if (isFirstMessage && role === 'user') {
            appendMessage("🤖 Welcome to Vocatio! 🌟<br>Greetings! I'm Vocatio, your personal career adviser bot. 🚀<br>Please note that I'm currently in development, so consider this encounter a test run. Together, we'll explore your career aspirations and chart a path toward your professional goals. 💼✨<br>Feel free to ask me anything related to careers, job search tips, or professional development. Let's embark on this journey together!<br>Just type 'start' whenever you're ready to begin. 🌟", 'bot');
            isFirstMessage = false;
        }
    }

    function sendMessage() {
        const userInput = document.getElementById('user-input').value;
        appendMessage(userInput, 'user');
        document.getElementById('user-input').value = '';

        // Example: Send user message to server for processing
        // You can replace this with your own logic
        // fetch('/process-user-message', {
        //     method: 'POST',
        //     body: JSON.stringify({ message: userInput }),
        //     headers: {
        //         'Content-Type': 'application/json'
        //     }
        // })
        // .then(response => response.json())
        // .then(data => {
        //     appendMessage(data.botResponse, 'bot');
        // })
        // .catch(error => console.error('Error:', error));
    }
</script>

</body>
</html>
