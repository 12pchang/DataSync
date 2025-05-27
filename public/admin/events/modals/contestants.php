<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Document</title>
</head>
<!-- Bootstrap JS + Popper (required for modal) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

<body>

<style>
    .btn-primary {
  background-color: #0084c7;
  border-color: #0084c7;
}

.btn-primary:hover {
  background-color: #0069a3;
  border-color: #0069a3;
}

.btn-outline-secondary {
  color: #64748b;
  border-color: #e5e7eb;
}

.btn-outline-secondary:hover {
  background-color: #f1f5f9;
  color: #1e293b;
  border-color: #e5e7eb;
}

.form-label {
  font-weight: 500;
  color: #1e293b;
}

.search-contestants-container {
  width: 300px;
}

.contestants-table th {
  background-color: #f8fafc;
  color: #64748b;
  font-weight: 600;
  padding: 12px 16px;
  border-bottom: 1px solid #e5e7eb;
}

.contestants-table td {
  padding: 12px 16px;
  border-bottom: 1px solid #e5e7eb;
  vertical-align: middle;
}

.avatar {
  width: 36px;
  height: 36px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  font-weight: 600;
}

.avatar-blue {
  background-color: #3b82f6;
}

.status-badge {
  display: inline-block;
  padding: 4px 12px;
  border-radius: 20px;
  font-size: 12px;
  font-weight: 500;
}

.status-active {
  background-color: #dcfce7;
  color: #16a34a;
}

.status-inactive {
  background-color: #fee2e2;
  color: #dc2626;
}

.status-pending {
  background-color: #fef3c7;
  color: #d97706;
}

.btn-edit-contestant {
  background-color: #60a5fa;
  color: white;
  border: none;
  padding: 4px 12px;
  border-radius: 4px;
}

.btn-edit-contestant:hover {
  background-color: #3b82f6;
  color: white;
}

.btn-remove-contestant {
  background-color: #f87171;
  color: white;
  border: none;
  padding: 4px 12px;
  border-radius: 4px;
}

.btn-remove-contestant:hover {
  background-color: #ef4444;
  color: white;
}

.pagination-info {
  color: #64748b;
  font-size: 14px;
}

.pagination .page-link {
  color: #64748b;
  border: 1px solid #e5e7eb;
  padding: 6px 12px;
}

.pagination .page-item.active .page-link {
  background-color: #0084c7;
  border-color: #0084c7;
  color: white;
}

</style>

 <div class="col-md-6">
      <h2>Contestants</h2>
    </div>

          <!-- Navigation Tabs -->
    

          <!-- Search & Controls -->
          <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="search-contestants-container">
              <input type="text" class="form-control" placeholder="Search Contestants..." id="searchContestants">
            </div>
            <div class="d-flex gap-2">
            <button class="btn btn-primary" id="addContestantBtn" 
           onclick="addContestantModal.show()" data-bs-toggle="modal" data-bs-target="#addContestantModal">+ Add New</button>

            </div>
          </div>

          <!-- Contestants Table -->
          <div class="table-responsive">
            <table class="table contestants-table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>ID Number</th>
                  <th>Category</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="contestantsTableBody">
            
              </tbody>
              </table>
            </div> <!-- .table-responsive -->

            <!-- Show when no contestants exist -->
            <div id="noContestantsMessage" class="text-center text-muted py-4">
              <p>No contestants yet. Click <strong>+ Add New</strong> to get started.</p>
            </div>


          <!-- Pagination -->
          <div class="d-flex justify-content-between align-items-center mt-3">
            <div class="pagination-info">Showing 1-3 of 24 contestants</div>
            <nav aria-label="Page navigation">
              <ul class="pagination">
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">&gt;</a></li>
              </ul>
            </nav>
          </div>



<!-- Add Contestant Modal -->
<div class="modal fade" id="addContestantModal" tabindex="-1" aria-labelledby="addContestantModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add New Contestant</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="contestantName" class="form-label">Name</label>
          <input type="text" class="form-control" id="contestantName" placeholder="Enter contestant name">
        </div>
        <div class="mb-3">
          <label for="contestantId" class="form-label">ID Number</label>
          <input type="text" class="form-control" id="contestantId" placeholder="Enter ID number">
        </div>
        <div class="mb-3">
          <label for="contestantCategory" class="form-label">Category</label>
          <select class="form-select" id="contestantCategory">
            <option value="">Select category</option>
            <option value="Solo-Senior">Hataw-Sayaw</option>
            <option value="Solo-Junior">Solo-Pop Idol</option>
            <option value="Duet-Senior">Battle of the Bands</option>
            <option value="Duet-Junior">Mr. & Ms. STI</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="contestantStatus" class="form-label">Status</label>
          <select class="form-select" id="contestantStatus">
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
            <option value="Pending">Pending</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" id="saveContestantBtn">Add</button>
      </div>
    </div>
  </div>
</div>

<!-- Import Modal -->
<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Import Contestants</h5>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p>Upload a CSV file with contestant data.</p>
        <div class="mb-3">
          <label for="importFile" class="form-label">CSV File</label>
          <input type="file" class="form-control" id="importFile" accept=".csv">
        </div>
        <div class="alert alert-info">
          <small>CSV should have columns: Name, ID, Category, Status</small>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" id="importContestantsBtn">Import</button>
      </div>
    </div>
  </div>
</div>

<!-- Filter Modal -->
<div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Filter Contestants</h5>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="filterCategory" class="form-label">Category</label>
          <select class="form-select" id="filterCategory">
            <option value="">All Categories</option>
            <option value="Solo-Senior">Solo-Senior</option>
            <option value="Solo-Junior">Solo-Junior</option>
            <option value="Duet-Senior">Duet-Senior</option>
            <option value="Duet-Junior">Duet-Junior</option>
            <option value="Group-Teen">Group-Teen</option>
            <option value="Group-Adult">Group-Adult</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="filterStatus" class="form-label">Status</label>
          <select class="form-select" id="filterStatus">
            <option value="">All Statuses</option>
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
            <option value="Pending">Pending</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" id="applyFilterBtn">Apply Filter</button>
      </div>
    </div>
  </div>
</div>

  <script>
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


  </script>

</body>
</html>