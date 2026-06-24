<?php
$conn = new mysqli('localhost', 'root', 'S1st3m4s2021', 'intranetcpo');
if ($conn->connect_error) die($conn->connect_error);
$res = $conn->query("SELECT post_content FROM wp_posts WHERE ID = 526");
$row = $res->fetch_assoc();
$content = $row['post_content'];

echo "--- TORRE 6 CONTEXT ---\n";
$pos6 = strpos($content, 'Torre 6');
if ($pos6 !== false) {
    echo substr($content, $pos6 - 500, 1000);
}

echo "\n\n--- TORRE 7 CONTEXT ---\n";
$pos7 = strpos($content, 'Torre 7');
if ($pos7 !== false) {
    echo substr($content, $pos7 - 500, 1000);
}

$conn->close();
?>
