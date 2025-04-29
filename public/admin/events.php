<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DataSync</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../../public/assets/css/events.css">
  <link rel="icon" href="../../public/assets/images/logo1.svg">

</head>
<body>
  <!-- Event Details Modal -->
<div class="modal fade" id="eventDetailsModal" tabindex="-1" aria-labelledby="eventDetailsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content rounded-4">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="eventDetailsModalLabel">Event Title</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-5">
            <div class="w-100 rounded-3 bg-cover" id="eventModalBanner" style="height: 200px; background-size: cover; background-position: center;"></div>
          </div>
          <div class="col-md-7">
            <p><strong>Status:</strong> <span id="eventModalStatus"></span></p>
            <p><strong>Time:</strong> <span id="eventModalTime"></span></p>
            <p><strong>Details:</strong></p>
            <p id="eventModalMeta" class="mb-0"></p>
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
          <!-- Add spacing class ms-2 to create space between the search bar and the date button -->
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
            <!-- Label styled as button -->
            <label for="eventDateFilter" class="btn btn-outline-secondary filter-btn w-100 d-flex align-items-center gap-2" id="dateLabel">
              <i class="bi bi-calendar3"></i> <!-- Bootstrap calendar icon -->
              <span>Select Date</span>
            </label>

            <!-- Invisible date input that opens calendar picker -->
            <input type="date" id="eventDateFilter" class="position-absolute w-100 h-100" style="opacity: 0; top: 0; left: 0; cursor: pointer;">
          </div>
     
  


  
</div>
<div class="col-md-4 d-flex justify-content-md-end mt-3 mt-md-0">
  <button class="btn btn-primary" id="addEventBtn">
    <i class="bi bi-plus me-1"></i> Add Event
  </button>
  
  <?php include '../../public/admin/events/create_event.php'; ?>
  

</div>
</div>
</div>
</div>

<div class="row events-grid">
  <!-- Sample Event Card -->
  <div class="col-md-4 mb-4">
  <div class="event-card modern-style" 
     data-bs-toggle="modal" 
     data-bs-target="#eventDetailsModal"
     data-title="Mr and Ms Sti"
     data-status="Ongoing"
     data-time="<?php echo date('g:i A'); ?>"
     data-meta="8 Contestants, 3 Judges<br>Event started"
     data-bg="../../public/assets/images/sti.jpg"
     style="cursor: pointer;">

    <div class="event-img-banner" style="background-image: url('../../public/uploads/sti.jpg');">
      <div class="event-date">
        
        <span class="day"><?php echo date("j"); ?></span>
        <span class="month"><?php echo date("F"); ?></span>
      </div>
    </div>
    <div class="event-info">
      <div class="d-flex justify-content-between align-items-start">
        <h4 class="event-title mb-1">Mr and Ms Sti</h4>
        <span class="event-status ongoing">Ongoing</span>
      </div>
      <p class="event-time"><?php echo date("g:i A"); ?></p>
      <div class="event-meta">
        <span><i class="bi bi-people"></i> 8 Contestants, 3 Judges</span><br>
        <span><i class="bi bi-clock"></i> Event started</span>
      </div>
    </div>
  </div>
</div>


<div class="col-md-4 mb-4">
  <div class="event-card modern-style">
    <div class="event-img-banner" style="background-image: url('../../public/uploads/bob.jpg');">
      <div class="event-date">
        <span class="day">10</span>
        <span class="month">MAR</span>
      </div>
    </div>
    <div class="event-info">
      <div class="d-flex justify-content-between align-items-start">
        <h4 class="event-title mb-1">Battle of the Bands</h4>
        <span class="event-status completed">Completed</span>
      </div>
      <p class="event-time">4:00 PM</p>
      <div class="event-meta">
        <span><i class="bi bi-people"></i> 8 Contestants, 3 Judges</span><br>
        <span><i class="bi bi-trophy"></i> Winner: Nocturnals</span>
      </div>
    </div>
  </div>
</div>



<div class="col-md-4 mb-4">
  <div class="event-card modern-style">
    <div class="event-img-banner" style="background-image: url('../../public/uploads/hs.jpg');">
      <div class="event-date">
        <span class="day">10</span>
        <span class="month">MAR</span>
      </div>
    </div>
    <div class="event-info">
      <div class="d-flex justify-content-between align-items-start">
        <h4 class="event-title mb-1">Hataw Sayaw</h4>
        <span class="event-status completed">Completed</span>
      </div>
      <p class="event-time">8:00 AM</p>
      <div class="event-meta">
        <span><i class="bi bi-people"></i> 5 Contestants, 3 Judges</span><br>
        <span><i class="bi bi-trophy"></i> Winner: SILK 'N SNAP</span>
      </div>
    </div>
  </div>
</div>


</div>


        <!-- <div class="footer text-center text-muted small py-3">
          © 2025 Event Tabulation System. All rights reserved.
        </div> -->
      </div>
    </div>
  </div>
  
  <script>
  const dateInput = document.getElementById("eventDateFilter");
  const dateLabel = document.getElementById("dateLabel").querySelector("span");

  dateInput.addEventListener("change", function () {
    if (this.value) {
      const selectedDate = new Date(this.value);
      const options = { year: 'numeric', month: 'long', day: 'numeric' };
      dateLabel.textContent = selectedDate.toLocaleDateString(undefined, options);
    } else {
      dateLabel.textContent = "Select Date";
    }
  });

  const eventCards = document.querySelectorAll('.event-card');

  eventCards.forEach(card => {
    card.addEventListener('click', () => {
      const title = card.getAttribute('data-title');
      const status = card.getAttribute('data-status');
      const time = card.getAttribute('data-time');
      const meta = card.getAttribute('data-meta');
      const bg = card.getAttribute('data-bg');

      document.getElementById('eventDetailsModalLabel').textContent = title;
      document.getElementById('eventModalStatus').textContent = status;
      document.getElementById('eventModalTime').textContent = time;
      document.getElementById('eventModalMeta').innerHTML = meta;
      document.getElementById('eventModalBanner').style.backgroundImage = `url('${bg}')`;
    });
  });
  
</script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../../public/assets/js/events.js"></script>
</body>
</html>