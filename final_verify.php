<?php
$servername = "localhost";
$username = "root";
$password = "S1st3m4s2021";
$dbname = "intranetcpo";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$search_21 = 'srviisbog21';
$search_17 = 'srviisbog17';

echo "Searching for srviisbog21 (should only be Torre 5 Urgencias):\n";
$res = $conn->query("SELECT post_content FROM wp_posts WHERE ID = 526");
$row = $res->fetch_assoc();
$content = $row['post_content'];

preg_match_all('/<a href="[^"]*srviisbog21[^"]*">[^<]*(?:<br\s*\/?>)?[^<]*<\/a>/i', $content, $matches_21);
print_r($matches_21[0]);

echo "\nSearching for srviisbog17 (should be Torre 6 and 7):\n";
preg_match_all('/<a href="[^"]*srviisbog17[^"]*">[^<]*(?:<br\s*\/?>)?[^<]*<\/a>/i', $content, $matches_17);
print_r($matches_17[0]);

$conn->close();
?>
