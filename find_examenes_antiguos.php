<?php
// Usar 127.0.0.1 en lugar de localhost para evitar IPv6
$conn = new mysqli('127.0.0.1', 'root', 'S1st3m4s2021', 'intranetcpo');
if ($conn->connect_error) die("Error: " . $conn->connect_error . "\n");

echo "Conectado OK\n\n";

// Buscar en la página de Aplicativos Asistenciales (page ID 311)
$page_id = 311;
$res = $conn->query("SELECT post_content FROM wp_posts WHERE ID = $page_id");
$row = $res->fetch_assoc();
$content = $row['post_content'];

$patterns = ['Mediweb', 'imagenesdiagnosticas', 'Examenes', 'examenes', 'antiguo', 'Antiguo', '8080'];

echo "=== Búsqueda en página ID $page_id ===\n";
foreach ($patterns as $pattern) {
    $pos = stripos($content, $pattern);
    if ($pos !== false) {
        echo "ENCONTRADO: '$pattern' en posición $pos\n";
        echo substr($content, max(0, $pos - 200), 600) . "\n";
        echo "---\n";
    } else {
        echo "No encontrado: '$pattern'\n";
    }
}

// Buscar en TODAS las páginas
echo "\n=== Búsqueda en TODAS las páginas ===\n";
$res2 = $conn->query("SELECT ID, post_title, post_content FROM wp_posts WHERE post_status='publish' AND (post_content LIKE '%Mediweb%' OR post_content LIKE '%imagenesdiagnosticas%' OR post_content LIKE '%8080%' OR LOWER(post_content) LIKE '%examenes antiguos%')");
echo "Filas encontradas: " . $res2->num_rows . "\n";
while ($row2 = $res2->fetch_assoc()) {
    echo "Página ID: {$row2['ID']} - {$row2['post_title']}\n";
    foreach (['Mediweb', 'imagenesdiagnosticas', '8080', 'Examenes Antiguos'] as $p) {
        $pos = stripos($row2['post_content'], $p);
        if ($pos !== false) {
            echo "  >> Patrón '$p' encontrado:\n";
            echo substr($row2['post_content'], max(0, $pos - 100), 400) . "\n---\n";
        }
    }
}

// Buscar en postmeta
echo "\n=== Búsqueda en postmeta ===\n";
$res3 = $conn->query("SELECT post_id, meta_key, meta_value FROM wp_postmeta WHERE meta_value LIKE '%Mediweb%' OR meta_value LIKE '%imagenesdiagnosticas%' OR meta_value LIKE '%8080%' LIMIT 20");
echo "Filas: " . $res3->num_rows . "\n";
while ($row3 = $res3->fetch_assoc()) {
    echo "Post ID: {$row3['post_id']} | Meta Key: {$row3['meta_key']}\n";
    echo substr($row3['meta_value'], 0, 500) . "\n---\n";
}

// Buscar en wp_options
echo "\n=== Búsqueda en wp_options ===\n";
$res4 = $conn->query("SELECT option_name, option_value FROM wp_options WHERE option_value LIKE '%Mediweb%' OR option_value LIKE '%imagenesdiagnosticas%' LIMIT 10");
echo "Filas: " . $res4->num_rows . "\n";
while ($row4 = $res4->fetch_assoc()) {
    echo "Option: {$row4['option_name']}\n";
    echo substr($row4['option_value'], 0, 300) . "\n---\n";
}

// Buscar en TODOS los posts (incluyendo borradores, menús, etc.)
echo "\n=== Búsqueda en nav_menus y todos los posts ===\n";
$res5 = $conn->query("SELECT ID, post_type, post_title, post_content, guid FROM wp_posts WHERE post_content LIKE '%Mediweb%' OR post_content LIKE '%imagenesdiagnosticas%' OR guid LIKE '%Mediweb%'");
echo "Filas: " . $res5->num_rows . "\n";
while ($row5 = $res5->fetch_assoc()) {
    echo "ID: {$row5['ID']} | Tipo: {$row5['post_type']} | Título: {$row5['post_title']}\n";
    $pos = stripos($row5['post_content'], 'Mediweb');
    if ($pos !== false) echo substr($row5['post_content'], max(0, $pos-100), 400) . "\n";
}

// Buscar en postmeta de items de menú (nav_menu_item)
echo "\n=== Búsqueda en postmeta de nav_menu_items ===\n";
$res6 = $conn->query("SELECT pm.post_id, pm.meta_key, pm.meta_value, p.post_title FROM wp_postmeta pm JOIN wp_posts p ON p.ID=pm.post_id WHERE p.post_type='nav_menu_item' AND (pm.meta_value LIKE '%Mediweb%' OR pm.meta_value LIKE '%imagenesdiagnosticas%' OR pm.meta_value LIKE '%8080%' OR pm.meta_value LIKE '%Examenes%') LIMIT 20");
echo "Filas: " . $res6->num_rows . "\n";
while ($row6 = $res6->fetch_assoc()) {
    echo "Post ID: {$row6['post_id']} | Título: {$row6['post_title']} | Key: {$row6['meta_key']} | Value: {$row6['meta_value']}\n";
}

$conn->close();
echo "\nDone.\n";
?>
