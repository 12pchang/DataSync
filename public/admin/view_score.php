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
  <link rel="icon" href="../../public/assets/images/logo1.svg">

</head>
<body>

<?php include '../../includes/sidebar.php'; ?>
<?php include '../../includes/header.php'; ?>

<div class="main-content mt-5 px-4">
  <div class="row gy-4">
    <!-- Live Scoring Overview -->
    <div class="col-lg-8">
      <div class="card stat-card">
        <div class="card-body">
          <h5 class="card-title section-title mb-4">Live Scoring Overview for Mr and Ms STI</h5>
          <div class="row g-3 mb-4">
            <div class="col-md-4">
              <div class="stat-card">
                <div class="card-body py-3">
                  <p class="text-muted mb-1">Contestants</p>
                  <h4 class="stat-number mb-0">10</h4>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="stat-card">
                <div class="card-body py-3">
                  <p class="text-muted mb-1">Judges</p>
                  <h4 class="stat-number mb-0">3</h4>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="stat-card">
                <div class="card-body py-3">
                  <p class="text-muted mb-1">Current Round</p>
                  <h4 class="stat-number mb-0">Semi-Finals</h4>
                </div>
              </div>
            </div>
          </div>

          
        </div>
      </div>
      
    </div>
    

    <!-- Place Active Alerts at the top of the right column -->
<div class="col-lg-4 d-flex flex-column gap-4">

<!-- Active Alerts -->
<div class="card event-card">
  <div class="card-body">
    <h5 class="card-title section-title mb-3">Active Alerts</h5>
    <div class="alert alert-light d-flex justify-content-between align-items-center mb-0">
      <span>No active alerts at the moment.</span>
      <button class="btn-close" aria-label="Close"></button>
    </div>
  </div>
</div>

</div>

<!-- Live Scoring (Judges View) Below Overview -->

<div class="col-lg-12">
  <div class="row g-4">

    <!-- Live Scoring - Left Side -->
    <div class="col-md-8">
      <div class="card event-card h-100">
        <div class="card-body">
          <h5 class="card-title section-title">Live Scoring - Judges Panel</h5>
          <p class="text-muted">Real-time scores being submitted by judges for the current round: <strong>Semi-Finals</strong></p>
          <table class="table table-striped">
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
                <td>Contestant 4</td>
                <td>Intelligence</td>
                <td>9.0</td>
                <td>Just now</td>
              </tr>
              <tr>
                <td>Judge B</td>
                <td>Contestant 2</td>
                <td>Talent</td>
                <td>8.8</td>
                <td>1 min ago</td>
              </tr>
              <tr>
                <td>Judge C</td>
                <td>Contestant 5</td>
                <td>Stage Presence</td>
                <td>9.3</td>
                <td>2 min ago</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Communication Center - Right Side -->
    <div class="col-md-4 d-flex flex-column gap-4">


      <!-- Communication Center -->
      <div class="card event-card">
        <div class="card-body">
          <h5 class="card-title section-title mb-3">Communication Center</h5>
          <div class="form-floating mb-3">
            <textarea class="form-control" placeholder="Type your message..." id="messageText" style="height: 100px"></textarea>
            <label for="messageText">Type your message...</label>
          </div>
          <button class="btn btn-dark w-100">Send to All Judges</button>
        </div>
      </div>

      <!-- Score Management -->
      <div class="card event-card">
        <div class="card-body">
          <h5 class="card-title section-title mb-3">Score Management</h5>
          <div class="mb-3">
            <label for="roundSelect" class="form-label">Select Round</label>
            <select class="form-select" id="roundSelect">
              <option value="prelim">Preliminary</option>
              <option value="semifinal" selected>Semi-Finals</option>
              <option value="final">Finals</option>
            </select>
          </div>
          <div class="d-flex gap-2 mb-3">
            <button class="btn btn-primary flex-fill" onclick="startRound()">
              <i class="bi bi-play-fill"></i> Start Round
            </button>
            <button class="btn btn-outline-secondary flex-fill">
              <i class="bi bi-pause-fill"></i> Pause Scoring
            </button>
          </div>
          <h6 class="mb-2">Quick Actions</h6>
          <div class="d-grid gap-2">
            <button class="btn btn-outline-dark btn-sm">
              <i class="bi bi-pencil"></i> Override Scores
            </button>
            <button class="btn btn-outline-dark btn-sm">
              <i class="bi bi-shuffle"></i> Reassign Judges
            </button>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../public/assets/js/main.js"></script>
</body>

</html>
