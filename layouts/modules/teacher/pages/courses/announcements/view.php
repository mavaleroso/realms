<?php
require($_SERVER['DOCUMENT_ROOT'] . '/config/session.php');
require($_SERVER['DOCUMENT_ROOT'] . '/database/connection.php');
$sess->check();

if (isset($_GET['page'])) {
    $code = $_GET['page'];
    $query = "SELECT * FROM tbl_courses WHERE code='$code' LIMIT 1";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $course = mysqli_fetch_array($result);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <title><?php echo APP_NAME ?> | Courses</title>
    <?php require($_SERVER['DOCUMENT_ROOT'] . '/assets/CSS.php') ?>
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/assets/plugins/css/summernote.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/custom/css/teacher.css">
    <link rel="stylesheet" type="text/css" href="/assets/custom/css/announcements.css">
    <input type="hidden" id="base_url" value="<?php echo BASE_URL ?>">
    <input type="hidden" id="course-id" value="<?php echo $course['id'] ?>">
    <input type="hidden" id="course-status" value="<?php echo $course['status'] ?>">
    <input type="hidden" id="ann-id" value="<?php echo $_GET['id'] ?>">
</head>

<body>
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <?php require($_SERVER['DOCUMENT_ROOT'] . '/layouts/modules/teacher/components/header.php') ?>
        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <?php require($_SERVER['DOCUMENT_ROOT'] . '/layouts/modules/teacher/components/sidebar.php') ?>
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-6">
                                <h3><?php echo $course['name'] ?> Course</h3>
                            </div>
                            <div class="col-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
                                    <!-- <li class="breadcrumb-item">Pages</li>
                                    <li class="breadcrumb-item active">Sample Page</li> -->
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid starts-->
                <div class="container-fluid">
                    <div class="email-wrap bookmark-wrap">
                        <div class="row">
                            <div class="col-lg-2 col-md-12">
                                <div class="email-left-aside">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="email-app-sidebar left-bookmark">
                                                <ul class="nav main-menu" role="tablist">
                                                    <li class="nav-item">
                                                        <div class="media mb-2 publish-div">
                                                            <label class="col-form-label p-2 mt-1 fs-15">Publish</label>
                                                            <div class="media-body text-end icon-state">
                                                                <label class="switch">
                                                                    <input id="publish-chbox" type="checkbox"><span class="switch-state"></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="nav-item courses-link"><a href="<?php echo BASE_URL ?>/modules/teacher/courses/home?page=<?php echo $course['code'] ?>" class="m-1">Home</a></li>
                                                    <li class="nav-item courses-link active"><a href="<?php echo BASE_URL ?>/modules/teacher/courses/announcements/list?page=<?php echo $course['code'] ?>" class="m-1">Announcements</a></li>
                                                    <li class="nav-item courses-link"><a href="<?php echo BASE_URL ?>/modules/teacher/courses/grades?page=<?php echo $course['code'] ?>" class="m-1">Grades</a></li>
                                                    <li class="nav-item courses-link"><a href="<?php echo BASE_URL ?>/modules/teacher/courses/people?page=<?php echo $course['code'] ?>" class="m-1">People</a></li>
                                                    <li class="nav-item courses-link"><a href="<?php echo BASE_URL ?>/modules/teacher/courses/files?page=<?php echo $course['code'] ?>" class="m-1">Files</a></li>
                                                    <li class="nav-item courses-link"><a href="<?php echo BASE_URL ?>/modules/teacher/courses/syllabus?page=<?php echo $course['code'] ?>" class="m-1">Syllabus</a></li>
                                                    <li class="nav-item courses-link"><a href="<?php echo BASE_URL ?>/modules/teacher/courses/quizzes/list?page=<?php echo $course['code'] ?>" class="m-1">Quizzes</a></li>
                                                    <li class="nav-item courses-link"><a href="<?php echo BASE_URL ?>/modules/teacher/courses/modules?page=<?php echo $course['code'] ?>" class="m-1">Modules</a></li>
                                                    <li class="nav-item courses-link"><a href="<?php echo BASE_URL ?>/modules/teacher/courses/settings?page=<?php echo $course['code'] ?>" class="m-1">Settings</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-10 col-md-12 box-col-12">
                                <div class="email-left-aside">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="min-height-700">
                                                <div class="media">
                                                    <div class="media-body d-flex">
                                                        <h6 class="f-w-600">Announcements</h6>
                                                    </div>
                                                </div>
                                                <hr>
                                                <?php
                                                $ann_query = "SELECT * FROM tbl_announcements LEFT JOIN tbl_users ON tbl_users.id=tbl_announcements.author WHERE tbl_announcements.id=" . $_GET['id'];
                                                $ann_result = mysqli_query($conn, $ann_query) or die(mysqli_error($conn));
                                                $ann_row = mysqli_fetch_array($ann_result);
                                                ?>
                                                <div class="blog-single">
                                                    <div class="blog-box blog-details">
                                                        <div class="blog-details">
                                                            <ul class="blog-social">
                                                                <li><?php echo $ann_row['created_at'] ?></li>
                                                                <li><i class="icofont icofont-user"></i><?php echo $ann_row['name'] ?></li>
                                                                <li><i class="icofont icofont-thumbs-up"></i>02<span>Hits</span></li>
                                                                <li><i class="icofont icofont-ui-chat"></i>598 Comments</li>
                                                            </ul>
                                                            <h4>
                                                                <?php echo $ann_row['title'] ?>
                                                            </h4>
                                                            <div class="single-blog-content-top">
                                                                <?php echo $ann_row['description'] ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <section class="comment-box">
                                                        <div class="d-flex">
                                                            <h5>Comment</h5>
                                                            <button class="btn btn-primary d-block ml-auto" onclick="commentModal(null)"><i class="fa fa-plus mr-1"></i>Add comment</button>
                                                        </div>
                                                        <hr>
                                                        <ul>
                                                            <?php
                                                            $ann_rep_query = "SELECT *, tbl_announcements_replies.id AS main_id FROM tbl_announcements_replies LEFT JOIN tbl_users ON tbl_users.id=tbl_announcements_replies.author WHERE tbl_announcements_replies.announcement_id=" . $_GET['id'] . " AND tbl_announcements_replies.sub_rep_id=0 OR tbl_announcements_replies.sub_rep_id IS NULL";
                                                            $ann_rep_results = mysqli_query($conn, $ann_rep_query) or die(mysqli_error($conn));
                                                            if ($ann_rep_results->num_rows) {
                                                                while ($ann_rep_row = mysqli_fetch_array($ann_rep_results)) {
                                                                    echo '<li>' .
                                                                        '<div class="media align-self-center"><img class="align-self-center" src="' . BASE_URL . '/storage/default/default_pic.jpg" alt="Generic placeholder image">' .
                                                                        '<div class="media-body">' .
                                                                        '<div class="row">' .
                                                                        '<div class="col-md-4">' .
                                                                        '<h6 class="mt-0">' . $ann_rep_row['name'] . '</h6>' .
                                                                        '</div>' .
                                                                        '<div class="col-md-8">' .
                                                                        '<ul class="comment-social float-start float-md-end">' .
                                                                        '<li><i class="icofont icofont-thumbs-up"></i>02 Hits</li>' .
                                                                        '<li><i class="icofont icofont-ui-chat"></i>598 Comments</li>' .
                                                                        '</ul>' .
                                                                        '</div>' .
                                                                        '</div>' .
                                                                        '<p>' . $ann_rep_row['reply'] . '</p>' .
                                                                        '<button class="btn-none text-primary" onclick="commentModal(' . $ann_rep_row['main_id'] . ')">Reply</button>' .
                                                                        '</div>' .
                                                                        '</div>' .
                                                                        '</li>';


                                                                    $ann_rep_query1 = "SELECT * FROM tbl_announcements_replies LEFT JOIN tbl_users ON tbl_users.id=tbl_announcements_replies.author WHERE tbl_announcements_replies.announcement_id=" . $_GET['id'] . " AND tbl_announcements_replies.sub_rep_id=" . $ann_rep_row['main_id'];
                                                                    $ann_rep_results1 = mysqli_query($conn, $ann_rep_query1) or die(mysqli_error($conn));
                                                                    if ($ann_rep_results1->num_rows) {
                                                                        while ($ann_rep_row1 = mysqli_fetch_array($ann_rep_results1)) {
                                                                            echo '<li>' .
                                                                                '<ul>' .
                                                                                '<li>' .
                                                                                '<div class="media"><img class="align-self-center" src="' . BASE_URL . '/storage/default/default_pic.jpg" alt="Generic placeholder image">' .
                                                                                '<div class="media-body">' .
                                                                                '<div class="row">' .
                                                                                '<div class="col-xl-12">' .
                                                                                '<h6 class="mt-0">' . $ann_rep_row1['name'] . '</h6>' .
                                                                                '</div>' .
                                                                                '</div>' .
                                                                                '<p>' . $ann_rep_row1['reply'] . '</p>' .
                                                                                '</div>' .
                                                                                '</div>' .
                                                                                '</li>' .
                                                                                '</ul>' .
                                                                                '</li>';
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                        </ul>
                                                    </section>
                                                </div>
                                                <div class="modal fade modal-comment" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h6 class="modal-title" id="commentModalLabel">Add comment</h6>
                                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div id="announcement-comment"></div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button id="btn-save" class="btn btn-sm btn-primary">Save</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid Ends-->
            </div>
            <?php require($_SERVER['DOCUMENT_ROOT'] . '/layouts/modules/teacher/components/footer.php') ?>
        </div>
    </div>
    <?php require($_SERVER['DOCUMENT_ROOT'] . '/assets/JS.php') ?>
    <script src="<?php echo BASE_URL ?>/assets/cuba/assets/js/sidebar-menu.js"></script>
    <script src="<?php echo BASE_URL ?>/assets/plugins/js/summernote.min.js"></script>
    <script src="<?php echo BASE_URL ?>/assets/custom/js/modules/teacher/courses.js"></script>
    <script>
        var sub_id = null;
        $(document).ready(() => {
            window.ini = function() {
                $('#btn-save').click(() => {

                    Swal.fire({
                        title: "Are you sure you?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        customClass: {
                            confirmButton: "btn btn-success btn-sm",
                            cancelButton: "btn btn-danger btn-sm",
                        },
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Save",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            let id = $('#ann-id').val();
                            let comment = $('#announcement-comment').summernote('code');
                            $.post(BASE_URL + "/models/modules/teacher/model_announcement?func=comment", {
                                    id,
                                    comment,
                                    sub_id
                                }, res => {
                                    if (res == 'success') {
                                        myToast(
                                            "success",
                                            "Comment created successfully!",
                                            "top-end",
                                            2000
                                        );
                                        setTimeout(() => {
                                            location.reload();
                                        }, 2000);
                                    } else {
                                        myToast(
                                            "danger",
                                            "Comment created unsuccessfully!",
                                            "top-end",
                                            2000
                                        );
                                    }

                                }

                            );

                        }
                    });

                });
            };
            ini();
        });


        function commentModal(id) {
            sub_id = id;
            $('#commentModal').modal('toggle');
            $("#announcement-comment").summernote({
                placeholder: "Type here ...",
                tabsize: 2,
                height: 200,
            });
        }
    </script>
</body>

</html>