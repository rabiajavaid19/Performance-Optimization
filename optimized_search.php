<?php
// optimized_search.php
include 'db.php';

// Get user inputs
$location = $_GET['location'] ?? '';
$min_price = $_GET['min_price'] ?? 0;
$max_price = $_GET['max_price'] ?? 100000;

// SQL query with optimized JOIN and indexing
$sql = "SELECT b.id, b.name, b.location, s.service_name, s.price 
        FROM businesses b
        JOIN services s ON b.id = s.business_id
        WHERE b.location LIKE ?
          AND s.price BETWEEN ? AND ?";

$stmt = $conn->prepare($sql);
$search_location = "%{$location}%";
$stmt->bind_param("sdd", $search_location, $min_price, $max_price);
$stmt->execute();

$result = $stmt->get_result();

$businesses = [];
while ($row = $result->fetch_assoc()) {
    $businesses[] = $row;
}

$stmt->close();
$conn->close();

// Return JSON response
header('Content-Type: application/json');
echo json_encode($businesses);
?>
