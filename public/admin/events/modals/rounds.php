<!-- Step 2: Rounds -->
<h5 class="mb-4">Rounds Management</h5>

<!-- Add Round Button -->
<div class="mb-3">
  <button class="btn btn-primary add-round-btn">
    <i class="bi bi-plus"></i> Add Round
  </button>
</div>

<!-- Rounds Container -->
<div id="rounds-container">
  <!-- Example Round Card 1 -->
  <div class="round-card mb-3 p-3 border rounded">
    <div class="d-flex justify-content-between align-items-start">
      <div>
        <h5 class="round-title">Preliminary Round</h5>
        <p class="round-description mb-1">All contestants perform their first routine</p>
        <p class="round-details mb-0"><strong>Date:</strong> 20 March 2025 | <strong>Weight:</strong> 30%</p>
      </div>
      <div class="round-actions">
        <button class="btn btn-sm btn-outline-secondary btn-edit me-1">Edit</button>
        <button class="btn btn-sm btn-outline-danger btn-delete">Delete</button>
      </div>
    </div>
  </div>

  <!-- Example Round Card 2 (without description/details) -->
  <div class="round-card mb-3 p-3 border rounded">
    <div class="d-flex justify-content-between align-items-start">
      <div>
        <h5 class="round-title">Final Round</h5>
      </div>
      <div class="round-actions">
        <button class="btn btn-sm btn-outline-secondary btn-edit me-1">Edit</button>
        <button class="btn btn-sm btn-outline-danger btn-delete">Delete</button>
      </div>
    </div>
  </div>
</div>

<!-- Add Another Round Button -->
<div class="text-start mt-3">
  <button class="btn btn-outline-primary btn-add-another">
    <i class="bi bi-plus-circle"></i> Add Another Round
  </button>
</div>
