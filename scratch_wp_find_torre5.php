<?php
require_once('wp-load.php');
global $wpdb;

$page_id = 526;
$content = $wpdb->get_var($wpdb->prepare("SELECT post_content FROM $wpdb->posts WHERE ID = %d", $page_id));

if (!$content) {
    echo "Could not find content for page $page_id\n";
    exit;
}

echo "--- CONTENT FOR PAGE $page_id ---\n";
// Find Torre 5 Urgencias
preg_match_all('/<a [^>]*href="([^"]*)"[^>]*>.*?Torre 5.*?Urgencias.*?<\/a>/is', $content, $matches);
foreach ($matches[0] as $match) {
    echo "MATCH: " . htmlspecialchars($match) . "\n\n";
}

// Show context around Torre 5
$pos = strpos($content, 'Torre 5');
if ($pos !== false) {
    echo "CONTEXT:\n" . substr($content, $pos - 500, 1000) . "\n";
}
?>
