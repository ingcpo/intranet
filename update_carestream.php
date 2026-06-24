<?php
$conn = new mysqli('localhost', 'root', 'S1st3m4s2021', 'intranetcpo');
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// 1. Backup current content of page 311 to page_311_before_carestream_update.txt
$res = $conn->query("SELECT post_content FROM wp_posts WHERE ID = 311");
if ($res && $row = $res->fetch_assoc()) {
    file_put_contents('page_311_before_carestream_update.txt', $row['post_content']);
    echo "Backup of page 311 content saved to 'page_311_before_carestream_update.txt'.\n";
} else {
    echo "Could not fetch page 311 content for backup.\n";
}

// 2. Perform global URL replacement in wp_posts
$old_url = 'http://10.10.74.11/portal/login.aspx';
$new_url = 'https://imgvs.virreysolisips.com.co:5021/login';

$query = "UPDATE wp_posts SET post_content = REPLACE(post_content, ?, ?) WHERE post_content LIKE ?";
$stmt = $conn->prepare($query);
$like_old = '%' . $old_url . '%';
$stmt->bind_param("sss", $old_url, $new_url, $like_old);

if ($stmt->execute()) {
    echo "Successfully updated wp_posts table. Rows affected: " . $stmt->affected_rows . "\n";
} else {
    echo "Error updating wp_posts table: " . $stmt->error . "\n";
}

// 3. Write updated content to page_311_current.txt to sync local file system
$res2 = $conn->query("SELECT post_content FROM wp_posts WHERE ID = 311");
if ($res2 && $row2 = $res2->fetch_assoc()) {
    file_put_contents('page_311_current.txt', $row2['post_content']);
    echo "Updated content of page 311 synchronized to 'page_311_current.txt'.\n";
}

$conn->close();
echo "Update complete.\n";
?>
