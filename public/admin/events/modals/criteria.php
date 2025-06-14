<div class="d-flex justify-content-between align-items-center mb-3">
  <h5 class="mb-0">Event Criteria</h5>

</div>


<div class="mb-4">
  <label for="roundSelect" class="form-label">Select Round</label>
  
  <!-- Wrapper for dropdown and button -->
  <div class="d-flex align-items-center">
    <!-- Smaller Dropdown -->
    <div class="dropdown flex-grow-1">
      <button class="btn btn-outline-secondary dropdown-toggle w-auto text-start round-dropdown" type="button" id="roundDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        Preliminary Round
      </button>
      <ul class="dropdown-menu w-auto" aria-labelledby="roundDropdown">
      <?php foreach ($rounds as $index => $round): ?>
        <li>
          <a class="dropdown-item <?= $index === 0 ? 'active' : '' ?>" 
            href="#" 
            data-round-id="<?= htmlspecialchars($round['round_id']) ?>">
            <?= htmlspecialchars($round['round_name']) ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>


    </div>


    <!-- Button at the end -->
    <button type="button" class="btn btn-primary ms-2" id="addCriteriaBtn">
      <i class="bi bi-plus"></i> Add Criteria
    </button>
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
      <!-- Criteria rows will be dynamically inserted here -->
    </tbody>
  </table>
</div>

<div class="d-flex justify-content-end align-items-center mt-3">

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
        <input type="hidden" id="selectedRoundId" name="round_id" value="">
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

<script >
  document.querySelectorAll('.dropdown-item').forEach(item => {
  item.addEventListener('click', function(e) {
    e.preventDefault();
    
    // Update button label
    const dropdownButton = document.getElementById('roundDropdown');
    dropdownButton.textContent = this.textContent;

    // Mark active item
    document.querySelectorAll('.dropdown-item').forEach(el => el.classList.remove('active'));
    this.classList.add('active');

    // Update hidden round_id input
    const selectedRoundId = this.getAttribute('data-round-id'); 
    document.getElementById('selectedRoundId').value = selectedRoundId;
  });
});

</script>

<script src="../../public/assets/js/modals/criteria.js"></script>
