<?php
$conn = new mysqli('localhost', 'root', 'S1st3m4s2021', 'intranetcpo');
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$page_id = 526;
$res = $conn->query("SELECT post_content FROM wp_posts WHERE ID = $page_id");
$row = $res->fetch_assoc();
$content = $row['post_content'];

$new_url = 'http://srviisbog22:81/Produccion/LogOnForm.aspx?ReturnUrl=%2fProduccion';

// We want to replace the href for Torre 5 Urgencias.
// Since we saw it might be srviisbog21 or something else, let's be generic but careful.
// The structure is: <a href="OLD_URL"><img ...></a> ... <figcaption><a href="OLD_URL">Torre 5<br>Urgencias</a></figcaption>

// Pattern to find the block for Torre 5 Urgencias
$pattern = '/(<a href=")([^"]*)("><img [^>]*icono-torre-5u-1\.jpg[^>]*><\/a><figcaption><a href=")([^"]*)(">Torre 5(?:<br>|\s+)Urgencias<\/a><\/figcaption>)/i';

$new_content = preg_replace_callback($pattern, function($m) use ($new_url) {
    return $m[1] . $new_url . $m[3] . $new_url . $m[5];
}, $content);

if ($new_content !== $content) {
    $stmt = $conn->prepare("UPDATE wp_posts SET post_content = ? WHERE ID = ?");
    $stmt->bind_param("si", $new_content, $page_id);
    if ($stmt->execute()) {
        echo "Successfully updated Torre 5 Urgencias link to srviisbog22.";
    } else {
        echo "Error updating database: " . $stmt->error;
    }
} else {
    echo "No changes made. Link might already be correct or pattern did not match.";
    // Check if it's already correct
    if (strpos($content, $new_url) !== false && strpos($content, 'Torre 5<br>Urgencias') !== false) {
        echo " Link appears to be already pointing to srviisbog22.";
    }
}

$conn->close();
?>
