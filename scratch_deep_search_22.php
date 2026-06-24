<?php
$conn = new mysqli('localhost', 'root', 'S1st3m4s2021', 'intranetcpo');
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$query = "SELECT ID, post_title FROM wp_posts WHERE post_content LIKE '%srviisbog22%'";
$res = $conn->query($query);
echo "Posts with srviisbog22:<br>";
while($row = $res->fetch_assoc()) {
    echo "ID: " . $row['ID'] . " | Title: " . $row['post_title'] . "<br>";
}

$query = "SELECT option_name FROM wp_options WHERE option_value LIKE '%srviisbog22%'";
$res = $conn->query($query);
echo "<br>Options with srviisbog22:<br>";
while($row = $res->fetch_assoc()) {
    echo "Option: " . $row['option_name'] . "<br>";
}

$query = "SELECT post_id, meta_key FROM wp_postmeta WHERE meta_value LIKE '%srviisbog22%'";
$res = $conn->query($query);
echo "<br>Postmeta with srviisbog22:<br>";
while($row = $res->fetch_assoc()) {
    echo "Post ID: " . $row['post_id'] . " | Meta: " . $row['meta_key'] . "<br>";
}
?>
