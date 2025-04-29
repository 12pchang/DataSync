<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Preview Event</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <h2>Preview Event: Mr. & Ms. STI</h2>
  <p>Status: <span class="badge bg-warning text-dark">Upcoming</span></p>

  <h5>Event Details</h5>
  <ul>
    <li><strong>Date:</strong> April 20, 2025</li>
    <li><strong>Time:</strong> 3:00 PM</li>
    <li><strong>Judges:</strong> Judge A, Judge B, Judge C</li>
    <li><strong>Contestants:</strong> 8 total</li>
  </ul>

  <button class="btn btn-success mt-3" onclick="startEvent()">Start Event</button>

  <script>
    function startEvent() {
      alert("Event started! Redirecting to live scoring...");
      window.location.href = "live_score.php?event_id=1";
    }
  </script>
</body>
</html>
