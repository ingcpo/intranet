<?php
require_once('wp-load.php');
global $wpdb;

$results = $wpdb->get_results("SELECT option_name, option_value FROM $wpdb->options WHERE option_value LIKE '%Cronograma%'");
foreach ($results as $row) {
    if (strpos($row->option_name, 'widget') !== false || strpos($row->option_name, 'theme_mods') !== false || strpos($row->option_name, 'nav_menu') !== false) {
        echo "Option: {$row->option_name}\n";
        $val = $row->option_value;
        if (is_serialized($val)) {
            $unserialized = @unserialize($val);
            if ($unserialized) {
                // Print some text content
                ob_start();
                print_r($unserialized);
                $out = ob_get_clean();
                $lines = explode("\n", $out);
                foreach ($lines as $line) {
                    if (stripos($line, 'Cronograma') !== false) {
                        echo "  " . trim($line) . "\n";
                    }
                }
            } else {
                echo "  Contains Cronograma, failed to unserialize\n";
            }
        } else {
            echo "  Value: " . substr(strip_tags($val), 0, 100) . "...\n";
        }
    }
}
?>
