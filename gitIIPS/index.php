<?php

// Define a constant to prevent direct access
define('RESTRICTED_ACCESS', true);

// include $_SERVER['DOCUMENT_ROOT'] . '/config/globalSettings.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
include BASE_PATH . '/config/dbConn.php';
include BASE_PATH . '/functions/loginFuncs.php';

// Checking if the 'remember_me' cookie is set
if (isset($_COOKIE['remember_me'])) {
    $remembered_email = $_COOKIE['remember_me'];
    // Authenticate the user based on the remembered email
    authenticateUserFromEmail($conn, $remembered_email);
}

// Checking if user is logged in
if(isset($_SESSION['role_name'])) {
    roleBasedRedirection($_SESSION['role_name']);
} else {
    redirect_to('login/index.php');
}