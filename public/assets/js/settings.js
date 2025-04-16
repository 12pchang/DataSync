document.addEventListener("DOMContentLoaded", () => {
    const themeSwitch = document.getElementById("themeSwitch")
    const savedTheme = localStorage.getItem("theme")
    if (savedTheme === "dark") {
      document.body.classList.add("dark-theme")
      themeSwitch.checked = true
    }
  
    themeSwitch.addEventListener("change", function () {
      if (this.checked) {
        document.body.classList.add("dark-theme")
        localStorage.setItem("theme", "dark")
      } else {
        document.body.classList.remove("dark-theme")
        localStorage.setItem("theme", "light")
      }
    })
  
    const navItems = document.querySelectorAll(".settings-nav-item")
    const sections = document.querySelectorAll(".settings-section")
  
    navItems.forEach((item) => {
      item.addEventListener("click", function (e) {
        e.preventDefault()
  
        navItems.forEach((navItem) => navItem.classList.remove("active"))
  
  
        this.classList.add("active")
  
        const targetId = this.getAttribute("href").substring(1)
  
        sections.forEach((section) => (section.style.display = "none"))
  
        document.getElementById(targetId).style.display = "block"
  
        window.scrollTo({
          top: document.getElementById(targetId).offsetTop - 20,
          behavior: "smooth",
        })
      })
    })
  
    sections.forEach((section, index) => {
      if (index === 0) {
        section.style.display = "block"
      } else {
        section.style.display = "none"
      }
    })
  
    const saveChangesBtn = document.querySelector(".btn-primary")
    saveChangesBtn.addEventListener("click", function () {
  
      this.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...'
      this.disabled = true
  
      setTimeout(() => {
  
        this.innerHTML = "Save Changes"
        this.disabled = false
  
        showToast("Settings saved successfully!", "success")
      }, 1500)
    })
  
    const changePasswordLink = document.querySelector(".change-password-link")
    changePasswordLink.addEventListener("click", (e) => {
      e.preventDefault()
  
      const modalHTML = `
        <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label for="currentPassword" class="form-label">Current Password</label>
                  <input type="password" class="form-control" id="currentPassword">
                </div>
                <div class="mb-3">
                  <label for="newPassword" class="form-label">New Password</label>
                  <input type="password" class="form-control" id="newPassword">
                </div>
                <div class="mb-3">
                  <label for="confirmPassword" class="form-label">Confirm New Password</label>
                  <input type="password" class="form-control" id="confirmPassword">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="savePasswordBtn">Change Password</button>
              </div>
            </div>
          </div>
        </div>
      `
      document.body.insertAdjacentHTML("beforeend", modalHTML)
  
      const modal = new bootstrap.Modal(document.getElementById("changePasswordModal"))
      modal.show()
  
      document.getElementById("savePasswordBtn").addEventListener("click", function () {
        const currentPassword = document.getElementById("currentPassword").value
        const newPassword = document.getElementById("newPassword").value
        const confirmPassword = document.getElementById("confirmPassword").value
  
        if (!currentPassword || !newPassword || !confirmPassword) {
          showToast("Please fill in all fields", "error")
          return
        }
  
        if (newPassword !== confirmPassword) {
          showToast("New passwords do not match", "error")
          return
        }
  
        this.innerHTML =
          '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...'
        this.disabled = true
  
        setTimeout(() => {
  
          modal.hide()
  
  
          document.getElementById("changePasswordModal").addEventListener("hidden.bs.modal", function () {
            this.remove()
          })
  
          showToast("Password changed successfully!", "success")
        }, 1500)
      })
    })
  
    const dangerButtons = document.querySelectorAll(".danger-zone-card .btn")
    dangerButtons.forEach((button) => {
      button.addEventListener("click", function () {
        const action = this.textContent.trim()
  
  
        const modalHTML = `
          <div class="modal fade" id="confirmationModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title text-danger">Confirm Action</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to ${action.toLowerCase()}? This action cannot be undone.</p>
                  ${
                    action === "Delete Account"
                      ? '<div class="mb-3"><label for="confirmDelete" class="form-label">Type "DELETE" to confirm</label><input type="text" class="form-control" id="confirmDelete"></div>'
                      : ""
                  }
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-danger" id="confirmActionBtn">Confirm</button>
                </div>
              </div>
            </div>
          </div>
        `
  
  
        document.body.insertAdjacentHTML("beforeend", modalHTML)
  
        const modal = new bootstrap.Modal(document.getElementById("confirmationModal"))
        modal.show()
  
  
        document.getElementById("confirmActionBtn").addEventListener("click", function () {
  
          if (action === "Delete Account") {
            const confirmText = document.getElementById("confirmDelete").value
            if (confirmText !== "DELETE") {
              showToast('Please type "DELETE" to confirm', "error")
              return
            }
          }
  
          this.innerHTML =
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...'
          this.disabled = true
  
  
          setTimeout(() => {
  
            modal.hide()
  
            document.getElementById("confirmationModal").addEventListener("hidden.bs.modal", function () {
              this.remove()
            })
  
            showToast(`${action} completed successfully!`, "success")
  
            if (action === "Delete Account") {
              setTimeout(() => {
                window.location.href = "login.html"
              }, 2000)
            }
          }, 2000)
        })
      })
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
  })
  
  
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
  