document.addEventListener("DOMContentLoaded", () => {
  const dropdownItems = document.querySelectorAll(".dropdown-item")
  const roundDropdown = document.getElementById("roundDropdown")

  
  const sidebarToggle = document.getElementById("sidebarToggle")
  const sidebar = document.getElementById("sidebar")
  const mainContent = document.getElementById("mainContent")

  if (sidebarToggle && sidebar && mainContent) {
    sidebarToggle.addEventListener("click", () => {
      sidebar.classList.toggle("collapsed")
      mainContent.classList.toggle("expanded")
    })
  }

  

  function updateCriteriaTable(round) {
    const tableBody = document.getElementById("criteriaTableBody")
    tableBody.innerHTML = ""

    criteriaData[round].forEach((criteria) => {
      const row = document.createElement("tr")
      row.innerHTML = `
          <td>${criteria.name}</td>
          <td>${criteria.description}</td>
          <td>
            <input type="number" class="form-control weight-input" value="${criteria.weight}" min="0" max="100">
          </td>
          <td>
            <button class="btn btn-delete-criteria">
              <i class="bi bi-x-circle text-danger"></i>
            </button>
          </td>
        `
      tableBody.appendChild(row)
    })

    addDeleteEventListeners()
    updateTotalWeight()

    addWeightInputEventListeners()
  }

  dropdownItems.forEach((item) => {
    item.addEventListener("click", function (e) {
      e.preventDefault()
      const round = this.getAttribute("data-round")
      roundDropdown.textContent = this.textContent

      dropdownItems.forEach((item) => item.classList.remove("active"))
      this.classList.add("active")

      updateCriteriaTable(round)
    })
  })

  function addDeleteEventListeners() {
    const deleteButtons = document.querySelectorAll(".btn-delete-criteria")
    deleteButtons.forEach((button) => {
      button.addEventListener("click", function () {
        if (confirm("Are you sure you want to delete this criteria?")) {
          this.closest("tr").remove()
          updateTotalWeight()
        }
      })
    })
  }

  function addWeightInputEventListeners() {
    const weightInputs = document.querySelectorAll(".weight-input")
    weightInputs.forEach((input) => {
      input.addEventListener("input", () => {
        updateTotalWeight()
      })
    })
  }

  function updateTotalWeight() {
    const weightInputs = document.querySelectorAll(".weight-input")
    let total = 0

    weightInputs.forEach((input) => {
      total += Number.parseInt(input.value) || 0
    })

    const totalWeightElement = document.getElementById("totalWeight")
    totalWeightElement.textContent = total

    if (total === 100) {
      totalWeightElement.style.color = "#059669" 
    } else {
      totalWeightElement.style.color = "#dc2626" 
    }
  }

  const addCriteriaBtn = document.getElementById("addCriteriaBtn")
  const addCriteriaModalElement = document.getElementById("addCriteriaModal")
  const addCriteriaModal = new bootstrap.Modal(addCriteriaModalElement)
  const saveCriteriaBtn = document.getElementById("saveCriteriaBtn")

  addCriteriaBtn.addEventListener("click", () => {
    document.getElementById("criteriaName").value = ""
    document.getElementById("criteriaDescription").value = ""
    document.getElementById("criteriaWeight").value = "0"

    addCriteriaModal.show()
  })

  saveCriteriaBtn.addEventListener("click", () => {
    const name = document.getElementById("criteriaName").value.trim()
    const description = document.getElementById("criteriaDescription").value.trim()
    const weight = document.getElementById("criteriaWeight").value

    if (name === "") {
      alert("Please enter a criteria name")
      return
    }

    const tableBody = document.getElementById("criteriaTableBody")
    const row = document.createElement("tr")
    row.innerHTML = `
        <td>${name}</td>
        <td>${description}</td>
        <td>
          <input type="number" class="form-control weight-input" value="${weight}" min="0" max="100">
        </td>
        <td>
          <button class="btn btn-delete-criteria">
            <i class="bi bi-x-circle text-danger"></i>
          </button>
        </td>
      `
    tableBody.appendChild(row)

    const deleteButton = row.querySelector(".btn-delete-criteria")
    deleteButton.addEventListener("click", () => {
      if (confirm("Are you sure you want to delete this criteria?")) {
        row.remove()
        updateTotalWeight()
      }
    })

    const weightInput = row.querySelector(".weight-input")
    weightInput.addEventListener("input", () => {
      updateTotalWeight()
    })

    updateTotalWeight()

    addCriteriaModal.hide()
  })
  addDeleteEventListeners()
  addWeightInputEventListeners()
  updateTotalWeight()
})

