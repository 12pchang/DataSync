<?php
require_once '../../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['event_id'])) {
    $eventId = intval($_POST['event_id']);

    $database = new Database();
    $conn = $database->getConnection();

    $stmt = $conn->prepare("UPDATE events SET status = 'Ongoing' WHERE event_id = ?");
    $stmt->bind_param("i", $eventId);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => $conn->error]);
    }
} else {
    echo json_encode(["success" => false, "error" => "Invalid request"]);
}
