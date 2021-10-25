<?php
require($_SERVER['DOCUMENT_ROOT'] . '/config.php');
require($_SERVER['DOCUMENT_ROOT'] . '/database/connection.php');
require($_SERVER['DOCUMENT_ROOT'] . '/models/config.php');


$ann = new Announcement();

if (isset($_GET['func'])) {
    switch ($_GET['func']) {
        case 'create':
            $ann->add_announcement();
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
        $valid_extensions = array('jpeg', 'jpg', 'png');
        $path = $_SERVER['DOCUMENT_ROOT'] . '/storage/modules/';
        $img = $_FILES['ann_attachment']['name'];
        $tmp = $_FILES['ann_attachment']['tmp_name'];
        $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
        $final_image = rand(1000, 1000000) . $img;
        if (in_array($ext, $valid_extensions)) {
            $path = $path . strtolower($final_image);
            $title = $_POST['ann_title'];
            $description = $_POST['description'];
            $course_id = $_POST['course_id'];
            $delay = isset($_POST['is_delay']) ? 1 : 0;
            $allow = isset($_POST['is_allow']) ? 1 : 0;
            $post = isset($_POST['is_post_before_replies']) ? 1 : 0;
            $podcast = isset($_POST['is_enable_podcast']) ? 1 : 0;
            $liking = isset($_POST['is_allow_liking']) ? 1 : 0;
            if (move_uploaded_file($tmp, $path)) {
                $conn->query("INSERT tbl_announcements (course_id, title, description, attachement, is_delay, is_allow_comment, is_users_post_before_replies, is_podcast_feed, allow_liking, created_at) VALUES ($course_id, '$title', '$description', '$final_image', $delay, $allow, $post, $podcast, $liking, NOW())");
            }
        }
    }
}
