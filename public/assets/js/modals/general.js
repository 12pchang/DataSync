document.addEventListener("DOMContentLoaded", () => {
  // Dropdown for Event Types
  const eventTypeDropdown = document.getElementById("eventTypeDropdown");
  const selectedEventType = document.getElementById("selectedEventType");
  const eventTypeList = document.getElementById("eventTypeList");
  const addEventTypeLink = document.querySelector(".add-event-type");
  const addEventTypeModalElement = document.getElementById("addEventTypeModal");
  const addEventTypeModal = new bootstrap.Modal(addEventTypeModalElement);
  const saveEventTypeBtn = document.getElementById("saveEventTypeBtn");
  const newEventTypeInput = document.getElementById("newEventType");

  let eventTypes = ["Battle of The Band Competition", "Music Festival", "Solo Performance"];

  // Event Type Selection
  eventTypeList.addEventListener("click", (e) => {
      if (e.target.classList.contains("dropdown-item") && !e.target.classList.contains("add-event-type")) {
          selectedEventType.textContent = e.target.getAttribute("data-value");
      }
  });

  // Show Modal to Add New Event Type
  addEventTypeLink?.addEventListener("click", (e) => {
      e.preventDefault();
      newEventTypeInput.value = "";
      addEventTypeModal.show();
  });

  // Save New Event Type
  saveEventTypeBtn?.addEventListener("click", () => {
      const newType = newEventTypeInput.value.trim();
      
      if (!newType) return alert("Please enter an event type name");
      if (eventTypes.includes(newType)) return alert("This event type already exists");

      eventTypes.push(newType);
      eventTypeList.insertAdjacentHTML("beforeend", `<li><a class="dropdown-item" href="#" data-value="${newType}">${newType}</a></li>`);
      selectedEventType.textContent = newType;
      addEventTypeModal.hide();
  });

  // Image Upload and Drag & Drop
  const uploadBtn = document.getElementById("uploadBtn");
  const uploadArea = document.querySelector(".upload-area");
  const fileInput = document.createElement("input");
  fileInput.type = "file";
  fileInput.accept = "image/*";
  fileInput.style.display = "none";
  document.body.appendChild(fileInput);

  uploadBtn?.addEventListener("click", () => fileInput.click());

  fileInput.addEventListener("change", () => handleFile(fileInput.files[0]));

  uploadArea?.addEventListener("dragover", (e) => {
      e.preventDefault();
      uploadArea.classList.add("drag-over");
  });

  uploadArea?.addEventListener("dragleave", () => uploadArea.classList.remove("drag-over"));

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
                  <img src="${e.target.result}" alt="Preview" style="max-width: 100%; max-height: 200px; margin-bottom: 10px;">
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

  const today = new Date();
  today.setDate(today.getDate() + 1);
  const minDate = today.toISOString().split("T")[0];

  startDate?.setAttribute("min", minDate);
  endDate?.setAttribute("min", minDate);

  startDate?.addEventListener("change", () => {
      endDate.value = "";
      endDate.setAttribute("min", startDate.value);
  });

  // Sidebar Toggle
  const sidebarToggle = document.getElementById("sidebarToggle");
  const sidebar = document.getElementById("sidebar");
  const mainContent = document.getElementById("mainContent");

  sidebarToggle?.addEventListener("click", () => {
      sidebar.classList.toggle("collapsed");
      mainContent.classList.toggle("expanded");
  });
});
