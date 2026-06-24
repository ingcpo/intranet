<?php
$conn = new mysqli('localhost', 'root', 'S1st3m4s2021', 'intranetcpo');
if ($conn->connect_error) die($conn->connect_error);

$res = $conn->query("SELECT ID, post_title, post_type, post_content FROM wp_posts WHERE post_content LIKE '%10.10.74.11%'");
while($row = $res->fetch_assoc()) {
    echo "ID: {$row['ID']} | Title: {$row['post_title']} | Type: {$row['post_type']}\n";
    // Find lines containing 10.10.74.11
    $lines = explode("\n", $row['post_content']);
    foreach ($lines as $i => $line) {
        if (stripos($line, '10.10.74.11') !== false) {
            echo "  Line " . ($i + 1) . ": " . trim($line) . "\n";
        }
    }
    echo "-------------------------------------\n";
}
$conn->close();
?>
