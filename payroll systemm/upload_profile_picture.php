<?php
include('database.php');
session_start();

$employee_id = $_SESSION["employee_id"];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["profile_picture"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["profile_picture"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["profile_picture"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // If everything is ok, try to upload file
        if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
            // Update profile picture path in the database
            $query = "UPDATE employee_accounts SET profile_picture = ? WHERE employee_id = ?";
            $stmt = mysqli_prepare($connect, $query);
            mysqli_stmt_bind_param($stmt, "ss", $target_file, $employee_id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            $_SESSION['profile_picture'] = $target_file;
            header("Location: profile.php");
            exit();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
