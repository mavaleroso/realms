<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/connection.php');

session_start();

$username = $_POST['username'];
$password = $_POST['login']['password'];

if (isset($username) && isset($password)) {
    $query = "SELECT tbl_users.id as id, tbl_users.role as role, tbl_user_details.firstname as fname, tbl_user_details.middlename as mname, tbl_user_details.lastname as lname FROM tbl_users LEFT JOIN tbl_user_details ON tbl_user_details.users_id = tbl_users.id WHERE tbl_users.username='$username' AND tbl_users.password='$password'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $row = mysqli_fetch_array($result);
    $num_row = mysqli_num_rows($result);
    if ($num_row) {
        $_SESSION['id'] = $row['id'];
        $_SESSION['role'] = $row['role'];
        $_SESSION['fname'] = $row['fname'];
        $_SESSION['mname'] = $row['mname'];
        $_SESSION['lname'] = $row['lname'];
        $row['role'] ? header('Location: ' . BASE_URL . '/home') : header('Location: ' . BASE_URL . '/type');
    } else {
        $_SESSION['flash_msg'] = 'Incorrect username or password!';
        header('Location: ' . BASE_URL . '/login');
    }
}
