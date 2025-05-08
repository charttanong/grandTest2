<?php
// Include database connection
include 'db.php';

header('Content-Type: application/json');

// Handle tracking data sent by the frontend
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Get the data from the frontend
        $input = json_decode(file_get_contents('php://input'), true);

        if (!isset($input['ip'], $input['device'], $input['browser'])) {
            throw new Exception('Invalid input data');
        }

        $ip = $input['ip'];
        $device = $input['device'];
        $browser = $input['browser'];

        // Insert data into the database
        $stmt = $conn->prepare("INSERT INTO visitors (ip, device, browser) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $ip, $device, $browser);
        $stmt->execute();

        echo json_encode(['message' => 'User visit logged successfully']);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => $e->getMessage()]);
    }
}
?>
