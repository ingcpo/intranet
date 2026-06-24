<?php
$conn = new mysqli('localhost', 'root', 'S1st3m4s2021', 'intranetcpo');
if ($conn->connect_error) die($conn->connect_error);
$res = $conn->query("SELECT post_content FROM wp_posts WHERE ID = 526");
$row = $res->fetch_assoc();
$content = $row['post_content'];

// Replace srviisbog21 with srviisbog17 ONLY in blocks that contain "Torre 6" or "Torre 7"
// However, the links are in <a> tags BEFORE the text.
// The structure is: <a href="srviisbog21..."><img ...></a><figcaption><a href="srviisbog17...">Torre 7</a></figcaption>

// I'll use a regex to find these patterns and fix them.
// We want to find cases where an image link and a text link are different within the same block.

// Fix Torre 6
$content = preg_replace_callback('/(<a href="http:\/\/srviisbog21:81\/Produccion\/[^"]+"><img [^>]+><\/a><figcaption><a [^>]+>Torre 6<\/a><\/figcaption>)/i', function($m) {
    return str_replace('srviisbog21', 'srviisbog17', $m[0]);
}, $content);

// Fix Torre 7
$content = preg_replace_callback('/(<a href="http:\/\/srviisbog21:81\/Produccion\/[^"]+"><img [^>]+><\/a><figcaption><a [^>]+>Torre 7<\/a><\/figcaption>)/i', function($m) {
    return str_replace('srviisbog21', 'srviisbog17', $m[0]);
}, $content);

$stmt = $conn->prepare("UPDATE wp_posts SET post_content = ? WHERE ID = 526");
$stmt->bind_param("s", $content);
if ($stmt->execute()) {
    echo "Successfully fixed image links for Torre 6 and Torre 7.\n";
} else {
    echo "Error updating: " . $stmt->error . "\n";
}

$conn->close();
?>
