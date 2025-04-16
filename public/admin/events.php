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
           <div class="col-md-4 d-flex justify-content-between mt-3 mt-md-0">
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
          <div class="col-md-4 mb-4">
            <div class="event-card">
              <div class="event-header">
                <h3 class="event-title">Tagisan ng talino</h3>
                <span class="event-status ongoing">Ongoing</span>
              </div>
              <div class="event-details">
                <div class="event-detail">
                  <i class="bi bi-calendar3"></i>
                  <span>March 16, 2023 - 2:00 PM</span>
                </div>
                <div class="event-detail">
                  <i class="bi bi-people"></i>
                  <span>12 Contestants, 5 Judges</span>
                </div>
                <div class="event-detail">
                  <i class="bi bi-flag"></i>
                  <span>Round 2 of 3</span>
                </div>
              </div>
              <div class="event-actions">
                <button class="btn btn-sm btn-outline-primary w-100">View Details</button>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="event-card">
              <div class="event-header">
                <h3 class="event-title">Code fest</h3>
                <span class="event-status ongoing">Ongoing</span>
              </div>
              <div class="event-details">
                <div class="event-detail">
                  <i class="bi bi-calendar3"></i>
                  <span>March 20, 2023 - 4:00 PM</span>
                </div>
                <div class="event-detail">
                  <i class="bi bi-people"></i>
                  <span>8 Contestants, 3 Judges</span>
                </div>
                <div class="event-detail">
                  <i class="bi bi-clock"></i>
                  <span>Starts in 5 days</span>
                </div>
              </div>
              <div class="event-actions">
                <button class="btn btn-sm btn-outline-primary w-100">View Details</button>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="event-card">
              <div class="event-header">
                <h3 class="event-title">Mr and Ms STI</h3>
                <span class="event-status upcoming">Upcoming</span>
              </div>
              <div class="event-details">
                <div class="event-detail">
                  <i class="bi bi-calendar3"></i>
                  <span>March 10, 2023 - 1:00 PM</span>
                </div>
                <div class="event-detail">
                  <i class="bi bi-people"></i>
                  <span>15 Contestants, 4 Judges</span>
                </div>
                <div class="event-detail">
                  <i class="bi bi-trophy"></i>
                  <span>Winner: Jan Allen</span>
                </div>
              </div>
              <div class="event-actions">
                <button class="btn btn-sm btn-outline-primary w-100">View Details</button>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="event-card">
              <div class="event-header">
                <h3 class="event-title">Travelogue</h3>
                <span class="event-status completed">Completed</span>
              </div>
              <div class="event-details">
                <div class="event-detail">
                  <i class="bi bi-calendar3"></i>
                  <span>March 5, 2023 - 10:00 AM</span>
                </div>
                <div class="event-detail">
                  <i class="bi bi-people"></i>
                  <span>10 Teams, 6 Judges</span>
                </div>
                <div class="event-detail">
                  <i class="bi bi-trophy"></i>
                  <span>Winner: Team Logic</span>
                </div>
              </div>
              <div class="event-actions">
                <button class="btn btn-sm btn-outline-primary w-100">View Details</button>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="event-card">
              <div class="event-header">
                <h3 class="event-title">Chef Xpress</h3>
                <span class="event-status upcoming">Upcoming</span>
              </div>
              <div class="event-details">
                <div class="event-detail">
                  <i class="bi bi-calendar3"></i>
                  <span>March 25, 2023 - 9:00 AM</span>
                </div>
                <div class="event-detail">
                  <i class="bi bi-people"></i>
                  <span>20 Artists, 4 Judges</span>
                </div>
                <div class="event-detail">
                  <i class="bi bi-clock"></i>
                  <span>Starts in 10 days</span>
                </div>
              </div>
              <div class="event-actions">
                <button class="btn btn-sm btn-outline-primary w-100">View Details</button>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="event-card">
              <div class="event-header">
                <h3 class="event-title">Mix 'n Flair</h3>
                <span class="event-status upcoming">Upcoming</span>
              </div>
              <div class="event-details">
                <div class="event-detail">
                  <i class="bi bi-calendar3"></i>
                  <span>April 2, 2023 - 11:00 AM</span>
                </div>
                <div class="event-detail">
                  <i class="bi bi-people"></i>
                  <span>25 Participants, 7 Judges</span>
                </div>
                <div class="event-detail">
                  <i class="bi bi-clock"></i>
                  <span>Starts in 18 days</span>
                </div>
              </div>
              <div class="event-actions">
                <button class="btn btn-sm btn-outline-primary w-100">View Details</button>
              </div>
            </div>
          </div>
        </div>
        <div class="footer text-center text-muted small py-3">
          © 2025 Event Tabulation System. All rights reserved.
        </div>
      </div>
    </div>
  </div>
  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../../public/assets/js/events.js"></script>
</body>
</html>