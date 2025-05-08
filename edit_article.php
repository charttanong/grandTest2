<?php
ob_start(); // Start output buffering
include 'db.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $slug = $_POST['slug'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $content = $_POST['content'];
    $author = $_POST['author'];

    // Handle the image upload or retain the existing image
    $image = $_POST['existing_image']; // Default to the existing image
    if (!empty($_FILES['image']['name'])) {
        // If a new image is uploaded
        $image = 'uploads/' . basename($_FILES['image']['name']);
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $image)) {
            die('Failed to upload the image.');
        }
    }

    // Update the article in the database
    $query = "UPDATE empirearticle SET title = ?, description = ?, content = ?, author = ?, image = ? WHERE slug = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssss", $title, $description, $content, $author, $image, $slug);
    $stmt->execute();

    // Redirect to the article list page
    header('Location: articleboard.php');
    exit;
}
ob_end_flush(); // End output buffering

