<?php
require_once('wp-load.php');
global $wpdb;

$search_term = '%Equipos Industriales%';
$results = $wpdb->get_results($wpdb->prepare("SELECT ID, post_title, post_type, post_status, post_excerpt FROM $wpdb->posts WHERE post_content LIKE %s OR post_title LIKE %s OR post_excerpt LIKE %s", $search_term, $search_term, $search_term));

if ($results) {
    echo "Found " . count($results) . " posts:\n";
    foreach ($results as $row) {
        echo "ID: {$row->ID} | Title: {$row->post_title} | Type: {$row->post_type} | Status: {$row->post_status}\n";
    }
} else {
    echo "No posts found for Equipos Industriales.\n";
}
?>
