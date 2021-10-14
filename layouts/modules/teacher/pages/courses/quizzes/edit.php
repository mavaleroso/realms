<?php
require($_SERVER['DOCUMENT_ROOT'] . '/config/session.php');
require($_SERVER['DOCUMENT_ROOT'] . '/database/connection.php');
require($_SERVER['DOCUMENT_ROOT'] . '/models/elements/element_course.php');
$sess->check();
$elemCourse = new Form();

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
    <script src="<?php echo BASE_URL ?>/assets/cuba/assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?php echo BASE_URL ?>/assets/plugins/js/popper.min.js"></script>

    <script src="<?php echo BASE_URL ?>/assets/plugins/js/bootstrap4.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/assets/custom/css/teacher.css">
    <input type="hidden" id="base_url" value="<?php echo BASE_URL ?>">
    <input type="hidden" id="course-id" value="<?php echo $course['id'] ?>">
    <input type="hidden" id="course-status" value="<?php echo $course['status'] ?>">
    <input type="hidden" id="quiz-id" value="<?php echo $_GET['quiz_id'] ?>">
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
                                                        <li class="nav-item"><a class="nav-link active" id="info-home-tab" data-toggle="tab" href="#info-home" role="tab" aria-controls="info-home" aria-selected="true"><i class="icofont icofont-info-circle"></i>Details</a></li>
                                                        <li class="nav-item"><a class="nav-link" id="profile-info-tab" data-toggle="tab" href="#info-profile" role="tab" aria-controls="info-profile" aria-selected="false"><i class="icofont icofont-question-circle"></i>Questions</a></li>
                                                    </ul>
                                                    <div class="tab-content" id="info-tabContent">
                                                        <div class="tab-pane fade active show" id="info-home" role="tabpanel" aria-labelledby="info-home-tab">
                                                            <form id="quiz-form" method="POST">

                                                                <div class="mb-3 w-50">
                                                                    <label class="form-label font-weight-bold" for="quiz-name">Name:</label>
                                                                    <input class="form-control" id="quiz-name" name="quiz_name" type="text" required>
                                                                </div>

                                                                <label class="form-label font-weight-bold">Quiz Instructions:</label>
                                                                <div id="quiz-instruction"></div>

                                                                <label class="form-label font-weight-bold">Options:</label>

                                                                <div class="d-flex">
                                                                    <div class="form-check checkbox mb-0">
                                                                        <input class="form-check-input" id="is_time_Limit" type="checkbox" name="is_time_limit">
                                                                        <label class="form-check-label" for="is_time_Limit">Time limit</label>
                                                                    </div>
                                                                    <div class="d-flex ml-4">
                                                                        <input class="form-control w-25" id="time_limit" name="time_limit" type="number" disabled>
                                                                        <label class="form-label p-2" for="time_limit">Minutes</label>
                                                                    </div>
                                                                </div>

                                                                <div class="form-check checkbox mb-0">
                                                                    <input class="form-check-input" id="multiple_attempts" type="checkbox" name="is_multiple_attempts">
                                                                    <label class="form-check-label" for="multiple_attempts">Allow multiple attempts</label>
                                                                </div>

                                                                <label class="form-label font-weight-bold mt-4">Assign:</label>
                                                                <div class="mb-3 w-50">
                                                                    <label class="form-label" for="assign_to">Assign to:</label>
                                                                    <select name="assign_to" id="assign-to" multiple>
                                                                        <option value="0">Test</option>
                                                                        <option value="1">Test1</option>
                                                                        <option value="2">Test2</option>
                                                                        <option value="3">Test3</option>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3 w-50">
                                                                    <label class="form-label" for="assign-due">Due:</label>
                                                                    <input class="form-control w-100" id="assign-due" name="assign_due" type="date">
                                                                </div>
                                                                <div class="mb-3 w-50">
                                                                    <label class="form-label" for="available-from">Available from:</label>
                                                                    <input class="form-control" id="available-from" name="available_from" type="date">
                                                                </div>
                                                                <div class="mb-3 w-50">
                                                                    <label class="form-label" for="available-to">Available to:</label>
                                                                    <input class="form-control" id="available-to" name="available_to" type="date">
                                                                </div>

                                                            </form>
                                                        </div>
                                                        <div class="tab-pane fade" id="info-profile" role="tabpanel" aria-labelledby="profile-info-tab">
                                                            <button class="btn btn-light" onclick="newQuestion()"><i class="fa fa-plus"></i> New Question</button>
                                                            <form id="question-form" method="POST">
                                                                <div class="questions-area">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer p-1 mt-2">
                                                    <div class="d-flex">
                                                        <button class="btn btn-light mx-2">Cancel</button>
                                                        <button onclick="saveQuiz(1)" class="btn btn-light mx-2">Save & Publish</button>
                                                        <button onclick="saveQuiz(0)" class="btn btn-primary mx-2">Save</button>
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
        $(document).ready(() => {
            window.ini = function() {

                setTimeout(() => {
                    $("#quiz-instruction").summernote({
                        placeholder: "Type here ...",
                        tabsize: 2,
                        height: 200,
                    });

                    $("#quiz-question").summernote({
                        placeholder: "Type here ...",
                        tabsize: 2,
                        height: 200,
                    });

                    $(".answer-comment").summernote({
                        placeholder: "Type here ...",
                        tabsize: 2,
                        height: 100,
                    });

                    $('.answer-comment-area .note-editor').hide();
                    $('.btn-comment-done').hide();
                }, 500);

                $("#assign-to").select2();

                $(".question-type").select2({
                    minimumResultsForSearch: Infinity
                });

                $('.question-type').on('select2:select', function(e) {
                    let type = $(this).val();
                    if (type == 'multipleChoice') {
                        $('.btn-add-answer').show();
                    } else {
                        $('.btn-add-answer').hide();
                    }

                    if (type == 'essayQuestion') {
                        $('.answers-lbl').hide();
                    } else {
                        $('.answers-lbl').show();
                    }
                    questionType(type);
                    ini();
                });

                $('#is_time_Limit').change(function() {
                    if ($(this).is(':checked')) {
                        $('#time_limit').removeAttr('disabled');
                    } else {
                        $('#time_limit').attr('disabled', true);
                    }
                });

            };
            ini();
        });

        var answerRow = 5;

        function newQuestion() {
            $.get(
                BASE_URL + "/models/elements/element_course?func=question",
                function(data, status) {
                    $('.questions-area').html(data);
                    ini();
                    questionType('multipleChoice');
                }
            );
        }

        function displayComment(event, id) {
            event.preventDefault();
            let comment = $('#answer-comment-area-' + id + ' .note-editor:visible');
            if (comment.length > 0) {
                $('#answer-comment-area-' + id + ' .note-editor').hide();
                $('#answer-comment-area-' + id + ' button').hide();
            } else {
                $('#answer-comment-area-' + id + ' .note-editor').show();
                $('#answer-comment-area-' + id + ' button').show();
            }
        }

        function correctAnswer(event, id, type) {
            event.preventDefault();
            $('.btn-answer').removeClass('btn-success');
            $('.btn-answer').removeClass('btn-correct');
            $('.btn-answer').addClass('btn-light');
            $('.answer-label').text('Possible answer');
            type == 0 ? $('.answer-label').text('Possible answer') : $('.answer-label').text('False');
            $('.answer-label').removeClass('text-success');
            $('#btn-answer-' + id).removeClass('btn-light');
            $('#btn-answer-' + id).addClass('btn-success');
            $('#btn-answer-' + id).addClass('btn-correct');
            $('#answer-lbl-' + id).addClass('text-success');
            type == 0 ? $('#answer-lbl-' + id).text('Correct answer') : $('#answer-lbl-' + id).text('True');
        }

        function deleteAnswer(event, id) {
            event.preventDefault();
            $('#answer-area-' + id).remove();
            $('#answer-area-hr-' + id).remove();
        }

        function questionType(type) {
            $.get(
                BASE_URL + "/models/elements/element_course?func=" + type,
                function(data, status) {
                    $('.answer-div').html(data);
                }
            );
        }

        function addAnswer(event) {
            event.preventDefault();
            let hr = '<hr id="answer-area-hr-' + answerRow + '">';
            let answer = '<div id="answer-area-' + answerRow + '" class="answer-area p-3 mb-2">' +
                '<div class="d-flex">' +
                '<div>' +
                '<button id="btn-answer-' + answerRow + '" data-id="answer_' + answerRow + '" class="btn btn-sm btn-light mr-3 mt-2 btn-answer" onclick="correctAnswer(event, ' + answerRow + ', 0)"><i class="fa fa-arrow-right"></i></button>' +
                '</div>' +
                '<div class="w-100">' +
                '<label id="answer-lbl-' + answerRow + '" class="form-label text-succes answer-label" for="answer_' + answerRow + '">Possible Answer</label>' +
                '<input class="form-control" type="text" name="answer[]">' +
                '</div>' +
                '<div>' +
                '<button class="btn-delete-answer btn btn-sm btn-light ml-3 mb-1" onclick="deleteAnswer(event, ' + answerRow + ')"><i class="fa fa-trash"></i></button>' +
                '<button class="btn btn-sm btn-light ml-3" onclick="displayComment(event,' + answerRow + ')"><i class="fa fa-commenting-o"></i></button>' +
                '</div>' +
                '</div>' +
                '<div id="answer-comment-area-' + answerRow + '" class="answer-comment-area mt-2">' +
                '<div class="answer-comment" id="answer-comment-' + answerRow + '"></div>' +
                '<button class="btn btn-sm btn-light btn-comment-done">Done</button>' +
                '</div>' +
                '</div>';
            $('.answer-div').append(hr);
            $('.answer-div').append(answer);


            $("#answer-comment-area-" + answerRow + " .answer-comment").summernote({
                placeholder: "Type here ...",
                tabsize: 2,
                height: 100,
            });

            $("#answer-comment-area-" + answerRow + ".answer-comment-area .note-editor").hide();
            $("#answer-comment-area-" + answerRow + " .btn-comment-done").hide();


            answerRow++;
        }

        function saveQuiz(type) {
            submitQuiz(type);
            submitQuestion();
        }

        function submitQuiz(type) {
            let quiz_instruction = $('#quiz-instruction').summernote('code');
            let quiz_id = $('#quiz-id').val();
            let course_id = $('#course-id').val();
            let quiz_form = $('#quiz-form').serialize() + '&quiz_instruction=' + quiz_instruction + '&quiz_id=' + quiz_id + '&course_id=' + course_id + '&status=' + type;

            $.post(BASE_URL + '/models/modules/teacher/model_quizzes?func=saveQuiz', quiz_form, res => {

            });
        }

        function submitQuestion() {
            let question = $('#quiz-question').summernote('code');
            let quiz_id = $('#quiz-id').val();
            let correct_answer = null;
            let answer_comment = '';
            let answer_comment_length = $('.answer-comment').length;
            for (let i = 0; i < answer_comment_length; i++) {
                let cr_class = $('.btn-answer').eq(i).attr('class');
                if (cr_class.search('btn-correct') > -1) correct_answer = i;
                answer_comment += '&comment[]=' + $('.answer-comment').eq(i).summernote('code');
            }

            let question_form = $('#question-form').serialize() + '&questions=' + question + answer_comment + '&answer_length=' + answer_comment_length + '&correct_answer=' + correct_answer + '&quiz_id=' + quiz_id;

            $.post(BASE_URL + '/models/modules/teacher/model_quizzes?func=saveQuestion', question_form, res => {

            });
        }
    </script>
</body>

</html>