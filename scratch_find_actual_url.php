<?php
$conn = new mysqli('localhost', 'root', 'S1st3m4s2021', 'intranetcpo');
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$page_id = 526;
$res = $conn->query("SELECT post_content FROM wp_posts WHERE ID = $page_id");
$row = $res->fetch_assoc();
$content = $row['post_content'];

preg_match_all('/<a [^>]*href="([^"]*)"[^>]*>.*?Torre 5.*?Urgencias.*?<\/a>/is', $content, $matches);
foreach ($matches[1] as $url) {
    echo "Found URL: " . htmlspecialchars($url) . "<br>";
}
// Also search for srviisbog22 just in case
preg_match_all('/srviisbog22[^"]*/is', $content, $matches2);
if(!empty($matches2[0])){
	foreach ($matches2[0] as $url) {
		echo "Found srviisbog22 URL: " . htmlspecialchars($url) . "<br>";
	}
} else {
	echo "No srviisbog22 found.<br>";
}
?>
