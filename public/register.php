<!-- Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content shadow-lg rounded">

      <div class="modal-body p-4">
      <form id="registerForm" method="POST">

          <div class="login-container">
          <div class="text-center mb-4">
          <img src="../public/assets/images/logo1.svg" alt="Logo" class="logo" style="width: 80px; ">
            <h2 class="mt-3">Create an Account</h2>
            <p class="text-muted">Register to access the tabulation system</p>
          </div>



          <div class="tab-content" id="registerTabContent">
            <div class="tab-pane fade show active" id="admin-register" role="tabpanel" aria-labelledby="admin-tab">
              <form id="adminRegisterForm">
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="adminFirstName" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="adminFirstName" placeholder="Enter first name" required>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="adminLastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="adminLastName" placeholder="Enter last name" required>
                  </div>
                </div>
                
                <div class="mb-3">
                  <label for="adminEmail" class="form-label">Email</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="email" class="form-control" id="adminEmail" placeholder="Enter your email" required>
                  </div>
                </div>
                
                <div class="mb-3">
                  <label for="adminPhone" class="form-label">Phone Number</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-phone"></i></span>
                    <input type="tel" class="form-control" id="adminPhone" placeholder="Enter phone number">
                  </div>
                </div>
                
                <div class="mb-3">
                  <label for="adminPassword" class="form-label">Password</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" class="form-control" id="adminPassword" placeholder="Create password" required>
                  </div>
                </div>
                
                <div class="mb-3">
                  <label for="adminConfirmPassword" class="form-label">Confirm Password</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                    <input type="password" class="form-control" id="adminConfirmPassword" placeholder="Confirm password" required>
                  </div>
                </div>
                
                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="adminTerms" required>
                  <label class="form-check-label" for="adminTerms">I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a></label>
                </div>

                <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                
                  <p class="text-center small">
            Already have an account?
            <a href="#" class="text-primary text-decoration-none" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#loginModal">Sign In</a>
          </p>
              </form>
            </div>

            <div class="tab-pane fade" id="judge-register" role="tabpanel" aria-labelledby="judge-tab">
              <form id="judgeRegisterForm">
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="judgeFirstName" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="judgeFirstName" placeholder="Enter first name" required>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="judgeLastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="judgeLastName" placeholder="Enter last name" required>
                  </div>
                </div>
                
                <div class="mb-3">
                  <label for="judgeEmail" class="form-label">Email</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="email" class="form-control" id="judgeEmail" placeholder="Enter your email" required>
                  </div>
                </div>
                
                <div class="mb-3">
                  <label for="judgePhone" class="form-label">Phone Number</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-phone"></i></span>
                    <input type="tel" class="form-control" id="judgePhone" placeholder="Enter phone number">
                  </div>
                </div>
                

                <div class="mb-3">
                  <label for="judgePassword" class="form-label">Password</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" class="form-control" id="judgePassword" placeholder="Create password" required>
                  </div>
                </div>
                
                <div class="mb-3">
                  <label for="judgeConfirmPassword" class="form-label">Confirm Password</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                    <input type="password" class="form-control" id="judgeConfirmPassword" placeholder="Confirm password" required>
                  </div>
                </div>
                
                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="judgeTerms" required>
                  <label class="form-check-label" for="judgeTerms">I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a></label>
                </div>

                <button type="submit" class="btn btn-primary w-100">Register as Judge</button>
                
                <div class="text-center mt-3">
                  <span>Already have an account? </span>
                  <a href="login.html" class="login-link">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
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