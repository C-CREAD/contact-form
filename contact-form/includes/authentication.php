<?php
    session_start();

    // Create session for verifying admin
    function verify_admin(){
        return isset($_SESSION["admin_login"]) && $_SESSION["admin_login"] === true;
    }

    // Check if admin is logged in 
    function admin_login(){
        if (!verify_admin()){
            header("Location: admin_login.php");
            exit();
        }
    }
?>