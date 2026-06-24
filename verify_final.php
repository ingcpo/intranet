<?php
$conn = new mysqli('localhost', 'root', 'S1st3m4s2021', 'intranetcpo');
if ($conn->connect_error) die($conn->connect_error);
$res = $conn->query("SELECT post_content FROM wp_posts WHERE ID = 526");
$row = $res->fetch_assoc();
$content = $row['post_content'];

echo "Verification Results:\n";
foreach (['Torre 5 Urgencias', 'Torre 6', 'Torre 7'] as $torre) {
    echo "\n$torre:\n";
    $pos = strpos($content, $torre);
    if ($pos !== false) {
        $context = substr($content, $pos - 400, 600);
        preg_match_all('/href="http:\/\/([^:"]+):81/', $context, $matches);
        foreach ($matches[1] as $host) {
            echo "- Found link to: $host\n";
        }
    } else {
        echo "- Not found!\n";
    }
}
$conn->close();
?>
