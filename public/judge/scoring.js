document.addEventListener("DOMContentLoaded", () => {
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    if (window.bootstrap) {
      tooltipTriggerList.map((tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl))
    } else {
      console.error("Bootstrap is not loaded. Tooltips will not work.")
    }
  
    initTimer()
  
    initScoreInputs()
  
    initContestantSelection()
  
    initNavigationButtons()
  
    document.querySelectorAll(".score-input").forEach((input) => {
      input.addEventListener("input", calculateTotalScore)
      input.addEventListener("change", validateScoreInput)
    })
  
    setInterval(autoSave, 30000)
  })
  
  function initTimer() {
    const timerEl = document.getElementById("timer")
    const timeString = timerEl.textContent
    const [minutes, seconds] = timeString.split(":").map(Number)
    let totalSeconds = minutes * 60 + seconds
  
    const timerInterval = setInterval(() => {
      totalSeconds--
  
      if (totalSeconds <= 0) {
        clearInterval(timerInterval)
        showTimeUpModal()
        return
      }
  
      if (totalSeconds === 60) {
        showTimeWarningModal()
      }
  
      const mins = Math.floor(totalSeconds / 60)
      const secs = totalSeconds % 60
  
      timerEl.textContent = `${mins.toString().padStart(2, "0")}:${secs.toString().padStart(2, "0")}`
  
      if (totalSeconds < 60) {
        timerEl.style.color = "#dc3545"
        document.querySelector(".timer-icon").style.color = "#dc3545"
      }
    }, 1000)
  }
  
  function initScoreInputs() {
    document.querySelectorAll(".score-input").forEach((input) => {
      input.addEventListener("input", function () {
        const value = Number.parseFloat(this.value)
        if (isNaN(value)) {
          this.value = ""
        } else {
          if (value < 1) this.value = 1
          if (value > 10) this.value = 10
        }
        calculateTotalScore()
      })
    })
  }
  
  function validateScoreInput(e) {
    const value = Number.parseFloat(e.target.value)
    if (isNaN(value) || value === "") {
      e.target.value = ""
    } else {
      if (value < 1) e.target.value = 1
      if (value > 10) e.target.value = 10
      e.target.value = Number.parseFloat(e.target.value).toFixed(1)
    }
    calculateTotalScore()
  }
  
  function adjustScore(inputId, change) {
    const input = document.getElementById(inputId)
    let value = Number.parseFloat(input.value) || 0
    value += change
  
    value = Math.max(1, Math.min(10, value))
  
    input.value = value.toFixed(1)
  
    calculateTotalScore()
    autoSave()
  }
  
  function calculateTotalScore() {
    const creativityScore = Number.parseFloat(document.getElementById("creativity").value) || 0
    const presentationScore = Number.parseFloat(document.getElementById("presentation").value) || 0
    const technicalScore = Number.parseFloat(document.getElementById("technical").value) || 0
    const impactScore = Number.parseFloat(document.getElementById("impact").value) || 0
  
    const total = creativityScore + presentationScore + technicalScore + impactScore
  
    document.getElementById("totalScore").textContent = total.toFixed(1)
  
    document.getElementById("confirmCreativity").textContent = creativityScore.toFixed(1)
    document.getElementById("confirmPresentation").textContent = presentationScore.toFixed(1)
    document.getElementById("confirmTechnical").textContent = technicalScore.toFixed(1)
    document.getElementById("confirmImpact").textContent = impactScore.toFixed(1)
    document.getElementById("confirmTotal").textContent = total.toFixed(1)
  }
  
  function initContestantSelection() {
    const contestantItems = document.querySelectorAll(".contestant-item")
  
    contestantItems.forEach((item) => {
      item.addEventListener("click", function () {
        if (hasEnteredScores()) {
          showConfirmationModal()
          return
        }
  
        switchContestant(this)
      })
    })
  }
  
  function hasEnteredScores() {
    const inputs = document.querySelectorAll(".score-input")
    for (const input of inputs) {
      if (input.value && input.value !== "0" && input.value !== "0.0") {
        return true
      }
    }
  
    return document.getElementById("feedback").value.trim() !== ""
  }
  
  function switchContestant(contestantEl) {
    document.querySelectorAll(".contestant-item").forEach((item) => {
      item.classList.remove("active")
    })
  
    contestantEl.classList.add("active")
  
    const contestantName = contestantEl.querySelector(".contestant-name").textContent
    const contestantNumber = contestantEl.querySelector(".contestant-number").textContent
  
    document.querySelector(".contestant-header .contestant-name").textContent = contestantName
    document.querySelector(".contestant-header .contestant-number").textContent = contestantNumber
    document.getElementById("confirmContestantName").textContent = contestantName
  
    resetForm()
  
    document.querySelector(".last-saved .badge").innerHTML =
      '<i class="bi bi-info-circle text-primary me-1"></i> New contestant loaded'
      simulateLoadingData()
  }
    function resetForm() {
    document.querySelectorAll(".score-input").forEach((input) => {
      input.value = ""
    })
  
    document.getElementById("feedback").value = ""
    document.getElementById("totalScore").textContent = "0.0"
  }
  
   function initNavigationButtons() {
    const prevBtn = document.getElementById("prevBtn")
    const nextBtn = document.getElementById("nextBtn")
  
    prevBtn.addEventListener("click", navigateToPrevious)
    nextBtn.addEventListener("click", navigateToNext)
  
    document.getElementById("confirmSubmitBtn").addEventListener("click", () => {
      const modal = bootstrap.Modal.getInstance(document.getElementById("confirmationModal"))
      modal.hide()
  
      showToast("Submitting score.", "info")
  
      setTimeout(() => {
        showToast("Scores submitted successfully!", "success")
  
        const activeItem = document.querySelector(".contestant-item.active")
        const nextItem = activeItem.nextElementSibling
  
        if (nextItem) {
          switchContestant(nextItem)
        } else {
          showToast("All contestants have been scored!", "success")
        }
      }, 1500)
    })
  
    document.getElementById("judgeProfileImg").addEventListener("click", () => {
      const logoutModal = new bootstrap.Modal(document.getElementById("logoutModal"))
      logoutModal.show()
    })
  
    document.getElementById("confirmLogoutBtn").addEventListener("click", () => {
      showToast("Logging out...", "info")
  
      document.getElementById("confirmLogoutBtn").disabled = true
      document.getElementById("confirmLogoutBtn").innerHTML =
        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Logging out...'
        setTimeout(() => {
        window.location.href = "../../public/index.php" 
      }, 1500)
    })
  }
  
  function navigateToPrevious() {
    if (hasEnteredScores()) {
      const confirmationModalElement = document.getElementById("confirmationModal")
      const confirmationModal = new bootstrap.Modal(confirmationModalElement)
      confirmationModal.show()
  
      document.getElementById("confirmSubmitBtn").onclick = () => {
        confirmationModal.hide()
  
        showToast("Submitting scores.", "info")
  
        setTimeout(() => {
          showToast("Scores submitted successfully!", "success")
  
          const activeItem = document.querySelector(".contestant-item.active")
          const prevItem = activeItem.previousElementSibling
  
          if (prevItem) {
            switchContestant(prevItem)
          } else {
            showToast("This is the first contestants", "warning")
          }
        }, 1500)
      }
  
      return
    }
  
    const activeItem = document.querySelector(".contestant-item.active")
    const prevItem = activeItem.previousElementSibling
  
    if (prevItem) {
      switchContestant(prevItem)
    } else {
      showToast("This is the first contestants", "warning")
    }
  }
  
  function navigateToNext() {
    if (hasEnteredScores()) {
      const confirmationModalElement = document.getElementById("confirmationModal")
      const confirmationModal = new bootstrap.Modal(confirmationModalElement)
      confirmationModal.show()
      return
    }
  
    const activeItem = document.querySelector(".contestant-item.active")
    const nextItem = activeItem.nextElementSibling
  
    if (nextItem) {
      switchContestant(nextItem)
    } else {
      showToast("This is the last contestants", "warning")
    }
  }
  
  function autoSave() {
    if (hasEnteredScores()) {
      console.log("Auto-saving scores...")
  
      const now = new Date()
      const timeString = "just now"
      document.querySelector(".last-saved .badge").innerHTML =
        `<i class="bi bi-check-circle-fill text-success me-1"></i> Last saved ${timeString}`
    }
  }
  
  function simulateLoadingData() {
  
    const inputs = document.querySelectorAll(".score-input")
    inputs.forEach((input) => {
      input.disabled = true
    })
  
    document.getElementById("feedback").disabled = true
  
    setTimeout(() => {
      inputs.forEach((input) => {
        input.disabled = false
      })
  
      document.getElementById("feedback").disabled = false
  
      document.getElementById("creativity").focus()
    }, 800)
  }
  
  function showTimeWarningModal() {
    const timeWarningModal = new bootstrap.Modal(document.getElementById("timeWarningModal"))
    timeWarningModal.show()
  }
  
  function showTimeUpModal() {
    const modalHTML = `
     <div class="modal fade" id="timeUpModal" tabindex="-1" aria-labelledby="timeUpModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header bg-danger text-white">
            <h5 class="modal-title" id="timeUpModalLabel">Time's Up!</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="text-center mb-3">
              <i class="bi bi-alarm-fill text-danger" style="font-size: 3rem;"></i>
            </div>
            <p class="text-center">Your scoring time has ended.</p>
            <p class="text-center">Please submit your current scores or request additional time.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" id="requestTimeBtn">Request More Time</button>
            <button type="button" class="btn btn-danger" id="submitFinalBtn">Submit Final Scores</button>
          </div>
        </div>
      </div>
    </div>
  `
  
    document.body.insertAdjacentHTML("beforeend", modalHTML)
  
    const timeUpModal = new bootstrap.Modal(document.getElementById("timeUpModal"))
    timeUpModal.show()
  
    document.getElementById("requestTimeBtn").addEventListener("click", () => {
      showToast("Humiling ng extension ng oras", "info")
      timeUpModal.hide()
  

      const timerEl = document.getElementById("timer")
      timerEl.textContent = "02:00"
      initTimer()
    })
  
    document.getElementById("submitFinalBtn").addEventListener("click", () => {
      timeUpModal.hide()
      const confirmationModalElement = document.getElementById("confirmationModal")
      const confirmationModal = new bootstrap.Modal(confirmationModalElement)
      confirmationModal.show()
    })
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
  
  function showConfirmationModal() {
    const confirmationModalElement = document.getElementById("confirmationModal")
    const bootstrap = window.bootstrap 
    const confirmationModal = new bootstrap.Modal(confirmationModalElement)
    confirmationModal.show()
  }
  