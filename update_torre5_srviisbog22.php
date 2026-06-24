<?php
$conn = new mysqli('localhost', 'root', 'S1st3m4s2021', 'intranetcpo');
if ($conn->connect_error) die($conn->connect_error);

$page_id = 526;
$res = $conn->query("SELECT post_content FROM wp_posts WHERE ID = $page_id");
$row = $res->fetch_assoc();
$content = $row['post_content'];

// The structure for Torre 5 Urgencias as seen before:
// <a href="http://srviisbog21:81/Produccion/LogOnForm.aspx?ReturnUrl=%2fProduccion">
//   <img src="..." />
// </a>
// <figcaption>
//   <a href="http://srviisbog21:81/Produccion/LogOnForm.aspx?ReturnUrl=%2fProduccion">Torre 5<br>Urgencias</a>
// </figcaption>

// We target the block that specifically contains "Torre 5<br>Urgencias" or "Torre 5 Urgencias"
// and the srviisbog21 links.

$new_content = preg_replace_callback('/(<a href="http:\/\/srviisbog21:81\/Produccion\/[^"]+"><img [^>]+><\/a><figcaption><a [^>]+>Torre 5<br>Urgencias<\/a><\/figcaption>)/i', function($m) {
    return str_replace('srviisbog21', 'srviisbog22', $m[0]);
}, $content);

// In case the <br> is not there or structure is slightly different (e.g. whitespace)
if ($new_content === $content) {
    $new_content = preg_replace_callback('/(<a href="http:\/\/srviisbog21:81\/Produccion\/[^"]+"><img [^>]+><\/a><figcaption><a [^>]+>Torre 5\s+Urgencias<\/a><\/figcaption>)/i', function($m) {
        return str_replace('srviisbog21', 'srviisbog22', $m[0]);
    }, $content);
}

if ($new_content !== $content) {
    $stmt = $conn->prepare("UPDATE wp_posts SET post_content = ? WHERE ID = ?");
    $stmt->bind_param("si", $new_content, $page_id);
    if ($stmt->execute()) {
        echo "Successfully updated Torre 5 Urgencias to srviisbog22.\n";
    } else {
        echo "Error updating database: " . $stmt->error . "\n";
    }
} else {
    echo "Target content not found. Coud not update Torre 5 Urgencias.\n";
    // Debug: show what we have for Torre 5
    $pos = strpos($content, 'Torre 5');
    if ($pos !== false) {
        echo "Context found:\n";
        echo substr($content, $pos - 500, 1000);
    }
}

$conn->close();
?>
