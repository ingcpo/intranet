<?php
$conn = new mysqli('localhost', 'root', 'S1st3m4s2021', 'intranetcpo');
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$res = $conn->query("SELECT ID, post_name, post_title, post_status FROM wp_posts WHERE post_name = 'it-salud-ips'");
while($row = $res->fetch_assoc()) {
    echo "ID: " . $row['ID'] . " | Status: " . $row['post_status'] . "<br>";
}
?>
