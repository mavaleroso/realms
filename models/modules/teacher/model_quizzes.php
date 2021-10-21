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
        case 'saveQuiz':
            $quiz->save_quiz();
            break;
        case 'saveQuestion':
            $quiz->save_question();
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

    function save_quiz()
    {
        global $conn;

        $id = $_POST['quiz_id'];
        $course_id = $_POST['course_id'];
        $name = isset($_POST['quiz_name']) ? $_POST['quiz_name'] : NULL;
        $is_time_limit = isset($_POST['is_time_limit']) ? $_POST['is_time_limit'] : NULL;
        $time_limit = isset($_POST['time_limit']) ? $_POST['time_limit'] : NULL;
        $is_multiple_attempts = isset($_POST['is_multiple_attempts']) ? 1 : 0;
        $assign_to = isset($_POST['assign_to']) ? $_POST['assign_to'] : NULL;
        $assign_due = isset($_POST['assign_due']) ? $_POST['assign_due'] : NULL;
        $available_from = isset($_POST['available_from']) ? $_POST['available_from'] : NULL;
        $available_to = isset($_POST['available_to']) ? $_POST['available_to'] : NULL;
        $quiz_instruction = isset($_POST['quiz_instruction']) ? $_POST['quiz_instruction'] : NULL;
        $status = $_POST['status'];

        $result = $conn->query("UPDATE tbl_quizzes SET course_id=$course_id, name='$name', instructions='$quiz_instruction', time_limit=$time_limit, multiple_attempts='$is_multiple_attempts', due='$assign_due', available_from='$available_from', available_until='$available_to', status=$status, created_at=NOW() WHERE id=$id");

        echo $result;
    }

    function save_question()
    {
        global $conn;

        $id = $_POST['quiz_id'];
        $question_name = isset($_POST['question_name']) ? $_POST['question_name'] : NULL;
        $question_points = isset($_POST['question_points']) ? $_POST['question_points'] : NULL;
        $questions = isset($_POST['questions']) ? $_POST['questions'] : NULL;
        if (isset($_POST['question_type'])) {
            switch ($_POST['question_type']) {
                case 'multipleChoice':
                    $question_type = 1;
                    break;
                case 'trueFalse':
                    $question_type = 2;
                    break;
                case 'essayQuestion':
                    $question_type = 3;
                    break;

                default:
                    $question_type = 4;
                    break;
            }
        } else {
            $question_type = 0;
        }

        // $conn->query("DELETE tbl_quizzes_questions WHERE id='$quest_id'");
        $quest = $conn->query("INSERT tbl_quizzes_questions (quiz_id, name, type, question, points, created_at) VALUES ('$id', '$question_name', '$question_type', '$questions', '$question_points',NOW())");

        $quest_id = mysqli_insert_id($conn);
        if ($quest) {
            $answer = isset($_POST['answer']) ? $_POST['answer'] : NULL;
            $questions = isset($_POST['questions']) ? $_POST['questions'] : NULL;
            $comment = isset($_POST['comment']) ? $_POST['comment'] : NULL;
            $answer_length = isset($_POST['answer_length']) ? $_POST['answer_length'] : NULL;
            $correct_answer = isset($_POST['correct_answer']) ? $_POST['correct_answer'] : NULL;
            $correct = (int) substr($correct_answer, -1);
            $conn->query("DELETE tbl_quizzes_question_answer WHERE quiz_id='$quest_id'");
            for ($i = 0; $i < $answer_length; $i++) {
                $c_answe = $correct == $i ? 1 : 0;
                $conn->query("INSERT tbl_quizzes_question_answer (question_id, type, answer, comment, is_correct, created_at) VALUES ('$quest_id', '$question_type', '$answer[$i]', '$comment[$i]', '$c_answe', NOW())");
            }
        }
    }
}
