<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION["login"]) || $_SESSION["login"] !== true) {
    header("Location: login.php");
    exit();
}

// Check if a specific section is requested
$section = isset($_GET['section']) ? $_GET['section'] : '';

// Database connection for job listings
$mysqli_job = new mysqli("localhost", "root", "", "jobform");
if ($mysqli_job->connect_error) {
    die("Connection failed: " . $mysqli_job->connect_error);
}

// Update job details
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $id = $_POST["id"];
    $jobTitle = $_POST["jobTitle"];
    $jobLocation = $_POST["jobLocation"];
    $jobSalary = $_POST["jobSalary"];
    $jobExperience = $_POST["jobExperience"];
    $jobType = $_POST["jobType"];
    $companyName = $_POST["companyName"];
    $jobDescription = $_POST["jobDescription"];

    $sql = "UPDATE job_listings SET jobTitle='$jobTitle', jobLocation='$jobLocation', jobSalary='$jobSalary', jobExperience='$jobExperience', jobType='$jobType', companyName='$companyName', jobDescription='$jobDescription' WHERE id=$id";

    if ($mysqli_job->query($sql) === true) {
        // Redirect to same page after update
        header("Location: {$_SERVER['PHP_SELF']}?section=jobs");
        exit();
    } else {
        echo "Error updating record: " . $mysqli_job->error;
    }
}

// Delete job
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    $id = $_POST["id"];

    // Display confirmation message before deleting
    echo '<script>
        var confirmDelete = confirm("Do you want to Delete this Job?");
        if (confirmDelete) {
            // Delete job only if user confirms
            document.getElementById("deleteForm_' . $id . '").submit();
        }
    </script>';

    // Prevent further execution of PHP code
    exit();
}

// Pagination for job listings
$pageNumber_job = isset($_GET['page_job']) ? $_GET['page_job'] : 1;
$recordsPerPage_job = 10;
$offset_job = ($pageNumber_job - 1) * $recordsPerPage_job;

$sqlCount_job = "SELECT COUNT(*) AS count FROM job_listings";
$resultCount_job = $mysqli_job->query($sqlCount_job);
$count_job = $resultCount_job->fetch_assoc()["count"];

$totalPages_job = ceil($count_job / $recordsPerPage_job);

// Sorting for job listings
$sort_column_job = isset($_GET['sort_job']) ? $_GET['sort_job'] : 'id';
$sort_order_job = isset($_GET['order_job']) ? $_GET['order_job'] : 'ASC';

// Define allowed sortable columns
$sortable_columns_job = ['id', 'jobTitle', 'jobLocation', 'jobSalary', 'jobExperience', 'jobType', 'companyName'];

// Validate sort column
if (!in_array($sort_column_job, $sortable_columns_job)) {
    $sort_column_job = 'id'; // Default to ID if column not allowed
}

// Fetch job listings
$sqlListings_job = "SELECT * FROM job_listings ORDER BY ";

// Handle salary column separately for proper sorting
if ($sort_column_job === 'jobSalary') {
    $sqlListings_job .= "CAST(REPLACE(jobSalary, ',', '') AS DECIMAL) $sort_order_job";
} else {
    $sqlListings_job .= "$sort_column_job $sort_order_job";
}

$sqlListings_job .= " LIMIT $offset_job, $recordsPerPage_job";

$resultListings_job = $mysqli_job->query($sqlListings_job);

// Database connection for users
include_once 'config.php';
$mysqli_user = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($mysqli_user->connect_error) {
    die("Connection failed: " . $mysqli_user->connect_error);
}

// Update user details
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_user"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];

    // Placeholder for updating user details
    $sqlUpdateUser = "UPDATE user SET name='$name', username='$username', email='$email' WHERE id=$id";

    if ($mysqli_user->query($sqlUpdateUser) === true) {
        // Redirect to same page after update
        header("Location: {$_SERVER['PHP_SELF']}?section=users");
        exit();
    } else {
        echo "Error updating record: " . $mysqli_user->error;
    }
}

// Delete user
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_user"])) {
    // Placeholder for deleting user
}

