<?php
include_once 'db_connect.php';
include_once 'functions.php';
 
sec_session_start(); 
if (isset($_POST['email'], $_POST['p'])) {
    $email = $_POST['email'];
    $password = $_POST['p']; 
 
    if (login($email, $password, $mysqli) == true) {
        header('Location: ../../admin/protected_page.php');
    } else {
        // Login failed 
        header('Location: ../../admin/index.php?error=1');
    }
} else {
    echo 'Invalid Request';
}