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

if (isset($_GET['quiz_id'])) {
    $quiz_id = $_GET['quiz_id'];
    $q_query = "SELECT * FROM tbl_quizzes WHERE id='$quiz_id' LIMIT 1";
    $q_result = mysqli_query($conn, $q_query) or die(mysqli_error($conn));
    $quiz = mysqli_fetch_array($q_result);

    $p_query = "SELECT SUM(tqq.points) as total_points FROM `tbl_quizzes` AS tq LEFT JOIN tbl_quizzes_questions AS tqq ON tqq.quiz_id=tq.id WHERE tq.id='$quiz_id'";
    $p_result = mysqli_query($conn, $p_query) or die(mysqli_error($conn));
    $points = mysqli_fetch_array($p_result)['total_points'];
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
    <title><?php echo APP_NAME ?> | Courses | Overview</title>
    <?php require($_SERVER['DOCUMENT_ROOT'] . '/assets/CSS.php') ?>
    <link rel="stylesheet" type="text/css" href="/assets/custom/css/teacher.css">
    <input type="hidden" id="base_url" value="<?php echo BASE_URL ?>">
    <input type="hidden" id="course-id" value="<?php echo $course['id'] ?>">
    <input type="hidden" id="course-status" value="<?php echo $course['status'] ?>">
    <input type="hidden" id="course-code" value="<?php echo $course['code'] ?>">
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
                                                    <li class="nav-item courses-link"><a href="<?php echo BASE_URL ?>/modules/teacher/courses/announcements?page=<?php echo $course['code'] ?>" class="m-1">Announcements</a></li>
                                                    <li class="nav-item courses-link"><a href="<?php echo BASE_URL ?>/modules/teacher/courses/grades?page=<?php echo $course['code'] ?>" class="m-1">Grades</a></li>
                                                    <li class="nav-item courses-link"><a href="<?php echo BASE_URL ?>/modules/teacher/courses/people?page=<?php echo $course['code'] ?>" class="m-1">People</a></li>
                                                    <li class="nav-item courses-link"><a href="<?php echo BASE_URL ?>/modules/teacher/courses/files?page=<?php echo $course['code'] ?>" class="m-1">Files</a></li>
                                                    <li class="nav-item courses-link"><a href="<?php echo BASE_URL ?>/modules/teacher/courses/syllabus?page=<?php echo $course['code'] ?>" class="m-1">Syllabus</a></li>
                                                    <li class="nav-item courses-link active"><a href="<?php echo BASE_URL ?>/modules/teacher/courses/quizzes/list?page=<?php echo $course['code'] ?>" class="m-1">Quizzes</a></li>
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
                                            <div class="w-100 min-height-700">
                                                <div class="media ">
                                                    <div class="media-body d-flex">
                                                        <h4 class="f-w-600"><?php echo $quiz['name'] ? $quiz['name'] : 'Unamed Quiz' ?></h4>
                                                        <button class="btn btn-primary mr-1 ml-auto"><i class="fa fa-cancel mr-1"></i>Publish</button>
                                                        <button class="btn btn-primary mr-1">Preview</button>
                                                        <a href="<?php echo BASE_URL ?>/modules/teacher/courses/quizzes/edit?page=<?php echo $_GET['page'] ?>&quiz_id=<?php echo $_GET['quiz_id'] ?>" class="btn btn-primary mr-1">Edit</a>
                                                        <button class="btn btn-primary mr-1"><i class="fa fa-list"></i></button>
                                                    </div>
                                                </div>
                                                <hr>
                                                <?php

                                                if ($quiz['status'] == 0) {
                                                    echo '<div class="alert alert-danger outline alert-dismissible fade show" role="alert"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-down">' .
                                                        '<path d="M10 15v4a3 3 0 0 0 3 3l4-9V2H5.72a2 2 0 0 0-2 1.7l-1.38 9a2 2 0 0 0 2 2.3zm7-13h2.67A2.31 2.31 0 0 1 22 4v7a2.31 2.31 0 0 1-2.33 2H17"></path>' .
                                                        '</svg>' .
                                                        '<p><b> This quiz is unpublished </b> Only teachers can see the quiz until it is published.</p>' .
                                                        '<button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>' .
                                                        '</div>';
                                                }

                                                ?>
                                                <div>
                                                    <div class="card p-3">
                                                        <p>Points: <b><?php echo $points ?></b></p>
                                                        <p>Time Limit: <b> <?php echo $quiz['time_limit']  ? $quiz['time_limit'] . 'min/s.' : 'No Time Limit' ?></b></p>
                                                        <p>Multiple Attempts: <b> <?php echo $quiz['multiple_attempts']  ? 'Yes' : 'No' ?></b></p>
                                                    </div>
                                                </div>
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Due</th>
                                                            <th>For</th>
                                                            <th>Available from</th>
                                                            <th>Until</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo $quiz['due'] ?></td>
                                                            <td></td>
                                                            <td><?php echo $quiz['available_from'] ?></td>
                                                            <td><?php echo $quiz['available_until'] ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <button class="btn btn-primary btn-lg d-block m-auto mt-5">Preview</button>
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
    <script src="<?php echo BASE_URL ?>/assets/custom/js/modules/teacher/courses.js"></script>
</body>

</html>