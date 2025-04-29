<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Event Results</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <h2>Event Results: Mr. & Ms. STI</h2>
  <p>Status: <span class="badge bg-secondary">Completed</span></p>

  <h5 class="mt-4">inal Rankings</h5>
  <ol class="list-group list-group-numbered">
    <li class="list-group-item d-flex justify-content-between">
      Contestant 1 <span class="badge bg-success">91.0</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
      Contestant 2 <span class="badge bg-primary">86.3</span>
    </li>
  </ol>

  <button class="btn btn-outline-primary mt-4" onclick="downloadPDF()">
    <i class="bi bi-download"></i> Download Results PDF
  </button>

  <script>
    function downloadPDF() {
      alert("Downloading PDF (feature under development)");
      // Or trigger actual PDF export
    }
  </script>
</body>
</html>
