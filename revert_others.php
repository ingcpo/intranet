<?php
$servername = "localhost";
$username = "root";
$password = "S1st3m4s2021";
$dbname = "intranetcpo";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Revert Torre 6 and Torre 7 to srviisbog17
$t6_old = '<a href="http://srviisbog21:81/Produccion/LogOnForm.aspx?ReturnUrl=%2fProduccion">Torre 6</a>';
$t6_new = '<a href="http://srviisbog17:81/Produccion/LogOnForm.aspx?ReturnUrl=%2fProduccion">Torre 6</a>';

$t7_old = '<a href="http://srviisbog21:81/Produccion/LogOnForm.aspx?ReturnUrl=%2fProduccion">Torre 7</a>';
$t7_new = '<a href="http://srviisbog17:81/Produccion/LogOnForm.aspx?ReturnUrl=%2fProduccion">Torre 7</a>';

$query = "UPDATE wp_posts SET post_content = REPLACE(REPLACE(post_content, ?, ?), ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("ssss", $t6_old, $t6_new, $t7_old, $t7_new);

if ($stmt->execute()) {
    echo "Successfully reverted Torre 6 and Torre 7. Rows affected: " . $stmt->affected_rows . "\n";
} else {
    echo "Error reverting: " . $stmt->error . "\n";
}

$conn->close();
?>
