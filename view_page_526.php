<?php
$conn = new mysqli('localhost', 'root', 'S1st3m4s2021', 'intranetcpo');
if ($conn->connect_error) die($conn->connect_error);
$res = $conn->query("SELECT post_content FROM wp_posts WHERE ID = 526");
$row = $res->fetch_assoc();
echo $row['post_content'];
$conn->close();
?>
