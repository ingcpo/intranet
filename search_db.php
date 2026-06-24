<?php
$servername = "localhost";
$username = "root";
$password = "S1st3m4s2021";
$dbname = "intranetcpo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$search = 'srviisbog17';
$tables = ['wp_posts', 'wp_postmeta'];

foreach ($tables as $table) {
    echo "Searching in $table...\n";
    $query = "SELECT * FROM $table WHERE ";
    
    // Get columns
    $res = $conn->query("SHOW COLUMNS FROM $table");
    $cols = [];
    while($row = $res->fetch_assoc()) {
        $cols[] = $row['Field'] . " LIKE '%$search%'";
    }
    $query .= implode(" OR ", $cols);
    
    $res = $conn->query($query);
    if ($res->num_rows > 0) {
        while($row = $res->fetch_assoc()) {
            print_r($row);
        }
    } else {
        echo "No results in $table.\n";
    }
}

$conn->close();
?>
