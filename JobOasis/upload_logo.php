<?php
include_once 'config1.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if a file was uploaded
    if (isset($_FILES['companyLogo']) && $_FILES['companyLogo']['error'] === UPLOAD_ERR_OK) {
        $tmpFilePath = $_FILES['companyLogo']['tmp_name'];
        $fileName = $_FILES['companyLogo']['name'];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        $newFileName = uniqid() . '.' . $fileExtension;
        $uploadPath = 'upload/' . $newFileName;
        
        // Move the uploaded file to the desired location
        if (move_uploaded_file($tmpFilePath, $uploadPath)) {
            // Update the imageURL in the database for the corresponding job listing
            $jobListingId = $_POST['jobListingId'];
            $updateStmt = $mysqli->prepare("UPDATE job_listings SET imageURL = ? WHERE id = ?");
            $updateStmt->bind_param("si", $uploadPath, $jobListingId);
            
            if ($updateStmt->execute()) {
                // Image URL updated successfully
                echo "Image uploaded and imageURL updated successfully.";
            } else {
                // Error occurred while updating imageURL
                echo "Error updating imageURL: " . $updateStmt->error;
            }
            
            $updateStmt->close();
        } else {
            // Error occurred while moving the uploaded file
            echo "Error moving the uploaded file.";
        }
    } else {
        // No file uploaded or error occurred during upload
        echo "No file uploaded or error occurred during upload.";
    }
} else {
    // Invalid request method
    echo "Invalid request method.";
}

$mysqli->close();
?>
