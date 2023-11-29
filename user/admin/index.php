<?php
// Define a constant to prevent direct access
define('RESTRICTED_ACCESS', true);

// Include GLOBAL SETTINGS
include $_SERVER['DOCUMENT_ROOT'] . '/config/globalSettings.php';

// Check for correct privilege 
if (!(isset($_SESSION) && $_SESSION['role_name'] == 'Admin')) {
    // Perform redirection or exit here
    redirect_to('index.php');
    exit;
}

include BASE_PATH . '/includes/header.php';
?>

<!-- // ********* PAGE CODE START ************ -->
Welcome Admin.

<!-- // ********* PAGE CODE END ************ -->

<?php
include BASE_PATH . '/includes/footer.php';
?>