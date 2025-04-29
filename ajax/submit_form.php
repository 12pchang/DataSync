<?php
include '../includes/db.php'; // Your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect and sanitize form data
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);

    // Insert data into database
    $sql = "INSERT INTO form_data (first_name, last_name, email, phone) 
            VALUES ('$first_name', '$last_name', '$email', '$phone')";

    if (mysqli_query($conn, $sql)) {
        echo "Form submitted successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