// Pagination for users
$pageNumber_user = isset($_GET['page_user']) ? $_GET['page_user'] : 1;
$recordsPerPage_user = 10;
$offset_user = ($pageNumber_user - 1) * $recordsPerPage_user;

$sqlUserCount = "SELECT COUNT(*) AS count FROM user WHERE role='user'";
$resultUserCount = $mysqli_user->query($sqlUserCount);
$userCount = $resultUserCount->fetch_assoc()["count"];

$totalPages_user = ceil($userCount / $recordsPerPage_user);

// Sorting for users
$sort_column_user = isset($_GET['sort_user']) ? $_GET['sort_user'] : 'id';
$sort_order_user = isset($_GET['order_user']) ? $_GET['order_user'] : 'ASC';

$sqlUsers = "SELECT * FROM user WHERE role='user' ORDER BY $sort_column_user $sort_order_user LIMIT $offset_user, $recordsPerPage_user";
$resultUsers = $mysqli_user->query($sqlUsers);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to JobOasis Admin</title>
    <style>
        /* Styles for Navigation bar */
        nav {
            background-color: #333;
            padding: 10px 0;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        /* Styles for Dashboard section */
        #dashboard {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Styles for Job listings management section */
        #joblistings, #users {
            padding: 20px;
            background-color: #f9f9f9;
            margin-top: 20px;
        }

        #addButton {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 20px;
        }

        #addButton:hover {
            background-color: #0056b3;
        }

        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
            cursor: pointer;
        }

        th:hover {
            background-color: #ddd;
        }

        /* Button styles */
        button {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            padding: 5px 10px;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Pagination styles */
        .pagination {
            margin-top: 20px;
            text-align: center;
        }

        .pagination a {
            color: #007bff;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color .3s;
            border: 1px solid #ddd;
            margin: 0 4px;
        }

        .pagination a.active {
            background-color: #007bff;
            color: white;
        }

        .pagination a:hover:not(.active) {background-color: #ddd;}
    </style>
</head>
<body>
    <!-- Navigation bar -->
    <nav>
        <ul>
            <li><a href="welcome1.php?section=users">Users</a></li>
            <li><a href="welcome1.php?section=jobs">Jobs</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <!-- Dashboard section -->
    <section id="dashboard">
        <h2>Dashboard</h2>
        <?php if ($section === 'jobs') : ?>
            <p>Number of Job Listings: <?php echo $count_job; ?></p>
        <?php elseif ($section === 'users') : ?>
            <p>Number of Users: <?php echo $userCount; ?></p>
        <?php endif; ?>
    </section>

    <!-- Job listings management section -->
    <?php if ($section === 'jobs') : ?>
        <section id="joblistings">
            <button id="addButton" onclick="window.location.href='JobListingsForm.php';">Add Job</button>
            <table>
                <thead>
                    <tr>
                        <th><a href="?section=jobs&sort_job=id&order_job=<?php echo ($sort_column_job === 'id' && $sort_order_job === 'ASC') ? 'DESC' : 'ASC'; ?>">ID</a></th>
                        <th><a href="?section=jobs&sort_job=jobTitle&order_job=<?php echo ($sort_column_job === 'jobTitle' && $sort_order_job === 'ASC') ? 'DESC' : 'ASC'; ?>">Title</a></th>
                        <th><a href="?section=jobs&sort_job=jobLocation&order_job=<?php echo ($sort_column_job === 'jobLocation' && $sort_order_job === 'ASC') ? 'DESC' : 'ASC'; ?>">Location</a></th>
                        <th><a href="?section=jobs&sort_job=jobSalary&order_job=<?php echo ($sort_column_job === 'jobSalary' && $sort_order_job === 'ASC') ? 'DESC' : 'ASC'; ?>">Salary</a></th>
                        <th><a href="?section=jobs&sort_job=jobExperience&order_job=<?php echo ($sort_column_job === 'jobExperience' && $sort_order_job === 'ASC') ? 'DESC' : 'ASC'; ?>">Experience</a></th>
                        <th><a href="?section=jobs&sort_job=jobType&order_job=<?php echo ($sort_column_job === 'jobType' && $sort_order_job === 'ASC') ? 'DESC' : 'ASC'; ?>">Type</a></th>
                        <th><a href="?section=jobs&sort_job=companyName&order_job=<?php echo ($sort_column_job === 'companyName' && $sort_order_job === 'ASC') ? 'DESC' : 'ASC'; ?>">Company Name</a></th>
                        <th><a href="?section=jobs&sort_job=jobDescription&order_job=<?php echo ($sort_column_job === 'jobDescription' && $sort_order_job === 'ASC') ? 'DESC' : 'ASC'; ?>">Description</a></th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $resultListings_job->fetch_assoc()) : ?>
                        <tr>
                            <form id="deleteForm_<?php echo $row['id']; ?>" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <td><?php echo $row["id"]; ?></td>
                                <td><input type="text" name="jobTitle" value="<?php echo $row["jobTitle"]; ?>"></td>
                                <td><input type="text" name="jobLocation" value="<?php echo $row["jobLocation"]; ?>"></td>
                                <td><input type="text" name="jobSalary" value="<?php echo $row["jobSalary"]; ?>"></td>
                                <td><input type="text" name="jobExperience" value="<?php echo $row["jobExperience"]; ?>"></td>
                                <td><input type="text" name="jobType" value="<?php echo $row["jobType"]; ?>"></td>
                                <td><input type="text" name="companyName" value="<?php echo $row["companyName"]; ?>"></td>
                                <td><input type="text" name="jobDescription" value="<?php echo $row["jobDescription"]; ?>"></td>
                                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                <td>
                                    <button type="submit" name="submit" onclick="return confirm('Are you sure you want to update this job?')">Update</button>
                                    <button type="submit" name="delete" onclick="event.preventDefault();">Delete</button>
                                </td>
                            </form>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <!-- Pagination for jobs -->
            <div class="pagination">
                <?php for ($i = 1; $i <= $totalPages_job; $i++) : ?>
                    <a href="welcome1.php?section=jobs&page_job=<?php echo $i; ?>" <?php if ($pageNumber_job == $i) echo 'class="active"'; ?>><?php echo $i; ?></a>
                <?php endfor; ?>
            </div>
        </section>
    <?php elseif ($section === 'users') : ?>
        <!-- Users management section -->
        <section id="users">
            <h2>Users Management</h2>
            <table>
                <thead>
                    <tr>
                        <th><a href="?section=users&sort_user=id&order_user=<?php echo ($sort_column_user === 'id' && $sort_order_user === 'ASC') ? 'DESC' : 'ASC'; ?>">ID</a></th>
                        <th><a href="?section=users&sort_user=name&order_user=<?php echo ($sort_column_user === 'name' && $sort_order_user === 'ASC') ? 'DESC' : 'ASC'; ?>">Name</a></th>
                        <th><a href="?section=users&sort_user=username&order_user=<?php echo ($sort_column_user === 'username' && $sort_order_user === 'ASC') ? 'DESC' : 'ASC'; ?>">Username</a></th>
                        <th><a href="?section=users&sort_user=email&order_user=<?php echo ($sort_column_user === 'email' && $sort_order_user === 'ASC') ? 'DESC' : 'ASC'; ?>">Email</a></th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $resultUsers->fetch_assoc()) : ?>
                        <tr>
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <td><?php echo $row["id"]; ?></td>
                                <td><input type="text" name="name" value="<?php echo $row["name"]; ?>"></td>
                                <td><input type="text" name="username" value="<?php echo $row["username"]; ?>"></td>
                                <td><input type="text" name="email" value="<?php echo $row["email"]; ?>"></td>
                                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                <td>
                                    <button type="submit" name="submit_user">Update</button>
                                    <button type="submit" name="delete_user" onclick="event.preventDefault();">Remove</button>
                                </td>
                            </form>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <!-- Pagination for users -->
            <div class="pagination">
                <?php for ($i = 1; $i <= $totalPages_user; $i++) : ?>
                    <a href="welcome1.php?section=users&page_user=<?php echo $i; ?>" <?php if ($pageNumber_user == $i) echo 'class="active"'; ?>><?php echo $i; ?></a>
                <?php endfor; ?>
            </div>
        </section>
    <?php endif; ?>

</body>
</html>

<?php
// Close database connections
$mysqli_job->close();
$mysqli_user->close();
?>
