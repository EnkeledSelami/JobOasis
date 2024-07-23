<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'reglog';

$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($mysqli->connect_errno) {
    printf("Connection failed: %s", $mysqli->connect_error);
    exit();
}

$mysqli->set_charset("utf8mb4");
?>
