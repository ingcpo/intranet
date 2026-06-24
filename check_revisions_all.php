<?php
$servername = "localhost";
$username = "root";
$password = "S1st3m4s2021";
$dbname = "intranetcpo";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Find revisions of post 526
$res = $conn->query("SELECT ID, post_content, post_modified FROM wp_posts WHERE post_parent = 526 AND post_type = 'revision' ORDER BY post_modified DESC LIMIT 5");

while($row = $res->fetch_assoc()) {
    echo "Revision ID: " . $row['ID'] . " Modified: " . $row['post_modified'] . "\n";
    
    // Show context for all Torre links to see what's there
    preg_match_all('/<a href="([^"]+)">Torre [^<]+<\/a>/', $row['post_content'], $matches);
    print_r($matches[0]);
    preg_match_all('/<a href="([^"]+)">Torre 5[^<]*(?:<br\s*\/?>)?[^<]*<\/a>/i', $row['post_content'], $matches_br);
    print_r($matches_br[0]);
    echo "-------------------\n";
}

$conn->close();
?>
