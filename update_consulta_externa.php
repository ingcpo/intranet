<?php
$conn = new mysqli('localhost', 'root', 'S1st3m4s2021', 'intranetcpo');
if ($conn->connect_error) die($conn->connect_error);

$page_id = 311;
$res = $conn->query("SELECT post_content FROM wp_posts WHERE ID = $page_id");
$row = $res->fetch_assoc();
$content = $row['post_content'];

$target = '<!-- wp:kadence/column {"id":4,"borderWidth":[0,0,0,0],"tabletBorderWidth":["","","",""],"mobileBorderWidth":["","","",""],"borderRadius":[0,0,0,0],"uniqueID":"_051d39-0b","backgroundImg":[{"bgImg":"","bgImgID":"","bgImgSize":"cover","bgImgPosition":"center center","bgImgAttachment":"scroll","bgImgRepeat":"no-repeat"}],"textAlign":["","",""],"shadow":[{"color":"#000000","opacity":0.2,"spread":0,"blur":14,"hOffset":0,"vOffset":0,"inset":false}],"className":"card-aplicativo","kioblocks":[]} -->
<div class="wp-block-kadence-column inner-column-4 kadence-column_051d39-0b card-aplicativo"><div class="kt-inside-inner-col"><!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","orientation":"horizontal"},"kioblocks":[]} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"c-btn-azul","kioblocks":[]} /--></div>
<!-- /wp:buttons -->

<!-- wp:image {"align":"center","id":10206,"sizeSlug":"full","linkDestination":"custom","className":"margenIconos","kioblocks":[]} -->
<div class="wp-block-image margenIconos"><figure class="aligncenter size-full"><img src="https://nuevaintranet/intranet/wp-content/uploads/2026/01/htmlRecurso-3-1.png" alt="" class="wp-image-10206"/></figure></div>
<!-- /wp:image --></div></div>
<!-- /wp:kadence/column -->';

$replacement = '<!-- wp:kadence/column {"id":4,"borderWidth":[0,0,0,0],"tabletBorderWidth":["","","",""],"mobileBorderWidth":["","","",""],"borderRadius":[0,0,0,0],"uniqueID":"_051d39-0b","backgroundImg":[{"bgImg":"","bgImgID":"","bgImgSize":"cover","bgImgPosition":"center center","bgImgAttachment":"scroll","bgImgRepeat":"no-repeat"}],"textAlign":["","",""],"shadow":[{"color":"#000000","opacity":0.2,"spread":0,"blur":14,"hOffset":0,"vOffset":0,"inset":false}],"className":"card-aplicativo","kioblocks":[]} -->
<div class="wp-block-kadence-column inner-column-4 kadence-column_051d39-0b card-aplicativo"><div class="kt-inside-inner-col"><!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","orientation":"horizontal"},"kioblocks":[]} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"c-btn-azul","kioblocks":[]} -->
<div class="wp-block-button c-btn-azul"><a class="wp-block-button__link" href="https://10.10.63.50/contingencia_cpo" target="_blank" rel="noreferrer noopener">CONTIGENCIA CONSULTA EXTERNA</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:image {"align":"center","id":10401,"sizeSlug":"large","linkDestination":"custom","className":"margenIconos","kioblocks":[]} -->
<div class="wp-block-image margenIconos"><figure class="aligncenter size-large"><a href="https://10.10.63.50/contingencia_cpo" target="_blank" rel="noopener"><img src="http://nuevaintranet/intranet/wp-content/uploads/2026/04/contingencia_consulta_externa.png" alt="" class="wp-image-10401"/></a></figure></div>
<!-- /wp:image --></div></div>
<!-- /wp:kadence/column -->';

if (strpos($content, $target) !== false) {
    $new_content = str_replace($target, $replacement, $content);
    $stmt = $conn->prepare("UPDATE wp_posts SET post_content = ? WHERE ID = ?");
    $stmt->bind_param("si", $new_content, $page_id);
    if ($stmt->execute()) {
        echo "Successfully updated Aplicativos Asistenciales page with Contingencia Consulta Externa.\n";
    } else {
        echo "Error updating database: " . $stmt->error . "\n";
    }
} else {
    echo "Target content not found in database.\n";
}

$conn->close();
?>
