<?php
$conn = new mysqli('localhost', 'root', 'S1st3m4s2021', 'intranetcpo');
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
$res = $conn->query("SELECT post_content FROM wp_posts WHERE ID = 526");
$row = $res->fetch_assoc();
file_put_contents('page_526_content.txt', $row['post_content']);
echo "Dumped page 526 to page_526_content.txt successfully.";
$conn->close();
?>
