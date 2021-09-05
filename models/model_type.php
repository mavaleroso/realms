<?php
require($_SERVER['DOCUMENT_ROOT'] . '/config.php');
require($_SERVER['DOCUMENT_ROOT'] . '/database/connection.php');

session_start();
$type = new Type();

if (isset($_GET['func'])) {
    switch ($_GET['func']) {
        case 'role':
            $type->role();
            break;

        default:
            # code...
            break;
    }
}

class Type
{
    function role()
    {
        global $conn;
        $role = $_POST['role'];
        $query = "UPDATE tbl_users SET role = '$role' WHERE id=" . $_SESSION['id'];
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if ($result) {
            $_SESSION['role'] = $role;
        }
    }
}
