<?php
// Include the database connection file
include 'db.php';

// Get the 'group' parameter from the query string or default to an empty string
$group = $_GET['group'] ?? '';

// Construct the SQL query
$sql = "SELECT * FROM staff";
if ($group) {
    $sql .= " WHERE group_name = ?";
}

try {
    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind the 'group' parameter if it exists
    if ($group) {
        $stmt->bind_param('s', $group);
    }

    // Execute the statement
    $stmt->execute();

    // Get the result set
    $result = $stmt->get_result();

    // Fetch data into an array
    $staff = [];
    while ($row = $result->fetch_assoc()) {
        $staff[] = $row;
    }

    // Output the data as JSON
    echo json_encode($staff);

    // Close the statement
    $stmt->close();
} catch (Exception $e) {
    // Return an error response if something goes wrong
    echo json_encode(['error' => 'An error occurred: ' . $e->getMessage()]);
}

// Close the database connection
$conn->close();
?>
