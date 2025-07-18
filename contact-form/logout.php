<?php
    require_once("includes/authentication.php");

    // Clear session data
    $_SESSION = array();

    // Delete session cookie
    if (ini_get("session.use_cookies")){
        $params = session_get_cookie_params();
        setcookie(session_name(), "", time() - 42000,
            $params["path"], $params["domain"], $params["secure"],$params["httponly"]);
    }

    // End session
    session_destroy();

    // Redirect to login page
    header("Location: admin_login.php");
    exit();
?>
