<?php
// Include database connection
include 'db.php';

// Prepare the SQL query
$sql = "SELECT email FROM emails"; // Replace 'emails' with your table name and 'email' with the column name
$result = $conn->query($sql);

$emails = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $emails[] = $row['email']; // Push each email to the array
    }
}

// Return the emails as JSON
header('Content-Type: application/json');
echo json_encode($emails);



// Close the connection
$conn->close();
?>
