<?php
$servername = "localhost";
$username = "root";
$password = "S1st3m4s2021";
$dbname = "intranetcpo";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$search = 'srviisbog17';
$res = $conn->query("SELECT ID, post_content, post_title FROM wp_posts WHERE post_content LIKE '%$search%' AND post_status = 'publish'");

while($row = $res->fetch_assoc()) {
    echo "ID: " . $row['ID'] . " Title: " . $row['post_title'] . "\n";
    // Find the context of the search string
    $pos = strpos($row['post_content'], $search);
    $start = max(0, $pos - 100);
    echo "Context: " . substr($row['post_content'], $start, 500) . "\n\n";
}

$conn->close();
?>
