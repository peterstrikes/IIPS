<?php
// Check if SESSION is started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Define site_url constant if it's not already defined
if (!defined('SITE_URL')) {
    define("DEFAULT_DOMAIN", "stupid.moron");
    
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
    $host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : DEFAULT_DOMAIN;
    $siteURL = $protocol . "://" . $host . "/";

    define("SITE_URL", $siteURL);
}

// Define base_path constant if it's not already defined
if (!defined('BASE_PATH')) {
    $base_path = $_SERVER['DOCUMENT_ROOT'];
    define("BASE_PATH", $base_path);
}

function redirect_to($new_location) {
    header("Location: " . SITE_URL . $new_location);
    exit;
}