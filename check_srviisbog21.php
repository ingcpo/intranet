<?php
$servername = "localhost";
$username = "root";
$password = "S1st3m4s2021";
$dbname = "intranetcpo";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$search = 'srviisbog21';
$res = $conn->query("SELECT ID, post_content, post_title FROM wp_posts WHERE post_content LIKE '%$search%' AND post_status = 'publish'");

while($row = $res->fetch_assoc()) {
    echo "ID: " . $row['ID'] . " Title: " . $row['post_title'] . "\n";
    // Find all occurrences of srviisbog21 and their context
    preg_match_all('/<a href="[^"]*srviisbog21[^"]*">[^<]*(?:<br\s*\/?>)?[^<]*<\/a>/i', $row['post_content'], $matches);
    print_r($matches[0]);
    echo "-------------------\n";
}

$conn->close();
?>
