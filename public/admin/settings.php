<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Settings - DataSync</title>
  <link rel="stylesheet" href="../../public/assets/libs/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../../public/assets/css/settings.css">
  <link rel="icon" href="../../public/assets/images/logo1.svg">

</head>
<body>
  <div class="app-container">
  <?php include '../../includes/sidebar.php'; ?>
<?php include '../../includes/header.php'; ?>

  
    <div class="main-content">
      <div class="content-wrapper">

        <div class="content-header mt-4">
          <div>
            <h1 class="page-title">Settings</h1>
            <p class="page-subtitle">Manage your account, system preferences, and tabulation rules</p>
          </div>
          
        </div>

        <div class="row">
          <div class="col-md-3 mb-4">
            <div class="settings-nav">
              <a href="#account-settings" class="settings-nav-item active">
                <i class="bi bi-person-circle"></i>
                <span>Account Settings</span>
              </a>
              <a href="#system-preferences" class="settings-nav-item">
                <i class="bi bi-sliders"></i>
                <span>System Preferences</span>
              </a>
              <a href="#tabulation-settings" class="settings-nav-item">
                <i class="bi bi-calculator"></i>
                <span>Tabulation Settings</span>
              </a>
              <a href="#permissions" class="settings-nav-item">
                <i class="bi bi-shield-lock"></i>
                <span>Permissions</span>
              </a>
              <a href="#danger-zone" class="settings-nav-item danger">
                <i class="bi bi-exclamation-triangle"></i>
                <span>Danger Zone</span>
              </a>
            </div>
          </div>

          <div class="col-md-9">

            <div class="settings-section" id="account-settings">
              <h2 class="settings-section-title">Account Settings</h2>
              <div class="settings-card">
                <div class="row mb-3">
                  <div class="col-md-3">
                    <label class="form-label">Admin Name</label>
                  </div>
                  <div class="col-md-9">
                    <input type="text" class="form-control" value="John Smith">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-3">
                    <label class="form-label">Email</label>
                  </div>
                  <div class="col-md-9">
                    <input type="email" class="form-control" value="john@example.com">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-3">
                    <label class="form-label">Role</label>
                  </div>
                  <div class="col-md-9">
                    <input type="text" class="form-control" value="Administrator" readonly>
                  </div>
                </div>
                <div class="d-flex justify-content-end">
                  <button class="btn btn-outline-secondary me-2">Cancel</button>
                  <button class="btn btn-primary">Save Changes</button>
                </div>
              </div>

              <h3 class="settings-subsection-title mt-4">Security</h3>
              <div class="settings-card">
                <a href="#" class="change-password-link">
                  <i class="bi bi-key"></i> Change Password
                </a>
              </div>
            </div>

            <div class="settings-section" id="system-preferences">
              <h2 class="settings-section-title">System Preferences</h2>
              <div class="settings-card">
                <div class="row mb-3 align-items-center">
                  <div class="col-md-3">
                    <label class="form-label">Theme Mode</label>
                  </div>
                  <div class="col-md-9">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="themeSwitch">
                      <label class="form-check-label" for="themeSwitch"></label>
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-3">
                    <label class="form-label">Default Sorting</label>
                  </div>
                  <div class="col-md-9">
                    <select class="form-select">
                      <option>Average Score</option>
                      <option>Name (A-Z)</option>
                      <option>Name (Z-A)</option>
                      <option>Highest Score</option>
                      <option>Lowest Score</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-3">
                    <label class="form-label">Notifications</label>
                  </div>
                  <div class="col-md-9">
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="checkbox" id="enableUpdates" checked>
                      <label class="form-check-label" for="enableUpdates">
                        Enable result update alerts
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="notifyScores" checked>
                      <label class="form-check-label" for="notifyScores">
                        Notify when judges submit scores
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="settings-section" id="tabulation-settings">
              <h2 class="settings-section-title">Tabulation Settings</h2>
              <div class="settings-card">
                <div class="row mb-3">
                  <div class="col-md-12">
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="checkbox" id="allowDecimal" checked>
                      <label class="form-check-label" for="allowDecimal">
                        Allow decimal scores
                      </label>
                    </div>
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="checkbox" id="showAverage" checked>
                      <label class="form-check-label" for="showAverage">
                        Show average in report
                      </label>
                    </div>
                    <div class="form-check mb-3">
                      <input class="form-check-input" type="checkbox" id="highlightTop" checked>
                      <label class="form-check-label" for="highlightTop">
                        Highlight top 3 in report
                      </label>
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <label class="form-label">Maximum scores per page</label>
                    <input type="number" class="form-control" value="10">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Number of judges expected</label>
                    <input type="number" class="form-control" value="5">
                  </div>
                </div>
              </div>
            </div>

            <div class="settings-section" id="permissions">
              <h2 class="settings-section-title">Permissions</h2>
              <div class="settings-card">
                <div class="row mb-3">
                  <div class="col-md-3">
                    <label class="form-label">Report Visibility</label>
                  </div>
                  <div class="col-md-9">
                    <select class="form-select">
                      <option selected>All Users</option>
                      <option>Judges Only</option>
                      <option>Administrators Only</option>
                      <option>Custom</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="allowJudges">
                      <label class="form-check-label" for="allowJudges">
                        Allow judges to modify scores after finalization
                      </label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <a href="#" class="add-role-link">
                      <i class="bi bi-plus-circle"></i> Add New Role
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <div class="settings-section" id="danger-zone">
              <h2 class="settings-section-title text-danger">Danger Zone</h2>
              <div class="settings-card danger-zone-card">
                <div class="danger-action">
                  <button class="btn btn-outline-danger w-100 text-start">
                    <i class="bi bi-arrow-repeat"></i> Reset System Data
                  </button>
                </div>
                <div class="danger-action">
                  <button class="btn btn-outline-danger w-100 text-start">
                    <i class="bi bi-trash"></i> Clear All Reports
                  </button>
                </div>
                <div class="danger-action">
                  <button class="btn btn-danger w-100 text-start">
                    <i class="bi bi-x-circle"></i> Delete Account
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <script src="../../public/assets/js/settings.js"></script>
</body>
</html>
