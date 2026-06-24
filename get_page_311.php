<?php
$conn = new mysqli('localhost', 'root', 'S1st3m4s2021', 'intranetcpo');
if ($conn->connect_error) die($conn->connect_error);
$res = $conn->query("SELECT post_content FROM wp_posts WHERE ID = 311");
$row = $res->fetch_assoc();
file_put_contents('page_311_current.txt', $row['post_content']);
$conn->close();
?>
