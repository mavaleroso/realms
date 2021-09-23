<?php
require($_SERVER['DOCUMENT_ROOT'] . '/config.php');
require($_SERVER['DOCUMENT_ROOT'] . '/database/connection.php');
require($_SERVER['DOCUMENT_ROOT'] . '/models/config.php');


session_start();
$course = new Course();
$mConfig = new Config();

if (isset($_GET['func'])) {
    switch ($_GET['func']) {
        case 'create':
            $course->add_course();
            break;
        case 'status':
            $course->status_course();
            break;
        default:
            # code...
            break;
    }
}

class Course
{
    function add_course()
    {
        global $conn;
        global $mConfig;
        $code = $mConfig->course_code();
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf', 'doc', 'ppt');
        $path = $_SERVER['DOCUMENT_ROOT'] . '/storage/modules/';
        if (!empty($_POST['courseName']) || !empty($_POST['courseDesc']) || $_FILES['image']) {
            $img = $_FILES['image']['name'];
            $tmp = $_FILES['image']['tmp_name'];
            $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
            $final_image = rand(1000, 1000000) . $img;
            if (in_array($ext, $valid_extensions)) {
                $path = $path . strtolower($final_image);
                $cName = $_POST['courseName'];
                $cDesc = $_POST['courseDesc'];
                if (move_uploaded_file($tmp, $path)) {
                    $conn->query("INSERT tbl_courses (code, name, image, description, status, created_at) VALUES ('$code', '$cName','$final_image', '$cDesc', 0, NOW())");
                }
            }
        }
    }

    function status_course()
    {
        global $conn;
        $id = $_POST['id'];
        $status = $_POST['status'];
        $result = $conn->query("UPDATE tbl_courses SET status = $status WHERE id = $id");

        return $result;
    }
}
