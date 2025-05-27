

<?php
require_once '../../includes/db.php';

$database = new Database();
$conn = $database->getConnection();

$sql = "SELECT  e.event_id,
                e.title,
                e.status,
                e.start_date,
                e.time,
                e.banner,
                (SELECT COUNT(*) FROM contestants WHERE event_id = e.event_id) AS contestants,
                (SELECT COUNT(*) FROM judges      WHERE event_id = e.event_id) AS judges
        FROM    events e
        ORDER BY e.start_date DESC";



$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DataSync</title>
  <link rel="stylesheet" href="../../public/assets/libs/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../../public/assets/css/events.css">
  <link rel="icon" href="../../public/assets/images/logo1.svg">
  

</head>
<body>
  <!-- Event Details Modal -->
<!-- Event Details Modal -->
<div class="modal fade" id="eventDetailsModal" tabindex="-1" aria-labelledby="eventDetailsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="eventDetailsModalLabel">Event Details</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-4">
  <div id="scoreContainer">
    <h4 class="fw-bold mb-3">Scoring Breakdown</h4>
    <div id="scoreTableArea">Loading scores...</div>
    <div class="modal-footer">
  <a href="../../public/admin/view_score.php" id="viewFullPageBtn" target="_blank" class="btn btn-outline-primary" style="display: none;">
  <i class="bi bi-box-arrow-up-right"></i> View Full Page
</a>

</div>

  </div>
</div>

    </div>
  </div>
</div>



  <div class="app-container">

  <?php include '../../includes/sidebar.php'; ?>
  <?php include '../../includes/header.php'; ?>
  <?php date_default_timezone_set('Asia/Manila'); ?>
  <div class="main-content mt-4">
  <div class="content-wrapper">
    <div class="content-header">
    </div>
    <div class="search-filters-container mb-4">
      <div class="row align-items-center">
        <div class="col-md-4">
          <div class="search-container">
            <i class="bi bi-search search-icon"></i>
            <input type="text" class="form-control search-input" placeholder="Search events...">
          </div>
        </div>
        <div class="col-md-4 d-flex mt-3 mt-md-0">
          <div class="dropdown me-2">
            <button class="btn btn-outline-secondary dropdown-toggle filter-btn" type="button" id="statusDropdown" data-bs-toggle="dropdown" aria-expanded="false">
              All Status
            </button>
            <ul class="dropdown-menu" aria-labelledby="statusDropdown">
              <li><a class="dropdown-item" href="#">All Status</a></li>
              <li><a class="dropdown-item" href="#">Ongoing</a></li>
              <li><a class="dropdown-item" href="#">Upcoming</a></li>
              <li><a class="dropdown-item" href="#">Completed</a></li>
            </ul>
          </div>

          <div class="custom-date-btn position-relative d-inline-block">
            <label for="eventDateFilter" class="btn btn-outline-secondary filter-btn w-100 d-flex align-items-center gap-2" id="dateLabel">
              <i class="bi bi-calendar3"></i> 
              <span>Select Date</span>
            </label>

            <input type="date" id="eventDateFilter" class="position-absolute w-100 h-100" style="opacity: 0; top: 0; left: 0; cursor: pointer;">
          </div>
     
  


  
</div>
</div>
</div>
</div>




<div class="row">
  <?php while ($ev = $result->fetch_assoc()): ?>
    <?php
      $day   = date('j',  strtotime($ev['start_date']));
      $month = date('M',  strtotime($ev['start_date']));      
      $time  = date('g:i A', strtotime($ev['time']));
      $bg = '../../public/uploads/events/' . basename($ev['banner']);
      $title = htmlspecialchars($ev['title']);
      $status= htmlspecialchars($ev['status']);
      $meta  = "{$ev['contestants']} Contestants, {$ev['judges']} Judges";
    ?>
    <div class="col-md-4 mb-4">
    <div class="event-card modern-style"
     data-bs-toggle="modal"
     data-bs-target="#eventDetailsModal"
     data-event-id="<?= $ev['event_id'] ?>">

<div class="event-img-banner" style="background-image:url('<?= htmlspecialchars($bg) ?>')">
          <div class="event-date">
            <span class="day"><?= $day ?></span>
            <span class="month"><?= $month ?></span>
          </div>
        </div>

        <div class="event-info">
          <div class="d-flex justify-content-between">
            <h4 class="event-title mb-1"><?= $title ?></h4>
            <span class="event-status <?= strtolower($status) ?>"><?= $status ?></span>
          </div>
          <p class="event-time"><?= $time ?></p>
          <div class="event-meta"><?= $meta ?></div>
        </div>
      </div>
    </div>
  <?php endwhile; ?>
</div>


      </div>
    </div>
  </div>
 <script>
document.querySelectorAll('.event-card').forEach(card => {
  card.addEventListener('click', () => {
    const eventId = card.getAttribute('data-event-id');
    const eventStatus = card.querySelector('.event-status').textContent.trim().toLowerCase();
    const scoreArea = document.getElementById('scoreTableArea');
    const viewBtn = document.getElementById("viewFullPageBtn");

    if (eventStatus === 'completed') {
      // Show score table
      scoreArea.innerHTML = "Loading scores...";
      viewBtn.style.display = "inline-block"; // show the view full page button
      viewBtn.href = `../../public/admin/view_score.php?event_id=${eventId}`;

      fetch(`fetch_scores.php?event_id=${eventId}`)
        .then(response => response.text())
        .then(html => {
          scoreArea.innerHTML = html;
        })
        .catch(err => {
          console.error("Error loading scores:", err);
          scoreArea.innerHTML = "<div class='text-danger'>Failed to load scores.</div>";
        });
    } else {
      // Show message for Ongoing/Upcoming
      viewBtn.style.display = "none"; // hide view full page button
      const message = eventStatus === 'ongoing'
        ? "<div class='alert alert-info'>Scoring is currently in progress for this event.</div>"
        : "<div class='alert alert-warning'>This event hasn't started yet. Please check back later.</div>";
      scoreArea.innerHTML = message;
    }
  });
});
</script>


<script src="../../public/assets/js/events.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>