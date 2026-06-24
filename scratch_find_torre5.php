<?php
$conn = new mysqli('127.0.0.1', 'root', 'S1st3m4s2021', 'intranetcpo');
if ($conn->connect_error) die($conn->connect_error);
$res = $conn->query("SELECT post_content FROM wp_posts WHERE ID = 526");
$row = $res->fetch_assoc();
$content = $row['post_content'];

// Find all links related to Torre 5
preg_match_all('/<a [^>]*href="[^"]*"[^>]*>.*?Torre 5.*?<\/a>/is', $content, $matches);
foreach ($matches[0] as $match) {
    echo "MATCH: " . htmlspecialchars($match) . "\n\n";
}

// Also show some context around Torre 5
$pos = strpos($content, 'Torre 5');
if ($pos !== false) {
    echo "CONTEXT:\n" . substr($content, $pos - 200, 1000) . "\n";
}

$conn->close();
?>
