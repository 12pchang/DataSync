<?php
// Database connection
$servername = "localhost"; // Change to your database server
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "datasync";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $middle_name = mysqli_real_escape_string($conn, $_POST['middle_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $alias = mysqli_real_escape_string($conn, $_POST['alias']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    // Check if the email already exists
    $check_email_sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($check_email_sql);

    if ($result->num_rows > 0) {
        // Email already exists, display error message
        echo "Error: Email is already registered.";
    } else {
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare SQL query to insert data
        $sql = "INSERT INTO users (full_name, alias, email, password, is_verified, role) 
                VALUES ('$first_name $middle_name $last_name', '$alias', '$email', '$hashed_password', 0, 'pending')";
        
        if ($conn->query($sql) === TRUE) {
            // If the data is inserted successfully, you can redirect or give a success message
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- SweetAlert2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.2/dist/sweetalert2.min.css" rel="stylesheet">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.2/dist/sweetalert2.min.js"></script>

</head>
<body>
  
<!-- Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content shadow-lg rounded">

      <div class="modal-body p-4">

        <!-- Logo -->
        <div class="text-center mb-4">
          <div class="card mx-auto rounded-4 shadow-sm" style="width: 80px; height: 80px; display: flex; align-items: center; justify-content: center;">
            <img src="../public/assets/images/logo1.svg" alt="Logo" style="width: 50px; height: 50px;">
          </div>
        </div>
        
        <h5 class="modal-title text-center mb-4" id="registerModalLabel">Sign Up</h5>

        <form id="registerForm" method="POST">

          <!-- Full Name -->
          <div class="row mb-3">
            <div class="col-5">
              <label class="form-label">First Name</label>
              <input type="text" class="form-control form-control-lg" name="first_name" required>
            </div>
            <div class="col-2">
              <label class="form-label">M.I.</label>
              <input type="text" class="form-control form-control-lg" name="middle_name">
            </div>
            <div class="col-5">
              <label class="form-label">Last Name</label>
              <input type="text" class="form-control form-control-lg" name="last_name" required>
            </div>
          </div>

          <!-- Alias -->
          <div class="mb-3">
            <label class="form-label">Alias / Nickname</label>
            <input type="text" class="form-control form-control-lg" name="alias" required>
          </div>

          <!-- Email -->
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control form-control-lg" name="email" required>
          </div>

          <!-- Password -->
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control form-control-lg" name="password" required>
          </div>

          <!-- Register Button -->
          <button type="submit" class="btn btn-success w-100 btn-lg mb-3">Sign Up</button>

          <!-- Terms and Privacy -->
          <p class="text-center small mb-1">
          By signing up to create an account, I accept the
          <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#termsModal">Terms of Use</a> and
          <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#privacyModal">Privacy Policy</a>.
         </p>


          <!-- Already have an account -->
          <p class="text-center small">
            Already have an account?
            <a href="#" class="text-primary text-decoration-none" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#loginModal">Sign In</a>
          </p>

        </form>
      </div>
    </div>
  </div>
</div>

<!-- Terms of Use Modal -->
<div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content p-4">
      <div class="modal-header">
        <h5 class="modal-title" id="termsModalLabel">Terms of Use</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
  data-bs-toggle="modal" data-bs-target="#registerModal"></button>
      </div>
      <div class="modal-body" style="max-height: 60vh; overflow-y: auto;">
        <p><strong>Effective Date:</strong> April 16, 2025</p>

        <p>Welcome to our Event Tabulation System. By accessing or using our system, you agree to be bound by the following terms and conditions. Please read them carefully before registering or using the platform.</p>

        <h6>1. Account Creation</h6>
        <p>Users must provide accurate and complete information during registration. Accounts are subject to admin approval and can be denied or revoked if necessary.</p>

        <h6>2. System Usage</h6>
        <p>The system is intended solely for event management and scoring. Any misuse, including manipulation of scores, unauthorized access, or malicious activity, is strictly prohibited.</p>

        <h6>3. User Responsibilities</h6>
        <p>You are responsible for maintaining the confidentiality of your login credentials and agree to notify us immediately of any unauthorized access to your account.</p>

        <h6>4. Intellectual Property</h6>
        <p>All content, designs, and system features remain the intellectual property of the developers and are protected by copyright laws.</p>

        <h6>5. Limitation of Liability</h6>
        <p>We are not liable for any losses or damages arising from your use of the system. The platform is provided "as-is" without warranties of any kind.</p>

        <h6>6. Changes to Terms</h6>
        <p>We reserve the right to update or modify these terms at any time. Continued use of the system after changes indicates acceptance of the new terms.</p>
      </div>
    </div>
  </div>
</div>

<!-- Privacy Policy Modal -->
<div class="modal fade" id="privacyModal" tabindex="-1" aria-labelledby="privacyModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content p-4">
      <div class="modal-header">
        <h5 class="modal-title" id="privacyModalLabel">Privacy Policy</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="modal" data-bs-target="#registerModal"></button>
      </div>
      <div class="modal-body" style="max-height: 60vh; overflow-y: auto;">
      <p><strong>Effective Date:</strong> <?php echo date("F j, Y"); ?></p>

        <p>This Privacy Policy describes how we collect, use, and protect your personal data in the Event Tabulation System.</p>

        <h6>1. Information We Collect</h6>
        <ul>
          <li>Full Name, Alias/Nickname</li>
          <li>Email Address</li>
          <li>Account Credentials</li>
          <li>Scores and judging inputs (if you're a judge)</li>
        </ul>

        <h6>2. How We Use Your Information</h6>
        <p>We use your data to manage accounts, facilitate scoring, generate reports, and improve system features.</p>

        <h6>3. Data Storage and Security</h6>
        <p>Your information is stored securely and protected using best practices. Only authorized personnel can access sensitive data.</p>

        <h6>4. Sharing of Information</h6>
        <p>We do not sell or share your personal information with third parties, except when required by law or necessary for system operations.</p>

        <h6>5. Your Rights</h6>
        <p>You may request to view, update, or delete your personal data at any time by contacting the system administrator.</p>

        <h6>6. Changes to this Policy</h6>
        <p>This policy may be updated periodically. We encourage users to review it regularly for any changes.</p>
      </div>
    </div>
  </div>
</div>

</body>
</html>

