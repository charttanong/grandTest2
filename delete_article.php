<?php
include 'db.php';

if (!isset($_GET['slug'])) {
    echo json_encode(['success' => false, 'error' => 'No slug provided']);
    exit;
}

// Check if slug is provided
if (!isset($_GET['slug'])) {
    echo json_encode(['success' => false, 'error' => 'No slug provided']);
    exit;
}

$slug = $_GET['slug'];

// Prepare the SQL query to delete by slug
$sql = "DELETE FROM empirearticle WHERE slug = ?";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("s", $slug);
    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'No article found with this slug.']);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Error executing query.']);
    }
    $stmt->close();
} else {
    echo json_encode(['success' => false, 'error' => 'Error preparing statement.']);
}

$conn->close();
?>