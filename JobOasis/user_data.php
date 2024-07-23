<?php
session_start();
require 'config.php';

if ($_SESSION["login"] && isset($_SESSION["id"])) {
    $userId = $_SESSION["id"];

    $sql = "SELECT name, username, email FROM user WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->bind_result($name, $username, $email);
    $stmt->fetch();
    $stmt->close();

    $userData = array(
        "name" => $name,
        "username" => $username,
        "email" => $email
    );

    header('Content-Type: application/json');
    echo json_encode($userData);
} else {
    header("Location: login.php");
    exit();
}
?>


