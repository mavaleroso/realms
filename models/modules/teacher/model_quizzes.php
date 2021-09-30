<?php
require($_SERVER['DOCUMENT_ROOT'] . '/config.php');
require($_SERVER['DOCUMENT_ROOT'] . '/database/connection.php');
require($_SERVER['DOCUMENT_ROOT'] . '/models/config.php');


session_start();
$quiz = new Quizzes();

if (isset($_GET['func'])) {
    switch ($_GET['func']) {
        case 'create':
            $quiz->add_quiz();
            break;
        default:
            # code...
            break;
    }
}

class Quizzes
{
    function add_quiz()
    {
        global $conn;
        $id = $_POST['id'];
        $result = $conn->query("INSERT tbl_quizzes (course_id, status, created_at) VALUES('$id', 0, NOW())");

        echo mysqli_insert_id($conn);
    }
}
