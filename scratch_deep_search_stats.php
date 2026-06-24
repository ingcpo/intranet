<?php
require_once('wp-load.php');
global $wpdb;

$query = "SELECT ID, post_title, post_type, post_status FROM {$wpdb->posts} WHERE post_content LIKE '%Torre 5%Urgencias%'";
$results = $wpdb->get_results($query);

echo "--- POSTS SUMMARY ---\n";
$types = [];
$statuses = [];
foreach ($results as $row) {
    $types[$row->post_type] = ($types[$row->post_type] ?? 0) + 1;
    $statuses[$row->post_status] = ($statuses[$row->post_status] ?? 0) + 1;
    echo "ID: {$row->ID}, Type: {$row->post_type}, Status: {$row->post_status}, Title: {$row->post_title}\n";
}

echo "\n--- STATISTICS ---\n";
echo "Types: " . json_encode($types) . "\n";
echo "Statuses: " . json_encode($statuses) . "\n";
?>
