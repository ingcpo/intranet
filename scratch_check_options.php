<?php
require_once('wp-load.php');
global $wpdb;

$query = "SELECT option_name, option_value FROM {$wpdb->options} WHERE option_value LIKE '%srviisbog21%' OR option_value LIKE '%srviisbog22%'";
$results = $wpdb->get_results($query);

echo "--- OPTIONS CONTAINING srviisbog ---\n";
foreach ($results as $row) {
    echo "Option: {$row->option_name}\n";
    // echo "  Value: " . substr($row->option_value, 0, 100) . "...\n";
}
?>
