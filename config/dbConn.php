<?php

// Check if RESTRICTED_ACCESS is defined
if (!defined('RESTRICTED_ACCESS')) {
    // Redirect or handle unauthorized access
    header('HTTP/1.0 403 Forbidden');
    exit('Unauthorized access.');
}

include 'dbCred.php';

// Establish a database connection
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

if (!$conn) {
    die("Network Error. Please reload the page");
}