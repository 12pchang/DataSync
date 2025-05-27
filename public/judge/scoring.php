<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Judge Scoring Interface - DataSync</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="app-container">
    <div class="sidebar">
      <div class="sidebar-header">
        <h5>Contestants</h5>
      </div>
      <div class="contestants-list">
  <div class="contestant-item active">
    <div class="contestant-img-container">
      <img src="../../public/assets/images/pageant/p1.jpg" alt="Contestant" class="contestant-img">
    </div>
    <div class="contestant-info">
      <div class="contestant-name">Jessica Ricio</div>
      <div class="contestant-number">Contestant #1</div>
    </div>
  </div>
  <div class="contestant-item">
    <div class="contestant-img-container">
      <img src="../../public/assets/images/pageant/p2.jpg" alt="Contestant" class="contestant-img">
    </div>
    <div class="contestant-info">
      <div class="contestant-name">Jhaycel Omandac</div>
      <div class="contestant-number">Contestant #2</div>
    </div>
  </div>
  <div class="contestant-item">
    <div class="contestant-img-container">
      <img src="../../public/assets/images/pageant/p3.jpg" alt="Contestant" class="contestant-img">
    </div>
    <div class="contestant-info">
      <div class="contestant-name">Kelly Castro</div>
      <div class="contestant-number">Contestant #3</div>
    </div>
  </div>
  <div class="contestant-item">
    <div class="contestant-img-container">
      <img src="../../public/assets/images/pageant/p4.jpg" alt="Contestant" class="contestant-img">
    </div>
    <div class="contestant-info">
      <div class="contestant-name">Hardie Arciaga</div>
      <div class="contestant-number">Contestant #4</div>
    </div>
  </div>
  <div class="contestant-item">
    <div class="contestant-img-container">
      <img src="../../public/assets/images/pageant/p5.jpg" alt="Contestant" class="contestant-img">
    </div>
    <div class="contestant-info">
      <div class="contestant-name">Lance Balague</div>
      <div class="contestant-number">Contestant #5</div>
    </div>
  </div>
  <div class="contestant-item">
    <div class="contestant-img-container">
      <img src="../../public/assets/images/pageant/p6.jpg" alt="Contestant" class="contestant-img">
    </div>
    <div class="contestant-info">
      <div class="contestant-name">Sepero Danielle Sakazawa</div>
      <div class="contestant-number">Contestant #6</div>
    </div>

  </div>
</div>


    </div>

    <div class="main-content">
      <div class="scoring-header">
        <div class="event-info">
          <h1 class="event-title">Mr and Ms STI 2025</h1>
          <p class="event-subtitle">Scoring Phase - Preliminary Round</p>
        </div>
        <div class="judge-info">
  <div class="judge-details">
    <div class="judge-name">Judge: Ella Loresca</div>
    <div class="judge-id">ID: JDG-2025-001</div>
  </div>
  <img src="../../public/assets/images/ella.png" alt="Judge" class="judge-img" id="judgeProfileImg">
</div>
      </div>

      <div class="scoring-content">
        <div class="row">
        <div class="col-md-3">
  <!-- Image Container -->
  <img id="currentContestantImg"
     src="../../public/assets/images/pageant/p1.jpg"
     alt="Current Contestant"
     onerror="this.src='../../public/assets/images/placeholder.png'"
     style="width: 260px; height: 300px; object-fit: cover; border-radius: 6px;">



  <!-- Timer Box -->
  <div class="timer-container">
    <div class="timer-icon">
      <i class="bi bi-stopwatch"></i>
    </div>
    <div class="timer-info">
      <div class="timer-label">Time Remaining</div>
      <div class="timer-value" id="timer">02:45</div>
    </div>
  </div>

  <div class="last-saved mt-3">
    <span class="badge bg-light text-dark">
      <i class="bi bi-check-circle-fill text-success me-1"></i>
      Last saved 2 minutes ago
    </span>
  </div>
