let currentStep = 1;
const totalSteps = 5;

function updateProgressBar() {
  const progress = (currentStep - 1) / (totalSteps - 1) * 100;
  document.getElementById("wizardProgressBar").style.width = `${progress}%`;

  document.querySelectorAll(".step-pill").forEach(btn => {
    const step = parseInt(btn.dataset.step);
    btn.classList.remove("active", "completed");
    if (step < currentStep) btn.classList.add("completed");
    if (step === currentStep) btn.classList.add("active");
  });
}

// Add event listeners to "Next" and "Back" buttons
document.getElementById("nextStep").addEventListener("click", () => {
  if (currentStep < totalSteps) {
    currentStep++;
    updateStepUI();
  }
});

document.getElementById("prevStep").addEventListener("click", () => {
  if (currentStep > 1) {
    currentStep--;
    updateStepUI();
  }
});

// Optional: Clicking the step pills to jump
document.querySelectorAll(".step-pill").forEach(btn => {
  btn.addEventListener("click", () => {
    currentStep = parseInt(btn.dataset.step);
    updateStepUI();
  });
});

function updateStepUI() {
  updateProgressBar();

  // Load content dynamically if needed
  fetch(`modals/step${currentStep}.php`)
    .then(res => res.text())
    .then(html => {
      document.getElementById("eventWizardStepContent").innerHTML = html;
    });

  document.getElementById("prevStep").disabled = currentStep === 1;
  document.getElementById("nextStep").classList.toggle("d-none", currentStep === totalSteps);
  document.getElementById("finishEventBtn").classList.toggle("d-none", currentStep !== totalSteps);
}

// Initial render
updateProgressBar();
