<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $thainame = $_POST['thainame'];
    $position = $_POST['position'];
    $facebook = $_POST['facebook'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $group = $_POST['group'];

    $profileImage = $_FILES['profileImage']['name'];
    $lineQRCode = $_FILES['lineQRCode']['name'];

    // File upload paths
    $profileImagePath = 'uploads/' . basename($profileImage);
    $lineQRCodePath = 'uploads/' . basename($lineQRCode);

    // Move files to the uploads directory
    move_uploaded_file($_FILES['profileImage']['tmp_name'], $profileImagePath);
    move_uploaded_file($_FILES['lineQRCode']['tmp_name'], $lineQRCodePath);

    $stmt = $conn->prepare("INSERT INTO staff (name, thainame, position, facebook, phone, email, group_name, profile_image, line_qr_code) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('sssssssss', $name, $thainame, $position, $facebook, $phone, $email, $group, $profileImagePath, $lineQRCodePath);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Staff member added successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to add staff member']);
    }

    $stmt->close();

}
?>