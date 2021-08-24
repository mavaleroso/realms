<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');

$sess = new Sess();

if (isset($_GET['func'])) {
    switch ($_GET['func']) {
        case 'destroy':
            $sess->destroy();
            break;

        default:
            # code...
            break;
    }
}

class Sess
{
    function check()
    {
        session_start();
        if (!$_SESSION['id']) {
            header('Location: ' . BASE_URL . '/login');
        }
    }

    function check_reverse()
    {
        session_start();
        if (isset($_SESSION['id'])) {
            if ($_SESSION['role']) {
                header('Location: ' . BASE_URL . '/home');
            } else {
                header('Location: ' . BASE_URL . '/type');
            }
        }
    }

    function destroy()
    {
        session_start();
        session_destroy();
        header('Location: ' . BASE_URL . '/login');
    }
}
