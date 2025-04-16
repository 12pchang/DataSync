
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
<title>DataSync Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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

    
  <div class="main-content" id="mainContent">
    <div class="row mb-4 align-items-center">
   
    </div>
    <div class="row g-4 mb-4">
      <div class="col-md-4">
        <div class="stat-card">
          <h2 class="stat-number">23</h2>
          <div class="stat-label">Ongoing Events</div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="stat-card">
          <h2 class="stat-number">19</h2>
          <div class="stat-label">Upcoming Events</div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="stat-card">
          <h2 class="stat-number">10</h2>
          <div class="stat-label">Completed Events</div>
        </div>
      </div>
    </div>
    <div class="row g-4">
      <div class="col-lg-8">
        <div class="card mt-2 mb-4">
          <div class="card-body">
            <h3 class="section-title">Ongoing events</h3>
            <div class="row g-3">
              <div class="col-md-6">
                <div class="event-card">
                  <h5>Tagisan ng Talino</h5>
                  <div class="event-detail">
                    <i class="bi bi-calendar"></i>
                    <span>May 28, 2025</span>
                  </div>
                  <div class="event-detail">
                    <i class="bi bi-clock"></i>
                    <span>13:00 - 19:30</span>
                  </div>
                  <div class="event-detail">
                    <i class="bi bi-geo-alt"></i>
                    <span>Ayala Mall</span>
                  </div>
                  <div class="event-detail">
                    <i class="bi bi-people"></i>
                    <span>8 judges</span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="event-card">
                  <h5>Talent Search</h5>
                  <div class="event-detail">
                    <i class="bi bi-calendar"></i>
                    <span>May 30, 2025</span>
                  </div>
                  <div class="event-detail">
                    <i class="bi bi-clock"></i>
                    <span>10:00 - 12:30</span>
                  </div>
                  <div class="event-detail">
                    <i class="bi bi-geo-alt"></i>
                    <span>STICA Basketball court</span>
                  </div>
                  <div class="event-detail">
                    <i class="bi bi-people"></i>
                    <span>12 teams</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h3 class="section-title">Upcoming events</h3>
            <div class="row g-3">
              <div class="col-md-4">
                <div class="event-card">
                  <h5>Codefest</h5>
                  <div class="event-detail">
                    <i class="bi bi-calendar"></i>
                    <span>April 2, 2025</span>
                  </div>
                  <div class="event-detail">
                    <i class="bi bi-clock"></i>
                    <span>8:00 - 12:00</span>
                  </div>
                  <div class="event-detail">
                    <i class="bi bi-geo-alt"></i>
                    <span>Computer Lab 2</span>
                  </div>
                  <div class="event-detail">
                    <i class="bi bi-people"></i>
                    <span>8 representative</span>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="event-card">
                  <h5>Team Building</h5>
                  <div class="event-detail">
                    <i class="bi bi-calendar"></i>
                    <span>March 5, 2023</span>
                  </div>
                  <div class="event-detail">
                    <i class="bi bi-clock"></i>
                    <span>All Day</span>
                  </div>
                  <div class="event-detail">
                    <i class="bi bi-geo-alt"></i>
                    <span>STI College</span>
                  </div>
                  <div class="event-detail">
                    <i class="bi bi-people"></i>
                    <span>All students</span>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="event-card">
                  <h5>Sportsfest</h5>
                  <div class="event-detail">
                    <i class="bi bi-calendar"></i>
                    <span>June 10, 2025</span>
                  </div>
                  <div class="event-detail">
                    <i class="bi bi-clock"></i>
                    <span>09:00 - 5:30</span>
                  </div>
                  <div class="event-detail">
                    <i class="bi bi-geo-alt"></i>
                    <span>Ilaya court</span>
                  </div>
                  <div class="event-detail">
                    <i class="bi bi-people"></i>
                    <span>All students</span>
                  </div>
                </div>
              </div>
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


<script>
// JavaScript for tab functionality
document.addEventListener('DOMContentLoaded', function() {
  const tabs = document.querySelectorAll('.activity-tab');
  
  tabs.forEach(tab => {
    tab.addEventListener('click', function() {
      // Remove active class from all tabs
      tabs.forEach(t => t.classList.remove('active'));
      
      // Add active class to clicked tab
      this.classList.add('active');
      
      // Here you would typically filter the activity items
      // based on the selected tab category
    });
  });
});
</script>
  <!-- script for numbering para pag 1k to 1m-->
  <script>
document.addEventListener("DOMContentLoaded", function () {
    function formatNumber(num) {
        if (num >= 1000000) return (num / 1000000).toFixed(1) + "M";
        if (num >= 1000) return (num / 1000).toFixed(1) + "K";
        return num;
    }

    document.querySelectorAll(".stat-number").forEach(el => {
        el.textContent = formatNumber(parseInt(el.textContent));
    });
});



</script>

<script src="../assets/js/dashboard.js"></script>

</body>
</html>
