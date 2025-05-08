<?php
include 'db.php';

header('Content-Type: application/json');

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
$sort = isset($_GET['sort']) && $_GET['sort'] === 'latest' ? 'DESC' : 'ASC';

$offset = ($page - 1) * $limit;

// Get total article count
$totalResult = $conn->query("SELECT COUNT(*) AS total FROM empirearticle");
$totalArticles = $totalResult->fetch_assoc()['total'];

// Get paginated articles
$stmt = $conn->prepare("SELECT title, description, author, slug, image, created_at FROM empirearticle ORDER BY created_at $sort LIMIT ? OFFSET ?");
$stmt->bind_param("ii", $limit, $offset);
$stmt->execute();
$result = $stmt->get_result();

$articles = [];
while ($row = $result->fetch_assoc()) {
    $articles[] = [
        'title' => htmlspecialchars($row['title']),
        'description' => htmlspecialchars($row['description']),
        'author' => htmlspecialchars($row['author']),


        'slug' => $row['slug'],
        'coverImage' => $row['image'] ? htmlspecialchars($row['image']) : '/uploads/default-image.jpg',
        'createdAt' => $row['created_at']
    ];
}

echo json_encode([
    'articles' => $articles,
    'totalArticles' => $totalArticles
]);
?>
