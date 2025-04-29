document.addEventListener("DOMContentLoaded", () => {
  const addEventBtn = document.getElementById("addEventBtn");
  const importEventsBtn = document.getElementById("importEventsBtn");
  const saveEventBtn = document.getElementById("saveEventBtn");
  const searchInput = document.querySelector(".search-input");
  const statusDropdownItems = document.querySelectorAll("#statusDropdown + .dropdown-menu .dropdown-item");
  const statusDropdownButton = document.getElementById("statusDropdown");
  const dateInput = document.getElementById("eventDateFilter");

  if (addEventBtn) {
    addEventBtn.addEventListener("click", () => {
      const addEventModal = new bootstrap.Modal(document.getElementById("addEventModal"));
      addEventModal.show();
    });
  }

  if (importEventsBtn) {
    importEventsBtn.addEventListener("click", () => {
      const importEventsModal = new bootstrap.Modal(document.getElementById("importEventsModal"));
      importEventsModal.show();
    });
  }

  if (saveEventBtn) {
    saveEventBtn.addEventListener("click", () => {
      const form = document.getElementById("addEventForm");
      if (!validateForm(form)) {
        showToast("Please fill in all required fields", "error");
        return;
      }
      // your save logic
    });
  }

  if (searchInput) {
    searchInput.addEventListener("input", filterEvents);
  }

  if (statusDropdownItems) {
    statusDropdownItems.forEach((item) => {
      item.addEventListener("click", function (e) {
        e.preventDefault();
        const selectedStatus = this.textContent.trim();
        statusDropdownButton.textContent = selectedStatus;
        filterEvents();
      });
    });
  }

  if (dateInput) {
    dateInput.addEventListener("change", filterEvents);
  }
});

function filterEvents() {
  const searchInput = document.querySelector(".search-input");
  const statusDropdownButton = document.getElementById("statusDropdown");
  const dateInput = document.getElementById("eventDateFilter");
  const searchTerm = searchInput?.value.toLowerCase() || "";
  const selectedStatus = statusDropdownButton?.textContent.trim() || "All Status";
  const selectedDate = dateInput?.value || "";

  const eventCards = document.querySelectorAll(".event-card");
  let matchFound = false;

  eventCards.forEach((card) => {
    const eventTitle = card.querySelector(".event-title")?.textContent.toLowerCase() || "";
    const eventDetails = card.querySelector(".event-meta")?.textContent.toLowerCase() || "";
    const eventStatus = card.getAttribute("data-status") || "Unknown"; // You need to add this attribute in your HTML
    const eventDate = card.getAttribute("data-date") || ""; // You need to add this attribute in your HTML

    const matchesSearch = eventTitle.includes(searchTerm) || eventDetails.includes(searchTerm);
    const matchesStatus = (selectedStatus === "All Status") || (eventStatus === selectedStatus);
    const matchesDate = (selectedDate === "") || (eventDate === selectedDate);

    if (matchesSearch && matchesStatus && matchesDate) {
      card.closest(".col-md-4").style.display = "block";
      matchFound = true;
    } else {
      card.closest(".col-md-4").style.display = "none";
    }
  });

  const eventsGrid = document.querySelector(".events-grid");
  let noEventsDiv = document.getElementById("noEventsFound");

  if ((searchTerm || selectedStatus !== "All Status" || selectedDate) && !matchFound) {
    if (!noEventsDiv) {
      noEventsDiv = document.createElement("div");
      noEventsDiv.id = "noEventsFound";
      noEventsDiv.className = "text-center text-muted mt-4";
      noEventsDiv.textContent = "No events found matching your search.";
      eventsGrid.appendChild(noEventsDiv);
    }
  } else {
    if (noEventsDiv) {
      noEventsDiv.remove();
    }
  }
}
