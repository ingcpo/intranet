<?php
$servername = "localhost";
$username = "root";
$password = "S1st3m4s2021";
$dbname = "intranetcpo";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$search = 'srviisbog21';
$res = $conn->query("SELECT ID, post_content, post_title, post_type FROM wp_posts WHERE post_content LIKE '%$search%'");

while($row = $res->fetch_assoc()) {
    echo "ID: " . $row['ID'] . " Title: " . $row['post_title'] . " Type: " . $row['post_type'] . "\n";
    // Find context for all occurrences of srviisbog21
    preg_match_all('/<a href="([^"]*srviisbog21[^"]*)">([^<]*(?:<br\s*\/?>)?[^<]*)<\/a>/i', $row['post_content'], $matches);
    foreach($matches[0] as $match) {
        echo "Match: " . $match . "\n";
    }
    echo "-------------------\n";
}

$conn->close();
?>
