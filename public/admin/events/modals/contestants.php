
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
              <button class="btn btn-light" id="filterBtn">Filter</button>
              <button class="btn btn-light" id="importBtn">Import</button>
              <button class="btn btn-primary" id="addContestantBtn">+ Add New</button>
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
                <!-- Sample Row -->
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="avatar avatar-blue me-3">L</div>
                      <span>Lester Inso</span>
                    </div>
                  </td>
                  <td>DC-001</td>
                  <td>Solo-Senior</td>
                  <td><span class="status-badge status-active">Active</span></td>
                  <td>
                    <div class="d-flex gap-2">
                      <button class="btn btn-sm btn-edit-contestant">Edit</button>
                      <button class="btn btn-sm btn-remove-contestant">Remove</button>
                    </div>
                  </td>
                </tr>
                <!-- Add more rows dynamically -->
              </tbody>
            </table>
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
