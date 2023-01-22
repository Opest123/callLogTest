<?php
session_start();

include('db.php');

if (isset($_POST['callId'])) {
    $callId = $_POST['callId'];
    $date = $_POST['date'];
    $details = $_POST['details'];
    $hours = $_POST['hours'];
    $minutes = $_POST['minutes'];

    $sql = "INSERT INTO `call_details` (`callId`, `date`, `details`, `hours`, `minutes`) VALUES('" . $callId . "', '" . $date . "','" . $details . "', '" . $hours . "', '" . $minutes . "')";

    if ($mysqli->query($sql) !== TRUE) {
        $_SESSION['error'] = 'Error creating call log details';
    }

    $_SESSION['success'] = 'Successfully created call log details';

    $updateCallLogHeaders = "UPDATE `call_headers` SET `total_hours`=`total_hours`+'" . $hours . "', `total_minutes`=`total_minutes`+'" . $minutes . "' WHERE callId='" . $callId . "'";

    if ($mysqli->query($updateCallLogHeaders) !== TRUE) {
        $_SESSION['error'] = 'Error updating call log headers hours and minutes';
    }

    header('location:index.php');
}

?>