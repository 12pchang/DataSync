<div class="col-md-6">
      <h2>Events Overview</h2>
    </div>
<!-- Step 1: Overview -->
<div class="tab-pane active" id="step-1">
  <form id="eventForm" enctype="multipart/form-data">
    <div class="row mb-4">
      <div class="col-md-6">
        <label for="eventName" class="form-label">* Event Name</label>
        <input type="text" class="form-control" id="eventName" name="eventName" required>
      </div>
      <div class="col-md-6">
        <label for="eventType" class="form-label">* Event Type</label>
        <input list="eventTypeOptions" class="form-control" id="eventType" name="eventType" placeholder="Select or type event type" required>
        <datalist id="eventTypeOptions">
          <option value="Pageant">`
          <option value="Debate">`
          <option value="Quiz Bee">
          <option value="Sports Fest">
          <option value="Talent Show">
        </datalist>
      </div>
    </div>

    <div class="row mb-4">
      <div class="col-md-3">
        <label for="startDate" class="form-label">* Start Date</label>
        <input type="date" class="form-control" id="startDate" name="startDate" required>
      </div>
      <div class="col-md-3">
        <label for="endDate" class="form-label">* End Date</label>
        <input type="date" class="form-control" id="endDate" name="endDate" required>
      </div>
      <div class="col-md-6">
        <label for="venue" class="form-label">* Venue</label>
        <input type="text" class="form-control" id="venue" name="venue" required>
      </div>
    </div>

    <div class="row mb-4">
      <div class="col-12">
        <label for="description" class="form-label">* Event Description <small>(Max: 150 words)</small></label>
        <textarea class="form-control" id="description" name="description" rows="6" required></textarea>
        <div class="text-muted mt-1" id="wordCount">0 / 150 words</div>
      </div>
    </div>

    <div class="row mb-4">
      <div class="col-12">
        <label class="form-label">* Logo/Banner</label>
        <div class="upload-area">
          <div class="text-center p-4 border rounded">
            <button type="button" class="btn btn-outline-secondary mb-3" id="uploadBtn">Upload</button>
            <p class="mb-0 text-muted">Drop image here or click to upload</p>
          </div>
        </div>
        <input type="file" id="logoInput" name="eventLogo" accept="image/*" style="display: none;" required>
      </div>
    </div>
  </form>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const uploadBtn = document.getElementById("uploadBtn");
  const uploadArea = document.querySelector(".upload-area");
  const fileInput = document.getElementById("logoInput");

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
    const maxSize = 25 * 1024 * 1024; // 25MB
    if (file.size > maxSize) {
      alert("File exceeds 25MB size limit.");
      fileInput.value = "";
      return;
    }

    const reader = new FileReader();
    reader.onload = (e) => {
      uploadArea.innerHTML = `
        <div class="text-center p-4">
          <img src="${e.target.result}" alt="Preview" style="max-width: 100%; max-height: 200px;" class="mb-2">
          <button type="button" class="btn btn-sm btn-outline-danger mt-2" id="removeFile">Remove</button>
        </div>
      `;
      document.getElementById("removeFile").addEventListener("click", () => resetUploadArea());
    };
    reader.readAsDataURL(file);
  }

  function resetUploadArea() {
    fileInput.value = "";
    uploadArea.innerHTML = `
      <div class="text-center p-4 border rounded">
        <button type="button" class="btn btn-outline-secondary mb-3" id="uploadBtn">Upload</button>
        <p class="mb-0 text-muted">Drop image here or click to upload</p>
      </div>
    `;
    document.getElementById("uploadBtn").addEventListener("click", () => fileInput.click());
  }

  // Date validation
  const startDate = document.getElementById("startDate");
  const endDate = document.getElementById("endDate");
  const minDate = new Date(Date.now() + 86400000).toISOString().split("T")[0];

  startDate?.setAttribute("min", minDate);
  endDate?.setAttribute("min", minDate);

  startDate?.addEventListener("change", () => {
    endDate.value = "";
    endDate.setAttribute("min", startDate.value);
  });

  // Word Count Limit
  const description = document.getElementById("description");
  const wordCount = document.getElementById("wordCount");

  description?.addEventListener("input", () => {
    const words = description.value.trim().split(/\s+/).filter(Boolean);
    wordCount.textContent = `${words.length} / 150 words`;
    if (words.length > 150) {
      wordCount.classList.add("text-danger");
    } else {
      wordCount.classList.remove("text-danger");
    }
  });
});
</script>
