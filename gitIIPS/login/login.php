<?php
define('RESTRICTED_ACCESS', true);
include $_SERVER['DOCUMENT_ROOT'] . '/config/globalSettings.php';
include BASE_PATH . '/config/dbConn.php';
include BASE_PATH . '/functions/loginFuncs.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']) ? true : false;

    if (authenticateUser($conn, $email, $password)) {
        if ($remember) {
            // Set cookie for "Remember Me"
            setcookie('remember_me', $_SESSION['user_email'], time() + 604800, '/');
        }

        // Redirect based on role
        roleBasedRedirection($_SESSION['role_name']);

    } else {
        // Authentication failed, redirect back to login page along with error
        redirect_to('login/index.php?error=1');
    }
} else {
    redirect_to('login/index.php');
}