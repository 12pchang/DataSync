<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Competition Scoring System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../../public/assets/css/score.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

<?php include '../../includes/sidebar.php'; ?>
<?php include '../../includes/header.php'; ?>

<div class="main-content mt-5">
  <div class="row">
    <!-- Live Scoring Overview -->
    <div class="col-lg-8">
      <div class="card stat-card">
        <div class="card-body">
          <h5 class="card-title section-title">Live Scoring Overview for Mr and Ms Sti</h5>
          <div class="row mb-2">
            <div class="col-md-4">
              <div class="stat-card">
                <div class="card-body">
                <p class="text-muted mb-1">Contestants</p>
                <h4 class="stat-number mb-0">10   </h4>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="stat-card">
                <div class="card-body">
                  <p class="text-muted mb-1">Judges</p>
                  <h4 class="stat-number mb-0">3  </h4>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="stat-card">
                <div class="card-body">
                  <p class="text-muted mb-1">Current Round</p>
                  <h4 class="stat-number mb-0">Semi-Finals</h4>
                </div>
              </div>
            </div>
          </div>

          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Judge</th>
                  <th>Competitor</th>
                  <th>Category</th>
                  <th>Score</th>
                  <th>Time</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Judge Smith</td>
                  <td>John Doe</td>
                  <td>Technical</td>
                  <td>8.5</td>
                  <td>Just now</td>
                  <td><span class="badge bg-success">Active</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>


        <!-- Communication and Alerts -->
    <div class="col-lg-4">
      <div class="row">
        <!-- Communication Center -->
        <div class="col-md-12">
          <div class="card event-card">
            <div class="card-body">
              <h5 class="card-title section-title">Communication Center</h5>
              <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Type your message..." id="messageText" style="height: 100px"></textarea>
                <label for="messageText">Type your message...</label>
              </div>
              <button class="btn btn-dark">Send to All Judges</button>
            </div>
          </div>
        </div>
        </div>
        </div>
  <div class="row">
    <!-- Score Management -->
    <div class="col-lg-4">
      <div class="card event-card">
        <div class="card-body">
          <h5 class="card-title section-title">Score Management</h5>

          <div class="mb-3">
            <label for="roundSelect" class="form-label">Select Round</label>
            <select class="form-select" id="roundSelect">
              <option value="prelim">Preliminary</option>
              <option value="semifinal">Semi-Finals</option>
              <option value="final">Finals</option>
            </select>
          </div>

          <div class="d-flex mb-3">
            <button class="btn btn-primary me-2" onclick="startRound()">
              <i class="bi bi-play-fill"></i> Start Round
            </button>
            <button class="btn btn-outline-secondary">
              <i class="bi bi-pause-fill"></i> Pause Scoring
            </button>
          </div>

          <h6>Quick Actions</h6>
          <div class="quick-action-btn">
            <button class="btn btn-outline-dark btn-sm text-start">
              <i class="bi bi-pencil"></i> Override Scores
            </button>
          
            <button class="btn btn-outline-dark btn-sm  text-start">
              <i class="bi bi-shuffle"></i> Reassign Judges
            </button>
          </div>
        </div>
      </div>
    </div>


        <!-- Active Alerts -->
        <div class="col-md-12">
          <div class="card event-card">
            <div class="card-body">
              <h5 class="card-title section-title">Active Alerts</h5>
              <div class="alert alert-light d-flex justify-content-between align-items-center">
                <span>Judge Request - Technical Support</span>
                <button class="btn-close"></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Tabs for Rounds -->
  <div class="tab-content mt-4">
    <!-- Preliminary -->
    <div class="round-tab" id="round-prelim" style="display:none;">
      <div class="card event-card">
        <div class="card-body">
          <h5 class="card-title section-title">Preliminary Round Scores</h5>
          <p class="text-muted">Scoring overview for the Preliminary round.</p>
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Judge</th>
                <th>Contestant</th>
                <th>Category</th>
                <th>Score</th>
                <th>Time</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Judge A</td>
                <td>Contestant 1</td>
                <td>Poise</td>
                <td>9.2</td>
                <td>Now</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Semi-Finals -->
    <div class="round-tab" id="round-semifinal" style="display:none;">
      <div class="card event-card">
        <div class="card-body">
          <h5 class="card-title section-title">Semi-Finals Scores</h5>
          <p class="text-muted">Scoring overview for the Semi-Finals round.</p>
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Judge</th>
                <th>Contestant</th>
                <th>Category</th>
                <th>Score</th>
                <th>Time</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Judge B</td>
                <td>Contestant 2</td>
                <td>Talent</td>
                <td>8.8</td>
                <td>1 min ago</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Finals -->
    <div class="round-tab" id="round-final" style="display:none;">
      <div class="card event-card">
        <div class="card-body">
          <h5 class="card-title section-title">Finals Scores</h5>
          <p class="text-muted">Scoring overview for the Final round.</p>
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Judge</th>
                <th>Contestant</th>
                <th>Category</th>
                <th>Score</th>
                <th>Time</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Judge C</td>
                <td>Contestant 3</td>
                <td>Beauty</td>
                <td>9.5</td>
                <td>3 min ago</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../public/assets/js/main.js"></script>
</body>
</html>
