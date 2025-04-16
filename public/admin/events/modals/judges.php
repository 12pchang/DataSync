
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

<div class="d-flex justify-content-between align-items-center mb-4">
  <div class="search-judges-container">
    <input type="text" class="form-control" placeholder="Search Judges..." id="searchJudges">
  </div>
  <div class="d-flex gap-2">
    <button class="btn btn-light" id="filterJudgeBtn">Filter</button>
    <button class="btn btn-light" id="importJudgeBtn">Import</button>
    <button class="btn btn-primary" id="addJudgeBtn">+ Add New</button>
  </div>
</div>

<div class="table-responsive">
  <table class="table judges-table">
    <thead>
      <tr>
        <th>Name</th>
        <th>ID Number</th>
        <th>Category</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="judgesTableBody">
      <!-- Sample judge rows go here -->
    </tbody>
  </table>
</div>

<div class="d-flex justify-content-between align-items-center mt-3">
  <div class="pagination-info">
    Showing 1-4 of 24 Judges
  </div>
  <nav aria-label="Page navigation">
    <ul class="pagination">
      <li class="page-item active"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item"><a class="page-link" href="#">&gt;</a></li>
    </ul>
  </nav>
</div>

<!-- Add Judge Modal -->
<div class="modal fade" id="addJudgeModal" tabindex="-1" aria-labelledby="addJudgeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addJudgeModalLabel">Add New Judge</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="judgeName" class="form-label">Name</label>
          <input type="text" class="form-control" id="judgeName" placeholder="Enter judge name">
        </div>
        <div class="mb-3">
          <label for="judgeId" class="form-label">ID Number</label>
          <input type="text" class="form-control" id="judgeId" placeholder="Enter ID number">
        </div>
        <div class="mb-3">
          <label for="judgeCategory" class="form-label">Category</label>
          <select class="form-select" id="judgeCategory">
            <option value="">Select category</option>
            <option value="Solo-Senior">Solo-Senior</option>
            <option value="Solo-Junior">Solo-Junior</option>
            <option value="Duet-Senior">Duet-Senior</option>
            <option value="Duet-Junior">Duet-Junior</option>
            <option value="Group-Teen">Group-Teen</option>
            <option value="Group-Adult">Group-Adult</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="judgeStatus" class="form-label">Status</label>
          <select class="form-select" id="judgeStatus">
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
            <option value="Pending">Pending</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="saveJudgeBtn">Add</button>
      </div>
    </div>
  </div>
</div>

<!-- Import Judges Modal -->
<div class="modal fade" id="importJudgeModal" tabindex="-1" aria-labelledby="importJudgeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="importJudgeModalLabel">Import Judges</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Upload a CSV file with judge data.</p>
        <div class="mb-3">
          <label for="importJudgeFile" class="form-label">CSV File</label>
          <input type="file" class="form-control" id="importJudgeFile" accept=".csv">
        </div>
        <div class="alert alert-info">
          <small>CSV should have columns: Name, ID, Category, Status</small>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="importJudgesBtn">Import</button>
      </div>
    </div>
  </div>
</div>

<!-- Filter Judges Modal -->
<div class="modal fade" id="filterJudgeModal" tabindex="-1" aria-labelledby="filterJudgeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="filterJudgeModalLabel">Filter Judges</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="filterJudgeCategory" class="form-label">Category</label>
          <select class="form-select" id="filterJudgeCategory">
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
          <label for="filterJudgeStatus" class="form-label">Status</label>
          <select class="form-select" id="filterJudgeStatus">
            <option value="">All Statuses</option>
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
            <option value="Pending">Pending</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="applyJudgeFilterBtn">Apply Filter</button>
      </div>
    </div>
  </div>
</div>
