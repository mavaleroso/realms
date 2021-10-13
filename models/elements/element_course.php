<?php
$frm = new Form();
if (isset($_GET['func'])) {
    switch ($_GET['func']) {
        case 'question':
            $frm->question();
            break;
        case 'multipleChoice':
            $frm->multipleChoice();
            break;
        case 'trueFalse':
            $frm->trueFalse();
            break;
        case 'essayQuestion':
            $frm->essayQuestion();
            break;
        default:
            # code...
            break;
    }
}

class Form
{
    function question()
    {
        echo '<div class="card mt-3">' .
            '<div class="card-body">' .
            '<div class="d-flex">' .
            '<div class="mr-2">' .
            '<label class="form-label" for="question_name">Name: </label>' .
            '<input class="form-control" type="text" name="question_name">' .
            '</div>' .
            '<div>' .
            '<label class="form-label" form="question_type">Type:</label>' .
            '<select class="question-type" name="question_type">' .
            '<option value="multipleChoice">Multiple Choices</option> ' .
            '<option value="trueFalse">True / False</option>' .
            '<option value="essayQuestion">Essay Question</option> ' .
            '</select>' .
            '</div>' .
            '<div class="ml-auto w-7">' .
            '<label class="form-label" for="question_points">Points:</label>' .
            '<input class="form-control" type="number" name="question_points" value="1">' .
            '</div>' .
            '</div>' .
            '<hr>' .
            '<sup>Enter your question and multiple answers, then select the one correct answer.</sup>' .
            '<br>' .
            '<label class="font-weight-bold">Questions:</label> ' .
            '<div id="quiz-question"></div> ' .
            '<label class="answers-lbl font-weight-bold mt-1">Answers:</label>' .
            '<div class="answer-div">' .
            '</div>' .
            '<button class="btn-add-answer btn btn-sm btn-light mt-1" onclick="addAnswer(event, event)"><i class="fa fa-plus"></i> Add another answer</button >' .
            '</div>' .
            '<div class="card-footer p-2">' .
            '<div class="d-flex">' .
            '<button class="btn btn-sm btn-light mr-1">Cancel</button>' .
            '<button class="btn btn-sm btn-primary">Update question</button>' .
            '</div>' .
            '</div>' .
            '</div>';
    }

    function multipleChoice()
    {
        $html = '<div id="answer-area-1" class="answer-area p-3 mb-2">' .
            '<div class="d-flex">' .
            '<div>' .
            '<button id="btn-answer-1" class="btn btn-sm btn-success mr-3 mt-2 btn-answer" onclick="correctAnswer(event, 1, 0)"><i class="fa fa-arrow-right"></i></button >' .
            '</div>' .
            '<div class="w-100">' .
            '<label id="answer-lbl-1" class="form-label text-success answer-label" for="answer_1">Correct Answer</label>' .
            '<input class="form-control" type="text" name="answer_1">' .
            '</div>' .
            '<div>' .
            '<button class="btn-delete-answer btn btn-sm btn-light ml-3 mb-1" onclick="deleteAnswer(event, 1)"><i class="fa fa-trash"></i></button>' .
            '<button class="btn btn-sm btn-light ml-3" onclick="displayComment(event, 1)"><i class="fa fa-commenting-o"></i></button>' .
            '</div>' .
            '</div>' .
            '<div id="answer-comment-area-1" class="answer-comment-area mt-2">' .
            '<div class="answer-comment" id="answer-comment-1"></div>' .
            '<button class="btn btn-sm btn-light btn-comment-done">Done</button>' .
            '</div>' .
            '</div>' .
            '<hr id="answer-area-hr-1">' .
            '<div id="answer-area-2" class="answer-area p-3 mb-2">' .
            '<div class="d-flex">' .
            '<div>' .
            '<button id="btn-answer-2" class="btn btn-sm btn-light mr-3 mt-2 btn-answer" onclick="correctAnswer(event, 2, 0)"><i class="fa fa-arrow-right"></i></button>' .
            '</div>' .
            '<div class="w-100">' .
            '<label id="answer-lbl-2" class="form-label text-succes answer-label" for="answer_2">Possible Answer</label>' .
            '<input class="form-control" type="text" name="answer_2">' .
            '</div>' .
            '<div>' .
            '<button class="btn-delete-answer btn btn-sm btn-light ml-3 mb-1" onclick="deleteAnswer(event, 2)"><i class="fa fa-trash"></i></button>' .
            '<button class="btn btn-sm btn-light ml-3" onclick="displayComment(event, 2)"><i class="fa fa-commenting-o"></i></button>' .
            '</div>' .
            '</div>' .
            '<div id="answer-comment-area-2" class="answer-comment-area mt-2">' .
            '<div class="answer-comment" id="answer-comment-2"></div>' .
            '<button class="btn btn-sm btn-light btn-comment-done">Done</button>' .
            '</div>' .
            '</div>' .
            '<hr id="answer-area-hr-2">' .
            '<div id="answer-area-3" class="answer-area p-3 mb-2">' .
            '<div class="d-flex">' .
            '<div>' .
            '<button id="btn-answer-3" class="btn btn-sm btn-light mr-3 mt-2 btn-answer" onclick="correctAnswer(event, 3, 0)"><i class="fa fa-arrow-right"></i></button>' .
            '</div>' .
            '<div class="w-100">' .
            '<label id="answer-lbl-3" class="form-label answer-label" for="answer_3">Possible Answer</label>' .
            '<input class="form-control" type="text" name="answer_3">' .
            '</div>' .
            '<div>' .
            '<button class="btn-delete-answer btn btn-sm btn-light ml-3 mb-1" onclick="deleteAnswer(event, 3)"><i class="fa fa-trash"></i></button>' .
            '<button class="btn btn-sm btn-light ml-3" onclick="displayComment(event, 3)"><i class="fa fa-commenting-o"></i></button>' .
            '</div>' .
            '</div>' .
            '<div id="answer-comment-area-3" class="answer-comment-area mt-2">' .
            '<div class="answer-comment" id="answer-comment-3"></div>' .
            '<button class="btn btn-sm btn-light btn-comment-done">Done</button>' .
            '</div>' .
            '</div>' .
            '<hr id="answer-area-hr-3">' .
            '<div id="answer-area-4" class="answer-area p-3 mb-2">' .
            '<div class="d-flex">' .
            '<div>' .
            '<button id="btn-answer-4" class="btn btn-sm btn-light mr-3 mt-2 btn-answer" onclick="correctAnswer(event, 4, 0)"><i class="fa fa-arrow-right"></i></button>' .
            '</div>' .
            '<div class="w-100">' .
            '<label id="answer-lbl-4" class="form-label answer-label" for="answer_4">Possible Answer</label>' .
            '<input class="form-control" type="text" name="answer_4">' .
            '</div>' .
            '<div>' .
            '<button class="btn-delete-answer btn btn-sm btn-light ml-3 mb-1" onclick="deleteAnswer(event, 4)"><i class="fa fa-trash"></i></button>' .
            '<button class="btn btn-sm btn-light ml-3" onclick="displayComment(event, 4)"><i class="fa fa-commenting-o"></i></button>' .
            '</div>' .
            '</div>' .
            '<div id="answer-comment-area-4" class="answer-comment-area mt-2">' .
            '<div class="answer-comment" id="answer-comment-4"></div>' .
            '<button class="btn btn-sm btn-light btn-comment-done">Done</button>' .
            '</div>' .
            '</div>';

        echo $html;
    }

