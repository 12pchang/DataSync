<div class="mb-4">
  <label for="roundSelect" class="form-label">Select Round</label>
  <div class="dropdown">
    <button class="btn btn-outline-secondary dropdown-toggle w-100 text-start round-dropdown" type="button" id="roundDropdown" data-bs-toggle="dropdown" aria-expanded="false">
      Preliminary Round
    </button>
    <ul class="dropdown-menu w-100" aria-labelledby="roundDropdown">
      <li><a class="dropdown-item active" href="#" data-round="preliminary">Preliminary Round</a></li>
      <li><a class="dropdown-item" href="#" data-round="semifinal">Semi-Final Round</a></li>
      <li><a class="dropdown-item" href="#" data-round="final">Final Round</a></li>
    </ul>
  </div>
</div>

<div class="table-responsive">
  <table class="table criteria-table">
    <thead>
      <tr>
        <th>Criteria Name</th>
        <th>Description</th>
        <th>Weight (%)</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody id="criteriaTableBody">
      <tr>
        <td>Technique</td>
        <td>Technical execution and skill level</td>
        <td><input type="number" class="form-control weight-input" value="35" min="0" max="100"></td>
        <td>
          <button class="btn btn-delete-criteria">
            <i class="bi bi-x-circle text-danger"></i>
          </button>
        </td>
      </tr>
      <tr>
        <td>Creativity</td>
        <td>Originality and artistic expression</td>
        <td><input type="number" class="form-control weight-input" value="25" min="0" max="100"></td>
        <td>
          <button class="btn btn-delete-criteria">
            <i class="bi bi-x-circle text-danger"></i>
          </button>
        </td>
      </tr>
      <tr>
        <td>Performance</td>
        <td>Overall stage presence and delivery</td>
        <td><input type="number" class="form-control weight-input" value="40" min="0" max="100"></td>
        <td>
          <button class="btn btn-delete-criteria">
            <i class="bi bi-x-circle text-danger"></i>
          </button>
        </td>
      </tr>
    </tbody>
  </table>
</div>

<div class="d-flex justify-content-between align-items-center mt-3">
  <button class="btn btn-primary" id="addCriteriaBtn">
    <i class="bi bi-plus"></i> Add Criteria
  </button>
  <div class="total-weight-container">
    Total Weight: <span id="totalWeight">100</span>%
  </div>
</div>



<!-- Add Criteria Modal -->
<div class="modal fade" id="addCriteriaModal" tabindex="-1" aria-labelledby="addCriteriaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    
      <div class="modal-header">
        <h5 class="modal-title" id="addCriteriaModalLabel">Add New Criteria</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
        <div class="mb-3">
          <label for="criteriaName" class="form-label">Criteria Name</label>
          <input type="text" class="form-control" id="criteriaName" placeholder="Enter criteria name">
        </div>
        <div class="mb-3">
          <label for="criteriaDescription" class="form-label">Description</label>
          <textarea class="form-control" id="criteriaDescription" rows="3" placeholder="Enter description"></textarea>
        </div>
        <div class="mb-3">
          <label for="criteriaWeight" class="form-label">Weight (%)</label>
          <input type="number" class="form-control" id="criteriaWeight" min="0" max="100" value="0">
        </div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="saveCriteriaBtn">Add</button>
      </div>
      
    </div>
  </div>
</div>
