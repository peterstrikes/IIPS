<?php

include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';

// Role based authorization: Allows only 'Teacher' role access; redirects to root index otherwise.
if (!(isset($_SESSION) && $_SESSION['role_name'] == 'Teacher')) {
    redirect_to('index.php');
    exit;
}

?>

<!-- // ********* PAGE CODE START ************ -->
Welcome Teacher.

<!-- // ********* PAGE CODE END ************ -->

<?php
include BASE_PATH . '/includes/footer.php';
?>