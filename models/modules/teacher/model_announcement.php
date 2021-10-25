<?php
require($_SERVER['DOCUMENT_ROOT'] . '/config.php');
require($_SERVER['DOCUMENT_ROOT'] . '/database/connection.php');
require($_SERVER['DOCUMENT_ROOT'] . '/models/config.php');

session_start();

$ann = new Announcement();
if (isset($_GET['func'])) {
    switch ($_GET['func']) {
        case 'create':
            $ann->add_announcement();
            break;
        case 'comment':
            $ann->add_comment();
            break;

        default:
            # code...
            break;
    }
}

class Announcement
{
    function add_announcement()
    {
        global $conn;
        $path = $_SERVER['DOCUMENT_ROOT'] . '/storage/modules/';
        $img = $_FILES['ann_attachment']['name'];
        $tmp = $_FILES['ann_attachment']['tmp_name'];
        $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
        $final_image = ($ext) ? rand(1000, 1000000) . '.' . $ext : NULL;
        $path = $path . strtolower($final_image);
        $title = $_POST['ann_title'];
        $description = $_POST['description'];
        $course_id = $_POST['course_id'];
        $author = $_SESSION['id'];
        $delay = isset($_POST['is_delay']) ? 1 : 0;
        $allow = isset($_POST['is_allow']) ? 1 : 0;
        $post = isset($_POST['is_post_before_replies']) ? 1 : 0;
        $podcast = isset($_POST['is_enable_podcast']) ? 1 : 0;
        $liking = isset($_POST['is_allow_liking']) ? 1 : 0;
        $res = $conn->query("INSERT tbl_announcements (course_id, author, title, description, attachment, attachment_tmp, is_delay, is_allow_comment, is_users_post_before_replies, is_podcast_feed, allow_liking, created_at) VALUES ($course_id, $author, '$title', '$description', '$img', '$final_image', $delay, $allow, $post, $podcast, $liking, NOW())");
        $ann_id = mysqli_insert_id($conn);
        if ($res) {
            move_uploaded_file($tmp, $path);
            $post = isset($_POST['post_to']) ? $_POST['post_to'] : NULL;
            for ($i = 0; $i < count($post); $i++) {
                $conn->query("INSERT tbl_announcements_post (announcement_id, post_to_course_id) VALUES ($ann_id, $post[$i])");
            }
        };
    }

    function add_comment()
    {
        global $conn;
        if (isset($_POST['id']) && isset($_POST['comment'])) {
            $user_id = $_SESSION['id'];
            $id = $_POST['id'];
            $comment = $_POST['comment'];
            $sub_rep_id = $_POST['sub_id'] ? $_POST['sub_id'] : 0;
            $result = $conn->query("INSERT tbl_announcements_replies (sub_rep_id, announcement_id, reply, author, created_at) VALUES ($sub_rep_id,$id,'$comment',$user_id, NOW())");
            if ($result) {
                echo 'success';
            } else {
                echo 'error';
            }
        }
    }
}
