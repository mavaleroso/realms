<?php
require($_SERVER['DOCUMENT_ROOT'] . '/config.php');
require($_SERVER['DOCUMENT_ROOT'] . '/database/connection.php');
require($_SERVER['DOCUMENT_ROOT'] . '/models/config.php');


session_start();
$mod = new Modules();

if (isset($_GET['func'])) {
    switch ($_GET['func']) {
        case 'create':
            $mod->add_module();
            break;
        case 'status':
            $mod->status_module();
            break;
        case 'delete':
            $mod->delete_module();
            break;
        default:
            # code...
            break;
    }
}

class Modules
{
    function add_module()
    {
        global $conn;
        $id = $_POST['id'];
        $name = $_POST['module_name'];
        $result = $conn->query("INSERT tbl_modules (course_id, name, status, created_at) VALUES('$id', '$name', 0, NOW())");

        return $result;
    }

    function status_module()
    {
        global $conn;
        $id = $_POST['id'];
        $status = $_POST['status'];
        $result = $conn->query("UPDATE tbl_modules SET status = $status WHERE id = $id");

        return $result;
    }

    function delete_module()
    {
        global $conn;
        $id = $_POST['id'];
        $result = $conn->query("DELETE FROM tbl_modules WHERE id = $id");

        return $result;
    }
}
