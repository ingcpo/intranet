<?php
$conn = new mysqli('localhost', 'root', 'S1st3m4s2021', 'intranetcpo');
if ($conn->connect_error) die($conn->connect_error);
$res = $conn->query("SELECT ID, post_title, post_name FROM wp_posts WHERE post_title LIKE '%Aplicativos Asistenciales%' AND post_status = 'publish'");
while($row = $res->fetch_assoc()) {
    print_r($row);
}
$conn->close();
?>
