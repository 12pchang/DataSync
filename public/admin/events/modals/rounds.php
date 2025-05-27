<!-- Step 2: Rounds -->
<div class="d-flex justify-content-between align-items-center mb-3">
  <h5 class="mb-0">Rounds Management</h5>
  <button type="button" class="btn btn-primary add-round-btn">
    <i class="bi bi-plus"></i> Add Round
  </button>
</div>

<!-- List of rounds -->
<div id="roundsList" class="mb-4"></div>

<!-- Add Round Modal -->
<div class="modal fade" id="addRoundModal" tabindex="-1" aria-labelledby="addRoundModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="addRoundForm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addRoundModalLabel">Add New Round</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="roundName" class="form-label">Round Name</label>
            <input type="text" class="form-control" id="roundName" name="name" >
          </div>
          <div class="mb-3">
            <label for="orderNumber" class="form-label">Order Number</label>
            <input type="number" class="form-control" id="orderNumber" name="order_number" >
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save Round</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Rounds Script -->
<script>
  let addedRounds = [];

  document.querySelector('.add-round-btn').addEventListener('click', () => {
    const modal = new bootstrap.Modal(document.getElementById('addRoundModal'));
    modal.show();
  });

  document.getElementById('addRoundForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const name = document.getElementById('roundName').value.trim();
    const orderNumber = parseInt(document.getElementById('orderNumber').value.trim());

    if (!name || isNaN(orderNumber)) {
      alert('Please fill in all fields.');
      return;
    }

    addedRounds.push({ name, order_number: orderNumber });
    updateRoundsList();

    this.reset();
    bootstrap.Modal.getInstance(document.getElementById('addRoundModal')).hide();
  });

  function updateRoundsList() {
    const container = document.getElementById('roundsList');
    if (addedRounds.length === 0) {
      container.innerHTML = '<p class="text-muted">No rounds added yet.</p>';
      return;
    }

    let html = `
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>#</th><th>Round Name</th><th>Order</th><th>Action</th>
          </tr>
        </thead>
        <tbody>
          ${addedRounds.map((round, i) => `
            <tr>
              <td>${i + 1}</td>
              <td>${round.name}</td>
              <td>${round.order_number}</td>
              <td><button class="btn btn-danger btn-sm" onclick="removeRound(${i})">Remove</button></td>
            </tr>
          `).join('')}
        </tbody>
      </table>`;
    container.innerHTML = html;
  }

  function removeRound(index) {
    addedRounds.splice(index, 1);
    updateRoundsList();
  }

  // Make submitRounds accessible globally
  function submitRounds(eventId) {
    return fetch('../../ajax/rounds/add-multiple-rounds.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({
        event_id: eventId,
        rounds: addedRounds
      })
    })
    .then(response => response.json());
  }

  // Expose to global scope so create_event.php can call it
  window.submitRounds = submitRounds;
</script>
