<?php
require_once('wp-load.php');
global $wpdb;

$query = "SELECT ID, post_title, post_content FROM {$wpdb->posts} WHERE post_content LIKE '%Torre 5%Urgencias%'";
$results = $wpdb->get_results($query);

echo "--- POSTS CONTAINING 'Torre 5 Urgencias' ---\n";
foreach ($results as $row) {
    echo "ID: {$row->ID}, Title: {$row->post_title}\n";
    preg_match_all('/<a [^>]*href="([^"]*)"[^>]*>.*?Torre 5.*?Urgencias.*?<\/a>/is', $row->post_content, $matches);
    foreach ($matches[1] as $url) {
        echo "  URL: $url\n";
    }
}
?>
