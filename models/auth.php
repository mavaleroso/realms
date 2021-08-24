<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/connection.php');

session_start();

$username = $_POST['username'];
$password = $_POST['login']['password'];

if (isset($username) && isset($password)) {
    $query = "SELECT * FROM tbl_users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $row = mysqli_fetch_array($result);
    $num_row = mysqli_num_rows($result);
    if ($num_row) {
        $_SESSION['id'] = $row['id'];
        $_SESSION['role'] = $row['role'];
        $row['role'] ? header('Location: ' . BASE_URL . '/home') : header('Location: ' . BASE_URL . '/type');
    } else {
        $_SESSION['flash_msg'] = 'Incorrect username or password!';
        header('Location: ' . BASE_URL . '/login');
    }
}
