<?php
$conn = new mysqli('localhost', 'root', 'S1st3m4s2021', 'intranetcpo');
if ($conn->connect_error) die($conn->connect_error);
$res = $conn->query("SELECT post_content FROM wp_posts WHERE ID = 526");
$row = $res->fetch_assoc();
$content = $row['post_content'];

echo "--- TORRE 5 SEARCH ---\n";
$pos5 = strpos($content, 'Torre 5');
if ($pos5 !== false) {
    echo "Found at pos $pos5. Context:\n";
    echo substr($content, $pos5 - 200, 600);
} else {
    echo "Torre 5 not found in post 526.\n";
}
$conn->close();
?>