    function trueFalse()
    {

        $html = '<div id="answer-area-1" class="answer-area p-3 mb-2">' .
            '<div class="d-flex">' .
            '<div>' .
            '<button id="btn-answer-1" class="btn btn-sm btn-success mr-3 mt-2 btn-answer" onclick="correctAnswer(event, 1, 1)"><i class="fa fa-arrow-right"></i></button >' .
            '</div>' .
            '<div class="w-100">' .
            '<label id="answer-lbl-1" class="form-label text-success answer-label" for="answer_1">True</label>' .
            '<input class="form-control" type="text" name="answer_1">' .
            '</div>' .
            '<div>' .
            '<button class="btn btn-sm btn-light ml-3" onclick="displayComment(event, 1)"><i class="fa fa-commenting-o"></i></button>' .
            '</div>' .
            '</div>' .
            '<div id="answer-comment-area-1" class="answer-comment-area mt-2">' .
            '<div class="answer-comment" id="answer-comment-1"></div>' .
            '<button class="btn btn-sm btn-light btn-comment-done">Done</button>' .
            '</div>' .
            '</div>' .
            '<hr id="answer-area-hr-1">' .
            '<div id="answer-area-2" class="answer-area p-3 mb-2">' .
            '<div class="d-flex">' .
            '<div>' .
            '<button id="btn-answer-2" class="btn btn-sm btn-light mr-3 mt-2 btn-answer" onclick="correctAnswer(event, 2, 1)"><i class="fa fa-arrow-right"></i></button>' .
            '</div>' .
            '<div class="w-100">' .
            '<label id="answer-lbl-2" class="form-label text-succes answer-label" for="answer_2">False</label>' .
            '<input class="form-control" type="text" name="answer_2">' .
            '</div>' .
            '<div>' .
            '<button class="btn btn-sm btn-light ml-3" onclick="displayComment(event, 2)"><i class="fa fa-commenting-o"></i></button>' .
            '</div>' .
            '</div>' .
            '<div id="answer-comment-area-2" class="answer-comment-area mt-2">' .
            '<div class="answer-comment" id="answer-comment-2"></div>' .
            '<button class="btn btn-sm btn-light btn-comment-done">Done</button>' .
            '</div>' .
            '</div>';

        echo $html;
    }

    function essayQuestion()
    {
        $html = '<button class="btn btn-sm btn-light ml-3" onclick="displayComment(event, 1)"><i class="fa fa-commenting-o"></i></button>' .
            '<div id="answer-comment-area-1" class="answer-comment-area mt-2">' .
            '<div class="answer-comment" id="answer-comment-1"></div>' .
            '<button class="btn btn-sm btn-light btn-comment-done">Done</button>' .
            '</div>';

        echo $html;
    }
}
