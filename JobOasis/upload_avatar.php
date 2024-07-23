<?php
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION["id"];
    $avatar = $_FILES["avatar"];

    // Check if a file was uploaded
    if ($avatar['error'] === UPLOAD_ERR_OK) {
        $avatarName = $avatar['name'];
        $avatarTmpName = $avatar['tmp_name'];
        $avatarPath = 'images/profile avatars/' . $avatarName;

        // Move the uploaded file to the desired directory
        if (move_uploaded_file($avatarTmpName, $avatarPath)) {
            // Update the avatar path in the database
            $query = "UPDATE user SET avatar = '$avatarPath' WHERE id = $userId";
            if ($mysqli->query($query)) {
                // Redirect back to the profile page
                header("Location: profile.php");
                exit();
            } else {
                echo "Failed to update the avatar: " . $mysqli->error;
            }
        } else {
            echo "Failed to upload the avatar.";
        }
    } else {
        echo "Error uploading the avatar: " . $avatar['error'];
    }
}
?>

