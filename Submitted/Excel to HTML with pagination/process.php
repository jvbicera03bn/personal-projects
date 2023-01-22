<?php
session_start();
require("new-connection.php");
ini_set('auto_detect_line_endings', true);

if (isset($_POST['submit_file'])) {
    $file_dir = "upload_files/";
    $file_name = basename($_FILES["CSVFile_Upload"]["name"]);
    $target_file = $file_dir . $file_name;
    /* Validation of CSV file*/
    if (($_FILES["CSVFile_Upload"]["type"] == "text/csv")) {
        /* "File is a CSV file" */
        $uploadREADY = TRUE;
        /* Check if the file is already uploaded*/
        if (file_exists($target_file)) {
            /* Been uploaded */
            $_SESSION['ERRmsg'][] = 'File has been already uploaded';
            $uploadREADY = FALSE;
        } else {
            /* File not yet uploaded */
            $uploadREADY = TRUE;
        }
    } else {
        /* "File is not a CSV file" */
        $_SESSION['ERRmsg'][] = 'File is not a CSV file';
        $uploadREADY = FALSE;
    }
    /* Uploading CSV file */
    if ($uploadREADY == TRUE) {
        $file_name = escape_this_string($file_name);
        $target_file = escape_this_string($target_file);
        /* Uploading the file and putting it in the database */
        move_uploaded_file($_FILES["CSVFile_Upload"]["tmp_name"], $target_file);
        $query = "INSERT INTO `exceltohtml`.`files`(`file_name`,`file_dir`,`created_at`,`updated_at`)VALUES('{$file_name}','{$target_file}',now(),now());";
        run_mysql_query($query);
        $_SESSION['UploadTrue'][] = 'File uploaded successfully';
        header('location: index.php');
        exit();
    } else {
        $_SESSION['ERRmsg'][] = 'Sorry, your file was not uploaded.';
        header('location: index.php');
        exit();
    }
}
/* Converting the Clicked file to Associative array */
function csvToArray($filename = '', $delimiter = ','){
    if (!file_exists($filename) || !is_readable($filename))
        return false;
    $header = null;
    $data = array();
    if (($handle = fopen($filename, 'r')) !== false) {
        while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
            if (!$header)
                $header = $row;
            else
                $data[] = array_combine($header, $row);
        }
        fclose($handle);
    }
    return $data;
}
if (isset($_POST['file_select'])){
    foreach ($_SESSION['file_infos'] as $file_infos){
        if ($_POST['file_name'] === $file_infos['file_name']){
            $file_dir = $file_infos['file_dir']; 
        }
    }
    $_SESSION['csvToArray'] = csvToArray( $file_dir , ',');
    $_SESSION['file_name'] = $_POST['file_name'];
    $_SESSION['page_number'] = 1;
    header('location: main.php');
    exit();
}
if (isset($_GET['page_change'])){
    $_SESSION['page_number'] = intval($_GET['page']);
    header('location: main.php');
    exit();
}
/* Reset Session for debug purposes */
if (isset($_POST['reset'])) {
    session_destroy();
    header('location: index.php');
    exit();
}
