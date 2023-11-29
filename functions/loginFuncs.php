<?php

// Check if RESTRICTED_ACCESS is defined
if (!defined('RESTRICTED_ACCESS')) {
    // Redirect or handle unauthorized access
    header('HTTP/1.0 403 Forbidden');
    exit('Unauthorized access.');
}


function authenticateUserFromEmail($conn, $email) {
    $stmt = $conn->prepare("SELECT user_id, user_email, role_name FROM user_credentials JOIN user_roles ON user_credentials.role_id = user_roles.role_id WHERE user_email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows == 1) {
        $stmt->bind_result($user_id, $user_email, $role_name);
        $stmt->fetch();
        
        // Set the user's session
        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_email'] = $user_email;
        $_SESSION['role_name'] = $role_name;
    }
}


function roleBasedRedirection($role) {
    switch ($role) {
        case 'Admin':
            redirect_to('user/admin/index.php');
            break;
        case 'Employee':
            redirect_to('user/employee/index.php');
            break;
        case 'Student':
            redirect_to('user/student/index.php');
            break;
        case 'Teacher':
            redirect_to('user/teacher/index.php');
            break;
        default:
            // Redirect to login page on failure
            redirect_to('login/index.php');
            break;
    }
}


function authenticateUser($conn, $email, $password) {
    $stmt = $conn->prepare("SELECT user_id, user_email, user_password, role_name FROM user_credentials JOIN user_roles ON user_credentials.role_id = user_roles.role_id WHERE user_email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    // Check if a user with the provided email exists
    if ($stmt->num_rows == 1) {
        $stmt->bind_result($user_id, $user_email, $db_password, $role_name);
        $stmt->fetch();
        // Verify the provided password against the stored hashed password
        if (password_verify($password, $db_password)) {
            // Check if the password needs rehashing
            if (password_needs_rehash($db_password, PASSWORD_DEFAULT)) {
                // Rehash the password and update it in the database
                $new_hashed_password = password_hash($password, PASSWORD_DEFAULT);
                // Update the database with the new hash
                rehashUserPassword($conn, $user_id, $new_hashed_password);
            }

            // User is authenticated, set session
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_email'] = $user_email;
            $_SESSION['role_name'] = $role_name;
            return true;
        }
    }
    return false;
}


function rehashUserPassword($conn, $user_id, $new_hashed_password) {
    $stmt = $conn->prepare("UPDATE user_credentials SET user_password = ? WHERE user_id = ?");
    $stmt->bind_param("si", $new_hashed_password, $user_id);
    $stmt->execute();
}