<?php
$servername = "localhost";
$username = "root";
$password = "S1st3m4s2021";
$dbname = "intranetcpo";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$search = 'srviisbog17';
$res = $conn->query("SELECT ID, post_content, post_title FROM wp_posts WHERE post_content LIKE '%$search%'");

if ($res->num_rows > 0) {
    while($row = $res->fetch_assoc()) {
        echo "Found srviisbog17 in ID: " . $row['ID'] . "\n";
    }
} else {
    echo "No srviisbog17 found in wp_posts.\n";
}

$conn->close();
?>
