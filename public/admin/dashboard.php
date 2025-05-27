<?php
require_once '../../includes/db.php';
$database = new Database();
$conn = $database->getConnection();
$stats = [
    'Ongoing' => 0,
    'Upcoming' => 0,
    'Completed' => 0
];
$ongoingEvents = [];
$upcomingEvents = [];

// Get stats count
$statQuery = "SELECT status, COUNT(*) as total FROM events GROUP BY status";
$statResult = $conn->query($statQuery);
while ($row = $statResult->fetch_assoc()) {
    $stats[$row['status']] = $row['total'];
}

// Get ongoing events
$ongoingQuery = "SELECT * FROM events WHERE status = 'Ongoing' ORDER BY start_date ASC";
$ongoingEvents = $conn->query($ongoingQuery);

// Get upcoming events
$upcomingQuery = "SELECT * FROM events WHERE status = 'Upcoming' ORDER BY start_date ASC";
$upcomingEvents = $conn->query($upcomingQuery);
?>



<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
<title>DataSync Dashboard</title>
<link rel="stylesheet" href="../../public/assets/libs/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  
   <link rel="stylesheet" href="../../public/assets/css/dashboard.css">
   <link rel="icon" href="../../public/assets/images/logo1.svg">
   </head>
<style>
  
/* Recent Activity Card Styles */
.activity-tabs {
  display: flex;
  gap: 8px;
  border-bottom: 1px solid #e0e6ed;
  padding-bottom: 8px;
}

.activity-tab {
  background: none;
  border: none;
  padding: 4px 12px;
  border-radius: 16px;
  font-size: 14px;
  color: #6c757d;
  cursor: pointer;
  transition: all 0.2s;
}

.activity-tab.active {
  background-color: #e7f0ff;
  color: #0d6efd;
  font-weight: 500;
}

.activity-list {
  margin-top: 16px;
}

.activity-item {
  display: flex;
  align-items: flex-start;
  padding: 8px 0;
  gap: 12px;
}

.activity-dot {
  width: 10px;
  height: 10px;
  border-radius: 50%;
  margin-top: 6px;
}

.bg-primary {
  background-color: #0d6efd;
}

.bg-warning {
  background-color: #ffc107;
}

.bg-success {
  background-color: #198754;
}

.activity-content {
  flex: 1;
}

.activity-text {
  font-size: 14px;
  margin-bottom: 2px;
  color: #212529;
}

.activity-time {
  font-size: 12px;
  color: #6c757d;
}
</style>

<body>

 <?php include '../../includes/sidebar.php'; ?>
<?php include '../../includes/header.php'; ?>

    
  <div class="main-content mt-4" id="mainContent">
    <div class="row mb-4 align-items-center">
   
    </div>
    <div class="row g-4 mb-4">
  <div class="col-md-4">
    <div class="stat-card">
      <h2 class="stat-number"><?= $stats['Ongoing'] ?? 0 ?></h2>
      <div class="stat-label">Ongoing Events</div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="stat-card">
      <h2 class="stat-number"><?= $stats['Upcoming'] ?? 0 ?></h2>
      <div class="stat-label">Upcoming Events</div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="stat-card">
      <h2 class="stat-number"><?= $stats['Completed'] ?? 0 ?></h2>
      <div class="stat-label">Completed Events</div>
    </div>
  </div>
</div>

    <div class="row g-4">
      <div class="col-lg-8">
        <div class="card mt-2 mb-4">
          <div class="card-body">
          <h3 class="section-title">Ongoing events</h3>
          <div class="row g-3 p-5">
          <?php if ($ongoingEvents->num_rows > 0): ?>
        <?php while ($event = $ongoingEvents->fetch_assoc()): ?>
          <div class="col-md-6">
            <div class="event-card">
              <h5><?= htmlspecialchars($event['title']) ?></h5>
              <div class="event-detail"><i class="bi bi-calendar"></i> <span><?= date('F j, Y', strtotime($event['start_date'])) ?></span></div>
              <div class="event-detail"><i class="bi bi-clock"></i> <span><?= date('H:i', strtotime($event['time'])) ?></span></div>
              <div class="event-detail"><i class="bi bi-geo-alt"></i> <span><?= htmlspecialchars($event['description']) ?></span></div>
            </div>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <div class="col-12 text-center text-muted">There are no ongoing events.</div>
      <?php endif; ?>


          </div>

          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h3 class="section-title">Upcoming events</h3>
            <div class="row g-3 ">
              <?php if ($upcomingEvents->num_rows > 0): ?>
  <?php while ($event = $upcomingEvents->fetch_assoc()): ?>
    <div class="col-md-4">
      <div class="event-card">
        <h5><?= htmlspecialchars($event['title']) ?></h5>
        <div class="event-detail"><i class="bi bi-calendar"></i> <span><?= date('F j, Y', strtotime($event['start_date'])) ?></span></div>
        <div class="event-detail"><i class="bi bi-clock"></i> <span><?= date('H:i', strtotime($event['time'])) ?></span></div>
        <div class="event-detail"><i class="bi bi-geo-alt"></i> <span><?= htmlspecialchars($event['description']) ?></span></div>
        
      </div>
    </div>
  <?php endwhile; ?>
<?php else: ?>
  <div class="col-12 text-center text-muted">There are no upcoming events.</div>
<?php endif; ?>

            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="card mb-3">
          <div class="card-body">
        
          <?php  include '../../includes/calendar.php';?>

          </div>
        </div>
        <div class="card mb-4">
  <div class="card-body">
    <h3 class="section-title">Recent Activity</h3>
    
    <!-- Tabs Navigation -->
    <div class="activity-tabs mb-3">
      <button class="activity-tab active">All</button>
      <button class="activity-tab">Submissions</button>
      <button class="activity-tab">System</button>
    </div>
    
    <!-- Activity Items -->
    <div class="activity-list">
      <!-- Activity Item 1 -->
      <div class="activity-item">
        <div class="activity-dot bg-primary"></div>
        <div class="activity-content">
          <div class="activity-text">New submission to Mr and Ms STI</div>
          <div class="activity-time">2h ago</div>
        </div>
      </div>
      
      <!-- Activity Item 2 -->
      <div class="activity-item">
        <div class="activity-dot bg-warning"></div>
        <div class="activity-content">
          <div class="activity-text">Lester Inso completed 5 reviews</div>
          <div class="activity-time">13h ago</div>
        </div>
      </div>
      
    </div>
  </div>
</div>
      </div>

   
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>



</body>
</html>
