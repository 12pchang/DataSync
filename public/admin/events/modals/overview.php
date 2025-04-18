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
        <ul class="dropdown-menu w-100" id="eventTypeList">
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

<script>
  document.addEventListener("DOMContentLoaded", () => {
    // Dropdown: Event Type
    const selectedEventType = document.getElementById("selectedEventType");
    const eventTypeList = document.getElementById("eventTypeList");

    const eventTypes = ["Battle of The Band Competition", "Music Festival", "Solo Performance"];

    eventTypeList.addEventListener("click", (e) => {
      if (e.target.classList.contains("dropdown-item") && !e.target.classList.contains("add-event-type")) {
        selectedEventType.textContent = e.target.dataset.value;
      }
    });

    // Upload Logic
    const uploadBtn = document.getElementById("uploadBtn");
    const uploadArea = document.querySelector(".upload-area");
    const fileInput = Object.assign(document.createElement("input"), {
      type: "file",
      accept: "image/*",
      style: "display: none"
    });
    document.body.appendChild(fileInput);

    uploadBtn?.addEventListener("click", () => fileInput.click());
    fileInput.addEventListener("change", () => handleFile(fileInput.files[0]));

    uploadArea?.addEventListener("dragover", (e) => {
      e.preventDefault();
      uploadArea.classList.add("drag-over");
    });

    uploadArea?.addEventListener("dragleave", () => {
      uploadArea.classList.remove("drag-over");
    });

    uploadArea?.addEventListener("drop", (e) => {
      e.preventDefault();
      uploadArea.classList.remove("drag-over");
      handleFile(e.dataTransfer.files[0]);
    });

    function handleFile(file) {
      if (!file) return;

      const reader = new FileReader();
      reader.onload = (e) => {
        uploadArea.innerHTML = `
          <div class="text-center p-4">
            <img src="${e.target.result}" alt="Preview" style="max-width: 100%; max-height: 200px;" class="mb-2">
            <p class="mb-0">${file.name}</p>
            <button class="btn btn-sm btn-outline-danger mt-2" id="removeFile">Remove</button>
          </div>
        `;
        document.getElementById("removeFile").addEventListener("click", resetUploadArea);
      };
      reader.readAsDataURL(file);
    }

    function resetUploadArea() {
      uploadArea.innerHTML = `
        <div class="text-center p-4 border rounded">
          <button class="btn btn-outline-secondary mb-3" id="uploadBtn">Upload</button>
          <p class="mb-0 text-muted">Drop image here or click to upload</p>
        </div>
      `;
      document.getElementById("uploadBtn").addEventListener("click", () => fileInput.click());
    }

    // Date Validation
    const startDate = document.getElementById("startDate");
    const endDate = document.getElementById("endDate");
    const minDate = new Date(Date.now() + 86400000).toISOString().split("T")[0]; // +1 day

    startDate?.setAttribute("min", minDate);
    endDate?.setAttribute("min", minDate);

    startDate?.addEventListener("change", () => {
      endDate.value = "";
      endDate.setAttribute("min", startDate.value);
    });
  });
</script>
