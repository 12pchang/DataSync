<style>
  .step-pill {
    width: 2rem;
    height: 2rem;
    border-radius: 50%;
    background-color: white;
    border: 2px solid #e0e0e0;
    color: #757575;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 5;
    font-size: 0.9rem;
    font-weight: 600;
    transition: all 0.2s ease;
    padding: 0;
  }

  .step-pill.active {
    background-color: white;
    border: 2px solid #1C8BF9;
    color: #1C8BF9;
    box-shadow: 0 0 0 3px rgba(28, 139, 249, 0.25);
  }

  .step-pill.completed {
    background-color: #1C8BF9;
    border-color: #1C8BF9;
    color: white;
  }
  
  .step-pill.completed::after {
    content: "✓";
    display: flex;
    align-items: center;
    justify-content: center;
  }
  
  .step-pill.completed span {
    display: none;
  }
  
  .wizard-progress-container {
    padding: 0 1rem;
    margin: 2rem 0;
  }
  
  .progress {
    background-color: #e0e0e0;
  }
  
  .progress-bar {
    background-color: #1C8BF9;
  }
  
  .start-25 {
    left: 25%;
  }
  
  .start-50 {
    left: 50%;
  }
  
  .start-75 {
    left: 75%;
  }

  .btn-primary {
    background-color: #1C8BF9;
    border-color: #1C8BF9;
  }
  
  .btn-success {
    background-color: #1C8BF9;
    border-color: #1C8BF9;
    color: white;
  }
</style>

<!-- Modal Wizard -->
<div class="modal fade " id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addEventModalLabel">Create New Event</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
        <form id="eventWizardForm">

          <!-- Wizard Step Progress Bar -->
          <div class="position-relative wizard-progress-container m-3">
            <div class="progress" role="progressbar" aria-label="Progress" style="height: 2px;">
              <div class="progress-bar" style="background-color: rgba(28, 139, 249, 0.25);; width: 20%;"></div>
            </div>
            <button type="button" class="position-absolute top-0 start-0 translate-middle btn step-pill active"><span>1</span></button>
            <button type="button" class="position-absolute top-0 start-25 translate-middle btn step-pill"><span>2</span></button>
            <button type="button" class="position-absolute top-0 start-50 translate-middle btn step-pill"><span>3</span></button>
            <button type="button" class="position-absolute top-0 start-75 translate-middle btn step-pill"><span>4</span></button>
            <button type="button" class="position-absolute top-0 start-100 translate-middle btn step-pill"><span>5</span></button>
          </div>

          <!-- Wizard Tabs (hidden) -->
          <ul class="nav nav-tabs mb-3 d-none" id="eventWizardTabs" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" data-step="1" type="button" role="tab">Overview</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="rounds-tab" data-bs-toggle="tab" data-step="2" type="button" role="tab">Rounds</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="criteria-tab" data-bs-toggle="tab" data-step="3" type="button" role="tab">Criteria</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="contestants-tab" data-bs-toggle="tab" data-step="4" type="button" role="tab">Contestants</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="judges-tab" data-bs-toggle="tab" data-step="5" type="button" role="tab">Judges</button>
            </li>
          </ul>

          <div id="eventWizardStepContent" class="tab-content m-5" style="min-height: 500px;">

          <div class="tab-pane fade show active" id="overview" role="tabpanel">
            <?php include '../../public/admin/events/modals/overview.php'; ?>
          </div>
          <div class="tab-pane fade" id="rounds" role="tabpanel">
          <?php include '../../public/admin/events/modals/rounds.php'; ?>
          </div>
          <div class="tab-pane fade" id="criteria" role="tabpanel">
          <?php include '../../public/admin/events/modals/criteria.php'; ?>
          </div>
          <div class="tab-pane fade" id="contestants" role="tabpanel">
          <?php include '../../public/admin/events/modals/contestants.php'; ?>
          </div>
          <div class="tab-pane fade" id="judges" role="tabpanel">
          <?php include '../../public/admin/events/modals/judges.php'; ?>
          </div>

          </div>
        </form>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="prevStep" disabled>Back</button>
        <button type="button" class="btn btn-primary" id="nextStep">Next</button>
        <button type="submit" class="btn btn-success d-none" id="finishEventBtn">Finish</button>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const nextBtn = document.getElementById('nextStep');
    const prevBtn = document.getElementById('prevStep');
    const pills = document.querySelectorAll('.step-pill');
    const progressBar = document.querySelector('.progress-bar');
    const finishBtn = document.getElementById('finishEventBtn');

    // Define step IDs in order
    const stepIds = ['overview', 'rounds', 'criteria', 'contestants', 'judges'];
    let currentStep = 1;

    // Helper to show the correct tab pane by ID
    function showStep(step) {
      const stepId = stepIds[step - 1];

      stepIds.forEach(id => {
        const pane = document.getElementById(id);
        if (id === stepId) {
          pane.classList.add('active', 'show');
        } else {
          pane.classList.remove('active', 'show');
        }
      });
    }

    // Next button click handler
    nextBtn.addEventListener('click', function () {
      if (currentStep < stepIds.length) {
        // Mark current pill as completed
        pills[currentStep - 1].classList.remove('active');
        pills[currentStep - 1].classList.add('completed');

        // Advance to next step
        currentStep++;
        pills[currentStep - 1].classList.add('active');
        progressBar.style.width = `${currentStep * 20}%`;

        // Toggle buttons
        prevBtn.disabled = false;
        if (currentStep === stepIds.length) {
          nextBtn.classList.add('d-none');
          finishBtn.classList.remove('d-none');
        }

        showStep(currentStep);
      }
    });

    // Previous button click handler
    prevBtn.addEventListener('click', function () {
      if (currentStep > 1) {
        // Deactivate current pill
        pills[currentStep - 1].classList.remove('active');

        // Go back a step
        currentStep--;
        pills[currentStep].classList.remove('completed');
        pills[currentStep - 1].classList.add('active');
        progressBar.style.width = `${currentStep * 20}%`;

        // Toggle buttons
        if (currentStep === 1) {
          prevBtn.disabled = true;
        }
        nextBtn.classList.remove('d-none');
        finishBtn.classList.add('d-none');

        showStep(currentStep);
      }
    });
  });
</script>

