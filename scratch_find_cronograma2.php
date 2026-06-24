<?php
$conn = new mysqli('127.0.0.1', 'root', 'S1st3m4s2021', 'intranetcpo');
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$search_term = '%Cronograma%';
$sql = "SELECT ID, post_title, post_type, post_status FROM wp_posts WHERE post_content LIKE ? OR post_title LIKE ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $search_term, $search_term);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "Found " . $result->num_rows . " posts:\n";
    while ($row = $result->fetch_assoc()) {
        echo "ID: {$row['ID']} | Title: {$row['post_title']} | Type: {$row['post_type']} | Status: {$row['post_status']}\n";
    }
} else {
    echo "No posts found.\n";
}

$stmt->close();
$conn->close();
?>
