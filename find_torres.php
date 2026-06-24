<?php
$servername = "localhost";
$username = "root";
$password = "S1st3m4s2021";
$dbname = "intranetcpo";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$res = $conn->query("SELECT post_content FROM wp_posts WHERE ID = 526");
$row = $res->fetch_assoc();
$content = $row['post_content'];

// Find all matches of Torre and their surrounding context (links)
preg_match_all('/<a href="([^"]+)">Torre [^<]+<\/a>/', $content, $matches);

print_r($matches[0]);

$conn->close();
?>
