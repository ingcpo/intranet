<?php
$servername = "localhost";
$username = "root";
$password = "S1st3m4s2021";
$dbname = "intranetcpo";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$old_url = 'http://srviisbog17:81/Produccion/LogOnForm.aspx?ReturnUrl=%2fProduccion';
$new_url = 'http://srviisbog21:81/Produccion/LogOnForm.aspx?ReturnUrl=%2fProduccion';

// We update wp_posts for post_content
$query = "UPDATE wp_posts SET post_content = REPLACE(post_content, ?, ?) WHERE post_content LIKE ?";
$stmt = $conn->prepare($query);
$like_old = '%' . $old_url . '%';
$stmt->bind_param("sss", $old_url, $new_url, $like_old);

if ($stmt->execute()) {
    echo "Successfully updated wp_posts. Rows affected: " . $stmt->affected_rows . "\n";
} else {
    echo "Error updating wp_posts: " . $stmt->error . "\n";
}

$conn->close();
?>
