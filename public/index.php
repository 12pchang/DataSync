<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataSync</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../public/assets/css/landing.css">
    <link rel="icon" href="../public/assets/images/logo1.svg">
    </head>
<body>
<nav class="navbar">
    <div class="brand-container">
        <img src="../public/assets/images/logo1.svg" alt="DataSync" class="logo-icon">
        <span class="logo-text">Data<span class="highlight">Sync</span></span>
    </div>
    <div class="auth-buttons">
    <button class="btn btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#loginModal">Sign In</button>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registerModal">Sign Up</button>
    
    </div>
</nav>

<?php  
session_start();
    include '../includes/db.php'; 
    include '../public/login.php'; 
    require('../includes/auth.php');
    include '../public/register.php'; 

?>

    <section class="landing-section">
        <div class="text">
            <h1><strong>Elevating competitive excellence</strong></h1>
            <p>DataSync brings judges, contestants, and organizers together on one intuitive platform. Real-time scoring. Transparent results. Effortless excellence</p>
        </div>
        <div class="image">
            <img src="../public/assets/images/landing_page.svg" alt="Illustration">
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
