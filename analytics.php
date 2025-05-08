<?php
// Include database connection
include 'db.php';

header('Content-Type: application/json');

// Handle the year parameter
$year = $_GET['year'] ?? date('Y');

// Query the database for visitor data
try {
    // Get total visits
    $totalVisitsQuery = "SELECT COUNT(*) as totalVisits FROM visitors WHERE YEAR(visit_date) = ?";
    $stmt = $conn->prepare($totalVisitsQuery);
    $stmt->bind_param("i", $year);
    $stmt->execute();
    $totalVisitsResult = $stmt->get_result()->fetch_assoc();
    $totalVisits = $totalVisitsResult['totalVisits'];

    // Get device breakdown
    $deviceQuery = "SELECT device, COUNT(*) as count FROM visitors WHERE YEAR(visit_date) = ? GROUP BY device";
    $stmt = $conn->prepare($deviceQuery);
    $stmt->bind_param("i", $year);
    $stmt->execute();
    $deviceResult = $stmt->get_result();
    $devices = ['Desktop' => 0, 'Mobile' => 0, 'Tablet' => 0];

    while ($row = $deviceResult->fetch_assoc()) {
        if (isset($devices[$row['device']])) {
            $devices[$row['device']] = $row['count'];
        }
    }

    // Get browser breakdown
    $browserQuery = "SELECT browser, COUNT(*) as count FROM visitors WHERE YEAR(visit_date) = ? GROUP BY browser";
    $stmt = $conn->prepare($browserQuery);
    $stmt->bind_param("i", $year);
    $stmt->execute();
    $browserResult = $stmt->get_result();
    $browsers = ['Chrome' => 0, 'Firefox' => 0, 'Safari' => 0, 'Other' => 0];

    while ($row = $browserResult->fetch_assoc()) {
        if (isset($browsers[$row['browser']])) {
            $browsers[$row['browser']] = $row['count'];
        } else {
            $browsers['Other'] += $row['count']; // Categorize others as "Other"
        }
    }

    // Get monthly visits
    $monthlyVisitsQuery = "SELECT MONTH(visit_date) as month, COUNT(*) as count FROM visitors WHERE YEAR(visit_date) = ? GROUP BY month";
    $stmt = $conn->prepare($monthlyVisitsQuery);
    $stmt->bind_param("i", $year);
    $stmt->execute();
    $monthlyResult = $stmt->get_result();
    $monthlyVisitors = array_fill(0, 12, 0); // Initialize to 0 for all months

    while ($row = $monthlyResult->fetch_assoc()) {
        $monthlyVisitors[$row['month'] - 1] = $row['count']; // Store monthly data (1-12 months)
    }

    // Return the data as JSON
    echo json_encode([
        'totalVisits' => $totalVisits,
        'devices' => $devices,
        'browsers' => $browsers,
        'monthlyVisitors' => $monthlyVisitors
    ]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
?>
