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
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/assets/cuba/assets/css/vendors/simple-mde.css">
    <link rel="stylesheet" type="text/css" href="/assets/custom/css/teacher.css">
    <input type="hidden" id="base_url" value="<?php echo BASE_URL ?>">
    <input type="hidden" id="course-id" value="<?php echo $course['id'] ?>">
    <input type="hidden" id="course-status" value="<?php echo $course['status'] ?>">
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
                                                        <h6 class="f-w-600">Create Quiz</h6>
                                                        <a href="<?php echo BASE_URL ?>/modules/teacher/courses/quizzes/edit?page=<?php echo $course['code'] ?>" class="btn btn-primary ml-auto"><i class="fa fa-trash mr-1"></i>Delete Quiz</a>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="card-body">
                                                    <ul class="nav nav-tabs border-tab nav-primary" id="info-tab" role="tablist">
                                                        <li class="nav-item"><a class="nav-link active" id="info-home-tab" data-bs-toggle="tab" href="#info-home" role="tab" aria-controls="info-home" aria-selected="true"><i class="icofont icofont-info-circle"></i>Details</a></li>
                                                        <li class="nav-item"><a class="nav-link" id="profile-info-tab" data-bs-toggle="tab" href="#info-profile" role="tab" aria-controls="info-profile" aria-selected="false"><i class="icofont icofont-question-circle"></i>Questions</a></li>
                                                    </ul>
                                                    <div class="tab-content" id="info-tabContent">
                                                        <div class="tab-pane fade active show" id="info-home" role="tabpanel" aria-labelledby="info-home-tab">
                                                            <div class="mb-3 w-50">
                                                                <label class="form-label" for="quiz-name">Name:</label>
                                                                <input class="form-control" id="quiz-name w-50" type="text">
                                                            </div>
                                                            <p>Quiz Instructions</p>

                                                            <textarea class="CodeMirror" id="smde1" style="display: none;"></textarea>
                                                        </div>
                                                        <div class="tab-pane fade" id="info-profile" role="tabpanel" aria-labelledby="profile-info-tab">
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
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

    <script src="<?php echo BASE_URL ?>/assets/custom/js/modules/teacher/courses.js"></script>
    <script src="<?php echo BASE_URL ?>/assets/cuba/assets/js/editor/simple-mde/simplemde.min.js"></script>
    <script src="<?php echo BASE_URL ?>/assets/cuba/assets/js/editor/simple-mde/simplemde.custom.js"></script>
</body>

</html>