</div>


          <div class="col-md-9">
            <div class="contestant-header">
              <h2 class="contestant-name">jessica Ricio</h2>
              <div class="contestant-number">Contestant #1</div>
            </div>

            <div class="score-sheet">
              <h3 class="section-title">Score Sheet</h3>
              
              <div class="row mb-4">
                <div class="col-md-6">
                  <div class="score-category">
                    <label for="creativity" class="form-label">Creativity (1-10)</label>
                    <div class="score-input-container">
                      <input type="number" class="form-control score-input" id="creativity" min="1" max="10" step="0.5">
                      <div class="score-buttons">
                        <button class="score-btn" onclick="adjustScore('creativity', -0.5)">-</button>
                        <button class="score-btn" onclick="adjustScore('creativity', 0.5)">+</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="score-category">
                    <label for="presentation" class="form-label">Presentation (1-10)</label>
                    <div class="score-input-container">
                      <input type="number" class="form-control score-input" id="presentation" min="1" max="10" step="0.5">
                      <div class="score-buttons">
                        <button class="score-btn" onclick="adjustScore('presentation', -0.5)">-</button>
                        <button class="score-btn" onclick="adjustScore('presentation', 0.5)">+</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="row mb-4">
                <div class="col-md-6">
                  <div class="score-category">
                    <label for="technical" class="form-label">Technical Skills (1-10)</label>
                    <div class="score-input-container">
                      <input type="number" class="form-control score-input" id="technical" min="1" max="10" step="0.5">
                      <div class="score-buttons">
                        <button class="score-btn" onclick="adjustScore('technical', -0.5)">-</button>
                        <button class="score-btn" onclick="adjustScore('technical', 0.5)">+</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="score-category">
                    <label for="impact" class="form-label">Overall Impact (1-10)</label>
                    <div class="score-input-container">
                      <input type="number" class="form-control score-input" id="impact" min="1" max="10" step="0.5">
                      <div class="score-buttons">
                        <button class="score-btn" onclick="adjustScore('impact', -0.5)">-</button>
                        <button class="score-btn" onclick="adjustScore('impact', 0.5)">+</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="row mb-4">
                <div class="col-12">
                  <div class="score-category">
                    <label for="feedback" class="form-label">Feedback & Comments</label>
                    <textarea class="form-control" id="feedback" rows="4" placeholder="Enter your feedback here..."></textarea>
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-12">
                  <div class="navigation-buttons">
                    <button class="btn btn-outline-secondary" id="prevBtn">
                      <i class="bi bi-arrow-left me-2"></i> Previous
                    </button>
                    <div class="total-score">
                      <span class="total-score-label">Total Score:</span>
                      <span class="total-score-value" id="totalScore">0.0</span>
                      <span class="total-score-max">/40</span>
                    </div>
                    <button class="btn btn-primary" id="nextBtn">
                      Next <i class="bi bi-arrow-right ms-2"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="footer">
        <p class="mb-0">© 2025 DataSync. All scores are confidential and property of the organization.</p>
      </div>
    </div>
  </div>

  <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="confirmationModalLabel">Confirm Submission</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to submit your scores for <span id="confirmContestantName">Sarah Johnson</span>?</p>
          <div class="alert alert-warning">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            You will not be able to modify these scores after submission.
          </div>
          <div class="score-summary">
            <div class="row">
              <div class="col-6">Creativity:</div>
              <div class="col-6 text-end" id="confirmCreativity">0.0</div>
            </div>
            <div class="row">
              <div class="col-6">Presentation:</div>
              <div class="col-6 text-end" id="confirmPresentation">0.0</div>
            </div>
            <div class="row">
              <div class="col-6">Technical Skills:</div>
              <div class="col-6 text-end" id="confirmTechnical">0.0</div>
            </div>
            <div class="row">
              <div class="col-6">Overall Impact:</div>
              <div class="col-6 text-end" id="confirmImpact">0.0</div>
            </div>
            <div class="row mt-2 fw-bold">
              <div class="col-6">Total Score:</div>
              <div class="col-6 text-end" id="confirmTotal">0.0</div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary" id="confirmSubmitBtn">Confirm & Submit</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="timeWarningModal" tabindex="-1" aria-labelledby="timeWarningModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-warning">
          <h5 class="modal-title" id="timeWarningModalLabel">Time Warning</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="text-center mb-3">
            <i class="bi bi-exclamation-triangle-fill text-warning" style="font-size: 3rem;"></i>
          </div>
          <p class="text-center">You have less than <strong>1 minute</strong> remaining to complete your scoring.</p>
          <p class="text-center">Please finalize your scores and submit.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Continue Scoring</button>
        </div>
      </div>
    </div>
  </div>

<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="logoutModalLabel">Logout Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to logout?</p>
        <p class="small text-muted">Any unsaved scores will be lost.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="confirmLogoutBtn">Logout</button>
      </div>
    </div>
  </div>
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="scoring.js"></script>
</body>
</html>
