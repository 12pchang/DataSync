<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reports - DataSync</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../../public/assets/css/reports.css">
  <!-- Add jsPDF and xlsx libraries -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js"></script>
  <script src="https://cdn.sheetjs.com/xlsx-0.19.3/package/dist/xlsx.full.min.js"></script>
</head>
<body>
  <div class="app-container">

  <?php include '../../includes/sidebar.php'; ?>
<?php include '../../includes/header.php'; ?>

    <div class="main-content mt-4">
      <div class="content-wrapper">

        <div class="content-header">
          <div>
            <h1 class="page-title">Tabulation Report</h1>
            <!-- <p class="page-subtitle">View final scores and rankings for: Mr. & Ms. Intramurals 2025</p> -->
          </div>
          <div>
            <button class="btn btn-primary" id="addReportBtn">
              <i class="bi bi-plus-circle me-2"></i> Generate New Report
            </button>
          </div>
        </div>
        <div class="content-card">
          <div class="search-actions-container">
            <div class="search-container">
              <input type="text" class="form-control search-input" placeholder="Search participants...">
            </div>
            <div class="action-buttons">
              <button class="btn btn-outline-secondary" id="exportPdfBtn">
                <i class="bi bi-file-pdf me-1"></i> Export PDF
              </button>
              <!-- <button class="btn btn-outline-secondary" id="exportExcelBtn">
                <i class="bi bi-file-excel me-1"></i> Export Excel
              </button> -->
              <button class="btn btn-outline-secondary" id="printBtn">
                <i class="bi bi-printer me-1"></i> Print
              </button>
              <button class="btn btn-outline-secondary filter-btn">
                <i class="bi bi-funnel me-1"></i> Filter
              </button>
            </div>
          </div>

          <div class="table-responsive">
            <table class="table" id="participantsTable">
              <thead>
                <tr>
                  <th>Rank</th>
                  <th>Name</th>
                  <th>Judge 1</th>
                  <th>Judge 2</th>
                  <th>Judge 3</th>
                  <th>Total Score</th>
                  <th>Average</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Ronalyn Molera</td>
                  <td>98</td>
                  <td>97.5</td>
                  <td>97</td>
                  <td>292.5</td>
                  <td>97.5</td>
                  <td><span class="status-badge top-1">Top 1</span></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Sophia Santos</td>
                  <td>95</td>
                  <td>94</td>
                  <td>96</td>
                  <td>285</td>
                  <td>95.0</td>
                  <td><span class="status-badge top-3">Top 2</span></td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Maria Clara</td>
                  <td>93</td>
                  <td>92.5</td>
                  <td>93</td>
                  <td>278.5</td>
                  <td>92.8</td>
                  <td><span class="status-badge top-3">Top 3</span></td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>Ella Loresca</td>
                  <td>88</td>
                  <td>90</td>
                  <td>89</td>
                  <td>267</td>
                  <td>89.0</td>
                  <td><span class="status-badge top-5">Top 4</span></td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>John Ricardo</td>
                  <td>87</td>
                  <td>86</td>
                  <td>88</td>
                  <td>261</td>
                  <td>87.0</td>
                  <td><span class="status-badge top-5">Top 5</span></td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="table-info mt-3">
            <div class="pagination-info">
              Showing all 5 participants
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="filterModalLabel">Filter Results</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="categoryFilter" class="form-label">Category</label>
            <select class="form-select" id="categoryFilter">
              <option value="all" selected>All Categories</option>
              <option value="male">Male Category</option>
              <option value="female">Female Category</option>
              <option value="talent">Talent</option>
              <option value="evening">Evening Wear</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="judgeFilter" class="form-label">Judge</label>
            <select class="form-select" id="judgeFilter">
              <option value="all" selected>All Judges</option>
              <option value="1">Judge 1</option>
              <option value="2">Judge 2</option>
              <option value="3">Judge 3</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="scoreRangeFilter" class="form-label">Minimum Score: <span id="scoreValue">80</span></label>
            <input type="range" class="form-range" min="70" max="100" value="80" id="scoreRangeFilter">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary" id="applyFilterBtn">Apply Filters</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../../public/assets/js/reports.js"></script>
</body>
</html>
