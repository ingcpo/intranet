<?php
$conn = new mysqli('localhost', 'root', 'S1st3m4s2021', 'intranetcpo');
if ($conn->connect_error) die($conn->connect_error);
$res = $conn->query("SELECT post_content FROM wp_posts WHERE ID = 311");
$row = $res->fetch_assoc();
$content = $row['post_content'];

// Find the last rowlayout or column where items are added
// Looking at the screenshot, they are in a grid.
// Let's look for images with captions or links.
preg_match_all('/<!-- wp:kadence\/column.*?<!-- \/wp:kadence\/column -->/s', $content, $matches);
foreach($matches[0] as $i => $match) {
    if (strpos($match, 'wp-block-image') !== false) {
        echo "Column $i:\n$match\n\n";
        // Stop after showing one or two to understand structure
        if ($i > 2) break;
    }
}
$conn->close();
?>
