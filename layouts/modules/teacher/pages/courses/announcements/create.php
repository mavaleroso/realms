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
                                                        <h6 class="f-w-600">Create Announcements</h6>
                                                        <a href="<?php echo BASE_URL ?>/modules/teacher/courses/announcements/list?page=<?php echo $course['code'] ?>" class="btn btn-primary ml-auto"><i class="fa fa-return mr-1"></i>Back</a>
                                                    </div>
                                                </div>
                                                <hr>
                                                <form id="announcement-form" method="post">
                                                    <div class="mb-3">
                                                        <label class="form-label font-weight-bold" for="ann-title">Title:</label>
                                                        <input class="form-control" id="ann-title" name="ann_title" type="text" required>
                                                    </div>

                                                    <label class="form-label font-weight-bold">Description:</label>
                                                    <div id="ann-description"></div>

                                                    <div class="mb-3">
                                                        <label class="form-label font-weight-bold" for="post_to">Post to:</label>
                                                        <select name="post_to" id="post-to" multiple>
                                                            <option value="0">Everyone</option>
                                                            <?php
                                                            $opt_quizzes_query = "SELECT * FROM tbl_courses";
                                                            $opt_quizzes_result = mysqli_query($conn, $opt_quizzes_query) or die(mysqli_error($conn));
                                                            $i = 0;
                                                            if ($opt_quizzes_result->num_rows) {
                                                                while ($row = mysqli_fetch_array($opt_quizzes_result)) {
                                                                    echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label font-weight-bold" for="ann-attachment">Attachment:</label>
                                                        <input class="form-control" id="ann-attachment" name="ann_attachment" type="file">
                                                    </div>
                                                    <hr>
                                                    <div class="mb-3">
                                                        <label class="form-label font-weight-bold">Options:</label>
                                                        <div class="form-check checkbox mb-0">
                                                            <input class="form-check-input" id="delay-posting" type="checkbox" name="is_delay">
                                                            <label class="form-check-label" for="is_delay">Delay posting.</label>
                                                        </div>
                                                        <div class="form-check checkbox mb-0">
                                                            <input class="form-check-input" id="allow-comment" type="checkbox" name="is_allow">
                                                            <label class="form-check-label" for="is_allow">Allow users to comment.</label>
                                                        </div>
                                                        <div class="form-check checkbox mb-0 ml-3">
                                                            <input class="form-check-input" id="before-replies" type="checkbox" name="is_post_before_replies">
                                                            <label class="form-check-label" for="is_post_before_replies">Users must post before seeing replies.</label>
                                                        </div>
                                                        <div class="form-check checkbox mb-0">
                                                            <input class="form-check-input" id="enable-podcast" type="checkbox" name="is_enable_podcast">
                                                            <label class="form-check-label" for="is_enable_podcast">Enable podcast feed.</label>
                                                        </div>
                                                        <div class="form-check checkbox mb-0">
                                                            <input class="form-check-input" id="allow-liking" type="checkbox" name="is_allow_liking">
                                                            <label class="form-check-label" for="is_allow_liking">Allow liking.</label>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer p-1 mt-2">
                                                        <div class="d-flex">
                                                            <button type="submit" class="btn btn-sm btn-primary mx-2">Save</button>
                                                        </div>
                                                    </div>
                                                </form>
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
        $(document).ready(() => {

            window.ini = function() {
                $("#ann-description").summernote({
                    placeholder: "Type here ...",
                    tabsize: 2,
                    height: 200,
                });

                $("#post-to").select2();

                $('#announcement-form').submit(function(evt) {
                    evt.preventDefault();
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
                            let courseID = $('#course-id').val();
                            let description = $('#ann-description').summernote('code');
                            var formData = new FormData(this);
                            formData.append('description', description);
                            formData.append('course_id', courseID);
                            $.ajax({
                                url: BASE_URL + "/models/modules/teacher/model_announcement?func=create",
                                type: "POST",
                                data: formData,
                                contentType: false,
                                cache: false,
                                processData: false,
                                success: function(data, status) {

                                },
                                error: function(e) {
                                    myToast("error", "Course created unsuccessfully!", "top-end", 2000);
                                },
                            });
                            setTimeout(() => {
                                location.reload();
                            }, 2000);
                        }
                    });

                });
            };
            ini();
        });
    </script>
</body>

</html>