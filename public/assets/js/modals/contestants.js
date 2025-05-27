document.addEventListener("DOMContentLoaded", () => {
  const sidebarToggle = document.getElementById("sidebarToggle")
  const sidebar = document.getElementById("sidebar")
  const mainContent = document.getElementById("mainContent")

  if (sidebarToggle && sidebar && mainContent) {
    sidebarToggle.addEventListener("click", () => {
      sidebar.classList.toggle("collapsed")
      mainContent.classList.toggle("expanded")
    })
  }


  let currentPage = 1
  const itemsPerPage = 3
  let filteredData = [...contestantsData]

  const addContestantModalElement = document.getElementById("addContestantModal")
  const addContestantModal = new bootstrap.Modal(addContestantModalElement)

  const importModalElement = document.getElementById("importModal")
  const importModal = new bootstrap.Modal(importModalElement)

  const filterModalElement = document.getElementById("filterModal")
  const filterModal = new bootstrap.Modal(filterModalElement)
  function renderContestantsTable() {
    const tableBody = document.getElementById("contestantsTableBody")
    tableBody.innerHTML = ""
    const startIndex = (currentPage - 1) * itemsPerPage
    const endIndex = startIndex + itemsPerPage
    const currentPageData = filteredData.slice(startIndex, endIndex)

    currentPageData.forEach((contestant) => {
      const row = document.createElement("tr")
      let statusBadgeClass = "status-active"
      if (contestant.status === "Inactive") {
        statusBadgeClass = "status-inactive"
      } else if (contestant.status === "Pending") {
        statusBadgeClass = "status-pending"
      }
      row.innerHTML = `
          <td>
            <div class="d-flex align-items-center">
              <div class="avatar avatar-${contestant.color} me-3">${contestant.initial}</div>
              <span>${contestant.name}</span>
            </div>
          </td>
          <td>${contestant.id}</td>
          <td>${contestant.category}</td>
          <td>
            <span class="status-badge ${statusBadgeClass}">${contestant.status}</span>
          </td>
          <td>
            <div class="d-flex gap-2">
              <button class="btn btn-sm btn-edit-contestant" data-id="${contestant.id}">Edit</button>
              <button class="btn btn-sm btn-remove-contestant" data-id="${contestant.id}">Remove</button>
            </div>
          </td>
        `
      tableBody.appendChild(row)
    })
    const paginationInfo = document.querySelector(".pagination-info")
    const startItem = filteredData.length > 0 ? startIndex + 1 : 0
    const endItem = Math.min(endIndex, filteredData.length)
    paginationInfo.textContent = `Showing ${startItem}-${endItem} of ${filteredData.length} contestants`
    renderPagination()
    addButtonEventListeners()
  }
  function renderPagination() {
    const pagination = document.querySelector(".pagination")
    pagination.innerHTML = ""
    const totalPages = Math.ceil(filteredData.length / itemsPerPage)
    for (let i = 1; i <= totalPages; i++) {
      const pageItem = document.createElement("li")
      pageItem.className = `page-item ${i === currentPage ? "active" : ""}`
      const pageLink = document.createElement("a")
      pageLink.className = "page-link"
      pageLink.href = "#"
      pageLink.textContent = i
      pageLink.addEventListener("click", (e) => {
        e.preventDefault()
        currentPage = i
        renderContestantsTable()
      })
      pageItem.appendChild(pageLink)
      pagination.appendChild(pageItem)
    }
    if (currentPage < totalPages) {
      const nextItem = document.createElement("li")
      nextItem.className = "page-item"
      const nextLink = document.createElement("a")
      nextLink.className = "page-link"
      nextLink.href = "#"
      nextLink.textContent = ">"
      nextLink.addEventListener("click", (e) => {
        e.preventDefault()
        currentPage++
        renderContestantsTable()
      })
      nextItem.appendChild(nextLink)
      pagination.appendChild(nextItem)
    }
  }
  function addButtonEventListeners() {
    document.querySelectorAll(".btn-edit-contestant").forEach((button) => {
      button.addEventListener("click", function () {
        const contestantId = this.getAttribute("data-id")
        const contestant = contestantsData.find((c) => c.id === contestantId)
        if (contestant) {
          alert(`Edit contestant: ${contestant.name}`)
        }
      })
    })
    document.querySelectorAll(".btn-remove-contestant").forEach((button) => {
      button.addEventListener("click", function () {
        const contestantId = this.getAttribute("data-id")
        if (confirm("Are you sure you want to remove this contestant?")) {
          const index = contestantsData.findIndex((c) => c.id === contestantId)
          if (index !== -1) {
            contestantsData.splice(index, 1)
            applyFilters()
            renderContestantsTable()
          }
        }
      })
    })
  }
  function applyFilters() {
    const categoryFilter = document.getElementById("filterCategory").value
    const statusFilter = document.getElementById("filterStatus").value
    const searchTerm = document.getElementById("searchContestants").value.toLowerCase()
    filteredData = contestantsData.filter((contestant) => {
      if (categoryFilter && contestant.category !== categoryFilter) {
        return false
      }
      if (statusFilter && contestant.status !== statusFilter) {
        return false
      }
      if (
        searchTerm &&
        !contestant.name.toLowerCase().includes(searchTerm) &&
        !contestant.id.toLowerCase().includes(searchTerm) &&
        !contestant.category.toLowerCase().includes(searchTerm)
      ) {
        return false
      }
      return true
    })
    currentPage = 1
  }
  const addContestantBtn = document.getElementById("addContestantBtn")
  if (addContestantBtn) {
    addContestantBtn.addEventListener("click", () => {
      document.getElementById("contestantName").value = ""
      document.getElementById("contestantId").value = ""
      document.getElementById("contestantCategory").value = ""
      document.getElementById("contestantStatus").value = "Active"

      addContestantModal.show()
    })
  }
  const saveContestantBtn = document.getElementById("saveContestantBtn")
  if (saveContestantBtn) {
    saveContestantBtn.addEventListener("click", () => {
      const name = document.getElementById("contestantName").value.trim()
      const id = document.getElementById("contestantId").value.trim()
      const category = document.getElementById("contestantCategory").value
      const status = document.getElementById("contestantStatus").value
      if (name === "") {
        alert("Please enter a contestant name")
        return
      }
      if (id === "") {
        alert("Please enter an ID number")
        return
      }
      if (category === "") {
        alert("Please select a category")
        return
      }
      const initial = name.charAt(0).toUpperCase()
      const colorOptions = ["blue", "red", "teal"]
      const color = colorOptions[Math.floor(Math.random() * colorOptions.length)]

      const newContestant = {
        id,
        name,
        category,
        status,
        initial,
        color,
      }
      contestantsData.push(newContestant)
      applyFilters()
      renderContestantsTable()
      addContestantModal.hide()
    })
  }
  const filterBtn = document.getElementById("filterBtn")
  if (filterBtn) {
    filterBtn.addEventListener("click", () => {
      filterModal.show()
    })
  }
  const applyFilterBtn = document.getElementById("applyFilterBtn")
  if (applyFilterBtn) {
    applyFilterBtn.addEventListener("click", () => {
      applyFilters()
      renderContestantsTable()
      filterModal.hide()
    })
  }
  const importBtn = document.getElementById("importBtn")
  if (importBtn) {
    importBtn.addEventListener("click", () => {
      importModal.show()
    })
  }
  const importContestantsBtn = document.getElementById("importContestantsBtn")
  if (importContestantsBtn) {
    importContestantsBtn.addEventListener("click", () => {
      const fileInput = document.getElementById("importFile")
      if (fileInput.files.length === 0) {
        alert("Please select a CSV file")
        return
      }
      alert("CSV import functionality would be implemented here")
      importModal.hide()
    })
  }
  const searchInput = document.getElementById("searchContestants")
  if (searchInput) {
    searchInput.addEventListener("input", () => {
      applyFilters()
      renderContestantsTable()
    })
  }
  renderContestantsTable()
})

