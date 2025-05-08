<?php
// Include database connection
include 'db.php';

// Get the email from the POST request
$email = $_POST['email'] ?? '';

if (!empty($email)) {
    // Prepare the SQL statement to insert the email
    $stmt = $conn->prepare("INSERT INTO emails (email) VALUES (?)");
    $stmt->bind_param('s', $email);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Email added successfully']);
    } else {
        echo json_encode(['success' => false, 'error' => $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(['success' => false, 'error' => 'No email provided']);
}

$conn->close();
?>


