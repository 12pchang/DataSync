<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Live Scoring</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <h2>Live Scoring: Mr. & Ms. STI</h2>
  <p>Status: <span class="badge bg-success">Ongoing</span></p>

  <h5 class="mt-4">Live Scores</h5>
  <table class="table table-bordered mt-2">
    <thead class="table-light">
      <tr>
        <th>Contestant</th>
        <th>Judge A</th>
        <th>Judge B</th>
        <th>Judge C</th>
        <th>Average</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Contestant 1</td>
        <td>90</td>
        <td>92</td>
        <td>91</td>
        <td><strong>91.0</strong></td>
      </tr>
      <tr>
        <td>Contestant 2</td>
        <td>85</td>
        <td>86</td>
        <td>88</td>
        <td><strong>86.3</strong></td>
      </tr>
    </tbody>
  </table>

  <button class="btn btn-danger mt-3" onclick="endEvent()">End Event</button>

  <script>
    function endEvent() {
      alert("Event ended! Redirecting to results...");
      window.location.href = "event_results.php?event_id=1";
    }
  </script>
</body>
</html>
