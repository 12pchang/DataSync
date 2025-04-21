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
  <div class="app-container">

  <?php include '../../includes/sidebar.php'; ?>
  <?php include '../../includes/header.php'; ?>

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
           <div class="col-md-4 d-flex  mt-3 mt-md-0">
  <div class="dropdown ">
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

  <div class="date-picker-container ">
        <input type="date" class="form-control" id="eventDateFilter">
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
  <div class="event-card modern-style">
    <div class="event-img-banner" style="background-image: url('../../public/assets/images/sti.jpg');">
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
    <div class="event-img-banner" style="background-image: url('../../public/assets/images/bob.jpg');">
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
    <div class="event-img-banner" style="background-image: url('../../public/assets/images/hs.jpg');">
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
  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../../public/assets/js/events.js"></script>
</body>
</html>