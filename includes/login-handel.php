<?php
session_start();
include "helper-func.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Admin Login
    if (isset($_POST['admin'])) {
        $adminEmail = htmlspecialchars($_POST['adminEmail']);
        $adminPass = htmlspecialchars($_POST['adminPass']);

        // Check if Empty
        if ( empty($adminEmail) || empty($adminPass)) {
            $_SESSION['login-error'] = "Fill out all the field";
            header("location: ../admin.php");
        }

        // If Not Admin
        if (checkAdmin($adminEmail, $adminPass, $conn)) {
            $_SESSION['login-error'] = "Invalid Email/Password";
            header("location: ../admin.php");
        }
        else {
            $_SESSION['admin'] = getAdminId($adminEmail, $conn);
            header("location: ../dashboard.php");
        }


    }

    // User Login
    if (isset($_POST['admin_email'])) {
        
    }
} else {
    header('location: ../index.php');
}