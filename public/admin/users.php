<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Management - User</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../../public/assets/css/users.css">
  <link rel="icon" href="Datasync-removebg-preview.png">
</head>
<body>  
    
<?php include '../../includes/sidebar.php'; ?>
<?php include '../../includes/header.php'; ?>


  <div class="main-content mt-4" id="mainContent">
    <div class="row mb-4 align-items-center">
      <div class="col-md-6 mt-4">
        <h2>User Management</h2>
        <p class="text-muted">Manage system users and permissions</p>
      </div>
      <div class="col-md-6 text-end">
        <button class="btn btn-primary" id="addUserBtn">
          <i class="bi bi-person-plus me-2"></i>Add New User
        </button>
      </div>
    </div>
    <div class="row g-4">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <div class="search-users-container">
                <input type="text" class="form-control" placeholder="Search Users..." id="searchUsers">
              </div>
              <div class="d-flex gap-2">
                <button class="btn btn-light" id="filterUsersBtn">
                  <i class="bi bi-funnel me-2"></i>Filter
                </button>
              </div>
            </div>
            
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Account Created</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody id="usersTableBody">
                </tbody>
              </table>
            </div>
            
            <div class="d-flex justify-content-between align-items-center mt-3">
              <div class="pagination-info">
                Showing 1-5 of 5 users
              </div>
              <nav aria-label="Page navigation">
                <ul class="pagination">
                  <li class="page-item disabled">
                    <a class="page-link" href="#">&lt;</a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item disabled">
                    <a class="page-link" href="#">&gt;</a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="userName" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="userName" placeholder="Enter full name">
            <div class="invalid-feedback">Name cannot contain numbers</div>
          </div>
          <div class="mb-3">
            <label for="userEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="userEmail" placeholder="Enter email address">
            <div class="invalid-feedback">Please enter a valid email address</div>
          </div>
          <div class="mb-3">
            <label for="userRole" class="form-label">Role</label>
            <select class="form-select" id="userRole">
              <option value="">Select role</option>
              <option value="Admin">Admin</option>
              <option value="Judge">Judge</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="userPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="userPassword" placeholder="Enter password">
            <div class="invalid-feedback">Password must be at least 8 characters</div>
          </div>
          <div class="mb-3">
            <label for="userConfirmPassword" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="userConfirmPassword" placeholder="Confirm password">
            <div class="invalid-feedback">Passwords do not match</div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary" id="saveUserBtn">Add User</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="filterUsersModal" tabindex="-1" aria-labelledby="filterUsersModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="filterUsersModalLabel">Filter Users</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="filterRole" class="form-label">Role</label>
            <select class="form-select" id="filterRole">
              <option value="">All Roles</option>
              <option value="Admin">Admin</option>
              <option value="Judge">Judge</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="filterStatus" class="form-label">Status</label>
            <select class="form-select" id="filterStatus">
              <option value="">All Statuses</option>
              <option value="Active">Active</option>
              <option value="Inactive">Inactive</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary" id="applyUserFilterBtn">Apply Filter</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../../public/assets/js/users.js"></script>
</body>
</html>