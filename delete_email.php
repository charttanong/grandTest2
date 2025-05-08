<?php
// Include database connection
include 'db.php';

// Get the email to delete
$email = $_GET['email'] ?? '';

if ($email) {
    // Prepare the SQL query to delete the email
    $stmt = $conn->prepare("DELETE FROM emails WHERE email = ?");
    $stmt->bind_param('s', $email);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(['success' => false, 'error' => 'No email provided']);
}

$conn->close();
?>
