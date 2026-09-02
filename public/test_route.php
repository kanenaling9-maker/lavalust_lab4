<?php
define('PREVENT_DIRECT_ACCESS', TRUE);

$system_path = 'scheme';
$application_folder = 'app';
$public_folder = 'public';

define('ROOT_DIR', dirname(__DIR__) . DIRECTORY_SEPARATOR);
define('SYSTEM_DIR', ROOT_DIR . $system_path . DIRECTORY_SEPARATOR);
define('APP_DIR', ROOT_DIR . $application_folder . DIRECTORY_SEPARATOR);
define('PUBLIC_DIR', $public_folder);

// Test routing detection
if (php_sapi_name() !== 'cli') {
    $base  = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
    $path  = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $url   = substr($path, strlen($base)) ?: '/';
    
    echo "SCRIPT_NAME: " . $_SERVER['SCRIPT_NAME'] . "\n";
    echo "REQUEST_URI: " . $_SERVER['REQUEST_URI'] . "\n";
    echo "base: " . $base . "\n";
    echo "path: " . $path . "\n";
    echo "Final URL: " . $url . "\n";
}
?>
