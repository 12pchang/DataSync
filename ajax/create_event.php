<?php
require_once '../includes/db.php'; // Your DB connection

$response = ['success' => false, 'message' => ''];

try {
  // Sanitize event fields
  $title = trim($_POST['event_title'] ?? '');
  $description = trim($_POST['event_description'] ?? '');
  $date = $_POST['event_date'] ?? null;
  $time = $_POST['event_time'] ?? null;
  $status = $_POST['event_status'] ?? 'Upcoming';
  $background = $_POST['background_image'] ?? null;
  $createdBy = $_SESSION['user_id'] ?? 1; // Adjust this as needed

  if (!$title || !$date) {
    throw new Exception("Missing required event fields.");
  }

  // Insert event
  $stmt = $pdo->prepare("INSERT INTO events (title, description, date, time, status, background_image, created_by) VALUES (?, ?, ?, ?, ?, ?, ?)");
  $stmt->execute([$title, $description, $date, $time, $status, $background, $createdBy]);
  $eventId = $pdo->lastInsertId();

  // Handle rounds + criteria
  if (isset($_POST['rounds']) && is_array($_POST['rounds'])) {
    foreach ($_POST['rounds'] as $i => $roundName) {
      $stmt = $pdo->prepare("INSERT INTO event_rounds (event_id, name, order_number) VALUES (?, ?, ?)");
      $stmt->execute([$eventId, $roundName, $i + 1]);
      $roundId = $pdo->lastInsertId();

      // Criteria under each round
      if (isset($_POST['criteria'][$i]) && is_array($_POST['criteria'][$i])) {
        foreach ($_POST['criteria'][$i] as $criterion) {
          $critName = $criterion['name'];
          $percentage = $criterion['percentage'];
          $stmt = $pdo->prepare("INSERT INTO criteria (round_id, name, percentage) VALUES (?, ?, ?)");
          $stmt->execute([$roundId, $critName, $percentage]);
        }
      }
    }
  }

  // Insert contestants
  if (isset($_POST['contestants']) && is_array($_POST['contestants'])) {
    foreach ($_POST['contestants'] as $con) {
      $name = $con['name'];
      $number = $con['number'];
      $photo = $con['photo'] ?? null;
      $stmt = $pdo->prepare("INSERT INTO contestants (event_id, name, number, photo) VALUES (?, ?, ?, ?)");
      $stmt->execute([$eventId, $name, $number, $photo]);
    }
  }

  // Insert judges
  if (isset($_POST['judges']) && is_array($_POST['judges'])) {
    foreach ($_POST['judges'] as $judge) {
      $name = $judge['name'];
      $email = $judge['email'];
      $stmt = $pdo->prepare("INSERT INTO judges (event_id, name, email) VALUES (?, ?, ?)");
      $stmt->execute([$eventId, $name, $email]);
    }
  }

  $response['success'] = true;
  $response['message'] = 'Event created successfully';

} catch (Exception $e) {
  $response['message'] = $e->getMessage();
}

header('Content-Type: application/json');
echo json_encode($response);
