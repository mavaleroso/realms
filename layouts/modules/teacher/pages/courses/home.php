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
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/assets/cuba/assets/css/vendors/dropzone.css">
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
                                            <div class="email-app-sidebar left-bookmark ">
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
                                                    <li class="nav-item courses-link active"><a href="<?php echo BASE_URL ?>/modules/teacher/courses/home?page=<?php echo $course['code'] ?>" class="m-1">Home</a></li>
                                                    <li class="nav-item courses-link"><a href="<?php echo BASE_URL ?>/modules/teacher/courses/announcements?page=<?php echo $course['code'] ?>" class="m-1">Announcements</a></li>
                                                    <li class="nav-item courses-link"><a href="<?php echo BASE_URL ?>/modules/teacher/courses/grades?page=<?php echo $course['code'] ?>" class="m-1">Grades</a></li>
                                                    <li class="nav-item courses-link"><a href="<?php echo BASE_URL ?>/modules/teacher/courses/people?page=<?php echo $course['code'] ?>" class="m-1">People</a></li>
                                                    <li class="nav-item courses-link"><a href="<?php echo BASE_URL ?>/modules/teacher/courses/files?page=<?php echo $course['code'] ?>" class="m-1">Files</a></li>
                                                    <li class="nav-item courses-link"><a href="<?php echo BASE_URL ?>/modules/teacher/courses/syllabus?page=<?php echo $course['code'] ?>" class="m-1">Syllabus</a></li>
                                                    <li class="nav-item courses-link"><a href="<?php echo BASE_URL ?>/modules/teacher/courses/quizzes?page=<?php echo $course['code'] ?>" class="m-1">Quizzes</a></li>
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
                                                        <h6 class="f-w-600">Home</h6>
                                                        <button class="btn btn-primary ml-auto" data-bs-toggle="modal" data-bs-target="#moduleModal"><i class="fa fa-plus mr-1"></i>Add Module</button>
                                                    </div>
                                                </div>
                                                <hr>
                                                <?php
                                                $query = "SELECT * FROM tbl_modules WHERE course_id=" . $course['id'];
                                                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                                $i = 0;
                                                if ($result->num_rows) {
                                                    while ($row = mysqli_fetch_array($result)) {

                                                        $queryFile = "SELECT * FROM tbl_files WHERE module_id=" . $row['id'];
                                                        $resultFile = mysqli_query($conn, $queryFile) or die(mysqli_error($conn));
                                                        $files1 = '';
                                                        while ($row1 = mysqli_fetch_array($resultFile)) {
                                                            $checked1 = $row1['status'] != 0 ? 'checked' : '';

                                                            $files1 .= '<div class="w-100 file-div d-flex">' .
                                                                '<i class="fa fa-paperclip"></i>' .
                                                                '<a href="' . BASE_URL . '/modules/teacher/courses/files?page=' . $course['code'] . '&file=' . $row1['temp_name'] . '" class="text-dark">' . $row1['original_name'] . '</a>' .
                                                                '<div class="file-switch text-end switch-sm mr-2">' .
                                                                '<label class="switch">' .
                                                                '<input class="file-status" type="checkbox" data-id="' . $row1['id'] . '" ' . $checked1 . '><span class="switch-state"></span>' .
                                                                '</label>' .
                                                                '</div>' .
                                                                '<button class="btn-none text-white w-0 " onclick="deleteFile(' . $row1['id'] . ')"><i class="fa fa-trash fs-18 text-dark"></i></button>' .
                                                                '</div>';
                                                        }


                                                        $checked = $row['status'] ? 'checked' : '';
                                                        $show = $i == 0 ? 'show' : '';

                                                        echo '<div class="default-according style-1" id="accordionoc">' .
                                                            '<div class="card my-2">' .
                                                            '<div class="card-header bg-primary">' .
                                                            '<h5 class="mb-0 d-flex">' .
                                                            '<button class="btn btn-link text-white" data-bs-toggle="collapse" data-bs-target="#collapseicon' . $i . '" aria-expanded="true" aria-controls="collapse11">' . $row['name'] . '</button>' .
                                                            '<div class="media-body text-end switch-sm mr-2">' .
                                                            '<label class="switch">' .
                                                            '<input class="module-status" data-id="' . $row['id'] . '" type="checkbox" ' . $checked . '><span class="switch-state"></span>' .
                                                            '</label>' .
                                                            '</div>' .
                                                            '<button class="btn-none text-white w-0 mt-n5"><i class="fa fa-plus fs-18"></i></button>' .
                                                            '<button class="btn-none text-white w-0 mt-n5 mr-5" onclick="deleteModule(' . $row['id'] . ')"><i class="fa fa-trash fs-18"></i></button>' .
                                                            '</h5>' .
                                                            '</div>' .
                                                            '<div class="collapse ' . $show . '" id="collapseicon' . $i . '" aria-labelledby="collapseicon' . $i . '" data-bs-parent="#accordionoc">' .
                                                            '<div class="card-body">' . $files1 .
                                                            '<form class="dropzone dz-clickable" id="multiFileUpload' . $i . '" action="' . BASE_URL . '/models/modules/teacher/model_files?func=upload&id=' . $row['id'] . '">' .
                                                            '<div class="dz-message needsclick"><i class="icon-cloud-up"></i>' .
                                                            '<h6>Drop files here or click to upload.</h6>' .
                                                            '</div>' .
                                                            '</form>' .
                                                            '</div>' .
                                                            '</div>' .
                                                            '</div>' .
                                                            '</div>';


                                                        $i++;
                                                    }
                                                } else {
                                                    echo '<div class="alert alert-light dark alert-dismissible fade show" role="alert"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle">' .
                                                        '<path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>' .
                                                        '<line x1="12" y1="9" x2="12" y2="13"></line>' .
                                                        '<line x1="12" y1="17" x2="12" y2="17"></line>' .
                                                        '</svg>' .
                                                        '<p> No modules created.</p>' .
                                                        '<button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>' .
                                                        '</div>';
                                                }
                                                ?>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="moduleModal" tabindex="-1" aria-labelledby="moduleModal" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <form id="module-form">
                                <div class="modal-header">
                                    <h5 class="modal-title">Create Module</h5>
                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label" for="module-name">Module name:</label>
                                        <input class="form-control" name="module_name" id="module-name" type="text" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                                    <button class="btn btn-primary" type="submit">Save changes</button>
                                </div>
                            </form>
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
    <script src="<?php echo BASE_URL ?>/assets/cuba/assets/js/dropzone/dropzone.js"></script>
    <script src="<?php echo BASE_URL ?>/assets/cuba/assets/js/dropzone/dropzone-script.js"></script>
    <script src="<?php echo BASE_URL ?>/assets/custom/js/modules/teacher/courses.js"></script>
</body>

</html>