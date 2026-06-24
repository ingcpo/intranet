<?php
require_once('wp-load.php');
global $wpdb;

$search_term = '%Cronograma Mant%';

$tables = $wpdb->get_col("SHOW TABLES");

foreach ($tables as $table) {
    // Only search relevant columns (varchar, text, longtext)
    $columns = $wpdb->get_results("SHOW COLUMNS FROM $table");
    $text_columns = [];
    foreach ($columns as $col) {
        if (preg_match('/text|char/i', $col->Type)) {
            $text_columns[] = $col->Field;
        }
    }
    
    if (empty($text_columns)) continue;
    
    $where_clauses = [];
    foreach ($text_columns as $col) {
        $where_clauses[] = "$col LIKE '$search_term'";
    }
    $where_sql = implode(' OR ', $where_clauses);
    
    $results = $wpdb->get_results("SELECT * FROM $table WHERE $where_sql LIMIT 5", ARRAY_A);
    if ($results) {
        echo "Found in table: $table\n";
        foreach ($results as $row) {
            foreach ($text_columns as $col) {
                if (stripos($row[$col], 'Cronograma Mant') !== false) {
                    echo "  Column $col contains it! Row ID (approx): " . reset($row) . "\n";
                    echo "  Snippet: " . substr(strip_tags($row[$col]), 0, 100) . "...\n";
                }
            }
        }
        echo "\n";
    }
}
echo "Done.\n";
?>
