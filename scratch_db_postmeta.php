<?php
require_once('wp-load.php');
global $wpdb;

$search_term = '%Cronograma%';
$results = $wpdb->get_results($wpdb->prepare("SELECT post_id, meta_key, meta_value FROM $wpdb->postmeta WHERE meta_value LIKE %s", $search_term));

if ($results) {
    echo "Found " . count($results) . " postmeta entries:\n";
    foreach ($results as $row) {
        if (strlen($row->meta_value) < 200) {
            echo "Post ID: {$row->post_id} | Key: {$row->meta_key} | Value: {$row->meta_value}\n";
        } else {
            echo "Post ID: {$row->post_id} | Key: {$row->meta_key} | Value: " . substr($row->meta_value, 0, 100) . "...\n";
        }
    }
} else {
    echo "No postmeta found.\n";
}
?>
