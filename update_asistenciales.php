<?php
$conn = new mysqli('localhost', 'root', 'S1st3m4s2021', 'intranetcpo');
if ($conn->connect_error) die($conn->connect_error);

$page_id = 311;
$res = $conn->query("SELECT post_content FROM wp_posts WHERE ID = $page_id");
$row = $res->fetch_assoc();
$content = $row['post_content'];

$target = '<!-- wp:kadence/column {"id":3,"uniqueID":"_718c0b-77","textAlign":["center","",""],"className":"card-aplicativo","kioblocks":[]} -->
<div class="wp-block-kadence-column inner-column-3 kadence-column_718c0b-77 card-aplicativo"><div class="kt-inside-inner-col"><!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"kioblocks":[]} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"c-btn-azul","kioblocks":[]} /--></div>
<!-- /wp:buttons -->

<!-- wp:image {"id":10207,"sizeSlug":"full","linkDestination":"custom","className":"margenIconos","kioblocks":[]} -->
<figure class="wp-block-image size-full margenIconos"><img src="https://nuevaintranet/intranet/wp-content/uploads/2026/01/htmlRecurso-3-2.png" alt="" class="wp-image-10207"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"oculto","kioblocks":[]} -->
<p class="oculto"></p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:kadence/column -->';

$replacement = '<!-- wp:kadence/column {"id":3,"uniqueID":"_718c0b-77","textAlign":["center","",""],"className":"card-aplicativo","kioblocks":[]} -->
<div class="wp-block-kadence-column inner-column-3 kadence-column_718c0b-77 card-aplicativo"><div class="kt-inside-inner-col"><!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","orientation":"horizontal"},"kioblocks":[]} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"c-btn-azul","kioblocks":[]} -->
<div class="wp-block-button c-btn-azul"><a class="wp-block-button__link" href="http://10.10.15.118/contingencia_cpo/" target="_blank" rel="noreferrer noopener">CONTIGENCIA URGENCIA</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:image {"align":"center","id":10400,"sizeSlug":"large","linkDestination":"custom","className":"margenIconos","kioblocks":[]} -->
<div class="wp-block-image margenIconos"><figure class="aligncenter size-large"><a href="http://10.10.15.118/contingencia_cpo/" target="_blank" rel="noopener"><img src="http://nuevaintranet/intranet/wp-content/uploads/2026/04/contingencia_urgencia.png" alt="" class="wp-image-10400"/></a></figure></div>
<!-- /wp:image --></div></div>
<!-- /wp:kadence/column -->';

// Normalize line endings to match the database (usually \n or \r\n)
// Let's try to replace it carefully.
if (strpos($content, $target) !== false) {
    $new_content = str_replace($target, $replacement, $content);
    $stmt = $conn->prepare("UPDATE wp_posts SET post_content = ? WHERE ID = ?");
    $stmt->bind_param("si", $new_content, $page_id);
    if ($stmt->execute()) {
        echo "Successfully updated Aplicativos Asistenciales page.\n";
    } else {
        echo "Error updating database: " . $stmt->error . "\n";
    }
} else {
    echo "Target content not found in database. Check line endings or structure.\n";
    // Debug: show a bit of what we found
    $start_pos = strpos($content, 'uniqueID":"_718c0b-77"');
    if ($start_pos !== false) {
        echo "Found uniqueID at position $start_pos. Context:\n";
        echo substr($content, $start_pos - 50, 500);
    }
}

$conn->close();
?>
