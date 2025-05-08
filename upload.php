<?php
ob_start(); // Start output buffering
include 'db.php'; // Database connection

// Function to generate a slug
function generateSlug($string, $conn) {
    $slug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', trim($string)));
    $originalSlug = $slug;

    $i = 1;
    while (true) {
        $stmt = $conn->prepare("SELECT id FROM empirearticle WHERE slug = ?");
        $stmt->bind_param("s", $slug);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            break;
        }

        $slug = $originalSlug . '-' . $i;
        $i++;
    }

    return $slug;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $content = $_POST['content'];
    $author = $_POST['author'];

    $slug = generateSlug($title, $conn);

    $targetFilePath = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $targetDir = "uploads/";
        $fileName = basename($_FILES['image']['name']);
        $uniqueName = time() . "_" . $fileName;
        $targetFilePath = $targetDir . $uniqueName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array(strtolower($fileType), $allowedTypes)) {
            if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
                echo "Failed to upload image.";
                exit;
            }
        } else {
            echo "Only JPG, JPEG, PNG, and GIF files are allowed.";
            exit;
        }
    }

    $stmt = $conn->prepare("INSERT INTO empirearticle (title, description, content, image, author, slug) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $title, $description, $content, $targetFilePath, $author, $slug);

    if ($stmt->execute()) {
        header("Location: articleboard.php");
        exit();
    } else {
        echo "Database error: " . $conn->error;
    }
}
ob_end_flush(); // End output buffering

