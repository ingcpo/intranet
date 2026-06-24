<?php
$conn = new mysqli('localhost', 'root', 'S1st3m4s2021', 'intranetcpo');
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$page_id = 526;
$res = $conn->query("SELECT post_content FROM wp_posts WHERE ID = $page_id");
$row = $res->fetch_assoc();
$content = $row['post_content'];

$new_content = str_replace(
    'http://srviisbog22:81/Produccion/LogOnForm.aspx?ReturnUrl=%2fProduccion',
    'http://srviisbog17:81/Produccion/LogOnForm.aspx?ReturnUrl=%2fProduccion',
    $content,
    $count
);

if ($count > 0) {
    $stmt = $conn->prepare("UPDATE wp_posts SET post_content = ? WHERE ID = ?");
    $stmt->bind_param("si", $new_content, $page_id);
    if ($stmt->execute()) {
        echo "Successfully updated $count occurrences.";
    } else {
        echo "Error updating: " . $stmt->error;
    }
} else {
    echo "No occurrences found. The link might already be srviisbog17 or the exact string was not found.";
}
$conn->close();
?>
