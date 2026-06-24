<?php
$conn = new mysqli('localhost', 'root', 'S1st3m4s2021', 'intranetcpo');
if ($conn->connect_error) die($conn->connect_error);

$search_term = '%10.10.74.11%';

$res = $conn->query("SHOW TABLES");
$tables = [];
while ($row = $res->fetch_row()) {
    $tables[] = $row[0];
}

foreach ($tables as $table) {
    $res_cols = $conn->query("SHOW COLUMNS FROM `$table`");
    $text_columns = [];
    while ($col = $res_cols->fetch_assoc()) {
        if (preg_match('/text|char/i', $col['Type'])) {
            $text_columns[] = $col['Field'];
        }
    }
    
    if (empty($text_columns)) continue;
    
    $where_clauses = [];
    foreach ($text_columns as $col) {
        $where_clauses[] = "`$col` LIKE '" . $conn->real_escape_string($search_term) . "'";
    }
    $where_sql = implode(' OR ', $where_clauses);
    
    $query = "SELECT * FROM `$table` WHERE $where_sql LIMIT 5";
    $res_search = $conn->query($query);
    if ($res_search && $res_search->num_rows > 0) {
        echo "Found in table: $table\n";
        while ($row = $res_search->fetch_assoc()) {
            foreach ($text_columns as $col) {
                if (stripos($row[$col], '10.10.74.11') !== false) {
                    echo "  Column $col contains it! Row ID/Key: " . reset($row) . "\n";
                    echo "  Snippet: " . substr(strip_tags($row[$col]), 0, 150) . "...\n";
                }
            }
        }
        echo "\n";
    }
}
$conn->close();
echo "Done.\n";
?>
