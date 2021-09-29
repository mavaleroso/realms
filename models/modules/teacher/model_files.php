<?php
require($_SERVER['DOCUMENT_ROOT'] . '/config.php');
require($_SERVER['DOCUMENT_ROOT'] . '/database/connection.php');
require($_SERVER['DOCUMENT_ROOT'] . '/models/config.php');


session_start();
$file = new Files();

if (isset($_GET['func'])) {
    switch ($_GET['func']) {
        case 'upload':
            $file->file_upload();
            break;
        case 'delete':
            $file->file_delete();
            break;
        case 'status':
            $file->file_status();
            break;
        default:
            # code...
            break;
    }
}

class Files
{
    function file_upload()
    {
        global $conn;
        $tempFile   = $_FILES['file']['tmp_name'];
        $trueFile   = $_FILES['file']['name'];
        $uploadDir  = $_SERVER['DOCUMENT_ROOT'] . '/storage/modules/';
        $ext = strtolower(pathinfo($trueFile, PATHINFO_EXTENSION));
        $final_image = rand(1000, 1000000);
        // $targetFile = $uploadDir . $_FILES['file']['name'];
        $tmpName = $final_image . '.' . $ext;
        $targetFile = $uploadDir . $tmpName;

        $id = $_GET['id'];
        $result = $conn->query("INSERT tbl_files (module_id, temp_name, original_name, status, created_at) VALUES ('$id', '$tmpName', '$trueFile', 0,NOW())");

        $result ? move_uploaded_file($tempFile, $targetFile) : NULL;

        return $result;
    }

    function file_delete()
    {
        global $conn;
        $id = $_POST['id'];
        $queryFile = "SELECT * FROM tbl_files WHERE id=" . $id;
        $resultFile = mysqli_query($conn, $queryFile) or die(mysqli_error($conn));
        while ($row = mysqli_fetch_array($resultFile)) {
            $directory  = $_SERVER['DOCUMENT_ROOT'] . '/storage/modules/' . $row['temp_name'];
            unlink($directory);
        }

        $result = $conn->query("DELETE FROM tbl_files WHERE id = $id");

        return $result;
    }

    function file_status()
    {
        global $conn;
        $id = $_POST['id'];
        $status = $_POST['status'];
        $result = $conn->query("UPDATE tbl_files SET status = $status WHERE id = $id");

        return $result;
    }
}
