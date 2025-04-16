<!-- Step 1: Overview -->
<div class="tab-pane active" id="step-1">
  <div class="row mb-4">
    <div class="col-md-6">
      <label for="eventName" class="form-label">Event Name</label>
      <input type="text" class="form-control" id="eventName" value="Battle of The Bands 2025">
    </div>
    <div class="col-md-6">
      <label for="eventType" class="form-label">Event Type</label>
      <div class="dropdown">
        <button class="form-select text-start d-flex justify-content-between align-items-center" type="button" id="eventTypeDropdown" data-bs-toggle="dropdown" aria-expanded="false">
          <span id="selectedEventType">Battle of The Band Competition</span>
        </button>
        <ul class="dropdown-menu w-100" id="eventTypeList" aria-labelledby="eventTypeDropdown">
          <li><a class="dropdown-item" href="#" data-value="Battle of The Band Competition">Battle of The Band Competition</a></li>
          <li><a class="dropdown-item" href="#" data-value="Music Festival">Music Festival</a></li>
          <li><a class="dropdown-item" href="#" data-value="Solo Performance">Solo Performance</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item add-event-type" href="#"><i class="bi bi-plus-circle me-2"></i>Add New Event Type</a></li>
        </ul>
      </div>
    </div>
  </div>

  <div class="row mb-4">
    <div class="col-md-3">
      <label for="startDate" class="form-label">Start Date</label>
      <input type="date" class="form-control" id="startDate">
    </div>
    <div class="col-md-3">
      <label for="endDate" class="form-label">End Date</label>
      <input type="date" class="form-control" id="endDate">
    </div>
    <div class="col-md-6">
      <label for="venue" class="form-label">Venue</label>
      <input type="text" class="form-control" id="venue" value="FESTIVAL MALL ALABANG">
    </div>
  </div>

  <div class="row mb-4">
    <div class="col-12">
      <label for="description" class="form-label">Event Description</label>
      <textarea class="form-control" id="description" rows="6"></textarea>
    </div>
  </div>

  <div class="row mb-4">
    <div class="col-12">
      <label class="form-label">Logo/Banner</label>
      <div class="upload-area">
        <div class="text-center p-4 border rounded">
          <button class="btn btn-outline-secondary mb-3" id="uploadBtn">Upload</button>
          <p class="mb-0 text-muted">Drop image here or click to upload</p>
        </div>
      </div>
    </div>
  </div>
</div>


