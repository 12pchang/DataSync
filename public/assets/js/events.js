document.addEventListener("DOMContentLoaded", () => {
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    if (window.bootstrap) {
      tooltipTriggerList.map((tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl))
    }
      const addEventBtn = document.getElementById("addEventBtn")
    addEventBtn.addEventListener("click", () => {
      const addEventModal = new bootstrap.Modal(document.getElementById("addEventModal"))
      addEventModal.show()
    })
      const importEventsBtn = document.getElementById("importEventsBtn")
    importEventsBtn.addEventListener("click", () => {
      const importEventsModal = new bootstrap.Modal(document.getElementById("importEventsModal"))
      importEventsModal.show()
    })
      const saveEventBtn = document.getElementById("saveEventBtn")
    saveEventBtn.addEventListener("click", () => {
      const form = document.getElementById("addEventForm")
      if (!validateForm(form)) {
        showToast("Please fill in all required fields", "error")
        return
      }
        saveEventBtn.innerHTML =
        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Creating...'
      saveEventBtn.disabled = true
        setTimeout(() => {
        saveEventBtn.innerHTML = "Create Event"
        saveEventBtn.disabled = false
        const addEventModal = bootstrap.Modal.getInstance(document.getElementById("addEventModal"))
        addEventModal.hide()
          showToast("Event created successfully!", "success")
          addNewEventCard()
      }, 1500)
    })
      const importBtn = document.getElementById("importBtn")
    importBtn.addEventListener("click", () => {
      const fileInput = document.getElementById("importFile")
      if (!fileInput.files.length) {
        showToast("Please select a file to import", "error")
        return
      }
        importBtn.innerHTML =
        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Importing...'
      importBtn.disabled = true
        setTimeout(() => {
        importBtn.innerHTML = "Import"
        importBtn.disabled = false
          const importEventsModal = bootstrap.Modal.getInstance(document.getElementById("importEventsModal"))
        importEventsModal.hide()
          showToast("Events imported successfully!", "success")
      }, 2000)
    })
      const viewDetailsButtons = document.querySelectorAll(".event-actions .btn")
    viewDetailsButtons.forEach((button) => {
      button.addEventListener("click", function () {
        const eventTitle = this.closest(".event-card").querySelector(".event-title").textContent
        showToast(`Viewing details for ${eventTitle}`, "info")
      })
    })
      const statusDropdownItems = document.querySelectorAll(".dropdown-item")
    statusDropdownItems.forEach((item) => {
      item.addEventListener("click", function (e) {
        e.preventDefault()
        const selectedStatus = this.textContent
        document.getElementById("statusDropdown").textContent = selectedStatus
          filterEvents(selectedStatus)
      })
    })
      const dateFilter = document.getElementById("eventDateFilter")
    dateFilter.addEventListener("change", function () {
      const selectedDate = this.value
      if (selectedDate) {
        filterEventsByDate(selectedDate)
      } else {
        showAllEvents()
      }
    })
      const searchInput = document.querySelector(".search-input")
    searchInput.addEventListener("input", function () {
      const searchTerm = this.value.toLowerCase()
      searchEvents(searchTerm)
    })
  
    const menuToggle = document.querySelector(".menu-toggle")
    if (menuToggle) {
      menuToggle.addEventListener("click", () => {
        const sidebar = document.querySelector(".sidebar")
        const mainContent = document.querySelector(".main-content")
  
        if (sidebar.style.width === "250px" || !sidebar.style.width) {
          sidebar.style.width = "70px"
          mainContent.style.marginLeft = "70px"
            document.querySelector(".app-name").style.display = "none"
          document.querySelectorAll(".menu-item span").forEach((span) => {
            span.style.display = "none"
          })
  
          document.querySelectorAll(".menu-item").forEach((item) => {
            item.style.justifyContent = "center"
            item.style.padding = "12px"
          })
  
          document.querySelectorAll(".menu-item i").forEach((icon) => {
            icon.style.marginRight = "0"
          })
        } else {
          sidebar.style.width = "250px"
          mainContent.style.marginLeft = "250px"
  
          document.querySelector(".app-name").style.display = "block"
          document.querySelectorAll(".menu-item span").forEach((span) => {
            span.style.display = "block"
          })
            document.querySelectorAll(".menu-item").forEach((item) => {
            item.style.justifyContent = "flex-start"
            item.style.padding = "12px 15px"
          })
  
          document.querySelectorAll(".menu-item i").forEach((icon) => {
            icon.style.marginRight = "10px"
          })
        }
      })
    }
      const downloadTemplateLink = document.querySelector(".download-template")
    downloadTemplateLink.addEventListener("click", (e) => {
      e.preventDefault()
      showToast("Template file download started", "info")
    })
  })
  
  function validateForm(form) {
    const requiredInputs = form.querySelectorAll("[required]")
    let isValid = true
  
    requiredInputs.forEach((input) => {
      if (!input.value.trim()) {
        input.classList.add("is-invalid")
        isValid = false
      } else {
        input.classList.remove("is-invalid")
      }
    })
  
    return isValid
  }
    function filterEvents(status) {
    const eventCards = document.querySelectorAll(".event-card")
  
    if (status === "All Status") {
      eventCards.forEach((card) => {
        card.closest(".col-md-4").style.display = "block"
      })
      return
    }
  
    eventCards.forEach((card) => {
      const eventStatus = card.querySelector(".event-status").textContent
      if (eventStatus === status) {
        card.closest(".col-md-4").style.display = "block"
      } else {
        card.closest(".col-md-4").style.display = "none"
      }
    })
  
    showToast(`Filtered events by status: ${status}`, "info")
  }
    function filterEventsByDate(date) {
    const eventCards = document.querySelectorAll(".event-card")
    const formattedDate = new Date(date).toLocaleDateString("en-US", {
      year: "numeric",
      month: "long",
      day: "numeric",
    })
  
    let matchFound = false
  
    eventCards.forEach((card) => {
      const eventDateText = card.querySelector(".event-detail:first-child span").textContent
      const eventDatePart = eventDateText.split(" - ")[0]
  
      if (eventDatePart.includes(formattedDate)) {
        card.closest(".col-md-4").style.display = "block"
        matchFound = true
      } else {
        card.closest(".col-md-4").style.display = "none"
      }
    })
  
    if (!matchFound) {
      showToast("No events found for the selected date", "warning")
    } else {
      showToast(`Filtered events for ${formattedDate}`, "info")
    }
  }
  
  function showAllEvents() {
    const eventCards = document.querySelectorAll(".event-card")
    eventCards.forEach((card) => {
      card.closest(".col-md-4").style.display = "block"
    })
  }
    function searchEvents(searchTerm) {
    const eventCards = document.querySelectorAll(".event-card")
    let matchFound = false
  
    eventCards.forEach((card) => {
      const eventTitle = card.querySelector(".event-title").textContent.toLowerCase()
      const eventDetails = card.querySelector(".event-details").textContent.toLowerCase()
  
      if (eventTitle.includes(searchTerm) || eventDetails.includes(searchTerm)) {
        card.closest(".col-md-4").style.display = "block"
        matchFound = true
      } else {
        card.closest(".col-md-4").style.display = "none"
      }
    })
  
    if (searchTerm && !matchFound) {
      showToast("No events found matching your search", "warning")
    }
  }
  
  function addNewEventCard() {
    const eventName = document.getElementById("eventName").value
    const eventStatus = document.getElementById("eventStatus").value
    const eventDate = document.getElementById("eventDate").value
    const eventTime = document.getElementById("eventTime").value
    const contestantCount = document.getElementById("contestantCount").value
    const judgeCount = document.getElementById("judgeCount").value
  
    const dateObj = new Date(eventDate)
    const formattedDate = dateObj.toLocaleDateString("en-US", {
      year: "numeric",
      month: "long",
      day: "numeric",
    })
  
    const timeObj = new Date(`2000-01-01T${eventTime}`)
    const formattedTime = timeObj.toLocaleTimeString("en-US", {
      hour: "numeric",
      minute: "numeric",
      hour12: true,
    })
      const newEventHTML = `
      <div class="col-md-4 mb-4">
        <div class="event-card">
          <div class="event-header">
            <h3 class="event-title">${eventName}</h3>
            <span class="event-status ${eventStatus}">${capitalizeFirstLetter(eventStatus)}</span>
          </div>
          <div class="event-details">
            <div class="event-detail">
              <i class="bi bi-calendar3"></i>
              <span>${formattedDate} - ${formattedTime}</span>
            </div>
            <div class="event-detail">
              <i class="bi bi-people"></i>
              <span>${contestantCount} Contestants, ${judgeCount} Judges</span>
            </div>
            <div class="event-detail">
              <i class="bi bi-clock"></i>
              <span>Newly Created</span>
            </div>
          </div>
          <div class="event-actions">
            <button class="btn btn-sm btn-outline-primary w-100">View Details</button>
          </div>
        </div>
      </div>
    `
      const eventsGrid = document.querySelector(".events-grid")
    eventsGrid.insertAdjacentHTML("afterbegin", newEventHTML)
      const newViewDetailsBtn = eventsGrid.querySelector(".col-md-4:first-child .event-actions .btn")
    newViewDetailsBtn.addEventListener("click", () => {
      showToast(`Viewing details for ${eventName}`, "info")
    })
      document.getElementById("addEventForm").reset()
  }
  
  function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1)
  }
    function showToast(message, type = "info") {
    let toastContainer = document.querySelector(".toast-container")
    if (!toastContainer) {
      toastContainer = document.createElement("div")
      toastContainer.className = "toast-container position-fixed bottom-0 end-0 p-3"
      document.body.appendChild(toastContainer)
    }
      const bsType = type === "error" ? "danger" : type
  
    const toastEl = document.createElement("div")
    toastEl.className = `toast align-items-center text-white bg-${bsType} border-0`
    toastEl.setAttribute("role", "alert")
    toastEl.setAttribute("aria-live", "assertive")
    toastEl.setAttribute("aria-atomic", "true")
  
    toastEl.innerHTML = `
      <div class="d-flex">
        <div class="toast-body">
          ${message}
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    `

    toastContainer.appendChild(toastEl)
  
    const bootstrap = window.bootstrap
    const toast = new bootstrap.Toast(toastEl, { autohide: true, delay: 3000 })
    toast.show()
  
    toastEl.addEventListener("hidden.bs.toast", () => {
      toastEl.remove()
    })



  }
  