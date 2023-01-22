<?php
session_start();

include('db.php');

if (isset($_POST['callId'])) {
    $callId = $_POST['callId'];
    $date = $_POST['date'];
    $it_person = $_POST['it_person'];
    $user_name = $_POST['user_name'];
    $subject = $_POST['subject'];
    $details = $_POST['details'];
    $status = $_POST['status'];


    $sql = "INSERT INTO `call_headers` (`callId`, `date`, `it_person`, `username`, `subject`, `details`, `total_hours`, `total_minutes`, `status`) VALUES('" . $callId . "', '" . $date . "', '" . $it_person . "', '" . $user_name . "', '" . $subject . "', '" . $details . "', 0, 0, '" . $status . "')";

    if ($mysqli->query($sql) !== TRUE) {
        $_SESSION['error'] = 'Error creating call log headers';
    }

    $_SESSION['success'] = 'Successfully created call log headers';

    header('location:index.php');
}

?>