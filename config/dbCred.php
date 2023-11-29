<?php

// Check if RESTRICTED_ACCESS is defined
if (!defined('RESTRICTED_ACCESS')) {
    // Redirect or handle unauthorized access
    header('HTTP/1.0 403 Forbidden');
    exit('Unauthorized access.');
}

$db_host = "localhost";
$db_name = "iips";
$db_user = "root";
$db_password = "root";